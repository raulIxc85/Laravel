@extends ('layouts.app') 
@section ('content')
@foreach ($dat as $user)
	<p>Nombre: {{$user->nombre}} {{$user->apellido}}</p>
@endforeach
@endsection


