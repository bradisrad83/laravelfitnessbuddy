@extends('layouts.app')

@section('content')
<h4>All Meals</h4>

@if (!$meals->isEmpty())
  <ul class = "list-group">
    @foreach ($meals as $meal)
      <li class ="list-group-item">
        {{$meal->name}}
      </li>
    @endforeach
  </ul>
@else
<h5>You have no meals <a href ="/meals/create">Create one Now!!!</a></h5>

@endif
@stop
