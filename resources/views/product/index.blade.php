@extends('layouts.app')

@section('content')

    @if(session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show w-50 m-50 btn-sm mb-3 text-center m-auto" role="alert">
            <strong>{{session()->get('message')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    @forelse($productsUser->products as $product)
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="row p-2 bg-white border rounded">
                        <div class="col-md-3 mt-1 ">
                            <div class="text-container my-2 p-3 h-auto w-auto text-center">
                            <img src="{{ $product['name'] === 'pizza' ? '/assets/pizza.png': '/assets/kebab.png'}}" class="h-100 w-100" alt="...">
                            </div>
                        </div>
                        <div class="col-md-6 mt-1">
                            <div class="mt-1 mb-1 spec-1"><span class="badge bg-warning text-dark">size:</span>
                                @foreach($product['size'] as $ingredient)
                                    <div class="d-inline">
                                        <span class="badge input-group-text text-dark mb-2">{{$ingredient}}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-1 mb-1 spec-1"><span class="badge bg-warning text-dark">vegetables:</span>
                                @foreach($product['vegetable'] as $ingredient)
                                    <div class="d-inline">
                                        <span class="badge input-group-text text-dark mb-2">{{$ingredient}}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-1 mb-1 spec-1"><span class="badge bg-warning text-dark">meat:</span>
                                @foreach($product['meat'] as $ingredient)
                                    <div class="d-inline">
                                        <span class="badge input-group-text text-dark mb-2">{{$ingredient}}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-1 mb-1 spec-1"><span class="badge bg-warning text-dark">souce:</span>
                                @foreach($product['sauce'] as $ingredient)
                                    <div class="d-inline">
                                        <span class="badge input-group-text text-dark mb-2">{{$ingredient}}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-start mt-1">
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-row align-items-center m-auto">
                                    <h4 class="m-auto">$ {{$product['price']}}</h4>
                                </div>
                            </div>
                            <form action="{{ route('product.delete', ['id' => $product['id']])}}" method="POST">
                                <div class="d-flex flex-column mt-4">
                                    <a class="btn btn-primary btn-sm"
                                       href="{{ route('product.edit', ['id' => $product['id']])}}">Details</a>
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger btn-sm mt-2" type="submit">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-warning alert-dismissible fade show  w-50 m-50 btn-sm mb-3 justify-content-center m-auto text-center" role="alert">
            <strong>No product!</strong>
{{--            <button type="button" class="btn">--}}
{{--            </button>--}}
        </div>
    @endforelse
@endsection
