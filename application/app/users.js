
$(document).ready(function() { 
 
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
 
    var table = $('#m_table_1').DataTable({
        responsive: true,
        "bInfo": true,
        "lengthChange": false,
        "bProcessing": true, 
        language: {
                processing: '<div class="m-loader m-loader--brand m-loader--left">Loading Data</div>', // pwedeng gawing spinner style
                'emptyTable': 'No data found'
            },
        "sAjaxSource": "api/users.php?loadTable",
        "aoColumns": [
            {mData: 'userNo'},
            {mData: 'username'},
            {mData: 'name'},
            {mData: 'address'},
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
 
    $("#reload").click(function () {
        reload();
    });
  
    $("#createButton").click(function (e) {
        e.preventDefault();
        $('#createForm').trigger("reset");
        $('#create').modal('show'); 
    });
 
    $("#m_table_1").delegate('.update', 'click', function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        $.ajax({
            url : 'api/users.php?record='+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.id);
                $('[name="firstname"]').val(data.firstname);
                $('[name="username"]').val(data.username);
                $('[name="lastname"]').val(data.lastname);
                $('[name="middlename"]').val(data.middlename);
                $('[name="address"]').val(data.address);
                $('[name="password"]').val(data.password);
                $('[name="extension"]').val(data.extension);
                $('#edit').modal('show');  
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                toastr.error('Error getting your data from the server.. Please try again or contact the administrator');
            }
        });
    });
  
    $("#createForm").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'api/users.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                var resp = JSON.parse(response);
                toastr.success(resp.Message, resp.title);
                reload();
                $('#createForm').trigger("reset");
                $('#create').modal('hide');  
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
            url: 'api/users.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                var resp = JSON.parse(response);
                toastr.info(resp.Message, resp.title);
                $('.updateForm').trigger("reset");
                $('#edit').modal('hide');  
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
            url: 'api/users.php',
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
