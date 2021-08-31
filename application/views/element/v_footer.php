  <!-- General JS Scripts -->
  <script src="<?php echo base_url('assets/modules/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/popper.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/tooltip.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/nicescroll/jquery.nicescroll.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/moment.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/stisla.js')?>"></script>
 
  
  <!-- JS Libraies -->
  <script src="<?php echo base_url('assets/modules/datatables/datatables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/jquery-ui/jquery-ui.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/jquery-selectric/jquery.selectric.min.js')?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/js/page/modules-datatables.js')?>"></script>>
  
  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
  <script src="<?php echo base_url('assets/js/custom.js')?>"></script>

  <!-- Print -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.printPage.js')?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $(".btnPrint").printPage();
    });
  </script>
  <!-- 3. AddChat JS -->
  <!-- Modern browsers -->
  <script  type="module" src="<?php echo base_url('assets/addchat/js/addchat.min.js') ?>"></script>
  <!-- Fallback support for Older browsers -->
  <script nomodule src="<?php echo base_url('assets/addchat/js/addchat-legacy.min.js') ?>"></script>
</body>
</html>