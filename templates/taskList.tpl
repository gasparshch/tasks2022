{include file= 'templates/header.tpl'}

<h1>{$titulo}</h1>
<div class="container">
    <ul class="list-group">
        {foreach from=$tasks item=$task}
            <li class="list-group-item 
            {if $task->finalizada}
                finalizada
            {/if}
            ">
                <a href="viewTask/{$task->id_tarea}">{$task->titulo}</a>:{$task->descripcion|truncate:20|upper}
                <a href="deleteTask/{$task->id_tarea}" class="btn btn-danger">Borrar</a>
                {if !$task->finalizada}
                    <a href="updateTask/{$task->id_tarea}" class="btn btn-success">Done</a>
                {/if}
            </li>
        {/foreach}
    </ul>

    <h2>CREAR TAREA</h2>

    <form action="createTask" method="post">

        <input type="text" name="title" id="title">
        <input type="text" name="description" id="description">
        <input type="number" name="priority" id="priority">
        <input type="checkbox" name="done" id="done">

        <input type="submit" value="Guardar" class="btn btn-primary">

    </form>
</div>

{include file= 'templates/footer.tpl'}