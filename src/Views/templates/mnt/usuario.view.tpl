<h1>{{mode_dsc}}</h1>
<section>
  <form action="index.php?page=mnt_usuario&mode={{mode}}&usercod={{usercod}}" method="POST">
    <section>
      <label for="usercod">Código</label>
      <br/>
      <input type="hidden" id="usercod" name="usercod" value="{{usercod}}"/>
      <input readonly type="text" name="usercoddummy" value="{{usercod}}"/>
    </section>

    <section>
      <label for="useremail">Correo</label>
      <br/>
      <input type="email" {{readonly}} id="useremail" name="useremail" value="{{useremail}}" maxlength="80" placeholder="Correo del usuario"/>
    </section>

    <section>
      <label for="username">Nombre completo</label>
      <br/>
      <input type="text" {{readonly}} id="username" name="username" value="{{username}}" maxlength="80" placeholder="Nombre completo del usuario"/>
    </section>

    <section>
      <label for="userpswd">Contraseña</label>
      <br/>
      <input type="password" {{readonly}} id="userpswd" name="userpswd" value="{{userpswd}}" maxlength="20" placeholder="Contraseña del usuario"/>
    </section>

    {{if displayonly}}
    <section>
        <label for="userfching">Fecha de ingreso del usuario</label>
        <br/>
        <input readonly type="text" id="userfching" name="userfching" value="{{userfching}}" maxlength="128"/>
    </section>
    {{endif displayonly}}

    {{if displayonly}}
    <section>
        <label for="userpswdest">Estado de la contraseña</label>
        <br/>
        <input readonly type="text" id="userpswdest" name="userpswdest" value="{{userpswdest}}" maxlength="5"/>
    </section>
    {{endif displayonly}}

    {{if displayonly}}
    <section>
        <label for="userpswdexp">Fecha de vencimiento de la contraseña</label>
        <br/>
        <input readonly type="text" id="userpswdexp" name="userpswdexp" value="{{userpswdexp}}" maxlength="128"/>
    </section>
    {{endif displayonly}}

    <section>
      <label for="userest">Estado del usuario</label>
      <br/>
      <select id="userest" name="userest" {{if readonly}}disabled{{endif readonly}}>
        {{foreach estados}}
        <option value="{{ACT}}">{{this}}</option>
        {{endfor estados}}
      </select>
    </section>

    {{if displayonly}}
    <section>
        <label for="userpswdchg">Fecha en que se cambio la contraseña por última vez</label>
        <br/>
        <input readonly type="text" id="userpswdchg" name="userpswdchg" value="{{userpswdchg}}" maxlength="128"/>
    </section>
    {{endif displayonly}}

    <section>
        <label for="userest">Tipo de usuario</label>
        <br/>
        <select id="usertipo" name="usertipo" {{if readonly}}disabled{{endif readonly}}>
          {{foreach tipos}}
          <option value="{{ACT}}">{{this}}</option>
          {{endfor tipos}}
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
      <button type="submit" name="btnGuardar" value="G">Guardar</button>
      <button type="button" id="btnCancelar">Cancelar</button>
    </section>
  </form>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function(){
      document.getElementById("btnCancelar").addEventListener("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        window.location.assign("index.php?page=mnt_usuarios");
      });
  });
</script>
