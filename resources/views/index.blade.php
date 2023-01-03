@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show w-50 m-auto mb-3" role="alert">
            <strong>{{session()->get('message')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    <div class="py-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 offset-lg-3 h-25 mb-3">
                    <div class="card">
                        <div class="text-container my-2 p-3 h-auto w-auto text-center">
                            <img src="{{asset('assets/pizza.png')}}" class="h-75 w-75" alt="...">
                        </div>
                        <div class="card-footer pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-secondary mt-auto" href="{{route('product.create', ['product' => 'pizza' ])}}">Pizza</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 h-25 mb-3">
                    <div class="card justify-content-center">
                        <div class="text-container my-2 p-3 h-auto w-auto text-center">
                            <img src="{{asset('assets/kebab.png')}}" class="h-75 w-75" alt="...">
                        </div>
                        <div class="card-footer pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-secondary mt-auto" href="{{route('product.create', ['product' => 'kebab' ])}}">Kebab</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
