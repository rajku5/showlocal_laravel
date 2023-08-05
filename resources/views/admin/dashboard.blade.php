@extends('layouts.admin',['menu' => 'dashboard'])

@section('content')
   <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Dashboard
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
                   <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4 col-md-6 xl-50">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-secondary card-body">
                                <div class="media static-top-widget">
                                    <div class="media-body"><span class="m-0">Category</span>
                                        <h3 class="mb-0">{{$categoryCount}}</h3>
                                    </div>
                                    <div class="icons-widgets">
                                        <i data-feather="box"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-primary card-body">
                                <div class="media static-top-widget">
                                    <div class="media-body"><span class="m-0">Seller</span>
                                        <h3 class="mb-0">{{$sellerCount}}</h3>
                                    </div>
                                    <div class="icons-widgets">
                                        <i data-feather="message-square"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-warning card-body">
                                <div class="media static-top-widget">
                                    <div class="media-body"><span class="m-0">User</span>
                                        <h3 class="mb-0">{{$userCount}}</h3>
                                    </div>
                                    <div class="icons-widgets">
                                        <i data-feather="navigation"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                </div>
            </div>
            <canvas id="sellerOnboard" style="width:100%;max-width:1200px"></canvas>
            <script src="https://cdnjs.com/libraries/Chart.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
            <script>
new Chart("sellerOnboard", {
  type: "line",
  data: {
    labels: <?php echo $newDate; ?>,
    datasets: [{
        label: 'Seller',
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: <?php echo $sellerOnboardCount; ?>
    }]
  },
  options: {
    legend: {display: false},
    scales: {
        y: {
                max: 8,
                min: 0,
                ticks: {
                    stepSize: 1
                }
            }
    }
  }
});
            </script>
          <!-- Container-fluid Ends-->
@endsection