<div class="container">
    <h3>Theisova metoda typové křivky</h3>


    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Výpočet</a></li>
        <li><a data-toggle="tab" href="#menu1">Parametry</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">            

            <form action="<?php $this->link(['action' => 'saveParametrs']); ?>" method="POST">   
                <div class="row">
                    <div class="col-sm-3">
                        <label class="small" for='TRANSMISSIVITY'>TRANSMISSIVITA [m2/s] (Editable)</label>
                        <input class="form-control input-sm" type="text" id="TRANSMISSIVITY" name="TRANSMISSIVITY" value="<?php $this->print_(['sourceData', 'TRANSMISSIVITY']) ?>" >
                    </div>
                    <div class="col-sm-3">
                        <br>
                        <div class="btn btn-default btn" id="button" onclick="calculTheis();">VYHODNOTIT</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3"> 
                        <label class="small" for='STORATIVITY'>STORATIVITA [] (Editable)</label>
                        <input class="form-control input-sm" id="STORATIVITY" type="text" name="STORATIVITY" value="<?php $this->print_(['sourceData', 'STORATIVITY']) ?>" >
                    </div>
                    <div class="col-sm-3">
                        <br>
                        <input class="btn btn-primary btn" type="submit" value="ULOŽ PARAMETRY">
                    </div>  
                </div>
            </form>

        </div>

        <div id="menu1" class="tab-pane fade">            

            <div class="row">
                <div class="col-sm-3">
                    <label class="small">t [s]: </label>
                    <input class="form-control input-sm" id='t_point' type='text'>
                </div>
                <div class="col-sm-3"> 
                    <label class="small" for='RECHARGE'>ČERPANÉ MNOŽSTVÍ [m3/s]</label>
                    <input class="form-control input-sm" type="text" id="RECHARGE" name="RECHARGE" value="<?php $this->print_(['sourceData', 'RECHARGE']) ?>" >
                </div>
                <div class="col-sm-3"> 
                    <label class="small">W(u): </label>
                    <input class="form-control input-sm" id='w_point' type='text' readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <label class="small">s [L]: </label>
                    <input class="form-control input-sm" id='s_point' type='text'>   
                </div>
                <div class="col-sm-3"> 
                    <label class="small" for='WELL_DISTANCE'>VZDÁLENOST POZOROVACÍHO VRTU [m]</label>
                    <input class="form-control input-sm" type="text" id="WELL_DISTANCE" name="WELL_DISTANCE" value="<?php $this->print_(['sourceData', 'WELL_DISTANCE']) ?>" > 

                </div> 
                <div class="col-sm-3"> 
                    <label class="small">1/u: </label>
                    <input class="form-control input-sm" id='u_point' type='text' readonly>
                </div>
            </div>            

        </div>

    </div>
</div>

<hr>

<div id='border_charts'>

    <div id="chart"></div>

    <div id="dragg_able">
        <div id="dragg_button" ></div>
        <div id="chart1" ></div>
    </div>
</div>