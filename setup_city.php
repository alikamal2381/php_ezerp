<?php
   $PageTitle = "City Setup"; 
	 include "inc/includer.php"; 
	 include "emp_ck.php";
	 include "header.php"; 
  
   error_reporting(E_ALL);

   $strQuery = "Select * From City order by CityCode; ";
   $result = open_RS($strQuery);
   //btnConfirmDelete

  if (isset($_POST['btnSave']) && empty($_POST['btnSave'])) {
      
      
      if ($_POST['strMode'] == "Add New") {
        echo "Insert query";
      }
      else {
        echo "Update query";
      }

      echo "<pre>"; 
      print_r($_POST);
      echo "</pre>";  

  }
  else {
    //echo "No Submit button click";
  }

  /*
  //Delete confirm
  if (isset($_POST['btnConfirmDelete']) && empty($_POST['btnConfirmDelete'])) {
    echo "<pre>"; 
    print_r($_POST);
    echo "</pre>"; 
    echo "Delete query";
  }
*/

	/// ************ EDIT MODE ********************
	/// get Fill_Editing_Fields for update
	if(isset($_POST['id']) && isset($_POST['id']) != "")
	{   
      echo "ali " . $_POST['id'];

		  $citycode = $_POST['id'];

	  	$json = array( );

      $strQuery = "Select * From city Where citycode = '$citycode'; ";
      $stm = $link->query($strQuery);
      $result = $stm->fetchAll();

      echo "<pre>"; 
      print_r($result);
      echo "</pre>"; 
      die();

        //$nResult = mysqli_query($link, $strQuery);
      /*
        while( $row = mysqli_fetch_assoc( $nResult ) ) {
            $json[] = $row;
        }
      */

  		echo json_encode( $result );
	}



	/// ************ DELETE ********************
	/// Delete record
	if(isset($_POST['confirm_delete_id']) && isset($_POST['confirm_delete_id']) != "")
	{
		echo $cityid = $_POST['confirm_delete_id'];

	     //$strQuery = "Delete From city Where citycode = '$cityid'; ";
       $pdo->prepare("DELETE FROM city WHERE citycode=?")->execute([$cityid]);

	     //$nResult = mysqli_query($link, $strQuery);

       //$pdo->prepare("DELETE FROM city WHERE citycode=?")->execute([$cityid]);
	}

 ?>

        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ==============================================================  -->
          <!-- onClick="document.location.href='setup_city_add.php'" -->
          <!-- data-bs-target="#modal-primary" data-bs-toggle="modal" --> 
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">
                    <button type="button" id="btnAdd" class="btn btn-primary" onclick="Add_New()">Add New</button>
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
                      <th>City Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                        <tbody>
                          <?php  
                              for($i=0; $i < count($result); ++$i) {

                                $edit_btn = "<button class='btn btn-warning' id=".$result[$i]['CityCode']." onclick='Fill_Editing_Field(". $result[$i]['CityCode'] .")' ><i class='bi bi-exclamation-triangle'></i>Edit</button> ";

                                $del_btn = "<button class='btn btn-danger' id=".$result[$i]['CityCode']." onclick='confirm_delete(". $result[$i]['CityCode'] .")' ><i class='bi bi-exclamation-octagon'></i>Delete</button>"; 

                                $PrimaryField = str_pad($result[$i]['CityCode'], 4, '0', STR_PAD_LEFT);

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
          <h5 class="modal-title">Add New City</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <!-- form start action="#" method="POST" onsubmit="return save();" -->
            <form role="form" id="myform" class="was-validated" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <div class="box-body">
                <input type="hidden" id="hdn_primary" name="hdn_primary" value="" >
      			    <input type="hidden" id="strTitle" name="strTitle" placeholder="Title" class="form-control" >
      			    <input type="hidden" id="strMode" name="strMode" placeholder="Mode" class="form-control">

               <div class="row">
                  <!-- style='text-transform:uppercase' -->
                  <div class="col-md-10">
                    <div class="form-group">
                      <label for="f1-last-name">City Name</label>
                      <input type="text" id="txtName" name="txtName" placeholder="City Name" class="f1-last-name form-control" required>
                      <div class="valid-feedback"></div>
                      <div class="invalid-feedback">Please enter City Name.</div>
                    </div>
                    
                    <!--
                    <div class="form-group">
                      <label for="f1-last-name">City</label>
                      <select id="drpCity" name="drpCity" class="form-select" aria-label="City" required>
                          <?php //echo get_dropdown('City', 'CityCode', 'Name'); ?>
                      </select>
                      <div class="valid-feedback"></div>
                      <div class="invalid-feedback">Please select City Name.</div>
                    </div>
                    -->

                  </div>

                  <div class="col-md-2">


                  </div>

               </div> 

              </div>
              <!-- /.box-body -->
            
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="btnSave" name="btnSave">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>

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
              <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
              <div class="modal-body">
                  <div id="Div_Confirm_Delete"></div>
                  Are you sure to want to delete? <br /><br />
                  City Id: <label id="lblId"></label>
              </div>

              <div class="modal-footer">
                  <button type="submit" ID="btnConfirmDelete" class="btn btn-primary">Confirm</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              </div>
              </form>
          </div>
      </div>
  </div>

  <script type="text/javascript">
     $(document).ready(function(){

    });  //document.onready()

        //Add/Edit Modal Form Save click event
        $("#btnSave").click(function(){
            save();
        });

        //Delete confirmation click event
        $("#btnConfirmDelete").click(function(){
            confirm_delete_id = $("#lblId").html();
            $('#strTitle').val('City');
            $('#strMode').val('Delete');

            $.post("setup_city.php", {
                      confirm_delete_id: confirm_delete_id
                    }, function(data, status){
                        //alert($('#strTitle').val());
                        location.reload();
                    }
                  );

                  $('#confirm-delete').modal('hide');
                  $('.modal-title').text('Delete City Info'); // Set Title to Bootstrap modal title
        });

        //Save function (for add / update)
        function save()
        { 

            //$("myform").validate();

            //ajax adding data to database
            $.ajax({
              url : "setup_city.php",
              type: "POST",
              //dataType: "json",
              data: {
						            strTitle: $("#strTitle").val(),
						            strMode: $("#strMode").val(),
                        hdn_primary: $("#hdn_primary").val(),
                        city_name: $("#txtName").val(),
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

   function Add_New() {
        //$('#myform').removeClass('was-validated')
        
        var maxfld = <?php echo getmaxId('city','citycode'); ?>

        $('#myform')[0].reset(); //reset form on modals
        $('#hdn_primary').val(maxfld);
    
        $('#strTitle').val('City');
        $('#strMode').val('Add New');

        $("#btnSave").prop("class", "btn btn-primary");
        $("#btnSave").html('Save');

        $('#modal-primary').modal('show');
        $('.modal-title').text('Add New City Info'); // Set Title to Bootstrap modal title  
   }

  function Fill_Editing_Field(id) {
    alert('you click ' + id);

    $('#hdn_primary').val(id);
    $('#strTitle').val('City');
    $('#strMode').val('Edit');

    $("#btnSave").prop("class", "btn btn-warning");
    $("#btnSave").html('Update');

    $.post("setup_city.php", {
              id: id
            }, function(data, status){
                //console.log(data);

                console.log(user[0].city_name);

                $('#txtName').val(user[0].city_name);
            }, "json");

          $('#modal-primary').modal('show');
          $('.modal-title').text('Edit City Info'); // Set Title to Bootstrap modal title
  }


  function confirm_delete(delete_id) {
    $('#hdn_primary').val(delete_id);
    $('#strTitle').val('City');
    $('#strMode').val('Delete');

    $('#lblId').html(delete_id);

    $('#confirm-delete').modal('show');
    $('.modal-title').text('Delete City Info'); // Set Title to Bootstrap modal title
  }    


</script>

<?php include "footer.php"; ?>