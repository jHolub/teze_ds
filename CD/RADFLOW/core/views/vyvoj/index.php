
<h3>REAL WELL</h3>


<table id='control_panel_theis'>
    <tr>
        <td>
            <label for='RADIUS_WELL'>RADIUS_WELL [m]</label>
        </td> 
        <td>
            <input type="text" id="RADIUS_WELL" name="RADIUS_WELL" value="0.1625" > 
        </td>
        <td>
            <label for='RECHARGE'>RECHARGE [m3/s]</label>
        </td> 
        <td>
            <input type="text" id="RECHARGE" name="RECHARGE" value="0.0023" > 
        </td> 
    </tr>
    <tr>
        <td>
            <label for='TRANSMISSIVITY'>TRANSMISSIVITY [m2/s] </label>
        </td> 
        <td>
            <input type="text" id="TRANSMISSIVITY" name="TRANSMISSIVITY" value="0.0012379" >
        </td> 
        <td>
            <label for='STORATIVITY'>STORATIVITY []</label>
        </td> 
        <td>            
            <input id="STORATIVITY" type="text" name="STORATIVITY" value="0.006149" > 
        </td>
    </tr>
    <tr>           
        <td>
            <b><div id="button" onclick="calculTheis();">SOLVE</div></b>
        </td>
    </tr>

</table>

<form action="<?php echo \GLOBALVAR\ROOT . "/?core=stehfest&handle=saveParametrs"; ?>" method="POST">   

    <table>
        <tr>
            <td>
                <label>SKIN EFFECT Wd:</label>
            </td>
            <td>
                <input id='SKIN' name='SKIN' type='text' value="8" >
            </td>
            <td>
                <label>WELL STORAGE Cd:</label>
            </td>
            <td>
                <input id='WELL_STORAGE' name='WELL_STORAGE' type='text' value="80">
            </td>

        </tr>       
    </table>   

</form> 

<table>
    <tr>
        <td>
            <label>DEFINE: SKIN EFFECT S:</label>   
        </td>
        <td>
            <input type="range" min="0" max="100" value="0" step="1" onchange="$('#SKIN').val(this.value);
                    redraw()" />   
        </td>
    </tr>
    <tr>
        <td>
            <label>DEFINE: WELL STORAGE C:</label>   
        </td>
        <td>
            <input type="range" min="100" max="10000" value="0" step="50" onchange="$('#WELL_STORAGE').val(this.value);
                    redraw()" />   
        </td> 
        <td>
            <button onclick="draw()">DRAW</button>
        </td>  
        <td>
            <label>Nash–Sutcliffe model efficiency coefficient:</label>
        </td> 
        <td>

        </td>        
    </tr>
</table>

<div>    
    td/cd
    <div id="chart1" style="width: 600px; height: 400px;"></div>
</div>
<div>    
    td/cd
    <div id="chart2" style="width: 600px; height: 400px;"></div>
</div>

<div id='border_charts'>
    TD vs SD
    <div id="chart"></div>

</div>

<script>

    var s_input = new Array(<?php echo $this->model->graphData['s']; ?>);

    var t_input = new Array(<?php echo $this->model->graphData['t']; ?>);

    function draw() {
        
        CCC = 0.0879;
        CD = document.getElementById('WELL_STORAGE').value; 
        TRANS = parseFloat(document.getElementById('TRANSMISSIVITY').value);     

        TD = createData(1, 10000000);
        model = new Array();
        modelRatio = new Array();
        modelRatio1 = new Array();
        for (j = 1; j < TD.length; j++) {
            model.push([TD[j], stehfest(TD[j])]);
            modelRatio.push([(TD[j]/CD), stehfest(TD[j])]);
        }

        data = new Array();
        dataRatio = new Array();
        for (j = 1; j < s_input.length; j++) {
            data.push([timeToDimensionless(t_input[j]), drawdownToDimensionless(s_input[j])]);
            dataRatio.push([
                ((2 * Math.PI * t_input[j] * TRANS) / CCC),
                drawdownToDimensionless(s_input[j])
            ]);
            
            modelRatio1.push([(timeToDimensionless(t_input[j])/CD), stehfest(timeToDimensionless(t_input[j]))]);
        }

        ploting(model, data, 'chart');
        
        ploting(modelRatio, dataRatio, 'chart1');
        
        ploting(modelRatio1, dataRatio, 'chart2');
    }

    body = document.getElementsByTagName("body")[0];
    body.addEventListener("load", draw(), false);

</script>
