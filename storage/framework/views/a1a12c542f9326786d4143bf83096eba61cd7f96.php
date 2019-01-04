<script>
  $(function () {

    //start line chart
    var lineChartData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [
            {
                fill:true,
                tension:0,
                pointBackgroundColor:"#01bc8c",
                pointBorderColor:"#fff",
                borderJoinStyle: 'miter',
                pointBorderWidth:"1",
                label:"NEW",
                data : [130,63,103,51,93,55,80,140,100,92,108,110],
                backgroundColor:"#01bc8c"
            },
            {
                fill:true,
                tension:0,
                pointBackgroundColor:"rgba(239,111,108,0.5)",
                pointBorderColor:"#fff",
                borderJoinStyle: 'miter',
                pointBorderWidth:"1",
                pointStrokeColor: "#fff",
                label:"TOTAL",
                data : [30,48,35,24,35,27,50,40,60,35,46,30],
                backgroundColor:"rgba(239,111,108,0.5)"
            }
        ]

    };

    function draw() {

        var selector = '#line-chart';

        $(selector).attr('width', $(selector).parent().width());
        var myLine = new Chart($("#line-chart"), {
            type: 'line',
            data: lineChartData,
            options: {
                title: {
                    display: false,
                    text: 'Line Chart'
                }
            }
        });
    }

    $(window).resize(draw);
    draw();
    //endline chart

    //start bar chart
    var barChartData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [
            {
                fill:false,
                tension:0.4,
                pointBackgroundColor:"#418bca",
                pointBorderColor:"#fff",
                borderJoinStyle: 'miter',
                pointBorderWidth:"1",
                label:"Totaal",
                data : <?php echo json_encode($total_month); ?>,
                backgroundColor:"#418bca"

               

            }
        ]

    };

    function draw1() {

        /*var selector = '#bar-chart';

        $(selector).attr('width', $(selector).parent().width());
        var myBar = new Chart($("#bar-chart"), {
            type: 'line',
            data: barChartData
        });*/
      

    //end bar chart
    }

    $(window).resize(draw1);
    draw1();
    //start line chart

        

    //start radar chart
    var radarChartData = {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Partying", "Running"],
        datasets: [

            {
                backgroundColor: "rgba(248,154,20,0.5)",
                hoverBackgroundColor: "rgba(248,154,20,0.5)",
                pointBackgroundColor: "rgba(248,154,20,0.5)",
                pointHoverBackgroundColor: "#fff",
                data: [65, 59, 90, 81, 56, 55, 40],
                label: 'data1'
            },
            {
                backgroundColor: "rgba(1,188,140,0.5)",
                hoverBackgroundColor: "rgba(1,188,140,0.5)",
                pointBackgroundColor: "rgba(1,188,140,0.5)",
                pointHoverBackgroundColor: "#fff",
                data: [28, 48, 40, 19, 96, 27, 100],
                label: 'data2'
            }
        ]

    };

    function draw2() {

        var selector = '#radar-chart';

        $(selector).attr('width', $(selector).parent().width());
        var myRadar = new Chart($("#radar-chart"),
            {
                type: 'radar',
                data: radarChartData
            });
    }

    $(window).resize(draw2);
    draw2();

    //end  radar chart

    //start polar area chart


    var chartData = {
        datasets: [{
            data: [
                15,
                18,
                10,
                8,
                16,
                20

            ],
            backgroundColor: [
                "#01BC8C",
                "#F89A14",
                "#418BCA",
                "#EF6F6C",
                "#A9B6BC",
                "#67C5DF"
            ],
            label: 'My dataset' // for legend
        }],
        labels: [
            "data1",
            "data2",
            "data3",
            "data4",
            "data5",
            "data6"
        ]
    };


    function draw3() {

        var selector = '#polar-area-chart';

        $(selector).attr('width', $(selector).parent().width());
        var myPolarArea = new Chart($("#polar-area-chart"), {
            data: chartData,
            type: 'polarArea'
        });
    }

    $(window).resize(draw3);
    draw3();

    //end polar area chart

    //start pie chart
    var pieData = {
        labels: [
            "18-24 AGE",
            "25-35 AGE",
            "60+ AGE"
        ],
        datasets: [
            {
                data: <?php echo json_encode($data_age); ?>,
                backgroundColor: [
                    "#418BCA",
                    "#01BC8C",
                    "#F89A14"
                ],
                hoverBackgroundColor: [
                    "#418BCA",
                    "#01BC8C",
                    "#F89A14"
                ]
            }]
    };

    function draw4() {

        var selector = '#pie-chart';

        $(selector).attr('width', $(selector).parent().width());
        var myPie = new Chart($("#pie-chart"), {
            type: 'pie',
            data: pieData
        });
    }

    $(window).resize(draw4);
    draw4();

    //end pie chart

    //start doughnut chart
    var doughnutData = {

        labels: [
            "91-365 DAYS",
            "365+ DAYS",
            "0-90 DAYS"
        ],
        datasets: [
            {
                data: <?php echo json_encode($data_life); ?>,
                backgroundColor: [
                    "#F89A14",
                    "#01BC8C",
                    "#67c5df"
                ],
                hoverBackgroundColor: [
                    "#F89A14",
                    "#01BC8C",
                    "#67c5df"
                ]
            }]

    };

    function draw5() {

        var selector = '#doughnut-chart';

        $(selector).attr('width', $(selector).parent().width());
        var myDoughnut = new Chart($("#doughnut-chart"),
            {
                type: 'doughnut',
                data: doughnutData
            });
    }

    $(window).resize(draw5);
    draw5();


    //end doughnut chart

});  
</script>
    