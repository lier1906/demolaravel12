<h1>Create Task</h1>
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="user_id">User ID</label>
        <select id="user_id" name="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    
    
    <button type="submit">Create Task</button>
    <a href="{{ route('tasks.index') }}">Back to Tasks</a>
</form>