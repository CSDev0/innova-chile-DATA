<?php
require_once('models/Usuario.php');
$qui = utils::getContenidoByTipo('Quienes Somos');

$des = utils::getContenidoByTipo('Datos destacados');
$dat = utils::getContenidoByTipo('Data');
$est = utils::getContenidoByTipo('Estudios');
$chi = utils::getContenidoByTipo('Chile en el mundo');
?>

<h2> Gestionar <b>Textos</b></h2>
<hr>

<div class="row">
    <p class="col-sm-10"> A continuación se encuentran los botones correspondientes a cada sección de la pagina principal, en la cual podrás editar los textos referentes a ellas.</p>

    <div class="col-sm-10 contenedor-gestion">
        
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" tipo="<?php if($qui){ echo $qui->tipo;} ?>" 
                
                texto="<?php if($qui){echo htmlentities($qui->texto);} ?>" usuario_modificacion="<?php if($qui){echo utils::getUsuarioNombre($qui->Usuario_id);} ?>" 
                
                ultima_modificacion="<?php if($qui){echo utils::getTiempo($qui->ultima_modificacion);} ?>" nombre="<?php if($qui){echo $qui->nombre;}?>">
            
            <i class="fas fa-edit"></i> Quienes somos</button>
            
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" tipo="<?php if($des){echo $des->tipo;} ?>" 
                
                texto="<?php if($des){echo htmlentities($des->texto);} ?>" usuario_modificacion="<?php if($des){ echo utils::getUsuarioNombre($des->Usuario_id);} ?>" 
                
                ultima_modificacion="<?php if($des){echo utils::getTiempo($des->ultima_modificacion);} ?>" nombre="<?php if($des){echo $des->nombre;}?>">
            
            <i class="fas fa-edit"></i> Datos destacados</button>
            
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" tipo="<?php if($dat){echo $dat->tipo;}?>" 
                
                texto="<?php if($dat){echo htmlentities($dat->texto);} ?>" usuario_modificacion=""<?php if($dat){echo utils::getUsuarioNombre($dat->Usuario_id);} ?>"
                ultima_modificacion="<?php if($dat){echo utils::getTiempo($dat->ultima_modificacion);} ?>" nombre="<?php if($dat){echo $dat->nombre;}?>">
            
            <i class="fas fa-edit"></i> Data</button>
            
        <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" tipo="<?php if($est){echo $est->tipo;} ?>" 
                
                texto="<?php if($est){echo htmlentities($est->texto);} ?>" usuario_modificacion="<?php if($est){echo utils::getUsuarioNombre($est->Usuario_id);} ?>"
                
                ultima_modificacion="<?php  if($est){echo utils::getTiempo($est->ultima_modificacion);} ?>" nombre="<?php if($est){echo $est->nombre;}?>">
            
            <i class="fas fa-edit"></i> Estudios</button>
            
            <button class="btn btn-primary btn-abrir-modal-contenido" href="#modal-contenido" data-toggle="modal" tipo="<?php if($chi){echo $chi->tipo;} ?>" 
                    
                 texto="<?php if($chi){echo htmlentities($chi->texto);} ?>" usuario_modificacion="<?php if($chi){echo utils::getUsuarioNombre($chi->Usuario_id);} ?>" 
                 
                 ultima_modificacion="<?php if($chi){echo utils::getTiempo($chi->ultima_modificacion);} ?>" nombre="<?php if($chi){echo $chi->nombre;}?>">
                
            <i class="fas fa-edit"></i> Chile en el mundo</button>
        <br><br>
    </div>
</div>
</div>
</div>
</div>
</div>
