<p>You have been assigned a new task:</p>
<p><strong>Title:</strong> {{ $task->title }}</p>
<p><strong>Description:</strong> {{ $task->description }}</p>
<p><strong>Due Date:</strong> {{ $task->due_date ?? 'No deadline' }}</p>