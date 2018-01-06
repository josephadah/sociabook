@extends('layouts.app')

@section('content')

 

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
          
          @include('partials.status.form')

          @include('partials.status.statuses')

        </div>
    </div>

@endsection
