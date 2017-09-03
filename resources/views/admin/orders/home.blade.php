@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.orders.create', ['id' => Auth::user()->id]) }}"
                       class="btn btn-raised btn-primary">Əlavə
                        et</a>
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Ad</th>
                            <th>Nömrə</th>
                            <th>Status</th>
                            <th>Produktlar</th>
                            <th>Istifadəçi</th>
                            <th>Yaranma tarixi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.orders.edit', ['id' => $order->id ]) }}">{{ $order->id }}</a>
                                </td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->number}}</td>
                                <td>{{$order->status}}</td>
                                <td>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>
                                                Ad
                                            </th>
                                            <th>
                                                Qiymət
                                            </th>
                                            <th>
                                                Sayı
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->products as $product)
                                            <tr>
                                                <td>
{{--                                                    <a href="{{ route('admin.products.edit', ['productId' => $product->id]) }}">{{ $product->title}}</a>--}}
                                                    <a href="/#/product/{{$product->id}}">{{ $product->title}}</a>
                                                </td>
                                                <td>
                                                    {{$product->pivot->price}}
                                                </td>
                                                <td>
                                                    {{$product->pivot->amount}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                @if($order->user)
                                    <td>
                                        <a href="{{ route('admin.users.edit', ['id' => $order->user->id ]) }}">{{$order->user->name}}
                                            ( {{$order->user->number }} )</a></td>
                                @else
                                    <td></td>
                                @endif
                                <td>{{ $order->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection