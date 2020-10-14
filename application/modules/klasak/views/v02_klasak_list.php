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
        <h2 style="margin-top:0px">V02_klasak List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php //echo anchor(site_url('klasak/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('klasak/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('klasifikasi-akun'); ?>" class="btn btn-default">Reset</a>
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
        		<th>Kode Buku Besar</th>
        		<th>Kode Buku Pembantu</th>
        		<th>Nama</th>
        		<th>Action</th>
            </tr>
            <?php
            foreach ($klasak_data as $klasak)
            {
            ?>
                <tr>
        			<td><?php echo $klasak->KodeBB ?></td>
        			<td><?php echo $klasak->KodeBP ?></td>
        			<!-- <td><?php //echo $klasak->Nama ?></td> -->
                    <td><?php echo formatNamaAkun($klasakLastLevel, $klasak) ?></td>
        			<td style="text-align:right">
        				<?php
                        // echo ($klasak->KodeBP == '' ? anchor(site_url((strlen($klasak->KodeBB) < 10 ? 'akun/' : 'akunp/') .'create/' . $klasak->idakun),'Add') . ' | ' : '');
                        echo ($klasak->KodeBB <> '' ? anchor(site_url($klasak->c . '/create/' . $klasak->idakun), 'Add') . ' | ' : '');
        				echo anchor(site_url($klasak->c . '/update/'.$klasak->idakun), 'Update') . ' | ';
        				echo anchor(site_url($klasak->c .'/delete/'.$klasak->idakun), 'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
        				?>
        			</td>
        		</tr>
            <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="#" class="btn btn-primary">Total Record : <?php //echo $total_rows ?></a> -->
        		<?php echo anchor(site_url('klasak/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        		<?php echo anchor(site_url('klasak/word'), 'Word', 'class="btn btn-primary"'); ?>
    	    </div>
            <div class="col-md-6 text-right">
                <?php //echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
