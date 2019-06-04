@extends('layouts.app')

@section('title')
Register
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <register-form-component></register-form-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
