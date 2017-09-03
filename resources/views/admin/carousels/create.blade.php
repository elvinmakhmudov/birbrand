@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>Yeni karusel əlavə etmək</h2>
                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ route('admin.carousels.store') }}"
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
                            <label for="title" class="col-md-2 control-label">Ad</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-2 control-label">Təsviri</label>

                            <div class="col-md-8">
                                <textarea name="description" id="description" cols="30" rows="10"
                                          class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="url" class="col-md-2 control-label">Link</label>

                            <div class="col-md-8">
                                <input id="url" type="text" class="form-control" name="url" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-md-2 control-label">Şəkil</label>

                            <div class="col-md-8">
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input type="file" id="image" multiple="" name="image">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="is_shown" class="col-md-2 control-label">Karuseli göstərmək</label>
                            <div class="col-md-5">
                                <div class="checkbox">
                                    <label class="checkbox">
                                        <input type="checkbox" name="is_shown">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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
