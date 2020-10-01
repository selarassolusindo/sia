<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php //echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T99_tglsaldoawal <?php //echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <!-- <label for="date">Tanggal <?php echo form_error('Tanggal') ?></label> -->
            <!-- <input type="text" class="form-control" name="Tanggal" id="Tanggal" placeholder="Tanggal" value="<?php //echo $Tanggal; ?>" /> -->
            <!-- <label>Date:</label> -->
            <label for="date">Tanggal <?php echo form_error('Tanggal') ?></label>
            <div class="col-sm-2 input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" name="Tanggal" value="<?php echo $Tanggal; ?>" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
	    <!-- <div class="form-group">
            <label for="timestamp">Created At <?php //echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Updated At <?php //echo form_error('updated_at') ?></label>
            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        </div> -->
	    <input type="hidden" name="idtgl" value="<?php echo $idtgl; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('tanggal-saldo-awal') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!-- </body>
</html> -->
