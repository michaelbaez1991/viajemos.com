<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased text-center">
        <br><h1>Lista de editoriales</h1><br>
        <div class="container">
            <div class="col-6 offset-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Sede</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($editoriales as $editorial)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $editorial->nombre }}</td>
                                <td>{{ $editorial->sede }}</td>
                            </tr>
                        @endforeach                                
                    </tbody>
                </table>
            </div><br>
            <div class="col-6 offset-3">
                <a type="button" class="btn btn-danger btn-sm" href="/">Atrás</a>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Crear editorial</button>
            </div><br><br>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('winner'))
                <div class="alert alert-success text-center">
                    <h4>Se creo la editorial exitosamente!!</h4> <br>
                </div>
            @endif
        </div>

        {{-- MODAL NUEVA EDITORAL --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nueva editorial</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('NewEditorial') }}" method="POST" >
                        {{ csrf_field() }}

                        <div class="row">
                            {{-- NOMBRE --}}
                            <div class="col">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" aria-label="Nombre">
                            </div>
    
                            {{-- APELLIDO --}}
                            <div class="col">
                                <input type="text" class="form-control" id="sede" name="sede" placeholder="Sede" aria-label="Sede">
                            </div>      
                        </div>              
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
              </div>
            </div>
        </div>
    </body>
</html>
