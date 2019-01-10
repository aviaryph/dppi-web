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



           <!--begin::Portlet-->
           <div class="m-portlet">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                  </span>
                  <h3 class="m-portlet__head-text">
                   Create Manpower
                 </h3>
               </div>
             </div>
           </div>

           <!--begin::Form-->
           <form class="m-form m-form--fit m-form--label-align-right " id="createForm" data-parsley-validate="" enctype="multipart/form-data">
            <input type="hidden" name="create" />
            <div class="m-portlet__body">

              <div align="center">  
               <h3 class="m-portlet__head-text" >
                 <span> Account Information</span>
               </h3>
             </div>

             <div class="form-group m-form__group row">
              

               <input type="text" class="form-control m-input" name="manpowerNo" value="">

               <label class="col-lg-1 col-form-label">Manpower ID</label>
               <div class="col-lg-3">
                <div class="input-group m-input-group m-input-group--square"> 
                  <input type="text" class="form-control m-input" name="manpowerId" placeholder="Enter Manpower ID">
                </div> 
              </div> 
              <label class="col-lg-1 col-form-label">Manpower Type</label>
              <div class="col-lg-3">
                <div class="input-group m-input-group m-input-group--square">  
             <select  class="form-control m-input" name="manpowerType">
                                <?php
                                $result=db_select_fillselect('tbl_manpower_type','manpowerType');
                                for($i=1; $row = $result->fetch(); $i++){ ?>
                                  <option><?=$row['manpowerType'];?></option>
                              <?php } ?>
                              </select> 
                </div> 
              </div>
              <label class="col-lg-1 col-form-label">Classification</label>
              <div class="col-lg-3">
                <div class="input-group m-input-group m-input-group--square"> 
                  <input type="text" class="form-control m-input" name="classification" placeholder="Enter Classification">
                </div> 
              </div>
            </div>

            <div class="form-group m-form__group row">
              <label class="col-lg-1 col-form-label">Username</label>
              <div class="col-lg-3">
                <div class="input-group m-input-group m-input-group--square">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                  <input type="text" class="form-control m-input" name="username" placeholder="Enter Username">
                </div>
                <!-- <span class="m-form__help">Enter username</span> -->
              </div>
              <label class="col-lg-1 col-form-label">Password</label>
              <div class="col-lg-3">
                <div class="input-group m-input-group m-input-group--square">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="la la-lock"></i></span></div>
                  <input type="password" class="form-control m-input" name="password" placeholder="Enter Password">
                </div> 
              </div>
              <label class="col-lg-1 col-form-label">Image</label>
              <div class="col-lg-3">
                <div class="input-group m-input-group m-input-group--square"> 
                  <input type="file" class="form-control m-input" name="image" accept="*image"> 
                </div> 
              </div>  
            </div>  

            <div align="center">  
             <h3 class="m-portlet__head-text" >
               <span> Personal Information</span>
             </h3>
           </div> 

           <div class="form-group m-form__group row">
            <label class="col-lg-1 col-form-label">First Name</label>
            <div class="col-lg-3">
              <div class="input-group m-input-group m-input-group--square"> 
                <input type="text" class="form-control m-input" name="firstname" placeholder="Enter First Name">
              </div> 
            </div> 
            <label class="col-lg-1 col-form-label">Middle Name</label>
            <div class="col-lg-3">
              <div class="input-group m-input-group m-input-group--square"> 
                <input type="text" class="form-control m-input" name="middlename" placeholder="Enter Middle Name">
              </div> 
            </div> 
            <label class="col-lg-1 col-form-label">Last Name</label>
            <div class="col-lg-3">
              <div class="input-group m-input-group m-input-group--square"> 
                <input type="text" class="form-control m-input" name="lastname" placeholder="Enter Last Name">
              </div> 
            </div>
          </div>

          <div class="form-group m-form__group row">
            <label class="col-lg-1 col-form-label">Extension </label>
            <div class="col-lg-3">
              <div class="input-group m-input-group m-input-group--square"> 
                <input type="text" class="form-control m-input" name="extension" placeholder="Enter Extension Name">
              </div> 
              <span class="m-form__help"> ex. Jr, Sr, Etc</span>
            </div> 
            <label class="col-lg-1 col-form-label">Nickname</label>
            <div class="col-lg-3">
              <div class="input-group m-input-group m-input-group--square"> 
                <input type="text" class="form-control m-input" name="nickname" placeholder="Enter Nickname"> 
              </div> 
              <span class="m-form__help"> ex. Drin, Kio Etc</span>
            </div>
            <label class="col-lg-1 col-form-label">Facebook Name</label>
            <div class="col-lg-3">
              <div class="input-group m-input-group m-input-group--square"> 
                <input type="text" class="form-control m-input" name="facebookName" placeholder="Enter Facebook Name">
                <input type="hidden" class="form-control m-input" name="facebookAddress" >
              </div> 
            </div> 
          </div> 

          <div class="form-group m-form__group row">
            <label class="col-lg-1 col-form-label">Telephone No</label>
            <div class="col-lg-3">
              <div class="input-group m-input-group m-input-group--square"> 
                <input type="text" class="form-control m-input" name="telephoneNo" placeholder="Enter Telephone No">
              </div> 
            </div>  
            <label class="col-lg-1 col-form-label">Mobile No</label>
            <div class="col-lg-3">
              <div class="input-group m-input-group m-input-group--square"> 
                <input type="number" class="form-control m-input" name="mobileNo" placeholder="Enter Mobile No">
              </div> 
              <span class="m-form__help"> ex. 9464964468</span>
            </div>  
            <label class="col-lg-1 col-form-label">Email</label>
            <div class="col-lg-3">
              <div class="input-group m-input-group m-input-group--square"> 
                <input type="email" class="form-control m-input" name="email" placeholder="Enter email">
              </div> 
            </div>   
          </div> 

 <div class="form-group m-form__group row"> 
            <label class="col-lg-1 col-form-label">City Address</label>
            <div class="col-lg-3">
              <div class="input-group m-input-group m-input-group--square"> 
                <input type="text" class="form-control m-input" name="address" placeholder="Enter City Address">
              </div> 
            </div> 
            <label class="col-lg-1 col-form-label">Provincial Address</label>
            <div class="col-lg-3">
              <div class="input-group m-input-group m-input-group--square"> 
                <input type="text" class="form-control m-input" name="provincialAdress" placeholder="Enter Provincial Address">
              </div> 
            </div> 
            <label class="col-lg-1 col-form-label">Birthday Place</label>
            <div class="col-lg-3">
              <div class="input-group m-input-group m-input-group--square"> 
                <input type="text" class="form-control m-input" name="birthdayPlace" placeholder="Enter Birthday Place"> 
              </div> 
            </div>  
          </div>


        <div class="form-group m-form__group row"> 
         <label class="col-lg-1 col-form-label">Birthday</label>
         <div class="col-lg-3">
          <div class="input-group m-input-group m-input-group--square"> 
            <input type="date" class="form-control m-input" name="birthday" placeholder="Enter Birthday">
            <input type="hidden" class="form-control m-input" name="age"  > 
          </div> 
        </div>
        <label class="col-lg-1 col-form-label">Gender</label>
        <div class="col-lg-3">
          <div class="input-group m-input-group m-input-group--square"> 
            <select   class="form-control m-input" name="gender"  >
              <option>Female</option><option>Male</option>
            </select> 
          </div> 
        </div>
        <label class="col-lg-1 col-form-label">Civil Status</label>
        <div class="col-lg-3">
          <div class="input-group m-input-group m-input-group--square"> 
              <select  class="form-control m-input" name="office">
                                <?php $result=db_select_fillselect('tbl_selectmo','civilStatus');
                                for($i=1; $row = $result->fetch(); $i++){ ?>
                                  <option><?=$row['civilStatus'];?></option>
                              <?php } ?>
                              </select>   
          </div> 
        </div>
      </div>

        <div class="form-group m-form__group row"> 
        <label class="col-lg-1 col-form-label">Religion</label>
        <div class="col-lg-3">
          <div class="input-group m-input-group m-input-group--square"> 
            <input type="text" class="form-control m-input" name="religion" placeholder="Enter Religion">
          </div> 
        </div>
        <label class="col-lg-1 col-form-label">Nationality</label>
        <div class="col-lg-3">
          <div class="input-group m-input-group m-input-group--square"> 
            <input type="text" class="form-control m-input" name="nationality" placeholder="Enter nationality">
          </div> 
        </div>
        <label class="col-lg-1 col-form-label">Complex</label>
          <div class="col-lg-3">
            <div class="input-group m-input-group m-input-group--square"> 
              <input type="text" class="form-control m-input" name="complex" placeholder="Enter Complex">
            </div> 
          </div> 
      </div> 
         
          <div class="form-group m-form__group row"> 
           <label class="col-lg-1 col-form-label">Height</label>
           <div class="col-lg-3">
            <div class="input-group m-input-group m-input-group--square"> 
              <input type="text" class="form-control m-input" name="height" placeholder="Enter Height">
            </div> 
          </div> 
          <label class="col-lg-1 col-form-label">Weight</label>
          <div class="col-lg-3">
            <div class="input-group m-input-group m-input-group--square"> 
              <input type="text" class="form-control m-input" name="weight" placeholder="Enter Weight">
            </div> 
          </div>  
          <label class="col-lg-1 col-form-label">Highest Attainment</label>
          <div class="col-lg-3">
            <div class="input-group m-input-group m-input-group--square"> 
                <select  class="form-control m-input" name="highestAttainment">
                                <?php $result=db_select_fillselect('tbl_selectmo','highestEducation');
                                for($i=1; $row = $result->fetch(); $i++){ ?>
                                  <option><?=$row['highestEducation'];?></option>
                              <?php } ?>
                              </select>  
            </div> 
          </div>
        </div>

          <div class="form-group m-form__group row">   
          <label class="col-lg-1 col-form-label">Date Hired</label>
          <div class="col-lg-3">
            <div class="input-group m-input-group m-input-group--square"> 
              <input type="date" class="form-control m-input" name="dateHired" placeholder="Enter dateHired"> 
            </div> 
          </div>  
        </div> 
  

 <div align="center">  
             <h3 class="m-portlet__head-text" >
               <span> Family Background</span>
             </h3>
           </div> 
      <div class="form-group m-form__group row"> 
        <label class="col-lg-1 col-form-label">Father's Name</label>
        <div class="col-lg-3">
          <div class="input-group m-input-group m-input-group--square"> 
            <input type="text" class="form-control m-input" name="fatherName" placeholder="Enter Father's Name">
          </div> 
        </div> 
        <label class="col-lg-1 col-form-label">Father's Occupation</label>
        <div class="col-lg-3">
          <div class="input-group m-input-group m-input-group--square"> 
            <input type="text" class="form-control m-input" name="fatherOccupation" placeholder="Enter Father's Occupation">
          </div> 
        </div> 
        <label class="col-lg-1 col-form-label">Father's Contact</label>
        <div class="col-lg-3">
          <div class="input-group m-input-group m-input-group--square"> 
            <input type="text" class="form-control m-input" name="fatherContact" placeholder="Enter Father's Contact">
          </div> 
        </div> 
      </div>
      <div class="form-group m-form__group row"> 
        <label class="col-lg-1 col-form-label">Mother's Name</label>
        <div class="col-lg-3">
          <div class="input-group m-input-group m-input-group--square"> 
            <input type="text" class="form-control m-input" name="motherName" placeholder="Enter Mother's Name">
          </div> 
        </div> 
        <label class="col-lg-1 col-form-label">Mother's Occupation</label>
        <div class="col-lg-3">
          <div class="input-group m-input-group m-input-group--square"> 
            <input type="text" class="form-control m-input" name="motherOccupation" placeholder="Enter Mother's Occupation">
          </div> 
        </div> 
        <label class="col-lg-1 col-form-label">Mother's Contact</label>
        <div class="col-lg-3">
          <div class="input-group m-input-group m-input-group--square"> 
            <input type="text" class="form-control m-input" name="motherContact" placeholder="Enter Mother's Contact">
          </div> 
        </div> 
      </div>

      <div class="form-group m-form__group row"> 
       <label class="col-lg-1 col-form-label">Spouse Name</label>
       <div class="col-lg-3">
        <div class="input-group m-input-group m-input-group--square"> 
          <input type="text" class="form-control m-input" name="spouseName" placeholder="Enter Spouse Name">
        </div> 
      </div> 
      <label class="col-lg-1 col-form-label">Spouse Occumation</label>
      <div class="col-lg-3">
        <div class="input-group m-input-group m-input-group--square"> 
          <input type="text" class="form-control m-input" name="spouseOccumation" placeholder="Enter Spouse Occumation">
        </div> 
      </div> 
      <label class="col-lg-1 col-form-label">Spouse Contact</label>
      <div class="col-lg-3">
        <div class="input-group m-input-group m-input-group--square"> 
          <input type="text" class="form-control m-input" name="spouseContact" placeholder="Enter Spouse Contact">
        </div> 
      </div> 
      <label class="col-lg-1 col-form-label">Number Child</label>
      <div class="col-lg-3">
        <div class="input-group m-input-group m-input-group--square"> 
          <input type="number" class="form-control m-input" name="numberChild" placeholder="Enter Number Child">
        </div> 
      </div> 
    </div>
    <!--begin::Government Requirements -->
    <div align="center">  
     <h3 class="m-portlet__head-text" >
       <span> Government Requirements</span>
     </h3>
   </div>
   <div class="form-group m-form__group row">  
     <label class="col-lg-1 col-form-label">SSS</label>
     <div class="col-lg-3">
      <div class="input-group m-input-group m-input-group--square"> 
        <input type="text" class="form-control m-input" name="sssId" placeholder="Enter SSS">
      </div> 
    </div>
    <label class="col-lg-1 col-form-label">Pagibig</label>
    <div class="col-lg-3">
      <div class="input-group m-input-group m-input-group--square"> 
        <input type="text" class="form-control m-input" name="pagibigId" placeholder="Enter Pagibig">
      </div> 
    </div>
    <label class="col-lg-1 col-form-label">Philhealth</label>
    <div class="col-lg-3">
      <div class="input-group m-input-group m-input-group--square"> 
        <input type="text" class="form-control m-input" name="philhealthId" placeholder="Enter Philhealth">
      </div> 
    </div>
  </div>

  <div class="form-group m-form__group row"> 
   <label class="col-lg-1 col-form-label">TIN</label>
   <div class="col-lg-3">
    <div class="input-group m-input-group m-input-group--square"> 
      <input type="text" class="form-control m-input" name="tinId" placeholder="Enter TIN">
    </div> 
  </div>
  <label class="col-lg-1 col-form-label">Mayors Occupational Permit</label>
  <div class="col-lg-3">
    <div class="input-group m-input-group m-input-group--square"> 
      <input type="date" class="form-control m-input" name="mayorOccupationPermitExpirationDate"  >
    </div> 
    <span class="m-form__help"> Expiration Date</span>
  </div>
  <label class="col-lg-1 col-form-label">Health Card</label>
  <div class="col-lg-3">
    <div class="input-group m-input-group m-input-group--square"> 
      <input type="date" class="form-control m-input" name="healthCardExpirationDate"  >
    </div> 
    <span class="m-form__help"> Expiration Date</span>
  </div>
