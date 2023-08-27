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

                    <div class="mt-4">
                    
                        <a href="{{ route('companies') }}" class="btn btn-primary">Add Company</a>
                        <a href="{{ route('employees') }}" class="btn btn-success">Add Employee</a>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

