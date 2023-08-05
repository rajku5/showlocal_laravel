<html>
    <head>
    <link rel="stylesheet" type="text/css" href="{{asset('storage/admin/css/admin.css')}}">
    <title>Coupon Code</title>
    </head>
    </head>
    <body>
   <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
                   <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                <center><h3 class="mt-5">Thank you for Scanning</h3></center>
                <center><h3 class="mt-5">Use following Coupon code</h3></center>
                </div>
                <div>
                    <center><h3 class="card mt-5" style="padding:3rem;margin-left:5rem;margin-right:5rem">{{$seller->coupon_code}}</h3></center>
                </div>
            </div>
          <!-- Container-fluid Ends-->
<script type = "text/javascript">
    function downloadQR() {
        domtoimage.toPng(document.getElementById('qr_code'), {
                            quality: 0.95
                        })
                        .then(function (dataUrl) {
                            let link = document.createElement('a')
                            link.download = 'imageQR.png'
                            link.href = dataUrl
                            link.click()
                        })
    }
</script>
</body>
</html>