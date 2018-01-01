@extends('layouts.app')
@section('content')
    @include('layouts.nav.categories', ['categories' => $categories])
    <div class="container main-container">
        <left-banner>
        </left-banner>
        <transition name="fade">
            <keep-alive :exclude="/myorder/">
                <router-view :key="$route.fullPath">
                </router-view>
            </keep-alive>
        </transition>
        <right-banner>
        </right-banner>
    </div>
@endsection
