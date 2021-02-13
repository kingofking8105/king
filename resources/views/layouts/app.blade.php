<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!--<link href="{{ asset('app.css') }}" rel="stylesheet">-->
    <link href="{{ asset('css/_all-skins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/morris.js/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}"  rel="stylesheet">
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Ionicons -->
    <link href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <!-- DataTables -->
    <!-- Theme style -->
    <link href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    
   
</head>

<body class="hold-transition skin-blue sidebar-mini wysihtml5-supported" style="height: auto; min-height: 100%;">
<section>
    <div class="wrapper" style="height: auto; min-height: 100%;">
        <div>
            @include('partials.leftPanel')
        </div>
        <div>
            @include('partials.headerBar')
        </div>
        <div>
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
        <div>
            @include('partials.footer')
        </div>
    </div>
</section>


<!-- Scripts -->

    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    
    <script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>

    <script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>


    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <script src="{{ asset('bower_components/chart.js/Chart.js')}}"></script>
    <!--<script src="{{ asset('js/app.js') }}"></script>-->
    <script src="{{ asset('dist/js/pages/dashboard2.js')}}"></script>
    <!-- <script src="{{ asset('js/dashboard.js') }}"></script> -->
    <script src="{{ asset('js/demo.js') }}"></script>  
   
    
  
    
  @yield('custom-js')
 
  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
<script type="text/javascript">
function getState(val) {
	$.ajax({
		type: "GET",
		url: "/getState/"+val,
		//data:'country_id='+val,
		beforeSend: function() {
			$("#state-list").addClass("loader");
		},
		success: function(data){
            var data =JSON.parse(data);
            var select = $('#state-list');
            select.empty();
            select.append("<option value=''>Select State</option>");
            for(i in data){
                    select.append(
                            $('<option></option>').val(data[i].id).html(data[i].state));
                }
                $("#state-list").removeClass("loader");
        },
        error: function() {
            alert('Error occured');
        }
	});
}
function getCity(val) {
	$.ajax({
		type: "GET",
		url: "/getCity/"+val,
		//data:'state_id='+val,
		beforeSend: function() {
			$("#city-list").addClass("loader");
		},
		success: function(data){
            var data =JSON.parse(data);
            var select = $('#city-list');
            select.empty();
            select.append("<option value=''>Select District</option>");
            for(i in data){
                    select.append(
                            $('<option></option>').val(data[i].id).html(data[i].district));
                }
                $("#city-list").removeClass("loader");
        },
        error: function() {
            alert('Error occured');
        }
    });
}

function getBlock(val) {
	$.ajax({
		type: "GET",
		url: "/getBlock/"+val,
		//data:'country_id='+val,
		beforeSend: function() {
			$("#block-list").addClass("loader");
		},
		success: function(data){
            var data =JSON.parse(data);
            var select = $('#block-list');
            select.empty();
            select.append("<option value=''>Select Block</option>");
            for(i in data){
                    select.append(
                            $('<option></option>').val(data[i].id).html(data[i].block));
                }
                $("#block-list").removeClass("loader");
        },
        error: function() {
            alert('Error occured');
        }
	});
}

</script>

</body>
</html>
