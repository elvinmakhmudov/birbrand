@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>{{$carousel->title}}</h5>
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ route('admin.carousels.update', ['id' => $carousel->id]) }}"
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
                            <input id="title" type="text" class="form-control" name="title" autofocus
                                   value="{{ $carousel->title }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-md-2 control-label">Təsviri</label>

                        <div class="col-md-8">
                                <textarea name="description" id="description" cols="30" rows="10"
                                          class="form-control">{{ $carousel->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="url" class="col-md-2 control-label">Link</label>

                        <div class="col-md-8">
                            <input id="url" type="text" class="form-control" name="url" autofocus
                                   value="{{ $carousel->url}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-md-2 control-label">Şəkil</label>

                        <div class="col-md-3">
                            <input type="text" readonly="" class="form-control" placeholder="Browse...">
                            <input type="file" id="image" multiple="" name="image">
                        </div>
                        <div class="col-md-5">
                            <img src="/storage/{{$carousel->image_url}}" alt="" width="100%">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="is_shown" class="col-md-2 control-label">Karuseli göstərmək</label>
                        <div class="col-md-5">
                            <div class="checkbox">
                                <label class="checkbox">
                                    <input type="checkbox" name="is_shown" {{ $carousel->is_shown? 'checked':'' }}>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Yadda saxla
                            </button>
                            <button type="submit" class="btn btn-danger" name="delete" value="delete">
                                Sil
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
