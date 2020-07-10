@extends('company')

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
	  <form method="post" action="{{ route('company.update', $Companies->id) }}" style="width: 800px" enctype="multipart/form-data">
            @method('PATCH') 
            @csrf
      
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value={{ $Companies->name }} />
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email" value={{ $Companies->email }} />
          </div>
          <div class="form-group">
              <label for="logo">Logo:</label>
			  <img src="{{ URL::to('/') }}/images/{{$Companies->logo}}">
			</div>
			<div class="form-group">
			  <label for="logo">Upload New Logo:</label>
              <input type="file" name="logo" class="form-control" placeholder="">
          </div>
          <div class="form-group">
              <label for="website">Website:</label>
              <input type="text" class="form-control" name="website" value={{ $Companies->website }} />
          </div>                     
          <button type="submit" class="btn btn-primary">Edit Company</button>
      </form>
  </div>
</div>
</div>
@endsection