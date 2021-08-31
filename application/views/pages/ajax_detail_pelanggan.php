<?php 	
	if(isset($detail_pelanggan)){
		foreach($detail_pelanggan as $row){
	?>
	<div class="row">
		<div class="col-5">
			<div class="form-group">
				<label>Alamat</label>
				<input type="text" name="alamat" class="form-control" value="<?php echo $row->alamat; ?>" readonly>
			</div>

			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="<?php echo $row->email; ?>" readonly>
			</div>
		</div>
	</div>
<?php  
	}
}
	?>