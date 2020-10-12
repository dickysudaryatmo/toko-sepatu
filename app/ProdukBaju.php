<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukBaju extends Model
{
    protected $fillable = [
        'id','brand_id', 'name', 'sku', 'price', 'description', 'is_displayed', 'start_promo', 'end_promo', 'promo_price', 'gender','material_upper', 'material_outer_sole', 'care_label', 'measurements', 'created_at', 'updated_at'
    ];
    protected $primaryKey = 'id';

    protected $table = "produk_baju";
}
