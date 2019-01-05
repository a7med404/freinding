<script type="text/javascript">
$(document).ready(function(){
       $(function() {
    
          $('input[name="datefilter"]').daterangepicker({
              autoUpdateInput: false,
              startDate: '01/01/2018',
              locale: {
                  cancelLabel: 'Clear'
              }
          });
        
          $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
              $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
          });


        
          $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
              $(this).val('');
          });   
    
    }); 
});
</script>
<script>
    $(function () {
         // tab total user
        $(".js-range-slider").ionRangeSlider({
            type: "double",
            grid: true,
            min: 13,
            max: 63,
            from: 13,
            to: 63,
            skin: "flat",


        });



        var ctxGROWTHUSERS = document.getElementById("line-chart-GROWTH-USERS");
        var myChartGROWTHUSERS = new Chart(ctxGROWTHUSERS, {
            type: 'line',
            data: {
                title: '',
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
                datasets: [
                    {
                        data: [0, 100, 50, 90, 10, 20, 30],
                        label: "ACTIVE USER ",
                        borderColor: "#9966ff",
                        fill: false,
                        backgroundColor:"#9966ff"
                    },
                    {
                        data: [5,100,80,9],
                        label: "SLEEPING USER ",
                        borderColor: "#2b9eb3",
                        fill: false,
                        backgroundColor:"#2b9eb3"
                    },

                    {
                        data: [100,500,40,30,8],
                        label: "DELETED USERS ",
                        borderColor: "#d22f2f",
                        fill: false,
                        backgroundColor:"#d22f2f"
                    }
                ]


            },
            options: {
                animation: {
                    duration: 0, // general animation time
                },
                hover: {
                    animationDuration: 0, // duration of animations when hovering an item
                },
                responsiveAnimationDuration: 0, // animation duration after a resize
            }
        });

        var ctxUSERSSTATUs = document.getElementById("doughnut-chart-USERS-STATUs");
        var myChartctxUSERSSTATUs = new Chart(ctxUSERSSTATUs, {
            type: 'pie',
            data: {

                labels: ["ACTIVE USERS", "SLEEPING USERS", "DELETED USERS"],
                datasets: [{

                    label: "Population (millions)",
                    backgroundColor: ["#9966ff", "#2b9eb3",  "#d22f2f"],
                    data: [2,2,2]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });

        // end tab total user
        //new user

        var ctxGROWTHnewUSERS = document.getElementById("line-chart-NEW-USERS-GROWTH");
        var myChartctxGROWTHnewUSERS= new Chart(ctxGROWTHnewUSERS, {
            type: 'line',
            data: {
                title: '',
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
                datasets: [
                    {
                        data: [0, 100, 50, 90, 10, 20, 30],
                        label: "NEW USER ",
                        borderColor: "#00bc8c",
                        fill: false,
                        backgroundColor: "#00bc8c"
                    }
                ]


            },
            options: {
                animation: {
                    duration: 0, // general animation time
                },
                hover: {
                    animationDuration: 0, // duration of animations when hovering an item
                },
                responsiveAnimationDuration: 0, // animation duration after a resize
    //end bar chart
            }
        });

        var ctxREGISTRATIONPERIOD = document.getElementById("doughnut-chart-REGISTRATION-PERIOD");
        var myChartREGISTRATIONPERIOD = new Chart(ctxREGISTRATIONPERIOD, {
            type: 'doughnut',
            data: {
                labels: ["Morning : 6 AM - 12 PM", "Mid Day : 12 PM - 6 PM", "Night : 6 PM - 12 AM", "Midnight : 12 AM - 6 AM"],
                datasets: [
                    {
                        backgroundColor: ["#ff6384", "#ff9f40", "#ffcd56", "#4bc0c0"],
                        data: [2478, 5267, 734, 784]
                    }
                ]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }

        });

        var ctxdoughnutchartREGISTRATIONDAYS = document.getElementById("doughnut-chart-REGISTRATION-DAYS");
        var myChartctxdoughnutchartREGISTRATIONDAYS  = new Chart(ctxdoughnutchartREGISTRATIONDAYS , {
            type: 'doughnut',
            data: {
                labels: ["SUN", "MON", "TUES","WED","THURS","FRI","SAT"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#ff6384", "#4bc0c0", "#ffcd56","#a49262","#ffccff","#33ccff","#00bc8c"],
                    data: [2478, 5267, 734,200,400,800,100]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });

        var ctxREGISTRATIONMONTHS = document.getElementById("REGISTRATION_MONTHS");
        var myChartPOSTPERIODBYHOURS  = new Chart(ctxREGISTRATIONMONTHS , {
            type: 'doughnut',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#ff6384", "#4bc0c0", "#ffcd56","#a49262","#ffccff","#33ccff","#00bc8c","#fff5dd","#9966ff","#ff9f40","#ef6f6c","#00bc8c"],
                    data: [2478, 5267, 734,200,400,800,100,50,8000,100,1200,1500]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });

        var ctxREGISTRATIONTYPE = document.getElementById("REGISTRATION_TYPE");
        var ctxREGISTRATIONTYPE  = new Chart(ctxREGISTRATIONTYPE , {
            type: 'pie',
            data: {
                labels: ["EMAIL","MOBILE","SOCIAL NETWORK"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#ff6384", "#4bc0c0", "#ffcd56"],
                    data: [2478, 5267, 734]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });

        var ctxgender = document.getElementById("doughnut-chart-GENDER");
        var myChartctxgender = new Chart(ctxgender, {
            type: 'doughnut',
            data: {
                labels: ["male","female"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#ff6384", "#ff9f40"],
                    data: [2478, 5267]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });

        var ctxAGETYPE = document.getElementById("doughnut-chart-AGE-TYPE");
        var myChartAGETYPE = new Chart(ctxAGETYPE, {
            type: 'doughnut',
            data: {
                labels: ["18-24", "25-35", "36-50", "51-65", "65+"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#ff6384", "#ff9f40", "#ffcd56", "#4bc0c0", "#36a2eb"],
                    data: [2478, 5267, 734, 784, 433]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });

        var ctxRELATIONSHIP= document.getElementById("doughnut-chart-RELATIONSHIP");
        var myChartctxRELATIONSHIP= new Chart(ctxRELATIONSHIP, {
            type: 'doughnut',
            data: {
                labels: ["None", "Single", "Engaged", "Married", "In a Relationship"],
                datasets:
                    [
                        {
                            backgroundColor: ["#ff6384", "#ff9f40", "#ffcd56", "#4bc0c0","#fa4a3b"],
                            data: [14,14,14,14,14]
                        }
                    ]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });


        var ctxOPTIONALINFORMATIONSVSNONE = document.getElementById("doughnut-chart-OPTIONAL-INFORMATIONS-VS-NONE");
        var mychartctxOPTIONALINFORMATIONSVSNONE  = new Chart(ctxOPTIONALINFORMATIONSVSNONE , {
            type: 'pie',
            data: {
                labels: ["OPTIONAL INFORMATIONS","NONE"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#ff6384", "#4bc0c0"],
                    data: [2478, 5267]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });

        var ctxVERIFIEDVSNONE = document.getElementById("doughnut-chart-VERIFIED-VS-NONE");
        var mychartctxVERIFIEDVSNONE  = new Chart(ctxVERIFIEDVSNONE , {
            type: 'pie',
            data: {
                labels: ["VERIFIED","NONE"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#ff6384", "#4bc0c0"],
                    data: [2478, 5267]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });

        var ctxPERCENTAGESTAGE = document.getElementById("doughnut-chart-PERCENTAGE-STAGE");
        var mychartctxPERCENTAGESTAGE  = new Chart(ctxPERCENTAGESTAGE , {
            type: 'pie',
            data: {
                labels: ["PERSONAL","BUSINESS","VIP "],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#ff6384", "#4bc0c0", "#ffcd56"],
                    data: [2478, 5267, 734]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });

        var ctxACTIVEHOURS= document.getElementById("ACTIVE-HOURS");
        var myChartctxACTIVEHOURS= new Chart(ctxACTIVEHOURS, {
            type: 'doughnut',
            data: {
                labels: ["Morning : 6 AM - 12 PM", "Mid Day : 12 PM - 6 PM", "Night : 6 PM - 12 AM", "Midnight : 12 AM - 6 AM"],
                datasets: [
                    {
                        backgroundColor: ["#ff6384", "#ff9f40", "#ffcd56", "#4bc0c0"],
                        data: [2478, 5267, 734, 784]
                    }
                ]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });

        var ctxACTIVEDAYS = document.getElementById("ACTIVE-DAYS");
        var myChartctxACTIVEDAYS = new Chart(ctxACTIVEDAYS , {
            type: 'doughnut',
            data: {
                labels: ["SUN", "MON", "TUES","WED","THURS","FRI","SAT"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#ff6384", "#4bc0c0", "#ffcd56","#a49262","#ffccff","#33ccff","#00bc8c"],
                    data: [2478, 5267, 734,200,400,800,100]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });

        var ctxACTIVEMONTHS = document.getElementById("ACTIVE-MONTHS");
        var myChartctxACTIVEMONTHS  = new Chart(ctxACTIVEMONTHS , {
            type: 'doughnut',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#ff6384", "#4bc0c0", "#ffcd56","#a49262","#ffccff","#33ccff","#00bc8c","#fff5dd","#9966ff","#ff9f40","#ef6f6c","#00bc8c"],
                    data: [2478, 5267, 734,200,400,800,100,50,8000,100,1200,1500]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });


        var ctxDELETEREASONS = document.getElementById("DELETE-REASONS");
        var mychartctxDELETEREASONS = new Chart(ctxDELETEREASONS , {
            type: 'pie',
            data: {
                labels: ["REASON 1 ","REASON 2","REASON 3","REASON 4"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#721817", "#FA9F42","#2B4162","#0B6E4F"],
                    data: [2478, 5267, 734,125]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });


        //end doughnut chart

        //LINE
        //posts

        var ctxPOSTSGROWTH = document.getElementById("line-chart-POSTS-GROWTH");
        var myChartPOSTSGROWTH = new Chart(ctxPOSTSGROWTH, {
            type: 'line',
            data: {
                title: '',
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
                datasets: [
                    {
                        data: [0, 100, 50, 90, 10, 20, 30],
                        label: "NEW POSTS",
                        borderColor: "#00bc8c",
                        fill: false,
                        backgroundColor:"#00bc8c"
                    }
                ]


            },
            options: {
                animation: {
                    duration: 0, // general animation time
                },
                hover: {
                    animationDuration: 0, // duration of animations when hovering an item
                },
                responsiveAnimationDuration: 0, // animation duration after a resize
            }
        });

//POST_TYPE




        //POST_PERIOD
        var ctxPOSTSTYPE = document.getElementById("pie-chart-POSTS-TYPE");
        var myPIEPOSTSTYPE = new Chart(ctxPOSTSTYPE, {
            type: 'pie',
            data: {
                labels: [
                    'TEXT',
                    'PHOTO',
                    'VIDEO'
                ],
                datasets: [
                    {
                        backgroundColor: ["#ff6384", "#ff9f40", "#ffcd56", "#4bc0c0"],
                        data: [10,20,30]
                    }
                ]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });

        var ctxPOSTPERIODBYHOURS = document.getElementById("POST_PERIOD_BY_HOURS");
        var myChartPOSTPERIODBYHOURS  = new Chart(ctxPOSTPERIODBYHOURS , {
            type: 'doughnut',
            data: {
                labels: ["Morning : 6 AM - 12 PM", "Mid Day : 12 PM - 6 PM", "Night : 6 PM - 12 AM", "Midnight : 12 AM - 6 AM"],
                datasets: [
                    {
                        backgroundColor: ["#ff6384", "#ff9f40", "#ffcd56", "#4bc0c0"],
                        data: [2478, 5267, 734, 784]
                    }
                ]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });


        var ctx4 = document.getElementById("POST_PERIOD_BY_DAYS");
        var myChartPOSTPERIODBYHOURS  = new Chart(ctx4 , {
            type: 'doughnut',
            data: {
                labels: ["SUN", "MON", "TUES","WED","THURS","FRI","SAT"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#ff6384", "#4bc0c0", "#ffcd56","#a49262","#ffccff","#33ccff","#00bc8c"],
                    data: [2478, 5267, 734,200,400,800,100]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });


        var ctx5 = document.getElementById("POST_PERIOD_BY_MONTH");
        var myChartPOSTPERIODBYHOURS  = new Chart(ctx5 , {
            type: 'doughnut',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#ff6384", "#4bc0c0", "#ffcd56","#a49262","#ffccff","#33ccff","#00bc8c","#fff5dd","#9966ff","#ff9f40","#ef6f6c","#00bc8c"],
                    data: [2478, 5267, 734,200,400,800,100,50,8000,100,1200,1500]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipPercentage + '%';
                        }
                    }
                }
            }
        });


    });
</script>
    