@extends('layouts.app')
@section('content')
        @include('layouts.nav.categories', ['categories' => $categories])
    <div class="container main-container">
        <left-banner></left-banner>
        <keep-alive>
        	<router-view></router-view>
        </keep-alive>
        <right-banner></right-banner>
    </div>
@endsection
