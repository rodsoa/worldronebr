@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <form class="form-horizontal" action="{{ route('news.update', ['id' => $new]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="title_id" class="col-sm-2 control-label">Título</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title_id" name="name" placeholder="Título da sua notícia"
                                   value="{{ $new->title }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content_id" class="col-sm-2 control-label">Conteúdo</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="content_id" name="content" value="{{ $new->content }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button"
                                    class="btn btn-default"
                                    onclick="window.location.href = '{{ route('news.index') }}'">
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