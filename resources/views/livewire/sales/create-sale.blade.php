<div>
    <form class="form">
        <x-card class="mt-8 mb-8 w-full m-auto">
            <h1 class="card__title-secondary">Informacion de la venta</h1>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="customer">Cliente:</label>
                    <input class="form__input" id="customer" type="text">
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="payment_method">Metodo de pago:</label>
                    <select class="form__input" id="payment_method">
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
                    <input class="form__input" id="date" type="date">
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="time">Tiempo</label>
                    <input class="form__input" id="time" type="time" />
                </div>
            </div>
        </x-card>
        <x-card class="mt-8 mb-8 w-full m-auto">
            <h2 class="card__title-secondary">Agregar Articulos</h2>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="type">Tipo:</label>
                    <select class="form__input" id="type">
                        <option value="">-- Seleccione un tipo --</option>
                        <option value="1">Producto</option>
                        <option value="2">Servicio</option>
                    </select>
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="article">Articulo</label>
                    <input class="form__input" id="article" type="text">
                </div>
            </div>
            <div>
                <h3 class="card__title-tertiary">Info del Producto/Servicio</h3>
                <div class="form__group-3">
                    <div class="form__input-group">
                        <label class="form__label">Nombre</label>
                        <input class="form__input" disabled type="text">
                    </div>
                    <div class="form__input-group">
                        <label class="form__label">Precio Original</label>
                        <input class="form__input" disabled type="text">
                    </div>
                    <div class="form__input-group">
                        <label class="form__label">Unidad de medida</label>
                        <input class="form__input" disabled type="text">
                    </div>
                </div>
            </div>
            <h3 class="card__title-tertiary">Parametros Personalizados</h3>
            <div class="form__group">
                <div class="form__input-group">
                    <label class="form__label" for="unit_price">Precio Unitario</label>
                    <input class="form__input" type="text">
                </div>
                <div class="form__input-group">
                    <label class="form__label" for="quantity">Cantidad</label>
                    <input class="form__input" id="quantity" type="text">
                </div>
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
                    <tr>
                        <td>Servicio</td>
                        <td>Corte</td>
                        <td>S/12</td>
                        <td>1</td>
                        <td>S/12</td>
                        <td>
                            <button class="form__button--red" style="margin-bottom: 0;">Remover</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Producto</td>
                        <td>Pastillas</td>
                        <td>S/4</td>
                        <td>5</td>
                        <td>S/20</td>
                        <td>
                            <button class="form__button--red" style="margin-bottom: 0;">Remover</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="sales-info">
                <div class="sales-info__group">
                    <p class="font-semibold">Subtotal S/</p><span class="">12.00</span>
                </div>
                <div class="sales-info__group items-center gap-4">
                    <label class="font-semibold whitespace-nowrap">Decuento S/</label><input class="form__input form__input--number-reset text-right" type="number" notvalidate>
                </div>
                <div class="sales-info__group">
                    <p class="font-semibold">Total S/</p><span>12</span>
                </div>
                <button class="form__button-submit inline">Confirmar Venta</button>
            </div>
        </x-card>
    </form>
</div>
