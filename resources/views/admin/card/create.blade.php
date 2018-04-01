@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

<style>


.file-input-wrapper {
        height: 35px;
        overflow: hidden;
        position: absolute;
        width: 123px;
        background-color: #fff;
        cursor: pointer;
    }

    .file-input-wrapper > input[type="file"] {
        font-size: 40px;
        position: absolute;
        top: 0;
        right: 0;
        opacity: 0;
        cursor: pointer;
    }


</style>
      <div class="panel panel-default">
        <div class="panel-heading">
          CARD REGISTRATION
        </div>

        <div class="panel-body table-responsive">

          	<div class="row form-group">
                  <div class="col-xs-12">
                      <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                          <li class="active"><a href="#step-1">
                              <h4 class="list-group-item-heading">Step 1</h4>
                              <p class="list-group-item-text">Basic Details</p>
                          </a></li>
                          <li class="disabled"><a href="#step-2">
                              <h4 class="list-group-item-heading">Step 2</h4>
                              <p class="list-group-item-text">Medical Details</p>
                          </a></li>
                          <li class="disabled"><a href="#step-3">
                              <h4 class="list-group-item-heading">Step 3</h4>
                              <p class="list-group-item-text">Emergency Contact</p>
                          </a></li>

                          <li class="disabled"><a href="#step-4">
                              <h4 class="list-group-item-heading">Blank</h4>
                              <p class="list-group-item-text">Second step description</p>
                          </a></li>

                      </ul>
                  </div>
          	</div>
              <div class="row setup-content" id="step-1">
                  <div class="col-xs-12">
                      <div class="col-md-12 well">
                          <h3>Basic Presonal Info</h3>

          <form>

              <div class="row clearfix">
          		<div class="col-md-12 column">

                <div class="row" style="padding: 5px;">
                    <form name="personal">

                <div class="col-sm-4">
                <div class="form-group label-floating ">
                <label class="control-label">First Name*</label>
                <input type="text" id="first_name" class="form-control">
                <span class="material-input"></span></div>
                </div>

                <div class="col-sm-4">
                <div class="form-group label-floating ">
                <label class="control-label">Last Name*</label>
                <input type="text" id="last_name" class="form-control">
                <span class="material-input"></span></div>
                </div>
                <div class="col-sm-4">
                <div class="form-group label-floating ">
                <label class="control-label">Display Name*</label>
                <input type="text" id="display_name" class="form-control" >
                <span class="material-input"></span></div>
                    </div>

                <div class="col-sm-4">

                <label class="control-label"><b>Gender*</b></label>
                <div class="radio">

                <label>
                <input type="radio" id="gender" name="gender" value="Male"><span class="circle"></span><span class="check"></span>
                Male
                </label>

                <label>
                <input type="radio" id="gender" name="gender" value="Female"><span class="circle"></span><span class="check"></span>
                Female
                </label>

                <label>
                <input type="radio" id="gender" name="gender" value="TransGender"><span class="circle"></span><span class="check"></span>
                Transgender
                </label>
                </div>

                </div>

                    <div class="col-sm-4">
                <div class="form-group label-floating ">
                <label class="control-label">Email*</label>
                <input type="text" id="email" class="form-control">
                <span class="material-input"></span></div>
                    </div>  <div class="col-sm-4">
                <div class="form-group label-floating ">
                <label class="control-label">Mobile*</label>
                <input type="text" id="mobile" class="form-control">
                <span class="material-input"></span></div>
                    </div>  <div class="col-sm-4">
                <div class="form-group label-floating ">
                <label class="control-label">Land Line*</label>
                <input type="text" id="land_line" class="form-control">
                <span class="material-input"></span></div>
                    </div>

                     <div class="col-sm-4">
                <div class="form-group label-floating ">
                <label class="control-label">Office Phone*</label>
                <input type="text" id="office_phone" class="form-control">
                <span class="material-input"></span></div>
                    </div>
                     <div class="col-sm-4">
                <div class="form-group label-floating ">
                <label class="control-label">Aadhaar*</label>
                <input type="text" id="aadhaar" class="form-control">
                <span class="material-input"></span></div>
                    </div> <div class="col-sm-4">
                <div class="form-group ">
                <label class="control-label">Date Of Birth*</label>
                  <input class="datepicker form-control" id="date_of_birth">

                <span class="material-input"></span></div>
                    </div>
                    <!-- javascript --><script>
                				$('.datepicker').datepicker({
                				weekStart:1
                				});
                				</script>

                    </form></div>
                    <div class="row" style="padding:5px;">
       <div class="col-sm-3">
