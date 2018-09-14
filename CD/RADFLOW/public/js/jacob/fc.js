
$(document).ready(function() {

    jacob();

    $('#chart').bind('jqplotDataClick', function(ev, seriesIndex, pointIndex, data) {

        if (seriesIndex == 0) {
            if (document.getElementById('t1_point').value == '') {
                document.getElementById('t1_point').value = data[0];
                document.getElementById('s1_point').value = data[1];
                jacob();
            } else {
                document.getElementById('t2_point').value = data[0];
                document.getElementById('s2_point').value = data[1];
                jacob();
            }
        }
    }
    );
});

function delAnalysisInput() {

    document.getElementById('t1_point').value = '';
    document.getElementById('s1_point').value = '';
    document.getElementById('t2_point').value = '';
    document.getElementById('s2_point').value = '';

    document.getElementById('TRANSMISSIVITY').value = '';
    document.getElementById('STORATIVITY').value = '';

    jacob();
}

function analysisTrans() {

    Q = document.getElementById('RECHARGE').value;

    if (Q == '') {
        alert('Zadejte RECHARGE.');
        return;
    }

    s1 = document.getElementById('s1_point').value;
    s2 = document.getElementById('s2_point').value;
    t1 = document.getElementById('t1_point').value;
    t2 = document.getElementById('t2_point').value;

    if (s1 == '') {
        alert('Zadejte bod pro přímkovou část.');
        return;
    }
    if (s2 == '') {
        alert('Zadejte bod pro přímkovou část.');
        return;
    }
    if (t1 == '') {
        alert('Zadejte bod pro přímkovou část.');
        return;
    }
    if (t2 == '') {
        alert('Zadejte bod pro přímkovou část.');
        return;
    }

    i = (s2 - s1) / ((Math.log(t2) / Math.LN10) - (Math.log(t1) / Math.LN10));
    
    
    console.log(s2);
    console.log(s1);
    console.log(((Math.log(t2) / Math.LN10) - (Math.log(t1) / Math.LN10)));
    console.log(i);
    T = 0.183 * (parseFloat(Q) /  i );

    document.getElementById('result_i').value = i.toFixed(5);
    document.getElementById('TRANSMISSIVITY').value = T.toFixed(8);
}

function analysisStor() {

    T = document.getElementById('TRANSMISSIVITY').value;

    if (T == '') {
        alert('Nejprve je potřeba definovat transmisivitu.');
        return;
    }

    t0 = document.getElementById('result_t0').value;
    rp = document.getElementById('WELL_DISTANCE').value;

    if (t0 == '') {
        alert('Zadejte t0 parametr.');
        return;
    }
    if (rp == '') {
        alert('Zadejte WELL_DISTANCE parametr.');
        return;
    }

    S = 2.246 * ((T * t0) / (rp * rp));

    document.getElementById('STORATIVITY').value = S.toFixed(8);

}

function jacob() {

    table = "";
    tableObserv = "";
    data = [[]];
    data_observ = [[]];
    
    for (i = 0; i < t.length; i++) {
        
        data[i] = [t[i], s[i]];
        table = table + "<tr><td>" + i + "</td><td>" + t[i] + "</td><td>" + s[i] + "</td></tr>";
    }
    
    for (i = 0; i < t_observ.length; i++) {
        
        data_observ[i] = [t_observ[i], s_observ[i]];
        tableObserv = tableObserv + "<tr><td>" + i + "</td><td>" + t[i] + "</td><td>" + s[i] + "</td></tr>";
    }    
    
    points = [[]];
    points[0] = [document.getElementById('t1_point').value, document.getElementById('s1_point').value];
    points[1] = [document.getElementById('t2_point').value, document.getElementById('s2_point').value];

    document.getElementById('apl_data_tab_body').innerHTML = table;
    document.getElementById('apl_dataObserv_tab_body').innerHTML = tableObserv;

    ploting(data, data_observ, points);

}


function ploting(data, data_observ, points) {

    document.getElementById('chart').innerHTML = "";

    $.jqplot.config.enablePlugins = true;

    $.jqplot('chart', [data, data_observ, points], {
        grid: {
            drawGridLines: true,
            backgroundColor: "#FCFCFC",
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
            location: 'nw'
        },
        series: [
            {label: 'SNÍŽENÍ', isDragable: false, color:"#001ECE", lineWidth: 3, markerOptions: {size: 5, shadow: true}, shadow: true},
            {label: 'POZOROVACÍ VRT', isDragable: false, color: "green", lineWidth: 1, markerOptions: {size: 2, shadow: false}, shadow: false},
            {label: 'EDITACE', isDragable: true, color:"#AF0000", lineWidth: 4, markerOptions: {size: 7, shadow: false}, shadow: true}
        ],
        axes: {
            xaxis: {
                renderer: $.jqplot.LogAxisRenderer,
              //  ticks: [10,50,100,500,1000,5000,10000,50000,100000],
                label: "time[s]",
                tickOptions: {
                    fontSize: '11px',
                     formatString: '%.1e'
                }                
            },
            yaxis: {
                //renderer: $.jqplot.LogAxisRenderer,
                //ticks: [0.01,0.1,1,10, 100],
                min: 0,
                //max: 20,
                label: "s[m]",
                tickOptions: {
                    fontSize: '11px',
                    formatString: '%.1f'                           //http://perldoc.perl.org/functions/sprintf.html                      
                }
            }
        }
    });
}
