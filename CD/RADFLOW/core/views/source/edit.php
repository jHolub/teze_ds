<hr>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">     
                <h3>Čerpací zkouška - edit</h3>

                <h4>
                    Nahrání dat
                    <span class="dropdown">
                        <a dropdown-toggle type="button" data-toggle="dropdown" ><span class="glyphicon glyphicon-info-sign"></span></a>
                        <div class="dropdown-menu" style="padding: 5px; width: 350px;">
                            <b>požadovaný datový formát:</b><br>
                            <i> 1. sloupec - čas; 2. sloupec - snížení</i><br>
                            <div>
                                Příklad CSV format (\t = tab; \n = end of line ):<br>
                                20 \t 0.1 \n <br>
                                120 \t 0.3 \n 
                            </div>
                        </div>
                    </span>
                </h4>  
            </div>
        </div>



        <div class="row">
            <div class="col-sm-4">   
                <?php if ($this->var_(['sourceData', 'TEST_DATA'])): ?>


                    Název souboru: <?php echo $this->print_(['sourceData', 'TEST_DATA']); ?>
                    <a href="<?php $this->link(['aaction' => 'selDataSource', 'render' => 'edit']) ?>"><span class="glyphicon glyphicon-trash"> SMAZAT</a>

                <?php else: ?>

                    DATA Z ČERPACÍ ZKOUŠKY
                    <form class="form-inline" action="<?php $this->link(["action" => "saveDataSource", 'render' => 'edit']) ?>" method="post" enctype="multipart/form-data" >
                        <div class="form-group"> 
                            <label class="small" for='file'>POŽADOVANÝ FORMÁT: TXT</label>

                            <input class="form-control input-sm" type="file" name="file" size="500" >

                            <input class="btn btn-success btn-sm" type="submit" name="save_data" value="ULOŽ" >
                        </div>
                    </form>



                <?php endif; ?>
            </div>
            <div class="col-sm-4">   
                <?php if ($this->var_(['sourceData', 'OBSERV_DATA'])): ?>


                    POZOROVACÍ VRT: <?php echo $this->print_(['sourceData', 'OBSERV_DATA']); ?>
                    <a href="<?php $this->link(['action' => 'delDataSource', 'render' => 'edit', 'observData' => 1]); ?>"><span class="glyphicon glyphicon-trash"> SMAZAT</a>


                <?php else: ?>

                    SNÍŽENÍ NA POZOROVACÍM VRTU
                    <form class="form-inline" action="<?php $this->link(['action' => 'saveDataSource', 'render' => 'edit', 'observData' => 1]); ?>" method="post" enctype="multipart/form-data" >
                        <div class="form-group"> 
                            <label class="small" for='file'>POŽADOVANÝ FORMÁT: TXT</label>

                            <input class="form-control input-sm" type="file" name="file" size="500" >

                            <input class="btn btn-success btn-sm" type="submit" name="save_data" value="ULOŽ" >
                        </div>
                    </form>

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php $this->embed('parametrs.php'); ?>