<div class="form-group label-floating ">
<label class="control-label">Door No*</label>
<input type="text" id="doorno" class="form-control">
<span class="material-input"></span></div>
    </div>

    <div class="col-sm-3">
<div class="form-group label-floating ">
<label class="control-label">Building/Street*</label>
<input type="text" id="building_street" class="form-control">
<span class="material-input"></span></div>
    </div>

       <div class="col-sm-3">
<div class="form-group label-floating ">
<label class="control-label">Area/Locality*</label>
<input type="text" id="area_locality" class="form-control" >
<span class="material-input"></span></div>
    </div>
       <div class="col-sm-3">
<div class="form-group label-floating ">
<label class="control-label">City*</label>
<input type="text" id="city" class="form-control">
<span class="material-input"></span></div>
    </div>
       <div class="col-sm-4">
<div class="form-group label-floating ">
<label class="control-label">State*</label>
<input type="text" id="state" class="form-control" >
<span class="material-input"></span></div>
    </div>
       <div class="col-sm-4">
<div class="form-group label-floating ">
<label class="control-label">Pin Code*</label>
<input type="text" id="pincode" class="form-control" >
<span class="material-input"></span></div>
    </div>  </div>

          		</div>
          	</div>
          	<!-- <a id="add_row" class="btn btn-success pull-left">Add Row</a><a id='delete_row' class="btn btn-danger pull-right">Delete Row</a> -->

          </form>


                          <button id="activate-step-2" class="btn btn-primary btn-md">Save and Proceed</button>
                      </div>
                  </div>
              </div>
              <div class="row setup-content" id="step-2">
                  <div class="col-xs-12">
                      <div class="col-md-12 well text-center">
                        <div id="menu1" class="tab-pane fade active in">
     <div class="head head-primary text-center">
  	                        <h3 style="margin: 0px 0 0px;"><span><i class="fa fa-doctor"></i> Medical Profile </span></h3>
  	                    </div>
  <div class="row" style="padding: 5px;">
<form>


        <div class="col-md-4">
    <div class="form-group label-floating ">
    <label class="control-label">Blood Group</label>
    <select class="form-control" id="bg">
    <option value=""></option>
    <option value="A+">A+ve</option>
    <option value="A-">A-ve</option>
    <option value="B+">B+ve</option>
    <option value="B-">B-ve</option>
    <option value="AB+">AB+ve</option>
    <option value="AB-">AB-ve</option>
    <option value="O+">O+ve</option>
    <option value="O-">O-ve</option>
    </select>
    <span class="material-input"></span></div>
    </div>

    <div class="col-sm-4">

    <label class="control-label"><b>Are You a  blood Donor?</b></label>
    <div class="radio">

    <label>
    <input type="radio" name="bd" value="Yes"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

    <label>
    <input type="radio" name="bd" value="no" checked="checked"><span class="circle"></span><span class="check"></span>
    No
    </label>
    </div>

    </div>


    </form></div>





    <div class="box-header with-border">
                  <h4>Critical Medical Condition</h4>

                  <!-- /.box-tools -->
                </div>
        <div class="head head-danger text-center" style="background:#028cd0;">

    </div>
    <div class="row" style="padding:5px; ">
    <div class="col-sm-4">

    <label class="control-label"><b>Any Blood Pressure issues?</b></label>
    <div class="radio">

    <label>
    <input type="radio" name="bp" value="High"><span class="circle"></span><span class="check"></span>
    High
    </label>

    <label>
    <input type="radio" name="bp" value="Low"><span class="circle"></span><span class="check"></span>
    Low
    </label>
