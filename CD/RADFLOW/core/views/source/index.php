
<section>

    <div class="container">


                <?php $this->embed('newModel.php'); ?>


    </div>

</section>

<hr>
<h3 class="help">
    <span class="glyphicon glyphicon-th-list"></span>
    Čerpací zkoušky
</h3> 
<br>

<?php $this->embed('listModel.php'); ?>


<?php if ($this->var_('activeSource')): ?>

    <?php $this->render('edit'); ?>

<?php endif; ?>