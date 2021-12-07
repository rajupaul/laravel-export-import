<!DOCTYPE html>
<html>
<head>
<style>
.page-break {
    page-break-after: always;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>User's List</h1>

<table id="customers">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
  </tr>
  @if(count($users))
  	@foreach($users as $user)
	  <tr>
	    <td>{{$user->id}}</td>
	    <td>{{$user->name}}</td>
	    <td>{{$user->email}}</td>
	  </tr>
    @endforeach
  @else
  <tr>
    <td colspan="3">No user found</td>
  </tr>
  @endif

</table>

</body>
</html>