$(function () {
    $("#reservationdate").datetimepicker({
        format: "L",
    });
    $("#reservationdate2").datetimepicker({
        format: "L",
    });

    var areaChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
                label: 'Đơn hàng',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: 'Doanh số',
                backgroundColor: 'rgba(210, 214, 222, 1)',
                borderColor: 'rgba(210, 214, 222, 1)',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [65, 59, 80, 81, 56, 55, 40]
            },
        ]
    }

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false,
        scales: {
            yAxes: [{
              ticks: {
                  beginAtZero: true
              }
            }]
          },
    }

    var xxx =  new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
    })

    $('#fillter').on('click', function(){
        var from = $('input[name="from"]').val();
        var to = $('input[name="to"]').val();
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-Token": $('input[name="_token"]').val(),
            },
            url: "/admin/dashboard",
            data: {from:from, to:to},
            dataType: "JSON",
            success: function (response) {
                xxx.data.datasets[0].data = response.order;
                xxx.data.datasets[1].data = response.total;
                xxx.data.labels = response.date;
                xxx.update();
            }
        });
    })

    $(document).ready(function(){
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-Token": $('input[name="_token"]').val(),
            },
            url: "/admin/dashboard/week",
            // data: {from:from, to:to},
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                xxx.data.datasets[0].data = response.order;
                xxx.data.datasets[1].data = response.total;
                xxx.data.labels = response.date;
                xxx.update();
            }
        });
    })

    
});
