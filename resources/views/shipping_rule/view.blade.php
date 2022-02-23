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
       <label class="col-sm-3 control-label" for="minimumWeight">Weight: </label>
          <div class="col-sm-9">
             <div class="row">
                <div class="col-sm-3">
                   <input type="text" class="form-control" id="minimumWeight" v-model="form.minimumWeight" placeholder="0">
                   <span class="help-block">Min weight</span>
                </div>
                <div class="col-sm-3">
                     <input type="text" class="form-control" id="maximumWeight" v-model="form.maximumWeight" placeholder="100">
                     <span class="help-block">Max weight</span>
                </div>
                <div class="col-sm-3">
                   <p>Unit</p>
                </div>
                
             </div>

          </div>
       </div>

      <div class="form-group">
         <label class="col-sm-3 control-label" for="parcelRoute">Parcel Route</label>
         <div class="col-sm-4">
            <select class="form-control" name="parcelRoute" id="parcelRoute" v-model="form.parcelRoute">
               <option value="">--</option>
               <option value="ISD">ISD (Inside Dhaka)</option>
               <option value="OSD">OSD (Outside Dhaka)</option>
            </select>
         </div>
      </div>

      <div class="form-group">
         <label class="col-sm-3 control-label" for="deliveryTypes">Delivery types:</label>
         <div class="col-sm-4">
            <select class="form-control" name="deliveryTypes" id="deliveryTypes" v-model="form.deliveryTypes">
               <option value="">--</option>
               <option value="regular_service">Regular Service</option>
               <option value="express_service">Express Service</option>
            </select>
         </div>
      </div>

      <div class="form-group">
         <label class="col-sm-3 control-label" for="expireDate">Expiry Date:</label>
         <div class="col-sm-4">
            <input id="expireDate" type="text" class="form-control expire_date_datepicker" v-model="form.expireDate" @focusin.native="showDatepicker($event, 'expireDate')" autocomplete="nope">
         </div>
      </div>

      <div class="form-group">
         <label class="col-sm-3 control-label" for="shippingCost"><b>Shipping Cost</b></label>
         <div class="col-sm-4">
            <input type="text" class="form-control" id="shippingCost" v-model="form.shippingCost" placeholder="50">
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

      <button type="submit" class="btn btn-success btn-lg pull-right" v-on:click.prevent="requestFormSubmit($event)">Update <i v-if="showSpinner" class="fa fa-circle-o-notch fa-spin fa-fw"></i></button>

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
         form:{
            shippingRuleId : "",
            minimumWeight: "",
            maximumWeight: "",
            deliveryTypes: "",
            shippingCost: "",
            parcelRoute: "",
            expireDate: "",
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

      showDatepicker($event, model){
        var self = this;
         //console.log($event.currentTarget.id);
         $('#'+$event.currentTarget.id).datepicker({
           autoclose: true,
           format: 'yyyy-mm-dd',  
         })
         .on('changeDate', function(e) {  
             //console.log(e.format());
             //self.$emit('update-date', e.format());
             //self.mileStones[i].baselineStartDate = event.format();
             //console.log(self[model][property]);
             self.form[model] = e.format();

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
         formData.append('minimumWeight', self.form.minimumWeight);
         formData.append('maximumWeight', self.form.maximumWeight);
         formData.append('deliveryTypes', self.form.deliveryTypes);
         formData.append('shippingCost', self.form.shippingCost);
         formData.append('parcelRoute', self.form.parcelRoute);
         formData.append('expireDate', self.form.expireDate); 
         formData.append('shippingRuleId', self.form.shippingRuleId); 
         formData.append('_method', 'PUT');
            
         
         /*
         Make the request to the POST /single-file URL
         */
         // disable submit button
         e.preventDefault();
         $(e.currentTarget).attr('disabled', 'disabled');
         self.showSpinner = true;
          axios.post( "{{ route('shipping-rule.update', $shippingRule->id) }}",
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
                  window.location.href = "{{ route('shipping-rule.update', $shippingRule->id) }}";
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

      let shippingRule = JSON.parse('{!! $shippingRule !!}');

      self.form.expireDate = moment(shippingRule.expire_date).format('YYYY-MM-DD');
      self.form.parcelRoute = shippingRule.parcel_route;
      self.form.deliveryTypes = shippingRule.delivery_types;
      self.form.shippingCost = shippingRule.shipping_cost;
      self.form.minimumWeight = shippingRule.minimum_weight;
      self.form.maximumWeight = shippingRule.maximum_weight;
      self.form.shippingRuleId = shippingRule.id;

      console.log(self.form);

      


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