</div> 
<div class="form-group m-form__group row"> 
 <label class="col-lg-1 col-form-label">Medical Certificate</label>
 <div class="col-lg-3">
  <div class="input-group m-input-group m-input-group--square"> 
    <input type="date" class="form-control m-input" name="medicalCertificateExpirationDate"  >
  </div> 
  <span class="m-form__help"> Expiration Date</span>
</div>
<label class="col-lg-1 col-form-label">Drugs Test</label>
<div class="col-lg-3">
  <div class="input-group m-input-group m-input-group--square"> 
    <input type="date" class="form-control m-input" name="drugsTestExpirationDate"  >
  </div> 
  <span class="m-form__help"> Expiration Date</span>
</div> 
</div> 
<!--end::Government Requirements-->

<!--begin::References-->
<div align="center">  
 <h3 class="m-portlet__head-text" >
   <span> References (in case of emergency)</span>
 </h3>
</div>
<div class="form-group m-form__group row"> 
 <label class="col-lg-1 col-form-label">Contact Name</label>
 <div class="col-lg-3">
  <div class="input-group m-input-group m-input-group--square"> 
    <input type="text" class="form-control m-input" name="incaseEmergencyName" placeholder="Enter Contact Name">
  </div>  
</div> 
<label class="col-lg-1 col-form-label">Contact Address</label>
<div class="col-lg-3">
  <div class="input-group m-input-group m-input-group--square"> 
    <input type="text" class="form-control m-input" name="incaseEmergencyAddress" placeholder="Enter Contact Address">
  </div>  
