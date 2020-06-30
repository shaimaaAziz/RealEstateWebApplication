 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>الصفحة الشخصية للمستخدم </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

 <a href="{{ url('/admin/Adminpanel/users/'.$alluser->id.'/edit')}}"
       class="btn btn-info btn-sm"><i class="material-icons">تعديل </i></a>
</head>
 </html>