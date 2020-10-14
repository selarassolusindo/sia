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
        <h2 style="margin-top:0px">T05_saldoawalp Read</h2>
        <table class="table">
	    <tr><td>Idakun</td><td><?php echo $idakun; ?></td></tr>
	    <tr><td>Debit</td><td><?php echo $Debit; ?></td></tr>
	    <tr><td>Kredit</td><td><?php echo $Kredit; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('saldoawalp') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>