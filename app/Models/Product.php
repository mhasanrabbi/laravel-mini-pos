<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'cost_price', 'price', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public static function arrayForSelect()
    {
        $arr = [];
        $products = Product::all();
        foreach ($products as $product) {
            $arr[$product->id] = $product->title;
        }

        return $arr;
    }
}