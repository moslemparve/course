
@extends('layouts.app')
@section('content')

<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
  <h2>Edit Record</h2>
  <a href="{{ route('task.index') }}">Back to Tasks </a>

  <form action="{{ route('task.update',$task->id) }}" method="post">
    @csrf
    <div class="form-group">
      <label for="title">title:</label>
      <input type="text" class="form-control"  name="title" value="{{ $task->title }}"> 
        @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <input type="text" class="form-control" placeholder="Enter description" name="description" value="{{ $task->description }}">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
@endsection
