@extends('layouts.app')

@section('title')
Login
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <login-form-component></login-form-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
