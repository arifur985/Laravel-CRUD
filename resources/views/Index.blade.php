<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Students</h1>
    <div class="container">
        <a href="{{url('/add-data')}}" class="btn btn-primary my-3">Add Data</a>
        
   {{-- show msg --}}    
   @if (Session::has('status'))
   <h4 class="text-success">{{Session::get('status')}}</h4>
 @endif

    <table class="table  table-bordered">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $key=>$data)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->phone}}</td>
            <td>
              <a href="{{url('/edit-data/'.$data->id)}}" class="btn btn-success">Edit</a>
              <a href="{{url('/delete-data/'.$data->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
            </td>
          @endforeach
        </tbody>
      </table>
      {{$datas->links()}}

    </div>
    
  </body>
</html>