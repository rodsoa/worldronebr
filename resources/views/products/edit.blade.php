@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <form class="form-horizontal" action="{{ route('products.update', ['product' => $product]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nome" name="name" placeholder="Nome do drone" value="{{ $product->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Descrição</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Preço de aluguel</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-sm-2 control-label">Imagem demonstrativa</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" id="image" name="image" value="{{ $product->image }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button"
                                    class="btn btn-default"
                                    onclick="window.location.href = '{{ route('products.index') }}'">
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