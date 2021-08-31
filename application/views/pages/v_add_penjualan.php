<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i style="color: #ffc107;" class="fa fa-handshake fa-sm"></i> Tambah Penjualan Barang</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card card-warning">
            <div class="card-body">
              <div class="row">
                <div class="col-12" style="margin-bottom: 20px;">
                  <a href="#modalAddPenjualanBarang" class="btn btn-warning btn-block" data-toggle="modal">
                    <i class="fas fa-plus"></i> Tambah Barang
                  </a>
                </div>
              </div>
              <form>
              <div class="row">  
                <div class="col-5">
                  <div class="form-group">
                    <label>Kode Penjualan</label>
                    <input type="text" class="form-control" value="<?php echo $kd_penjualan; ?>" readonly>
                  </div>
                </div>
              </div>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>                             
                      <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Penjualan</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>                                 
                      <?php $i=1; $no=1; ?>
                      <?php foreach ($this->cart->contents() as $items){ ?>
                      <?php echo form_hidden('rowid[]', $items['rowid']); ?>
                      <tr class="gradeX">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $items['id']; ?></td>
                        <td><?php echo $items['name']; ?></td>
                        <td><?php echo $items['qty']; ?></td>
                        <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                        <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?>
                        </td>
                        <td>
                          <a href="#" class="delbutton btn btn-danger" id="<?php echo 'tambah/'.$items['rowid'].'/'.$kd_penjualan.'/'.$items['id'].'/'.$items['qty']; ?>"><i class="fas fa trash"></i> Hapus Barang</a>
                        </td>
                      </tr>
                      <?php $i++; $no++; ?>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </form>
              <form method="post" action="<?php echo site_url('penjualan/simpan_penjualan') ?>">
                <div class="row">
                  <div class="col-lg-12">
                    <label>Daftar Pelanggan</label>
                      <div class="form-group">
                          <select id="kd_pelanggan" name="kd_pelanggan" class="form-control selectric">
                            <option value="">
                              <?php 
                                if(isset($data_pelanggan)){
                                  foreach ($data_pelanggan as $row) {
                              ?>
                              <option value="<?php echo $row->kd_pelanggan?>"><?php echo $row->nm_pelanggan?></option>
                            </option>
                            <?php 
                              } 
                            }
                            ?>
                          </select>
                      </div>
                    <div id="detail_pelanggan"></div>
                  </div>
                  <div class="col-lg-12">
                    <div class="card card-warning">
                      <div class="card-header">
                        <h3>Total Harga</h3>
                      </div>
                      <div class="card-body">
                        <input type="text" class="form-control" value="Rp. <?php echo $this->cart->format_number($this->cart->total()); ?>" readonly>
                      </div>

                      <input type="hidden" name="kd_penjualan" value="<?= $kd_penjualan; ?>" readonly>
                      <input type="hidden" name="total_harga" value="<?= $this->cart->total() ?>">
                      <input id="tanggal_penjualan" type="hidden" name="tanggal_penjualan" date-format="dd-mm-yyyy" value="<?php echo isset($date) ? $date : date('d-m-Y')?>" date="12-02-2012">

                      <div class="card-footer text-left">
                        <button class="btn btn-warning"><i class="fas fa-check"></i> Simpan</button>
                        <a href="<?php echo site_url('penjualan')?>" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- End Main Content -->

<!-- Modal Tambah Penjualan -->
<div class="modal hide fade" id="modalAddPenjualanBarang">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fas fa-box text-warning"></i> Tambah Barang</h5>
        </div>
        <form id="frm" name="frm" method="post" action="<?php echo site_url('penjualan/tambah_penjualan_to_cart')?>">
        <div class="modal-body">
          <div class="form-group">
            <label>Daftar Barang</label>
            <select id="kd_barang" class="form-control selectric" name="kd_barang" data-placeholder="Pilih Barang">
              <option value="">-Pilih Barang</option>
              <?php 
                if(isset($data_barang)){
                  foreach ($data_barang as $row){
                  ?>
                  <option value="<?php echo $row->kd_barang ?>"><?php echo $row->nm_barang?></option>
                  <?php 
                  }
                }
              ?>
            </select>
          </div>
          <div id="detail_barang"></div>
        </div>

        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
          <button id="add" name="add" type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Tambah Penjualan -->

<script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<!-- Ajax -->
  <script type="text/javascript">
    $(document).ready(function() {
        $("#kd_barang").change(function(){
            var kd_barang = $("#kd_barang").val();
            $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('penjualan/get_detail_barang'); ?>",
                  data: "kd_barang="+kd_barang,
                  cache: false,
                  success: function(data){
                      $('#detail_barang').html(data);
                      document.frm.add.disabled=false;
                }
            });
        });

      $("#kd_pelanggan").change(function(){
          var kd_pelanggan = $("#kd_pelanggan").val();
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('penjualan/get_detail_pelanggan'); ?>",
            data: "kd_pelanggan="+kd_pelanggan,
            cache: false,
            success: function(data){
              $('#detail_pelanggan').html(data);
            }
          });
      });

      $(".delbutton").click(function(){
        var element = $(this);
        var del_id = element.attr("id");
        var info = del_id;
        if(confirm("Anda Yakin?"))
        {
            $.ajax({
              url : "<?php echo base_url(); ?>penjualan/hapus_penjualan",
              data : "kode="+info,
              cache : false,
              success : function(){
              }
          });
          $(this).parents(".gradeX").animate({
            opacity: "hide"}, "slow");
        }
        return false;
      });
    })
  </script>
<!-- Ajax -->