<h1>Gestión de Usuarios</h1>
<section class="WWFilter">

</section>

<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Correo</th>
        <th>Nombre del usuario</th>
        <th>Fecha de ingreso</th>
        <th>Estado de la contraseña</th>
        <th>Fecha de expiración de la contraseña</th>
        <th>Fecha en que se cambio la contraseña</th>
        <th>Tipo de usuario</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{usercod}}</td>
        <td>{{useremail}}</td>
        <td><a href="index.php?page=mnt_usuario&mode=DSP&usercod={{usercod}}">{{username}}</a></td>
        <td>{{userfching}}</td>
        <td>{{userpswdest}}</td>
        <td>{{userpswdexp}}</td>
        <td>{{userpswdchg}}</td>
        <td>{{usertipo}}</td>
        <td>
          <form action="index.php" method="get">
              <input type="hidden" name="page" value="mnt_usuario"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="usercod" value={{usercod}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
              <input type="hidden" name="page" value="mnt_usuario"/>
              <input type="hidden" name="mode" value="DEL" />
              <input type="hidden" name="usercod" value={{usercod}} />
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
        window.location.assign("index.php?page=mnt_usuario&mode=INS&usercod=0");
      });
    });
</script>
