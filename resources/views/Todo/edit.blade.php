<h1>Edition de la TODO : {{ $todo->title }}</h1>


<form action="{{route('todos.update', $todo->id)}}" method="POST">
    @csrf
    @method('PATCH')
    <input type="text" name="title" value='{{$todo->title}}' placeholder="Titre de la TODO">
    <button type="submit">Modifier</button>
</form>