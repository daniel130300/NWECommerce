<h1>Gestión de Clientes</h1>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Identidad</th>
        <th>Nombre</th>
        <th>Género</th>
        <th>Biografía</th>
        <th>Teléfono 1</th>
        <th>Teléfono 2</th>
        <th>Correo</th>
        <th>Estado</th>
        <th>Fecha de Creación</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{clientid}}</td>
        <td>{{clientIdnumber}}</td>
        <td><a href="index.php?page=mnt_cliente&mode=DSP&clientid={{clientid}}">{{clientname}}</a></td>
        <td>{{clientgender}}</td>
        <td>{{clientbio}}</td>
        <td>{{clientphone1}}</td>
        <td>{{clientphone2}}</td>
        <td>{{clientemail}}</td>
        <td>{{clientstatus}}</td>
        <td>{{clientdatecrt}}</td>
        <td>
          <form action="index.php" method="get">
              <input type="hidden" name="page" value="mnt_cliente"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="clientid" value={{clientid}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
              <input type="hidden" name="page" value="mnt_cliente"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="clientid" value={{clientid}} />
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
        window.location.assign("index.php?page=mnt_cliente&mode=INS&clientid=0");
      });
    });
</script>
