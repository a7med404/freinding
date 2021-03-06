<script>
<?php $total_arr= json_decode(json_encode($new_month)); ?>;
	  var barChartData = [["Jan", <?php echo  $total_arr[0] ?>],["Feb", <?php echo  $total_arr[1] ?>],["Mar", <?php echo  $total_arr[2] ?>],["Apr", <?php echo  $total_arr[3] ?>],["May",<?php echo  $total_arr[4] ?>],["Jun", <?php echo  $total_arr[5] ?>],["Jul", <?php echo  $total_arr[6] ?>],
	  ["Aug", <?php echo  $total_arr[7] ?>],["Sep", <?php echo  $total_arr[8] ?>],["Oct", <?php echo  $total_arr[9] ?>],["Nov", <?php echo  $total_arr[10] ?>],["Dec", <?php echo  $total_arr[11] ?>]];
        $.plot("#bar-chart", [{
            data: barChartData,
            
            color: "#1881b5",
        
        }
            ], {
            series: {
                lines: {
                    show: !1
                },
                splines: {
                    show: !0,
                    tension: .4,
                    lineWidth: 2,
                    fill: 0
                },
                points: {
                    show: !0,
                    radius: 2
                }
            },
            grid: {
                borderColor: "#fafafa",
                borderWidth: 1,
                hoverable: !0
            },
            
             tooltip: true,
        tooltipOpts: {
            content: 'total: %y'
        },
            xaxis: {
                tickColor: "#fafafa",
                mode: "categories"
            },
            yaxis: {
                tickColor: "#fafafa"
            },
            shadowSize: 0
        });
    	$(function() {
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
			$.plot("#placeholdernolegend", data, {
				series: {
					pie: { 
						show: true
					}
				},
				legend: {
					show: false
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
			$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
	$.plot('#placeholderradiuslabel', data, {
				series: {
					pie: { 
						show: true,
						radius: 1,
						label: {
							show: true,
							radius: 3/4,
							formatter: labelFormatter,
							background: {
								opacity: 0.5
							}
						}
					}
				},
				legend: {
					show: false
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
	$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of label radius pie charts

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
	$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of Styled labeld pie charts

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of Styled labeld pie charts
	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
		$.plot('#placeholderrectangularpie', data, {
				series: {
					pie: { 
						show: true,
						radius: 500,
						label: {
							show: true,
							formatter: labelFormatter,
							threshold: 0.1
						}
					}
				},
				legend: {
					show: false
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 

	//end of Rectangular pie charts

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
		$.plot('#placeholdertiltedpie', data, {
				series: {
					pie: { 
						show: true,
						radius: 1,
						tilt: 0.5,
						label: {
							show: true,
							radius: 1,
							formatter: labelFormatter,
							background: {
								opacity: 0.8
							}
						},
						combine: {
							color: "#999",
							threshold: 0.1
						}
					}
				},
				legend: {
					show: false
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of Tilted pie charts

	$(function() {		
		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}
		$.plot('#placeholderdonuthole', data, {
				series: {
					pie: { 
						innerRadius: 0.5,
						show: true
					}
				}, colors: [ '#418BCA', '#F89A14', '#01BC8C', '#EF6F6C', '#67C5DF']
			});
		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	}); 
	//end of Donet Hole pie charts
	function labelFormatter(label, series) {
		return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
	}

	//

	function setCode(lines) {
		$("#code").text(lines.join("\n"));
	}

// d3pie chart code

    var pie = new d3pie("#pie1", {
        size: {
            canvasHeight: 350,
            canvasWidth: 350
        },
        data: {
            content: [
                { label: "MIDNIGHT", value:<?php echo $midnight_count;?>, color:"#418BCA" },
                { label: "MORINING", value: <?php echo $morning_count;?>, color:"#01BC8C" },
                { label: "AFTERNOON", value:<?php echo $afternoon_count;?>, color:"#F89A14" }
            ]
        }
    });
    var pie = new d3pie("#pie2", {
        size: {
            canvasHeight: 350,
            canvasWidth: 350
        },
        labels: {
            inner: {
                format: "none"
            }
        },
        data: {
            content: [
                { label: "JavaScript", value: 1, color:"#418BCA" },
                { label: "Ruby", value: 2, color:"#01BC8C" },
                { label: "Java", value: 3, color:"#F89A14" }
            ]
        },
        tooltips: {
            enabled: true,
            type: "placeholder",
            string: "{label}, {value}, {percentage}%"
        }
    });
    var pie = new d3pie("#pie3", {
        size: {
            pieOuterRadius: "100%",
            canvasHeight: 350
        },
        data: {
            sortOrder: "value-asc",
            smallSegmentGrouping: {
                enabled: true,
                value: 2,
                valueType: "percentage",
                label: "Other birds"
            },
            content: [
                { label: "SAT", value: <?php echo $saturday_count; ?>, color:"#418BCA" },
                { label: "SUN", value:<?php echo $Sunday_count; ?>, color:"#01BC8C"},
                { label: "MON", value:<?php echo $Monday_count; ?>, color:"#F89A14"},
                { label: "TUS", value:<?php echo $Tuesday_count; ?>, color:"#67C5DF"},
                { label: "WED", value:<?php echo $Wednesday_count; ?>,color:"#EF6F6C"},
                { label: "THU", value:<?php echo $Thursday_count; ?>,color:"#418BCA"},
                { label: "FRI", value:<?php echo $Friday_count; ?>,color:"#01BC8C"}
            ]
        },
        tooltips: {
            enabled: true,
            type: "placeholder",
            string: "{label}, {value}, {percentage}%"
        }
    });
    var pie = new d3pie("pie4", {
        size: {
            pieInnerRadius: "80%",
            canvasHeight: 350,
            canvasWidth: 350
        },
        header: {
            title: {
                text: "AGE TYPE"
            },
            location: "pie-center"
        },
        data: {
            sortOrder: "label-asc",
            content: [
                { label: "18- AGE", value:<?php echo $data_age[0]['count']?>, color:"#418BCA" },
                { label: "18-24 AGE", value: <?php echo $data_age[1]['count']?>, color:"#01BC8C" },
                { label: "25-35 AGE", value: <?php echo $data_age[2]['count']?>, color:"#F89A14" },
                { label: "36-60 AGE", value: <?php echo $data_age[3]['count']?>, color:"#67C5DF" },
                { label: "60+ AGE", value: <?php echo $data_age[4]['count']?>,color:"#EF6F6C"}
            ]
        },
        tooltips: {
            enabled: true,
            type: "placeholder",
            string: "{label}, {value}, {percentage}%"
        }
    });

	/*------c3 pie chart----*/

    var chart = c3.generate({
        bindto: '#chart',
        data: {
            // iris data from R
            columns: [
                ['data1', 30],
                ['data2', 120],
                ['data3', 85]
            ],
            type : 'pie'
        }
    });

	/*--morris donut chart--*/

	Morris.Donut({
		element: 'morris-chart',
        colors:['#418BCA', '#01BC8C', '#F89A14'],
		data: [
			{label: "Data1", value: 12},
			{label: "Data2", value: 30},
			{label: "Data3", value: 20}
		]
	});


</script>
    