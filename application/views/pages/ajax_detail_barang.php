<?php 
		if(isset($detail_barang)){
			foreach ($detail_barang as $row) {
	?>
	<div class="row">
		<div class="col-6">
			<div class="form-group">
				<label>Kode Barang</label>
				<input name="kd_barang" type="text" class="form-control" value="<?php echo $row->kd_barang; ?>" readonly>
			</div>

			<div class="form-group">
				<label>Nama Barang</label>
				<input name="nm_barang" type="text" class="form-control" value="<?php echo $row->nm_barang; ?>" readonly>
			</div>

			<div class="form-group">
				<label>Harga</label>
				<input name="harga" type="text" class="form-control" value="<?php echo $row->harga; ?>" readonly>
			</div>
		</div>
		
		<div class="col-6">
			<div class="form-group">
				<label>Stok</label>
				<input name="stok" type="text" class="form-control" value="<?php echo $row->stok; ?>" readonly>
			</div>

			<div class="form-group">
				<label>Jumlah Barang</label>
				<input name="qty" type="text" class="form-control" placeholder="Masukan Jumlah">
			</div>
		</div>
	</div>

	<?php  
		}
	}
?>