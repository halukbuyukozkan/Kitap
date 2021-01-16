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
                        <h4 class="title">Kitap Düzenle</h4>
                        <p class="category">{{$data[0]['name']}}</p>
                    </div>
                    <div class="card-content">
                        <form enctype="multipart/form-data" action="{{route('admin.book.edit.post',['id'=>$data[0]['id']])}}" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">

                                        <input type="text" name="name" class="form-control" value="{{$data[0]['name']}}">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        @if($data[0]['image']!="")
                                        <img src="{{asset($data[0]['image'])}}" style="width:120px;height:120px;" alt="">
                                        @endif
                                        <input type="file" name="image" style="opacity: 1;position: inherit" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <input type="text" name="price" class="form-control" value="{{$data[0]['price']}}">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <select name="authorid" class="form-control" id="">
                                            @foreach($author as $key => $value)
                                            <option @if($value['id']==$data[0]['authorid']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
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
                                            <option @if($value['id']==$data[0]['publisherid']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">

                                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$data[0]['description']}}</textarea>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary pull-right">Kitap Düzenle</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection