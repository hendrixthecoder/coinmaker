<?php

namespace Database\Seeders;

use App\Models\InvestmentPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InvestmentPlan::create([
            'plan_name' => 'Bronze',
            'min_deposit' => 500,
            'max_deposit' => 4999,
            'duration' => 12,
            'weekly_earnings' => 5
        ]);
        
        InvestmentPlan::create([
            'plan_name' => 'Silver',
            'min_deposit' => 5000,
            'max_deposit' => 49999,
            'duration' => 12,
            'weekly_earnings' => 8
        ]);
        
        InvestmentPlan::create([
            'plan_name' => 'Gold',
            'min_deposit' => 50000,
            'max_deposit' => 500000,
            'duration' => 12,
            'weekly_earnings' => 12
        ]);
    }
}