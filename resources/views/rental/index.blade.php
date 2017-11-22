@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="/upload/{{ $product->image }}" alt="...">
                            <div class="caption">
                                <h3>{{ $product->name }} <small>R$ {{ $product->price }}</small></h3>
                                <p>{{ $product->description }}</p>
                                <p class="text-right">
                                    <a href="{{ route('rental.rent', ['product' => $product]) }}" class="btn btn-primary" role="button">Alugar</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
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