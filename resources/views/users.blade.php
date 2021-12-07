<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Users</title>
  </head>
  <body>
  <div class="container pt-5">
    <div class="row">
      <div class="col-md-12">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
        </div>
        @endif
      </div>

      <div class="col-md-12">
        
        <form class="row g-3" action="{{route('import_user')}}" method="post"  enctype="multipart/form-data">
          @csrf
          <div class="col-auto">
            <label  class="visually-hidden">Excel</label>
            <input type="file" class="form-control" name="excel_file">
          </div>
 
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb">Upload excel file</button>
          </div>

          @error('excel_file')
            <span class="text-danger">{{$message}}</span>
          @enderror
      </form>

      @if(Session::has('import_errors'))
        @foreach(Session::get('import_errors') as $failure)
        <div class="alert alert-danger" role="alert">
           {{$failure->errors()[0]}} at line no-{{$failure->row()}}
        </div>
        @endforeach
      @endif
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="d-flex justify-content-between">
          <div><h3>User List</h3></div>
          <div>
            <a class="btn btn-success" href="{{route('export_user_pdf')}}">Export PDF</a>
            <a href="{{route('export_user')}}">Export users to excel file</a>
          </div>
        </div>
        
      </div>
      <div class="col-md-12">
        <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          @if(count($users))
          @foreach($users as $user)
            <tr>
              <th scope="row">{{$user->id}}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
            </tr>
          @endforeach
          @else
          <tr>
            <td colspan="3">No data found</td>
          </tr>
          @endif
        </tbody>
      </table>
      </div>
    </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>