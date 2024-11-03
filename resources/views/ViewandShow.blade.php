@extends('desainer')

@section('title', 'Manage Tasks and Types')

@section('content')
    <div class="row mt-4">
        <div class="col text-center">
            <button class="btn btn-primary mx-2" id="taskButton">Task</button>
            <button class="btn btn-secondary mx-2" id="typeButton">Type</button>
            <button class="btn btn-info mx-2" id="showCompletedTasksButton">Show Completed Tasks</button>
            <button class="btn btn-warning mx-2" id="showOverdueTasksButton">Show Overdue Tasks</button>
        </div>
    </div>

    <!-- Task Form -->
    <div id="taskForm" class="mt-4" style="display:none;">
        <h3 class="h5 text-primary">Add New Task</h3>
        <form action="{{ route('store.task') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input name="task_name" type="text" class="form-control form-control-sm" placeholder="Task Name" required>
                </div>
                <div class="form-group col-md-4">
                    <select name="type_id" class="form-control form-control-sm" required>
                        <option disabled selected>Select Type</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <input name="content" type="text" class="form-control form-control-sm" placeholder="Notes" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="start_time" class="small">Start Time</label>
                    <input name="start_time" type="datetime-local" class="form-control form-control-sm" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="end_time" class="small">End Time</label>
                    <input name="end_time" type="datetime-local" class="form-control form-control-sm" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Add Task</button>
        </form>

        <!-- Button to Show Tasks -->
        <button class="btn btn-info mt-3 btn-sm" id="showTasksButton">Show Tasks</button>

        <!-- Task List -->
        <div id="taskList" class="mt-3" style="display:none;">
            <h4 class="h6 text-primary">Your Tasks</h4>
            <table class="table table-bordered table-sm table-light">
                <thead class="thead-dark">
                    <tr>
                        <th>Task Number</th>
                        <th>Task Name</th>
                        <th>Type Name</th>
                        <th>Content</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getTask as $index => $task)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $task->task_name }}</td>
                            <td>{{ $task->type->type_name }}</td>
                            <td>{{ $task->content }}</td>
                            <td>{{ $task->start_time }}</td>
                            <td>{{ $task->end_time }}</td>
                            <td>
                                <a href="{{ route('delete.task', ['id' => $task->id]) }}" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="{{ route('complete.task', ['id' => $task->id]) }}" class="btn btn-success btn-sm" title="Complete">
                                    <i class="fas fa-check"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Type Form -->
    <div id="typeForm" class="mt-4" style="display:none;">
        <h3 class="h5 text-primary">Add New Type</h3>
        <form action="{{ route('store.type') }}" method="POST">
            @csrf
            <div class="form-group">
                <input name="type_name" type="text" class="form-control form-control-sm" placeholder="Type Name" required>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Add Type</button>
        </form>

        <!-- Button to Show Types -->
        <button class="btn btn-info mt-3 btn-sm" id="showTypesButton">Show Types</button>

        <!-- Type List -->
        <div id="typeList" class="mt-3" style="display:none;">
            <h4 class="h6 text-primary">Your Types</h4>
            <table class="table table-bordered table-sm table-light">
                <thead class="thead-dark">
                    <tr>
                        <th>Type Number</th>
                        <th>Type Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $index => $type)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $type->type_name }}</td>
                            <td>
                                <a href="{{ route('delete.type', ['id' => $type->id]) }}" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Completed Tasks List -->
    <div id="completedTasksList" class="mt-3" style="display:none;">
        <h4 class="h6 text-primary">Your Completed Tasks</h4>
        <table class="table table-bordered table-sm table-light">
            <thead class="thead-dark">
                <tr>
                    <th>Task Number</th>
                    <th>Task Name</th>
                    <th>Type Name</th>
                    <th>Content</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($getTaskCompleted as $index => $task)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $task->task_name }}</td>
                        <td>{{ $task->type->type_name }}</td>
                        <td>{{ $task->content }}</td>
                        <td>{{ $task->start_time }}</td>
                        <td>{{ $task->end_time }}</td>
                        <td>
                            <a href="{{ route('delete.task', ['id' => $task->id]) }}" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <a href="{{ route('complete.task', ['id' => $task->id]) }}" class="btn btn-warning btn-sm" title="Mark as Incomplete">
                                <i class="fas fa-undo"></i>
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Overdue Tasks List -->
    <div id="overdueTasksList" class="mt-3" style="display:none;">
        <h4 class="h6 text-primary">Your Overdue Tasks</h4>
        <table class="table table-bordered table-sm table-light">
            <thead class="thead-dark">
                <tr>
                    <th>Task Number</th>
                    <th>Task Name</th>
                    <th>Type Name</th>
                    <th>Content</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($getTaskIsOverdue as $index => $task)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $task->task_name }}</td>
                        <td>{{ $task->type->type_name }}</td>
                        <td>{{ $task->content }}</td>
                        <td>{{ $task->start_time }}</td>
                        <td>{{ $task->end_time }}</td>
                        <td>
                            <a href="{{ route('delete.task', ['id' => $task->id]) }}" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- JavaScript to Toggle Forms and Task/Type Lists -->
    <script>
        document.getElementById('taskButton').addEventListener('click', function() {
            document.getElementById('taskForm').style.display = 'block';
            document.getElementById('typeForm').style.display = 'none';
            document.getElementById('taskList').style.display = 'none';
            document.getElementById('completedTasksList').style.display = 'none';
            document.getElementById('overdueTasksList').style.display = 'none';  
        });

        document.getElementById('typeButton').addEventListener('click', function() {
            document.getElementById('typeForm').style.display = 'block';
            document.getElementById('taskForm').style.display = 'none';
            document.getElementById('typeList').style.display = 'none';  
            document.getElementById('completedTasksList').style.display = 'none';
            document.getElementById('overdueTasksList').style.display = 'none';
        });

        document.getElementById('showTasksButton').addEventListener('click', function() {
            const taskList = document.getElementById('taskList');
            taskList.style.display = taskList.style.display === 'none' ? 'block' : 'none';
            document.getElementById('completedTasksList').style.display = 'none'; 
            document.getElementById('overdueTasksList').style.display = 'none'; 
        });

        document.getElementById('showTypesButton').addEventListener('click', function() {
            const typeList = document.getElementById('typeList');
            typeList.style.display = typeList.style.display === 'none' ? 'block' : 'none';
        });

        document.getElementById('showCompletedTasksButton').addEventListener('click', function() {
            const completedTasksList = document.getElementById('completedTasksList');
            completedTasksList.style.display = completedTasksList.style.display === 'none' ? 'block' : 'none';
            document.getElementById('taskList').style.display = 'none';
            document.getElementById('overdueTasksList').style.display = 'none';
        });

        document.getElementById('showOverdueTasksButton').addEventListener('click', function() {
            const overdueTasksList = document.getElementById('overdueTasksList');
            overdueTasksList.style.display = overdueTasksList.style.display === 'none' ? 'block' : 'none';
            document.getElementById('taskList').style.display = 'none';
            document.getElementById('completedTasksList').style.display = 'none';
        });
    </script>
@endsection
