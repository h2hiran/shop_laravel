@php
    $addprodoct=1;
    $prodoct=1;
@endphp


@extends('admin.dashboard')


@section('cat')
<h1 class="m-0 text-dark">اضافه کردن محصول</h1>
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
        <form role="form" action="/admin/store-prodoct" method="post" id="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="form-group">
                    <label for="name">نام محصول</label>
                    <input type="text" class="form-control @if($errors->first('name')) border-danger @endif" id="name"  name="name" placeholder="نام محصول را وارد کنید" value="{{old('name')}}" required>

                </div><br>
                <div class="form-group">
                    <label for="seo">آدرس url</label>
                    <input type="text" class="form-control @if($errors->first('seo')) border-danger @endif" id="seo" name="seo" placeholder="آدرس url را وارد کنید" required>
                </div><br>


             <div class="form-group col-sm-12">
                 <label for="sub">زیرگروه اول</label>
                 <select id="sub" class="form-control" name="sub">
                     @foreach($data as $value)
                     <option value="{{$value->id}}">{{$value->name_menu}}</option>
                     @endforeach
                 </select>
             </div><br>

                <div class="form-group col-sm-12">
                    <label for="sub1">زیرگروه دوم</label>
                    <select id="sub1" class="form-control" name="sub1">
                        @foreach($data1 as $value)
                            <option value="{{$value->id}}">{{$value->name_menu}}</option>
                        @endforeach
                    </select>
                </div><br>


                <div class="form-group col-sm-12">
                    <label for="sub2"> زیرگروه سوم</label>
                    <select id="sub2" class="form-control" name="sub2">
                        @foreach($data2 as $value)
                            <option value="{{$value->id}}">{{$value->name_menu}}</option>
                        @endforeach
                    </select>
                </div><br>

                <div class="form-group col-sm-12">
                    <label for="brand"> برند</label>
                    <select class="form-control" name="brand">
                        @foreach($brands as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div><br>

                <div class="form-group">
                    <label for="gheymat">قیمت به تومان</label>
                    <input type="number" class="form-control" id="gheymat" name="gheymat" placeholder="قیمت را وارد کنید" required>
                </div><br>

                <div class="form-group">
                    <label for="takhfif">قیمت تخفیف به تومان</label>
                    <input type="number" class="form-control" id="takhfif" name="takhfif" placeholder="قیمت تخفیف را وارد کنید" required>
                </div><br>

                <div class="form-group">
                    <label for="vizh">ویژگی های محصول</label>
                    <!-- the tag stuff -->
                    <input id="tagArray" name="vizh" type="hidden" class="form-control"/>
                    <input id="transientTagField" type="text" pattern="^([a-zA-Z0-9\.\-+]{2,20},?)+$"
                           title="Min: 2 Chars and only [a-z,+,-,.]" placeholder="ویژگی های محصول را وارد کنید"
                           class="form-control  @if($errors->first('vizh')) border-danger @endif"/>
                    <div id="tagContainer" class="inline form-control"></div>
                    <input type="submit" id="validate" style="position: absolute; left: -9999px" class="form-control"/>
                </div><br>

                <div class="form-group">
                    <label for="estefadeh">نحوه استفاده</label>
                    <textarea id="estefadeh" class="form-control ckeditor" name="estefadeh"></textarea>
                </div><br>

                <div class="form-group">
                    <label for="dis">توضیحات</label>
                    <textarea id="dis" class="form-control" name="dis" required></textarea>
                </div><br>


                <div class="form-group">
                    <label for="pic">ارسال فایل</label>
                    <input type="file" class="form-control" id="image_uploads" name="pic" accept=".jpg, .jpeg, .png" required>
                </div><br>

                <div class="form-group">
                    <label for="check">انتخاب</label><br>
                    <input type="checkbox" class="checkbox" name="ma" > پیشنهاد ما <br>
                    <input type="checkbox" class="checkbox" name="good" > پیشنهاد ویژه
                </div><br>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ارسال</button>
            </div>
        </form>
    </div>



    <script>
        CKEDITOR.replace( 'ckeditor',
            {
                customConfig : 'config.js',
                toolbar : 'simple'
            })
    </script>
@endsection

@php
    $addprodoct=0;
    $prodoct=0;
@endphp