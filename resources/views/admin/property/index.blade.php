@extends('admin.layout.layout')

@section('title')
    التحكم في العقارات

@endsection

@section('header')

    {{!! Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}}

@endsection

@section('content')
       <section class="content-header">
           <div class="container-fluid">
               <div class="row mb-2">
                   <div class="col-sm-6">
                       <h1>التحكم في العقارات</h1>
                   </div>
                   <div class="col-sm-6">
                       <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/AdminDashboard')}}">الرئيسية</a></li>
                           <li class="breadcrumb-item active"><a href="{{ url('/admin/Adminpanel/Properties')}}">التحكم في العقارات</a></li>
                       </ol>
                    </div>

                </div>
           </div>
        </section>

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
                                {{--                                <th>العنوان</th>--}}
                                <th>المدينة</th>
                                <th>المالك</th>
                                <th>التحكم</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($property as $key=>$allProperties)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>
                                        @if($allProperties->type==0)
                                            {{'فيلا'}}
                                        @elseif($allProperties->type==1)
                                            {{'ارض'}}
                                        @elseif($allProperties->type==2)
                                            {{'شقة'}}
                                        @elseif($allProperties->type==3)
                                            {{'بيت'}}
                                        @elseif($allProperties->type==4)
                                            {{'شاليه'}}
                                        @endif                                    </td>
                                    <td>{{$allProperties->state ==0 ? 'ايجار' : 'بيع'}}</td>

                                    <td> @if($allProperties->city==0)
                                            {{'غزة'}}
                                        @elseif($allProperties->city==1)
                                            {{'رفح'}}
                                        @elseif($allProperties->city==2)
                                            {{'خانيونس'}}
                                        @elseif($allProperties->city==3)
                                            {{'وسطى'}}
                                        @endif</td>
                                    <td>{{$allProperties->user->firstName .' '.$allProperties->user->lastName }}</td>

                                    <td>
                                        <a href="{{ route('Properties.edit',$allProperties->id)}}"
                                           class="btn btn-info btn-sm"><i class="material-icons">edit </i></a>
                                        <a href="{{ route('Properties.show',$allProperties->id)}}"
                                           class="btn btn-primary btn-sm"><i class="material-icons">details </i></a>

                                        <form id="delete-form-{{ $allProperties->id }}" action="{{ route('Properties.destroy',$allProperties->id) }}"
                                              style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('هل انت متأكد؟تريد حذف هذا؟')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $allProperties->id }}').submit();
                                            }else {
                                            event.preventDefault();
                                            }"><i class="material-icons">delete</i></button>

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
