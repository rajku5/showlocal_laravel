@extends('layouts.seller',['menu' => 'QR Code'])
@section('content')
   <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>QR code
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
                   <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row"  id="qr_code">
                {{QrCode::size(255)->generate("http://showlocal.in/coupon-code/{$id}")}}
                </div>
                {{-- <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-success card-body">
                                <div class="media static-top-widget">
                                    <div class="media-body"><span class="m-0">New Vendors</span>
                                        <h3 class="mb-0">$ <span class="counter">45631</span><small> This Month</small></h3>
                                    </div>
                                    <div class="icons-widgets">
                                        <i data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-button qr-button mt-5 col-md-8">
                    <button class="btn btn-primary qr-button"  onclick="downloadQR();" style="float: right;">Download</button>
                    <button class="btn btn-primary" onclick="window.print();" style="float: right;margin-right: 10rem;">Print</button>
                    </div>
            </div>
          <!-- Container-fluid Ends-->
@endsection
@push('script')
<script type = "text/javascript">
    $(document).ready(function(){
        var seller_id="{{session()->get('seller_id')}}";
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'generate-coupon-code',
                data:{
                    seller_id:seller_id
                    
                },
                success:function(response){
                    console.log(response);
                }
            });
        });
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
@endpush