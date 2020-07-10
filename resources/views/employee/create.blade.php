@extends('employee')

@section('main')


    @if ($errors->any())
      <div class="alert alert-danger" style="display:block">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
	<div class="row">
      <form method="post" action="{{ route('employee.store') }}" style="width: 800px">
          @csrf
          <div class="form-group">    
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name"/>
          </div>
		     <div class="form-group">    
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name"/>
          </div>
		  <div class="form-group">
              <label for="company">Company:</label>
			  <select class="form-control" name="company_id">
			
			  @foreach($Companies as $company)
			  <option value="{{ $company->id }}">{{ $company->name }}</option>
			  @endforeach
			  </select>
            
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" class="form-control" name="phone"/>
          </div>                   
          <button type="submit" class="btn btn-primary">Add Employee</button>
      </form>
  </div>
</div>
</div>
@endsection