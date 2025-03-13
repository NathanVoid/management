@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Assign Tasks</h2>
    <input type="text" id="searchUser" placeholder="Search by Email">

    <ul id="userList">
        @foreach($users as $user)
        <li>
            {{ $user->email }}
            <button onclick="openTaskModal({{ $user->id }})">Assign Task</button>
        </li>
        @endforeach
    </ul>

    <div id="taskModal" style="display: none;">
        <input type="text" id="taskTitle" placeholder="Task Title">
        <input type="text" id="taskDescription" placeholder="Task Description">
        <input type="date" id="dueDate">
        <button onclick="assignTask()">Assign</button>
    </div>
</div>

<script>
function openTaskModal(userId) {
    document.getElementById('taskModal').style.display = 'block';
    window.selectedUser = userId;
}

function assignTask() {
    let taskTitle = document.getElementById('taskTitle').value || "Auto Task";
    let taskDescription = document.getElementById('taskDescription').value || Math.random().toString(36).substring(2, 22);
    let dueDate = document.getElementById('dueDate').value || null;

    fetch('/tasks', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: JSON.stringify({ user_id: window.selectedUser, title: taskTitle, description: taskDescription, due_date: dueDate })
    }).then(() => location.reload());
}
</script>
@endsection
