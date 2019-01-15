@extends('site.layouts.app')
@section('content')
    <div class="main-header">
        <div class="content-bg-wrap bg-group"></div>
        <div class="container">
            <div class="row">
                <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
                    <div class="main-header-content">
                        <h1>Stats and Analytics</h1>
                        <p>Welcome to your stats and analytics dashboard! Here you’l see all your profile stats like:
                            visits,
                            new friends, average comments, likes, social media reach, annual graphs, and much more!</p>
                    </div>
                </div>
            </div>
        </div>

        <img class="img-bottom" src="{{ asset('olympus/img/account-bottom.png') }}" alt="friends">
    </div>


    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

                <div class="row">

                    <div class="col col-lg-12 col-sm-12 col-12">
                        <div class="ui-block responsive-flex">
                            <div class="ui-block-title">
                                <div class="h6 title">Choose Month</div>
                                <?php  $month = date('m', strtotime(now()));?>
                                <select class="selectpicker form-control without-border" id="choosemonth">
                                    <option value='1' <?php if($month == '1'): ?> selected="selected"<?php endif; ?>>
                                        Janaury
                                    </option>
                                    <option value='2' <?php if($month == '2'): ?> selected="selected"<?php endif; ?>>
                                        February
                                    </option>
                                    <option value='3' <?php if($month == '3'): ?> selected="selected"<?php endif; ?>>
                                        March
                                    </option>
                                    <option value='4' <?php if($month == '4'): ?> selected="selected"<?php endif; ?>>
                                        April
                                    </option>
                                    <option value='5' <?php if($month == '5'): ?> selected="selected"<?php endif; ?>>
                                        May
                                    </option>
                                    <option value='6' <?php if($month == '6'): ?> selected="selected"<?php endif; ?>>
                                        June
                                    </option>
                                    <option value='7' <?php if($month == '7'): ?> selected="selected"<?php endif; ?>>
                                        July
                                    </option>
                                    <option value='8' <?php if($month == '8'): ?> selected="selected"<?php endif; ?>>
                                        August
                                    </option>
                                    <option value='9' <?php if($month == '9'): ?> selected="selected"<?php endif; ?>>
                                        September
                                    </option>
                                    <option value='10' <?php if($month == '10'): ?> selected="selected"<?php endif; ?>>
                                        October
                                    </option>
                                    <option value='11' <?php if($month == '11'): ?> selected="selected"<?php endif; ?>>
                                        November
                                    </option>
                                    <option value='12' <?php if($month == '12'): ?> selected="selected"<?php endif; ?>>
                                        December
                                    </option>
                                </select>


                                <a href="#" class="more">
                                    <svg class="olymp-three-dots-icon">
                                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-xl-4 order-xl-4 col-lg-6 order-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="ui-block">
                            <div class="ui-block-content">
                                <ul class="statistics-list-count">
                                    <li>
                                        <div class="points">
								<span>
									Profile Lifetime
								</span>
                                        </div>
                                        <div class="count-stat">{{$account_lifetim}} Day
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col col-xl-4 order-xl-4 col-lg-6 order-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="ui-block">
                            <div class="ui-block-content">
                                <ul class="statistics-list-count">
                                    <li>
                                        <div class="points">
								<span>
									Average Sessions Number by day
								</span>
                                            <?php
                                            $count = 0;
                                            foreach ($sessionsnum as $num) {
                                                $count += $num->Row_count;
                                            }
                                            ?>
                                        </div>
                                        @if(count($sessionsnum)!=0)
                                            <div class="count-stat">{{$count/count($sessionsnum)}} Sessions</div>
                                        @else
                                            <div class="count-stat">0 Sessions</div>
                                        @endif

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col col-xl-4 order-xl-4 col-lg-6 order-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="ui-block">
                            <div class="ui-block-content">
                                <ul class="statistics-list-count">
                                    <li>
                                        <div class="points">
								<span>
									Avg Sessions Duration By Day
								</span>
                                        </div>
                                        <?php
                                        $countav = 0;
                                        foreach ($averages as $average) {
                                            $countav += $average['average'];
                                        }
                                        ?>
                                        @if(count($averages)!=0)
                                            <div class="count-stat">{{$countav/count($averages)}} Minutes</div>
                                        @else
                                            <div class="count-stat">0 Minutes</div>
                                        @endif

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col col-lg-12 col-sm-12 col-12">
                        <div class="ui-block responsive-flex">
                            <div class="ui-block-title">
                                <div class="h6 title">Monthly Session Duration per Day</div>
                            </div>
                            <div class="ui-block-content">
                                <div class="chart-js chart-js-one-bar">
                                    <canvas id="one-bar-chart-avg" width="1400" height="380"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col col-lg-12 col-sm-12 col-12">
                        <div class="ui-block responsive-flex">
                            <div class="ui-block-title">
                                <div class="h6 title">Monthly Sessions Number per day</div>
                            </div>

                            <div class="ui-block-content">
                                <div class="chart-js chart-js-one-bar">
                                    <canvas id="one-bar-chart-num" width="1400" height="380"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12  responsive-display-none">
                <div class="ui-block">
                    <!-- Your Profile  -->
                @include('usersite::list-menu')
                <!-- ... end Your Profile  -->
                </div>
            </div>
        </div>

    </div>
