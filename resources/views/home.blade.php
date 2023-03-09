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
                </div>

                <div class="card-body border">
                    <x-alert/>
                    <p>Upload your photo</p>
                    <form action="/upload" method="post" enctype='multipart/form-data'>
                        @csrf
                        <input type="file" name="image" />
                        <input type="submit" value="Upload" />
                    </form>
                </div>
                <div class="card-body border text-center fs-5">
                    <a href="/todos" class="nav-link bg-info">My TO-DOs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
