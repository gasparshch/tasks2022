<?php

require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class TaskView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showTasks($tasks){
        // asignación
        $this->smarty->assign('titulo', 'Lista de TAREAS');
        $this->smarty->assign('tasks', $tasks);
        // renderizado
        $this->smarty->display('templates/taskList.tpl');
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function showTask($tarea){

        $this->smarty->assign('tarea', $tarea);
        $this->smarty->display('templates/taskDetail.tpl');       

    }

}