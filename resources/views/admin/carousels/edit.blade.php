@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>{{$carousel->title}}</h5>
                <form role="form" method="POST"
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
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="title" name="title" type="text" class="validate" autofocu
                                           value="{{ $carousel->title }}" s>
                                    <label for="title">Ad</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="description" id="description"
                                              class="materialize-textarea">{{ $carousel->description }}</textarea>
                                    <label for="description">Təsviri</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="url" name="url" type="text" class="validate" value="{{ $carousel->url}}">
                                    <label for="url">Link</label>
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
                                    <img src="/storage/{{$carousel->image_url}}" alt="" width="100%">
                                </div>
                            </div>
                        </div>


                        <div class="col s12">
                            <div class="row ">
                                <div class="col s12">
                                    <input type="checkbox" id="is_shown" name="is_shown" {{ $carousel->is_shown ? 'checked': ''}}/>
                                    <label for="is_shown">Karuseli göstərmək</label>
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
