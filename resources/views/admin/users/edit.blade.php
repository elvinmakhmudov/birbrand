@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>{{$user->name}}</h5>
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ route('admin.users.update', ['id' => $user->id]) }}"
                      enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" name="name" type="text" class="validate" autofocus
                                           value="{{ $user->name }}">
                                    <label for="name">Ad</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="number" name="number" type="text" class="validate" autofocus
                                           value="{{ $user->number }}">
                                    <label for="number">Nömrə</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="address" name="address" type="text" class="validate" autofocus
                                           value="{{ $user->address }}">
                                    <label for="address">Ünvan</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" name="password" type="password" class="validate" autofocus>
                                    <label for="password">Şifrə</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row ">
                                <div class="col s12">
                                    <input type="checkbox" id="is_admin"
                                           name="is_admin" {{ $user->is_admin ? 'checked' : '' }}>
                                    <label for="is_admin">Admin etmək</label>
                                </div>
                            </div>
                        </div>


                        <div class="col s12">
                            <button type="submit" class="btn waves-effect waves-light">
                                Yadda saxla
                            </button>
                            <button type="submit" class="btn waves-effect waves-light red" name="delete" value="delete">
                                Sil
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
