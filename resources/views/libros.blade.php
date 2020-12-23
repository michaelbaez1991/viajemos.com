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
        <br><h1>Lista de libros</h1><br>
        <div class="container">
            <div class="col-6 offset-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Título</th>
                            <th scope="col">Sinopsis</th>
                            <th scope="col">Num. páginas</th>
                            <th scope="col">Editorial</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $libro->titulo }}</td>
                                <td>{{ $libro->sinopsis }}</td>
                                <td>{{ $libro->n_paginas }}</td>
                                @foreach ($editoriales as $editorial)
                                    @if($editorial->id == $libro->editoriales_id)
                                        <td>{{ $editorial->nombre }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach                                
                    </tbody>
                </table>
            </div><br>
            <div class="col-6 offset-3">
                <a type="button" class="btn btn-danger btn-sm" href="/">Atrás</a>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Crear libro</button>
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
                    <h4>Se creo el libro exitosamente!!</h4> <br>
                </div>
            @endif
        </div>

        {{-- MODAL NUEVO LIBRO --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nuevo libro</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('NewBook') }}" method="POST" >
                        {{ csrf_field() }}

                        {{-- TITULO --}}
                        <div class="mb-3">
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" aria-label="Título">
                        </div>

                        {{-- SINOPSIS --}}
                        <div class="mb-3">
                            <input type="text" class="form-control" id="sinopsis" name="sinopsis" placeholder="Sinopsis" aria-label="Sinopsis">
                        </div>

                        {{-- NUMERO DE PAGINAS  --}}
                        <div class="mb-3">
                            <input type="text" class="form-control" id="n_paginas" name="n_paginas" placeholder="Número de páginas" aria-label="Número de páginas">
                        </div>   

                        {{-- EDITORIAL --}}
                        <div class="mb-3">
                            <select class="form-control" name="editoriales_id" id="editoriales_id" placeholder="Editoriales" aria-label="Editoriales">
                                <option value="" disabled selected>...</option>
                                @foreach ($editoriales as $editorial)
                                    <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
                                @endforeach
                            </select>
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
