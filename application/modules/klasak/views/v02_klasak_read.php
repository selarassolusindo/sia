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
        <h2 style="margin-top:0px">V02_klasak Read</h2>
        <table class="table">
	    <tr><td>Idakun</td><td><?php echo $idakun; ?></td></tr>
	    <tr><td>KodeBB</td><td><?php echo $KodeBB; ?></td></tr>
	    <tr><td>KodeBP</td><td><?php echo $KodeBP; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $Nama; ?></td></tr>
	    <tr><td>Induk</td><td><?php echo $Induk; ?></td></tr>
	    <tr><td>Urut</td><td><?php echo $Urut; ?></td></tr>
	    <tr><td>C</td><td><?php echo $c; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('klasak') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>