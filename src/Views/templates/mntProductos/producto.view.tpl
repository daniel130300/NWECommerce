<h1>{{mode_dsc}}</h1>
<section>
  <form action="index.php?page=mntProductos_producto&mode={{mode}}&invPrdId={{invPrdId}}"
    method="POST" >
    <section>
    <label for="invPrdId">Código</label>
    <input type="hidden" id="invPrdId" name="invPrdId" value="{{invPrdId}}"/>
    <input type="text" readonly name="productddummy" value="{{invPrdId}}"/>
    </section>
    <section>
      <label for="invPrdBrCod">Código de barras</label>
      <input type="text" {{readonly}} name="invPrdBrCod" value="{{invPrdBrCod}}" maxlength="45" placeholder="0"/>
    </section>
    <section>
        <label for="invPrdCodInt">Código Interno</label>
        <input type="text" {{readonly}} name="invPrdCodInt" value="{{invPrdCodInt}}" maxlength="45" placeholder="0"/>
    </section>
    <section>
        <label for="invPrdDsc">Nombre</label>
        <input type="text" {{readonly}} name="invPrdDsc" value="{{invPrdDsc}}" maxlength="128" placeholder="Nombre"/>
    </section>
    <section>
        <label for="invPrdTip">Tipo de producto</label>
        <input type="text" {{readonly}} name="invPrdTip" value="{{invPrdTip}}" maxlength="3" placeholder="COM"/>
    </section>
    <section>
        <label for="invPrdEst">Estado</label>
        <select id="invPrdEst" name="invPrdEst" {{if readonly}}disabled{{endif readonly}}>
          <option value="ACT" {{invPrdEst_ACT}}>Activo</option>
          <option value="INA" {{invPrdEst_INA}}>Inactivo</option>
        </select>
    </section>
    <section>
        <label for="invPrdPadre">Código padre</label>
        <input type="text" {{readonly}} name="invPrdPadre" value="{{invPrdPadre}}" maxlength="45" placeholder="1234456700123"/>
    </section>
    <section>
        <label for="invPrdFactor">Factor</label>
        <input type="text" {{readonly}} name="invPrdFactor" value="{{invPrdFactor}}" maxlength="45" placeholder="Cantidad"/>
    </section>
    <section>
      <label for="invPrdVnd">Vendible</label>
      <select id="invPrdVnd" name="invPrdVnd" {{if readonly}}disabled{{endif readonly}}>
        <option value="SI" {{invPrdVnd_SI}}>Si</option>
        <option value="NO" {{invPrdVnd_NO}}>No</option>
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
        window.location.assign("index.php?page=mntProductos_productos");
      });
  });
</script>
