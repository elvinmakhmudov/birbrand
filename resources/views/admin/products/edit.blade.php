@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$product->title}}</h2>
                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ route('admin.products.update', ['id' => $category->id, 'productId' => $product->id]) }}"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="title" class="col-md-2 control-label">Ad</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title" autofocus
                                       value="{{ $product->title }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-2 control-label">Təsviri</label>

                            <div class="col-md-8">
                                <textarea name="description" id="description" cols="30" rows="10"
                                          class="form-control">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="old-price" class="col-md-2 control-label">Əvvəlki qiymət</label>

                            <div class="col-md-8">
                                <input id="old-price" type="number" class="form-control" name="old_price" autofocus value="{{ $product->old_price }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sale-percent" class="col-md-2 control-label">Endirim faizi</label>

                            <div class="col-md-8">
                                <input id="sale-percent" type="number" class="form-control" name="sale_percent" autofocus value="{{ $product->sale_percent }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-2 control-label">Qiymət</label>

                            <div class="col-md-8">
                                <input id="price" type="number" class="form-control" name="price" autofocus value="{{ $product->price }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-md-2 control-label">Əsas Şəkil</label>

                            <div class="col-md-2">
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input type="file" id="image" multiple="" name="thumbnail">
                            </div>
                            <div class="col-md-3">
                                <img src="/storage/{{$product->thumbnail}}" alt="" width="100%">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="select" class="col-md-2 control-label">Kateqoriya</label>

                            <div class="col-md-8">
                                <select id="select" class="form-control" name="category">
                                    <option value> Yoxdu </option>
                                    @foreach($categories as $oneCategory)
                                        @if($oneCategory->id == $product->category_id)
                                            <option value="{{ $oneCategory->id }}"
                                                    selected> {{ $oneCategory->title }}</option>
                                        @else
                                            <option value="{{ $oneCategory->id }}"> {{ $oneCategory->title }}</option>
                                        @endif
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
