@extends('layouts.app')

@section('title')
New Password
@endsection

@section('content')
<script type="text/javascript">
    window.token = "{{ $token }}";
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <reset-form-component></reset-form-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
