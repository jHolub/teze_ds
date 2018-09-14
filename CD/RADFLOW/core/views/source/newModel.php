<div class="row">
    <div class="col-sm-12">
        <h3>
            <span class="glyphicon glyphicon-save"></span>            
            Nový model
        </h3>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <form class="form" method='POST' action='<?php $this->link(['action' => 'newSource']); ?>' name = 'newSource' onsubmit='return checkNewModel()'>
            <div class="form-group"> 
                <label class="small" for='name_source'>Název (pouze alphabet znaky): </label>
                <input class="form-control input-sm" type='text' name='name_source'>
            </div>
            <input class="btn btn-success" type='submit' value='Vytvoř'>
        </form>
    </div>
</div>

