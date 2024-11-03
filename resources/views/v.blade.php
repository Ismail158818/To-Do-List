@extends('desainer')
@section('des_pages')
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    <br><br><br>
    <div class="row">
        <div class="col-md-6">
            <div id="todo-input-container" class="pb-5">
                <form action="{{route('store.task')}}" method="POST">
                    @csrf
                    <div class="input-group input-group" style="width: 400px">
                        <input name="task_name" type="text" id="todo-input" class="form-control" placeholder="Add task ..." required>
                        <select class="form-control" name="type_id" required>
                            <option selected disabled>Select a type </option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                            @endforeach
                        </select>
                        <input name="date" type="date" id="todo-date" class="form-control" placeholder="Add new date" required>
                    </div>
                    <span class="input-group-append">
                                <button id="todo-button" type="submit" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                            </span>
                </form>
                <div class="container">
                    <div class="row">
                        <!-- Tasks Table -->
                        <div class="col-md-12">
                            <button id="toggleTasksButton" class="btn btn-info mt-3" style="margin-left: -13px;width:150px"  >Show your tasks</button>
                            <div id="taskContent" class="container-md rounded" style=" margin-top: 15px; display: none;">
                                <table class="content-table" style="margin-right:200px;">
                                    <thead>
                                    <tr>
                                        <th>Task id</th>
                                        <th>Task Name</th>
                                        <th>Type Name</th>
                                        <th>Date</th>
                                        <th>Delete</th>
                                        <th>Complet</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($getTask as $task)
                                        <tr>
                                            <td><h6 style="color: orange; font-weight: bold; text-shadow: 1px 1px 2px black;">{{ $task->id }}</h6></td>
                                            <td><h6  style="color: orange; font-weight: bold; text-shadow: 1px 1px 2px black;">{{ $task->task_name }}</h6></td>
                                            <td><h6 style="color: orange">{{ $task->type->type_name }}</h6></td>
                                            <td><h6 style="color: orange">{{ $task->date }}</h6></td>
                                            <td><a href="{{ route('delete.task', ['id' => $task->id]) }}"  style="color: orange; font-weight: bold; text-shadow: 1px 1px 2px black;">Delete</a></td>
                                            <td><a href="{{ route('delete.task', ['id' => $task->id]) }}" style="color: orange; font-weight: bold; text-shadow: 1px 1px 2px black;">Complete</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="todo-input-container" class="pb-5">

                <div id="todo-input-container" class="pb-5">
                    <form action="{{route('store.type')}}" method="POST">
                        @csrf
                        <div class="input-group input-group" style="width: 400px">
                            <input name="type_name" type="text" id="todo-input" class="form-control form-control-lg" placeholder="Add type ..." required>
                        </div>
                        <span class="input-group-append">
                                <button id="todo-button" type="submit" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                            </span>
                    </form>
                    <button id="toggleTypeButton" class="btn btn-info mt-3;"   style="margin-left: -13px;width:150px">Show your types</button>
                    <div id="typeContent" class="container-md rounded" style=" margin-top: 20px; display: none;">
                        <table class="content-table">
                            <thead>
                            <tr>
                                <th style="width: 115px">Type id</th>
                                <th style="width: 115px">Type Name</th>
                                <th style="width: 115px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    <td><h6 style="color: orange">{{ $type->id }}</h6></td>
                                    <td><h6 style="color: orange">{{ $type->type_name }}</h6></td>
                                    <td><h6 style="color: orange"><a href="{{ route('delete.type', ['id' => $type->id]) }}" class="btn btn-danger">Delete</a></h6></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection


