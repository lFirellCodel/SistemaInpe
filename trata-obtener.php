<?php

require_once './config.php';

$id = $_POST['id'];


try {
    $lista = TratamientoDAO::obtener($id);
   
} catch (Exception $e) {
    echo $e->getMessage('error');
}
var_dump($lista[0]);

                foreach ($lista as $l){
                        echo $l->id;
                        echo $l->participa_trata;
                        echo $l->tratamiento;
                        echo $l->motivo;
                    }
  ?>    

<form method="post" class="form_edi" action="" onsubmit="return false">
                <fieldset>
                    <legend>Registro de antecedentes</legend>
                    <div class="form-group col-md-4" id="trata_tipo">
                            <label>Participa Actividades de Tratamiento</label><br>
                            <input type="radio" name="act_trata" value="1" />SI<br>
                            <input type="radio" name="act_trata"  value="2"/>NO
        
                        </div>
                    
                    <div class="row">
                        <div class="form-group col-md-4 " id="tratmiento" style="display:none">
                            <label>Actividades de Tratamiento</label><br>
                            <input type="checkbox"  value="Para accseder Beneficion peniten"    name="tratamiento[]">:Para acceder a bebeficios penitenciarios<br>
                            <input type="checkbox"  value="Para cambiar conducta"    name="tratamiento[]">:Para cambiar su conducta<br>
                            <input type="checkbox"  value="Para no se trasladado"      name="tratamiento[]">:Para no ser trasladado del penal<br>
                            <input type="checkbox"  value="otros"      name="tratamiento[]">:otros
                        </div>
                      
                    </
                    
                    <div class="row">
                        <div class="form-group col-md-4" id="motivo" style="display:none">
                             <label>Motivo por que No Participa</label><br>
                            <input type="checkbox"  value="Penas Altas" name="motivo[]">:Tiene penas altas <br>
                            <input type="checkbox"  value="Penas Bajas"       name="motivo[]">:Tiene penas cortas <br>
                            <input type="checkbox"  value="No Tiene Acceso Benefi"      name="motivo[]">:No tiene acceso a beneficios<br>
                            <input type="checkbox"  value="No Tiene Apoyo Fam"      name="motivo[]">:No tiene apoyo familiar<br>
                            <input type="checkbox"  value="No tiene Info"      name="motivo[]">:No tiene mayor informacion<br>
                            <input type="checkbox"  value="No tiene Tiempo"      name="motivo[]">:No tiene tiempo pro trabajar<br>
                             <input type="checkbox"  value="No Inscrito"      name="motivo[]">:No se inscribio oportunamente<br>
                            
                        </div>
                    
                </fieldset>
                  <button id="btn_update" data-id="" data-nom="" data-edad="" data-ing="" data-lug="" data-grad="" data-del="" data-civ="" data-oac="" data-oan="" data-jur="" class="btn btn-success" onclick="update_inpe()" >ActualizarbyJeremy</button>
                  <button type="submit" class="btn btn-default" onclick="registrar_ante()">Registrar</button>
            </form>

                    
                    
 <?php 
 $l->id = $id;
 $l->participa_trata = $_POST['act_trata'];
 $l->tratamiento = $_POST['tratamiento[]'];
 $l->motivo= $_POST['motivo[]']; 

$trata= new Tratamiento();
$trata->id = $id; 
$trata->participa_trata = $participa;
$trata->tratamiento = (is_null($tratamiento)== TRUE?$nada2:$t);
$trata->motivo= (is_null($motivo)== TRUE?$nada:$moti);

TratamientoDAO::actualizar($trata);
                    
                    
                
                    
                  
                    