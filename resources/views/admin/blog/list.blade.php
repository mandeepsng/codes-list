<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Code.Yoblogger.com</title>
  </head>
  <body>
    <div class="row">
    <h1 style="text-align: center;">Laravel 9 CRUD Tutorial Example - <a href="https://code.yoblogger.com/">Code.yoblogger.com</a>
        
    </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="{{ route('blog.index') }}"> Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('blog.create') }}">Create Blog</a>
        </li>
      </ul>
    </div>
    

  </div>
</nav>


<div class="container">
        <h1>Blog List</h1>
  <div class="row">
    <div class="col">
    <table class="table">
        <thead>
            <tr>
            <th class="col">Post Name</th>
            <th class="col text-start">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($all as $v )
            <tr>
            <td>{{ $v->title }}</td>
            <td>
              <a class="btn btn-secondary" href="{{ route('blog.show', $v->id) }}" role="button">View</a>
              <a class="btn btn-primary" href="{{ route('blog.edit', $v->id) }}" role="button">Edit</a>
              <form method="post" style="float: left; margin-right: 5px;" action="{{route('blog.destroy',$v->id)}}">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger">Delete</button>
              </form> 
            </td>
            </tr>
            @empty
                
            @endforelse


        </tbody>
        </table>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>