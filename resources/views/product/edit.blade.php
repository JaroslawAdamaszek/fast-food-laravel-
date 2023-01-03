@extends('layouts.app')


@section('content')
    @if ($errors->any())
        <div class="alert alert-danger m-auto w-50 mb-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row row-centered pos">
            <div class=" card col-lg-6 col-sm-12 m-auto">
                <div class="text-container d-flex align-items-center justify-content-center my-2 h-auto w-auto">
                    <div class="text-container my-2 p-3 h-50 w-50 text-center">
                        <img src="{{ $product['name'] === 'pizza' ? '/assets/pizza.png': '/assets/kebab.png'}}"
                             class="h-75 w-75"
                             alt="...">
                    </div>
                </div>
                <form action="{{route('product.update', ['id' => $product['id'] ])}}" method="POST">
                    <div class="d-flex align-items-center justify-content-center form-check">
                        <input class="form-check-input" type="radio" name="name" value="{{$product['name']}}"
                               id="flexRadioDefault1" checked>
                        <label class="form-check-label mt-1 ms-1" for="flexRadioDefault1">
                            {{$product['name']}}
                        </label>
                    </div>
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="">
                            @foreach(\App\Http\Controllers\IngredientsController::index($product['name']) as $type => $ingredients)
                                <div class="mt-2"><span class="badge bg-warning text-dark mb-2">{{$type}}</span></div>
                                @foreach($ingredients as $ingredient)
                                    <input type="checkbox" class="btn-check" id="btn-check-{{$ingredient['name']}}"
                                           name="{{$type}}[]"
                                           value="{{$ingredient['name']}}" autocomplete="off"
                                        {{in_array($ingredient['name'], $product[$type]) ? 'checked': ''}}>
                                    <label class="btn btn-outline-secondary mt-1 ms-1"
                                           for="btn-check-{{$ingredient['name']}}">{{$ingredient['name']}}</label>
                                @endforeach
                            @endforeach
                            <div class="container d-flex align-items-center justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


