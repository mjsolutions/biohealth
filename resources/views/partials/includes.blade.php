<link href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('/assets/fancybox/jquery.fancybox.css')}}" rel="stylesheet">
<link href="{{asset('/assets/fancybox/fancybox.message.css')}}" rel="stylesheet">
<link href="{{asset('/assets/css/estilo.css')}}" rel="stylesheet">

@if(Auth::user()->enterprise->id == 1)
<link href="{{asset('/assets/css/biohealth.css')}}" rel="stylesheet">
@endif

@if(Auth::user()->enterprise->id == 2)
<link href="{{asset('/assets/css/megasalud.css')}}" rel="stylesheet">
@endif

@if(Auth::user()->enterprise->id == 3)
<link href="{{asset('/assets/css/select-food-world.css')}}" rel="stylesheet">
@endif

<script src="{{asset('/assets/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/fancybox/jquery.fancybox.js')}}"></script>
<script src="{{asset('/assets/fancybox/fancybox.message.js')}}"></script>

<link href="{{asset('/assets/css/jquery.timepicker.css')}}" rel="stylesheet">
<script src="{{asset('/assets/jquery/jquery.timepicker.min.js')}}"></script>

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->