<?php
include_once 'Conexion.php';

class Dependencia {
    var $objetos;
    var $acceso;

    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    //----------------------------//
    //Funcion Crear               //
    //----------------------------//
    public function Crear ($nombre){
        $sql = "INSERT INTO dependencia (nom_dep) VALUE (:nombre)";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));    
        echo 'add';
    }  

    //-----------------------------------------------------------
    // Editar
    //-----------------------------------------------------------
    function Editar($id, $nombre){
        $sql = "UPDATE dependencia SET nom_dep=:nombre 
                WHERE id_dep = :id";        
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id,':nombre'=>$nombre));
        echo 'update';
    }

    //-----------------------------------------------------------
    // Eliminar
    //-----------------------------------------------------------
    function Eliminar($id){
        $sql = "DELETE FROM dependencia WHERE id_dep = :id";        
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id)); 
        if(!empty($query->execute(array(':id'=>$id))))
            echo 'eliminado';
        else 
            echo 'noeliminado';
    }

    //-----------------------------------------------------------
    // Buscar los registros segun criterio de busqueda en consulta
    //-----------------------------------------------------------
    function BuscarTodos($consulta){
        if(!empty($consulta)){                
            $sql = "SELECT * FROM dependencia WHERE nom_dep LIKE :consulta";      
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos = $query->fetchall();
        }
        else{
            $sql = "SELECT * FROM dependencia WHERE nom_dep NOT LIKE '' ORDER BY id_dep";          
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
        }
        //Retorna la consulta
        return $this->objetos;    
    }

    //--------------------------------
    //Busca un usuario segun el ID
    //--------------------------------
    function Buscar($id){
        $sql = 'SELECT * FROM dependencia WHERE id_dep = :id';
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
}
?>