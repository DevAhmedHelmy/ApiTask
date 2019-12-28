<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\User;
class Action extends Model
{
   protected $guarded =[];

   public function user()
    {
    	return $this->beLongsTo(User::class);
    }

    public function customer()
    {
    	return $this->beLongsTo(Customer::class);
    } 
}
