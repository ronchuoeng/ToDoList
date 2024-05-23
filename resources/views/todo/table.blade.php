 <table class="table">
    <thead>
        <tr><h5>To Do List</h5></tr>
    </thead>
    <tbody>
        @php
            $tasks = array_reverse($tasks); // Reverse the tasks array
        @endphp
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task['name'] }} {{ $task['is_completed'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>