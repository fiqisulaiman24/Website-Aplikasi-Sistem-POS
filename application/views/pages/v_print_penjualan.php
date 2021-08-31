<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon/favicon-32x32.png')?>" sizes="32x32" />
  <title><?php echo $title ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/fontawesome/css/all.min.css')?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/datatables.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/jquery-selectric/selectric.css')?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/components.css')?>">
</head>

<body>
<div class="container">

    <style type="text/css">
        body{
            background-color: #ffffff;
        }
        [class*="span"] {
            float: left;
            min-height: 1px;
            margin-left: 5px;
        }
        .span {
            width: 220px;
        }
        .sign{
            height: 100px;
            border-bottom: 1px solid #000000;
        }
        .text-center{
            text-align: center
        }

    </style>
    <div align="left">
        <?php if(isset($dt_contact)){foreach($dt_contact as $row){?>
            <strong style="font-size: x-large; float: left; color: #3a87ad;"><?php echo $row->nama?></strong> <br/><br/>
            <strong style="font-size: large; float: left; color: #3a87ad;"><?php echo $row->desc?></strong> <br/>
        <?php }} ?>
        <hr/>
        <table>
            <tr>
                <?php if(isset($dt_contact)){foreach($dt_contact as $row){?>
                    <td width="70%"><strong>Alamat : </strong> <?php echo $row->alamat?></td>
                <?php }} ?>
            </tr>
            <tr>
                <?php if(isset($dt_contact)){foreach($dt_contact as $row){?>
                    <td width="70%"><strong>Phone : </strong> <?php echo $row->telp?> </td>
                <?php }}?>
            </tr>
            <tr>
                <td align="left"><strong>Operator : </strong> <?php echo $this->session->userdata('USERNAME')?></td>
            </tr>
            <tr>
                <td align="left"><strong>Date : </strong>  <?php echo isset($date1) ? $date1 : date('d M Y')?></td>
            </tr>
        </table>
    </div>
    <br/>

    <div align="center">
        <h3 style="border: 1px solid #333;">Report Penjualan Barang</h3>
        <br/>
        <div align="left">
            <table>
                <?php if(isset($dt_penjualan)){ foreach($dt_penjualan as $row) { ?>
                    <tr>
                        <td width="65%"><strong>Kode Penjualan : </strong> <?php echo $row->kd_penjualan; ?></td>
                        <td style="float: right"><strong>Pelanggan : </strong> <?php echo $row->nm_pelanggan; ?></td>
                    </tr>
                    <tr>
                        <td width="65%"><strong>Tanggal Penjualan : </strong> <?php echo date("d M Y",strtotime($row->tanggal_penjualan));?></td>
                        <td style="float: right"><strong>Alamat : </strong> <?php echo $row->alamat; ?></td>
                    </tr>
                    <tr>
                        <td width="65%"><strong>Pegawai : </strong> <?php echo $row->nama; ?></td>
                        <td style="float: right"><strong>Email : </strong> <?php echo $row->email; ?></td>
                    </tr>

                <?php } } ?>
            </table>

        </div>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Harga</th>
            </tr>
            </thead>
            <?php
            $no=1;
            if(isset($barang_jual)){
            foreach($barang_jual as $row){
            ?>
            <tbody>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->kd_barang; ?></td>
                <td><?php echo $row->nm_barang; ?></td>
                <td><?php echo $row->qty ?></td>
                <td><?php echo currency_format($row->harga)?></td>
            </tr>
            <?php }
            }
            ?>
            </tbody>
        </table>
        <?php if(isset($dt_penjualan)){ foreach($dt_penjualan as $row) { ?>
            <h5 style="float:right;">
                Total : <?php echo currency_format($row->total_harga)?>
            </h5>
        <?php }}?>
    </div>
    <br/>
    <hr/>

    <div class="span center">
        <?php
        if(isset($dt_penjualan)){
            foreach($dt_penjualan as $row) { ?>
                <h5 class="text-center">Pelanggan</h5>
                <div class="sign"></div>
                <h6 class="text-center"><?php echo $row->nm_pelanggan?></h6>
            <?php }
        }
        ?>
    </div>
    <div class="span center" style="float: right">
        <?php
        if(isset($dt_contact)){
            foreach($dt_contact as $row) { ?>
                <h5 class="text-center"><?php echo $row->nama?></h5>
                <div class="sign"></div>
                <h6 class="text-center">Direktur : <?php echo $row->owner?></h6>
            <?php }
        }
        ?>
    </div>
</div>
</body>
</html>