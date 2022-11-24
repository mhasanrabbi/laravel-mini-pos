<?php

namespace App\Models;

use App\Models\SaleInvoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleItems extends Model
{
    use HasFactory;

    // public function invoices()
    // {
    //     return $this->belongsTo(SaleInvoice::class);
    // }
}