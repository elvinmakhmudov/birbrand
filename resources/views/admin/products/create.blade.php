@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>Yeni produkt əlavə etmək</h5>
                <form role="form" method="POST"
                      action="{{ route('admin.products.store', ['id' => $categoryId]) }}"
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
                                    <input id="title" name="title" type="text" class="validate" autofocus required>
                                    <label for="title">Ad</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="description" id="description"
                                              class="materialize-textarea"></textarea>
                                    <label for="description">Təsviri</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="options" id="options"
                                              class="materialize-textarea"></textarea>
                                    <label for="options">Seçimlər</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="old_price" name="old_price" type="number" class="validate" autofocus>
                                    <label for="old_price">Əvvəlki qiymət</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="sale_percent" name="sale_percent" type="number" class="validate"
                                           autofocus>
                                    <label for="sale_percent">Endirim faizi</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="price" name="price" type="number" class="validate" autofocus required>
                                    <label for="price">Qiymət</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>Əsas Şəkil</span>
                                        <input type="file" name="cover_image" required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
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
                                        <option value selected> Yoxdu</option>
                                        @foreach($categories as $oneCategory)
                                            @if($oneCategory->id == $categoryId)
                                                <option value="{{ $oneCategory->id }}"
                                                        selected> {{ $oneCategory->slug }}</option>
                                            @else
                                                <option value="{{ $oneCategory->id }}"> {{ $oneCategory->slug }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row ">
                                <div class="col s12">
                                    <input type="checkbox" id="is_shown" name="is_shown" checked/>
                                    <label for="is_shown">Produktu göstərmək</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="note" name="note" type="text" class="validate" autofocus>
                                    <label for="note">Qeyd</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="url" name="url" type="text" class="validate" autofocus required>
                                    <label for="url">URL</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <button type="submit" class="btn waves-effect waves-light">
                                Yadda saxla
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
