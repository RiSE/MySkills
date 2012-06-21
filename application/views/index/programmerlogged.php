<div class="row">

    <div class="span12">

        <h3><span class="slash">//</span> Finished the iOS trainning course?</h3>

        <p>
            If you are a programmer, just sign-in and put you code and e-mail so that we can know you.
        </p>

        <form method="POST" name="frmProgrammer">
            <label>Certficate Code</label>
            <input type="text" id="code" name="code" />
            <span><?php echo form_error('code'); ?></span>

            <label>E-mail</label>
            <input type="text" id="email" name="email" />
            <span><?php echo form_error('email'); ?></span>            
            
            <label>State:</label>
            <select name="selectUf">
                <option value="">--SELECIONE--</option>
                <?php foreach ($ufs as $uf) : ?>
                <option value="<?php echo $uf->id_uf; ?>"><?php echo $uf->sigla; ?></option>
                <?php endforeach; ?>
            </select>
            <span><?php echo form_error('selectUf'); ?></span>

            <br />
            <input type="submit" value="Sigup" name="signup" />
        </form>

    </div> <!-- /span12 -->

    <div class="span6">		

    </div> <!-- /span6 -->
</div>