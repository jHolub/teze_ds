<?php
require_once '../setting/config.php';

require_once \GLOBALVAR\LIB_PATH . '/class.ErrorLogHandling.php';

require_once \GLOBALVAR\LIB_PATH . '/class.URLService.php';

require_once \GLOBALVAR\LIB_PATH . '/class.SessionService.php';

require_once \GLOBALVAR\LIB_PATH . '/class.Routing.php';

require_once \GLOBALVAR\LIB_PATH . '/class.Request.php';

require_once \GLOBALVAR\LIB_PATH . '/class.UserService.php';

require_once \GLOBALVAR\LIB_PATH . '/class.MailService.php';

require_once \GLOBALVAR\LIB_PATH . '/class.ViewsService.php';

require_once \GLOBALVAR\LIB_PATH . '/class.ModelService.php';

require_once \GLOBALVAR\LIB_PATH . '/class.ControllerService.php';

require_once \GLOBALVAR\LIB_PATH . '/class.BootUp.php';

$home = new BootUp();
?>

<!DOCTYPE html>
<html>
    <head>        
        <meta charset="UTF-8">
        <meta name="author" content="J.H." />
        <meta name="project" content="RadFlow" />
        <meta name="language" content="czech" />
        <meta name="country" content="cz" />
        <meta name="description" content="RadFlow - groundwater application software">
        <meta http-equiv="content-language" content="cs" />

        <link rel="stylesheet" href="<?php echo \GLOBALVAR\ROOT; ?>/css/bootstrap3_3_2/css/bootstrap.min.css">

        <link rel="stylesheet" href="<?php echo \GLOBALVAR\ROOT; ?>/css/main.css">

        <script src="<?php echo \GLOBALVAR\ROOT; ?>/js/jquery-1.11.1.min.js"></script>


        <?php $home->view->render_webHead(); ?>

        <script>
            $(document).ready(function () {
                if (!$.trim($('#alertMsgCont').html()) == "") {
                    $('.alertMsg').show().delay(3000).slideUp(300);
                }
            });
        </script>

    </head>

    <body> 

        <div class="container">

            <div class="alertMsg alert alert-warning" id="alertMsg">
                <span id="alertMsgCont"><?php $home->view->get_msg(); ?></span>
            </div>  

            <?php $home->view->render_header(); ?>

            <?php $home->view->render_navi(); ?> 

            <?php $home->view->render_page(); ?>

            <footer class="footer">
                <?php $home->view->render_foot(); ?>
            </footer> 

        </div>  

        <script src="<?php echo \GLOBALVAR\ROOT; ?>/css/bootstrap3_3_2/js/bootstrap.min.js"></script>

    </body>

</html>