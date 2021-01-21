@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @if(session("status"))
                <div class="alert alert-primary" role="alert">
                    {{session("status")}}
                </div>
                @endif


                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Kitap Ekle</h4>
                        <p class="category">Kitap Oluşturunuz</p>
                    </div>
                    <div class="card-content">
                        <form enctype="multipart/form-data" action="{{route('admin.book.create.post')}}" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Kitap Adı</label>
                                        <input type="text" name="name" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <input type="file" name="image" style="opacity: 1;position: inherit" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Kitap Fiyatı</label>
                                        <input type="text" name="price" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <select name="authorid" class="form-control" id="">
                                            @foreach($author as $key => $value)
                                            <option value="{{$value['id']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <select name="categoryid" class="form-control" id="">
                                            @foreach($category as $key => $value)
                                            <option value="{{$value['id']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <select name="publisherid" class="form-control" id="">
                                            @foreach($publisher as $key => $value)
                                            <option value="{{$value['id']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Kitap Açıklama</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary pull-right">Kitap Ekle</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection