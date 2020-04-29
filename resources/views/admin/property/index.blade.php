@extends('admin.layout.layout')

@section('title')
    التحكم في العقارات

@endsection

@section('header')

    {{!! Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}}

@endsection

@section('content')
{{--    <section class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <h1>التحكم في العقارات</h1>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6">--}}
{{--                    <ol class="breadcrumb float-sm-right">--}}
{{--                        <li class="breadcrumb-item"><a href="{{ url('/Adminpanel')}}">الرئيسية</a></li>--}}
{{--                        <li class="breadcrumb-item active"><a href="{{ url('/Adminpanel/Property')}}">التحكم في العقارات</a></li>--}}
{{--                    </ol>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th># </th>
                                <th>نوع العقار </th>
{{--                                <th>أدنى سعر</th>--}}
{{--                                <th>اعلى سعر</th>--}}
{{--                                <th>عدد الغرف</th>--}}
                                <th>حالة العقار</th>
{{--                                <th>وصف العقار</th>--}}
                                <th>صورة العقار</th>
{{--                                <th>العنوان</th>--}}
                                <th>المدينة</th>
                                <th>المالك</th>
                                <th colspan="2">التحكم</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($property as $allProperties)
                                <tr>
                                    <td>{{$allProperties->id}}</td>
                                    <td>
                                        {{$allProperties->type}}
                                    </td>
{{--                                    <td>{{$allProperties->minPrice}}</td>--}}
{{--                                    <td>{{$allProperties->maxPrice}}</td>--}}
{{--                                    <td>{{$allProperties->roomNumbers}}</td>--}}
                                    <td>{{$allProperties->state ==0 ? 'ايجار' : 'بيع'}}</td>
{{--                                    <td>{{$allProperties->description}}</td>--}}
                                    <td>
{{--                                        {{asset('storage/public/images/'$allProperties->image)}}--}}
                                        <img src ="{{asset('storage/images/'.$allProperties->image)}}" height="100" width="100"/>
                                    </td>
{{--                                    <td>{{$allProperties->street}}</td>--}}
                                    <td>{{$allProperties->city}}</td>
                                    <td>{{Auth::user()->firstName .' '.Auth::user()->lastName }}</td>

                                    <td>
                                        <a href="{{ url('/Adminpanel/Property/'.$allProperties->id.'/edit')}}"
                                           class="btn btn-info btn-sm"><i class="material-icons">تعديل </i></a>
                                        <a href="{{ url('/Adminpanel/Property/'.$allProperties->id)}}"
                                           class="btn btn-primary btn-sm"><i class="material-icons">عرض </i></a>

                                        <form id="delete-form-{{ $allProperties->id }}" action="{{ route('Property.destroy',$allProperties->id) }}"
                                              style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $allProperties->id }}').submit();
                                            }else {
                                            event.preventDefault();
                                            }"><i class="material-icons">حذف</i></button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>

@endsection


@section('footer')

    {{!! Html::script('admin/plugins/datatables/jquery.dataTables.js') !!}}
    {{!! Html::script('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') !!}}




    <script type="text/javascript">
        $('#table').DataTable({
            "paging": true,
            "lenghtChange":true,
            "searching":true,
            "ordring":true,
            "info":true,
            "autowidth":true

        });

    </script>



@endsection
