<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i style="color: #ffc107;" class="fa fa-address-card fa-sm"></i> Master Contact</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <?php if(isset($data_contact)){
                      foreach($data_contact as $row){
                  ?>
                  <form method="post" action="<?php echo site_url('master_contact/edit_contact') ?>">
                    <div class="form-group">
                      <label>Nama Perusahaan</label>
                      <input name="nama" type="text" class="form-control" value="<?php echo $row->nama ?>">
                    </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" type="text" class="form-control" value="<?php echo $row->alamat ?>">
                      </div>

                      <div class="form-group">
                        <label>No Telepon</label>
                        <input name="telp" type="text" class="form-control" value="<?php echo $row->telp?>">
                      </div>

                      <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" value="<?php echo $row->email ?>">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Website</label>
                        <input name="website" type="text" class="form-control" value="<?php echo $row->website ?>">
                      </div>

                      <div class="form-group">
                        <label>Owner</label>
                        <input name="owner" type="text" class="form-control" value="<?php echo $row->owner?>">
                      </div>

                      <div class="form-group">
                        <label>Deskripsi Perusahaan</label>
                        <textarea name="desc" class="form-control"><?php echo $row->desc ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <input name="id" type="hidden" value="1">
                    <div class="form-group">
                      <button type="submit" class="btn btn-warning btn-block">Update Contact</button>
                    </div>
                  </div>
                 </form>
                 <?php }
                  }
                 ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- End Main Content -->