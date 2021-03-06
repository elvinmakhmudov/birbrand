@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>Karusel</h5>
                <a href="{{ route('admin.carousels.create') }}" class="btn btn-raised btn-primary">Əlavə et</a>
                <table class="bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Shekil</th>
                        <th>Ad</th>
                        <th>Təsviri</th>
                        <th>Kim yaradıb</th>
                        <th>Yaranma tarixi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carousels as $carousel)
                        <tr>
                            <td>
                                <a href="{{ route('admin.carousels.edit', ['id' => $carousel->id]) }}">{{ $carousel->id }}</a>
                            </td>
                            <td><a href="{{ $carousel->url }}"><img style="display:block" width="50%"
                                                                    src="/storage/{{$carousel->image_url}}" alt=""></a>
                            </td>
                            <td>{{ $carousel->title }}</td>
                            <td>{{ $carousel->description}}</td>
                            <td>{{ $carousel->user->name }}</td>
                            <td>{{ $carousel->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
