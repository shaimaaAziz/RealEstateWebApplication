
@extends('admin.layout.layout')

@section('title')
التحكم في الأعضاء 

@endsection

@section('header')

 
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header card-header-primary" >
                        <h4 class="card-title">{{ $contact->subject }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <strong>الاسم : {{ $contact->name }}</strong><br>
                                <b>الايميل : {{ $contact->email }}</b> <br>
                                <strong>الرسالة : </strong><hr>

                                <p>{{ $contact->message }}</p><hr>

                            </div>
                        </div>
                        <a href="{{ route('contact.index') }}" class="btn btn-danger">رجوع</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection