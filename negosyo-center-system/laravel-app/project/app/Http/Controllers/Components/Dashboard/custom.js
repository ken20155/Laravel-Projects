//Chart
$(document).ready(function () {
    let statisticsChart2;
    let statisticsChart2Annoucement;

    msmeRegisteredLineChart();
    msmeRegisteredLineChartAnnoucement();
    function msmeRegisteredLineChart() {
        var ctx = document.getElementById('statisticsChart2').getContext('2d');
        if (statisticsChart2) {
            statisticsChart2.destroy();
        }


        var data = $('.data-filter').serialize();
        var url = getRunURL('msmeRegisteredLineChart');
        var request = main.form_ajax(url, data, 'POST', function(xhr) {
           main.block_ui();
        });
        request.done(function(response) {
            statisticsChart2 = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Total MSME Registered",
                        borderColor: '#177dff',
                        pointBackgroundColor: 'rgba(23, 125, 255, 0.6)',
                        pointRadius: 0,
                        backgroundColor: 'rgba(23, 125, 255, 0.4)',
                        legendColor: '#177dff',
                        fill: true,
                        borderWidth: 2,
                        data: response.data
                    }]
                },
                options : {
                    responsive: true, 
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        bodySpacing: 4,
                        mode:"nearest",
                        intersect: 0,
                        position:"nearest",
                        xPadding:10,
                        yPadding:10,
                        caretPadding:10
                    },
                    layout:{
                        padding:{left:5,right:5,top:15,bottom:15}
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontStyle: "500",
                                beginAtZero: false,
                                maxTicksLimit: 5,
                                padding: 10
                            },
                            gridLines: {
                                drawTicks: false,
                                display: false
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                zeroLineColor: "transparent"
                            },
                            ticks: {
                                padding: 10,
                                fontStyle: "500"
                            }
                        }]
                    }, 
                    legendCallback: function(chart) { 
                        var text = []; 
                        text.push('<ul class="' + chart.id + '-legend html-legend">'); 
                        for (var i = 0; i < chart.data.datasets.length; i++) { 
                            text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>'); 
                            if (chart.data.datasets[i].label) { 
                                text.push(chart.data.datasets[i].label); 
                            } 
                            text.push('</li>'); 
                        } 
                        text.push('</ul>'); 
                        return text.join(''); 
                    }  
                }
            });
            main.unblock_ui();
        });

    }
    function msmeRegisteredLineChartAnnoucement(){
        var ctx = document.getElementById('statisticsChart2Annoucement').getContext('2d');
        if (statisticsChart2Annoucement) {
            statisticsChart2Annoucement.destroy();
        }


        var data = $('.data-filter').serialize();
        var url = getRunURL('msmeRegisteredLineChartAnnoucement');
        var request = main.form_ajax(url, data, 'POST', function(xhr) {
           main.block_ui();
        });
        request.done(function(response) {
            statisticsChart2Annoucement = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Total Annoucement",
                        borderColor: '#177dff',
                        pointBackgroundColor: 'rgba(23, 125, 255, 0.6)',
                        pointRadius: 0,
                        backgroundColor: 'rgba(23, 125, 255, 0.4)',
                        legendColor: '#177dff',
                        fill: true,
                        borderWidth: 2,
                        data: response.data
                    }]
                },
                options : {
                    responsive: true, 
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        bodySpacing: 4,
                        mode:"nearest",
                        intersect: 0,
                        position:"nearest",
                        xPadding:10,
                        yPadding:10,
                        caretPadding:10
                    },
                    layout:{
                        padding:{left:5,right:5,top:15,bottom:15}
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontStyle: "500",
                                beginAtZero: false,
                                maxTicksLimit: 5,
                                padding: 10
                            },
                            gridLines: {
                                drawTicks: false,
                                display: false
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                zeroLineColor: "transparent"
                            },
                            ticks: {
                                padding: 10,
                                fontStyle: "500"
                            }
                        }]
                    }, 
                    legendCallback: function(chart) { 
                        var text = []; 
                        text.push('<ul class="' + chart.id + '-legend html-legend">'); 
                        for (var i = 0; i < chart.data.datasets.length; i++) { 
                            text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>'); 
                            if (chart.data.datasets[i].label) { 
                                text.push(chart.data.datasets[i].label); 
                            } 
                            text.push('</li>'); 
                        } 
                        text.push('</ul>'); 
                        return text.join(''); 
                    }  
                }
            });
            $('#totalYearAnnouncement').val(response.year);
            main.unblock_ui();
        });
    }
    $(document).on('change', '#category_filter', function() {
        msmeRegisteredLineChart();
    });
    $(document).on('change', '#year_filter', function() {
        msmeRegisteredLineChart();
    });
    $(document).on('change', '#year_filter2', function() {
        msmeRegisteredLineChartAnnoucement();
    });
});

$(document).ready(function () {
    getAnnoucement();
    function getAnnoucement() {
        var data = $.param({
            month:$('#month').val(),
            year:$('#year').val(),
            //add new field
        });
        var url = getRunURL('getAnnoucement');
        var request = main.form_ajax(url, data, 'POST', function(xhr) {
           main.block_ui();
        });
        request.done(function(response) {
            $('#getAnnoucement').html(response.body);
            main.unblock_ui();
        });
    }
    $(document).on('click', '#month', function() {
        getAnnoucement();
    });
    $(document).on('click', '#year', function() {
        getAnnoucement();
    });
});
$(document).on('click', '#printNow1', function() {
     main.printPageDirect('.registredMsme');
});
$(document).on('click', '#printNow0', function() {
     main.printPageDirect('.annoucementPrint');
});
$(document).on('click', '#printNow2', function() {
     main.printPageDirect('.TotalClassificationMsme');
});
$(document).on('click', '#printNow3', function() {
     main.printPageDirect('.TotalMsmePerBrgy',100,100);
});
$(document).on('click', '#printNow4', function() {
     main.printPageDirect('.TotalBnrPerBrgy');
});



