@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>{{$category->title}}</h5>
                <form role="form" method="POST"
                      action="{{ route('admin.categories.update', ['id' => $category->id]) }}"
                      enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="title" name="title" type="text" class="validate" autofocus
                                           value="{{ $category->title }}">
                                    <label for="title">Ad</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="description" id="description"
                                              class="materialize-textarea">{{ $category->description }}</textarea>
                                    <label for="description">Təsviri</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>Şəkil</span>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                                <div class="col s12">
                                    <img src="/storage/{{$category->image_url}}" alt="" width="100%">
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <select id="select" class="form-control" name="parent">
                                        <option value> Yoxdu</option>
                                        @foreach($categories as $oneCategory)
                                            @if($oneCategory->id == $category->parent_id)
                                                <option value="{{ $oneCategory->id }}"
                                                        selected> {{ $oneCategory->title }}</option>
                                            @else
                                                <option value="{{ $oneCategory->id }}"> {{ $oneCategory->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <label>Valideyin</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="row ">
                                <div class="col s12">
                                    <input type="checkbox" id="is_shown"
                                           name="is_shown" {{ $category->is_shown ? 'checked': ''}}/>
                                    <label for="is_shown">Kateqoriyani göstərmək</label>
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
