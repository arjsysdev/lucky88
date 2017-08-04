	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
  if ($this->ion_auth->logged_in())
  {
?>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.2
    </div>
    <strong>Copyright &copy; <?= date('Y') ?> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
	</div>

		<footer>
			<!-- jvectormap -->
			<script src="<?= base_url('assets') ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
			<script src="<?= base_url('assets') ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
			<!-- jQuery Knob Chart -->
			<script src="<?= base_url('assets') ?>/plugins/knob/jquery.knob.js"></script>
			<!-- daterangepicker -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
			<script src="<?= base_url('assets') ?>/plugins/daterangepicker/daterangepicker.js"></script>
			<!-- datepicker -->
			<script src="<?= base_url('assets') ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
			<!-- Bootstrap WYSIHTML5 -->
			<script src="<?= base_url('assets') ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
			<!-- Slimscroll -->
			<script src="<?= base_url('assets') ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
			<!-- FastClick -->
			<script src="<?= base_url('assets') ?>/plugins/fastclick/fastclick.js"></script>
			<!-- AdminLTE App -->
			<script src="<?= base_url('assets') ?>/dist/js/app.min.js"></script>
			<!-- AdminLTE for demo purposes -->
			<script src="<?= base_url('assets') ?>/dist/js/demo.js"></script>
		</footer>
    <?php
    }
  ?>
	</body>
	
</html>