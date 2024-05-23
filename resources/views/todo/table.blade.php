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
        @foreach($tasks as $key => $task)
        <tr class="align-middle" data-task-id="{{ $key }}">
            <td>
                {{ $task['name'] }}
            </td>
            <td>
                <input type="checkbox" data-task-id="{{ $key }}" {{ $task['is_completed'] ? 'checked' : '' }} >
            </td>
            <td>
                <button type="button" data-task-id="{{ $key }}" class="btn btn-danger delete-task">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>