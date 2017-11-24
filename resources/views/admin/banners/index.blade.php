@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                    <h5>Bannerlər</h5>
                    <a href="{{ route('admin.banners.create') }}" class="btn btn-raised btn-primary">Əlavə et</a>
                    <table class="bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Shekil</th>
                            <th>Təsviri</th>
                            <th>Link</th>
                            <th>Tip</th>
                            <th>Kim yaradıb</th>
                            <th>Yaranma tarixi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.banners.edit', ['id' => $banner->id]) }}">{{ $banner->id }}</a>
                                </td>
                                <td><a href="{{ $banner->url }}"><img style="display:block" width="50%"
                                                                        src="/storage/{{$banner->image_url}}" alt=""></a>
                                </td>
                                <td>{{ $banner->description}}</td>
                                <td><a href="{{ $banner->url}}">link</a></td>
                                <td>{{ $banner->type}}</td>
                                <td>{{ $banner->user->name }}</td>
                                <td>{{ $banner->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
