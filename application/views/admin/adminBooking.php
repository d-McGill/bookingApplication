<?php defined('BASEPATH') or exit('No direct script access allowed');?>

<div class="conatainer shadow-lg mb-5 bg-body rounded largeCustomHeight">
  <div class="row">
    <div class="col-md-6 px-4 py-3 largeCustomHeight">
      <div class="row">
        <h2 class="text-center">Booking Requests</h2>
          <div class="row text-center">
          <ul class="nav nav-tabs my-2 mx-2" role="tablist">
            <li class="w-50"><a href="#pending" data-toggle="tab" class="nav-link active mx-1 my-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
              </svg>
              Pending</a>
            </li>
              <li class="w-50"><a href="#rejected" data-toggle="tab" class="nav-link mx-1 my-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-range" viewBox="0 0 16 16">
                  <path d="M9 7a1 1 0 0 1 1-1h5v2h-5a1 1 0 0 1-1-1zM1 9h4a1 1 0 0 1 0 2H1V9z"/>
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
                Rejected</a>
              </li>
              <li class="w-50"><a href="#cancelled" data-toggle="tab" class="nav-link mx-1 my-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-x" viewBox="0 0 16 16">
                  <path d="M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708z"/>
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
                Cancelled</a>
              </li>
                <li class="w-50"><a href="#scheduled" data-toggle="tab" class="nav-link mx-1 my-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                    <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                  </svg>
                  Scheduled</a>
                </li>
              </ul>
            </div>
              <div class="tab-content">
                <div class="tab-pane active py-3" id="pending">
                  <div class="table-responsive">
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Slot</th>
                        <th scope="col">Service</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                  <tbody>
                  <?php  foreach ($allBookingData->result() as $row) {?>
                    <?php if($row->status == 'pending'){ ?>
                              <tr>
                                <td><?php echo $row->bookingDate;?></td>
                                <td><?php echo $row->timeOfDay;?></td>
                                <td><?php echo $row->service;?></td>
                                <td><?php echo $row->status;?></td>
                                <td>
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal-<?php echo $row->requestID;?>">
                                    Details
                                  </button>
                                </td>
                              </tr>
                  <?php }}?>
                </tbody>
              </table>
            </div>
              </div>
              <div class="tab-pane py-3" id="rejected">
                <div class="table-responsive">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Date</th>
                      <th scope="col">Slot</th>
                      <th scope="col">Service</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                <tbody>
                <?php
                 foreach ($allBookingData->result() as $row) {?>
                  <?php if($row->status == 'rejected'){ ?>
                            <tr>
                              <td><?php echo $row->bookingDate;?></td>
                              <td><?php echo $row->timeOfDay;?></td>
                              <td><?php echo $row->service;?></td>
                              <td><?php echo $row->status;?></td>
                              <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal-<?php echo $row->requestID;?>">
                                  Details
                                </button>
                              </td>
                            </tr>
                <?php }}?>
              </tbody>
            </table>
          </div>
            </div>
            <div class="tab-pane py-3" id="cancelled">
              <div class="table-responsive">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Slot</th>
                    <th scope="col">Service</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
              <tbody>
              <?php
               foreach ($allBookingData->result() as $row) {?>
                <?php if($row->status == 'cancelled'){ ?>
                          <tr>
                            <td><?php echo $row->bookingDate;?></td>
                            <td><?php echo $row->timeOfDay;?></td>
                            <td><?php echo $row->service;?></td>
                            <td><?php echo $row->status;?></td>
                            <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal-<?php echo $row->requestID;?>">
                                Details
                              </button>
                            </td>
                          </tr>
              <?php }}?>
            </tbody>
          </table>
        </div>
          </div>
          <div class="tab-pane py-3" id="scheduled">
            <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Slot</th>
                  <th scope="col">Service</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
            <tbody>
            <?php
             foreach ($allBookingData->result() as $row) {?>
              <?php if($row->status == 'scheduled'){ ?>
                        <tr>
                          <td><?php echo $row->bookingDate;?></td>
                          <td><?php echo $row->timeOfDay;?></td>
                          <td><?php echo $row->service;?></td>
                          <td><?php echo $row->status;?></td>
                          <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal-<?php echo $row->requestID;?>">
                              Details
                            </button>
                          </td>
                        </tr>
            <?php }}?>
          </tbody>
        </table>
      </div>
        </div>
              </div>
              <?php foreach ($allBookingData->result() as $row) {?>
          <!-- Modal -->
          <div class="modal fade" id="Modal-<?php echo $row->requestID;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Request Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h4>Appointment</h4>
                  <ul class="modalInfo">
                    <li><strong>Service:</strong>  <?php echo $row->service;?></li>
                    <li><strong>Slot:</strong>  <?php echo $row->timeOfDay?></li>
                    <li><strong>Date:</strong>  <?php echo $row->bookingDate;?></li>
                    <li><strong>Request ID:</strong>  <?php echo $row->requestID;?></li>
                  </ul>
                  <hr/>
                  <h4>Customer</h4>
                  <ul class="modalInfo">
                    <li><strong>Name:</strong> <?php echo $row->name;?></li>
                    <li><strong>Email:</strong>  <?php echo $row->email?></li>
                    <li><strong>Address: </strong> <?php echo $row->address;?></li>
                    <li><strong>Postcode:</strong>  <?php echo $row->postcode;?></li>
                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <form method="post" action=<?php echo site_url('Booking_Controller/cancelAppointment')?>>
                      <input value="<?php echo $row->requestID?>" name="requestID" style="display:none;">
                      <button type="submit" class="btn btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-x" viewBox="0 0 16 16">
                      <path d="M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708z"/>
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                    </svg>
                    Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
    <div class="col-md-6 px-3 py-3" style="background-color:#eee;">
        <h2 class="text-center">Generate Schedule</h2>
        <div class="row">
    <ul class="nav nav-tabs my-2 mx-2 " role="tablist">
      <li class="w-50 text-center"><a href="#create" data-toggle="tab" class="nav-link active mx-1 my-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-plus" viewBox="0 0 16 16">
          <path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
          <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
        </svg>
        Generate</a></li>
      <li class="w-50 text-center"><a href="#view" data-toggle="tab" class="nav-link mx-1 my-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
        </svg>
        View</a></li>
    </ul>
  </div>
    <div class="tab-content">
      <div class="tab-pane active py-3" id="create">
        <form method="post" action=<?php echo site_url('schedule')?>>
              <select class="selectpicker w-100"  data-width="100%" data-dropup-auto="false" name="date" required>
                <option value="Select A Date" selected disabled>Select a date</option>
                <?php foreach($requestDates->result() as $row){?>
                  <option value="<?php echo $row->bookingDate; ?>"> <?php echo$row->bookingDate; ?></option>
                <?php }?>
              </select>
              <button type="submit" class="btn btn-primary btn-lg w-75 my-5 mx-5">Generate Schedule</button>
            </form>
          </div>
       <div class="tab-pane py-3" id="view">
             <form method="post" action=<?php echo site_url('viewschedule')?>>
               <select class="selectpicker w-100"  data-width="100%" data-dropup-auto="false" name="date">
                 <option value="Select A Date" selected disabled>Select a date</option>
                 <?php foreach($requestDates->result() as $row){?>
                   <option value="<?php echo $row->bookingDate; ?>"> <?php echo$row->bookingDate; ?></option>
                 <?php }?>
               </select>

             <button type="submit" class="btn btn-primary btn-lg w-75 mx-5 my-5">View Schedule</button>
           </form>
       </div>
   </div>
   <?php if($this->session->flashdata('susMessage')==""){}else{
     echo "<div class='alert alert-success my-5' role='alert'>";
     echo $this->session->flashdata('susMessage') ;
     echo "</div>" ;}?>
 </div>

</div>
</div>
