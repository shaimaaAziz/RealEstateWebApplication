@extends('owner.layout')

@section('title')
    إضافة عقار
@endsection
@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">إضافة عقار</h3>
                    </div>
                    <div class="card-body">
                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('Property.index') }}"  enctype="multipart/form-data" style="float: right; margin-left: 10px">
                            @include('owner.property.form');
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection