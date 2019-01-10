<?php
include_once '../system/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<?php include_once 'layouts/head.php'; ?>
<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

  <!-- begin:: Page -->
  <div class="m-grid m-grid--hor m-grid--root m-page"> 
    <!-- BEGIN: Header --> 
    <?php include_once 'layouts/header.php'; ?> 
    <!-- END: Header -->

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

      <!-- BEGIN: Left Aside -->  
      <?php include_once 'layouts/left-aside.php'; ?>  
      <!-- END: Left Aside -->
      <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->  
        <!-- END: Subheader -->

        <div class="m-content"> 
          <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-subheader__title m-subheader__title--separator">
                   Allocation Sheet 
                 </h3>
               </div>
             </div>
             <div class="m-portlet__head-tools">
              <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                  <a href="#" class="btn btn-info m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air" id="newMaterialButton">
                    <span>
                     <i class="la la-plus"></i>
                     <span>New Material</span>
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
          <table class="table table-striped-table-bordered table-hover table-checkable" id="m_table_alloc">
            <thead>
              <tr>
                <th>Project No</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Item Description</th>  
                <th>Create At</th>  
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

<!-- begin::Footer -->
<?php include_once 'layouts/footer.php'; ?>
<!-- end::Footer -->

</div>
<!-- end:: Page --> 

<?php include_once 'layouts/quick-sidebar.php'; ?>
<!-- end::Quick Sidebar -->

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
  <i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->  


 
<!--begin:: Add Modal -->
<div class="modal fade" id="newMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <form id="createForm" data-parsley-validate="" enctype="multipart/form-data"> 
        <input type="hidden" name="createNewMaterial" />
        <input type="hidden" name="projectNo"  value="<?=$_GET['projectNo'];?>" />
        <div class="modal-header">
          <h5 id="exampleModalLabel">New Material</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-height="250"> 
            
            <div class="form-group m-form__group row">
              <div class="col-md-12">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control m-input" placeholder="Enter Name" required />
              </div>
            </div>

            <div class="form-group m-form__group row">
             <div class="col-md-12">
                <label>Item Description</label>
                 <select  class="form-control m-input" name="itemDescription" required>
                  <?php $result=custom_query("SELECT * FROM tbl_materials");
                  for($i=1; $row = $result->fetch(); $i++){ ?>
                    <option><?=$row['itemDescription'].'-'.$row['unit'];?></option>
                  <?php } ?>
                </select>  
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
 
<!-- end:: Modal -->

<!--begin:: Global Mandatory Vendors -->  
<?php include_once 'layouts/global.php'; ?>  
<!--end:: Global Mandatory Vendors -->

<!--begin::Page Scripts --> 
<script src="app/project.js" type="text/javascript"></script>
<!--end::Page Scripts -->

</body>
<!-- end::Body -->
</html> 
