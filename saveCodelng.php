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



G:\metronic-555\theme\classic\demos\default\assets\demo\custom\crud\datatables\data-sources    


<a class="m-link" href="mailto:nfairbanks13@geocities.com">nfairbanks13@geocities.com</a>

file:///G:/metronic-555/theme/classic/demos/default/crud/datatables/advanced/row-grouping.html
ROW GROUPING



file:///G:/metronic-555/theme/classic/demos/default/crud/datatables/search-options/column-search.html
Column Search