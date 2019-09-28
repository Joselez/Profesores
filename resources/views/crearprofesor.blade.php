@extends('layouts.app')
@section('content')
	
	<form action="{{route('storeprof')}}" method="POST">
		@include('formularios.createprofesor2')
	</form>
@endsection