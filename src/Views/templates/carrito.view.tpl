<section class="container">
    <h3 class="my-4">Detalle de la Orden</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="40%" class="text-center">Descripción</th>
                <th width="15%" class="text-center">Cantidad</th>
                <th width="20%" class="text-center">Precio</th>
                <th width="20%" class="text-center">Total</th>
                <th width="20%" class="text-center">Imagen</th>
                <th width="5%"></th>
            </tr>
        </thead>
        <tbody>
            {{foreach Items}}
            <tr>
                <td width="40%" class="align-middle">{{ProdNombre}}</td>
                <td width="15%" class="text-center align-middle">{{ProdCantidad}}</td>
                <td width="20%" class="text-center align-middle">{{ProdPrecioVenta}}</td>
                <td width="20%" class="text-center align-middle">{{TotalProducto}}</td>
                <td width="20%" class="text-center align-middle">
                    <div class="border">
                        <img class="rounded mx-auto d-block" src="{{MediaPath}}" alt="{{MediaDoc}}" width="60%">
                    </div>
                </td>

                <td width="5%">
                    <form method="POST" action="index.php?page=carrito">
                        <input type="hidden" id="ProdId" name="ProdId" value="{{ProdId}}">
                        <input type="hidden" id="ProdCantidad" name="ProdCantidad" value="{{ProdCantidad}}">
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            {{endfor Items}}
        </tbody>
    </table>

    <form>
        <div class="form-group row justify-content-end">
          <label for="CarritoTotal" class="col-sm-2 col-form-label font-weight-bold">Total</label>
          <div class="col-sm-2">
                <input type="text" readonly class="form-control" id="CarritoTotal" value="{{Total}}">
          </div>
        </div>
      </form>

</section>