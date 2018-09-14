<!-- Modal -->
<div class="modal fade" id="myRegister" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form role="form" action='<?php $this->link(['core' => 'account', 'action' => 'register']); ?>' method='POST' onsubmit='return checkLog()' >

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <div class="help"><b>Registrace do aplikace Radflow.</b></div>
                </div>
                <div class="modal-body">

                    <div class="form-group">  
                        <label for='email'>E - mail: </label>
                        <input class="form-control" type='text' name='email_user' placeholder="email">
                    </div>

                    <div class="form-group">  
                        <label for='password'>Heslo: </label>
                        <input class="form-control" type='password' name='password'>
                    </div>

                    <div class="form-group">  
                        <label for='passwordVerify'>Potvrzení hesla: </label>
                        <input class="form-control" type='password' name='passwordVerify'>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-success" type='submit' value='Vytvořit účet' name='regist'>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Zavři</button>
                </div>
            </form>
        </div>

    </div>
</div>



