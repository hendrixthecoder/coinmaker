<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $method = PaymentMethod::create([
           'name' => 'BTC',
           'address' => 'ertgwetbegrtwqe4twertbh' 
        ]);
        
        $method = PaymentMethod::create([
           'name' => 'ETH',
           'address' => 'ertgwetbegrtwqe4twertbh' 
        ]);

        $method = PaymentMethod::create([
           'name' => 'USDT',
           'address' => 'ertgwetbegrtwqe4twertbh' 
        ]);
        
        $method = PaymentMethod::create([
           'name' => 'BNB',
           'address' => 'ertgwetbegrtwqe4twertbh' 
        ]);

        $method = PaymentMethod::create([
           'name' => 'TRX',
           'address' => 'ertgwetbegrtwqe4twertbh' 
        ]);

        $method = PaymentMethod::create([
           'name' => 'MATIC',
           'address' => 'ertgwetbegrtwqe4twertbh' 
        ]);
        
        $method = PaymentMethod::create([
           'name' => 'SOLANA',
           'address' => 'ertgwetbegrtwqe4twertbh' 
        ]);
    }
}