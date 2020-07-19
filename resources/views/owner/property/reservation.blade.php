@extends('owner.layout')
@section('title')
الحجوزات
@endsection
@section('content')
@section('header') 
  {{--  for datatable --}}
  <script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
  <script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <link media="all" type="text/css" rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css">

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
                    @if(count($reservations) > 0) 
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center"># </th>
                                <th class="text-center">رقم العقار </th>
                                <th class="text-center">رقم المستخدم</th>
                                <th class="text-center">حالة العقار</th>
                                <th class="text-center">رقم الجوال</th>
                                <th class="text-center"> الإيميل</th>
                                <th class="text-center"> وقت الطلب</th>
                                {{-- <th class="text-center">التفعيل</th> --}}
                                <th class="text-center">التحكم</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($reservations as $key=>$allReservations)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$allReservations->property_id }}</td>
                                    <td>{{$allReservations->user_id }}</td>
                                    <td>{{$allReservations->state }}</td>
                                    <td>{{$allReservations->user->mobile }}</td>
                                    <td>{{$allReservations->user->email }}</td>
                                    <td>{{$allReservations->created_at}}</td>
                                    <td>

                                        @if($allReservations->reservation == false && $allReservations->state == "تأجير")
                                        <form id="status-form-{{ $allReservations->id }}" action="{{ route('reservations',$allReservations->id) }}" 
                                        style="display: none;" method="POST">
                                            @csrf
                                        </form>
                                        <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('هل تريد تأكيد الطلب والموافقة عليه ؟')){
                                                event.preventDefault();
                                                document.getElementById('status-form-{{ $allReservations->id }}').submit();
                                                }else {
                                                event.preventDefault();
                                                }"><i class="material-icons">done</i></button>
                                                
                                    @elseif($allReservations->reservation == false && $allReservations->state == "بيع")
                                    <form id="delete-form-{{ $allReservations->property_id }}" action="{{ route('reservationsOwner.destroy',$allReservations->property_id) }}" 
                                    style="display: none;" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('هل تريد تأكيد الطلب والموافقة عليه ؟')){
                                            event.preventDefault();
                                             document.getElementById('delete-form-{{ $allReservations->property_id }}').submit();
                                                }else {
                                                event.preventDefault();
                                                }"><i class="material-icons">done</i></button>

                                        @elseif($allReservations->reservation == true)
                                        <button type="button" class="btn btn-danger btn-sm" 
                                      ><i class="material-icons">close</i></button>         
                                        @endif

                                    
                                    </td>
                                </tr>
                            @endforeach
                           
                            </tbody>

                        </table>
                        @else
                            <div class= 'alert alert-danger'>
                                لا يوجد أي عقارات قد قمت  بحجزها  
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
