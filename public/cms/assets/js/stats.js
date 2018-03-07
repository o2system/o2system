// Column chart
// ------------------------------
$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#column-chart");

    // Chart Options
    var chartOptions = {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each bar to be 2px wide and green
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'bottom'
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
        legend: {
            position: 'top',
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }]
        },
        title: {
            display: false,
            text: 'Traffic'
        }
    };

    // Chart Data
    var chartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
            label: "Visitors",
            data: [650, 590, 808, 810, 560, 450, 300, 200, 900, 1000, 870, 560],
            backgroundColor: "#16D39A",
            hoverBackgroundColor: "rgba(22,211,154,.9)",
            borderColor: "transparent"
        }, {
            label: "View",
            data: [280, 480, 400, 190, 860, 120, 230, 420, 240, 340, 150, 170],
            backgroundColor: "#F98E76",
            hoverBackgroundColor: "rgba(249,142,118,.9)",
            borderColor: "transparent"
        }, {
            label: "Comments",
            data: [180, 380, 300, 190, 460, 180, 380, 300, 190, 460, 120, 230],
            backgroundColor: "#C1B0E1",
            hoverBackgroundColor: "rgba(193,176,225,.9)",
            borderColor: "transparent"
        }]
    };

    var config = {
        type: 'bar',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var lineChart = new Chart(ctx, config);
});

$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#column-chart-collection");

    // Chart Options
    var chartOptions = {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each bar to be 2px wide and green
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'bottom'
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
        legend: {
            position: 'top',
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }]
        },
        title: {
            display: false,
            text: 'Laba Rugi 2017 Rp. 450.789.343'
        }
    };

    // Chart Data
    var chartData = {
        labels: ["Total Bulan Berjalan", "IPL", "Minimum Listrik", "Pemakaian Air", "Dana Cadangan"],
        datasets: [{
            label: "Account Receivable",
            data: [650000000, 590000000, 808000000, 810000000, 560000000],
            backgroundColor: "#16D39A",
            hoverBackgroundColor: "rgba(22,211,154,.9)",
            borderColor: "transparent"
        }, {
            label: "Collection",
            data: [280000000, 480000000, 400000000, 190000000, 860000000],
            backgroundColor: "#F98E76",
            hoverBackgroundColor: "rgba(249,142,118,.9)",
            borderColor: "transparent"
        }, {
            label: "Outstanding",
            data: [180000000, 380000000, 300000000, 190000000, 460000000],
            backgroundColor: "#C1B0E1",
            hoverBackgroundColor: "rgba(193,176,225,.9)",
            borderColor: "transparent"
        }]
    };

    var config = {
        type: 'bar',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var lineChart = new Chart(ctx, config);
});

$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#column-chart2");

    // Chart Options
    var chartOptions = {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each bar to be 2px wide and green
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'bottom'
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
        legend: {
            position: 'top',
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }]
        },
        title: {
            display: false,
            text: 'Laba Rugi 2017 Rp. 450.789.343'
        }
    };

    // Chart Data
    var chartData = {
        labels: ["AIR IPL", "Collection", "Outstanding"],
        datasets: [{
            label: "Hunian",
            data: [650000000, 590000000, 808000000],
            backgroundColor: "#16D39A",
            hoverBackgroundColor: "rgba(22,211,154,.9)",
            borderColor: "transparent"
        }]
    };

    var config = {
        type: 'bar',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var lineChart = new Chart(ctx, config);
});

$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#column-chart3");

    // Chart Options
    var chartOptions = {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each bar to be 2px wide and green
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'bottom'
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
        legend: {
            position: 'top',
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }]
        },
        title: {
            display: false,
            text: 'Laba Rugi 2017 Rp. 450.789.343'
        }
    };

    // Chart Data
    var chartData = {
        labels: ["AIR IPL", "Collection", "Outstanding"],
        datasets: [{
            label: "Kios",
            data: [650000000, 590000000, 808000000],
            backgroundColor: "#F98E76",
            hoverBackgroundColor: "rgba(249,142,118,.9)",
            borderColor: "transparent"
        }]
    };

    var config = {
        type: 'bar',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var lineChart = new Chart(ctx, config);
});

// Pie chart
// ------------------------------
$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#simple-pie-chart");

    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
    };

    // Chart Data
    var chartData = {
        labels: ["Lorem", "Ipsum", "Dolor", "Sit", "Amet"],
        datasets: [{
            label: "My First dataset",
            data: [850, 650, 340, 450, 350],
            backgroundColor: ['#00A5A8', '#626E82', '#FF7D4D','#FF4558', '#16D39A'],
        }]
    };

    var config = {
        type: 'pie',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var pieSimpleChart = new Chart(ctx, config);
});

$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#simple-pie-chart2");

    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
    };

    // Chart Data
    var chartData = {
        labels: ["Parkir Mobil", "Utilities Water", "Lingkungan", "Utilities Listrik", "Parkir Motor"],
        datasets: [{
            label: "Pendapatan",
            data: [850000000, 650000000, 340000000, 450000000, 350000000],
            backgroundColor: ['#00A5A8', '#626E82', '#FF7D4D','#FF4558', '#16D39A'],
        }]
    };

    var config = {
        type: 'pie',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var pieSimpleChart = new Chart(ctx, config);
});

// Doughnut chart
// ------------------------------
$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#simple-doughnut-chart");

    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
    };

    // Chart Data
    var chartData = {
        labels: ["Lorem", "Ipsum", "Dolor", "Sit", "Amet"],
        datasets: [{
            label: "My First dataset",
            data: [850, 650, 340, 450, 350],
            backgroundColor: ['#00A5A8', '#626E82', '#FF7D4D','#FF4558', '#16D39A'],
        }]
    };

    var config = {
        type: 'doughnut',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var doughnutSimpleChart = new Chart(ctx, config);

});

// Line chart
// ------------------------------
/*$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#line-chart");

    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'bottom',
        },
        hover: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Month'
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Value'
                }
            }]
        },
        title: {
            display: true,
            text: 'Title'
        }
    };

    // Chart Data
    var chartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "dataset - big points",
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderDash: [5, 5],
            pointRadius: 5,
            pointHoverRadius: 8,
            backgroundColor: "#FFF",
            borderColor: "#9C27B0",
            pointBorderColor: "#9C27B0",
            pointBackgroundColor: "#FFF",
        }, {
            label: "dataset - individual point sizes",
            data: [28, 48, 40, 19, 86, 27, 90],
            fill: false,
            borderDash: [5, 5],
            pointRadius: [2, 4, 6, 18, 0, 12, 20],
            pointRadius: 5,
            pointHoverRadius: 8,
            backgroundColor: "#FFF",
            borderColor: "#00A5A8",
            pointBorderColor: "#00A5A8",
            pointBackgroundColor: "#FFF",
        }, {
            label: "dataset - large pointHoverRadius",
            data: [45, 25, 16, 36, 67, 18, 76],
            fill: false,
            pointHoverRadius: 8,
            backgroundColor: "#FFF",
            borderColor: "#FF7D4D",
            pointBorderColor: "#FF7D4D",
            pointBackgroundColor: "#FFF",
            pointRadius: 5,
        }]
    };

    var config = {
        type: 'line',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var lineChart = new Chart(ctx, config);
});*/