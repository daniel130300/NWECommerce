<h1>Gestión de Productos</h1>
<section class="WWFilter">

</section>

<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Código de Barra</th>
        <th>Descripción</th>
        <th>Tipo</th>
        <th>Unidades</th>
        <th>Fábrica</th>
        <th>Vendedor</th>get
        <th>Estado</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{invPrdId}}</td>
        <td>{{invPrdBrCod}}</td>
        <td><a href="index.php?page=mnt_producto&mode=DSP&invPrdId={{invPrdId}}">{{invPrdDsc}}</a></td>
        <td>{{invPrdTip}}</td>
        <td>{{invPrdCodInt}}</td>
        <td>{{invPrdFactor}}</td>
        <td>{{invPrdVnd}}</td>
        <td>{{invPrdEst}}</td>
        <td>
          <form action="index.php" method="get">
              <input type="hidden" name="page" value="mnt_producto"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="invPrdId" value={{invPrdId}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
              <input type="hidden" name="page" value="mnt_producto"/>
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
        window.location.assign("index.php?page=mnt_producto&mode=INS&invPrdId=0");
      });
    });
</script>
