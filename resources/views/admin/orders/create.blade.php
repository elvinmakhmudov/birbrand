@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>Sifarişi əlavə etmək</h5>
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ route('admin.orders.store', ['id' => $userId]) }}">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" name="name" type="text" class="validate" autofocus>
                                    <label for="name">Ad</label>
                                </div>
                            </div>
                        </div>


                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="number" name="number" type="text" class="validate" autofocus>
                                    <label for="number">Nömrə</label>
                                </div>
                            </div>
                        </div>


                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="status" name="status" type="text" class="validate" autofocus>
                                    <label for="status">Status</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="note" name="note" type="text" class="validate" autofocus>
                                    <label for="note">Qeyd</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <label class="active">Produkt</label>
                                    <select id="select" class="form-control" name="products[]" multiple>
                                        <option value> Yoxdu</option>
                                        @foreach($products as $oneProduct)
                                            <option value="{{ $oneProduct->id }}"> {{ $oneProduct->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <label class="active">İstifadəçi</label>
                                    <select id="select" class="form-control" name="user">
                                        <option value> Yoxdu</option>
                                        @foreach($users as $oneUser)
                                            @if($oneUser->id == $userId)
                                                <option selected value="{{ $oneUser->id }}"> {{ $oneUser->number}}
                                                    ({{$oneUser->name}})
                                                </option>
                                            @else
                                                <option value="{{ $oneUser->id }}"> {{ $oneUser->number}}
                                                    ({{$oneUser->name}})
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <button type="submit" class="btn waves-effect waves-light">
                                Yadda saxla
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