<!--     <label>
    <input type="radio" name="bp" value="No Issues"><span class="circle"></span><span class="check"></span>
    No issues
    </label> -->
    <label>
    <input type="radio" name="bp" value="Dont Know" checked="checked"><span class="circle"></span><span class="check"></span>
    Don't Know
    </label>
    </div>
<br>

    </div>

    <div class="col-sm-4">

    <label class="control-label"><b>Any Heart related issues?</b></label>
    <div class="radio">

    <label>
    <input type="radio" name="hr" value="Yes"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

<!--     <label>
    <input type="radio" name="hr" value="No"><span class="circle"></span><span class="check"></span>
    No
    </label>
 -->
    <label>
    <input type="radio" name="hr" value="DK" checked="checked"><span class="circle"></span><span class="check"></span>
    Don't Know
    </label>
    </div>

    </div>
      <div class="col-sm-4">

    <label class="control-label"><b>Are You Disabled? </b></label>
    <div class="radio">

    <label>
    <input type="radio" name="disa" value="Yes"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

    <label>
    <input type="radio" name="disa" value="No" checked="checked"><span class="circle"></span><span class="check"></span>
    No
    </label>
    </div>
   </div></div>

<div class="row">


    <div class="col-sm-4">

    <label class="control-label"><b>You have Diabetes?</b></label>
    <div class="radio">

    <label>
    <input type="radio" name="db" value="Yes"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

<!--     <label>
    <input type="radio" name="db" value="no"><span class="circle"></span><span class="check"></span>
    No
    </label>
 -->
    <label>
    <input type="radio" name="db" value="DK" checked="checked"><span class="circle"></span><span class="check"></span>
    Don't Know
    </label>
    </div>




    </div>

    <div class="col-sm-4">

    <label class="control-label"><b>You have Epilepsy? <a data-toggle="tooltip" dataplacement="top" title="" data-original-title="A disorder in which nerve cell activity in the brain is disturbed, causing seizures."> <i class="fa fa-question-circle"></i></a></b></label>
    <div class="radio">

    <label>
    <input type="radio" name="ep" value="Yes"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

<!--     <label>
    <input type="radio" name="ep" value="No"><span class="circle"></span><span class="check"></span>
    No
    </label> -->

    <label>
    <input type="radio" name="ep" value="DK" checked="checked"><span class="circle"></span><span class="check"></span>
    Don't Know
    </label>
    </div>




    </div>


    <div class="col-sm-4">

    <label class="control-label"><b>You have Asthma? <a data-toggle="tooltip" dataplacement="top" title="" data-original-title="A condition in which a person's airways become inflamed, narrow and swell and produce extra mucus, which makes it difficult to breathe."> <i class="fa fa-question-circle"></i></a></b></label>
    <div class="radio">

    <label>
    <input type="radio" name="as" value="Yes"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

<!--     <label>
    <input type="radio" name="as" value="No"><span class="circle"></span><span class="check"></span>
    No
    </label> -->

    <label>
    <input type="radio" name="as" value="DK" checked="checked"><span class="circle"></span><span class="check"></span>
    Don't Know
    </label>
    </div>




    </div>
</div><div class="row">
    <div class="col-sm-4">

    <label class="control-label"><b>You have Mental Illness? <a data-toggle="tooltip" dataplacement="top" title="" data-original-title="A wide range of conditions that affect mood, thinking and behaviour."> <i class="fa fa-question-circle"></i></a></b></label>
    <div class="radio">

    <label>
    <input type="radio" name="il" value="Yes"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

