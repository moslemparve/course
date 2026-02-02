<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    User Contact : {{ $profile->contact ?? 'N/A' }} <br>
    User Name : {{ $profile->user_name  ?? 'N/A'}} <br>
    User Age :{{ $profile->age  ?? 'N/A' }}<br>


  <form action="{{ route('user.profile.update') }}" method="post" >
    @csrf
    <div class="form-group">
      <label for="contact">contact:</label>
      <input type="text" class="form-control"  name="contact" value="{{ old('contact' ,$profile->contact ?? '') }}"> 
      @error('contact')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="user_name">user_name:</label>
      <input type="text" class="form-control" name="user_name" value="{{ old('user_name' , $profile->user_name ?? '') }}">
      @error('user_name')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="age">age:</label>
      <input type="text" class="form-control" name="age" value="{{ old('age', $profile->age ?? '') }}">
      @error('age')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</body>
</html>