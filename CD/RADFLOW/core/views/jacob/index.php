

<div class="container">
    <h3>
        Jacobova semilogaritmická metoda přímky
    </h3>

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Výpočet</a></li>
        <li><a data-toggle="tab" href="#menu1">Parametry</a></li>
    </ul>

    <form action="<?php $this->link(['action' => 'saveParametrs']) ?>" method="POST">
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                
                <div class="row">
                    <div class="col-sm-3"> 
                        <label class="small" for='TRANSMISSIVITY'>TRANSMISSIVITA [m2/s] (EDITABLE)</label>
                        <input class="form-control input-sm" type="text" id="TRANSMISSIVITY" name="TRANSMISSIVITY" value="<?php $this->print_(['sourceData', 'TRANSMISSIVITY']) ?>" readonly>
                    </div>
                    <div class="col-sm-2"> 
                        <br>
                        <div class="btn btn-default" id="button" onclick='analysisTrans();'>
                            URČI TRANSMISIVITU
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <br>
                        <div class="btn btn-warning btn-sm" id="button" onclick='delAnalysisInput();'>ZNOVU</div>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <label class="small" for='STORATIVITY'>STORATIVITA [] (EDITABLE)</label>
                        <input class="form-control input-sm" id="STORATIVITY" type="text" name="STORATIVITY" value="<?php $this->print_(['sourceData', 'STORATIVITY']) ?>" readonly>
                    </div>
                    <div class="col-sm-2">
                        <br>
                        <div class="btn btn-default" id="button" onclick='analysisStor();'>
                            URČI STORATIVITU
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <br>
                        <input class="btn btn-primary" type="submit" value="ULOŽ PARAMETRY">
                    </div>
                </div>
                
            </div>

            <div id="menu1" class="tab-pane fade">
                <div class="row">
                    <div class="col-sm-3"> 
                        <label class="small">t0 [s]</label>
                        <input class="form-control input-sm" id='result_t0' type='text'>
                    </div>
                    <div class="col-sm-3"> 
                        <label class="small" for='RECHARGE'>ČERPANÉ MNOŽSTVÍ [m3/s]</label>
                        <input class="form-control input-sm" type="text" id="RECHARGE" name="RECHARGE" value="<?php $this->print_(['sourceData', 'RECHARGE']) ?>" >

                    </div>
                    <div class="col-sm-3"> 
                        <label class="small">t1 [s]: </label>
                        <input class="form-control input-sm" id='t1_point' type='text' readonly>
                    </div>
                    <div class="col-sm-3"> 
                        <label class="small">t2 [s]: </label>
                        <input class="form-control input-sm" id='t2_point' type='text' readonly > 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">  
                        <label class="small">SKLON i:</label>      
                        <input class="form-control input-sm" id='result_i' type='number' readonly>
                    </div>
                    <div class="col-sm-3">  
                        <label class="small"  for='WELL_DISTANCE'>VZDÁLENOST POZOROVACÍHO VRTU [m]</label>
                        <input class="form-control input-sm" type="text" id="WELL_DISTANCE" name="WELL_DISTANCE" value="<?php $this->print_(['sourceData', 'WELL_DISTANCE']) ?>" >            

                    </div>
                    <div class="col-sm-3">  
                        <label class="small">s1 [cm]: </label>
                        <input class="form-control input-sm" id='s1_point' type='text' readonly>
                    </div>
                    <div class="col-sm-3">  
                        <label class="small">s2 [cm]: </label>             
                        <input class="form-control input-sm" id='s2_point' type='text' readonly > 
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<hr>

<div class="row">

    <div class="col-sm-9"> 
        <div id="chart">
        </div>
    </div>
    <div class="col-sm-3"> 
        <div id="apl_data">
            <table>
                <thead>
                    <tr>
                        <th></th><th>ČAS [s]</th><th>SNÍŽENÍ [m]</th>
                    </tr>
                </thead>
                <tbody id="apl_data_tab_body">
                </tbody>
                <tbody id="apl_dataObserv_tab_body">
                </tbody>
            </table>    
        </div>
    </div>
</div>
