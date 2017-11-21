@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <form class="form-horizontal" action="{{ route('event-categories.update', ['id' => $category]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nome da categoria</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nome" name="name" placeholder="Nome do drone" value="{{ $category->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Valor</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="price" name="price" value="{{ $category->price }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button"
                                    class="btn btn-default"
                                    onclick="window.location.href = '{{ route('event-categories.index') }}'">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-default">Editar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop