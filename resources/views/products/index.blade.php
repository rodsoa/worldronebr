@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <a role="button"
                           class="btn btn-primary"
                            href="{{ route('products.create') }}">
                            <i class="fa fa-fw fa-plus"></i>
                            Adicionar
                        </a>

                        <table class="table table-bordered table-responsive" style="margin-top:10px;">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th>Imagem</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>R$ {{ $product->price }}</td>
                                    <td>{{ $product->image }}</td>
                                    <td>
                                        @if( $product->status )
                                            DISPONIVEL
                                        @else
                                            NÃO DISPONIVEL
                                        @endif
                                    </td>
                                    <td width="200px;" class="text-center">
                                        <a role="button" class="btn btn-xs btn-primary">
                                            <i class="fa fa-fw fa-eye"></i>
                                            visualizar
                                        </a>
                                        <a role="button"
                                           class="btn btn-xs btn-warning"
                                           href="{{ route('products.edit', ['product' => $product]) }}">
                                            <i class="fa fa-fw fa-edit"></i>
                                            editar
                                        </a>
                                        <button type="button"
                                                class="btn btn-xs btn-danger"
                                                onclick="deleteUser({{$product->id}})">
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

    <form id="deleteUser" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
@stop

@section('js')
    <script>
        function deleteUser( id ) {
            if ( confirm('Você tem certeza dessa ação?') ) {
                var url = '/products/'+id
                $("#deleteUser").attr('action', url);
                $("#deleteUser").submit();
            }
        }
    </script>
@stop