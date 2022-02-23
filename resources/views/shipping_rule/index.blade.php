@extends('layout.master')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Shipping Rule List</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('shipping-rule.create') }}"> Create New Request</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">
      All Request
   </h3>

    
  </div>
  <div class="box-body">
    
      <table class="table table-bordered table_tbody_bg">
     <tr>
       <th>No</th>
       <th style="min-width:200px;">Name</th>
       <th>Expire date</th>
       <th>Expire date</th>
       <th width="90px">Action</th>
     </tr>
     @foreach ($data as $key => $project)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $project->project_name }}</td>
        <td>{{ date('Y-m-d', strtotime($project->project_start_date)) }}</td>
        <td>{{ date('Y-m-d', strtotime($project->project_closure_date)) }}</td>
        
        <td>
           <a class="btn btn-info btn-sm" href="{{ route('projects.request.show',$project->id) }}">View</a>

            {!! Form::open(['method' => 'DELETE','route' => ['shipping-rule.destroy', $project->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
      </tr>
     @endforeach
    </table>

    
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    {!! $data->render() !!}


    <p class="text-center text-primary"><small></small></p>
  </div>
  <!-- /.box-footer-->
</div>


@endsection