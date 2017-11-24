@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>Yeni karusel əlavə etmək</h5>
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ route('admin.banners.store') }}"
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
                        <label for="select" class="col-md-2 control-label">Banner tipi</label>

                        <div class="col-md-8">
                            <select id="select" class="form-control" name="type">
                                <option value> Yoxdu</option>
                                <option value="top-banner">Yuxarı banner</option>
                                <option value="left-banner">Sol banner</option>
                                <option value="right-banner">Sağ banner</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="is_shown" class="col-md-2 control-label">Banneri göstərmək</label>
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
@endsection
