<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
  <h2>Basic Table</h2>
  <a href="{{ route('task.create') }}">Add Task</a>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task )
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{ route('task.edit', $task->id) }}" class="btn btn-secondary">Edit</a>
              <a href="{{ route('task.show',$task->id) }}" class="btn btn-secondary">View</a>
              <a href="{{ route('task.delete',$task->id) }}" class="btn btn-secondary">Delete</a>
            </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
