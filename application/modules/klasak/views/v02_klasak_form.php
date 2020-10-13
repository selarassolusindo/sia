<!doctype html>
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
        <h2 style="margin-top:0px">V02_klasak <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idakun <?php echo form_error('idakun') ?></label>
            <input type="text" class="form-control" name="idakun" id="idakun" placeholder="Idakun" value="<?php echo $idakun; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">KodeBB <?php echo form_error('KodeBB') ?></label>
            <input type="text" class="form-control" name="KodeBB" id="KodeBB" placeholder="KodeBB" value="<?php echo $KodeBB; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">KodeBP <?php echo form_error('KodeBP') ?></label>
            <input type="text" class="form-control" name="KodeBP" id="KodeBP" placeholder="KodeBP" value="<?php echo $KodeBP; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('Nama') ?></label>
            <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama" value="<?php echo $Nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Induk <?php echo form_error('Induk') ?></label>
            <input type="text" class="form-control" name="Induk" id="Induk" placeholder="Induk" value="<?php echo $Induk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Urut <?php echo form_error('Urut') ?></label>
            <input type="text" class="form-control" name="Urut" id="Urut" placeholder="Urut" value="<?php echo $Urut; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">C <?php echo form_error('c') ?></label>
            <input type="text" class="form-control" name="c" id="c" placeholder="C" value="<?php echo $c; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('klasak') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>