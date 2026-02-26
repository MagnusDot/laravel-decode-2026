<h1>Mes todos</h1>


<a href='{{route('todos.create')}}'>Créer une nouvelle TODO</a>


@foreach($all as $todo)
    <p>{{ $todo->title }} <a href="{{route('todos.edit', $todo->id)}}">Modifier</a>
    @if(in_array($todo->id, $doneTodoIds))
        <span>Déjà fait</span>
    @else
        <form action="{{route('todos.done', $todo->id)}}" method="POST">
            @csrf
            <button type="submit">Fait</button>
        </form>
    @endif
    
    <form action="{{route('todos.destroy', $todo->id)}}"  method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" />
    </form>
    </p>
@endforeach