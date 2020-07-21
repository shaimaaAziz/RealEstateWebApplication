@extends('admin.layout.layout')

@section('title')
التحكم في الأعضاء 

@endsection

@section('header')

 {{!! Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}}

@endsection

@section('content')


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>التحكم في الأعضاء</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/AdminDashboard')}}">الرئيسية</a></li>
              <li class="breadcrumb-item active"><a href="{{ url('/admin/Adminpanel/user')}}">التحكم في الأعضاء</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <!-- Main content -->
    <section class="content">
    
      @include('partials.alerts')

      <div class="row">
        <div class="col-12">
           <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th># </th>
                  <th>الاسم الاول</th>
                  <th>اسم الأب </th>
                  <th>اسم العائلة</th>
                  <th>البريد الالكتروني</th>
                  <th>الصلاحيات</th>
                  <th>رقم الجوال</th>
                  <th>العنوان</th>
                  <th>المدينة</th> 
                  <th>التحكم</th>
                </tr>
                </thead>
                <tbody>
              
                    @foreach($user as $alluser)  
                         <tr>
                            <td>{{$alluser->id}}</td>
                            <td>{{$alluser->firstName}}</td>
                            <td>{{$alluser->middleName}}</td>
                            <td>{{$alluser->lastName}}</td>
                            <td>{{$alluser->email}}</td>
                            <td>{{ implode(',' ,$alluser->roles()->pluck('name')->toArray()) }}</td>
                            <td>{{$alluser->mobile}}</td>
                            <td>{{$alluser->street}}</td>
                            <td>
                            @if($alluser->city==0)
                                            {{'غزة'}}
                                        @elseif($alluser->city==1)
                                            {{'رفح'}}
                                        @elseif($alluser->city==2)
                                            {{'خانيونس'}}
                                        @elseif($alluser->city==3)
                                            {{'دير البلح'}}
                                       
                                        @endif             
                            </td>
                            <td>
                                <a href="{{ url('/admin/Adminpanel/user/'.$alluser->id.'/edit')}}"
                                class="btn btn-info btn-sm"><i class="material-icons">edit </i></a>


                                <form id="delete-form-{{ $alluser->id }}" action="{{ route('user.destroy',$alluser->id) }}"
                                      style="display: none;" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $alluser->id }}').submit();
                                    }else {
                                    event.preventDefault();
                                    }"><i class="material-icons">delete</i></button>

                            </td>
                          </tr>
                    @endforeach
                </tbody>
                {{-- <tfoot> --}}
                {{-- <tr>
                <th># </th>
                  <th>اسم المستخدم</th>
                  <th>البريد الالكتروني</th>
                  <th>الصلاحيات</th>
                  <th>التحكم</th>
                </tr> --}}
                {{-- </tfoot> --}}
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


 <script>

    var lastIdx = null;

$('#data thead th').each( function () {
    if($(this).index()  < 4 ){
        var classname = $(this).index() == 6  ?  'date' : 'dateslash';
        var title = $(this).html();
        $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" البحث '+title+'" />' );
    }else if($(this).index() == 4){
        $(this).html( '<select><option value="0"> عضو </option><option value="1"> مدير الموقع </option></select>' );
    }

} );

var table = $('#data').DataTable({
    processing: true,
    serverSide: true,
    // ajax: '{{ url('/Adminpanel/users/data')}}',
    columns: [
        {data: 'id', name: 'id'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        // {data: 'created_at', name: 'created_at'},
        {data: 'admin', name: 'admin'},
        // {data: 'exame', name: 'exame'},
        {data: 'control', name: ''}
    ],
    "language": {
        "url": "{{ Request::root()  }}/admin/cus/Arabic.json"
    },
    "stateSave": false,
    "responsive": true,
    "order": [[0, 'desc']],
    "pagingType": "full_numbers",
    aLengthMenu: [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "All"]
    ],
    iDisplayLength: 25,
    fixedHeader: true,

    "oTableTools": {
        "aButtons": [


            {
                "sExtends": "csv",
                "sButtonText": "ملف اكسل",
                "sCharSet": "utf16le"
            },
            {
                "sExtends": "copy",
                "sButtonText": "نسخ المعلومات",
            },
            {
                "sExtends": "print",
                "sButtonText": "طباعة",
                "mColumns": "visible",


            }
        ],

        "sSwfPath": "{{ Request::root()  }}/admin/cus/copy_csv_xls_pdf.swf"
    },

    "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
    ,initComplete: function ()
    {
        var r = $('#data tfoot tr');
        r.find('th').each(function(){
            $(this).css('padding', 8);
        });
        $('#data thead').append(r);
        $('#search_0').css('text-align', 'center');
    }

});

table.columns().eq(0).each(function(colIdx) {
    $('input', table.column(colIdx).header()).on('keyup change', function() {
        table
                .column(colIdx)
                .search(this.value)
                .draw();
    });




});



table.columns().eq(0).each(function(colIdx) {
    $('select', table.column(colIdx).header()).on('change', function() {
        table
                .column(colIdx)
                .search(this.value)
                .draw();
    });

    $('select', table.column(colIdx).header()).on('click', function(e) {
        e.stopPropagation();
    });
});


$('#data tbody')
        .on( 'mouseover', 'td', function () {
            var colIdx = table.cell(this).index().column;

            if ( colIdx !== lastIdx ) {
                $( table.cells().nodes() ).removeClass( 'highlight' );
                $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
            }
        } )
        .on( 'mouseleave', function () {
            $( table.cells().nodes() ).removeClass( 'highlight' );
        } );


</script>  -->
@endsection
