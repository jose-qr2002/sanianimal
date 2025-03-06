<form class="form" @submit.prevent="submitSale" x-data="salesForm()" x-init="initApi()">
    <x-card class="mt-8 mb-8 w-full m-auto">
        <h1 class="card__title-secondary">Informacion de la venta</h1>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="customerParam">Cliente:</label>
                <div class="form__relative" @click.away="hidePredictions()">
                    <input @click="showCustPredictions" @input='searchCustomer($el)' class="form__input form__input-search" id="customerParam" type="text">
                    <ul class="form__predictions" x-bind:class="showCustomersPredictions ? 'show' : ''">
                        <template x-for="customer in customersPredictions">
                            <li @click="selectCustomer(customer)" x-text="customer.name" class="form__prediction"></li>
                        </template>
                    </ul>
                </div>
                <input type="hidden" wire:model='customer_id'>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="payment_method">Metodo de pago:</label>
                <select class="form__input" wire:model='payment_method' id="payment_method">
                    <option value="1">Efectivo</option>
                    <option value="2">Yape</option>
                    <option value="3">Plin</option>
                </select>
                @error('name')
                    <div class="form__error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="date">Fecha:</label>
                <input class="form__input" wire:model='date' id="date" type="date">
            </div>
            <div class="form__input-group">
                <label class="form__label" for="time">Tiempo</label>
                <input class="form__input" wire:model='time' id="time" type="time" />
            </div>
        </div>
    </x-card>
    <x-card class="mt-8 mb-8 w-full m-auto">
        <h2 class="card__title-secondary">Agregar Articulos</h2>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="articleType">Tipo:</label>
                <select class="form__input" id="articleType" x-model="articleTypeSelected">
                    <option value="">-- Seleccione un tipo --</option>
                    <option value="1">Producto</option>
                    <option value="2">Servicio</option>
                </select>
            </div>
            <div class="form__input-group">
                <label class="form__label" for="article">Articulo</label>
                <div class="form__relative" @click.away="showArticlesPredictions = false">
                    <input class="form__input form__input-search" id="article" type="text" x-model="articleToSelect" @click="showArticlesPredictions = true" @input='searchArticle($el)'>
                    <ul class="form__predictions" x-bind:class="showArticlesPredictions ? 'show' : ''">
                        <template x-for="article in articlesPredictions">
                            <li @click="selectArticle(article)" x-text="article.name" class="form__prediction"></li>
                        </template>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <h3 class="card__title-tertiary">Info del Producto/Servicio</h3>
            <div class="form__group-3">
                <div class="form__input-group">
                    <label class="form__label">Nombre</label>
                    <input class="form__input" x-model="articleSelected.name" disabled type="text">
                </div>
                <div class="form__input-group">
                    <label class="form__label">Precio Original</label>
                    <input class="form__input" x-model="articleSelected.price" disabled type="text">
                </div>
                <div class="form__input-group">
                    <label class="form__label">Unidad de medida</label>
                    <input class="form__input" x-model="articleSelected.measurement" disabled type="text">
                </div>
            </div>
        </div>
        <h3 class="card__title-tertiary">Parametros Personalizados</h3>
        <div class="form__group">
            <div class="form__input-group">
                <label class="form__label" for="unit_price">Precio Unitario</label>
                <input class="form__input" x-model="articleParam.price" type="text">
            </div>
            <div class="form__input-group">
                <label class="form__label" for="quantity">Cantidad</label>
                <input class="form__input" x-model="articleParam.quantity" id="quantity" type="text">
            </div>
        </div>
        <div class="flex justify-end">
            <button x-bind:disabled="Object.keys(articleSelected).length === 0" class="form__button--add--inline" @click="addArticleToList()" type="button">Agregar</button>
        </div>
    </x-card>
    <x-card class="mt-8 mb-8 w-full m-auto">
        <h2 class="card__title-secondary">Detalle de la venta</h2>
        <table class="table mb-4">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="sale in saleList">
                    <tr>
                        <td x-text="sale.type"></td>
                        <td x-text="sale.name"></td>
                        <td x-text="formatPrice(sale.price)"></td>
                        <td x-text="sale.quantity"></td>
                        <td x-text="formatPrice(sale.total)"></td>
                        <td>
                            <button type="button" class="form__button--red" @click="removeArticleFromList(sale)" style="margin-bottom: 0;">Remover</button>
                        </td>
                    </tr>
                </template>
                
            </tbody>
        </table>
        <div class="sales-info">
            <div class="sales-info__group">
                <p class="font-semibold">Subtotal S/</p><span class="" x-text="formatPrice(subtotal)"></span>
            </div>
            <div class="sales-info__group items-center gap-4">
                <label class="font-semibold whitespace-nowrap">Decuento S/</label><input @input="calculateTotal" x-model="discount" class="form__input form__input--number-reset text-right" type="number" notvalidate>
            </div>
            <div class="sales-info__group">
                <p class="font-semibold">Total S/</p><span x-text="formatPrice(total)">12</span>
            </div>
            <button x-bind:disabled="saleList.length === 0" class="form__button-submit inline">Confirmar Venta</button>
        </div>
    </x-card>
</form>

