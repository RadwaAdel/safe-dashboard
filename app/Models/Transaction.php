<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;


    protected $fillable = ['receipt_date', 'company_id','pay'
        , 'revenue_type', 'value', 'revenue_id',
        'check_num', 'due_date', 'bank_id', 'expense_id',
        'transaction',];

    protected $attributes = [
        'transaction' => 0,
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function revenues()
    {
        return $this->belongsTo(Revenues::class, 'revenue_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function expense()
    {
        return $this->belongsTo(Expense::class, 'expense_id');
    }

//    public function getTransactionAttribute()
//    {
//        if ($this->attributes['transaction'] ==1) {
//            return $this->revenues;
//        } elseif ($this->attributes['transaction'] ==2) {
//            return $this->expense;
//        } else {
//            return null;
//        }



}
