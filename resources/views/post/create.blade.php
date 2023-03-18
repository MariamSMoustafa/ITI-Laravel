<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>

</head>
<body>
<form action="{{route('posts.store')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="exampleInputPassword1" class="m-3">Title</label>
    <input type="text" class="form-control m-3" id="exampleInputPassword1" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="m-3">Description</label>
    <input type="text" class="form-control m-3" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="m-3">Post Creator</label>
    <input type="text" class="form-control m-3" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
   <button type="submit" class="btn btn-primary m-3">Create</button> 
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>    
</html> 