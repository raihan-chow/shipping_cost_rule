@extends('layout.master')


@section('style')
<link rel="stylesheet" href="{{asset('asset/all_css/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection

@push('style_inline')
<style>
   
   .impact_change_radio{}
   .impact_change_radio .radio{
      display: inline-block;
      margin-left: 10px;
   }
   
</style>


@endpush



@section('content')
<main id="app" class="main_content" v-bind:class="{'modal-open': showModal}">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Create</h4>
            {{-- <h4>@{{ message }}</h4> --}}
        </div>
        <div class="pull-right">

            <a class="btn btn-success" href="{{ url()->previous() }}">Back</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif





<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Shipping Rule Create</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <div class="form-horizontal">
    <div class="box-body">

       <div class="form-group">
       <label class="col-sm-3 control-label" for="changeCategory">Category of Change</label>
          <div class="col-sm-9">
             <div class="row">
                <div class="col-sm-3">
                   <div class="radio">
                     <label>
                        <input type="radio" value="scope" name="changeCategory" v-model="projectChange.changeCategory"> Scope
                     </label>
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="radio">
                     <label>
                        <input type="radio" value="cost" name="changeCategory" v-model="projectChange.changeCategory"> Cost
                     </label>
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="radio">
                     <label>
                        <input type="radio" value="scedule" name="changeCategory" v-model="projectChange.changeCategory"> Scedule
                     </label>
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="radio">
                     <label>
                        <input type="radio" value="requirment" name="changeCategory" v-model="projectChange.changeCategory"> Requirment
                     </label>
                   </div>
                </div>
             </div>

             <div class="row">
                <div class="col-sm-3">
                   <div class="radio">
                     <label>
                        <input type="radio" value="delivery" name="changeCategory" v-model="projectChange.changeCategory"> Delivery
                     </label>
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="radio">
                     <label>
                        <input type="radio" value="quality" name="changeCategory" v-model="projectChange.changeCategory"> Quality
                     </label>
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="radio">
                     <label>
                        <input type="radio" value="procurement" name="changeCategory" v-model="projectChange.changeCategory"> Procurement
                     </label>
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="radio">
                     <label>
                        <input type="radio" value="project_plan" name="changeCategory" v-model="projectChange.changeCategory"> Project Plan
                     </label>
                   </div>
                </div>
             </div>
             
          </div>
       </div>

      <div class="form-group">
         <label class="col-sm-3 control-label" for="changeDescription">Detail description of proposed change</label>
         <div class="col-sm-9">
            <textarea class="form-control" name="changeDescription" id="changeDescription" cols="30" rows="6" v-model="projectChange.changeDescription"></textarea>
         </div>
      </div>

      <div class="form-group">
         <label class="col-sm-3 control-label" for="changeJustification">Justification of proposed change</label>
         <div class="col-sm-9">
            <textarea class="form-control" name="" id="changeJustification" cols="30" rows="6" v-model="projectChange.changeJustification"></textarea>
         </div>
      </div>

      <div class="form-group">
         <label class="col-sm-3 control-label" for="riskCategory">Impact of change</label>
         <div class="col-sm-9">
            <div class="impact_change_radio">
               <span><b>Scope:</b></span>

               <div class="radio">
                  <label>
                  <input type="radio" value="increase" name="changeImpactScope" v-model="projectChange.changeImpact.scope">
                  Increase
                  </label>
               </div>
               <div class="radio">
                  <label>
                  <input type="radio" value="decrease" name="changeImpactScope" v-model="projectChange.changeImpact.scope">
                  Decrease
                  </label>
               </div>
               <div class="radio">
                  <label>
                  <input type="radio" value="modify" name="changeImpactScope"  v-model="projectChange.changeImpact.scope">
                  Modify
                  </label>
               </div>

            </div>
         </div>
      </div>

      <div class="form-group">
         <label class="col-sm-3 control-label" for="impactDescriptionScope">Description of Scope impact's</label>
         <div class="col-sm-9">
            <textarea class="form-control" name="" id="impactDescriptionScope" cols="30" rows="6" v-model="projectChange.impactDescriptionScope"></textarea>
         </div>
      </div>

      <div class="form-group">
         <label class="col-sm-3 control-label" for="riskCategory">Impact of change</label>
         <div class="col-sm-9">
            <div class="impact_change_radio">
               <span><b>Schedule:</b></span>

               <div class="radio">
                  <label>
                  <input type="radio" value="increase" name="changeImpactSchedule" v-model="projectChange.changeImpact.schedule">
                  Increase
                  </label>
               </div>
               <div class="radio">
                  <label>
                  <input type="radio" value="decrease" name="changeImpactSchedule" v-model="projectChange.changeImpact.schedule">
                  Decrease
                  </label>
               </div>
               <div class="radio">
                  <label>
                  <input type="radio" value="modify" name="changeImpactSchedule"  v-model="projectChange.changeImpact.schedule">
                  Modify
                  </label>
               </div>

            </div>
         </div>
      </div>

      <div class="form-group">
         <label class="col-sm-3 control-label" for="impactDescriptionSchedule">Description of Schedule impact's</label>
         <div class="col-sm-9">
            <textarea class="form-control" name="" id="impactDescriptionSchedule" cols="30" rows="6" v-model="projectChange.impactDescriptionSchedule"></textarea>
         </div>
      </div>

      <div class="form-group">
         <label class="col-sm-3 control-label" for="riskCategory">Impact of change</label>
         <div class="col-sm-9">
            <div class="impact_change_radio">
               <span><b>Cost:</b></span>

               <div class="radio">
                  <label>
                  <input type="radio" value="increase" name="changeImpactCost" v-model="projectChange.changeImpact.cost">
                  Increase
                  </label>
               </div>
               <div class="radio">
                  <label>
                  <input type="radio" value="decrease" name="changeImpactCost" v-model="projectChange.changeImpact.cost">
                  Decrease
                  </label>
               </div>
               <div class="radio">
                  <label>
                  <input type="radio" value="modify" name="changeImpactCost"  v-model="projectChange.changeImpact.cost">
                  Modify
                  </label>
               </div>

            </div>
         </div>
      </div>

      <div class="form-group">
         <label class="col-sm-3 control-label" for="impactDescriptionCost">Description of Cost impact's</label>
         <div class="col-sm-9">
            <textarea class="form-control" name="" id="impactDescriptionCost" cols="30" rows="6" v-model="projectChange.impactDescriptionCost"></textarea>
         </div>
      </div>


      <div class="form-group">
        <label class="col-sm-3 control-label" for="requestedBy">Requested By</label>
         <div class="col-sm-9">
            <input type="text" class="form-control" id="requestedBy" v-model="projectChange.requestedBy" disabled>
         </div>
      </div>

   



    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      
    </div>
    <!-- /.box-footer -->
  </div>

