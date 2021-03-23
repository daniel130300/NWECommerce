<h1>Gestión de Clientes</h1>
<section class="WWFilter">

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Genero</th>
        <th>Telefono 1</th>
        <th>Telefono 2</th>
        <th>Correo</th>
        <th>Identidad</th>
        <th>Biografia</th>
        <th>Estatus</th>
        <th>Creacion</th>
        <th>Usuario Creo</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{clientid}}</td>
        <td><a href="index.php?page=mntClientes_cliente&mode=DSP&clientid={{clientid}}">{{clientname}}</a></td>
        <td>{{clientgender}}</td>
        <td>{{clientphone1}}</td>
        <td>{{clientphone2}}</td>
        <td>{{clientemail}}</td>
        <td>{{clientIdnumber}}</td>
        <td>{{clientbio}}</td>
        <td>{{clientstatus}}</td>
        <td>{{clientdatecrt}}</td>
        <td>{{clientusercreates}}</td>
        <td>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mntClientes_cliente"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="clientid" value={{clientid}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mntClientes_cliente"/>
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
        window.location.assign("index.php?page=mntClientes_cliente&mode=INS&clientid=0");
      });
    });
</script>