@php
    $addslider=1;
    $slider=1;
@endphp


@extends('admin.dashboard')

@section('cat')
    <h1 class="m-0 text-dark">اضافه کردن اسلایدر</h1>
@endsection



@section('content')
    <script>
        setTimeout(function(){
            $('#alert').remove();
        }, 2000);
    </script>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">اطلاعات را کامل کنید</h3>
        </div>
        @if(Session::pull('ok'))
            <br>
            <span id="alert" class="alert alert-success"><label>ذخیره با موفقیت انجام گردید</label></span>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="/admin/store-slider/" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="form-group">
                    <label for="name">نام اسلایدر</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="نام را وارد کنید" required>
                </div>
                <div class="form-group">
                    <label for="seo">آدرس url</label>
                    <input type="text" name="seo" class="form-control" id="seo" placeholder="آدرس url را وارد کنید" required>
                </div>

                <div class="form-group">
                    <label for="pic">عکس</label>
                    <input type="file" class="form-control" id="image_uploads" name="pic" accept=".jpg, .jpeg, .png" required>
                </div>

                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="ذخیره">
                </div>
            </div>
        </form>
    </div>

@endsection

@php
    $addslider=0;
    $slider=0;
@endphp