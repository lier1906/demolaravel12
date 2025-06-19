<h1>Edit task</h1>
<hr>
<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $task->name }}" required>
    </div>
     <div>
        <label for="user_id">User ID</label>
        <select id="user_id" name="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $task->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Task</button>
</form>