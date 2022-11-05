@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-secondary btn-sm float-right" href="{{route('categoria.create')}}">Agregar Nueva Categoría</a>
                {{-- {{ __('Dashboard') }} --}}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Categoría</th>
                                <th>Descripción</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                                $result = json_encode($categoria);
                                // convert object $result to array
                                $output = json_decode($result, true);
                                $datos = $output['original'];
                                $num = count($datos);
                            ?>

                            @for ($i = 0; $i < $num; $i++)
                                <?php
                                    $id = $datos[$i]['id'];
                                ?>
                                <tr>
                                    <td>{{$datos[$i]['id']}}</td>
                                    <td>{{$datos[$i]['cat_name']}}</td>
                                    <td>{{$datos[$i]['cat_description']}}</td>
                                    <td width="10px">
                                            <a class="btn btn-primary btn-sm" href="{{route('categoria.edit', $id)}}">Editar</a>
                                    </td>
                                    <td width="10px">


                                            <form method="POST" action="{{ url('/categorias/'.$id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>


                                    </td>
                                </tr>
                            @endfor
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
