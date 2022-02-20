<!-- jQuery 3 -->
<script src="{{asset('view_template/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('view_template/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('view_template/bower_components/fastclick/lib/fastclick.js')}}"></script>

<script src="{{asset('view_template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('view_template/dist/js/adminlte.min.js')}}"></script>


<script>
    function myTableSearchFunction() {
        // Declare variables 
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            var isShowable = false;
            for (j = 0; j < td.length; j++) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    isShowable = true;
                    break;
                }
            }
            if (isShowable) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>

<script>
    //Date picker
    $('#expire_at_id').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd"
    });
</script>

@yield('footer_script_extra')