<!--     <label>
    <input type="radio" name="il" value="No"><span class="circle"></span><span class="check"></span>
    No
    </label> -->

    <label>
    <input type="radio" name="il" value="DK" checked="checked"><span class="circle"></span><span class="check"></span>
    Don't Know
    </label>
    </div>




    </div>

    <div class="col-sm-4">

    <label class="control-label"><b>You have TB(Tuberculosis)? <a data-toggle="tooltip" dataplacement="top" title="" data-original-title="A potentially serious infectious bacterial disease that mainly affects the lungs."> <i class="fa fa-question-circle"></i></a></b></label>
    <div class="radio">

    <label>
    <input type="radio" name="tb" value="Yes"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

<!--     <label>
    <input type="radio" name="tb" value="No"><span class="circle"></span><span class="check"></span>
    No
    </label>
 -->
    <label>
    <input type="radio" name="tb" value="DK" checked="checked"><span class="circle"></span><span class="check"></span>
    Don't Know
    </label>
    </div>




    </div>


    <div class="col-sm-4">

    <label class="control-label"><b>You have Dyslipidemia? <a data-toggle="tooltip" dataplacement="top" title="" data-original-title="Dyslipidemia can increase the risk of coronary artery disease (CAD) and peripheral arterial disease. Symptoms of peripheral arterial disease include intermittent claudication (pain, numbness, aching, or heaviness in the leg muscles during movement and/or cramping in the legs, buttocks, thighs, calves, or feet)."> <i class="fa fa-question-circle"></i></a></b></label>
    <div class="radio">

    <label>
    <input type="radio" name="dy" value="Yes"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

<!--     <label>
    <input type="radio" name="dy" value="No"><span class="circle"></span><span class="check"></span>
    No
    </label> -->

    <label>
    <input type="radio" name="dy" value="DK" checked="checked"><span class="circle"></span><span class="check"></span>
    Don't Know
    </label>
    </div>

</div>


    </div>



      <div class="box-header with-border">
                    <h4>Medication Details</h4>
                    <!-- /.box-tools -->
                  </div>
 <div class="row" style="padding:5px; ">
       <div class="col-sm-4">

    <label class="control-label"><b>Do you take NSAIDS?</b></label>
    <div class="radio">

    <label>
    <input type="radio" name="nsa" value="Yes"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

    <label>
    <input type="radio" name="nsa" value="No" checked="checked"><span class="circle"></span><span class="check"></span>
    No
    </label>
    </div>
   </div>

      <div class="col-sm-4">

    <label class="control-label"><b>Do you take STEROIDS? </b></label>
    <div class="radio">

    <label>
    <input type="radio" name="steroids" value="Yes"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

    <label>
    <input type="radio" name="steroids" value="No" checked="checked"><span class="circle"></span><span class="check"></span>
    No
    </label>
    </div>




    </div>




      <div class="col-sm-4">

    <label class="control-label"><b>Do you take ANTICOGULANT?</b></label>
    <div class="radio">

    <label>
    <input type="radio" name="anti" value="Yes"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

    <label>
    <input type="radio" name="anti" value="No" checked="checked"><span class="circle"></span><span class="check"></span>
    No
    </label>
    </div>
    </div>

         <div class="col-sm-4">

    <label class="control-label"><b>Any History Of Surgery? </b></label>
    <div class="radio">

    <label>
    <input type="radio" name="surg" value="Yes" onclick="handleClick2();"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

    <label>
    <input type="radio" name="surg" value="No" checked="checked"><span class="circle"></span><span class="check"></span>
    No
    </label>
    </div>
    </div>
      <div class="col-sm-8">

    <label class="control-label"><b>Any History Of Organ Implant?</b></label>
    <div class="radio">

    <label>
    <input type="radio" name="orgim" value="Yes" onclick="handleClick3();"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

    <label>
    <input type="radio" name="orgim" value="No" checked="checked"><span class="circle"></span><span class="check"></span>
    No
    </label>
    </div>
    </div>


   <div class="col-sm-12 text-center">
<script>


function handleClick() {

    $('#organ').click();

}

  function handleClick1() {

    $('#ins').click();

}
	  function handleClick2() {

    $('#surg').click();

}

	 function handleClick3() {

    $('#surga').click();

}

