<?php
   $PageTitle = "Change Logon Password"; 
	 include "inc/includer.php"; 
	 include "emp_ck.php";
	 include "header.php"; 
  
   error_reporting(E_ALL);

   $strQuery = "Select * From Market order by MarketCode; ";
   $result = open_RS($strQuery);

 ?>

        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">
                  </h5>

                  <div class="table-responsive1">
                      <form role="form" id="myform" class="was-validated1">
                          <div class="box-body1">
                            <input type="hidden" id="hdn_primary" name="hdn_primary" value="" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="f1-last-name">User Name</label>
                                      <input type="text" id="txtName" name="txtName" placeholder="User Name" class="f1-last-name form-control" disabled>
                                      <div class="valid-feedback"></div>
                                      <div class="invalid-feedback">Please enter User Name.</div>
                                    </div>

                                    <div class="form-group">
                                      <label for="f1-last-name">Current Password</label>
                                      <input type="text" id="txtName" name="txtName" placeholder="Current Password" class="f1-last-name form-control" required>
                                      <div class="valid-feedback"></div>
                                      <div class="invalid-feedback">Please enter Current Password.</div>
                                    </div>

                                    <div class="form-group">
                                      <label for="f1-last-name">New Password</label>
                                      <input type="text" id="txtName" name="txtName" placeholder="New Password" class="f1-last-name form-control" required>
                                      <div class="valid-feedback"></div>
                                      <div class="invalid-feedback">Please enter New Password.</div>
                                    </div>

                                    <div class="form-group">
                                      <label for="f1-last-name">Confirm Password</label>
                                      <input type="text" id="txtName" name="txtName" placeholder="Confirm Password" class="f1-last-name form-control" required>
                                      <div class="valid-feedback"></div>
                                      <div class="invalid-feedback">Please enter Confirm Password.</div>
                                    </div>

                                </div>

                            </div> 

                          </div>
                          <!-- /.box-body -->

                          <div class="modal-footer1">
                            <button type="submit" class="btn btn-primary" id="btnSave">Update Logon Password</button>
                          </div>                          

                       </form>

                  </div>

                </div>
              </div>
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

 <!-- .modal -->
 <div class="modal mode-primary fade" id="modal-primary" role="dialog" tabindex="-1" aria-labelledby="modal-primaryLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Market</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <!-- form start action="#" method="POST" onsubmit="return save();" -->
            <form role="form" id="myform" class="was-validated">
              <div class="box-body">
                <input type="text" id="hdn_primary" name="hdn_primary" value="" >

      			    <input type="text" id="strTitle" name="strTitle" placeholder="Title" class="form-control">
      			    <input type="text" id="strMode" name="strMode" placeholder="Mode" class="form-control">

               <div class="row">
                  <!-- style='text-transform:uppercase' -->
                  <div class="col-md-10">
                    <div class="form-group">
                      <label for="f1-last-name">Market Name</label>
                      <input type="text" id="txtName" name="txtName" placeholder="Market Name" class="f1-last-name form-control" required>
                      <div class="valid-feedback"></div>
                      <div class="invalid-feedback">Please enter Market Name.</div>
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
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="btnSave">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal Confirm Delete -->
  <div class="modal fade" id="confirm-delete" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title"><i class="fa fa-fw fa-question-circle"></i>&nbsp;Confirm</h4>
              </div>
              <div class="modal-body">
                  <div id="Div_Confirm_Delete"></div>
                  Are you sure to want to delete? <br /><br />
                  Market Id: <label id="lblId"></label>
              </div>

              <div class="modal-footer">
                  <button ID="btnConfirmDelete" class="btn btn-primary">Confirm</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
  </div>

  <script type="text/javascript">
     $(document).ready(function(){
          //btnAdd Click >>>
          $("#btnAdd").click(function(){
  		      $('#myform')[0].reset(); //reset form on modals
            $('#hdn_primary').val('9999999');
  		  
  		      $('#strTitle').val('Market');
  		      $('#strMode').val('Add New');

            $("#btnSave").prop("class", "btn btn-primary");
            $("#btnSave").html('Save');

  		      $('#modal-primary').modal('show');
            $('.modal-title').text('Add New Market Info'); // Set Title to Bootstrap modal title  
          });


        //Add/Edit Modal Form Save click event
        $("#btnSave").click(function(){
            save();
        });

        //Delete confirmation click event
        $("#btnConfirmDelete").click(function(){
            confirm_delete_id = $("#lblId").html();
            $('#strTitle').val('Market');
            $('#strMode').val('Delete');

            $.post("Market_ed.php", {
                      confirm_delete_id: confirm_delete_id
                    }, function(data, status){
                        //alert($('#strTitle').val());
                        location.reload();
                    }
                  );

                  $('#confirm-delete').modal('hide');
                  $('.modal-title').text('Delete Market Info'); // Set Title to Bootstrap modal title
        });

        //Save function (for add / update)
        function save()
        { 
            //ajax adding data to database
            $.ajax({
              url : "Market_add.php",
              type: "POST",
              //dataType: "json",
              data: {
						            strTitle: $("#strTitle").val(),
						            strMode: $("#strMode").val(),
                        hdn_primary: $("#hdn_primary").val(),
                        Market_name: $("#Market_name").val(),
                        address: $("#address").val()
                    },
              cache: false,
              success: function(data, status)
              {

                //console.log(data);

                 //if success close modal and reload ajax table
                 $('#modal-primary').modal('hide');
                 location.reload();// for reload a page
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error adding / update data');
              }
          });
        }

   });  //document.onready()

  function Fill_Editing_Field(id) {
    $('#hdn_primary').val(id);
    $('#strTitle').val('Market');
    $('#strMode').val('Edit');

    $("#btnSave").prop("class", "btn btn-warning");
    $("#btnSave").html('Update');

    $.post("Market_ed.php", {
              id: id
            }, function(data, status){
                //console.log(data);
                var user = JSON.parse(data);

                $('#Market_name').val(user[0].Market_name);
                $('#address').val(user[0].address);
            }
          );

          $('#modal-primary').modal('show');
          $('.modal-title').text('Edit Market Info'); // Set Title to Bootstrap modal title
  }


  function confirm_delete(delete_id) {
    $('#hdn_primary').val(delete_id);
    $('#strTitle').val('Market');
    $('#strMode').val('Delete');

    $('#lblId').html(delete_id);

    $('#confirm-delete').modal('show');
    $('.modal-title').text('Delete Market Info'); // Set Title to Bootstrap modal title
  }    


</script>

<?php include "footer.php"; ?>