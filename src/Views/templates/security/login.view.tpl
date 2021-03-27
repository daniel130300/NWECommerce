<section class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <div class="d-flex flex-row justify-content-center">
    <div class="col-lg-10">
      <div class="card my-5">
        <div class="card-header">
          <h3 class="text-center">Iniciar Sesión</h3>
        </div>
        <div class="card-body"> 
          <form class="form" method="post" action="index.php?page=sec_login{{if redirto}}&redirto={{redirto}}{{endif redirto}}">
            <div class="form-group">
              <label for="txtEmail">Correo Electrónico</label>
              <input type="email" class="form-control" id="txtEmail" name="txtEmail" value="{{txtEmail}}" placeholder="Ingrese su correo">
            </div>

            {{if errorEmail}}
              <div class="my-3 text-danger">{{errorEmail}}</div>
            {{endif errorEmail}}

            <div class="form-group">
              <label for="txtPswd">Contraseña</label>
              <input type="password" class="form-control" id="txtPswd" name="txtPswd" value="{{txtPswd}}" placeholder="Ingrese su contraseña">
            </div>

            {{if errorPswd}}
              <div class="my-3 text-danger">{{errorPswd}}</div>
            {{endif errorPswd}}

            {{if generalError}}
            <div class="my-3 text-danger">
              {{generalError}}
            </div>
            {{endif generalError}}

            <button type="submit" id="btnLogin" class="btn btn-primary">Iniciar Sesión</button>
          </form>
        </div>
      </div>
    </div>  
  </div>
</section>
