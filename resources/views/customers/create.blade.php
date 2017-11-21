@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <form class="form-horizontal" action="{{ route('customers.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nome" name="name" placeholder="Nome do drone" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-sm-2 control-label">CPF/CNPJ</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="image" name="document" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="description" name="email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Tel. Contato</label>
                        <div class="col-sm-5">
                            <input type="tel" class="form-control" id="price" name="phone" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button"
                                    class="btn btn-default"
                                    onclick="window.location.href = '{{ route('customers.index') }}'">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-default">Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop