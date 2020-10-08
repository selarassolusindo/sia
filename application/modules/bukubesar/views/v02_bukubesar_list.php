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
        <h2 style="margin-top:0px">V02_bukubesar List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <!-- <?php //echo anchor(site_url('bukubesar/create'),'Create', 'class="btn btn-primary"'); ?> -->
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-6">
                <form action="<?php echo site_url('buku-besar'); ?>" method="post">
            	    <div class="form-group">
                        <label for="int">Akun <?php echo form_error('idakun') ?></label>
                        <!-- <input type="text" class="form-control" name="idakun" id="idakun" placeholder="Idakun" value="<?php //echo $idakun; ?>" /> -->
                        <select name="idakun" class="form-control">
            				<option value="">Akun</option>
            				<?php
            				foreach($akun_data as $akun)
            				{
            					$selected = ($akun->idakun == $idakun) ? ' selected="selected"' : "";

            					echo '<option value="'.$akun->idakun.'" '.$selected.'>'.$akun->Kode . ' - ' . $akun->Nama.'</option>';
            				}
            				?>
            			</select>
                    </div>
            	    <button type="submit" class="btn btn-primary">Proses</button>
            	    <a href="<?php echo site_url('buku-besar') ?>" class="btn btn-default">Reset</a>
            	</form>
            </div>
        </div>

        <?php
        if ($idakun <> '') {
        ?>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Tanggal</th>
        		<th>No. Bukti</th>
        		<th>Keterangan</th>
        		<th>Debit</th>
        		<th>Kredit</th>
        		<th>Saldo</th>
            </tr>
            <?php
            $start = 0;
            $saldo = 0;
            $debit = 0;
            $kredit = 0;
            ?>
            <tr>
    			<td align="right"><?php echo ++$start ?>.</td>
    			<td>-</td>
    			<td>-</td>
    			<td>Saldo Awal</td>
    			<td align="right"><?php echo numIndo($bukubesar_data->Debit) ?></td>
    			<td align="right"><?php echo numIndo($bukubesar_data->Kredit) ?></td>
                <td align="right"><?php echo numIndo($bukubesar_data->Debit - $bukubesar_data->Kredit) ?></td>
    		</tr>
        </table>
        <?php
        }
        ?>
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="#" class="btn btn-primary">Total Record : <?php //echo $total_rows ?></a> -->
        		<?php //echo anchor(site_url('bukubesar/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        		<?php //echo anchor(site_url('bukubesar/word'), 'Word', 'class="btn btn-primary"'); ?>
    	    </div>
            <div class="col-md-6 text-right">
                <!-- <?php //echo $pagination ?> -->
            </div>
        </div>
    <!-- </body>
</html> -->
