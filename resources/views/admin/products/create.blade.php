@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>Yeni produkt əlavə etmək</h2>
                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ route('admin.products.store', ['id' => $categoryId]) }}"
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
                            <label for="old-price" class="col-md-2 control-label">Əvvəlki qiymət</label>

                            <div class="col-md-8">
                                <input id="old-price" type="number" class="form-control" name="old_price" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sale-percent" class="col-md-2 control-label">Endirim faizi</label>

                            <div class="col-md-8">
                                <input id="sale-percent" type="number" class="form-control" name="sale_percent" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-2 control-label">Qiymət</label>

                            <div class="col-md-8">
                                <input id="price" type="number" class="form-control" name="price" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail" class="col-md-2 control-label">Şəkil</label>

                            <div class="col-md-8">
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input type="file" id="thumbnail" multiple="" name="thumbnail">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image1" class="col-md-2 control-label">Elave shekil 1</label>

                            <div class="col-md-8">
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input type="file" id="image1" multiple="" name="image1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image2" class="col-md-2 control-label">Elave shekil 2</label>

                            <div class="col-md-8">
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input type="file" id="image2" multiple="" name="image2">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image3" class="col-md-2 control-label">Elave shekil 3</label>

                            <div class="col-md-8">
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input type="file" id="image3" multiple="" name="image3">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image4" class="col-md-2 control-label">Elave shekil 4</label>

                            <div class="col-md-8">
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input type="file" id="image4" multiple="" name="image4">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image5" class="col-md-2 control-label">Elave shekil 5</label>

                            <div class="col-md-8">
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input type="file" id="image5" multiple="" name="image5">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="select" class="col-md-2 control-label">Valideyin</label>

                            <div class="col-md-8">
                                <select id="select" class="form-control" name="category">
                                    @foreach($categories as $oneCategory)
                                            <option value="{{ $oneCategory->id }}"> {{ $oneCategory->title }}</option>
                                    @endforeach
                                </select>
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
