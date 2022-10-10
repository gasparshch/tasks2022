<?php

class TaskView{

    function __construct(){

    }

    function showTasks($tasks){

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="'.BASE_URL.'"/>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
            <title>Document</title>
        </head>
        <body>
            
            <h1>TAREAS 2022</h1>
        
            <ul>';
                
            
            foreach($tasks as $tarea) {
                if($tarea->finalizada == 1) {
                    $html.= '<li> <strike>'.$tarea->titulo.': '.$tarea->descripcion.'</strike> - '.'<a href="deleteTask/'.$tarea->id_tarea.'" class="btn btn-danger">Borrar</a> - <a href="updateTask/'.$tarea->id_tarea.'" class="btn btn-success">Done</a>'.'</li>';
                } else {
                    $html.= '<li>'.'<a href="viewTask/'.$tarea->id_tarea.'">'.$tarea->titulo.'</a>'.': '.$tarea->descripcion.' - '.'<a href="deleteTask/'.$tarea->id_tarea.'" class="btn btn-danger">Borrar</a> - <a href="updateTask/'.$tarea->id_tarea.'" class="btn btn-success">Done</a>'.'</li>';

                }
            }

            $html .='
                    </ul>
                
                    <h2>CREAR TAREA</h2>
                    <form action="createTask" method="post">
                
                        <input type="text" name="title" id="title">
                        <input type="text" name="description" id="description">
                        <input type="number" name="priority" id="priority">
                        <input type="checkbox" name="done" id="done">
                
                        <input type="submit" value="Guardar" class="btn btn-primary">
                
                    </form>
                
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
                </body>
                </html>
            ';

        echo $html;

    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function showTask($tarea){

        echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <base href="'.BASE_URL.'"/>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
                <title>Document</title>
            </head>
            <body>
                
                <h1> Titulo: '.$tarea->titulo.'</h1>
                <h2> Descripcion: '.$tarea->descripcion.'</h2>
                <h2> Prioridad: '.$tarea->prioridad.'</h2>
                <h2> Finalizada: '.$tarea->finalizada.'</h2>
                
                <a href="home">VOLVER</a>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
            </body>
            </html>';

    }

}