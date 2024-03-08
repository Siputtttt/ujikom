<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dashboard;

class dashboardController extends Controller
{
    public function index()
    {
        // dd("siuuu");
        $title = "dashboard";
        return view('dashboard', compact('title'));
    }

    // public function store(Request $request)
    // {
    //     // Logic to store a new product
    // }

    // public function show($id)
    // {
    //     $product = Product::findOrFail($id);
    //     return view('products.show', compact('product'));
    // }

    // public function update(Request $request, $id)
    // {
    //     // Logic to update a product
    // }

    // public function destroy($id)
    // {
    //     // Logic to delete a product
    // }
}
