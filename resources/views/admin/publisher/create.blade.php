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
                        <h4 class="title">Yayınevi Ekle</h4>
                        <p class="category">Yayınevi Oluşturunuz</p>
                    </div>
                    <div class="card-content">
                        <form action="{{route('admin.publisher.create.post')}}" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Yayınevi Adı</label>
                                        <input type="text" name="name" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Yayınevi Ekle</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection