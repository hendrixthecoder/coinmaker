<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'country',
        'email',
        'number',
        'password',
        'btc_address', 
        'eth_address', 
        'bnb_address', 
        'trx_address', 
        'usdt_address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role () {
        return $this->belongsTo(Role::class);
    }

    public function deposits () {
        return $this->hasMany(Deposit::class);
    }

    public function withdrawals () {
        return $this->hasMany(Withdrawal::class);
    }

    public function transactions () {
        return $this->hasMany(Transaction::class);
    }

    public function investmentPlans () {
        return $this->belongsToMany(InvestmentPlan::class)->withPivot('amount','pay_day');
    }

    public function userPlans () {
        return $this->hasMany(UserPlan::class);
    }

    /**
     * Everything investment starts here
     * 
     */
    public function getAmountInvested () {
        return $this->investmentPlans->map(function($item){
            return $item->pivot->amount;
        })->sum();
    }

    public function getDateInvestment () {
        return $this->investmentPlans->map(function ($transaction){
            return $transaction->pivot->pay_day;
        });
    }

    public function returnAmountInvested () {
        return $this->transactions()->where('source', 'Capital')->where('end_day', '<', now())->sum('amount');
    }
    
    public function totalAmountInvested () {
        return $this->transactions()->where('source', 'Capital')->sum('amount');
    }
    
    /**
     * Everything investment ends here
     * 
     */


    public function getDueProfit () {
        return $this->transactions()->where('whereToCredit', 'Profit')->where('pay_day', '<=', now())->sum('amount');
    }

    
    /**
     * Debits, withdrawals, start here
     * 
    */
    public function getProcessedWithdrawals () {
        return $this->withdrawals()->where('status', 'Processed')->sum('amount');
    }

    public function getReversedProfit () {
        return $this->transactions()->where('whereToDebit', 'Profit')->sum('amount');
    }

    public function getReversedBonus () {
        return $this->transactions()->where('whereToDebit', 'Bonus')->sum('amount');
    }

    public function getReversed () {
        return $this->transactions()->where('whereToDebit', 'Balance')->sum('amount');
    }
    
    public function getProcessedDebits () {
        return $this->getReversedProfit() + $this->getReversedBonus() + $this->getReversed();
    }
    
    /**
     * Debits, withdrawals, ends here
     * 
    **/

    

    /**
     * Credits, Deposits start here
     * 
    **/

    public function getProcessedBalanceCredits () {
        return $this->transactions()->where('type', 'Credit')->where('whereToCredit', 'Balance')->where('source', '!=', 'Capital')->sum('amount');
    }

    public function getBonusCredits () {
        return $this->transactions()->where('type', 'Credit')->where('whereToCredit', 'Bonus')->sum('amount');
    }
     
    /**
     * Credits, Deposits end here
     * 
    **/

     /**
      * Everything balance starts here
      */
      public function getWalletBalance () {
          return $this->deposits()->where('status', 'Processed')->sum('amount') - $this->totalAmountInvested();
      }
  
      public function getBonusBalance () {
          return $this->getBonusCredits() - ($this->withdrawals()->where('source', 'Bonus')->sum('amount') + $this->getReversedBonus());
      }
      
     /**
      * Everything balance ends here
      *
      */




    public function getDeductableProfit () {
        return $this->getDueProfit() - ($this->getReversedProfit() + $this->withdrawals()->where('status', 'Processed')->where('source','!=','Bonus')->sum('amount'));
    }

    public function getBalance () {
        $processedDeposits = $this->deposits()->where('status', 'Processed')->sum('amount');

        if(is_null($this->investmentPlans()->get())){
            $balance = ($processedDeposits + $this->getProcessedBalanceCredits() + $this->getDueProfit() + $this->getBonusCredits()) - ($this->getProcessedDebits() + $this->getProcessedWithdrawals());
            
        }else{
            $balance = ($processedDeposits + $this->getProcessedBalanceCredits() + $this->getDueProfit() + $this->getBonusCredits() + $this->returnAmountInvested()) - ($this->getProcessedDebits() + $this->getProcessedWithdrawals() + $this->getAmountInvested());
        }

        return number_format(($balance), 2);
    }
}