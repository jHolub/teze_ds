
function ploting(model, data, id) {

    document.getElementById(id).innerHTML = "";

    $.jqplot(id, [data, model], {
        title: '',
        grid: {
            drawGridLines: true,
            backgroundColor: "#F7FCFD",
            gridLineColor: '#E8E8E8',
            gridLineWidth: 1,
            borderWidth: 0.1,
            shadow: false
        },
        seriesDefaults: {
            markerOptions: {
                size: 7,
                shadow: false
            },
            shadow: false
        },
        highlighter: {
            sizeAdjust: 10,
            tooltipLocation: 'n',
            tooltipAxes: 'y',
            useAxesFormatters: false,
            showTooltip: true,
            tooltipFade: true
        },
        cursor: {
            show: true,
            tooltipLocation: 'se',
            zoom: false,
            dblClickReset: true,
            showVerticalLine: true,
            showHorizontalLine: true,
            fontSize: '13px'
        },
        legend: {
            show: true,
            location: 'en'
        },
        series: [
            {label: 'Cerpaci zkouska', isDragable: false, color: "blue", lineWidth: 2, markerOptions: {size: 3, shadow: false}, shadow: false},
            {label: 'Modelovana data', isDragable: false, color: "red", lineWidth: 1, markerOptions: {size: 2, shadow: false}, shadow: false}
        ],
        axes: {
            xaxis: {
                ticks: [0.01,0.1,1, 10, 100, 500, 1000, 5000, 10000, 50000, 100000, 500000, 1000000, 5000000, 10000000, 50000000, 100000000, 500000000, 1000000000],
                tickOptions: {
                    formatString: '%.1e'                           //http://perldoc.perl.org/functions/sprintf.html                      
                },
                renderer: $.jqplot.LogAxisRenderer
            },
            yaxis: {
                min: 0,
                max: 30,
                label: "sd",
                tickOptions: {
                    fontSize: '12px',
                    formatString: '%.1f'                           //http://perldoc.perl.org/functions/sprintf.html                      
                }
            }
        }
    });
}

