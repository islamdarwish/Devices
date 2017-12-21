@extends('layout')

@section('title', 'Create device')

@section('content')
    <device-form-component item="{{$device}}" type="edit"></device-form-component>
@endsection