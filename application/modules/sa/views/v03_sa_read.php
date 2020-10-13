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
        <h2 style="margin-top:0px">V03_sa Read</h2>
        <table class="table">
	    <tr><td>Idsa</td><td><?php echo $idsa; ?></td></tr>
	    <tr><td>Idakun</td><td><?php echo $idakun; ?></td></tr>
	    <tr><td>Debit</td><td><?php echo $Debit; ?></td></tr>
	    <tr><td>Kredit</td><td><?php echo $Kredit; ?></td></tr>
	    <tr><td>C</td><td><?php echo $c; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>