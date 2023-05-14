<?php
   $PageTitle = "Add New Debit Voucher"; 
	 include "inc/includer.php"; 
	 include "emp_ck.php";
	 include "header.php"; 
	
   error_reporting(E_ALL);

	 $nSDate = date ("Y-m-d 00:00:00");	
	 $nEDate = date ("Y-m-d 23:23:59");	
	
   $strQuery = "select * from systemusers where userid = $sesEmpId";
   $stm = $link->query($strQuery);
   $result = $stm->fetchAll();
   $nManager = $result[0]["username"];

?>

        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="card">
            <div class="card-body wizard-content">
              <h4 class="card-title">Debit Voucher</h4>
              <h6 class="card-subtitle">BP/CP (Payment/Expense Voucher)</h6>
              <form id="example-form" action="#" class="mt-5">

                <div class="panel-body">
                  <div class="row">
                      <input type="hidden" id="hdn_primary" name="hdn_primary" value="" >
                      <div class="col-sm-12">
                          <input type="button" class="btn btn-primary" id="btnSave" value="Save" />
                          <input type="button" class="btn btn-danger float-end" data-bs-dismiss="modal" value="Back to Home" onClick="document.location.href='gl_debitvoucher.php'" />
                      </div>
                  </div>
                  <hr />

                  <div class="row">
                      <div class="col-sm-3">
                          <label for="f1-acc-type">Voucher No</label>
                          <select id="drpCreditHead" name="drpVNo" class="form-select" aria-label="Credit Head">
                            <option value="-1" selected>Please select</option>
                            <option value="Cash">BP</option>
                            <option value="Bank">CP</option>
                          </select>
                      </div>
                      <div class="col-sm-3">
                          <label for="f1-acc-type">Code</label>
                          <input type="text" id="vcode" name="vcode" placeholder="V Code" class="f1-last-name form-control" disabled>
                      </div>
                      <div class="col-sm-3">
                          <label for="f1-acc-type"> </label>
                      </div>

                      <div class="col-sm-3 pull-right">
                          <label for="f1-acc-type">Voucher Date</label>

                          <div class="input-group">
                            <input type="text" class="form-control mydatepicker" id="txtVoucherDate" name="txtVoucherDate" placeholder="mm/dd/yyyy" />
                            <div class="input-group-append">
                              <span class="input-group-text h-100"
                                ><i class="mdi mdi-calendar"></i
                              ></span>
                            </div>
                          </div>

                      </div>
                  </div>


                  <div class="row">
                      <div class="col-sm-9">
                          <label for="f1-acc-type">Credit Head</label>
                          <select id="drpCreditHead" name="drpCreditHead" class="form-select" aria-label="Credit Head">
                            <option value="-1" selected>Please select</option>
                            <option value="Cash">Cash</option>
                            <option value="Bank">Bank</option>
                            <option value="Wallet">Wallet</option>
                            <option value="People">People</option>
                            <option value="Other">Other</option>
                          </select>
                      </div>

                      <div class="col-sm-3 pull-right">
                          <label for="f1-acc-type">Total Amount</label>
                          <input type="text" id="txtCredit" name="txtCredit" placeholder="Credit Amount" value="660" class="f1-last-name form-control" disabled>
                      </div>
                  </div>
                  
                  <div class="row">
                      <div class="col-sm-12">
                          <label for="f1-acc-type">Narration</label>
                          <input type="text" id="txtNarration" name="txtNarration" placeholder="Narration" class="f1-last-name form-control" >
                      </div>
                  </div>

                </div>    
                <hr />

                <!-- Detail Grid -->
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-2">
                                Account Head
                              <select id="drpCreditHead" name="drpCreditHead" class="form-select" aria-label="Credit Head">
                                <option value="-1" selected>Please select</option>
                                <option value="Cash">Cash</option>
                                <option value="Bank">Bank</option>
                                <option value="Wallet">Wallet</option>
                                <option value="People">People</option>
                                <option value="Other">Other</option>
                              </select>
                            </div>
                            <div class="col-sm-3">
                                Remarks
                                 <input type="text" id="txtRemarks" name="txtRemarks" placeholder="Remarks" class="f1-remarks form-control">
                            </div>
                            <div class="col-sm-1">
                                Job No
                                <select id="drpJobNo" name="drpJobNo" class="form-select" aria-label="Job No">
                                  <option value="-1" selected>Please select</option>
                                  <option value="Cash">Cash</option>
                                  <option value="Bank">Bank</option>
                                  <option value="Wallet">Wallet</option>
                                  <option value="People">People</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                Bill No
                                <select id="drpBillNo" name="drpBillNo" class="form-select" aria-label="Job No">
                                  <option value="-1" selected>Please select</option>
                                  <option value="Cash">Cash</option>
                                  <option value="Bank">Bank</option>
                                  <option value="Wallet">Wallet</option>
                                  <option value="People">People</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                Chq No
                                 <input type="text" id="txtChqNo" name="txtChqNo" placeholder="Chq. No" class="f1-remarks form-control">
                            </div>
                            <div class="col-sm-1">
                                Chq Date
                                <input type="text" id="txtChqDate" name="txtChqDate" placeholder="Chq. No" class="f1-remarks form-control">
                            </div>
                            <div class="col-sm-1">
                                Amount
                                 <input type="text" id="txtAmount" name="txtAmount" placeholder="Amount" class="f1-remarks form-control">
                            </div>
                            <div class="col-sm-1">
                                Button
                                <input type="button" class="btn btn-primary pull-right" id="btnAdd" value="Add to Grid" />  

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">

                              <div class="form-check">
                                <input type="radio" class="form-check-input" id="customControlValidation1"
                                  name="radio-stacked" />
                                <label class="form-check-label mb-0" for="customControlValidation1">Account</label>
                              </div>
                              <div class="form-check">
                                <input type="radio" class="form-check-input" id="customControlValidation2"
                                  name="radio-stacked" />
                                <label class="form-check-label mb-0" for="customControlValidation2">Head</label>
                              </div>
                              <div class="form-check">
                                <input type="radio" class="form-check-input" id="customControlValidation3"
                                  name="radio-stacked" />
                                <label class="form-check-label mb-0" for="customControlValidation3">Employee</label>
                              </div>

                            </div>
                        </div>


                      <div class="row">
                          <div class="col-md-12">
                              <div class="table-responsive">
                                <table
                                  id="zero_config"
                                  class="table table-striped table-bordered"
                                >

                                  <thead>
                                    <tr>
                                      <th>Account Head</th>
                                      <th>Remarks</th>
                                      <th>Job No</th>
                                      <th>Bill No</th>
                                      <th>Chq No</th>
                                      <th>Chq Date</th>
                                      <th>Amount</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>Food Expense</td>
                                      <td>Eg Biryani and Cold Drink</td>
                                      <td>-</td>
                                      <td>-</td>
                                      <td>-</td>
                                      <td>-</td>
                                      <td>440</td>
                                    </tr>
                                    <tr>
                                      <td>Petrol Expense</td>
                                      <td>Petrol Allowance</td>
                                      <td>-</td>
                                      <td>-</td>
                                      <td>-</td>
                                      <td>-</td>
                                      <td>220</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                      </div>


                    </div>
                  </div>
                </div>      


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
            $(".datepicker").datepicker({ format: 'dd/mm/yyyy', autoclose: true, todayBtn: 'linked' })
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