</script>

				<h6>		Organ donation pledge: </h6>
	<center><img src="http://www.mohanfoundation.org/images/mohan-foundation-icon.png"></center><br>we urge you to look into this as a humanitarian cause to support by pledging your
organs. Once pledged, your details shall be shared with Organ donor registry maintained by <b>Mohan
				Foundation</b>. This will be highlighted on your photo on the emerecard.<br>
&nbsp;
    <label class="control-label"><b>I hereby agree to donate my following organs in case of my accidental/ brain death:</b></label>
    <div class="radio">

    <label>

    <input type="radio" id="don" name="don" value="Yes" onclick="handleClick();"><span class="circle"></span><span class="check"></span><span class="circle"></span><span class="check"></span>
   I Agree
    </label>

    <label>
    <input type="radio" id="don" name="don" value="No" checked="checked"><span class="circle"></span><span class="check"></span><span class="circle"></span><span class="check"></span>
  I Disagree
    </label>
    </div>
    </div>


     <div class="col-sm-12 text-center">

    <label class="control-label"><b>Do You Have Medical Insurance? </b></label>
    <div class="radio">

    <label>
    <input type="radio" name="ins" value="Yes" onclick="handleClick1();" checked="checked"><span class="circle"></span><span class="check"></span><span class="circle"></span><span class="check"></span>
    Yes
    </label>

    <label>
    <input type="radio" name="ins" value="No"><span class="circle"></span><span class="check"></span><span class="circle"></span><span class="check"></span>
    No
    </label>
    </div>
    </div>







<!--           <div class="col-sm-4">

    <label class="control-label"><b>Any History Of Surgery? </b></label>
    <div class="radio">

    <label>
    <input type="radio" name="surg" value="Yes" onclick="handleClick2();"><span class="circle"></span><span class="check"></span>
    Yes
    </label>

    <label>
    <input type="radio" name="surg" value="No"><span class="circle"></span><span class="check"></span>
    No
    </label>
    </div>
    </div>
      <div class="col-sm-8">

    <label class="control-label"><b>Any History Of Organ Implant?</b></label>
    <div class="radio">

    <label>
    <input type="radio" name="orgim" value="Yes" onclick="handleClick3();"><span class="circle" ></span><span class="check"></span>
    Yes
    </label>

    <label>
    <input type="radio" name="orgim" value="No"><span class="circle"></span><span class="check"></span>
    No
    </label>
    </div>
    </div> -->







    </div>

      <div class="row">
        <div id="result1">

      </div>
      </div>

    <center> <button type="button" id="pdetailsfillmed" class="btn btn-primary btn-lg">
      <i class="fa fa-upload"></i> UPDATE AND PROCEED
      </button></center>


<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="organ" style="display:none;" data-backdrop="static" data-keyboard="false">

</button>
<button class="btn btn-primary" data-toggle="modal" data-target="#insa" id="ins" style="display:none;" data-backdrop="static" data-keyboard="false">

</button>
<button class="btn btn-primary" data-toggle="modal" data-target="#surgery" id="surg" style="display:none;" data-backdrop="static" data-keyboard="false">

</button>
<button class="btn btn-primary" data-toggle="modal" data-target="#orgim" id="surga" style="display:none;" data-backdrop="static" data-keyboard="false">

</button>



      </div>


                          <button id="activate-step-3" class="btn btn-primary btn-md">Activate Step 3</button>
                      </div>
                  </div>
              </div>
              <div class="row setup-content" id="step-3">
                  <div class="col-xs-12">
                      <div class="col-md-12 well text-center">
                        <div id="menu2" class="tab-pane fade active in">
      <div class="head head-primary text-center">
  	                        <h3 style="margin: 0px 0 0px;"><span><i class="fa fa-doctor"></i>Family Contact Details(PRIORITY 1)</span></h3>
  	                    </div>
  <div class="row" style="padding: 5px;">
     <div class="col-sm-4">
