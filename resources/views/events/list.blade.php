@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <a role="button"
                           class="btn btn-primary"
                           href="{{ route('events.create') }}">
                            <i class="fa fa-fw fa-plus"></i>
                            Adicionar
                        </a>

                        <table class="table table-bordered table-responsive" style="margin-top:10px;">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Conteúdo</th>
                                <th>Endereço</th>
                                <th>Data início</th>
                                <th>Data entrega</th>
                                <th>Categoria</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td> {{ $event->content }}</td>
                                    <td> {{ $event->address }}</td>
                                    <td> {{ $event->beginning }}</td>
                                    <td> {{ $event->end }}</td>
                                    <td> {{ $event->event_category_id }}</td>
                                    <td width="200px;" class="text-center">
                                        <a role="button" class="btn btn-xs btn-primary"
                                           href="{{ route('events.show', ['event' => $event]) }}">
                                            <i class="fa fa-fw fa-eye"></i>
                                            visualizar
                                        </a>
                                        <a role="button"
                                           class="btn btn-xs btn-warning"
                                           href="{{ route('events.edit', ['event' => $event]) }}">
                                            <i class="fa fa-fw fa-edit"></i>
                                            editar
                                        </a>
                                        <button type="button"
                                                class="btn btn-xs btn-danger"
                                                onclick="deleteEvent({{$event->id}})">
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

    <form id="deleteEvent" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
@stop

@section('js')
    <script>
        function deleteEvent( id ) {
            if ( confirm('Você tem certeza dessa ação?') ) {
                var url = '/events/'+id
                $("#deleteEvent").attr('action', url);
                $("#deleteEvent").submit();
            }
        }
    </script>
@stop