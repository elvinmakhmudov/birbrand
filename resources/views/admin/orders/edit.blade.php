@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>Sifarişi dəyişmək</h5>
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ route('admin.orders.update', ['id' => $order->id]) }}"
                      enctype="multipart/form-data">

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
                            <input id="name" type="text" class="form-control" name="name" autofocus
                                   value="{{ $order->name}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="number" class="col-md-2 control-label">Nömrə</label>

                        <div class="col-md-8">
                            <input id="number" type="text" class="form-control" name="number" autofocus
                                   value="{{ $order->number}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-md-2 control-label">Status</label>

                        <div class="col-md-8">
                            <input id="status" type="text" class="form-control" name="status" autofocus
                                   value="{{ $order->status}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="created_at" class="col-md-2 control-label">Yaranma tarixi</label>

                        <div class="col-md-8">
                            <input id="created_at" type="text" class="form-control" name="created_at" autofocus
                                   value="{{ $order->created_at}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="select" class="col-md-2 control-label">İstifadəçi</label>

                        <div class="col-md-8">
                            <select id="select" class="form-control" name="user">
                                <option value> Yoxdu</option>
                                @foreach($users as $oneUser)
                                    @if($oneUser->id == $order->user->id)
                                        <option value="{{ $order->user->id }}"
                                                selected> {{ $order->user->number}} ({{$order->user->name }})
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
                                @foreach($products->intersect($order->products) as $selectedProduct)
                                    <option value="{{ $selectedProduct->id }}"
                                            selected> {{ $selectedProduct->title }}</option>
                                @endforeach
                                @foreach($products->diff($order->products) as $notSelectedProduct)
                                    <option value="{{ $notSelectedProduct->id }}"> {{ $notSelectedProduct->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-raised btn-primary">
                                Yadda saxla
                            </button>
                            <button type="submit" class="btn btn-danger" name="delete" value="delete">
                                Sil
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
