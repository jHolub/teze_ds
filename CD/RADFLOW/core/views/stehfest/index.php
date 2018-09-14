<div class="container">
    <h3>Skutečný vrt</h3>


    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Výpočet</a></li>
        <li><a data-toggle="tab" href="#menu1">Parametry</a></li>
    </ul>


    <div class="tab-content">


        <div id="home" class="tab-pane fade in active">
            
            <form action="<?php $this->link(['action' => 'saveParametrs']); ?>" method="POST">   
                <div class="row">
                    <div class="col-sm-3">
                        <label class="small">ZVOLIT DODATEČNÉ ODPORY:</label>   
                        <input type="range" min="0" max="100" value="0" step="1" onchange="$('#SKIN').val(this.value);
                                redraw()" />
                    </div>
                    <div class="col-sm-3">      
                        <div class="form-group">
                            <label class="small">DODATEČNÉ ODPORY []:</label>
                            <input class="form-control input-sm" id='SKIN' name='SKIN' type='text' value="<?php $this->print_(['sourceData', 'SKIN']) ?>" >
                        </div>
                    </div>
                    <div class="col-sm-2">   
                        <br>
                        <div class="btn btn-default" onclick="redraw()">VYKRESLIT</div>
                    </div>
                    <div class="col-sm-3"> 
                        <label class="small">Nash–Sutcliffe koeficient:</label>
                        <input class="form-control"s id="NS" type="text" disabled="disable">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3"> 
                        <label class="small">ZVOLIT VLASTNÍ OBJMEN VRTU:</label>   
                        <input type="range" min="100" max="10000" value="0" step="50" onchange="$('#WELL_STORAGE').val(this.value);
                                redraw()" />
                    </div>
                    <div class="col-sm-3"> 
                        <label class="small">VLASTNÍ OBJEM VRTU []:</label>
                        <input class="form-control input-sm" id='WELL_STORAGE' name='WELL_STORAGE' type='text' value="<?php $this->print_(['sourceData', 'WELL_STORAGE']) ?>">
                    </div>
                    <div class="col-sm-2"> 
                        <br>
                        <input class="btn btn-primary" type="submit" value="ULOŽ PARAMETRY">
                    </div>
                </div>
            </form>
            
        </div>

        <div id="menu1" class="tab-pane fade">

            <div class="row">
                <div class="col-sm-3">      
                    <div class="form-group">
                        <label class="small" for='RADIUS_WELL'>POLOMĚR VRTU [m]</label>
                        <input class="form-control input-sm" type="text" id="RADIUS_WELL" name="RADIUS_WELL" value="<?php $this->print_(['sourceData', 'RADIUS_WELL']) ?>" > 
                    </div>
                </div>
                <div class="col-sm-3">      
                    <div class="form-group">
                        <label class="small" for='RECHARGE'>ČERPANÉ MNOŽSTVÍ [m3/s]</label>
                        <input class="form-control input-sm" type="text" id="RECHARGE" name="RECHARGE" value="<?php $this->print_(['sourceData', 'RECHARGE']) ?>" > 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <label class="small" for='TRANSMISSIVITY'>TRANSMISSIVITA [m2/s] </label>
                    <input class="form-control input-sm" type="text" id="TRANSMISSIVITY" name="TRANSMISSIVITY" value="<?php $this->print_(['sourceData', 'TRANSMISSIVITY']) ?>" >
                </div>
                <div class="col-sm-3">
                    <label class="small" for='STORATIVITY'>STORATIVITA []</label>          
                    <input  class="form-control input-sm" id="STORATIVITY" type="text" name="STORATIVITY" value="<?php $this->print_(['sourceData', 'STORATIVITY']) ?>" >
                </div>
            </div>
        </div>
    </div>

    <hr>



    <div id='border_charts'>

        <div id="chart"></div>

    </div>


