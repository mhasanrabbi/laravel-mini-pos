<?php

namespace App\Models;

use App\Models\SaleInvoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'sale_invoice_id', 'price', 'quantity', 'total'];

    public function invoice()
    {
        return $this->belongsTo(SaleInvoice::class, 'sale_invoice_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}