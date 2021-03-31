<!--
<h1>{{mode_dsc}}</h1>
<section>
  <form action="index.php?page=admin_rol&mode={{mode}}&rolescod={{rolescod}}"
    method="POST" >
    <section>
    <label for="rolescod">Código</label>
    <input type="hidden" id="rolescod" name="rolescod" value="{{rolescod}}"/>
    <input type="text" readonly name="productddummy" value="{{rolescod}}"/>
    </section>
    <section>
      <label for="rolesdsc">Descripción</label>
      <input type="text" {{readonly}} name="rolesdsc" value="{{rolesdsc}}" maxlength="45" placeholder=""/>
    </section>
    <section>
        <label for="rolesest">Estado</label>
        <select id="rolesest" name="rolesest" {{if readonly}}disabled{{endif readonly}}>
          <option value="ACT" {{rolesest_ACT}}>Activo</option>
          <option value="INA" {{rolesest_INA}}>Inactivo</option>
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
        window.location.assign("index.php?page=admin_roles");
      });
  });
</script>
-->


<section class="container d-flex align-items-center justify-content-center vh-100">
  <div class="card my-5 w-100">
    <div class="card-header">
      <h3 class="text-center">{{mode_dsc}}</h3>
    </div>
    <div class="card-body"> 
      <form class="form" method="post" action="index.php?page=admin_rol&mode={{mode}}&RolId={{RolId}}">

        <div class="form-group col-md-2">
          <label for="RolId">Código</label>
          <input type="hidden" class="form-control" id="RolId" name="RolId" value="{{RolId}}"/>
          <input readonly type="text" class="form-control" name="RolIdDummy" value="{{RolId}}"/>
        </div>

        <div class="form-group col-md-10">
          <label for="RolDsc">Descripción</label>
          <input type="text" class="form-control" {{readonly}} id="RolDsc" name="RolDsc" value="{{RolDsc}}" maxlength="45" placeholder="Ingrese la descripción del rol">
        </div>

        {{if notDisplayIns}}
        <div class="form-group col-md-4">
          <label for="RolEst">Estado</label>
          <br/>
          <select class="form-control" id="RolEst" name="RolEst" {{if readonly}}disabled{{endif readonly}}>
              <option value="ACT" {{RolEst_ACT}}>Activo</option>
              <option value="INA" {{RolEst_INA}}>Inactivo</option>
          </select>
        </div>
        {{endif notDisplayIns}}

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
        window.location.assign("index.php?page=admin_roles");
      });
  });
</script>








