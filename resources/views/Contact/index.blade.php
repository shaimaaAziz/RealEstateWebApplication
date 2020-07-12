@extends('admin.layout.layout')

@section('title')
التحكم في الأعضاء 

@endsection

@section('header')

 {{!! Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}}

@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">كل المتواصلين </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table1" class="table table-striped table-bordered" style="width:100%">
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

        </div>
    </div>
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