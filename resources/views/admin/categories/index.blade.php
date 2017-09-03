@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>Kateqoriyalar</h2>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-raised btn-primary">Əlavə et</a>
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Ad</th>
                            <th>Təsviri</th>
                            <th>Valideyin</th>
                            <th>Shekil</th>
                            <th>Yaranma tarixi</th>
                            <th>Kim yaradib</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td><a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}">{{ $category->id }}</a></td>
                                <td><a href="{{route('admin.products.index', ['id' =>$category->id])}}">{{ $category->title  }}</a></td>
                                <td>{{ $category->description}}</td>
                                @if(count($category->parent))
                                    <td>{{ $category->parent->title }}</tdjl>
                                @else
                                    <td></td>
                                @endif
                                <td><img style="display:block"  width="100%" src="/storage/{{$category->image_url}}" alt=""></td>
                                <td>{{ $category->created_at}}</td>
                                <td>{{ $category->user->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
