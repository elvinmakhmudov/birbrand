@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>Sifarişi dəyişmək</h5>
                <form role="form" method="POST" action="{{ route('admin.orders.update', ['id' => $order->id]) }}"
                      enctype="multipart/form-data">

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
                                    <input id="name" name="name" type="text" class="validate" autofocus
                                           value="{{ $order->name}}">
                                    <label for="name">Ad</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="number" name="number" type="text" class="validate" autofocus
                                           value="{{ $order->number}}">
                                    <label for="number">Nömrə</label>
                                </div>
                            </div>
                        </div>


                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <select id="select"  name="status">
                                        <option value="{{ $order->status }}"> {{ $order->status }}</option>
                                        <option value="order.status.payment">Ödəniş gözlənilir</option>
                                        <option value="order.status.processing">İşlənilir</option>
                                        <option value="order.status.delivered">Çatdırılıb</option>
                                        <option value="order.status.shipped">Göndərilib</option>
                                        <option value="order.status.cancelled">İmtina olunub.</option>
                                        <option value="order.status.dispute">Mübahisə davam edir.</option>
                                        <option value="order.status.finished">Bitib</option>
                                    </select>
                                    <label for="status">Status</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="created_at" name="created_at" type="text" class="validate" autofocus
                                           value="{{ $order->created_at}}">
                                    <label for="created_at">Yaranma tarixi</label>
                                </div>
                            </div>
                        </div>


                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <label class="active">İstifadəçi</label>
                                    <select id="select"  name="user">
                                        <option value> Yoxdu</option>
                                        @foreach($users as $oneUser)
                                            @if($order->user && $oneUser->id == $order->user->id)
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
                        </div>

                        <div class="col s12">
                            <div class="row ">
                                <div class="col s12">
                                    <input type="checkbox" id="reviewable" name="reviewable" {{ $order->reviewable? 'checked': ''}}/>
                                    <label for="reviewable">Rey bildirmek olar?</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row ">
                                <div class="col s12">
                                    <input type="checkbox" id="detach" name="detach"/>
                                    <label for="detach">Evvelki produktlari silmek</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <label class="active">Produkt</label>

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
