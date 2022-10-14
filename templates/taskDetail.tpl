{include file='templates/header.tpl'}

<div class="container">
    <h1> Titulo: {$tarea->titulo}</h1>
    <h2> Descripcion: {$tarea->descripcion}</h2>
    <h2> Prioridad: {$tarea->prioridad}</h2>
    <h2> Finalizada: {$tarea->finalizada}</h2>

    <a href="home">VOLVER</a>
</div>

{include file='templates/footer.tpl'}