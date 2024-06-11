<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'customer_name',
        'contact',
        'whatsapp',
        'email',
        'gstinno',
        'address',
        'reference',
        'is_deleted'
    ];
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

}
