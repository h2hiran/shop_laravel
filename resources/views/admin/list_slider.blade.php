@php
     $listslider=1;
      $slider=1;
@endphp
@extends('admin.dashboard')

@section('cat')
    <h1 class="m-0 text-dark">لیست اسلایدر</h1>
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
                <th scope="col">ویرایش</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $value)
                <tr>
                    <th scope="row">{{$value->id}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->seo}}</td>
                    <td><a href="/admin/edite-slider/{{$value->id}}" class="btn fa fa-edit"></a></td>
                    <td><a href="/admin/delete-slider/{{$value->id}}" class="btn fa fa-trash" onclick="return confirm('آیا مطمئن هستید؟')"></a></td>
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
    $listslider=0;
        $slider=0;
@endphp