<div class="form-group label-floating ">
<label class="control-label">Family Name 1</label>
<input type="name" class="form-control" id="fnam1" value="Sanjeev Kumar Sharma ">
<span class="material-input"></span></div></div>
  <div class="col-sm-4">
<div class="form-group label-floating ">
<label class="control-label">Family Contact Number 1</label>
<input type="number" maxlength="10" class="form-control" id="fnum1" value="919871577773">
<span class="material-input"></span></div></div>
<div class="col-sm-4">
<div class="form-group label-floating ">

    <label class="control-label">Relation With Contact 1</label>
                <select id="fr1" name="familyemergcontactonerelation" class="form-control">
  <option value="" selected="selected"></option>
  <option value="Father">Father</option>
  <option value="Mother">Mother</option>
  <option value="Son">Son</option>
  <option value="Daughter">Daughter</option>
  <option value="Husband">Husband</option>
  <option value="Wife">Wife</option>
  <option value="Brother">Brother</option>
  <option value="Sister">Sister</option>
  <option value="GrandFather">Grand Father</option>
  <option value="GrandMother">Grand Mother</option>
  <option value="GrandSon">Grand Son</option>
  <option value="GrandDaughter">Grand Daughter</option>
  <option value="Uncle">Uncle</option>
  <option value="Aunt">Aunt</option>
  <option value="Nephew">Nephew</option>
  <option value="Niece">Niece</option>
  <option value="FatherInLaw">Father In Law</option>
  <option value="MotherInLaw">Mother In Law</option>
  <option value="BrotherInLaw">Brother In Law</option>
  <option value="SisterInLaw">Sister In Law</option>
  <option value="SonInLaw">Son In Law</option>
  <option value="DaughterInLaw">Daughter In Law</option>
  </select>

<span class="material-input"></span></div>
</div>





    </div>


         <div class="head head-primary text-center">
  	                        <h3 style="margin: 0px 0 0px;"><span><i class="fa fa-doctor"></i>Family Contact Details(SECONDARY)</span></h3>
  	                    </div>
  <div class="row" style="padding: 5px;">



    <div class="col-sm-4">
<div class="form-group label-floating ">
<label class="control-label">Family Name 2</label>
<input type="name" class="form-control" id="fnam2" value="Simit Thakur ">
<span class="material-input"></span></div></div>
<div class="col-sm-4">
<div class="form-group label-floating ">
<label class="control-label">Family Contact Number 2</label>
<input type="number" maxlength="10" class="form-control" id="fnum2" value="9820047129">
<span class="material-input"></span></div>
</div>
<div class="col-sm-4">
<div class="form-group label-floating ">

    <label class="control-label">Relation With Contact 2</label>
                <select id="fr2" name="familyemergcontactonerelation" class="form-control">
  <option value="" selected="selected"></option>
  <option value="Father">Father</option>
  <option value="Mother">Mother</option>
  <option value="Son">Son</option>
  <option value="Daughter">Daughter</option>
  <option value="Husband">Husband</option>
  <option value="Wife">Wife</option>
  <option value="Brother">Brother</option>
  <option value="Sister">Sister</option>
  <option value="GrandFather">Grand Father</option>
  <option value="GrandMother">Grand Mother</option>
  <option value="GrandSon">Grand Son</option>
  <option value="GrandDaughter">Grand Daughter</option>
  <option value="Uncle">Uncle</option>
  <option value="Aunt">Aunt</option>
  <option value="Nephew">Nephew</option>
  <option value="Niece">Niece</option>
  <option value="FatherInLaw">Father In Law</option>
  <option value="MotherInLaw">Mother In Law</option>
  <option value="BrotherInLaw">Brother In Law</option>
  <option value="SisterInLaw">Sister In Law</option>
  <option value="SonInLaw">Son In Law</option>
  <option value="DaughterInLaw">Daughter In Law</option>
  </select>

