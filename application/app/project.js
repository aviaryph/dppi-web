
$(document).ready(function() { 

    //set the toastr options
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }; 

    //set the datatable data
    var table = $('#m_table_1').DataTable({
        responsive: true,
        "bInfo": true,
        "lengthChange": false,
        "bProcessing": true,
        language: {
                processing: '<div class="m-loader m-loader--brand m-loader--left">Loading Data</div>', // pwedeng gawing spinner style
                'emptyTable': 'No data found'
            },
        "sAjaxSource": "api/projecT.php?loadTable",
        "aoColumns": [
            {mData: 'projectNo'},
            {mData: 'projectName'},
            {mData: 'projectType'},
            {mData: 'manpowerType'},
            {mData: 'teamleader'},
            {mData: 'rovingTeamleader'},
            {mData: 'dateCovered'}, 
            {mData: 'status'},
            {mData: 'created_at'},
            {mData: 'Actions'}
        ], 
        columnDefs: [
            {
                targets: -1,
                title: 'Actions',
                orderable: false,
                render: function(data, type, full, meta) {
                    return `
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                              <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="update dropdown-item" data-id="`+ data +`"><i class="la la-edit"></i> Edit Details</a> 
                                <a href="#"  class="dropdown-item"  data-toggle="modal" data-target="#delete`+ data +`"><i class="la la-trash"></i> Delete Details</a>
                                <a href="#" class="dropdown-item" data-target="#status" data-toggle="modal"><i class="la la-leaf"></i> Update Status</a>
                            </div>
                        </span> `;
                },
            }
        ]
    }); 

    //reload the table
    $("#reload").click(function () {
        reload();
    });
 
    //show the create modal form
    $("#createButton").click(function (e) {
        e.preventDefault();
        $('#createForm').trigger("reset");
        $('#create').modal('show'); 
    });

    //check when the update button was clicked then add the data to the textboxes
    $("#m_table_1").delegate('.update', 'click', function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        $.ajax({
            url : 'api/projecT.php?record='+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            { 

                $('[name="id"]').val(data.id);
                $('[name="projectNo"]').val(data.projectNo);
                $('[name="projectName"]').val(data.projectName);
                $('[name="projectType"]').val(data.projectType);
                $('[name="manpowerType"]').val(data.midmanpowerTypedlename);
                $('[name="teamleader"]').val(data.teamleader);
                $('[name="rovingTeamleader"]').val(data.rovingTeamleader);
                $('[name="numberOfStores"]').val(data.numberOfStores);
                $('[name="runDate"]').val(data.runDate);
                $('[name="date_covered_from"]').val(data.date_covered_from);
                $('[name="date_covered_to"]').val(data.date_covered_to);
                $('[name="wave"]').val(data.wave); 
                $('#edit').modal('show');  
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                toastr.error('Error getting your data from the server.. Please try again or contact the administrator');
            }
        });
    });
 
    //submit the createform when everything is fine
    $("#createForm").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'api/projecT.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                var resp = JSON.parse(response);
                toastr.success(resp.Message, resp.title);
                reload();
                $('#createForm').trigger("reset");
                $('#create').modal('hide'); // show bootstrap modal when complete loaded
            },
            error: function(response){
                var resp = JSON.parse(response);
                toastr.error(resp.Message, resp.title);
            }
        });
    });

    $(".updateForm").on("submit", function (e) { 
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'api/projecT.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                var resp = JSON.parse(response);
                toastr.info(resp.Message, resp.title);
                $('.updateForm').trigger("reset");
                $('#edit').modal('hide'); // show bootstrap modal when complete loaded
                reload(); 
            },
            error: function(response){
                var resp = JSON.parse(response);
                toastr.error(resp.Message, resp.title);
            }
        });
    });

    $(".deleteForm").on("submit", function (e) { 
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'api/projecT.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                var resp = JSON.parse(response);
                toastr.warning(resp.Message, resp.title);
                reload();
                $('.modal').modal('hide');
            },
            error: function(response){
                var resp = JSON.parse(response);
                toastr.error(resp.Message, resp.title);
            }
        });
    });

    function reload() {
        table.ajax.reload();
    }





});