@php
    if ($id==0)
      $listgroup0=1;
       elseif ($id==1)
         $listgroup1=1;
       else
            $listgroup2=1;

      $group=1;
@endphp
@extends('admin.dashboard')

@section('cat')
    <h1 class="m-0 text-dark">لیست گروه بندی</h1>
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
                    <th scope="col">نام سرگروه</th>
                    <th scope="col">ویرایش</th>
                    <th scope="col">حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $value)
                <tr>
                    <th scope="row">{{$value->id}}</th>
                    <td>{{$value->name_menu}}</td>
                    <td>{{$value->seo_menu}}</td>
                    @if($id==0)
                    <td>سرگروه</td>
                    @else
                        @foreach($parent as $par)
                            @if($par->id==$value->parent_menu)
                                 <td>{{$par->name_menu}}</td>
                            @endif
                        @endforeach
                    @endif

                    <td><a href="edite-menu/{{$value->id}}" class="btn fa fa-edit"></a></td>
                    <td><a href="delete-menu/{{$value->id}}" class="btn fa fa-trash" onclick="return confirm('آیا مطمئن هستید؟')"></a></td>
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
    if ($id==0)
     $listgroup0=0;
      elseif ($id==1)
        $listgroup1=0;
      else
           $listgroup2=0;

     $group=1;
@endphp