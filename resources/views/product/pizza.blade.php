@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-lg-6 col-sm-12 m-auto">
                <div class="text-container d-flex align-items-center justify-content-center my-2 h-auto w-auto">
                    <div class="text-container my-2 p-3 h-50 w-50 text-center">
                        <img src="{{asset('assets/pizza.png')}}" class="h-75 w-75" alt="...">
                    </div>
                </div>
                <form action="{{route('product.store')}}" method="POST" role="form">
                    <div class="d-flex align-items-center justify-content-center form-check">
                        <input class="form-check-input" type="radio" name="name" value="pizza" id="flexRadioDefault1"
                               checked>
                        <label class="form-check-label mt-1 ms-1" for="flexRadioDefault1">
                            Pizza
                        </label>
                    </div>
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="">
                            @foreach(\App\Http\Controllers\IngredientsController::index('pizza') as $type => $ingredients)
                                <div class="mt-2">
                                    <span class="badge bg-warning text-dark mb-2">{{($type)}}</span>
                                </div>
                                @foreach($ingredients as $ingredient)
                                    <input type="checkbox"
                                           class="btn-check form-control @error($type) is-invalid @enderror"
                                           id="btn-check-{{$ingredient['name']}}"
                                           name="{{$type}}[]" value="{{$ingredient['name']}}" autocomplete="off"
                                        {{ (is_array(old($type)) && in_array($ingredient['name'], old($type))) ? ' checked' : '' }}>
                                    <label class="btn btn-outline-secondary mt-1 ms-1"
                                           for="btn-check-{{$ingredient['name']}}">{{$ingredient['name']}}
                                    </label>
                                @endforeach
                                @error($type)
                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                  </span>
                                @enderror
                            @endforeach
                        </div>
                        <div class="container d-flex align-items-center justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary">Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
