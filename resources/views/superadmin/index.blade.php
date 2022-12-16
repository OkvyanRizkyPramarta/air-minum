@extends('layouts.superadmin.beranda')

@section('content')
<!-- Breadcomb area Start-->
    <div class="breadcomb-area" style="padding-top:120px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="breadcomb-list">
              <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="height:100px;margin-top:50px;">
                  <h2 class="center-text" style="text-align: center;">Halaman {{ Auth::user()->name }}</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
		  </div>
	  </div>
    <!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-bar-chart"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Bar Charts</h2>
										<p>Welcome to Notika <span class="bread-ntd">Admin Template</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Bar Chart area End-->
    <div class="bar-chart-area">
        <div class="container">
            <h4>Population Chart</h4>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="bar-chart-wp">
                        <canvas height="150px" width="180px;" id="population1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bar Chart area End-->
    {{-- 
    <script>
        (function ($) {
            "use strict";
            /*----------------------------------------*/
            /*  1.  Bar Chart
            /*----------------------------------------*/

            var ctx = document.getElementById("population1");
            var population1 = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        @php
                        foreach($population_total as $d) {
                            echo "['".$d->district->name."'],";
                        }
                        @endphp
                    ],
                    datasets: [
                        {
                            label: 'Male Total',
                            data: [
                                @php
                                    foreach($population_total as $pt) {
                                        echo $pt->male_total.",";
                                    }
                                @endphp
                            ],
                            borderColor: '#36A2EB',
                            backgroundColor: '#9BD0F5',
                            // backgroundColor: [
                            //     'rgba(255, 99, 132, 0.2)',
                            //     'rgb(50,205,50, 0.2)',
                            //     'rgba(255, 206, 86, 0.2)',
                            //     'rgba(75, 192, 192, 0.2)'
                            // ],
                            // borderColor: [
                            //     'rgba(255,99,132,1)',
                            //     'rgba(54, 162, 235, 1)',
                            //     'rgba(255, 206, 86, 1)',
                            //     'rgba(75, 192, 192, 1)'
                            // ],
                            borderWidth: 1
                        },
                        {
                            label: 'Female Total',
                            data: [
                                @php
                                    foreach($population_total as $pt) {
                                        echo $pt->female_total.",";
                                    }
                                @endphp
                            ],
                            borderColor: '#FF6384',
                            backgroundColor: '#FFB1C1',   
                            borderWidth: 1
                        },
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                            }
                        }]
                    }
                }
            });
        })(jQuery); 
    </script>
    --}}
    
</body>

@endsection