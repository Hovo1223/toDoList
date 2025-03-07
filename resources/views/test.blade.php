<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container">
    <div class="createParent">
        <button type="button" class="btn btn-secondary create" data-bs-toggle="modal">Add Task</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Task Name</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Remove</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($create as $creates )
                <tr>
                    <td>{{ $creates->id }}</td>
                    <td>{{ $creates->name }}</td>        
                    <td>{{ $creates->status }}</td>
                    <td>
                        <button type="button" class="update" data-bs-toggle="modal" data-bs-target="#updateModal{{ $creates->id }}"
                            data-id="{{ $creates->id ??null}}" 
                            data-name="{{ $creates->name }}" 
                            data-status="{{ $creates->status }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                            </svg>
                        </button>
                      
                    </td>
                    <td>
                        <form action="{{ route('delete', ['id' => $creates->id]) }}" method="post">
                            @csrf
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash delete" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

<!-- create -->
    <div class="modal fade createModal" id="createModal" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('create') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="tasknameparent">
                            <label for="TaskName">Task Name</label>
                            <textarea name="name" id="TaskName" class="form-control"></textarea>
                        </div>
                        <label for="select">Status</label>
                        <select name="status" id="select" class="form-select">
                            <option value="toDo">ToDo</option>
                            <option value="Reject">Reject</option>
                            <option value="Complete">Complete</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- update -->
<div class="modal fade updateModal" id="updateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if(isset($creates))
                <form action="{{ route('update', ['id' => $creates->id]) }}" method="post">
            @endif         
                   @csrf
                <div class="modal-body">
                    <div class="tasknameparent">
                        <label for="TaskName">Task Name</label>
                        <textarea name="tasknameUpdate" id="TaskName" class="form-control TaskName"></textarea>
                    </div>
                    <label for="select">Status</label>
                    <select name="status" id="select" class="form-select">
                        <option value="toDo">ToDo</option>
                        <option value="Reject" >Reject</option>
                        <option value="Complete" >Complete</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('js/test.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
