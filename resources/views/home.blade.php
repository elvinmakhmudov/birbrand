@extends('layouts.app')

@section('content')
    <div class="container main-container">
        <left-banner></left-banner>
        <router-view></router-view>
        <right-banner></right-banner>
    </div>
@endsection
