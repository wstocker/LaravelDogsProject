<!-- Stored in resources/views/index.blade.php -->
@extends('layouts.app')

@section('title', 'Page Title')
 
@section('content')
   @if (Session::has('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
   @endif
      <p></p>
      @foreach($dogs as $dog)
         <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                   <div class="card card-default">
                      <div class="card-header">Dog Name: </div>
                          <div class="card-body">
                             {{$dog->name}}
                          </div>
                      </div>
                  </div>    
              </div>
           </div>
       </div>    
   @endforeach
@endsection