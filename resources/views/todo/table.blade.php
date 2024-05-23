 <table class="table">
    <h5> To Do List </h5>
    <thead>
        <tr>
            <th>Name</th>
            <th>Complete</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $tasks = array_reverse($tasks); // Reverse the tasks array
        @endphp
        @foreach($tasks as $task)
        <tr>
            <td>
                {{ $task['name'] }}
            </td>
            <td>
                <input type="checkbox" {{ $task['is_completed'] ? 'checked' : '' }} >
            </td>
            <td>
                <!-- add delete btn here -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>