</div> <!-- /.box box-primary -->




<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Submission</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <div class="form-horizontal">
    <div class="box-body">

      <div class="alert alert-success alert-dismissible" v-show="showSuccess">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" @click="showSuccess = false">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
          <p>@{{showSuccessMessage}}</p>
      </div>

      <div class="alert alert-danger alert-dismissible" v-show="showErrors">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" @click="showErrors = false">×</button>
        <h4><i class="icon fa fa-ban"></i>ERROR! Form not submitted.</h4>
        <div class="errors" v-for="error in errors">
          <p>@{{error}}</p>
        </div>
      </div>

      <button type="submit" class="btn btn-success btn-lg pull-right" v-on:click.prevent="requestFormSubmit($event)">Save <i v-if="showSpinner" class="fa fa-circle-o-notch fa-spin fa-fw"></i></button>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      
    </div>
    <!-- /.box-footer -->
  </div>

</div> <!-- /.box box-primary -->




</main>


@endsection


@push('script_link')   
   <script src="{{asset('asset/all_css/tree-view/tree-view.js')}}"></script>

   <script src="{{asset('asset/all_css/plugins/Knob/jquery.knob.js')}}"></script>
   <script src="{{asset('asset/all_css/plugins/gauge/FlexGauge.js')}}"></script>

   <script src="{{asset('asset/all_css/plugins/amcharts/core.js')}}"></script>
   <script src="{{asset('asset/all_css/plugins/amcharts/charts.js')}}"></script>
   <script src="{{asset('asset/all_css/plugins/amcharts/animated.js')}}"></script>
   
   <script src="{{asset('asset/js/progressGraph.js')}}"></script>
@endpush



@push('script_inline')

<script type="text/javascript">
   $(function($) {
      $(".completion").knob({
         'format': function(value) {
            return value + '%';
         },
         'change': function(value) {
            $("#newCompletion").val(Math.round(value));
         },
         'angleOffset': 270,
         'angleArc': 180,
         'bgColor': "#e0e0d1"
      });

   });
</script>

<script>

