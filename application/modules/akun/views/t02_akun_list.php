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
        <h2 style="margin-top:0px">T02_akun List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <!-- <?php //echo anchor(site_url('akun/create'),'Create', 'class="btn btn-primary"'); ?> -->
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('akun/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('akun'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <!-- <th>No</th> -->
		<th>Kode</th>
		<th>Nama</th>
		<!-- <th>Induk</th>
		<th>Urut</th>
		<th>Created At</th>
		<th>Updated At</th> -->
		<th>Action</th>
            </tr><?php
            foreach ($akun_data as $akun)
            {
                ?>
                <tr>
			<!-- <td width="80px"><?php echo ++$start ?></td> -->
			<td><?php echo $akun->Kode ?></td>
			<!-- <td><?php //echo $akun->Nama ?></td> -->
            <td><?php echo formatNamaAkun($akunLastLevel, $akun) ?></td>
			<!-- <td><?php //echo $akun->Induk ?></td>
			<td><?php //echo $akun->Urut ?></td>
			<td><?php //echo $akun->created_at ?></td>
			<td><?php //echo $akun->updated_at ?></td> -->
			<td style="text-align:right" width="200px">
				<?php
                echo (!isLastLevel($akunLastLevel, $akun) ? anchor(site_url('akun/create/'.$akun->idakun),'Add') . ' | ' : '');
                // echo (!isLastLevel($akunLastLevel, $akun) ? anchor(site_url('akun/read/'.$akun->idakun),'Add') . ' | ' : '');
				// echo anchor(site_url('akun/read/'.$akun->idakun),'Read');
				// echo ' | ';
				echo anchor(site_url('akun/update/'.$akun->idakun),'Update');
				echo ' | ';
				echo anchor(site_url('akun/delete/'.$akun->idakun),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('akun/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('akun/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
