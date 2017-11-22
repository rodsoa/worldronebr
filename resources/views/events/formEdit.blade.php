@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <form class="form-horizontal" action="{{ route('events.update', ['id' => $event]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="name_id" class="col-sm-2 control-label">Evento</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name_id" name="name" placeholder="Título do evento"
                                   value="{{ $event->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content_id" class="col-sm-2 control-label">Conteúdo</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="content_id" name="content" value="{{ $event->content }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address_id" class="col-sm-2 control-label">Endereço</label>
                        <div class="col-sm-2">
                        <input name="address" class="form-control" id="address_id" rows="3"
                               placeholder="Digite o endereço do seu evento" value="{{$event->address}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="beginning_id" class="col-sm-2 control-label">Data inicio</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" id="beginning_id" name="beginning" value="{{ $event->beginning }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="end_id" class="col-sm-2 control-label">Data final</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" id="end_id" name="end" value="{{ $event->end }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="event_category_id" class="col-sm-2 control-label">Categoria do evento</label>
                        <div class="col-sm-2">
                        <select class="form-control" id="event_category_id" name="event_category_id">
                            @foreach($event_category as $e_c)
                                //consertar, deve mostrar o nome da categoria
                                <option value="{{$event->event_category_id}}">{{$e_c->name}}</option>
                            @endforeach
                        </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button"
                                    class="btn btn-default"
                                    onclick="window.location.href = '{{ route('events.index') }}'">
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