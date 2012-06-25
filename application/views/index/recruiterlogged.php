<div class="row">

    <div class="span12">

        <h3><span class="slash">//</span> Hunting for a head?</h3>

        <p>Are you a head hunter? Login below and signup to find your dream team.</p>

        <form method="POST" name="frmRecruiter">

            <label>Company</label>
            <input type="text" id="company" name="company" />
            <span><?php echo form_error('company'); ?></span>

            <label>E-mail</label>
            <input type="text" id="email" name="email" />
            <span><?php echo form_error('email'); ?></span>            

            <label>State:</label>
            <select name="selectUf">
                <option value="">--SELECIONE--</option>
                <?php foreach ($ufs as $uf) : ?>
                    <option value="<?php echo $uf->id_uf; ?>"><?php if ($uf->sigla != 'OC' ) : echo $uf->sigla; else: echo $uf->nome; endif; ?></option>
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