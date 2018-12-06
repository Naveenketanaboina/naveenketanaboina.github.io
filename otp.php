<?php
include("inc/head_element.php");
?>
<script>$(document).ready(function(){
            $('#myModal').modal('show')
        });</script>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Email Verification</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="otp.php" method="POST">
                <div class="input-group">
                    <label for="otp"><b>OTP:</b></label>
                    <input type="text" placeholder="xxxx" class="form-control mx-2" id="otp">
                </div>
                <button class="btn btn-primary mt-2">submit</button>
            </form>
        </div>
        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> -->
        
      </div>
    </div>
  </div>