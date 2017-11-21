@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Clientes</div>
                    <div class="panel-body">

                        <a role="button"
                           class="btn btn-primary"
                            href="{{ route('customers.create') }}">
                            <i class="fa fa-fw fa-plus"></i>
                            Adicionar
                        </a>

                        <table class="table table-bordered table-responsive" style="margin-top:10px;">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Documento</th>
                                    <th>Tel. Contato</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->document }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td width="200px;" class="text-center">
                                        <a role="button" class="btn btn-xs btn-primary">
                                            <i class="fa fa-fw fa-eye"></i>
                                            visualizar
                                        </a>
                                        <a role="button"
                                           class="btn btn-xs btn-warning"
                                           href="{{ route('customers.edit', ['customer' => $customer]) }}">
                                            <i class="fa fa-fw fa-edit"></i>
                                            editar
                                        </a>
                                        <button type="button"
                                                class="btn btn-xs btn-danger"
                                                onclick="deleteCustomer({{$customer->id}})">
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

    <form id="deleteCustomer" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
@stop

@section('js')
    <script>
        function deleteCustomer( id ) {
            if ( confirm('Você tem certeza dessa ação?') ) {
                var url = '/customers/'+id
                $("#deleteCustomer").attr('action', url);
                $("#deleteCustomer").submit();
            }
        }
    </script>
@stop