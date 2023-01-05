<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientsStoreRequest;
use App\Models\Product;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;

class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */


    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|Application
    {
        $productsUser = User::with('products')->where('id', auth()->id())->firstOrFail();

        return view('product.index', compact('productsUser'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */


    public function create($productName)
    {

        if (!auth()->check()) {

            return redirect()->route('login');

        }

        switch ($productName) {
            case 'pizza':
                return view('product.pizza');
            case 'kebab':
                return view('product.kebab');
        }

        abort(404);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */


    public function store(IngredientsStoreRequest $request): \Illuminate\Http\RedirectResponse
    {

        $product = new Product();

        $product->name = $request->name;
        $product->size = $request->size;
        $product->cake = $request->cake;
        $product->vegetable = $request->vegetable;
        $product->meat = $request->meat;
        $product->sauce = $request->sauce;
        $product->price = random_int(1000, 2000) / 100;
        $product->user_id = auth()->id();

        $product->save();

        return redirect()->route('product.index')->with('message', 'Product added to cart!');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */


    public function show(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|Application
    {

        $productsUser = User::with('products')->where('id', auth()->id())->firstOrFail();

        return view('product.index', compact('productsUser'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */


    public function edit(int $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|Application
    {

        $product = Product::where('id', $id)->where('user_id', auth()->id())->first();

        if ($product) {

            return view('product.edit', compact('product'));

        } else {

            abort(403);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(IngredientsStoreRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::where('id', $id)->where('user_id', auth()->id())->first();

        if (!$product) {

            abort(403);

        }

        $product->name = $request->name;
        $product->size = $request->size;
        $product->cake = $request->cake;
        $product->vegetable = $request->vegetable;
        $product->meat = $request->meat;
        $product->sauce = $request->sauce;

        $product->save();

        return redirect()->route('product.index')->with('message', 'product edited!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */


    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {


        Product::where('id', $id)->where('user_id', auth()->id())->first();

        Product::destroy($id);
        return redirect()->route('product.index')->with('message', 'Product removed!');

    }
}
