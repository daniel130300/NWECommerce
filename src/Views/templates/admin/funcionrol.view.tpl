<section class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card my-5 w-100">
      <div class="card-header">
        <h3 class="text-center">{{mode_dsc}}</h3>
      </div>
      <div class="card-body"> 
        <form class="form" method="post" action="index.php?page=admin_funcionrol&mode={{mode}}&RolId={{RolId}}&FuncionId={{FuncionId}}">
  
          <div class="form-group col-md-2">
            <label for="RolId">Código Rol</label>
            <input type="hidden" class="form-control" id="RolId" name="RolId" value="{{RolId}}"/>
            <input readonly type="text" class="form-control" name="RolIdDummy" value="{{RolId}}"/>
          </div>

          <div class="form-group col-md-4">
            <label for="FuncionId">Código Función</label>
            <input type="hidden" class="form-control" id="FuncionId" name="FuncionId" value="{{FuncionId}}"/>
            <input readonly type="text" class="form-control" name="FuncionIdDummy" value="{{FuncionId}}"/>
          </div>

          {{if notDisplayIns}}
          <div class="form-group col-md-4">
            <label for="FuncionRolEst">Estado</label>
            <br/>
            <select class="form-control" id="FuncionRolEst" name="FuncionRolEst" {{if readonly}}disabled{{endif readonly}}>
                <option value="ACT" {{FuncionRolEst_ACT}}>Activo</option>
                <option value="INA" {{FuncionRolEst_INA}}>Inactivo</option>
            </select>
          </div>
          {{endif notDisplayIns}}

          <div class="form-group col-md-4">
            <label for="FuncionExp">Fecha de expiración</label>
            <input type="date" class="form-control" id="FuncionExp" name="FuncionExp" value="{{FuncionExp}}" min="{{minimumDate}}" {{if readonly}}disabled{{endif readonly}}>
          </div>

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
          window.location.assign("index.php?page=admin_funcionesroles");
        });
    });
  </script>
  
  
  