const projectShow = Vue.createApp({
   data(){
      return {
         fileBaseUrl: "{{ Config::get('filesystems.file_base_url') }}",
         showModal: false,
         displayBlock : 'block',
         riskIssueSelect: '',
         enableIssueTracker: false,
         enableRiskRegister: false,
         projectChange:{
            changeCategory: "",
            changeDescription: "",
            changeJustification: "",
            changeImpact: {
               scope: "",
               schedule: "",
               cost: "",
               requirements: "",
            },
            impactDescriptionScope: "",
            impactDescriptionSchedule: "",
            impactDescriptionCost: "",
            budgetImpact: "",
            timelineImpact: "",
            requestedBy: "{{ Auth::user()->name }}",
         },
         submitType: '',
         adData: [],
         adDataSeleted: '',
         modalClickedBy: '',
         modalClickedById: 0,
         errors: [],
         showErrors: false,
         showSpinner: false,
         showSuccess: false,
         showSuccessMessage: '',
         mileStones: [
            
         ],
         pmMembers: [],
         projectCompletion: 0,
         projectUpdates: {
            projectCompletion: 0,
            projectCurrentStatus: "",
            previousCompletion: 0,
            projectCompletionChange: 0,
         },
      }
   },
   watch: {
      
   },
   methods: {
      showAdModal(){
        this.showModal = true;
         this.adData = [];
      },
      projectStartDateEvnt(date) {
       console.log('date');
       //console.log(date);
       //if( typeof date !== 'undefined'  )
         this.form.projectStartDate = date;
         //this.form.projectStartDate = 'wwwww';
      },
      projectClosureDate(date) {
         //this.form.projectClosureDate = date;
      },

      showDatepicker($event, model, property){
        var self = this;
         //console.log(model);
         $('#'+$event.currentTarget.id).datepicker({
           autoclose: true,
           format: 'yyyy-mm-dd',  
         })
         .on('changeDate', function(e) {  
             //console.log(e.format());
             //self.$emit('update-date', e.format());
             //self.mileStones[i].baselineStartDate = event.format();
             //console.log(self[model][property]);
             self[model][property] = e.format();

             //console.log(self.issueTracker.issueDate);
         });
         $('#'+$event.currentTarget.id).datepicker('show');

         
         

      },
      currentDateTime(dateParam) {
        const current = new Date();
        const date = current.getFullYear()+'-'+(current.getMonth()+1)+'-'+current.getDate();
        const time = current.getHours() + ":" + current.getMinutes() + ":" + current.getSeconds();
        const dateTime = date +' '+ time;

        if( dateParam == 'date' ){
          return date;
        }
        else if(dateParam == 'time'){
          return time;
        }
        else{
          return dateTime;
        }


      },
      keyIntergerCheck: function(e, i, model){
         let conpilationValue = e.currentTarget.value.replace(/[^0-9]+/g, "");
         //console.log(conpilationValue);
         this.mileStones[i][model] = conpilationValue;
      },
      requestFormSubmit(e){
         console.log("Form submit Button Pressed");
          let self = this;
          
          let formData = new FormData();
          formData.append( "_token", "{{ csrf_token() }}" );


            var allData = this.projectChange;
            formData.append('projectChanges', JSON.stringify(allData));

            
            
         
         /*
         Make the request to the POST /single-file URL
         */
         // disable submit button
         e.preventDefault();
         $(e.currentTarget).attr('disabled', 'disabled');
         self.showSpinner = true;
          axios.post( "{{ route('shipping-rule.store') }}",
              formData,
              {
              headers: {
                  'Content-Type': 'multipart/form-data'
              }
            }
          ).then(function(response){


            if( response.data.success == true ){
              console.log('SUCCESS!!');
              self.showErrors = false;
              self.showSuccess = true;
              self.showSpinner = false;
              self.showSuccessMessage = response.data.message;

              setTimeout(function(){
                  //window.location.reload();
                  window.location.href = "{{ route('shipping-rule.index') }}";
              }, 2000);
              //console.log(response.data);
            }
            else{
              //console.log(response.data.message)
              //this.errors.push(response.data.message);
              


            }

        })
        .catch(function(){
          console.log('FAILURE!!');
        });

          //console.log(formData);
       },
       isEmpty(val) {
          return (val === undefined || val == null || val.length <= 0);
       },

      


   }, // methods
   mounted(){
      let self = this;
      console.log('mounted');

      

      


   },// mounted end
   created (){
   //   this.issueTracker.issueDate = this.currentDateTime('date');

     /*jQuery('.datepicker').datepicker({
         autoclose: true
     });*/

      //this.adData = [];

   },
   computed: {
      
      
   }
});


const mountedapp = projectShow.mount("#app");


</script>





@endpush