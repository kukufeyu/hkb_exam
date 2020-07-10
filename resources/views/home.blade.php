@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
					<div>
						<a style="margin-left: 19px;" href="{{ route('company.index')}}" class="btn btn-primary">Click here to view companies</a> <a style="margin: 19px;" href="{{ route('employee.index')}}" class="btn btn-primary">Click here to view employees</a>
					</div>  
					
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
