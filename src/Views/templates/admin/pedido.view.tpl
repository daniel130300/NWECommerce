<section class="container d-flex align-items-center justify-content-center">
    <div class="card my-5 w-100">
      <div class="card-header">
        <h3 class="text-center">{{mode_dsc}}</h3>
      </div>
      <div class="card-body"> 
        <form class="form" method="post" action="index.php?page=admin_pedido&mode={{mode}}&VentaId={{VentaId}}">
  
          <div class="form-group col-md-2">
            <label for="CategoriaId">Código</label>
            <input type="hidden" class="form-control" id="VentaId" name="VentaId" value="{{VentaId}}"/>
            <input readonly type="text" class="form-control" name="VentaIdDummy" value="{{VentaId}}"/>
          </div>

          <div class="form-group col-md-5">
            <label for="VentaFecha">Fecha de la Venta</label>
            <input type="text" class="form-control" readonly id="VentaFecha" name="VentaFecha" value="{{VentaFecha}}" maxlength="80">
          </div>

          <div class="form-group col-md-5">
            <label for="VentaISV">Impuesto sobre la Venta</label>
            <input type="text" class="form-control" readonly id="VentaISV" name="VentaISV" value="{{VentaISV}}" maxlength="80">
          </div>

          <div class="form-group col-md-5">
            <label for="VentaEst">Estado de la Venta</label>
            <input type="text" class="form-control" readonly id="VentaEst" name="VentaEst" value="{{VentaEst}}" maxlength="80">
          </div>

          <div class="form-group col-md-5">
            <label for="VentaTipoPago">Tipo de Pago</label>
            <input type="text" class="form-control" readonly id="VentaTipoPago" name="VentaTipoPago" value="{{VentaTipoPago}}" maxlength="80">
          </div>

          <div class="form-group col-md-5">
            <label for="VentaPagoEnvio">Pago del envio</label>
            <input type="text" class="form-control" readonly id="VentaPagoEnvio" name="VentaTipoPago" value="{{VentaPagoEnvio}}" maxlength="80">
          </div>

          <div class="form-group col-md-5">
            <label for="UsuarioNombre">Nombre del Cliente</label>
            <input type="text" class="form-control" readonly id="UsuarioNombre" name="UsuarioNombre" value="{{UsuarioNombre}}" maxlength="80">
          </div>

          <div class="form-group col-md-5">
            <label for="ClienteDireccion">Dirección del Cliente</label>
            <input type="text" class="form-control" readonly id="ClienteDireccion" name="ClienteDireccion" value="{{ClienteDireccion}}" maxlength="80">
          </div>

          <div class="form-group col-md-5">
            <label for="ClienteTelefono">Télefono del Cliente</label>
            <input type="text" class="form-control" readonly id="ClienteTelefono" name="ClienteTelefono" value="{{ClienteTelefono}}" maxlength="80">
          </div>

          <div class="table-responsive">
            <table class="table">
            <thead class="thead-light">
                <tr>
                <th class="text-center align-middle">Código del Producto</th>
                <th class="text-center align-middle">Nombre del Producto</th>
                <th class="text-center align-middle">Descripcion del Producto</th>
                <th class="text-center align-middle">Precio del Producto</th>
                <th class="text-center align-middle">Cantidad de Producto</th>
                </tr>
            </thead>
            <tbody>
                {{foreach Productos}}
                <tr>
                    <td class="text-center align-middle">{{ProdId}}</td>
                    <td class="text-center align-middle">{{ProdNombre}}</td>
                    <td class="text-center align-middle">{{ProdDescripcion}}</td>
                    <td class="text-center align-middle">{{ProdPrecioVenta}}</td>
                    <td class="text-center align-middle">{{VentasProdCantidad}}</td>
                </tr>
                {{endfor Productos}}
            </tbody>
          </table>
        </div>
         
          <button type="button" class="btn btn-warning mt-2 ml-3 mr-2" id="btnCancelar" name="btnCancelar">Cancelar</button>
          {{if showaction}}
            <button type="submit" class="btn btn-primary mt-2 mr-2" id="btnGuardar" name="btnGuardar">Cambiar Estado</button>
          {{endif showaction}}
        </form>
      </div>
    </div>
  </section>
  
  <script>
    document.addEventListener("DOMContentLoaded", function(){
        document.getElementById("btnCancelar").addEventListener("click", function(e){
          e.preventDefault();
          e.stopPropagation();
          window.location.assign("index.php?page=admin_pedidos");
        });
    });
  </script>
  
  
  
