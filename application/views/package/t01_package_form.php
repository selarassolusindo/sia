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
        <h2 style="margin-top:0px">T01_package <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">PackageName <?php echo form_error('PackageName') ?></label>
            <input type="text" class="form-control" name="PackageName" id="PackageName" placeholder="PackageName" value="<?php echo $PackageName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PackageCode <?php echo form_error('PackageCode') ?></label>
            <input type="text" class="form-control" name="PackageCode" id="PackageCode" placeholder="PackageCode" value="<?php echo $PackageCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">SN3LN <?php echo form_error('SN3LN') ?></label>
            <input type="text" class="form-control" name="SN3LN" id="SN3LN" placeholder="SN3LN" value="<?php echo $SN3LN; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">SN6LN <?php echo form_error('SN6LN') ?></label>
            <input type="text" class="form-control" name="SN6LN" id="SN6LN" placeholder="SN6LN" value="<?php echo $SN6LN; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">SNELN <?php echo form_error('SNELN') ?></label>
            <input type="text" class="form-control" name="SNELN" id="SNELN" placeholder="SNELN" value="<?php echo $SNELN; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">PN1LN <?php echo form_error('PN1LN') ?></label>
            <input type="text" class="form-control" name="PN1LN" id="PN1LN" placeholder="PN1LN" value="<?php echo $PN1LN; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">PN1DN <?php echo form_error('PN1DN') ?></label>
            <input type="text" class="form-control" name="PN1DN" id="PN1DN" placeholder="PN1DN" value="<?php echo $PN1DN; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">SN3C <?php echo form_error('SN3C') ?></label>
            <input type="text" class="form-control" name="SN3C" id="SN3C" placeholder="SN3C" value="<?php echo $SN3C; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">SN3CP <?php echo form_error('SN3CP') ?></label>
            <input type="text" class="form-control" name="SN3CP" id="SN3CP" placeholder="SN3CP" value="<?php echo $SN3CP; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">SN6C <?php echo form_error('SN6C') ?></label>
            <input type="text" class="form-control" name="SN6C" id="SN6C" placeholder="SN6C" value="<?php echo $SN6C; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">SN6CP <?php echo form_error('SN6CP') ?></label>
            <input type="text" class="form-control" name="SN6CP" id="SN6CP" placeholder="SN6CP" value="<?php echo $SN6CP; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">SNEC <?php echo form_error('SNEC') ?></label>
            <input type="text" class="form-control" name="SNEC" id="SNEC" placeholder="SNEC" value="<?php echo $SNEC; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">SNECP <?php echo form_error('SNECP') ?></label>
            <input type="text" class="form-control" name="SNECP" id="SNECP" placeholder="SNECP" value="<?php echo $SNECP; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">PN3C <?php echo form_error('PN3C') ?></label>
            <input type="text" class="form-control" name="PN3C" id="PN3C" placeholder="PN3C" value="<?php echo $PN3C; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">PN3CP <?php echo form_error('PN3CP') ?></label>
            <input type="text" class="form-control" name="PN3CP" id="PN3CP" placeholder="PN3CP" value="<?php echo $PN3CP; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">PN6C <?php echo form_error('PN6C') ?></label>
            <input type="text" class="form-control" name="PN6C" id="PN6C" placeholder="PN6C" value="<?php echo $PN6C; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">PN6CP <?php echo form_error('PN6CP') ?></label>
            <input type="text" class="form-control" name="PN6CP" id="PN6CP" placeholder="PN6CP" value="<?php echo $PN6CP; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">PNEC <?php echo form_error('PNEC') ?></label>
            <input type="text" class="form-control" name="PNEC" id="PNEC" placeholder="PNEC" value="<?php echo $PNEC; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">PNECP <?php echo form_error('PNECP') ?></label>
            <input type="text" class="form-control" name="PNECP" id="PNECP" placeholder="PNECP" value="<?php echo $PNECP; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Updated At <?php echo form_error('updated_at') ?></label>
            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        </div>
	    <input type="hidden" name="idprice" value="<?php echo $idprice; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('package') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>