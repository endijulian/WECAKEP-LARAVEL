@extends('template.template')
@section('content')
	<div class="alert alert-danger alert-dismissible alert-important" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button>
		<strong>Error!</strong>
		{{ $exception->getMessage() }}
		Kamu belum di izinkan untuk melakukan ini.
	</div>
@endsection
