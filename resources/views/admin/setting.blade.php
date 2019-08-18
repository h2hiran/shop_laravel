@php
if ($status=='we')
    $listwe=1;
else
$listspe=1;
$setting=1;
@endphp
@extends('admin.dashboard')

@section('cat')
    <h1 class="m-0 text-dark">تنظیمات</h1>
@endsection

@section('content')
    <script>
        setTimeout(function(){
            $('#alert').remove();
        }, 2000);
    </script>
    <div class="card card-primary">
        @if(! isset($_GET['status']))
            <div class="card-header" style="margin-bottom: 20px">
                <h3 class="card-title"></h3>
            </div>
        @else
            <div class="card-header" style="margin-bottom: 20px;background-color: #980110">
                <h3 id="alert" class="card-title">ارور: ابتدا زیر گروه را پاک کنید</h3>
            </div>
        @endif
        <table class="table table-bordered table-striped" id="example1">
            <thead>
            <tr style="text-align: center">
                <th scope="col">#</th>
                <th scope="col">نام</th>
                <th scope="col">seo</th>
                <th scope="col">وضعیت</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $value)
                <tr>
                    <th scope="row">{{$value->id}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->seo}}</td>
                    @if(($status=='we'))
                    @if($value->suggestion>0)
                    <td><a href="/admin/store-setting/1/{{$value->id}}/0" class="btn-success ">فعال</a></td>
                        @else
                        <td><a href="/admin/store-setting/1/{{$value->id}}/1" class="btn-danger ">غیرفعال</a></td>
                    @endif
                        @else
                        @if($value->special>0)
                            <td><a href="/admin/store-setting/2/{{$value->id}}/0" class="btn-success ">فعال</a></td>
                        @else
                            <td><a href="/admin/store-setting/2/{{$value->id}}/1" class="btn-danger ">غیرفعال</a></td>
                        @endif
                        @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('java')
    <script>
        $(function () {
            $("#example1").DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous" : "قبلی"
                    }
                },
                "info" : false,
            });
        });
    </script>
@endsection
@php
    if ($status=='we')
         $listwe=0;
         else
        $listspe=1;

$setting=0;
@endphp