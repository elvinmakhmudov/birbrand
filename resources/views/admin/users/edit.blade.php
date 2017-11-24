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
                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">Ad</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="name" autofocus
                                   value="{{ $user->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="number" class="col-md-2 control-label">Nömrə</label>

                        <div class="col-md-8">
                            <input type="number" id="number" class="form-control" name="number"
                                   value="{{ $user->number }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-md-2 control-label">Ünvan</label>

                        <div class="col-md-8">
                            <input id="address" type="text" class="form-control" name="address" autofocus
                                   value="{{ $user->address }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-2 control-label">Şifrə</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control" name="password" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="is_admin" class="col-md-2 control-label">Admin etmək</label>
                        <div class="col-md-5">
                            <div class="checkbox">
                                <label class="checkbox">
                                    <input type="checkbox" name="is_admin" {{ $user->is_admin ? 'checked' : '' }}>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Yadda saxla
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
