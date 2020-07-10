@extends('employee')

@section('main')
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div class="row">

<div class="col-sm-12">
    <div>
    <a style="margin: 19px;" href="{{ route('employee.create')}}" class="btn btn-primary">Click here to add employee</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>First Name</td>
		  <td>Last Name</td>
          <td>Company</td>
          <td>Email</td>
          <td>Phone</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($Employees as $employee)
        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->first_name}}</td>
			<td>{{$employee->last_name}}</td>
            <td>{{$employee->company->name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone}}</td>
            <td>
                <a href="{{ route('employee.edit',$employee->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('employee.destroy', $employee->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {!! $Employees->links() !!}
<div>
</div>
@endsection