<span class="material-input"></span></div>
</div>
    </div>


       <div class="head head-primary text-center">
  	                        <h3 style="margin: 0px 0 0px;"><span><i class="fa fa-doctor"></i>FRIEND Contact Details(PRIMARY)</span></h3>
  	                    </div>
  <div class="row" style="padding: 5px;">



      <div class="col-sm-4">
<div class="form-group label-floating ">
<label class="control-label">Friend's Name 1</label>
<input type="name" class="form-control" id="frn1" value="Anil Kumar Sharma ">
<span class="material-input"></span></div></div>
<div class="col-sm-4">
<div class="form-group label-floating ">
<label class="control-label">Friend's Contact Number 1</label>
<input type="number" maxlength="10" class="form-control" id="frnum1" value="918126314314">
<span class="material-input"></span></div></div>



    </div>


       <div class="head head-primary text-center">
  	                        <h3 style="margin: 0px 0 0px;"><span><i class="fa fa-doctor"></i>FRIEND Contact Details(SECONDARY)</span></h3>
  	                    </div>
  <div class="row" style="padding: 5px;">

     <div class="col-sm-4">
<div class="form-group label-floating ">
<label class="control-label">Friend's Name 2</label>
<input type="name" class="form-control" id="frn2" value="S.k.Sharma">
<span class="material-input"></span></div></div>
<div class="col-sm-4">
<div class="form-group label-floating ">
<label class="control-label">Friend's Contact Number 2</label>
<input type="number" maxlength="10" class="form-control" id="frnum2" value="919810650140">
<span class="material-input"></span></div></div>


    </div>
      <div class="row">
        <div id="result1234">

      </div>
      </div>

    <center> <button type="button" id="pdetailsfilleme" class="btn btn-primary btn-lg">
      <i class="fa fa-upload"></i> UPDATE AND PROCEED
      </button></center>
  </div>

          <form></form>

                          <button id="activate-step-4" class="btn btn-primary btn-md">Activate Step 4</button>
                      </div>
                  </div>
              </div>

              <div class="row setup-content" id="step-4">
                  <div class="col-xs-12">
                      <div class="col-md-12 well text-center">
                          <h1 class="text-center"> STEP 4</h1>

          <form></form>

                      </div>
                  </div>
              </div>





        </div>
    </div>
@stop

@section('javascript')


    <script>


    // Activate Next Step

    $(document).ready(function() {

        var navListItems = $('ul.setup-panel li a'),
            allWells = $('.setup-content');

        allWells.hide();

        navListItems.click(function(e)
        {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this).closest('li');

            if (!$item.hasClass('disabled')) {
                navListItems.closest('li').removeClass('active');
                $item.addClass('active');
                allWells.hide();
                $target.show();
            }
        });

        $('ul.setup-panel li.active a').trigger('click');

        // DEMO ONLY //
        $('#activate-step-2').on('click', function(e) {
            $('ul.setup-panel li:eq(1)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-2"]').trigger('click');
            $(this).remove();
        })

        $('#activate-step-3').on('click', function(e) {
            $('ul.setup-panel li:eq(2)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-3"]').trigger('click');
            $(this).remove();
        })

        $('#activate-step-4').on('click', function(e) {
            $('ul.setup-panel li:eq(3)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-4"]').trigger('click');
            $(this).remove();
        })

        $('#activate-step-3').on('click', function(e) {
            $('ul.setup-panel li:eq(2)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-3"]').trigger('click');
            $(this).remove();
        })
    });


    // Add , Dlelete row dynamically

         $(document).ready(function(){
          var i=1;
         $("#add_row").click(function(){
          $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='sur"+i+"' type='text' placeholder='Surname'  class='form-control input-md'></td><td><input  name='email"+i+"' type='text' placeholder='Email'  class='form-control input-md'></td>");

          $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
          i++;
      });
         $("#delete_row").click(function(){
        	 if(i>1){
    		 $("#addr"+(i-1)).html('');
    		 i--;
    		 }
    	 });

    });


    </script>
@endsection
