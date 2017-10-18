@extends('layouts.app')

@section('content')
    <div class="container main-container">
        <left-banner></left-banner>
        <keep-alive>
            <router-view></router-view>
        </keep-alive>
        <right-banner></right-banner>
    </div>
@endsection
