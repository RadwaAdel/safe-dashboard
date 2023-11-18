<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Company extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['company','employee','user_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function receipt(){
        return $this->hasMany(RevenueReceipt::class);
    }
}
