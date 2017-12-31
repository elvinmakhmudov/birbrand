@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>{{$product->title}}</h5>
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
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="title" name="title" type="text" class="validate" autofocus
                                           value="{{ $product->title }}">
                                    <label for="title">Ad</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="description" id="description"
                                              class="materialize-textarea">{{ $product->description }}</textarea>
                                    <label for="description">Təsviri</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="options" id="options"
                                              class="materialize-textarea">{{ $product->options}}</textarea>
                                    <label for="options">Seçimlər</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="old_price" name="old_price" type="number" class="validate" autofocus
                                           value="{{ $product->old_price }}">
                                    <label for="old_price">Əvvəlki qiymət</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="sale_percent" name="sale_percent" type="number" class="validate"
                                           autofocus value="{{ $product->sale_percent }}">
                                    <label for="sale_percent">Endirim faizi</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="price" name="price" type="number" class="validate" autofocus
                                           value="{{ $product->price }}">
                                    <label for="price">Qiymət</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>Şəkil</span>
                                        <input type="file" name="cover_image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                                <div class="col s12">
                                    <img src="/storage/{{$product->folder . '/thumbnail.jpg'}}" alt="" width="100%">
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <p for="is_shown">Əlavə Şəkil poz</p>
                                @foreach($product->images as $image)
                                    <div class="checkbox-inline">
                                        <input type="checkbox" name="imagesToDelete[]" value="{{ $image }}"
                                               id="{{ $image }}">
                                        <label for="{{ $image }}"><img src="/storage/{{$image}}" alt=""
                                                                       width="30%"></label>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="col s12">
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>Əlavə şəkillər</span>
                                        <input type="file" multiple="" name="images[]">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <label class="active">Kategoriya</label>
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
                        </div>

                        <div class="col s12">
                            <div class="row ">
                                <div class="col s12">
                                    <input type="checkbox" id="is_shown"
                                           name="is_shown" {{ $product->is_shown? 'checked':'' }}/>
                                    <label for="is_shown">Produktu göstərmək</label>
                                </div>
                            </div>
                        </div>


                        <div class="col s12">
                            <button type="submit" class="btn waves-effect waves-light">
                                Yadda saxla
                            </button>
                            <button type="submit" class="btn waves-effect waves-light red" name="delete" value="delete">
                                Sil
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
