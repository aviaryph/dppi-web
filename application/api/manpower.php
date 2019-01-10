<?php
include '../../system/config.php';
header('Access-Control-Allow-Origin: *');

if(isset($_GET['loadTable'])){
    $xid = $_GET['loadTable'];
    $value = custom_query("SELECT * FROM tbl_manpower WHERE status!='Deleted' ORDER BY id DESC");
    if($value->rowCount()>0) {
        while ($r = $value->fetch(PDO::FETCH_ASSOC)) {
            $r['Actions']=$r['id'];
            $r['name'] = $r['firstname'] . " " . $r['lastname'];
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
    $value = custom_query("SELECT * FROM tbl_manpower WHERE id='$xid' ORDER BY id DESC");
    if($value->rowCount()>0) {
        while ($r = $value->fetch(PDO::FETCH_ASSOC)) {
            $data = $r;
        }
        echo json_encode($data);
    }
}

if(isset($_POST['create']) || isset($_POST['update'])){ 
// if(isset($_POST['create']){
//      $manpowerNo=(db_count_all('tbl_manpower')+1);  
//  $manpowerNo=$_SESSION['company'].'-'.$manpowerNo ; 
// }else{
//         "manpowerNo"=>$_POST['manpowerNo'],
// }


 $data = array(
        "manpowerNo"=>$manpowerNo,
        "manpowerId"=>$_POST['manpowerId'],
        "manpowerType"=>$_POST['manpowerType'],
        "classification"=>$_POST['classification'], 

        "username"=>$_POST['username'],
        "password"=>password_hash($_POST['password'], PASSWORD_DEFAULT),
        "firstname"=>$_POST['firstname'],
        "lastname"=>$_POST['lastname'],
        "middlename"=>$_POST['middlename'],
        "address"=>utf8_encode($_POST['address']), 
          "extension"=>$_POST['extension'],
        "age"=>$_POST['age'],
        "gender"=>$_POST['gender'],
        "birthday"=>$_POST['birthday'],
        "civilStatus"=>$_POST['civilStatus'],
         "religion"=>$_POST['religion'],
         "nationality"=>$_POST['nationality'],
        "birthdayPlace"=>$_POST['birthdayPlace'],
        "provincialAdress"=>$_POST['provincialAdress'],
         "telephoneNo"=>$_POST['telephoneNo'],
        "mobileNo"=>$_POST['mobileNo'],
         "email"=>$_POST['email'],
        "facebookName"=>$_POST['facebookName'],
        "height"=>$_POST['height'],
        "weight"=>$_POST['weight'],
        "complex"=>$_POST['complex'],
        "fatherName"=>$_POST['fatherName'],
        "fatherOccupation"=>$_POST['fatherOccupation'],
        "fatherContact"=>$_POST['fatherContact'],
        "motherName"=>$_POST['motherName'],
        "motherOccupation"=>$_POST['motherOccupation'],
        "motherContact"=>$_POST['motherContact'],
        "spouseContact"=>$_POST['spouseContact'],
        "spouseName"=>$_POST['spouseName'],
        "spouseOccumation"=>$_POST['spouseOccumation'], 
        "numberChild"=>$_POST['numberChild'],
        "highestAttainment"=>$_POST['highestAttainment'],
        "sssId"=>$_POST['sssId'],
        "pagibigId"=>$_POST['pagibigId'],
        "philhealthId"=>$_POST['philhealthId'],
        "tinId"=>$_POST['tinId'],
        "mayorOccupationPermitExpirationDate"=>$_POST['mayorOccupationPermitExpirationDate'],
        "healthCardExpirationDate"=>$_POST['healthCardExpirationDate'],
        "medicalCertificateExpirationDate"=>$_POST['medicalCertificateExpirationDate'],
        "drugsTestExpirationDate"=>$_POST['drugsTestExpirationDate'],
        "incaseEmergencyName"=>$_POST['incaseEmergencyName'],
        "incaseEmergencyAddress"=>$_POST['incaseEmergencyAddress'],
        "incaseEmergencyContact"=>$_POST['incaseEmergencyContact'],
        // "image"=>$_POST['image'],
        "dateHired"=>$_POST['dateHired'],
        "created_at"=>date('Y-m-d h:i:s')
    );
}

if(isset($_POST['create'])){
    $insert = db_insert('tbl_manpower', $data);
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
    $update = db_update('tbl_manpower', $data, $where = array("id"=>$_POST['id']));
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
    $delete = db_update('tbl_manpower', $data, $where);
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