</div>
<label class="col-lg-1 col-form-label">Contact Number</label>
<div class="col-lg-3">
  <div class="input-group m-input-group m-input-group--square"> 
    <input type="date" class="form-control m-input" name="incaseEmergencyContact" placeholder="Enter Contact Number">
  </div>  
</div>  
</div> 
<!--end::References-->

</div>
<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
  <div class="m-form__actions m-form__actions--solid">
    <div class="row">
      <div class="col-lg-5"></div>
      <div class="col-lg-7">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span><i class="fa fa-times"></i></span> <span>Cancel</span></button>

        <button type="submit" class="btn btn-success"><span><i class="la la-save"></i><span> Save Record</span></span></button> 
      </div>
    </div>
  </div>
</div>
</form>

<!--end::Form-->
</div>

<!--end::Portlet-->


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

<!-- begin::Quick Sidebar -->
<?php include_once 'layouts/quick-sidebar.php'; ?>
<!-- end::Quick Sidebar -->

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
  <i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->  



<!--begin:: Global Mandatory Vendors -->  
<?php include_once 'layouts/global.php'; ?>  
<!--end:: Global Mandatory Vendors -->

<!--begin::Page Scripts --> 
<script src="app/manpower.js" type="text/javascript"></script>
<!--end::Page Scripts -->

</body>
<!-- end::Body -->
</html> 
