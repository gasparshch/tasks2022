<?php

class TaskModel{

    private $db;

    function __construct(){
        // me conecto a la base de datos, abro conexión
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tasks2022;charset=utf8', 'root', '');
    }

    function getTasks() {
    
        // preparo la sentencia para devolver el resultado
        $sentencia = $this->db->prepare("select * from tareas");
        
        $sentencia->execute();
        $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
        // devuelvo todo el array de tareas
        return $tareas;
    
    }

    function insertTask($titulo, $descripcion, $prioridad, $finalizada) {

        // preparo la sentencia para insertar
        $sentencia = $this->db->prepare("INSERT INTO tareas(titulo, descripcion, prioridad, finalizada) VALUES(?, ?, ?, ?) ");
    
        // ejecuto la sentencia, le paso un arreglo que va a tomar esos signos de pregunta
        $sentencia->execute(array($titulo, $descripcion, $prioridad, $finalizada));
    
    }

    function deleteTaskFromDB($id) {

        // preparo la sentencia para borrar
        $sentencia = $this->db->prepare("DELETE FROM tareas WHERE id_tarea=?");
    
        // ejecuto la sentencia
        $sentencia->execute(array($id));
    }

    function updateTaskFromDB($id) {

        // preparo la sentencia para actualizar
        $sentencia = $this->db->prepare("UPDATE tareas SET finalizada=1 WHERE id_tarea=?");
    
        // ejecuto la sentencia
        $sentencia->execute(array($id));
    }

    function getTask($id) {

        // preparo la sentencia para devolver el resultado
        // el resultado es un solo objeto que busqué con el id
        $sentencia = $this->db->prepare("select * from tareas WHERE id_tarea=?");
        
        // lo ejecuto y capturo
        $sentencia->execute(array($id));
        $tarea = $sentencia->fetch(PDO::FETCH_OBJ);
    
        // devuelvo todo el array de tareas
        return $tarea;
        
    }

}