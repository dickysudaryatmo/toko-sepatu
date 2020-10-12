<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'id','brand_id', 'name', 'sku', 'price', 'description', 'is_displayed', 'start_promo', 'end_promo', 'promo_price', 'gender','material_upper', 'material_outer_sole', 'care_label', 'measurements', 'created_at', 'updated_at', 'deleted_at', 'create_id', 'update_id', 'delete_id'
    ];
    protected $primaryKey = 'id';

    protected $table = "mytable";
}
