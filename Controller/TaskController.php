<?php
require_once './Model/TaskModel.php';
require_once './View/TaskView.php';

class TaskController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new TaskModel();
        $this->view = new TaskView();
    }

    function showHome(){

        $tasks = $this->model->getTasks();
        $this->view->showTasks($tasks);

    }

    function createTask(){

        if(!isset($_POST['done'])) {
            $done = 0;
        } else {
            $done = 1;
        }
        $this->model->insertTask($_POST['title'], $_POST['description'], $_POST['priority'], $done);

        // redirijo al home pero con la db actualizada
        $this->view->showHomeLocation();

    }

    function deleteTask($id) {

        $this->model->deleteTaskFromDB($id);
    
        // redirijo al home pero con la db actualizada
        $this->view->showHomeLocation();
    
    }

    function updateTask($id) {

        // desde el route llego a esta función donde
        // llamo a la funcion actualizar desde la db
        $this->model->updateTaskFromDB($id);
    
        // redirijo al home pero con la db actualizada
        $this->view->showHomeLocation();
    
    }

    function viewTask($id) {

        // desde el route llego a esta función donde
        // llamo a la funcion borrar desde la db
        $task = $this->model->getTask($id);
        $this->view->showTask($task);
    
    }

}