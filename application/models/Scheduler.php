<?php defined('BASEPATH') OR exit('No direct script access allowed');

//------------------------------------------------------------------
// Verifys Users - Inserts Users - Gets Session ID
//------------------------------------------------------------------

class Scheduler extends CI_Model{


public function create(){
  $scheduleObj = $this->getAllRequest();
  $this->sortSchedule($scheduleObj);
  return $this->getSchedule();
}


  public function getAllRequest(){
    $this->db->select('*');
    $this->db->from('requests');
    $this->db->where('status','pending');
    $query=$this->db->get();
    return $query;
  }



public function sortSchedule($obj){
  print_r($obj->result_array());
  echo "<br/>";
  $startTime = '08:00';
  $count=0;
  $new_time = strtotime($startTime);
    foreach ($obj->result_array() as $row){

      $seconds2add =0;
        if($row['timeOfDay'] == 'Morning'){

          if($row['service'] == 1){
            $seconds2add = 1800;}

          if($row['service'] == 2){
            $seconds2add = 1800;}

          if($row['service'] == 3){
            $seconds2add = 1800;}

          $new_time+=$seconds2add;

          echo '<br/>';
          echo 'new time: ';
          echo date('h:i',$new_time);
          echo '<br/>';

          $dataTime = date('h:i',$new_time);

          if($count == 1){
          $dataTim = date('h:i',$startTime);}
          else{
              $dataTim = '08:00';
}
          $this->addToScheduler($row['userID'],$row['bookingDate'], $row['service'],$dataTim, $dataTime);

          $startTime =+ $new_time;
$count++;
        }















      }
}


public function addToScheduler($userID,$bookingDate, $service,$startTime, $endTime){
  $data = array(
    'userID'=>$userID,
    'bookingDate'=>$bookingDate,
    'service'=>$service,
    'startTime'=>$startTime,
    'endTime'	=>$endTime,
    'status'=> 'sechduling'     );
  return $this->db->insert('Schedule',$data);
  }

public function getSchedule(){
  $this->db->select('*');
  $this->db->from('schedule');
  $this->db->order_by('startTime', 'asc');
  $this->db->where('status','sechduling');
  $this->db->where('bookingDate','2022-03-16');
  $query=$this->db->get();
  return $query;
}


} // End of CI_Model
