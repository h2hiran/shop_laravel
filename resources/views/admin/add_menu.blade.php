@php
    if ($id==0)
         $addgroup0=1;
    elseif ($id==1)
          $addgroup1=1;
          else
          $addgroup2=1;

    $group=1;

@endphp


@extends('admin.dashboard')

@section('cat')
    <h1 class="m-0 text-dark">اضافه کردن منو</h1>
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
        <form role="form" method="post" action="/admin/add-menu/store/{{$id}}">
            {{csrf_field()}}
            <div class="card-body">
                <div class="form-group">
                    <label for="name">نام منو</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="نام را وارد کنید" required>
                </div>
                <div class="form-group">
                    <label for="seo">آدرس url</label>
                    <input type="text" name="seo" class="form-control" id="seo" placeholder="آدرس url را وارد کنید" required>
                </div>

                @if($id==1 || $id==2)
                    <div class="form-group">
                        <label for="seo">سرگروه</label>
                        <select class="form-control" name="parent" required>
                            @foreach($men as $value)
                                <option value="{{$value->id}}">{{$value->name_menu}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="ذخیره">
                </div>
            </div>
        </form>
    </div>
@endsection

@php
    if ($id==0)
         $addgroup0=0;
    elseif ($id==1)
          $addgroup1=0;
          else
          $addgroup2=0;

    $group=0;
@endphp