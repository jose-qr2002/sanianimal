<?php

namespace App\Livewire\Sales;

use App\Exceptions\StockException;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateSale extends Component
{
    public $customer_id;
    public $payment_method;
    public $date;
    public $time;

    public function rules() {
        return [
            'customer_id' => 'nullable|exists:customers,id',
            'payment_method' => 'required|in:1,2,3',
            'date' => 'required|date',
            'time' => 'required',
        ];
    }

    public function mount()
    {
        $this->payment_method = 1;
        $this->date = now()->format('Y-m-d');
        $this->time = now()->format('H:i');
    }

    public function store($saleData) {
        $validData = $this->validate();
        $sales = $saleData['saleList'];
        // Definir el tipo de artículo
        $type_articles = [
            'Producto' => 'product_id',
            'Servicio' => 'service_id',
        ];

        try {
            DB::beginTransaction();

            $sale = Sale::create([
                'customer_id' => $this->customer_id,
                'payment_method' => $this->payment_method,
                'status' => 1, // 1 = Pagado
                'date' => $this->date,
                'time' => $this->time,
                'subtotal' => $saleData['subtotal'],
                'discount' => $saleData['discount'],
                'total' => $saleData['total'],
            ]);

            foreach($sales as $saleDetail) {
                SaleDetail::create([
                    'sale_id' => $sale['id'],
                    // Encontrar de forma dinámica el id del producto o servicio
                    $type_articles[$saleDetail['type']] => $saleDetail['id'],
                    'quantity' => $saleDetail['quantity'],
                    'unit_price' => $saleDetail['price'],
                    'total' => $saleDetail['total'],
                ]);

                if($saleDetail['type'] == 'Producto') {
                    $product = Product::find($saleDetail['id']);
                    $product->stock -= $saleDetail['quantity'];

                    if($product->stock < 0) {
                        throw new StockException('No hay suficiente stock para el producto ' . $product->name);
                    }
                    $product->save();
                }
            }


            DB::commit();
            return redirect()->route('sales.index')->with('msn_success', 'La venta ha sido guardada');
        } catch (StockException $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            $this->dispatch('alert-sweet', message: $e->getMessage(), icon: "error");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            $this->dispatch('alert-sweet', "Ha ocurrido un problema al guardar la venta", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.sales.create-sale');
    }
}
