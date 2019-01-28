@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
	<iframe-grid-component :frames="frameData"></iframe-grid-component>
@endsection
