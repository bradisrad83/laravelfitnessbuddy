<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\User;
class Meal extends Model
{
    //Attributes that are mass-assignable
    protected $fillable =['name','user_id'];

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
    //function to get the total calories(kCal)
    public function totalCalories() {
        $cal=0;
        $foods=$this->foods()->get();
        foreach($foods as $food) {
          $cal+=($food->calories());
        }
        return $cal;

    }
    //function to get total proteins
    public function totalProtein() {
      $totalprotein = 0;
      $foods=$this->foods()->get();
      foreach($foods as $protein){
        $totalprotein+=($protein->protein());
      }
      return $totalprotein;
    }
    //function to get total carbohydrates
    public function totalCarb() {
      $totalcarb = 0;
      $foods=$this->foods()->get();
      foreach($foods as $carb){
        $totalcarb+=($carb->carbohydrates());
      }
      return $totalcarb;
    }
    //function to get the total fat
    public function totalFat() {
      $totalfat = 0;
      $foods=$this->foods()->get();
      foreach($foods as $fat){
        $totalfat+=($fat->fat());
      }
      return $totalfat;
    }



}
