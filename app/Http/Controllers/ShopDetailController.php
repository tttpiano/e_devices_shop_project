<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class ShopDetailController
{
    public function showId($id)
    {
        $sDetail = Product::with('brand')->with('ram')
            ->find($id);
        return view('front.shopDetail', ['sDetail' => $sDetail]);
    }
}
