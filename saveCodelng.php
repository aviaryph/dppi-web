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