
<h1>Gestión de Usuarios</h1>
<button id="btnVolver">Volver</button>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Correo</th>
        <th>Nombre</th>
        <th>Fecha creación</th>
        <th>Estado contraseña</th>
        <th>Expiracion contraseña</th>
        <th>Estado usuario</th>
        <th>Fecha contrase{a</th>
        <th>Tipo de usuario</th>
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{usercod}}</td>
        <td>{{useremail}}</td>
        <td><a href="index.php?page=mntUsuarios_usuario&mode=DSP&usercod={{usercod}}">{{username}}</a></td>
        <td>{{userfching}}</td>
        <td>{{userpswdest}}</td>
        <td>{{userpswdexp}}</td>
        <td>{{userest}}</td>
        <td>{{userpswdchg}}</td>
        <td>{{usertipo}}</td>
        <td>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mntUsuarios_usuario"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="usercod" value={{usercod}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
            <input type="hidden" name="page" value="mntUsuarios_usuario"/>
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
           window.location.assign("index.php?page=mntUsuarios_usuario&mode=INS&usercod=0");
      });

      document.getElementById("btnVolver").addEventListener("click", function(e){
          e.preventDefault();
          e.stopPropagation();
          window.location.assign("index.php?page=admin_admin");
        });
    });
</script>


