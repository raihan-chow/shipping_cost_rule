@extends('layout.master')
@section('title','Welcome')
@section('content')
{{-- <section class="content-header">
   <h1>
      Ecommerce Portal
   </h1>
</section> --}}
<!-- Main content -->
<section class="content">

   <div class="row">

      <div class="col-md-12">

         



      </div>

      <!-- ./col -->
   </div>

   <!-- /.row -->
   <div class="row">
      <div class="col-md-12">

         <div class="box box-default">
            <div class="box-header with-border">
               <h3 class="box-title">Hello, {{ Auth::user()->name }} !</h3>


            </div>
            <div class="box-body">
               <h3>Welcome to Ecommerce Portal</h3>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
               
            </div>
            <!-- /.box-footer-->
         </div>



      </div>
   </div>

   


</section>
<!-- /.content -->
@endsection



@push('script_inline')

<script type="text/javascript">




</script>

@endpush
