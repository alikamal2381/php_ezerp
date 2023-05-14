<?php
   $PageTitle = "Add New City"; 
	 include "inc/includer.php"; 
	 include "emp_ck.php";
	 include "header.php"; 
	
   error_reporting(E_ALL);

   $strQuery = "Select * From City order by CityCode; ";
   $result = open_RS($strQuery);

?>

        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="card">
            <div class="card-body wizard-content">
              <h4 class="card-title"></h4>
              <h6 class="card-subtitle"></h6>
              <form role="form" id="myform" class="was-validated">
              <div class="box-body">

              <div class="row">
                      <input type="hidden" id="hdn_primary" name="hdn_primary" value="" >
                      <div class="col-sm-12">
                          <input type="button" class="btn btn-primary" id="btnSave" value="Save" />
                          <input type="button" class="btn btn-danger float-end" data-bs-dismiss="modal" value="Back to Home" onClick="document.location.href='setup_city.php'" />
                      </div>
                  </div>
              </div>    
              <hr />

                <input type="hidden" id="hdn_primary" name="hdn_primary" value="" >
      			    <input type="hidden" id="strTitle" name="strTitle" placeholder="Title" class="form-control" >
      			    <input type="hidden" id="strMode" name="strMode" placeholder="Mode" class="form-control">

               <div class="row">
                  <!-- style='text-transform:uppercase' -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="f1-last-name">City Name</label>
                      <input type="text" id="txtName" name="txtName" placeholder="City Name" class="f1-last-name form-control" required>
                      <div class="valid-feedback"></div>
                      <div class="invalid-feedback">Please enter City Name.</div>
                    </div>

                    <div class="form-group">
                      <label for="f1-last-name">City</label>
                      <select id="drpCity" name="drpCity" class="form-select" aria-label="City" required>
                          <!-- <option value="-1" seleted="selected">Please select</option> -->
                          <?php echo get_dropdown('City', 'CityCode', 'Name'); ?>
                      </select>
                      <div class="valid-feedback"></div>
                      <div class="invalid-feedback">Please select City Name.</div>
                    </div>

                  </div>

                  <div class="col-md-2">


                  </div>

               </div> 

              </div>
              <!-- /.box-body -->
            </form>

            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->


        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

    <script type="text/javascript">
        $(document).ready(function () {
            
            $('#myform')[0].reset(); //reset form on modals
            $('#hdn_primary').val("ali kkaamamak");
  		  
  		      $('#strTitle').val('City');
  		      $('#strMode').val('Add New');

            $("#btnSave").prop("class", "btn btn-primary");
            $("#btnSave").html('Save1');          


        });
    </script>

        <style type="text/css">
        hr {
          -moz-border-bottom-colors: none;
          -moz-border-image: none;
          -moz-border-left-colors: none;
          -moz-border-right-colors: none;
          -moz-border-top-colors: none;
          border-color: #EEEEEE -moz-use-text-color #FFFFFF;
          border-style: solid none;
          border-width: 1px 0;
          margin: 18px 0;
        }
    </style>

<?php include "footer.php"; ?>