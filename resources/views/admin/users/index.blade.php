@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>Istifadəçilər</h5>
                <a href="{{ route('admin.users.create') }}" class="btn btn-raised btn-primary">Əlavə et</a>
                <table class="bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Ad</th>
                        <th>Nömrə</th>
                        <th>Ünvan</th>
                        <th>Admin</th>
                        <th>Yaranma tarixi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="{{ route('admin.users.edit', ['id' =>$user->id]) }}">{{ $user->id }}</a></td>
                            <td>
                                <a href="{{ route('admin.orders.index', ['id' => $user->id]) }}">{{ $user->name }}</a>
                            </td>
                            <td>{{ $user->number }}</td>
                            <td>{{ $user->address}}</td>
                            <td>{{ $user->is_admin ? 'Bəli' : 'Xeyr' }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection
