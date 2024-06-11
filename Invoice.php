<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'profile_id',
        'customer_name',
        'customer_address',
        'customer_gstin',
        'unit_price',
        'quantity',
        'total',
        'discount',
        'tax',
        'sub_total',
        'grand_total',
        'paid',
        'due',
        'description',
        'payment_method',
        'invoice_date',

    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
