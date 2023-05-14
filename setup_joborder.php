<?php
   $PageTitle = "Job Order Setup"; 
	 include "inc/includer.php"; 
	 include "emp_ck.php";
	 include "header.php"; 
  
   error_reporting(E_ALL);

   $strQuery = "Select * From Job_Order order by Job OrderCode; ";
   //$result = open_RS($strQuery);

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
                    <button type="button" id="btnAdd" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-primary">Add New</button>
                    <!-- 
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||Sample Buttons
                    <button type="submit" class="btn btn-success text-white">
                      Save
                    </button>
                    <button type="submit" class="btn btn-primary">Reset</button>
                    <button type="submit" class="btn btn-info">Edit</button>
                    <button type="submit" class="btn btn-danger text-white">
                      Cancel
                    </button>
                    || -->
                  </h5>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                    <thead>
                    <tr>
                      <th>Code</th>
                      <th>Job Order Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                        <tbody>
                          <?php  
                              for($i=0; $i < count($result); ++$i) {

                                $edit_btn = "<button class='btn btn-warning' id=".$result[$i]['Job OrderCode']." onclick='Fill_Editing_Field(". $result[$i]['Job OrderCode'] .")' ><i class='bi bi-exclamation-triangle'></i>Edit</button> ";

                                $del_btn = "<button class='btn btn-danger' id=".$result[$i]['Job OrderCode']." onclick='confirm_delete(". $result[$i]['Job OrderCode'] .")' ><i class='bi bi-exclamation-octagon'></i>Delete</button>"; 

                                $PrimaryField = str_pad($result[$i]['Job OrderCode'], 4, '0', STR_PAD_LEFT);

                                if ($i % 2 == 0) 
                                  //$strBgcolor='bgcolor=#3c8dbc';
                                  $strBgcolor="";
                                else
                                  $strBgcolor = "";

                                echo "<tr $strBgcolor>\n\r"; 
                                    echo "<td>\n\r"; 
                                        echo $PrimaryField;
                                    echo "</td>\n\r"; 
                                    echo "<td>\n\r"; 
                                        echo $result[$i]['Name'];
                                    echo "</td>\n\r"; 
                                    echo "<td>\n\r"; 
                                        echo $result[$i]['Status'];
                                    echo "</td>\n\r"; 
                                    echo "<td>\n\r"; 
                                        echo $edit_btn;
                                        echo $del_btn;
                                    echo "</td>\n\r"; 
                                echo "</tr>\n\r";                           

                            ?>  
                            <?php  
                                }
                            ?>
                        </tbody>                    
                    </table>
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
          <h5 class="modal-title">Add New Job Order</h5>
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
                      <label for="f1-last-name">Job Order Name</label>
                      <input type="text" id="txtName" name="txtName" placeholder="Job Order Name" class="f1-last-name form-control" required>
                      <div class="valid-feedback"></div>
                      <div class="invalid-feedback">Please enter Job Order Name.</div>
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
                  Job Order Id: <label id="lblId"></label>
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
  		  
  		      $('#strTitle').val('Job Order');
  		      $('#strMode').val('Add New');

            $("#btnSave").prop("class", "btn btn-primary");
            $("#btnSave").html('Save');

  		      $('#modal-primary').modal('show');
            $('.modal-title').text('Add New Job Order Info'); // Set Title to Bootstrap modal title  
          });


        //Add/Edit Modal Form Save click event
        $("#btnSave").click(function(){
            save();
        });

        //Delete confirmation click event
        $("#btnConfirmDelete").click(function(){
            confirm_delete_id = $("#lblId").html();
            $('#strTitle').val('Job Order');
            $('#strMode').val('Delete');

            $.post("Job Order_ed.php", {
                      confirm_delete_id: confirm_delete_id
                    }, function(data, status){
                        //alert($('#strTitle').val());
                        location.reload();
                    }
                  );

                  $('#confirm-delete').modal('hide');
                  $('.modal-title').text('Delete Job Order Info'); // Set Title to Bootstrap modal title
        });

        //Save function (for add / update)
        function save()
        { 
            //ajax adding data to database
            $.ajax({
              url : "Job Order_add.php",
              type: "POST",
              //dataType: "json",
              data: {
						            strTitle: $("#strTitle").val(),
						            strMode: $("#strMode").val(),
                        hdn_primary: $("#hdn_primary").val(),
                        Job Order_name: $("#Job Order_name").val(),
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
    $('#strTitle').val('Job Order');
    $('#strMode').val('Edit');

    $("#btnSave").prop("class", "btn btn-warning");
    $("#btnSave").html('Update');

    $.post("Job Order_ed.php", {
              id: id
            }, function(data, status){
                //console.log(data);
                var user = JSON.parse(data);

                $('#Job Order_name').val(user[0].Job Order_name);
                $('#address').val(user[0].address);
            }
          );

          $('#modal-primary').modal('show');
          $('.modal-title').text('Edit Job Order Info'); // Set Title to Bootstrap modal title
  }


  function confirm_delete(delete_id) {
    $('#hdn_primary').val(delete_id);
    $('#strTitle').val('Job Order');
    $('#strMode').val('Delete');

    $('#lblId').html(delete_id);

    $('#confirm-delete').modal('show');
    $('.modal-title').text('Delete Job Order Info'); // Set Title to Bootstrap modal title
  }    


</script>

<?php include "footer.php"; ?>