@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <form class="form-horizontal" action="{{ route('news.store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title_id">Título</label>
                        <input name="title" type="text" class="form-control" id="title_id"
                               placeholder="Digite o título da sua notícia">
                    </div>

                    <div class="form-group">
                        <label for="content_id">Conteúdo</label>
                        <textarea name="content" class="form-control" id="content_id" rows="3" placeholder="Descreva sua notícia">

                        </textarea>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button"
                                    class="btn btn-default"
                                    onclick="window.location.href = '{{ route('news.index') }}'">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-default">Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection