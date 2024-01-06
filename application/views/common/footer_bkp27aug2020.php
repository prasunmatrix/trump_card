        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?=COPY_RIGHT?>
                    </div>
                </div>
            </div>
        </footer>

        </div>

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="<?=base_url()?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?=base_url()?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?=base_url()?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?=base_url()?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?=base_url()?>assets/libs/node-waves/waves.min.js"></script>

        <script src="<?=base_url()?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?=base_url()?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

        <script src="<?=base_url()?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?=base_url()?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>


        <script src="<?=base_url()?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?=base_url()?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <script src="<?=base_url()?>assets/js/pages/datatables.init.js"></script> 

        <script src="<?=base_url()?>assets/libs/parsleyjs/parsley.min.js"></script>
        <script src="<?=base_url()?>assets/js/pages/form-validation.init.js"></script>

        <script src="<?=base_url()?>assets/libs/select2/js/select2.min.js"></script>
        <script src="<?=base_url()?>assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>       

        <script src="<?=base_url()?>assets/js/app.js"></script>    
        <script src="<?=base_url()?>assets/custom.js"></script>  

    </body>

</html>

<!--=================================Excel Upload Modal=============================================-->

<div class="modal fade" id="points" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-bottom: 0px; padding-top: 5px;">
        <div class="form-group">
            <label>Sports Name</label>
            <select class="form-control" required>
                <option value="">Select Sports</option>
            </select>
        </div>
        <div class="form-group">
            <label>Player Type</label>
            <select class="form-control" required>
                <option value="">Select Type</option>
            </select>
        </div>
        <div class="form-group">
            <label>Upload Excel</label>
            <input type="file" class="filestyle">
            <p class="note text-right"><a href="">Click here to get dummy excel format</a></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Upload</button>
      </div>
    </div>
  </div>
</div>

<!--===============================================================================================-->