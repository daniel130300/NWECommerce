<h1>Gestión de Productos</h1>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Código de Barras</th>
        <th>Código Interno</th>
        <th>Descripcion</th>
        <th>Tipo de Producto</th>
        <th>Estado</th>
        <th>Padre</th>
        <th>Factor</th>
        <th>Vendible</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{invPrdId}}</td>
        <td>{{invPrdBrCod}}</td>
        <td>{{invPrdCodInt}}</td>
        <td><a href="index.php?page=mntProductos_producto&mode=DSP&invPrdId={{invPrdId}}">{{invPrdDsc}}</a></td>
        <td>{{invPrdTip}}</td>
        <td>{{invPrdEst}}</td>
        <td>{{invPrdPadre}}</td>
        <td>{{invPrdFactor}}</td>
        <td>{{invPrdVnd}}</td>
        <td>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mntProductos_producto"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="invPrdId" value={{invPrdId}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mntProductos_producto"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="invPrdId" value={{invPrdId}} />
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
        window.location.assign("index.php?page=mntProductos_producto&mode=INS&invPrdId=0");
      });
    });
</script>