<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a style="margin-right:8px; margin-left:5px; padding:2px;" class="navbar-brand" href="<?php $this->link([]); ?>">
                <img src="./images/radflowLogoSmall.png">
            </a>            
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li <?php if ($this->core == 'account'): ?>class="active" <?php endif; ?>><a href='<?php $this->link(['core' => 'account']); ?>'>Úvod</a></li>
                <?php if ($this->user->isLogged()): ?>
                    <li <?php if ($this->core == 'source'): ?>class="active" <?php endif; ?>><a href='<?php $this->link(['core' => 'source']); ?>'>Čerpací zkoušky</a></li>

                    <?php if (SessionService::getInstance()->get('sourceName')): ?> 
                        <li <?php if ($this->core == 'jacob' || $this->core == 'theis' || $this->core == 'stehfest'): ?>class="dropdown active"<?php else: ?>class="dropdown"<?php endif; ?>>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Analýzy dat
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php $this->link(['core' => 'jacob']); ?>">Jacob. metoda</a></li>
                                <li><a href="<?php $this->link(['core' => 'theis']); ?>">Theis metoda</a></li>
                                <li><a href="<?php $this->link(['core' => 'stehfest']); ?>">Skutečný vrt (Agarwal)</a></li> 
                                <li><a href="<?php $this->link(['core' => 'pech']); ?>">Dodatečné odpory</a></li> 
                            </ul>
                        </li>
                    <?php endif; ?>                        
                <?php endif; ?>
                <li <?php if ($this->core == 'references'): ?>class="active" <?php endif; ?>><a href='<?php $this->link(['core' => 'references']); ?>'>Návod</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a>
                    <?php if ($this->user->isLogged()): ?>
                        <span class="glyphicon glyphicon-user"></span>
                    <?php else: ?>
                        <span>Uživatel:</span> 
                    <?php endif; ?>
                    <span><b><?php $this->write($this->user->getUserName()); ?></b></span>
                </a></li> 


                <?php if ($this->user->isLogged()): ?>

                    <li><a href="<?php $this->link(['core' => 'account', 'action' => 'logout']); ?>"><span class="glyphicon glyphicon-log-out"></span>Odhlásit</a></li> 

                <?php else: ?>                   
                    <li><a  data-toggle="modal" data-target="#myRegister"><span class="glyphicon glyphicon-user"></span>&nbsp Registrovat</a></li>
                    <li><a  data-toggle="modal" data-target="#myLogin"><span class="glyphicon glyphicon-log-in"></span>&nbsp Přihlásit</a></li>
                    <?php endif; ?>

                <?php if (SessionService::getInstance()->get('modelName')): ?> 

                    <li><a><?php echo htmlspecialchars(SessionService::getInstance()->get('modelName')); ?></a></li>

                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
