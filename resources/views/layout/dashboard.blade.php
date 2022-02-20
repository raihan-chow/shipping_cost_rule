@extends('layout.master')
@section('title','Dashboard')

{{-- @push('body_class') sidebar-collapse @endpush --}}

@push('style_inline')

@endpush

@section('content')

<section class="content-header">
   <h1>
      Dashboard
   </h1>
</section>
<!-- Main content -->
<section class="content">


   <!-- /.row -->
   <div class="row">
      <div class="col-md-9">
         
         <div class="box">

            {{-- <div class="box-header with-border">
               <h3 class="box-title">Projects</h3>            
            </div> --}}

            <div class="box-body" style="">
             
               <div class="row">
                  <div class="col-sm-1" style="padding-right:0px;">
                     <h5 class="dashboard_project_header">Projects</h5>
                     <h5 class="dashboard_progress_header">Progress</h5>
                  </div>
                  <div class="col-sm-11">
                     <div class="row">
                        {{-- {{ dd($projectScheduleData) }} --}}
                        @if(!empty($projectScheduleData))
                           @foreach ($projectScheduleData as $projectSchedule)
                              @if( count($projectSchedule->projectScheduleUpdate) > 0 )
                              <div class="col-xs-3 text-center single_project_progress" style="border-right: 1px solid #f4f4f4">
                                 <div class="single_project_header text-left">
                                    <div class="single_project_name">
                                       <a href="{{ route('dashboard-project-summery-details', [$projectSchedule->id, $projectSchedule->projectScheduleUpdate[0]->id]) }}">{{ $projectSchedule->projectCharter->project_name }}</a>
                                    </div>
                                    <table class="table ">
                                       <tr><td>Start: {{ date('Y-m-d', strtotime($projectSchedule->project_start_date)) }}</td></tr>
                                       <tr><td>End: {{ date('Y-m-d', strtotime($projectSchedule->project_end_date)) }}</td></tr>
                                    </table>
                                 </div>
                                 <input type="text" class="knob" data-readonly="true" value="{{ !empty($projectSchedule->projectScheduleUpdate[0]->project_completion) ? $projectSchedule->projectScheduleUpdate[0]->project_completion : 0 }}" data-width="120" data-height="120" data-thickness=".4" data-skin="tron"
                                       data-fgColor="#F06625">

                                <div class="knob-label">
                                    @if($projectSchedule->projectScheduleUpdate[0]->project_current_status == 'onTrack')
                                       <label class="label label-success">On Track</label>
                                    @elseif($projectSchedule->projectScheduleUpdate[0]->project_current_status == 'offTrack')
                                       <label class="label label-danger">Off Track</label>
                                    @elseif($projectSchedule->projectScheduleUpdate[0]->project_current_status == 'onHold')
                                       <label class="label label-warning">On Hold</label>
                                    @elseif($projectSchedule->projectScheduleUpdate[0]->project_current_status == 'slightlyBehind')
                                       <label class="label label-primary">Slightly Behind</label>
                                    @endif
                                    
                                 </div>
                              </div>
                              @endif
                           @endforeach
                        @endif
                        <!-- ./col -->

                     </div>
                  </div>
               </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer" style="">
               <a href="{{ route('projects.riskandissue.issuetracker.list') }}">Issues</a>
            </div>
            <!-- /.box-footer-->
         </div>

      </div> <!-- /.col-8 end -->
      
      <div class="col-sm-3">

         <div class="box box-warning box-warning-custom-header" style="min-height: 386px;">

            <div class="box-header with-border text-center">
             <h3 class="box-title">Simplification & Automation</h3>            
            </div>

            <div class="box-body m_height_260" style="">
               {{-- {{ dd($simplicationAndRpaCount) }} --}}
               <h4 class="text-center">On Going Projects</h4>

               <div class="box_body_content">
                  <div class="body_content_automation">
                     <span>{{ $simplicationAndRpaCount['simplificationAutomation'] }}</span>
                     <p>Automation</p>
                  </div>
                  <div class="body_content_rpa">
                     <span>{{ $simplicationAndRpaCount['roboticProcessAutomation'] }}</span>
                     <p>RPA</p>
                  </div>
               </div>



            </div>
            <!-- /.box-body -->

            {{-- <div class="box-footer" style="">
               <a target="_blank" href="{{ route('projects.schedule.updated.show', [request()->route('projectScheduleId'), request()->route('projectScheduleUpdateId')] ) }}" class="pull-right">View Detaiils</a>
            </div> --}}
            <!-- /.box-footer-->
         </div>


         
      
      </div> <!-- /.col-3 end -->



   </div> <!-- /.row end-->


</section>
<!-- /.content -->
@endsection



@push('script_link')
   <script src="{{asset('asset/all_css/plugins/Knob/jquery.knob.js')}}"></script>
   <script src="{{asset('asset/all_css/plugins/gauge/FlexGauge.js')}}"></script>
@endpush


@push('script_inline')

<script type="text/javascript">
   $('.knob').knob();

   //$(document).ready(function(){
   //   $('body').addClass('sidebar-collapse');
   //});
</script>

@endpush