<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meal;

use App\User;

class MealsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Listing of the meals
        //With keyword = meals::class
        //  DEBUG:  dump($request->user());die();
        return view('meals.index')->withMeals($request->user()->meals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //  DEBUG:  dump($request->user());die();
        //get route that loads up form to enter a meal namespace
        return view('meals.create')->withUser($request->user());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //Laravel validation-------name is required
        $this->validate($request, [
          'name' => 'required'
        ]);
        //Create the new meal
        //Taking advantage of the fact that we've set name to be mass-assignable
        $meal = new Meal($request->all());
        $user->meals()->save($meal);

        //Send a Response
        return redirect()->action("MealsController@show", $meal->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('meals.show')->withMeal(Meal::find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
