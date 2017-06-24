<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\User;
class Meal extends Model
{
    //Attributes that are mass-assignable
    protected $fillable =['name'];

    //defines relationship to user class
    public function user() {
      //Meal Model belongs to User Model
      return $this->belongsTo(User::class);
    }
    
    //defines relation to food class
    public function foods() {
      //foods plural because there are many foods
      //Food singular because it belongs directly to that class
      return $this->hasMany(Food::class);
    }

}
