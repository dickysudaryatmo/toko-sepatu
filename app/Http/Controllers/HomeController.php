<?php

namespace App\Http\Controllers;

use App\Produk;
use Request;
use Session;
use DB;
use DateTime;

class HomeController extends Controller
{
    public function homeView()
    {
        $path = storage_path() . "/app/public/json/products.json"; // ie: /var/www/laravel/app/storage/json/filename.json
        $all_produk = json_decode(file_get_contents($path), true);
        // dd($produk);
        // $produk = Produk::all()->toArray();
        // dd($produk);
        $produk_hero = $all_produk;
        $newProduk = $all_produk;
        $ready_stock = $all_produk;
        foreach ($produk_hero as $key => $value) {
            if ($value['most_sold_product_color_id'] == null) {
                unset($produk_hero[$key]);
            }
        }
        $produk_hero = array_slice($produk_hero, 0, 10);
        foreach ($ready_stock as $key => $value) {
            if ($value['total_stock'] == '0') {
                unset($ready_stock[$key]);
            }
        }
        // $newProduk = array();
        // foreach ($allProduk as $key => $value) {
        //     $newProduk[$key] = $value['updated_at'];
        // }
        // array_multisort($newProduk, SORT_DESC, $allProduk);
        // print_r($course);
        // $newProduk = $allProduk;
        // arsort($newProduk);
        // foreach ($newProduk as $key => $value) {
        // }

        // foreach ($newProduk as $key => $value) {
        //     $sort[$key] = strtotime($value['created_at']);
        // }
        // array_multisort($sort, SORT_DESC, $newProduk);

        // dd($all_produk, $produk_hero, $ready_stock);
        return view('content.content')->with([
            'all_produk'        => $all_produk,
            'produk_hero'       => $produk_hero,
            'ready_stock'        => $ready_stock
        ]);
    }
}
