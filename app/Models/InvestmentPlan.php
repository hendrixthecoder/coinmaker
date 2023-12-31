<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name',
        'min_deposit',
        'max_deposit',
        'weekly_earnings',
        'duration',
        'plan_user_id',
        'top_up_value',
        'minimum_withdrawal',
    ];

    public function users () {
        return $this->belongsToMany(User::class)->withPivot('amount','pay_day');
    }
}