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
        <h2 style="margin-top:0px">T03_saldoawal Read</h2> -->
        <table class="table">
	    <!-- <tr><td>Akun</td><td><?php //echo $idakun; ?></td></tr> -->
        <tr><td>Akun</td><td><?php echo $Kode . ' - ' . $Nama; ?></td></tr>
	    <tr><td>Debit</td><td><?php echo numIndo($Debit); ?></td></tr>
	    <tr><td>Kredit</td><td><?php echo numIndo($Kredit); ?></td></tr>
	    <!-- <tr><td>Created At</td><td><?php //echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php //echo $updated_at; ?></td></tr> -->
	    <tr><td></td><td><a href="<?php echo site_url('saldo-awal') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        <!-- </body>
</html> -->
