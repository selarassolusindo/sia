<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">V03_sa <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="int">Akun <?php echo form_error('idakun') ?></label>
                <!-- <input type="text" class="form-control" name="idakun" id="idakun" placeholder="Idakun" value="<?php //echo $idakun; ?>" /> -->
                <select name="idakun" class="form-control">
    				<option value="">Akun</option>
    				<?php
    				foreach($akun_data as $akun) {
    					$selected = ($akun->idakun == $idakun) ? ' selected="selected"' : "";
    					echo '<option value="'.$akun->idakun.'" '.$selected.'>'.$akun->Kode . ' - ' . $akun->Nama.'</option>';
    				}
    				?>
    			</select>
            </div>
    	    <!-- <div class="form-group">
                <label for="varchar">Idsa <?php //echo form_error('idsa') ?></label>
                <input type="text" class="form-control" name="idsa" id="idsa" placeholder="Idsa" value="<?php echo $idsa; ?>" />
            </div>
    	    <div class="form-group">
                <label for="int">Idakun <?php //echo form_error('idakun') ?></label>
                <input type="text" class="form-control" name="idakun" id="idakun" placeholder="Idakun" value="<?php echo $idakun; ?>" />
            </div> -->
    	    <div class="form-group">
                <label for="double">Debit <?php echo form_error('Debit') ?></label>
                <input type="text" class="form-control" name="Debit" id="Debit" placeholder="Debit" value="<?php echo $Debit; ?>" />
            </div>
    	    <div class="form-group">
                <label for="double">Kredit <?php echo form_error('Kredit') ?></label>
                <input type="text" class="form-control" name="Kredit" id="Kredit" placeholder="Kredit" value="<?php echo $Kredit; ?>" />
            </div>
    	    <!-- <div class="form-group">
                <label for="varchar">C <?php echo form_error('c') ?></label>
                <input type="text" class="form-control" name="c" id="c" placeholder="C" value="<?php echo $c; ?>" />
            </div> -->
    	    <input type="hidden" name="idsa" value="<?php echo $idsa; ?>" />
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    	    <a href="<?php echo site_url('saldo-awal') ?>" class="btn btn-default">Cancel</a>
    	</form>
    <!-- </body>
</html> -->
