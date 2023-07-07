@extends('layouts.app')
@section('title', 'Techblog User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} <h3>{{ Auth::user()->name }}</h3>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
