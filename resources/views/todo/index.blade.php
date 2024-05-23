@extends('layouts.app')

@section('contents')
    <div class="pt-4">
        <div>
            @include('todo.table')
        </div>
        <div class="pt-4 create-container">
            @include('todo.create')
        </div>
    </div>
@endsection

@section('script')
<script>
    let inactivityTimeout;
    const inactivityPeriod = 1 * 10 * 1000; // reset in 10 seconds inactivity

    function resetTodoList() {
        // Send ajax request to reset To Do list
        $.ajax({
            type: "POST",
            url: "/reset-session",
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log("To Do list reset due to inactivity");
            },
            error: function(xhr, status, error) {
                console.error("Error resetting To Do list due to inactivity:", error);
            }
        });
    }

    function startInactivityTimer() {
        clearTimeout(inactivityTimeout);
        inactivityTimeout = setTimeout(resetTodoList, inactivityPeriod);
    }

    // Start timer on user activity
    $(document).on('mousemove keydown', function() {
        startInactivityTimer();
    });

    // Initial timer
    startInactivityTimer();
</script>
<script>
    $(document).on('change', 'input[type="checkbox"]', function() {
        var taskId = $(this).data('task-id');
        var isCompleted = this.checked ? 1 : 0;

        $.ajax({
            type: 'POST',
            url: '/update',
            data: {
                task_id: taskId,
                is_completed: isCompleted,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Task status updated successfully.');
            },
            error: function(xhr, status, error) {
                console.error('Error updating task status:', error);
            }
        });
    });

    $(document).on('click', '.delete-task', function() {
        var taskId = $(this).data('task-id');

        // Send AJAX request to delete task
        $.ajax({
            type: 'DELETE',
            url: '/remove',
            data: {
                task_id: taskId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('tr[data-task-id="' + taskId + '"]').remove();
                console.log('Task deleted successfully.');
            },
            error: function(xhr, status, error) {
                console.error('Error deleting task:', error);
            }
        });
    });
</script>
@endsection