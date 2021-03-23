<h1>{{mode_dsc}}</h1>
<section>
  <form action="index.php?page=mntUsuarios_usuario&mode={{mode}}&usercod={{usercod}}"
    method="POST" >
    <section>
    <label for="usercod">Código</label>
    <input type="hidden" id="usercod" name="usercod" value="{{usercod}}"/>
    <input type="text" readonly name="productddummy" value="{{usercod}}"/>
    </section>
    <section>
      <label for="useremail">Correo</label>
      <input type="text" {{readonly}} name="useremail" value="{{useremail}}" maxlength="80" placeholder="correo@dominio.com"/>
    </section>
    <section style="display: {{displayPwd}};">
        <label for="username">Contraseña</label>
        <input type="password" name="userpswd" value="{{userpswd}}" maxlength="80" placeholder="Contraseña"/>
    </section>
    <section style="display: {{display}};">
        <label for="username">Nombre</label>
        <input type="text" {{readonly}} name="username" value="{{username}}" maxlength="80" placeholder=""/>
    </section>
    <section style="display: {{display}};">
        <label for="userest">Estado usuario</label>
        <select id="userest" name="userest" {{if readonly}}disabled{{endif readonly}}>
          <option value="ACT" {{userest_ACT}}>Activo</option>
          <option value="INA" {{userest_INA}}>Inactivo</option>
        </select>
    </section>
    <section style="display: {{display}};">
        <label for="usertipo">Tipo usuario</label>
        <select id="usertipo" name="usertipo" {{if readonly}}disabled{{endif readonly}}>
          <option value="PBL" {{usertipo_PBL}}>Publico</option>
          <option value="ADM" {{usertipo_ADM}}>Administrador</option>
          <option value="AUD" {{usertipo_AUD}}>Auditor</option>
        </select>
    </section>
    {{if hasErrors}}
        <section>
          <ul>
            {{foreach aErrors}}
                <li>{{this}}</li>
            {{endfor aErrors}}
          </ul>
        </section>
    {{endif hasErrors}}
    <section>
      {{if showaction}}
      <button type="submit" name="btnGuardar" value="G">Guardar</button>
      {{endif showaction}}
      <button type="button" id="btnCancelar">Cancelar</button>
    </section>
  </form>
</section>


<script>
  document.addEventListener("DOMContentLoaded", function(){
      document.getElementById("btnCancelar").addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mntUsuarios_usuarios");
      });
  });
</script>
