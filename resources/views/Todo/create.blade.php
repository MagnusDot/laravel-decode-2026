<h1>Creation d'une TODO</h1>


<form action="{{route('todos.store')}}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Titre de la TODO">
    <button type="submit">Créer</button>
</form>