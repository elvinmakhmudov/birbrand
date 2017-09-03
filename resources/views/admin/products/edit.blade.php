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
                                <input id="old-price" type="number" class="form-control" name="old_price" autofocus
                                       value="{{ $product->old_price }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sale-percent" class="col-md-2 control-label">Endirim faizi</label>

                            <div class="col-md-8">
                                <input id="sale-percent" type="number" class="form-control" name="sale_percent"
                                       autofocus value="{{ $product->sale_percent }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-2 control-label">Qiymət</label>

                            <div class="col-md-8">
                                <input id="price" type="number" class="form-control" name="price" autofocus
                                       value="{{ $product->price }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="image" class="col-md-2 control-label">Əsas Şəkil</label>

                            <div class="col-md-3">
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input type="file" id="image" multiple="" name="thumbnail">
                            </div>
                            <div class="col-md-5">
                                <img src="/storage/{{$product->thumbnail}}" alt="" width="100%">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-md-2 control-label">Əlavə Şəkil poz</label>
                            <div class="col-md-5">
                                <div class="checkbox">
                                    @foreach($product->images as $image)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="imagesToDelete[]" value="{{ $image }}">
                                            <img src="/storage/{{$image}}" alt="" width="50%">
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="images" class="col-md-2 control-label">Əlavə şəkillər</label>

                            <div class="col-md-8">
                                <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                <input type="file" id="images" multiple name="images[]">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="select" class="col-md-2 control-label">Kateqoriya</label>

                            <div class="col-md-8">
                                <select id="select" class="form-control" name="category">
                                    <option value> Yoxdu</option>
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
                            <label for="is_shown" class="col-md-2 control-label">Produktu göstərmək</label>
                            <div class="col-md-5">
                                <div class="checkbox">
                                    <label class="checkbox">
                                        <input type="checkbox" name="is_shown" {{ $product->is_shown? 'checked':'' }}>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-raised btn-primary">
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
    </div>

@endsection
