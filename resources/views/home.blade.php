@extends('layouts.app')

@section('content')
    <router-view v-on:logged="authenticated()"></router-view>
@endsection
