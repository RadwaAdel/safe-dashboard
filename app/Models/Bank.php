<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Bank extends Model
{
    use HasFactory ,SoftDeletes;

    protected $fillable =['bank','branch','account_num','user_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function receipt(){
        return $this->hasMany(RevenueReceipt::class);
    }
}
