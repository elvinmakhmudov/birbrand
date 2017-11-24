@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>Yeni kateqoriya əlavə etmək</h5>
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ route('admin.categories.store') }}"
                      enctype="multipart/form-data">
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
                        <label for="image" class="col-md-2 control-label">Şəkil</label>

                        <div class="col-md-8">
                            <input type="text" readonly="" class="form-control" placeholder="Browse...">
                            <input type="file" id="image" multiple="" name="image">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="select" class="col-md-2 control-label">Valideyin</label>

                        <div class="col-md-8">
                            <select id="select" class="form-control" name="parent">
                                <option value selected> Yoxdu</option>
                                @foreach($categories as $oneCategory)
                                    <option value="{{ $oneCategory->id }}"> {{ $oneCategory->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="is_shown" class="col-md-2 control-label">Kateqoriyanı göstərmək</label>
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
