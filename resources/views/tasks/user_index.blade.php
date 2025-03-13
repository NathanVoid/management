@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Tasks</h2>
    <ul>
        @foreach($tasks as $task)
        <li>
            <strong>{{ $task->title }}</strong><br>
            {{ $task->description }}<br>
            Due: {{ $task->due_date ?? 'No deadline' }}
            <button onclick="completeTask({{ $task->id }})">Complete</button>
        </li>
        @endforeach
    </ul>
</div>

<script>
function completeTask(taskId) {
    fetch(`/tasks/${taskId}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
    }).then(() => location.reload());
}
</script>
@endsection
