<h1>{{mode_dsc}}</h1>
<section>
  <form action="index.php?page=mnt_cliente&mode={{mode}}&clientid={{clientid}}" method="POST">
    <section>
      <label for="clientid">Código</label>
      <br/>
      <input type="hidden" id="clientid" name="clientid" value="{{clientid}}"/>
      <input readonly type="text" name="clientiddummy" value="{{clientid}}"/>
    </section>

    <section>
      <label for="clientIdnumber">Identidad</label>
      <br/>
      <input type="text" {{readonly}} id="clientIdnumber" name="clientIdnumber" value="{{clientIdnumber}}" maxlength="45" placeholder="Identidad del cliente"/>
    </section>

    <section>
      <label for="clientname">Nombre completo</label>
      <br/>
      <input type="text" {{readonly}} id="clientname" name="clientname" value="{{clientname}}" maxlength="128" placeholder="Nombre completo del cliente"/>
    </section>

    <section>
      <label for="clientbio">Biografía</label>
      <br/>
      <textarea id="clientbio" {{readonly}} name="clientbio" rows="4" cols="50" placeholder="Biografía del cliente">{{clientbio}}</textarea>
    </section>

    <section>
      <label for="clientgender">Género</label>
      <br/>
      <select id="clientgender" name="clientgender" {{if readonly}}disabled{{endif readonly}}>
        <option value="MAS" {{clientgender_MAS}}>Masculino</option>
        <option value="FEM" {{clientgender_FEM}}>Femenino</option>
      </select>
    </section>

    <section>
      <label for="clientphone1">Teléfono 1</label>
      <br/>
      <input type="text" {{readonly}} id="clientphone1" name="clientphone1" value="{{clientphone1}}" maxlength="255" placeholder="Primer teléfono del cliente"/>
    </section>

    <section>
      <label for="clientphone2">Teléfono 2</label>
      <br/>
      <input type="text" {{readonly}} id="clientphone2" name="clientphone2" value="{{clientphone2}}" maxlength="255" placeholder="Segundo teléfono del cliente"/>
    </section>

    <section>
      <label for="clientemail">Correo</label>
      <br/>
      <input type="email" {{readonly}} id="clientemail" name="clientemail" value="{{clientemail}}" maxlength="255" placeholder="Correo del cliente"/>
    </section>

    <section>
      <label for="clientstatus">Estado</label>
      <br/>
      <select id="clientstatus" name="clientstatus" {{disabled}}>
        <option value="ACT" {{clientstatus_ACT}}>Activo</option>
        <option value="INA" {{clientstatus_INA}}>Inactivo</option>
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
        window.location.assign("index.php?page=mnt_clientes");
      });
  });
</script>
