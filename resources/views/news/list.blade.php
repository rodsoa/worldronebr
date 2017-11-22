@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> Notícias </div>
                    <div class="panel-body">
                        <a role="button"
                           class="btn btn-primary"
                           href="{{ route('news.create') }}">
                            <i class="fa fa-fw fa-plus"></i>
                            Adicionar
                        </a>

                        <table class="table table-bordered table-responsive" style="margin-top:10px;">
                            <thead>
                            <tr>
                                <th>Título</th>
                                <th>Conteúdo</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $news as $new)
                                <tr>
                                    <td>{{ $new->title }}</td>
                                    <td>{{ $new->content }}</td>
                                    <td width="200px;" class="text-center">
                                        <a role="button"
                                           class="btn btn-xs btn-primary"
                                           href="{{ route('news.show', ['new' => $new]) }}">
                                            <i class="fa fa-fw fa-eye"></i>
                                            visualizar
                                        </a>
                                        <a role="button"
                                           class="btn btn-xs btn-warning"
                                           href="{{ route('news.edit', ['new' => $new]) }}">
                                            <i class="fa fa-fw fa-edit"></i>
                                            editar
                                        </a>
                                        <button type="button"
                                                class="btn btn-xs btn-danger"
                                                onclick="deleteCategory({{$new->id}})">
                                            <i class="fa fa-fw fa-trash"></i>
                                            deletar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="deleteCategory" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
@stop

@section('js')
    <script>
        function deleteCategory( id ) {
            if ( confirm('Você tem certeza dessa ação?') ) {
                var url = '/news/'+id
                $("#deleteCategory").attr('action', url);
                $("#deleteCategory").submit();
            }
        }
    </script>
@stop




{{--
@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <p>Notícias</p>

    @foreach($news as $new)

        <h1>{{$new->title}}</h1>
        <p>{{$new->content}}</p>

        <a role="button"
           class="btn btn-xs btn-primary"
           href="{{ route('news.show', ['new' => $new]) }}">
            <i class="fa fa-fw fa-eye"></i>
            visualizar
        </a>
        <a role="button"
           class="btn btn-xs btn-warning"
           href="{{ route('news.edit', ['new' => $new]) }}">
            <i class="fa fa-fw fa-edit"></i>
            editar
        </a>
        <a role="button"
           class="btn btn-xs btn-danger"
           href="{{ route('news.destroy', ['new' => $new]) }}">
            <i class="fa fa-fw fa-edit"></i>
            remover
        </a>

      --}}
{{--<button type="button"--}}{{--

                --}}
{{--class="btn btn-xs btn-danger"--}}{{--

                --}}
{{--onclick="deleteNews({{$new->id}})">--}}{{--

            --}}
{{--<i class="fa fa-fw fa-trash"></i>--}}{{--

            --}}
{{--deletar--}}{{--

        --}}
{{--</button>--}}{{--

--}}
{{--        <button type="button"
                class="btn btn-xs btn-danger"
                onclick="deleteCategory({{$new->id}})">
            <i class="fa fa-fw fa-trash"></i>
            deletar
        </button>--}}{{--


    @endforeach


    <a type="button" class="badge badge-secondary" href="{!! route('news.create') !!}">+Notícias</a>
   --}}
{{-- <br>
    <button type="button" class="btn btn-light" href="/teste">+Notícias</button>--}}{{--


    --}}
{{--<form id="deleteNews" method="POST">--}}{{--

        --}}
{{--{{ csrf_field() }}--}}{{--

        --}}
{{--{{ method_field('DELETE') }}--}}{{--

    --}}
{{--</form>--}}{{--


@endsection--}}
