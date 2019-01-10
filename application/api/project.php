<?php
include '../../system/config.php';
header('Access-Control-Allow-Origin: *');

if(isset($_GET['loadTable'])){
    $xid = $_GET['loadTable'];
    $value = custom_query("SELECT * FROM tbl_project WHERE status!='Deleted' ORDER BY id DESC");
    if($value->rowCount()>0) {
        while ($r = $value->fetch(PDO::FETCH_ASSOC)) {
            $r['Actions']=$r['id']; 
            $r['dateCovered']=$r['wave'].'<br/>'.$r['date_covered_from'].' - '.$r['date_covered_to']; 
            $data[] = $r;
        }
        $result = [
            "sEcho" => 0,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data,
            "Error"=> "No Record Found"
        ];
    } else {
        $result = [
            "sEcho" => 0,
            "iTotalRecords" => "0",
            "iTotalDisplayRecords" => "0",
            "Error"=> "No Record Found"
        ];
    }
    echo json_encode($result);
}

if(isset($_GET['record'])){
    $data = array();
    $xid = $_GET['record'];
    $value = custom_query("SELECT * FROM tbl_project WHERE id='$xid' ORDER BY id DESC");
    if($value->rowCount()>0) {
        while ($r = $value->fetch(PDO::FETCH_ASSOC)) {
            $data = $r;
        }
        echo json_encode($data);
    }
}
 //`notes`, `status

 
if(isset($_POST['create']) || isset($_POST['update'])){ 
    $dtFrom = new DateTime($_POST['date_covered_from']); 
$dtTo = new DateTime($_POST['date_covered_to']); 
  $noDays = '1';//$dtFrom->diff($dtTo); 
    $projectNo='1';
 $data = array( 
        "projectNo"=>$projectNo, 
        "projectName"=>$_POST['projectName'],
        "projectType"=>$_POST['projectType'],
        "manpowerType"=>$_POST['manpowerType'], 
        "teamleader"=>$_POST['teamleader'], 
        "rovingTeamleader"=>$_POST['rovingTeamleader'], 
        "numberOfStores"=>$_POST['numberOfStores'], 
        "runDate"=>$_POST['runDate'], 
        "date_covered_from"=>$_POST['date_covered_from'], 
        "date_covered_to"=>$_POST['date_covered_to'], 
        "wave"=>$_POST['wave'], 
        "noDays"=>$noDays,  
        "created_at"=>date('Y-m-d h:i:s')
    );
}

if(isset($_POST['create'])){
    $insert = db_insert('tbl_project', $data);
    if($insert){
        $msg = array(
            "Message"=>"Record Successfully Added",
            "title"=>"Success"
        );
    }
    else{
        $msg = array(
            "Message"=>"There was an error in your action",
            "title"=>"Error"
        );
    }
    echo json_encode($msg);
}

if(isset($_POST['update'])){
    $update = db_update('tbl_project', $data, $where = array("id"=>$_POST['id']));
    if($update){
        $msg = array(
            "Message"=>"Record Successfully Updated",
            "title"=>"Success"
        );
    }
    else{
        $msg = array(
            "Message"=>"There was an error in your action",
            "title"=>"Error"
        );
    }
    echo json_encode($msg);
}

if(isset($_POST['delete'])){
    $data = array(
        "status"=>"Deleted"
    );
    $where = array(
        "id"=>$_POST['id']
    );
    $delete = db_update('tbl_project', $data, $where);
    if($delete){
        $msg = array(
            "Message"=>"Record Successfully Deleted",
            "title"=>"Success"
        );
    }
    else{
        $msg = array(
            "Message"=>"There was an error in your action",
            "title"=>"Error"
        );
    }
    echo json_encode($msg);
}