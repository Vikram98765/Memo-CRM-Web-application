<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table='profile';
    use HasFactory;
    protected $fillable=[
        'company_name',
        'address',
        'mobile',
        'mobile2',
        'landline',
        'email',
        'website',
        'current_logo',
        'customer_prefix',
        'invoice_prefix',
        'gstinno',
        'pan_no',
        'bankname',
        'bankaccno',
        'ifsc',
        'qr',
        'is_deleted',


    ];
    // protected $casts = [
    //     'current_logo' => 'binary',
    //     'qr' => 'binary',
    //     'is_deleted' => 'boolean',
    // ];
    public function getImageURL(){
        if($this->image){
        return url('storage/app/public/images/'.$this->image);
    }
    }
}