@endsection
<?php

$allnumbers = array_fill(0, 31, 0);
$allaverages = array_fill(0, 31, 0);

if (count($sessionsnum) == 0 || count($averages) == 0) {
    $maxnumbers = 10;
    $maxaverage = 10;

} else {
    $maxnumbers = max(array_column($sessionsnum, 'Row_count')) + 10;
    $maxaverage = max(array_column($averages, 'average')) + 10;
}


$allnumbersmax = array_fill(0, 31, $maxnumbers);
$allaveragesmax = array_fill(0, 31, $maxaverage);

foreach ($sessionsnum as $session) {
    $daynum = Date('d', strtotime($session->day));
    $daynumber = ltrim($daynum, '0');
    $allnumbers[$daynumber] = $session->Row_count;
    $allnumbersmax[$daynumber] = $maxnumbers - $session->Row_count;
}

foreach ($averages as $average) {
    $daynum = Date('d', strtotime($average['date']));
    $daynumber = ltrim($daynum, '0');
    $allaverages[$daynumber] = $average['average'];
    $allaveragesmax[$daynumber] = $maxaverage - $average['average'];
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

    $(document).ready(function () {
        $('#choosemonth').on('change', function () {
            $month = this.value;
            $.ajax(
                {
                    type: 'GET',
                    url: '/profile/statistics',
                    data: "month=" + $month,
                    success: function (data) {
                    }
                }
            );

        });
    });


    window.onload = function () {
        var oneBarChart = document.getElementById("one-bar-chart-avg");
        var oneBarChartnum = document.getElementById("one-bar-chart-num");
        if (oneBarChart !== null) {
            var ctx_ob = oneBarChart.getContext("2d");
            var data_ob = {
                labels: range(1, 31, 1),
                datasets: [
                    {
                        backgroundColor: "#38a9ff",
                        data:<?php echo json_encode($allaverages) ?>
                    },
                    {
                        backgroundColor: "#ebecf1",
                        data:<?php echo json_encode($allaveragesmax) ?>
                    }]
            };

            var oneBarEl = new Chart(ctx_ob, {
                type: 'bar',
                data: data_ob,
                options: {
                    deferred: {           // enabled by default
                        delay: 200        // delay of 500 ms after the canvas is considered inside the viewport
                    },
                    tooltips: {
                        enabled: false
                    },
                    legend: {
                        display: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                            barPercentage: 0.6,
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                fontColor: '#888da8'
                            }
                        }],
                        yAxes: [{
                            stacked: true,
                            gridLines: {
                                color: "#f0f4f9"
                            },
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#888da8'
                            }
                        }]
                    }
                }
            });
        }

        if (oneBarChartnum !== null) {
            var ctx_obnum = oneBarChartnum.getContext("2d");
            var data_ob = {
                labels: range(1, 31, 1),
                datasets: [
                    {
                        backgroundColor: "#38a9ff",
                        data:<?php echo json_encode($allnumbers) ?>
                    },
                    {
                        backgroundColor: "#ebecf1",
                        data:<?php echo json_encode($allnumbersmax) ?>
                    }]
            };

            var oneBarElnum = new Chart(ctx_obnum, {
                type: 'bar',
                data: data_ob,

                options: {
                    deferred: {           // enabled by default
                        delay: 200        // delay of 500 ms after the canvas is considered inside the viewport
                    },
                    tooltips: {
                        enabled: false
                    },
                    legend: {
                        display: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                            barPercentage: 0.6,
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                fontColor: '#888da8'
                            }
                        }],
                        yAxes: [{
                            stacked: true,
                            gridLines: {
                                color: "#f0f4f9"
                            },
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#888da8'
                            }
                        }]
                    }
                }
            });
        }
    };

</script>