<script>
    function salesForm(){
        return {
            // Bases de datos
            customersDB: [],
            productsDB: [],
            servicesDB: [],
            // Variables
            articleToSelect: '',
            articleTypeSelected: 0,
            articleSelected: {},
            articleParam: {
                price: '',
                quantity: '',
            },
            // Lista Venta
            saleList: [],
            subtotal: 0,
            discount: 0,
            total: 0,
            // Listas de Predicciones
            customersPredictions: [],
            articlesPredictions: [],
            showCustomersPredictions: false,
            showArticlesPredictions: false,
            // HELPERS
            formatPrice(value) {
                return parseFloat(value).toFixed(2);
            },
            // API METHODS
            async initApi() {
                await Promise.all([
                    this.getCustomersDB(),
                    this.getProductsDB(),
                    this.getServicesDB()
                ]);
            },
            async getCustomersDB() {
                const apiUrl = '/api/customers';
                const customersAPI = await fetch(apiUrl);
                const data = await customersAPI.json();
                this.customersDB = data;
            },
            async getProductsDB() {
                const apiUrl = '/api/products';
                const productsAPI = await fetch(apiUrl);
                const data = await productsAPI.json();
                this.productsDB = data;
            },
            async getServicesDB() {
                const apiUrl = '/api/services';
                const servicesAPI = await fetch(apiUrl);
                const data = await servicesAPI.json();
                this.servicesDB = data;
            },
            // Eventos
            calculateTotal() {
                this.subtotal = this.saleList.reduce((sum, sale) => sum + sale.total, 0);
                this.total = this.subtotal - this.discount;
            },  
            showCustPredictions() {
                this.showCustomersPredictions = true;
                //console.log('enabled');
            },
            hidePredictions() {
                this.showCustomersPredictions = false;
                //console.log('disabled');
            },
            searchCustomer(elemento) {
                //console.log(this.customersPredictions);

                this.customersDB.forEach((customer) => {
                    //console.log(customer);

                })

                if(elemento.value.length < 2) {
                    this.showCustomersPredictions = false;
                    return
                }



                this.customersPredictions = this.customersDB.filter((customer) => {
                    const fullName =  `${customer.name} ${customer.lastname}`;
                    return customer.name.toLowerCase().includes(elemento.value.toLowerCase()) ||
                        customer.lastname.toLowerCase().includes(elemento.value.toLowerCase()) ||
                        customer.phone.includes(elemento.value) ||
                        fullName.toLowerCase().includes(elemento.value.toLowerCase());
                })
                this.showCustomersPredictions = true;
                console.log(this.customersPredictions);
            },
            selectCustomer(customer) {
                document.getElementById('customerParam').value = `${customer.name} ${customer.lastname}`;
                this.showCustomersPredictions = false;
                this.customersPredictions = [];
                this.$wire.set('customer_id', customer.id);
            },
            fetchArticles() {
                console.log(this.articleType);
            },
            searchArticle(element) {
                if(element.value.length < 2) {
                    this.showArticlesPredictions = false;
                    return
                }

                if (this.articleTypeSelected == 1) {
                    this.articlesPredictions = this.productsDB.filter((product) => {
                        return product.name.toLowerCase().includes(element.value.toLowerCase());
                    })
                    this.showArticlesPredictions = true;
                } else if (this.articleTypeSelected == 2) {
                    this.articlesPredictions = this.servicesDB.filter((service) => {
                        return service.name.toLowerCase().includes(element.value.toLowerCase());
                    })
                    this.showArticlesPredictions = true;
                } else {
                    this.showArticlesPredictions = false;
                }
            },
            selectArticle(article) {
                console.log(article);
                document.getElementById('article').value = article.name;
                this.showArticlesPredictions = false;
                this.articlesPredictions = [];
                this.articleSelected = article;
                this.articleParam.price = article.price;
                this.articleParam.quantity = 1;
            },
            // Eventos de lista
            addArticleToList() {
                console.log(typeof this.subtotal);
                

                // Verificar si el artículo ya existe en la lista
                const exists = this.saleList.some(sale => sale.type === (this.articleTypeSelected == 1 ? 'Producto' : 'Servicio') && sale.id === this.articleSelected.id);
                if (exists) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'El artículo ya está en la lista.',
                    });
                    return;
                }

                this.saleList.push({
                    id: this.articleSelected.id,
                    type: this.articleTypeSelected == 1 ? 'Producto' : 'Servicio',
                    name: this.articleSelected.name,
                    price: this.articleParam.price,
                    quantity: this.articleParam.quantity,
                    total: this.articleParam.price * this.articleParam.quantity

                });
                // Limpiando datos
                this.articleParam.price = '';
                this.articleParam.quantity = '';
                this.articleSelected = {}
                this.articleToSelect = '';
                this.articleTypeSelected = 0;
                // Calucular total
                this.calculateTotal();
            },
            removeArticleFromList(article) {
                this.saleList = this.saleList.filter((sale) => {
                    return !(sale.type === article.type && sale.id === article.id);
                });
                // Calucular total
                this.calculateTotal();
            },
            async submitSale() {
                console.log('subiendo');
                
                if(this.total < 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'El descuento no puede ser mayor al total.',
                    });
                    return;
                }

                let saleData = {
                    total: this.total,
                    subtotal: this.subtotal,
                    discount: this.discount,
                    saleList: this.saleList
                }

                @this.call('store', saleData);
            }    
            
        }
    }
</script>
