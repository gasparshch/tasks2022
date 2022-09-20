<?php

function showHome() {

    $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="'.BASE_URL.'"/>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            
            <h1>TAREAS 2022</h1>
        
            <ul>';
                
            $tasks = getTasks();
            foreach($tasks as $tarea) {
                if($tarea->finalizada == 1) {
                    $html.= '<li> <strike>'.$tarea->titulo.': '.$tarea->descripcion.'</strike> - '.'<a href="deleteTask/'.$tarea->id_tarea.'">Borrar</a> - <a href="updateTask/'.$tarea->id_tarea.'">Done</a>'.'</li>';
                } else {
                    $html.= '<li>'.'<a href="viewTask/'.$tarea->id_tarea.'">'.$tarea->titulo.'</a>'.': '.$tarea->descripcion.' - '.'<a href="deleteTask/'.$tarea->id_tarea.'">Borrar</a> - <a href="updateTask/'.$tarea->id_tarea.'">Done</a>'.'</li>';

                }
            }

            $html .='
                    </ul>
                
                
                    <form action="createTask" method="post">
                
                        <input type="text" name="title" id="title">
                        <input type="text" name="description" id="description">
                        <input type="number" name="priority" id="priority">
                        <input type="checkbox" name="done" id="done">
                
                        <input type="submit" value="Guardar">
                
                    </form>
                
                </body>
                </html>
            ';

    echo $html;
}

function createTask() {

    // llego a esta función mediante el action del form
    // inserto en la db los datos capturados con inputs
    if(!isset($_POST['done'])) {
        $done = 0;
    } else {
        $done = 1;
    }
    insertTask($_POST['title'], $_POST['description'], $_POST['priority'], $done);

    // redirijo al home pero con la db actualizada
    header("Location: home");
}

function deleteTask($id) {

    // desde el route llego a esta función donde
    // llamo a la funcion borrar desde la db
    deleteTaskFromDB($id);

    // redirijo al home pero con la db actualizada
    header("Location: ".BASE_URL."home");

}

function updateTask($id) {

    // desde el route llego a esta función donde
    // llamo a la funcion actualizar desde la db
    updateTaskFromDB($id);

    // redirijo al home pero con la db actualizada
    header("Location: ".BASE_URL."home");

}

function viewTask($id) {

    // desde el route llego a esta función donde
    // llamo a la funcion borrar desde la db
    $tarea = getTask($id);

    echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="'.BASE_URL.'"/>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            
            <h1> Titulo: '.$tarea->titulo.'</h1>
            <h2> Descripcion: '.$tarea->descripcion.'</h2>
            <h2> Prioridad: '.$tarea->prioridad.'</h2>
            <h2> Tarea: '.$tarea->finalizada.'</h2>
            
        </body>
        </html>';

}