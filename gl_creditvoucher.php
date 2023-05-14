<?php
   $PageTitle = "Credit Voucher"; 
	 include "inc/includer.php"; 
	 include "emp_ck.php";
	 include "header.php"; 
  
   error_reporting(E_ALL);

   $strQuery = "Select * From Voucher order by Credit VoucherCode; ";
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
                    <button type="button" id="btnAdd" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-primary" onClick="document.location.href='gl_creditvoucher_add.php'" >Add New</button>
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
                      <th>Credit Voucher Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                        <tbody>
                          <?php  
                              for($i=0; $i < count($result); ++$i) {

                                $edit_btn = "<button class='btn btn-warning' id=".$result[$i]['Credit VoucherCode']." onclick='Fill_Editing_Field(". $result[$i]['Credit VoucherCode'] .")' ><i class='bi bi-exclamation-triangle'></i>Edit</button> ";

                                $del_btn = "<button class='btn btn-danger' id=".$result[$i]['Credit VoucherCode']." onclick='confirm_delete(". $result[$i]['Credit VoucherCode'] .")' ><i class='bi bi-exclamation-octagon'></i>Delete</button>"; 

                                $PrimaryField = str_pad($result[$i]['Credit VoucherCode'], 4, '0', STR_PAD_LEFT);

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
                  Credit Voucher Id: <label id="lblId"></label>
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
        /*
        //btnAdd Click >>>
        $("#btnAdd").click(function(){
          
        });
        */

        //Delete confirmation click event
        $("#btnConfirmDelete").click(function(){
            confirm_delete_id = $("#lblId").html();
            $('#strTitle').val('Credit Voucher');
            $('#strMode').val('Delete');

            $.post("Credit Voucher_ed.php", {
                      confirm_delete_id: confirm_delete_id
                    }, function(data, status){
                        //alert($('#strTitle').val());
                        location.reload();
                    }
                  );

                  $('#confirm-delete').modal('hide');
                  $('.modal-title').text('Delete Credit Voucher Info'); // Set Title to Bootstrap modal title
        });

   });  //document.onready()

  function Fill_Editing_Field(id) {
    $('#hdn_primary').val(id);
    $('#strTitle').val('Credit Voucher');
    $('#strMode').val('Edit');

    $("#btnSave").prop("class", "btn btn-warning");
    $("#btnSave").html('Update');

    $.post("Credit Voucher_ed.php", {
              id: id
            }, function(data, status){
                //console.log(data);
                var user = JSON.parse(data);

                $('#Credit Voucher_name').val(user[0].Credit Voucher_name);
                $('#address').val(user[0].address);
            }
          );

          $('#modal-primary').modal('show');
          $('.modal-title').text('Edit Credit Voucher Info'); // Set Title to Bootstrap modal title
  }

  function confirm_delete(delete_id) {
    $('#hdn_primary').val(delete_id);
    $('#strTitle').val('Credit Voucher');
    $('#strMode').val('Delete');

    $('#lblId').html(delete_id);

    $('#confirm-delete').modal('show');
    $('.modal-title').text('Delete Credit Voucher Info'); // Set Title to Bootstrap modal title
  }    

</script>

<?php include "footer.php"; ?>