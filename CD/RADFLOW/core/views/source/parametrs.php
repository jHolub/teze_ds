<section>
    <div class="container">
        <h4>Fyzikální charakteristiky</h4>
        <form action="<?php $this->link(['action' => 'saveParametrs', 'render' => 'edit']); ?>" method="post">

            <div class="row">
                <div class="col-sm-4">   
                    <label class="small" for='STORATIVITY'>STORATIVITA []:</label>
                    <input class="form-control input-sm" id= "STORATIVITY" type="text" name="STORATIVITY" value="<?php $this->print_(['sourceData', 'STORATIVITY']); ?>" > 
                </div>
                <div class="col-sm-4"> 
                    <label class="small"  for='TRANSMISSIVITY'>TRANSMISSIVITA [m2/s]:</label>
                    <input class="form-control input-sm" type="text" name="TRANSMISSIVITY" value="<?php $this->print_(['sourceData', 'TRANSMISSIVITY']); ?>" >
                </div>
                <div class="col-sm-4"> 
                    <label class="small"  for='RECHARGE'>ČERPANÉ MNOŽSTVÍ [m3/s]:</label>
                    <input class="form-control input-sm" type="text" name="RECHARGE" value="<?php $this->print_(['sourceData', 'RECHARGE']); ?>" > 
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4"> 
                    <label class="small"  for='WELL_DISTANCE'>VZDÁLENOST POZOROVACÍHO VRTU [m]:</label>  
                    <input class="form-control input-sm" type="text" name="WELL_DISTANCE" value="<?php $this->print_(['sourceData', 'WELL_DISTANCE']); ?>" > 
                </div>
                <div class="col-sm-4"> 
                    <label class="small"  for='RADIUS_WELL'>POLOMĚR VRTU [m]:</label>
                    <input class="form-control input-sm" type="text" name="RADIUS_WELL" value="<?php $this->print_(['sourceData', 'RADIUS_WELL']); ?>" >
                </div>
                <div class="col-sm-4">      
                    <div class="form-group">
                        <label class="small"  for='SKIN'>DODATEČNÉ ODPORY []:</label>
                        <input class="form-control input-sm" type="text" name="SKIN" value="<?php $this->print_(['sourceData', 'SKIN']); ?>" >
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-4"> 
                    <label class="small"  for='WELL_STORAGE'>VLASTNÍ OBJEM VRTU []:</label>
                    <input class="form-control input-sm" type="text" name="WELL_STORAGE" value="<?php $this->print_(['sourceData', 'WELL_STORAGE']); ?>" >
                </div>
                <div class="col-sm-4"> 
                    <br>
                    <input  class="btn btn-success" type="submit" value="ULOŽ" >
                </div>
            </div>
        </form>
    </div>
</section>
