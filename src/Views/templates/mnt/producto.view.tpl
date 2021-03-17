<h1>{{mode_dsc}}</h1>
<section>
  <form action="index.php?page=mnt_producto&mode={{mode}}&invPrdId={{invPrdId}}" method="POST">
    <section>
      <label for="invPrdId">Código</label>
      <br/>
      <input type="hidden" id="invPrdId" name="invPrdId" value="{{invPrdId}}"/>
      <input readonly type="text" name="invPrdIddummy" value="{{invPrdId}}"/>
    </section>

    <section>
      <label for="invPrdBrCod">Código de barra</label>
      <br/>
      <input type="text" {{readonly}} id="invPrdBrCod" name="invPrdBrCod" value="{{invPrdBrCod}}" maxlength="128" placeholder="Código de barra del producto"/>
    </section>

    <section>
      <label for="invPrdDsc">Descripción</label>
      <br/>
      <input type="text" {{readonly}} id="invPrdDsc" name="invPrdDsc" value="{{invPrdDsc}}" maxlength="128" placeholder="Descripción del producto"/>
    </section>

    <section>
      <label for="invPrdTip">Tipo de producto</label>
      <br/>
      <select id="invPrdTip" name="invPrdTip" {{if readonly}}disabled{{endif readonly}}>
        <option value="EQG" {{invPrdTip_EQG}}>Equipo general</option>
        <option value="HGB" {{invPrdTip_HGB}}>Higiene bucal</option>
        <option value="BRA" {{invPrdTip_BRA}}>Brackets</option>
        <option value="YE" {{invPrdTip_YE}}>Yeso</option>
      </select>
    </section>

    <section>
      <label for="invPrdCodInt">Unidades</label>
      <br/>
      <input type="text" {{readonly}} id="invPrdCodInt" name="invPrdCodInt" value="{{invPrdCodInt}}" maxlength="128" placeholder="Unidades del producto"/>
    </section>

    <section>
        <label for="invPrdFactor">Fábrica</label>
        <br/>
        <select id="invPrdFactor" name="invPrdFactor" {{if readonly}}disabled{{endif readonly}}>
          <option value="1" {{invPrdFactor_1}}>Fábrica uno</option>
          <option value="2" {{invPrdFactor_2}}>Fábrica dos</option>
          <option value="3" {{invPrdFactor_3}}>Fábrica tres</option>
          <option value="4" {{invPrdFactor_4}}>Fábrica cuatro</option>
        </select>
    </section>

    <section>
        <label for="invPrdVnd">Vendedor</label>
        <br/>
        <select id="invPrdVnd" name="invPrdVnd" {{if readonly}}disabled{{endif readonly}}>
          <option value="DL" {{invPrdVnd_DL}}>Dávid López</option>
          <option value="HL" {{invPrdVnd_HL}}>Héctor López</option>
          <option value="JC" {{invPrdVnd_JC}}>José Castro</option>
          <option value="AG" {{invPrdVnd_AG}}>Armando Gutierrez</option>
        </select>
    </section>

    <section>
      <label for="invPrdEst">Estado</label>
      <br/>
      <select id="invPrdEst" name="invPrdEst" {{disabled}}>
        <option value="ACT" {{invPrdEst_ACT}}>Activo</option>
        <option value="INA" {{invPrdEst_INA}}>Inactivo</option>
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
        window.location.assign("index.php?page=mnt_productos");
      });
  });
</script>
