@extends('layouts.app')
@section('content')
	
	<form action="{{route('updateprof')}}" method="POST">
        @method('patch')
		@include('formularios.editprofesor')
    </form>
@endsection