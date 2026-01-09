
@extends('layouts.app')
@section('content')

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
              <button type="button" class="btn btn-secondary" onclick="deleteTask({{ $task->id }})">Delete</button>
            </div>
            </td>
            {{-- <form id="delete-form-{{ $task->id }}" action="{{ route('task.delete',$task->id) }}" method="post">
              @csrf
            </form> --}}
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
<script>
  function deleteTask(id) {
    SwalAlert.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes!"
  }).then((result) => {
    if (result.isConfirmed) {
      // document.getElementById('delete-form-' + id).submit();
      axios.post('/task/delete/' + id, {
        _token: '{{ csrf_token() }}'
      })
      .then(function (response) {
        console.log(response);
        // location.reload();
      })
      .catch(function (error) {
        console.log(error);
      });
      SwalAlert.fire({
        title: "Deleted!",
        text: "Your file has been deleted.",
        icon: "success"
      });
    }
  });

    
  }

</script>
@endsection