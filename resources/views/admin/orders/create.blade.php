@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>Sifarişi əlavə etmək</h2>
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
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Ad</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="number" class="col-md-2 control-label">Nömrə</label>

                            <div class="col-md-8">
                                <input id="number" type="text" class="form-control" name="number" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-md-2 control-label">Status</label>

                            <div class="col-md-8">
                                <input id="status" type="text" class="form-control" name="status" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="select" class="col-md-2 control-label">İstifadəçi</label>

                            <div class="col-md-8">
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

                        <div class="form-group">
                            <label for="select" class="col-md-2 control-label">Produkt</label>

                            <div class="col-md-8">
                                <select id="select" class="form-control" name="products[]" multiple>
                                    <option value> Yoxdu</option>
                                    @foreach($products as $oneProduct)
                                        <option value="{{ $oneProduct->id }}"> {{ $oneProduct->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-raised btn-primary">
                                    Yadda saxla
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
