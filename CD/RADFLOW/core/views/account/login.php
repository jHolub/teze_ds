<!-- Modal -->
<div class="modal fade" id="myLogin" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <div class="help"><b>Přihlášení do aplikace.</b></div>
   
            </div>
            <form role="form" action='<?php $this->link(['core' => 'account', 'action' => 'login']); ?>' method='POST' onsubmit='return checkLog()' >

                <div class="modal-body">



                    <div class="form-group"> 

                        <label for='email'>E - mail: </label>

                        <input class="form-control" type='text' name='email_user'>

                    </div>
                    <div class="form-group">                  

                        <label for='password'>Heslo: </label>

                        <input class="form-control" type='password' name='password'>

                    </div>     
             <small class="help">Pro využívání analytických nástrojů aplikace je nutné se příhlasit. V případě, že nemáte vytvořený učet, můsíte se nejprve registrovat.</small>    


                </div>
                <div class="modal-footer">
                    <input class="btn btn-success" type='submit' value='Přihlásit' name='login'>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zavřit</button>
                </div>

            </form>
        </div>

    </div>
</div>


