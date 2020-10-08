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
        <h2 style="margin-top:0px">V02_bukubesar Read</h2>
        <table class="table">
	    <tr><td>Idakun</td><td><?php echo $idakun; ?></td></tr>
	    <tr><td>Kode</td><td><?php echo $Kode; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $Nama; ?></td></tr>
	    <tr><td>Induk</td><td><?php echo $Induk; ?></td></tr>
	    <tr><td>Urut</td><td><?php echo $Urut; ?></td></tr>
	    <tr><td>Debit</td><td><?php echo $Debit; ?></td></tr>
	    <tr><td>Kredit</td><td><?php echo $Kredit; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('bukubesar') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>