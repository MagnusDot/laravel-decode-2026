<div>
    @foreach($todos as $todo)
        <div>
            <h1>{{$todo->title}}</h1>
            <p>{{$todo->description}}</p>
        </div>

    @endforeach


    <form action="{{route('todos.save')}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="text" name="title">
        <input type="text" name="description">

        <button type="submit">Save</button>

    </form>

</div>
