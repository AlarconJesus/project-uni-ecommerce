@extends('errors::minimal')

@section('title', __('Muchos intentos seguidos, espera unos minutos para volverlo a intentar.'))
@section('code', '429')
@section('message')
Muchos intentos seguidos, espera unos minutos para volverlo a intentar.
@stop
@section('button')
<a href="/login" class="btn btn-secondary" style="white-space: nowrap;">REGRESAR A LOGIN</a>
@stop
