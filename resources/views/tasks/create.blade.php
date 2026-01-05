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
  <h2>Create Record</h2>
  <a href="{{ route('task.index') }}">Back to Tasks </a>

  <form action="{{ route('task.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">title:</label>
      <input type="text" class="form-control"  name="title" value="{{ old('title') }}"> 
      @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <input type="text" class="form-control" name="description" value="{{ old('description') }}">
      @error('description')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="image">image:</label>
      <input type="file" class="form-control" name="image" value="{{ old('image') }}">
      @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
