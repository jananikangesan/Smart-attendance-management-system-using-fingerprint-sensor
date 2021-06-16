@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if($message = Session::get('info'))
                        <div class="alert alert-info" role="alert">
                            {{ $message }}
                        </div>
                    @endif

                    @if($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                    @endif
                    <!-- you are logged in! -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
