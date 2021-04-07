<section class="container-fluid">

    <h3 class="my-4 text-center">Gestión de Ventas</h3>

    <div class="d-flex-inline">
        <form method="POST" action="index.php?page=admin_ventas">
        <div class="form-row">
            <div class="col-8">
            <input type="search" class="form-control" id="UsuarioBusqueda" name="UsuarioBusqueda" value="{{UsuarioBusqueda}}" placeholder="Ingrese su busqueda">
            </div>
            <div class="col-2">
            <button type="submit" class="btn btn-primary mb-2" id="btnBuscar" name="btnBuscar">Buscar</button>
            </div>
        </div>
        </form> 
    </div>

    <div class="table-responsive">
        <table class="table">
        <thead class="thead-light">
            <tr>
            <th class="text-center align-middle">Código</th>
            <th class="text-center align-middle">Fecha</th>
            <th class="text-center align-middle">ISV</th>
            <th class="text-center align-middle">Estado</th>
            <th class="text-center align-middle">Tipo de Pago</th>
            <th class="text-center align-middle">Pago de Envío</th>
            <th class="text-center align-middle">Nombre del Cliente</th>
            <th class="text-center align-middle">Dirección del Cliente</th>
            <th class="text-center align-middle">Teléfono del Cliente</th>
            <th class="text-center align-middle"></th>
            </tr>
        </thead>
        <tbody>
            {{foreach items}}
            <tr>
                <td class="text-center align-middle"><a href="index.php?page=admin_venta&mode=DSP&VentaId={{VentaId}}">{{VentaId}}</a></td>
                <td class="text-center align-middle">{{VentaFecha}}</td>
                <td class="text-center align-middle">{{VentaISV}}</td>
                <td class="text-center align-middle">{{VentaEst}}</td>
                <td class="text-center align-middle">{{VentaTipoPago}}</td>
                <td class="text-center align-middle">{{VentaPagoEnvio}}</td>
                <td class="text-center align-middle">{{UsuarioNombre}}</td>
                <td class="text-center align-middle">{{ClienteDireccion}}</td>
                <td class="text-center align-middle">{{ClienteTelefono}}</td>
                <td class="text-center align-middle">
                <form action="index.php" method="get">
                    <input type="hidden" name="page" value="admin_venta"/>
                    <input type="hidden" name="mode" value="UPD" />
                    <input type="hidden" name="VentaId" value={{VentaId}} />
                </form>
                </td>
            </tr>
            {{endfor items}}
        </tbody>
      </table>
    </div>
  </section>
