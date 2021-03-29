<h1>Gestión de Funciones</h1>
<button id="btnVolver">Volver</button>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Tipo</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{fncod}}</td>
        <td><a href="index.php?page=mntFunciones_funcion&mode=DSP&fncod={{fncod}}">{{fndsc}}</a></td>
        <td>{{fnest}}</td>
        <td>{{fntyp}}</td>
        <td>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mntFunciones_funcion"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="fncod" value={{fncod}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
            <input type="hidden" name="page" value="mntFunciones_funcion"/>
             <input type="hidden" name="mode" value="DEL" />
             <input type="hidden" name="fncod" value={{fncod}} />
             <button type="submit">Eliminar</button>
         </form>
        </td>
      </tr>
      {{endfor items}}
    </tbody>
  </table>
</section>
<script>
   document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("btnAdd").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mntFunciones_funcion&mode=INS&fncod=0");
      });

      document.getElementById("btnVolver").addEventListener("click", function(e){
          e.preventDefault();
          e.stopPropagation();
          window.location.assign("index.php?page=admin_admin");
        });
    });
</script>

<!--
<section class="container-fluid">

  <h3 class="my-4 text-center">Gestión de Funciones</h3>
  
  <div class="d-flex-inline">
    <form method="POST" action="index.php?page=mnt_funciones">
      <div class="form-row">
        <div class="col-8">
          <input type="search" class="form-control" id="UsuarioBusqueda" name="UsuarioBusqueda" placeholder="Ingrese su busqueda">
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
          <th class="text-center align-middle">Descripción</th>
          <th class="text-center align-middle">Estado</th>
          <th class="text-center align-middle">Tipo</th>
          <th class="text-center align-middle"></th>
        </tr>
      </thead>
      <tbody>
        {{foreach items}}
          <tr>
            <td class="text-center align-middle">{{FuncionId}}</td>
            <td class="text-center align-middle"><a href="index.php?page=mnt_funcion&mode=DSP&FuncionId={{FuncionId}}">{{FuncionDsc}}</a></td>
            <td class="text-center align-middle">{{FuncionEst}}</td>
            <td class="text-center align-middle">
              <form action="index.php" method="get">
                  <input type="hidden" name="page" value="mnt_funcion"/>
                  <input type="hidden" name="mode" value="UPD" />
                  <input type="hidden" name="FuncionId" value={{FuncionId}} />
                  <button type="submit" class="btn btn-primary my-1">Editar</button>
              </form>
            </td>
          </tr>
          {{endfor items}}
      </tbody>
    </table>
  </div>
</section>
-->