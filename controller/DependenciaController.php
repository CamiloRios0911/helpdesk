<?php
 include_once '../model/Dependencia.php';
 $dependencia = new Dependencia();

 //-------------------------------------------------------------------
 // Funcion para crear 
 //-------------------------------------------------------------------
 if ($_POST['funcion']=='crear'){
     $dependencia->Crear($_POST['nombre']);
 }

//-------------------------------------------------------------------
// Funcion para editar
//-------------------------------------------------------------------
if ($_POST['funcion']=='editar'){
    $dependencia->Editar($_POST['id'], $_POST['nombre']);
}

//-------------------------------------------------------------------
// Funcion eliminar
//-------------------------------------------------------------------
if ($_POST['funcion']=='eliminar'){
    $dependencia->Eliminar($_POST['id']);        
}

//-------------------------------------------------------------------
// Funcion para buscar todos los registros  
//-------------------------------------------------------------------
if ($_POST['funcion']=='buscar_todos'){
    //Variable que almacena la consulta en formato JSON
    $json=array();
    //LLamado al modelo
    $dependencia->BuscarTodos($_POST['dato']);
    foreach ($dependencia->objetos as $objeto) {
        $json[]=array(
                        'id'=>$objeto->id_dep,
                        'nombre'=>$objeto->nom_dep
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

//-------------------------------------------------------------------
// Funcion para buscar todos los registros DATATABLES
//-------------------------------------------------------------------
if ($_POST['funcion']=='listar'){
    //Variable que almacena la consulta en formato JSON
    $json=array();
    //LLamado al modelo
    $dependencia->BuscarTodos('');
    foreach ($dependencia->objetos as $objeto) {
        $json[]=array(
                        'id'=>$objeto->id_dep,
                        'nombre'=>$objeto->nom_dep
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

//-------------------------------------------------------------------
// Funcion para buscar un registros  
//-------------------------------------------------------------------
if ($_POST['funcion']=='buscar'){
    //Variable que almacena la consulta en formato JSON
    $json=array();
    //LLamado al modelo
    $dependencia->Buscar($_POST['dato']);
    foreach ($dependencia->objetos as $objeto) {
        
        $json[]=array(
                        'id'=>$objeto->id_dep,
                        'nombre'=>$objeto->nom_dep
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
?>