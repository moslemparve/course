
@extends('layouts.app')
@section('content')
<div class="container mt-3">
  <h2>Basic Card</h2>
  <a href="{{ route('task.index') }}">Back to Tasks </a>

  <div class="card">
    <div class="card-body">Basic card</div>
    hinulledtheme@gmail.com
    <div class="card-body">Title</div>
    <div class="card-body">{{ $task->title }}</div>
    <div class="card-body">Description</div>
    <div class="card-body">{{ $task->description }}</div>
    <div class="card-body">Image</div>
    <img src="/uploads/tasks/{{ $task->image }}" alt="" srcset="" height="50px" width="50px">
  </div>
</div>
@endsection
