@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <form class="form-horizontal" action="{{ route('events.store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name_id">Evento</label>
                        <input name="name" type="text" class="form-control" id="name_id"
                               placeholder="Digite o título do seu evento">
                    </div>

                    <div class="form-group">
                        <label for="content_id">Conteúdo</label>
                        <textarea name="content" class="form-control" id="content_id" rows="3"
                                  placeholder="Digite o conteúdo do seu evento"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="address_id">Endereço</label>
                        <input name="address" class="form-control" id="address_id" rows="3"
                               placeholder="Digite o endereço do seu evento">
                    </div>

                    <div class="form-group">
                        <label for="beginning_id">Data inicio</label>
                        <input name="beginning" type="date" class="form-control" id="beginning_id"
                               placeholder="Digite a data inicial">
                    </div>

                    <div class="form-group">
                        <label for="end_id">Data final</label>
                        <input name="end" type="date" class="form-control" id="end_id"
                               placeholder="Digite a data final">
                    </div>



                    <div class="form-group">
                        <label for="event_category_id">Categoria do evento</label>

                        <select class="form-control" id="event_category_id" name="event_category_id">
                            @foreach($event_category as $e_c)
                            <option value="{{$e_c->id}}">{{$e_c->name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button"
                                    class="btn btn-default"
                                    onclick="window.location.href = '{{ route('events.index') }}'">
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