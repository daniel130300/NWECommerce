<!--
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
-->

<section class="container d-flex align-items-center justify-content-center">
  <div class="card my-5 w-100">
    <div class="card-header">
      <h3 class="text-center">{{mode_dsc}}</h3>
    </div>
    <div class="card-body"> 
      <form class="form" method="post" action="index.php?page=mnt_usuario&mode={{mode}}&UsuarioId={{UsuarioId}}">

        <div class="form-group col-md-2">
          <label for="UsuarioId">Código</label>
          <input type="hidden" class="form-control" id="UsuarioId" name="UsuarioId" value="{{UsuarioId}}"/>
          <input readonly type="text" class="form-control" name="UsaurioIdDummy" value="{{UsuarioId}}"/>
        </div>
  
        <div class="form-group col-md-10">
          <label for="UsuarioEmail">Correo Electrónico</label>
          <input type="email" class="form-control" {{readonly}} id="UsuarioEmail" name="UsuarioEmail" value="{{UsuarioEmail}}" maxlength = "80" placeholder="Ingrese su correo">
        </div>

        <div class="form-group col-md-10">
          <label for="UsuarioNombre">Nombre Completo</label>
          <input type="text" class="form-control" {{readonly}} id="UsuarioNombre" name="UsuarioNombre" value="{{UsuarioNombre}}" maxlength="80" placeholder="Ingrese su nombre completo">
        </div>

        <div class="form-group col-md-10">
          <label for="UsuarioPswd">Contraseña</label>
          <input type="password" class="form-control" {{readonly}} id="UsuarioPswd" name="UsuarioPswd" value="{{UsuarioPswd}}" maxlength="20" placeholder="Ingrese su nombre contraseña">
        </div>

        {{if allInfoDisplayed}}
        <div class="form-group col-md-10">
            <label for="UsuarioFching">Fecha de ingreso del usuario</label>
            <br/>
            <input type="text" readonly class="form-control" id="UsuarioFching" name="UsuarioFching" value="{{UsuarioFching}}" maxlength="128"/>
        </div>
        {{endif allInfoDisplayed}}
    
        {{if allInfoDisplayed}}
        <div class="form-group col-md-10">
            <label for="UsuarioPswdEst">Estado de la contraseña</label>
            <br/>
            <input type="text" readonly class="form-control" id="UsuarioPswdEst" name="UsuarioPswdEst" value="{{UsuarioPswdEst}}" maxlength="5"/>
        </div>
        {{endif allInfoDisplayed}}
    
        {{if allInfoDisplayed}}
        <div class="form-group col-md-10">
            <label for="UsuarioPswdExp">Fecha de vencimiento de la contraseña</label>
            <br/>
            <input type="text" readonly class="form-control" id="UsuarioPswdExp" name="UsuarioPswdExp" value="{{UsuarioPswdExp}}" maxlength="128"/>
        </div>
        {{endif allInfoDisplayed}}

        <div class="form-group col-md-4">
          <label for="UsuarioEst">Estado del usuario</label>
          <br/>
          <select class="form-control" id="UsuarioEst" name="UsuarioEst" {{if readonly}}disabled{{endif readonly}}>
              <option value="ACT" {{UsuarioEst_ACT}}>Activo</option>
              <option value="INA" {{UsuarioEst_INA}}>Inactivo</option>
          </select>
        </div>

        {{if allInfoDisplayed}}
        <div class="form-group col-md-10">
          <label for="UsuarioPswdChg">Fecha en que se cambio la contraseña por última vez</label>
          <br/>
          <input type="text" readonly class="form-control" id="UsuarioPswdChg" name="UsuarioPswdChg" value="{{UsuarioPswdChg}}" maxlength="128"/>
        </div>
        {{endif allInfoDisplayed}}

        <div class="form-group col-md-4">
          <label for="UsuarioTipo">Tipo de usuario</label>
          <br/>
          <select class="form-control" id="UsuarioTipo" name="UsuarioTipo"{{if readonly}}disabled{{endif readonly}}>
            <option value="ADM">Administrador</option>
            <option value="AUD">Auditor</option>
            <option value="PBL">Público</option>
          </select>
        </div>

        {{if hasErrors}}
        <section>
            <ul>
              {{foreach aErrors}}
                <li class="text-danger my-2">{{this}}</li>
              {{endfor aErrors}}
            </ul>
        </section>
        {{endif hasErrors}}
        
        <button type="button" class="btn btn-warning mt-2 ml-3 mr-2" id="btnCancelar" name="btnCancelar">Cancelar</button>
        {{if showaction}}
          <button type="submit" class="btn btn-primary mt-2 mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
        {{endif showaction}}
      </form>
    </div>
  </div>
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


