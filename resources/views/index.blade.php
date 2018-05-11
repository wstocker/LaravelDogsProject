<!-- Stored in resources/views/index.blade.php -->
@extends('layouts.app')

@section('title', 'Page Title')
 
@section('content')
        @if (Session::has('message'))
          <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <table class="table">
          <tbody>
            @foreach($dogs as $dog)
            <tr>              
              <td>{{$dog->name}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
@endsection