@extends('layouts.seller',['menu' => 'dashboard'])
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
                <div class="row">
                <div class="col-xl-4 col-md-6 xl-50">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-warning card-body">
                                <div class="media static-top-widget">
                                    <div class="media-body"><span class="m-0"></span>
                                        <h4 class="mb-0">Seller</h4>
                                        <h3>{{$seller->first_name}} {{$seller->last_name}}</h3>
                                    </div>
                                    <div class="icons-widgets">
                                        <i data-feather="box"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 xl-50">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-secondary card-body">
                                <div class="media static-top-widget">
                                    <div class="media-body"><span class="m-0"></span>
                                        <h3 class="mb-0">{{$userTotalCount}}</h3>
                                        <h4>Users Visited</h4>
                                    </div>
                                    <div class="icons-widgets">
                                        <i data-feather="box"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($plan!=null)
                    <div class="col-xl-4 col-md-6 xl-50">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-primary card-body">
                                <div class="media static-top-widget">
                                    <div class="media-body"><span class="m-0"></span>
                                    <h5>Active Subscription</h5>
                                        <h3 class="mb-0">{{$plan->name}}</h3>
                                        <h4>Expires {{date('d-M-y', strtotime($subscription->period_end))}}</h4>
                                    </div>
                                    <div class="icons-widgets">
                                        <i data-feather="box"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
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
            <div class="map_canvas">
                        
                        <canvas id="myChart" width="auto" height="100"></canvas>
            </div>
          <!-- Container-fluid Ends-->
            <script src="https://cdnjs.com/libraries/Chart.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
            <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
            labels: <?php echo $newDate; ?>,
            datasets: [{
            label: '',
            data: <?php echo $userCount; ?>,
            backgroundColor: 
                'rgba(31, 58, 147, 1)',
                
            
            borderColor: 
                'rgba(31, 58, 147, 1)',
            
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                max: 8,
                min: 0,
                ticks: {
                    stepSize: 1
                }
            }
        },
        plugins: {
            title: {
                display: false,
                text: 'Custom Chart Title'
            },
            legend: {
                display: false,
            }
        }
    }
});
</script>
@endsection