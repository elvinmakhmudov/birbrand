@extends('admin.layouts.app') @section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>Yeni banner əlavə etmək</h5>
                <form role="form" method="POST" action="{{ route('admin.banners.store') }}"
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
                                    <textarea name="description" id="description"
                                              class="materialize-textarea"></textarea>
                                    <label for="description">Təsviri</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="url" name="url" type="text" class="validate">
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
                            </div>
                        </div>


                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="type">
                                        <option value>Yoxdu</option>
                                        <option value="top-banner">Yuxarı banner</option>
                                        <option value="left-banner">Sol banner</option>
                                        <option value="right-banner">Sağ banner</option>
                                    </select>
                                    <label>Banner tipi</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="row ">
                                <div class="col s12">
                                    <input type="checkbox" id="is_shown" name="is_shown"/>
                                    <label for="is_shown">Banneri göstərmək</label>
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