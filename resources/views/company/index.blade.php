@extends('company')

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
    <a style="margin: 19px;" href="{{ route('company.create')}}" class="btn btn-primary">Click here to add company</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Logo</td>
          <td>Website</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($Companies as $company)
        <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->name}}</td>
            <td>{{$company->email}}</td>
            <td><img src="{{ URL::to('/') }}/images/{{$company->logo}}"></td>
            <td>{{$company->website}}</td>
            <td>
                <a href="{{ route('company.edit',$company->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('company.destroy', $company->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {!! $Companies->links() !!}
<div>
</div>
@endsection