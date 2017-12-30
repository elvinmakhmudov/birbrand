@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>Sifarişlər</h5>
                <a href="{{ route('admin.orders.create', ['id' => Auth::user()->id]) }}"
                   class="btn btn-raised btn-primary">Əlavə
                    et</a>
                <table class="bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Ad</th>
                        <th>Nömrə</th>
                        <th>Status</th>
                        <th>Produktlar</th>
                        <th>Istifadəçi</th>
                        <th>Rey vere biler</th>
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
                                <table class="bordered">
                                    <thead>
                                    <tr>
                                        <th>
                                            Ad
                                        </th>
                                        <th>
                                            Qiymət
                                        </th>
                                        <th>
                                            Seçim
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
                                                <a href="/#/product/{{$product->id}}">{{ $product->title}}</a>
                                            </td>
                                            <td>
                                                {{$product->pivot->price}}
                                            </td>
                                            <td>
                                                @if(json_decode($product->pivot->options, true))
                                                    @foreach(json_decode($product->pivot->options, true) as $optionName => $option)
                                                        <p> {{ $optionName }} - {{ $option }}</p>
                                                    @endforeach
                                                @endif
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
                            <td>{{ $order->reviewable }}</td>
                            <td>{{ $order->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
        </div>
    </div>

@endsection
