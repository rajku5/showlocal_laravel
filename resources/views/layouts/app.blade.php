<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Showlocal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

 <!-- Template Stylesheet -->
    <link href="{{asset('css/toasting.css')}}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
    .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:80px;
            right:25px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
          font-size:30px;
            box-shadow: 2px 2px 3px #999;
          z-index:100;
        }
        .my-float{
            margin-top:16px;
        }
        </style>
</head>

	<body>
      <div class=" bg-white p-0">
        @include('common.header',["menu"=>@$menu])
        {{-- @include('common.nav') --}}
        @yield('content')
        @include('common.footer')
        @include('common.modal')
      </div>
        @include('common.script')
        @yield('script')
        <script type="text/javascript">
            //$(document).ready(function(){
              
              $('a').click(function() {
        event_type = event.type;
        var current_path = "{{Request::path()}}";
          console.log(current_path);
          var user_id="{{Auth::id()}}";
            console.log('The DOM is fully loaded.');
        ajaxFormSubmit(user_id,current_path,event_type);
    });
    
    var ele = document.querySelector('form');
    $(ele).submit(function(event){
      
      var event_type = event.type;
        var current_path = "{{Request::path()}}";
          console.log(current_path);
          var user_id="{{Auth::id()}}";
            console.log('The DOM is fully loaded.');
        ajaxFormSubmit(user_id,current_path,event_type);
    });
    var ajaxFormSubmit = function(user_id,current_path,event_type){
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/api/accessUserAgent',
                data:{
                    user_id:user_id,
                    current_path:current_path,
                    event_type:event_type
                    
                },
                success:function(response){
                    console.log(response);
                    }
                
            });
            }
          //});
            
        
</script>
  </body>
</html>

