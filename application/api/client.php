<?php
include '../../system/config.php';
header('Access-Control-Allow-Origin: *');

if(isset($_GET['loadTable'])){

    $xid = $_GET['loadTable'];
    $value = custom_query("SELECT * FROM tbl_client WHERE status!='Deleted' ORDER BY id DESC");
    if($value->rowCount()>0) {
        while ($r = $value->fetch(PDO::FETCH_ASSOC)) {
            $r['Actions']=$r['id']; 
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
            "sEcho" => "0",
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
    $value = custom_query("SELECT * FROM tbl_client WHERE id='$xid' ORDER BY id DESC");
    if($value->rowCount()>0) {
        while ($r = $value->fetch(PDO::FETCH_ASSOC)) {
            $data = $r;
        } 
        echo json_encode($data);
    }
}

if(isset($_POST['create'])){
    $data = array(
        "storeNo"=>$_POST['storeNo'], 
        "clientName"=>$_POST['clientName'], 
        "address"=>utf8_encode($_POST['address']),
        "contact"=>$_POST['contact'],
        "tinId"=>$_POST['tinId']
    );

    $insert = db_insert('tbl_client', $data);

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
    $data = array(
       "clientName"=>$_POST['clientName'], 
        "address"=>utf8_encode($_POST['address']),
        "contact"=>$_POST['contact'],
        "tinId"=>$_POST['tinId']
    );

    $insert = db_update('tbl_client', $data, $where = array("id"=>$_POST['id']));
    if($insert){
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
    $delete = db_update('tbl_client', $data, $where);
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

?>