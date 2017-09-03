@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $user->name }}-nin sifarişləri</h2>
                    <a href="{{ route('admin.orders.create', ['id' => $user->id]) }}" class="btn btn-raised btn-primary">Əlavə
                        et</a>
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Ad</th>
                            <th>Nömrə</th>
                            <th>Status</th>
                            <th>Produktlar</th>
                            <th>Yaranma tarixi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td><a href="{{ route('admin.orders.edit', ['id' => $order->id ]) }}">{{ $order->id }}</a></td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->number}}</td>
                                <td>{{$order->status}}</td>
                                <td>
                                    @foreach($order->products as $product)
                                        <a href="{{ route('admin.products.edit', ['productId' => $product->id]) }}">{{ $product->title}}</a>
                                    @endforeach
                                </td>
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
