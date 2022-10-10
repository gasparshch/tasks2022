<?php

function getTasks() {

    // me conecto a la base de datos, abro conexión
    $db = new PDO('mysql:host=localhost;'.'dbname=db_tasks2022;
    charset=utf8', 'root', '');

    // preparo la sentencia para devolver el resultado
    $sentencia = $db->prepare("select * from tareas");
    
    $sentencia->execute();
    $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);

    // devuelvo todo el array de tareas
    return $tareas;

}

function getTask($id) {

    // me conecto a la base de datos, abro conexión
    $db = new PDO('mysql:host=localhost;'.'dbname=db_tasks2022;charset=utf8', 'root', '');

    // preparo la sentencia para devolver el resultado
    // el resultado es un solo objeto que busqué con el id
    $sentencia = $db->prepare("select * from tareas WHERE id_tarea=?");
    
    // lo ejecuto y capturo
    $sentencia->execute(array($id));
    $tarea = $sentencia->fetch(PDO::FETCH_OBJ);

    // devuelvo todo el array de tareas
    return $tarea;
    
}

function insertTask($titulo, $descripcion, $prioridad, $finalizada) {

    // me conecto a la base de datos, abro conexión
    $db = new PDO('mysql:host=localhost;'.'dbname=db_tasks2022;charset=utf8', 'root', '');

    // preparo la sentencia para insertar
    $sentencia = $db->prepare("INSERT INTO tareas(titulo, descripcion, prioridad, finalizada) VALUES(?, ?, ?, ?) ");

    // ejecuto la sentencia, le paso un arreglo que va a tomar esos signos de pregunta
    $sentencia->execute(array($titulo, $descripcion, $prioridad, $finalizada));

}

function deleteTaskFromDB($id) {

    // me conecto a la base de datos, abro conexión
    $db = new PDO('mysql:host=localhost;'.'dbname=db_tasks2022;charset=utf8', 'root', '');

    // preparo la sentencia para borrar
    $sentencia = $db->prepare("DELETE FROM tareas WHERE id_tarea=?");

    // ejecuto la sentencia
    $sentencia->execute(array($id));
}

function updateTaskFromDB($id) {

    // me conecto a la base de datos, abro conexión
    $db = new PDO('mysql:host=localhost;'.'dbname=db_tasks2022;charset=utf8', 'root', '');

    // preparo la sentencia para actualizar
    $sentencia = $db->prepare("UPDATE tareas SET finalizada=1 WHERE id_tarea=?");

    // ejecuto la sentencia
    $sentencia->execute(array($id));
}