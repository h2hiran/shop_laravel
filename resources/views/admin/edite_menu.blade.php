@php
    if ($data->level_menu==0)
         $listgroup0=1;
    elseif ($data->level_menu==1)
          $listgroup1=1;
          else
          $listgroup2=1;

    $group=1;
@endphp


@extends('admin.dashboard')

@section('cat')
    <h1 class="m-0 text-dark">ویرایش کردن</h1>
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
        @if(isset($ok))
            <br>
            <span id="alert" class="alert alert-success"><label>ذخیره با موفقیت انجام گردید</label></span>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="/admin/list-menu/edite-menu/update/{{$data->id}}">
            {{csrf_field()}}
            <div class="card-body">
                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="نام دسته بندی را وارد کنید" required value="{{$data->name_menu}}">
                </div>
                <div class="form-group">
                    <label for="url">آدرس url</label>
                    <input type="text" name="seo" class="form-control" id="url" placeholder="آدرس url را وارد کنید" required value="{{$data->seo_menu}}">
                </div>
                @if($data->level_menu==1 || $data->level_menu==2)
                <div class="form-group">
                    <select class="form-control" name="parent" required>
                        @foreach($men as $value)
                            <option @if($value->id==$data->parent_menu) selected @endif value="{{$value->id}}">{{$value->name_menu}}</option>
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
    if ($data->level_menu==0)
        $listgroup0=0;
   elseif ($data->level_menu==1)
         $listgroup1=0;
         else
         $listgroup2=0;

   $group=0;
@endphp