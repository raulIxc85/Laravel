@extends ('layouts.app')
@section ('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form class="modal-content" action="/persona" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nueva Persona</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <!--  @csrf -->
										{{csrf_field()}}
                    <div class="form-group">
                          <label for="nombre">Ingrese nombre</label>
                          <input type="text"  required class="form-control" id="nombre" name="nombre" placeholder="Juan">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Ingrese apellido</label>
                        <input type="text" required class="form-control" id="apellido" name="apellido" placeholder="Perez">
                    </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
</div>
@if($errors->any())
                <div class="alert alert-danger" >
                <h4>ERROR :</h4>
                <ul>
                @foreach($errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
     @endif
     @if(session()->has('success'))
                <div class="alert alert-success">
                <h4>EXITO !!!</h4>
                    {{ session()->get('success') }}
                </div>
    @endif
    @if(session()->has('error'))
                <div class="alert alert-danger">
                <h4>ERROR :</h4>
                    {{ session()->get('error') }}
                </div>
@endif
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Creacion</th>
			<th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
		@foreach ($dat as $user)
			<tr>
				<th scope="row"> {{$user->id}}</th>
				<td>{{$user->nombre}}</td>
				<td>{{$user->apellido}}</td>
				<td>{{$user->created_at}}</td>
				<td><a href="#" onclick= "event.preventDefault(); document.getElementById('eliminar').submit();">Eliminar</a>
				<form  id="eliminar" action="{{ route('persona.destroy',$user->id)}}" method="post">
           <input name="_method" type="hidden" value="DELETE">
           <input type="hidden" name="_token" value="{{ csrf_token()}}">
				</form>
				</td>
			</tr>
		@endforeach


  </tbody>
</table>



@endsection
