<?php
include_once '../system/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<!-- begin::Head --> <?php include_once 'layouts/head.php'; ?><!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page"> 
        <!-- BEGIN: Header -->  <?php include_once 'layouts/header.php'; ?>   <!-- END: Header -->

        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <!-- BEGIN: Left Aside -->   <?php include_once 'layouts/left-aside.php'; ?>   <!-- END: Left Aside -->
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <!-- BEGIN: Subheader -->   <!-- END: Subheader -->

                <div class="m-content">

                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-subheader__title m-subheader__title--separator">
                                       Users 
                                    </h3>
 
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <a href="#" class="btn btn-info m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air" id="createButton">
                                            <span>
                                             <i class="la la-plus"></i>
                                             <span>New Record</span>
                                         </span>
                                     </a>

                                 </li> 
                                 <!--begin::m-portlet__nav-item-->
                                 <span class="dropdown">
                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                                      <i class="la la-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" id="reload" class="dropdown-item" ><i class="la la-refresh"></i> Reload</a> 
                                </div>
                            </span>
                            <!--end::m-portlet__nav-item--> 
                        </ul>

                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped-table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>
 
<!-- end:: Body -->

<!-- begin::Footer --><?php include_once 'layouts/footer.php'; ?><!-- end::Footer -->
 
</div>
<!-- end:: Page -->

<!-- begin::Quick Sidebar --> <?php include_once 'layouts/quick-sidebar.php'; ?><!-- end::Quick Sidebar -->

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<!-- end::Scroll Top -->  
    <!--begin:: Global Mandatory Vendors -->   <?php include_once 'layouts/global.php'; ?>  <!--end:: Global Mandatory Vendors -->

    <!--begin::Page Scripts -->
    <script src="../public/assets/app/js/dashboard.js" type="text/javascript"></script>
    <script src="app/sampleTable.js" type="text/javascript"></script>
    <!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html> 


<!--begin::modal-->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="createForm" data-parsley-validate="" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-height="400">
                        <input type="hidden" name="create" />
                        <div class="form-group m-form__group row">
                            <div class="col-md-6">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control m-input" placeholder="Enter your Username" required />
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control m-input" placeholder="Type your password" required />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>First Name</label>
                                <input type="text" class="form-control m-input" placeholder="Enter First Name" name="firstname" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="">Middle Name:</label>
                                <input type="text" class="form-control m-input" placeholder="Enter Middle Name" name="middlename">
                            </div>
                            <div class="col-lg-3">
                                <label class="">Last Name: </label>
                                <input type="text" class="form-control m-input" placeholder="Enter Last Name" name="lastname" required>
                            </div>
                            <div class="col-lg-2">
                                <label class="">Ext. (Jr, Sr, Etc) </label>
                                <input type="text" class="form-control m-input" placeholder="Jr, Sr, III, Etc" name="extension" />
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <label>Address</label>
                                <textarea name="address" class="form-control" data-provide="markdown" rows="10" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span><i class="fa fa-times"></i></span> <span>Cancel</span></button>
                    <button type="submit" class="btn btn-success"><span><i class="la la-save"></i><span> Save Record</span></span></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$value = custom_query("SELECT * FROM tbl_users ORDER BY id DESC");
if($value->rowCount()>0) {
    while ($r = $value->fetch(PDO::FETCH_ASSOC))
    {

        ?> 
        <div class="modal fade" id="delete<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form class="deleteForm" data-parsley-validate="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="delete" />
                            <input type="hidden" name="id" value="<?= $r['id']; ?>" />
                            <h3>Are you sure you want to delete this record?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><span><i class="la la-times"></i></span> <span>Cancel</span></button>
                            <button type="submit" class="btn btn-danger"><span><i class="la la-trash"></i> </span> <span>Delete</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }} ?>

 
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="updateForm" data-parsley-validate="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-height="400">
                            <input type="hidden" name="update" />
                            <input type="hidden" name="id" value="<?= $r['id']; ?>" />
                            <div class="form-group m-form__group row">
                                <div class="col-md-6">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control m-input" placeholder="Enter your Username" readonly />
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control m-input" placeholder="Type your password" required />
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>First Name</label>
                                    <input type="text" class="form-control m-input" placeholder="Enter First Name" name="firstname" required>
                                </div>
                                <div class="col-lg-3">
                                    <label class="">Middle Name:</label>
                                    <input type="text" class="form-control m-input" placeholder="Enter Middle Name" name="middlename">
                                </div>
                                <div class="col-lg-3">
                                    <label class="">Last Name: </label>
                                    <input type="text" class="form-control m-input" placeholder="Enter Last Name" name="lastname" required>
                                </div>
                                <div class="col-lg-2">
                                    <label class="">Ext. (Jr, Sr, Etc) </label>
                                    <input type="text" class="form-control m-input" placeholder="Jr, Sr, III, Etc" name="extension" />
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control" data-provide="markdown" rows="10" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span><i class="la la-times"></i></span> <span>Cancel</span></button>
                        <button type="submit" class="btn btn-success"><span><i class="la la-save"></i> </span> <span>Save Changes</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end:: Modal -->