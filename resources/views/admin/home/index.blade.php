@extends('admin.layout.layout')

@section('header') 
{{--  for datatable --}}
{{!! Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}}

<style>.icon {
    position: absolute;
    top: 5%;
    /* left: 30%; */
    right: 70%;
    /* width: 10px; */
    /* height: 10px; */
    display: block;
  
}
</style>
  @endsection
@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$properties->count()}}</h3>

            <p>عدد العقارات </p>
          </div>
          <div class="icon">
            <i class="ion ion-home " ></i>
          </div>
          <a href="{{ url('/admin/Adminpanel/Properties')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$reservation->count()}}</h3>

            <p>الحجوزات </p>
          </div>
          <div class="icon">
            <i class="ion ion-clipboard"></i>
          </div>
          <a href="{{ url('/admin/Adminpanel/reservations')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$user->count()}}</h3>

            <p > الأعضاء </p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="{{ url('/admin/Adminpanel/user')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$contacts->count()}}</h3>

            <p>رسائل التواصل </p>
          </div>
          <div class="icon">
            <i class="ion ion-chatboxes"></i>
          </div>
        
          <a href="{{ route('contact.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>














            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">الحجوزات</h4>
                        </div>
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
    
                                @foreach($reservation as $key=>$allReservations)
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
                                            <form id="delete-form-{{ $allReservations->property_id }}" action="{{ route('reservations.destroy',$allReservations->property_id) }}" 
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
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">كل المتواصلين </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>
                                        #
                                    </th>
                                    <th>
                                       الاسم
                                    </th>
                                    <th>
                                       الايميل
                                    </th>
                                    <th>
                                       نوع الرسالة 
                                    </th>
                                    <th>
                                        رقم الهاتف 
                                    </th>
                                    <th>
                                       الرسالة 
                                    </th>
                                    <th>
                                       العرض 
                                    </th>
                                    <th>
                                       وقت الارسال  
                                    </th>
                                    <th>
                                    التأكيد 
                                    </th>
                                    
                                    <th>
                                        الحدث
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $key=>$contact)
                                        <tr>
    
                                            <td>{{$key + 1}}</td>
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->messageType}}</td>
                                            <td>{{$contact->phone}}</td>
                                            <td>{{$contact->message}}</td>
                                            <th>
                                                @if($contact->view == true)
                                                    <span class="label label-info">رسالة قديمة </span>
                                                @else
                                                    <span class="label label-danger ">رسالة جديدة </span>
                                                @endif
    
                                            </th>
                                            <td>{{$contact->created_at}}</td>
                                            <td>
    
                                                @if($contact->view == false)
                                                    <form id="status-form-{{ $contact->id }}" action="{{ route('contact.view',$contact->id) }}" 
                                                    style="display: none;" method="POST">
                                                        @csrf
                                                    </form>
    
                                                    <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('هل تريد تحويلها الي الرسائل القديمة ؟')){
                                                            event.preventDefault();
                                                            document.getElementById('status-form-{{ $contact->id }}').submit();
                                                            }else {
                                                            event.preventDefault();
                                                            }"><i class="material-icons">done</i></button>
    
                                                @elseif($contact->view == true)
                                                <button type="button" class="btn btn-danger btn-sm" 
                                              ><i class="material-icons">close</i></button>         
                                                @endif
    
                                            
                                            </td>
                                            <td><a href="{{route('contact.show',$contact->id)}}"
                                                   class="btn btn-info btn-sm"><i class="material-icons">details</i></a>
    
                                                <form id="delete-form-{{ $contact->id }}" action="{{ route('contact.destroy',$contact->id) }}"
                                                      style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('هل أنت متأكد أنك تريد حذفها ؟')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $contact->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
    
    
                                            </td>
                                        </tr>
                                    @endforeach
    
                                    </tbody>
                                </table>
                            </div>
                        </div>







                    </div>
        </div>
    </div></div></div>
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