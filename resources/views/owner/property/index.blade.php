@extends('owner.layout')

@section('title')
    التحكم في العقارات

@endsection
@section('header') 
  {{--  for datatable --}}
  <script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
  <script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <link media="all" type="text/css" rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
{{-- 
  {{!! Html::script('admin/plugins/datatables/jquery.dataTables.js') !!}}
  {{!! Html::script('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') !!}}
  {{!! Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}} --}}
  @endsection
@section('content')
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if(count($property) > 0) 

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center"># </th>
                                <th class="text-center">نوع العقار </th>
                                <th class="text-center">حالة العقار</th>
                                {{-- <th>صورة العقار</th> --}}
                                <th class="text-center">المدينة</th>
                                <th class="text-center">التحكم</th>
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
                                    {{-- <td>
                                        <img src ="{{asset('storage/images/'.$allProperties->image)}}" height="100" width="100"/>
                                    </td> --}}
                                    <td> @if($allProperties->city==0)
                                            {{'غزة'}}
                                        @elseif($allProperties->city==1)
                                            {{'رفح'}}
                                        @elseif($allProperties->city==2)
                                            {{'خانيونس'}}
                                        @elseif($allProperties->city==3)
                                            {{'وسطى'}}
                                        @endif</td>

                                    <td>
                                        <a href="{{ route('Property.edit',$allProperties->id)}}"
                                           class="btn btn-info btn-sm"><i class="material-icons">تعديل </i></a>
                                        <a href="{{ route('Property.show',$allProperties->id)}}"
                                           class="btn btn-primary btn-sm"><i class="material-icons">عرض </i></a>

                                        <form id="delete-form-{{ $allProperties->id }}" action="{{ route('Property.destroy',$allProperties->id) }}"
                                              style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('هل انت متأكد؟تريد حذف هذا؟')){
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
                        @else
                        <div class= 'alert alert-danger'>
                            لا يوجد أي عقارات قد قمت  بإضافتها  
                        </div>
                    @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    <!-- /.content -->
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
