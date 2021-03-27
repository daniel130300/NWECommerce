<!--
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
-->

<div class="table-responsive">
  <table class="table my-5">
    <thead class="thead-light">
      <tr>
        <th class="text-center align-middle">Código</th>
        <th class="text-center align-middle">Correo</th>
        <th class="text-center align-middle">Nombre del usuario</th>
        <th class="text-center align-middle">Fecha de ingreso</th>
        <th class="text-center align-middle">Estado de la contraseña</th>
        <th class="text-center align-middle">Fecha de expiración de la contraseña</th>
        <th class="text-center align-middle">Fecha en que se cambio la contraseña</th>
        <th class="text-center align-middle">Tipo de usuario</th>
        <th class="text-center align-middle"><button type="button" class="btn btn-primary my-2">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
        <tr>
          <td class="text-center align-middle">{{UsuarioId}}</td>
          <td class="text-center align-middle">{{UsuarioEmail}}</td>
          <td class="text-center align-middle"><a href="index.php?page=mnt_usuario&mode=DSP&usercod={{usercod}}">{{UsuarioNombre}}</a></td>
          <td class="text-center align-middle">{{UsuarioFching}}</td>
          <td class="text-center align-middle">{{UsuarioPswdEst}}</td>
          <td class="text-center align-middle">{{UsuarioPswdExp}}</td>
          <td class="text-center align-middle">{{UsuarioPswdChg}}</td>
          <td class="text-center align-middle">{{UsuarioTipo}}</td>
          <td class="text-center align-middle">
            <form action="index.php" method="get">
                <input type="hidden" name="page" value="mnt_usuario"/>
                <input type="hidden" name="mode" value="UPD" />
                <input type="hidden" name="usercod" value={{usercod}} />
                <button type="submit" class="btn btn-primary my-1">Editar</button>
            </form>
            <form action="index.php" method="get">
                <input type="hidden" name="page" value="mnt_usuario"/>
                <input type="hidden" name="mode" value="DEL" />
                <input type="hidden" name="usercod" value={{usercod}} />
                <button type="submit" class="btn btn-danger my-1">Eliminar</button>
            </form>
          </td>
        </tr>
        {{endfor items}}
    </tbody>
  </table>
</div>