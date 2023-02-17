@extends('layouts.app')

@section('content')
    @guest
    @else
        <div id="app"></div>
    @endguest
@endsection
