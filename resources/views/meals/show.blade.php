@extends('layouts.app')

@section('content')

  <div class="meal-info">
    <h2 class="meal-name">{{ $meal->name }}&nbsp;</h2>

    <span class = "meal-time">
      Created At:  {{ $meal->created_at->format('F jS, Y')}}
    </span>
    <br>
    <span class="data label label-pill label-primary">
      {{ $meal->totalCalories() }} kCal
    </span>

    <span class="meal-data label label-pill label-default">
      {{ $meal->totalProtein() }}g Protein
    </span>

    <span class="meal-data label label-pill label-default">
      {{ $meal->totalCarb() }}g Carbohydrates
    </span>

    <span class="meal-data label label-pill label-default">
      {{ $meal->totalFat() }}g Fat
    </span>
  </div>
  <hr>

  <h3>Foods</h3>
  @if (!$meal->foods->isEmpty())
    <ul class="list-group">
      @foreach($meal->foods as $food)
        <li class="list-group-item">
          {{ $food->name }}

          <span class="food-pcf pull-right">
            {{ $food->protein }} g/Protein:  {{ $food->carbohydrates }} g/Carbohydrates:  {{ $food->fat}} g/Fat: Added: {{$food->created_at->format('H:i:s')}}
          </span>
        </li>
      @endforeach
    </ul>
  @else
    <p>No foods are associated with this meal.  Add some below</p>
  @endif

  <hr>

  <form action="/meals/{{ $meal->id }}/foods" method="POST">
    {{ csrf_field() }}

    <div class="form-group row">
      <label for="name" class="col-sm-2 form-control-label">Food Name</label>
      <div class="col-sm-10">
        <input class="form-control"
               type="text"
               name="name"
               placeholder="Food Name"
               required>
      </div>
    </div>

    <div class="form-group row">
      <label for="protein" class="col-sm-2 form-control-label">Protein</label>
      <div class="col-sm-10">
        <input class="form-control"
               type="number"
               name="protein"
               placeholder="Protein/g"
               required>
      </div>
    </div>

    <div class="form-group row">
      <label for="carbohydrates" class="col-sm-2 form-control-label">Carbohydrates</label>
      <div class="col-sm-10">
        <input class="form-control"
               type="number"
               name="carbohydrates"
               placeholder="Carbohydrates/g"
               required>
      </div>
    </div>

    <div class="form-group row">
      <label for="fat" class="col-sm-2 form-control-label">Fat</label>
      <div class="col-sm-10">
        <input class="form-control"
               type="number"
               name="fat"
               placeholder="Fat/g"
               required>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-primary" value="submit" type="submit">Submit</button>
      </div>
    </div>

  </form>


@stop
