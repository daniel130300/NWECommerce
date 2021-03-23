<h1>Gestión de Roles</h1>
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
        <th><button id="btnAdd">Nuevo</button></th>
      </tr>
    </thead>
    <tbody>
      {{foreach items}}
      <tr>
        <td>{{rolescod}}</td>
        <td><a href="index.php?page=mntRoles_rol&mode=DSP&rolescod={{rolescod}}">{{rolesdsc}}</a></td>
        <td>{{rolesest}}</td>
        <td>
          <form action="index.php" method="get">
             <input type="hidden" name="page" value="mntRoles_rol"/>
              <input type="hidden" name="mode" value="UPD" />
              <input type="hidden" name="rolescod" value={{rolescod}} />
              <button type="submit">Editar</button>
          </form>
          <form action="index.php" method="get">
            <input type="hidden" name="page" value="mntRoles_rol"/>
             <input type="hidden" name="mode" value="DEL" />
             <input type="hidden" name="rolescod" value={{rolescod}} />
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
        window.location.assign("index.php?page=mntRoles_rol&mode=INS&rolescod=0");
      });

      document.getElementById("btnVolver").addEventListener("click", function(e){
          e.preventDefault();
          e.stopPropagation();
          window.location.assign("index.php?page=admin_admin");
        });
    });
</script>