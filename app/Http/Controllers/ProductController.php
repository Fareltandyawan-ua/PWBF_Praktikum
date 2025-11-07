<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('product_form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:150',
            'price' => 'required|numeric|min:1000',
        ]);

        $hargaRupiah = numberToRupiah($validated['price']);
        $kodeProduk = generateRandomString(8);
        $token = get_token();

        return view('product_result', [
            'title' => $validated['title'],
            'price' => $hargaRupiah,
            'kode_produk' => $kodeProduk,
            'token' => $token
        ]);
    }
}
