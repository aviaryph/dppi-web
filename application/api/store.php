<?php
include '../../system/config.php';
header('Access-Control-Allow-Origin: *');

if(isset($_GET['loadTable'])){

    $xid = $_GET['loadTable'];
    $value = custom_query("SELECT * FROM tbl_store WHERE status!='Deleted' ORDER BY storeNo DESC");
    if($value->rowCount()>0) {
        while ($r = $value->fetch(PDO::FETCH_ASSOC)) {
            $r['Actions']=$r['storeNo']; 
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
    $value = custom_query("SELECT * FROM tbl_store WHERE storeNo='$xid' ORDER BY storeNo DESC");
    if($value->rowCount()>0) {
        while ($r = $value->fetch(PDO::FETCH_ASSOC)) {
            $data = $r;
        } 
        echo json_encode($data);
    }
}


if(isset($_POST['create'])){


    if(isExists('tbl_store', $where = array("storeNo"=>$_POST['storeNo'])) == 1){
        $msg = array(
            "Message"=>"This store number already exists",
            "title"=>"Warning"
        );
    }
    else{
        $data = array(
            "storeNo"=>$_POST['storeNo'],
            "chain"=>$_POST['chain'],
            "branch"=>$_POST['branch'],
            "office"=>$_POST['office']
        );
        $insert = db_insert('tbl_store', $data);

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

    }


     echo json_encode($msg);
}

if(isset($_POST['update'])){
    $data = array( 
        "chain"=>$_POST['chain'],
        "branch"=>$_POST['branch'],
        "office"=>$_POST['office']
    );

    $insert = db_update('tbl_store', $data, $where = array("storeNo"=>$_POST['storeNo']));
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
        "storeNo"=>$_POST['storeNo']
    );
    $delete = db_update('tbl_store', $data, $where);
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