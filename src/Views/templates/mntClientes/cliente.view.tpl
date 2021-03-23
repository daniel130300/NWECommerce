<h1>{{mode_dsc}}</h1>
<section>
  <form action="index.php?page=mntClientes_cliente&mode={{mode}}&clientid={{clientid}}"
    method="POST" >
    <section>
    <label for="clientid">Código</label>
    <input type="hidden" id="clientid" name="clientid" value="{{clientid}}"/>
    <input type="text" readonly name="clientiddummy" value="{{clientid}}"/>
    </section>
    <section>
      <label for="clientname">Nombre</label>
      <input type="text" {{readonly}} name="clientname" value="{{clientname}}" maxlength="45" placeholder="Nombre de Cliente"/>
    </section>
    <section>
        <label for="clientgender">Genero</label>
        <select id="clientgender" name="clientgender" {{if readonly}}disabled{{endif readonly}}>
            <option value="M" {{clientgender_M}}>Masculino</option>
            <option value="F" {{clientgender_F}}>Femenino</option>
        </select>
    </section>
    <section>
        <label for="clientphone1">Telefono 1</label>
        <input type="text" {{readonly}} name="clientphone1" value="{{clientphone1}}" maxlength="9" placeholder="0000-0000"/>
    </section>
    <section>
        <label for="clientphone2">Telefono 2</label>
        <input type="text" {{readonly}} name="clientphone2" value="{{clientphone2}}" maxlength="49" placeholder="0000-0000"/>
    </section>
    <section>
        <label for="clientemail">Correo</label>
        <input type="text" {{readonly}} name="clientemail" value="{{clientemail}}" maxlength="45" placeholder="123@unicah.edu"/>
    </section>
    <section>
        <label for="clientIdnumber">Identidad</label>
        <input type="text" {{readonly}} name="clientIdnumber" value="{{clientIdnumber}}" maxlength="45" placeholder="1234456700123"/>
    </section>
    <section>
        <label for="clientbio">Biografia</label>
        <input type="text" {{readonly}} name="clientbio" value="{{clientbio}}" maxlength="45" placeholder="informacion"/>
    </section>
    <section>
      <label for="clientstatus">Estado</label>
      <select id="clientstatus" name="clientstatus" {{if readonly}}disabled{{endif readonly}}>
        <option value="ACT" {{clientstatus_ACT}}>Activo</option>
        <option value="INA" {{clientstatus_INA}}>Inactivo</option>
      </select>
    </section>
    <section>
        <label for="clientusercreates">Usuario</label>
        <input type="text" {{readonly}} name="clientusercreates" value="{{clientusercreates}}" maxlength="45" placeholder="X"/>
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
        window.location.assign("index.php?page=mntClientes_clientes");
      });
  });
</script>
