
<form method="POST" action="/new-task/store">
    @csrf
    <div class="form-group">
        <input type="text" id="new-task" placeholder="Enter New Task" name="new_task" required>
    </div>
    <div class="form-group pt-2">
        <button type="submit" class="btn btn-primary" >New Task</button>
    </div>
</form>