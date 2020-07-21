@extends('admin.layout.layout')

@section('title')
المفضلة 

@endsection

@section('header')
{{!! Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}}


@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> المفضلة </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="{{ url('/admin/AdminDashboard')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active"><a href="{{ url('/admin/favorite')}}"> المفضلة </a></li>
                </ol>
             </div>

         </div>
    </div>
 </section>
<div class="container-fluid">

    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                   
                        {{-- <span class="badge bg-blue  font">{{ $properties->count() }}</span> --}}
                    
                </div>
                <div class="body">
                    <div class="table-responsive">
                        {{-- <table class="table table-bordered table-striped table-hover dataTable js-exportable"> --}}
                            <table id="table" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>مجموع المستخدمين </th>
                                <th>رقم العقار</th>
                                <th> وصف العقار </th>

                                <th><i class="material-icons">favorite</i></th>                               
                                <th>Action</th>
                            </tr>
                            </thead>
                           
                            <tbody>
                                @foreach($properties as $key=>$property)
                                    <tr>
                                       
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $property->favorite_to_users->count() }}</td>
                                        <td>{{ $property->id }}</td>
                                        <td>{{ $property->description  }}</td>
                                        <td>{{ $property->favorite_to_users->count() }}</td>
                                           <td class="text-center">


                                            <form id="delete-form-{{ $property->id }}"
                                                 action="{{ route('favorite.destroy', $property->id) }}"
                                                style="display: none;" method="POST">
                                              @csrf
                                              @method('DELETE')
                                          </form>

                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $property->id }}').submit();
                                                }else {
                                                event.preventDefault();
                                                }"><i class="material-icons">حذف</i></button>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
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

{{-- @push('js')
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

<script type="text/javascript">
    function removeProperty(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('remove-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }
</script>
@endpush --}}