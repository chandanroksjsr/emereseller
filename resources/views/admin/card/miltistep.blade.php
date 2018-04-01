@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

<style>

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}

legend {
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 15px;
    line-height: inherit;
    color: #333;
    font-weight: 600;
    border: 0;
    border-bottom: 1px solid #e5e5e5;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 3px;
    font-weight: 600;
}
</style>
<div id="snackbar"></div>
<div class="row">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1- Personal Details</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2- Medical Details</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3- Emergency Contacts</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
            <p>Step 4- Card Profile Pic</p>
        </div>
    </div>
</div>

    <div class="row setup-content" id="step-1">

            <div class="col-xs-12">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form role="form" id="personal_details">
                                <div class="col-md-12">
                                 <input type="hidden" name="card_id" value="{{ $card_id }}">
             <fieldset>
                <legend>Basic Details</legend>
                <div class="col-sm-3 col-xs-12">
                    <div class="form-group">
                      <label class="control-label">First Name</label>
                      <input type="text" id="first_name" name="first_name" class="form-control"value="{{ $card_personal_details['first_name'] }}" placeholder="First Name" required="required">
                    </div>
                </div>

                <div class="col-sm-3 col-xs-12">
                    <div class="form-group">
                      <label class="control-label">Last Name</label>
                      <input type="text" id="last_name" name="last_name" value="{{ $card_personal_details['last_name'] }}" class="form-control" placeholder="Last Name" required="required">
                    </div>
                </div>

                <div class="col-sm-3 col-xs-12">
                    <div class="form-group">
                      <label class="control-label">Display Name</label>
                      <input type="text" id="display_name" name="display_name" value="{{ $card_personal_details['display_name'] }}" class="form-control" placeholder="Display Name" required="required">
                    </div>
                </div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Email</label>
                      <input type="text" id="email" class="form-control"name="email"  value="{{ $card_personal_details['email'] }}" placeholder="Email ID" required="required">
                  </div>
                </div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Mobile</label>
                      <input type="text" id="mobile" class="form-control" name="mobile" value="{{ $card_personal_details['mobile'] }}" placeholder="Mobile No." required="required">
                  </div>
                </div>

                <div class="col-sm-3 col-xs-12">
                   <div class="form-group">
                     <label class="control-label">Land Line</label>
                     <input type="text" id="land_line" class="form-control" name="landline" value="{{ $card_personal_details['landline'] }}" placeholder="Land Line">
                   </div>
                </div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Office Phone</label>
                      <input type="text" id="office_phone" class="form-control" name="officephone" value="{{ $card_personal_details['officephone'] }}" placeholder="Office Phone" >
                  </div>
                </div>

                  <div class="col-sm-3 col-xs-12">
                   <div class="form-group">
                       <label class="control-label">Aadhaar Number</label>
                      <input type="text" id="aadhaar" class="form-control" name="aadhaar" value="{{ $card_personal_details['aadhaar'] }}" placeholder="Aadhaar Number">
                   </div>
                  </div>

                  <div class="col-sm-6 col-xs-12">
                      <label>Birthday:</label>
                    <div class="form-group">
                      <div class="col-sm-4">
                                <label class="control-label"><small>Month</small></label>
                                     <select name='month' id='monthddl' class="form-control">
                                     <option value='01'  {{ ($birthday['month']=='01')?'selected':'' }}>JANUARY</option>
                                     <option value='02' {{ ($birthday['month']=='02')?'selected':'' }}>FEBURARY</option>
                                     <option value='03' {{ ($birthday['month']=='03')?'selected':'' }}>MARCH</option>
                                     <option value='04' {{ ($birthday['month']=='04')?'selected':'' }}>APRIL</option>
                                     <option value='05' {{ ($birthday['month']=='05')?'selected':'' }}>MAY</option>
                                     <option value='06' {{ ($birthday['month']=='06')?'selected':'' }}>JUNE</option>
                                     <option value='07' {{ ($birthday['month']=='07')?'selected':'' }}>JULY</option>
                                     <option value='08' {{ ($birthday['month']=='08')?'selected':'' }}>AUGUST</option>
                                     <option value='09' {{ ($birthday['month']=='09')?'selected':'' }}>SEPTEMBER</option>
                                     <option value='10' {{ ($birthday['month']=='10')?'selected':'' }}>OCTOBER</option>
                                     <option value='11' {{ ($birthday['month']=='11')?'selected':'' }}>NOVEMBER</option>
                                     <option value='12' {{ ($birthday['month']=='12')?'selected':'' }}>DECEMBER</option>
                                     </select>
                      </div>



                       <div class="col-sm-3">
                                <label class="control-label"><small>Day</small></label>
                                    <select name='day' id='dayddl' class="form-control">
                                 @for($i = 01;$i<=31;$i++)
                                    <option value='{{$i}}' {{ ($birthday['day']==$i)?'selected':'' }}>{{$i}}</option>
                                 @endfor

                                    </select>
                       </div>


                        <div class="col-sm-3">
                                      <label class="control-label"><small>Year</small></label>
                                    <select name='year' id='blah' class="form-control">
                                @for($i = 1947;$i<=2018;$i++)
                                         <option value='{{$i}}' {{ ($birthday['year']==$i)?'selected':'' }}>{{$i}}</option>
                                @endfor
                                  </select>
                        </div>

                                       </div>



                  </div>

                                <div class="col-sm-6 col-xs-12">
                                  <div class="form-group">
                                      <label class="control-label">Gender</label>
                                      <div class="radio">
                                        <label>
                                        <input type="radio" id="gender" name="gender" class="minimal" value="Male" required="required" {{ ($card_personal_details['gender']=='Male')?'checked':'' }} >
                                        Male
                                        </label>
                                        <label>
                                        <input type="radio" id="gender" name="gender" class="minimal" value="Female" required="required"  {{ ($card_personal_details['gender']=='Female')?'checked':'' }} >
                                        Female
                                        </label>
                                        <label>
                                        <input type="radio" id="gender" name="gender" class="minimal" value="TransGender" required="required"  {{ ($card_personal_details['gender']=='TransGender')?'checked':'' }} >
                                        Transgender
                                        </label>
                                        </div>
                                      </div>

                                </div>

             </fieldset>

                                </div>

                                <div class="col-md-12">
             <fieldset>

                    <legend>Permanent Address</legend>
                <div class="col-sm-3 col-xs-12">
                   <div class="form-group">
                      <label class="control-label">Door Number.</label>
                    <input type="text" id="doorno" class="form-control" value="{{ $card_personal_details['doorno'] }}" name="doorno" placeholder="Door Number" required="required">
                   </div>
                </div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Building/Street Name</label>
                    <input type="text" id="building_street" class="form-control" name="buildingstreet" placeholder="Building/Street Name"  value="{{ $card_personal_details['buildingstreet'] }}"  required="required">
                </div></div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Area/Locality </label>
                  <input type="text" id="area_locality" class="form-control" name="arealocality" placeholder="Area/Locality Name"  value="{{ $card_personal_details['arealocality'] }}"  required="required" >
                </div></div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">City</label>
                  <input type="text" id="city" class="form-control" placeholder="City"  value="{{ $card_personal_details['city'] }}"  name="city" required="required">
                </div>
                </div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                  <label>State:</label>
                  <select class="form-control select2" style="width: 100%;" name="State" placeholder="Select One"  value="{{ $card_personal_details['state'] }}" >
    <option value="" {{ ($card_personal_details['state']=='')?'selected':'' }}>---SELECT ONE---</option>
    <option value="Andaman and Nicobar Islands" {{ ($card_personal_details['state']=='Andaman and Nicobar Islands')?'selected':'' }}>Andaman and Nicobar Islands</option>
    <option value="Andhra Pradesh" {{ ($card_personal_details['state']=='Andhra Pradesh')?'selected':'' }}>Andhra Pradesh</option>
    <option value="Arunachal Pradesh" {{ ($card_personal_details['state']=='Arunachal Pradesh')?'selected':'' }}>Arunachal Pradesh</option>
    <option value="Assam" {{ ($card_personal_details['state']=='Assam')?'selected':'' }}>Assam</option>
    <option value="Bihar" {{ ($card_personal_details['state']=='Bihar')?'selected':'' }}>Bihar</option>
    <option value="Chandigarh" {{ ($card_personal_details['state']=='Chandigarh')?'selected':'' }}>Chandigarh</option>
    <option value="Chhattisgarh" {{ ($card_personal_details['state']=='Chhattisgarh')?'selected':'' }}>Chhattisgarh</option>
    <option value="Dadra and Nagar Haveli" {{ ($card_personal_details['state']=='Dadra and Nagar')?'selected':'' }}>Dadra and Nagar Haveli</option>
    <option value="Daman and Diu" {{ ($card_personal_details['state']=='Daman and Diu')?'selected':'' }}>Daman and Diu</option>
    <option value="Delhi" {{ ($card_personal_details['state']=='Delhi')?'selected':'' }}>Delhi</option>
    <option value="Goa" {{ ($card_personal_details['state']=='Goa')?'selected':'' }}>Goa</option>
    <option value="Gujarat" {{ ($card_personal_details['state']=='Gujarat')?'selected':'' }}>Gujarat</option>
    <option value="Haryana"{{ ($card_personal_details['state']=='Haryana')?'selected':'' }}>Haryana</option>
    <option value="Himachal Pradesh" {{ ($card_personal_details['state']=='Himachal Pradesh')?'selected':'' }}>Himachal Pradesh</option>
    <option value="Jammu and Kashmir" {{ ($card_personal_details['state']=='Jammu and Kashmir')?'selected':'' }}>Jammu and Kashmir</option>
    <option value="Jharkhand" {{ ($card_personal_details['state']=='Jharkhand')?'selected':'' }}>Jharkhand</option>
    <option value="Karnataka" {{ ($card_personal_details['state']=='Karnataka')?'selected':'' }}>Karnataka</option>
    <option value="Kerala" {{ ($card_personal_details['state']=='Kerala')?'selected':'' }}>Kerala</option>
    <option value="Lakshadweep"  {{ ($card_personal_details['state']=='Lakshadweep')?'selected':'' }}>Lakshadweep</option>
    <option value="Madhya Pradesh"  {{ ($card_personal_details['state']=='Madhya Pradesh')?'selected':'' }}>Madhya Pradesh</option>
    <option value="Maharashtra"  {{ ($card_personal_details['state']=='Maharashtra')?'selected':'' }}>Maharashtra</option>
    <option value="Manipur"  {{ ($card_personal_details['state']=='Manipur')?'selected':'' }}>Manipur</option>
    <option value="Meghalaya"  {{ ($card_personal_details['state']=='Meghalaya')?'selected':'' }}>Meghalaya</option>
    <option value="Mizoram"  {{ ($card_personal_details['state']=='Mizoram')?'selected':'' }}>Mizoram</option>
    <option value="Nagaland"  {{ ($card_personal_details['state']=='Nagaland')?'selected':'' }}>Nagaland</option>
    <option value="Orissa"  {{ ($card_personal_details['state']=='Orissa')?'selected':'' }}>Orissa</option>
    <option value="Pondicherry"  {{ ($card_personal_details['state']=='Pondicherry')?'selected':'' }}>Pondicherry</option>
    <option value="Punjab"  {{ ($card_personal_details['state']=='Punjab')?'Punjab':'' }}>Punjab</option>
    <option value="Rajasthan"  {{ ($card_personal_details['state']=='Rajasthan')?'selected':'' }}>Rajasthan</option>
    <option value="Sikkim"  {{ ($card_personal_details['state']=='Sikkim')?'selected':'' }}>Sikkim</option>
    <option value="Tamil Nadu"  {{ ($card_personal_details['state']=='Tamil Nadu')?'selected':'' }}>Tamil Nadu</option>
    <option value="Tripura"  {{ ($card_personal_details['state']=='Tripura')?'selected':'' }}>Tripura</option>
    <option value="Uttaranchal"  {{ ($card_personal_details['state']=='Uttaranchal')?'selected':'' }}>Uttaranchal</option>
    <option value="Uttar Pradesh"  {{ ($card_personal_details['state']=='Uttar Pradesh')?'selected':'' }}>Uttar Pradesh</option>
    <option value="West Bengal"  {{ ($card_personal_details['state']=='West Bengal')?'selected':'' }}>West Bengal</option>
    <option value="Telangana"  {{ ($card_personal_details['state']=='Telangana')?'selected':'' }}>Telangana</option>
                  </select>

                </div></div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Area Pin</label>
                  <input type="text" id="pincode" class="form-control" placeholder="Area Pin Code"  value="{{ $card_personal_details['pincode'] }}" name="pincode" required="required">
                </div>
</div>
                <div class="col-sm-12 col-xs-12 text-center">
                  <button class="btn btn-primary btn-lg pull-center" id="subp"  type="submit" ><b>Save & Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i> </button>
                  <button class="nextBtn" type="button" id="personal_detailsa" style="display:none;"></button>

                </div>







</fieldset>
                                </div>

                            </form>

</div>
</div>

            </div>
        </div>
    </div>
  </div>
    <div class="row setup-content" id="step-2">
      <div class="col-xs-12">
          <div class="col-md-12">
              <!-- <center><b><h4>Medical Details</h4></b></center> -->
              <div class="panel panel-default">
                <div class="panel-heading">Medical Profile of your's for Doctors</div>
                <div class="panel-body">
              <form role="form" id="medical_details_submit">
              <input type="hidden" name="card_id" value="{{ $card_id }}">
<div class="col-md-12">
  <div class="row" style="padding: 5px;">

    <fieldset>
      <legend>Medical Profile</legend>
<div class="col-md-3">

<div class="form-group label-floating ">
<label class="control-label">Blood Group</label>
<select class="form-control" name="blood_group" id="bg" required>
<option value=""  {{ ($card_medical_details['blood_group']=='')?'selected':'' }}></option>
<option value="A+" {{ ($card_medical_details['blood_group']=='A+')?'selected':'' }}>A+ve</option>
<option value="A-" {{ ($card_medical_details['blood_group']=='A-')?'selected':'' }}>A-ve</option>
<option value="B+" {{ ($card_medical_details['blood_group']=='B+')?'selected':'' }}>B+ve</option>
<option value="B-" {{ ($card_medical_details['blood_group']=='B-')?'selected':'' }}>B-ve</option>
<option value="AB+" {{ ($card_medical_details['blood_group']=='AB+')?'selected':'' }}>AB+ve</option>
<option value="AB-" {{ ($card_medical_details['blood_group']=='AB-')?'selected':'' }}>AB-ve</option>
<option value="O+" {{ ($card_medical_details['blood_group']=='O+')?'selected':'' }}>O+ve</option>
<option value="O-" {{ ($card_medical_details['blood_group']=='O-')?'selected':'' }}>O-ve</option>
</select>
<span class="material-input"></span></div>
</div>

<div class="col-sm-4">

<label class="control-label"><b>Are You a  blood Donor?</b></label>
<div class="radio">

<label>
<input type="radio" name="blood_donor" value="YES"  class="minimal"  {{ ($card_medical_details['blood_donor']=='YES' || $card_medical_details['blood_donor']=='yes' || $card_medical_details['blood_donor']=='Yes')?'checked':'' }} required>
Yes
</label>

<label>
<input type="radio" name="blood_donor" class="minimal" value="NO" {{ ($card_medical_details['blood_donor']=='NO' || $card_medical_details['blood_donor']== 'no' || $card_medical_details['blood_donor']== 'No')?'checked':'' }}>
No
</label>
</div>

</div>
</fieldset>
</div>


<div class="row">

<fieldset>
  <legend>Critical Medical Condition</legend>







      <div class="col-sm-4">

      <label class="control-label"><b>Any Blood Pressure issues?</b></label>
      <div class="radio">

      <label>
      <input type="radio" name="blood_pressure" class="minimal" value="HIGH" {{ ($card_medical_details['blood_pressure']=='HIGH' ||$card_medical_details['blood_pressure']=='high')?'checked':'' }} required>
      High
      </label>

      <label>
      <input type="radio" name="blood_pressure" class="minimal" value="LOW" {{ ($card_medical_details['blood_pressure']=='LOW' || $card_medical_details['blood_pressure']=='low')?'checked':'' }}>
      Low
      </label>
  <!--     <label>
      <input type="radio" name="bp" value="No Issues">Dont Know
      No issues
      </label> -->
      <label>
      <input type="radio" name="blood_pressure" class="minimal" value="DONT KNOW" {{ ($card_medical_details['blood_pressure']=='DONT KNOW' || $card_medical_details['blood_pressure']=='Dont Know' || $card_medical_details['blood_pressure']=='No Issues' || $card_medical_details['blood_pressure']=='dk' ||$card_medical_details['blood_pressure']=='DK' ||$card_medical_details['blood_pressure']=='No')?'checked':'' }}>
      Don't Know
      </label>
      </div>


      </div>

      <div class="col-sm-4">

      <label class="control-label"><b>Any Heart related issues?</b></label>
      <div class="radio">

      <label>
      <input type="radio" name="heart_issue" class="minimal" value="YES" {{ ($card_medical_details['heart_issue']=='YES' ||$card_medical_details['heart_issue']=='yes'||$card_medical_details['heart_issue']=='Yes')?'checked':'' }} required>
      Yes
      </label>

  <!--     <label>
      <input type="radio" name="hr" class="minimal value="No">
      No
      </label>
   -->
      <label>
      <input type="radio" name="heart_issue" class="minimal" value="DONT KNOW" {{ ($card_medical_details['heart_issue']=='DK' || $card_medical_details['heart_issue']=='DONT KNOW'|| $card_medical_details['heart_issue']=='dk' || $card_medical_details['heart_issue']=='No Issues'|| $card_medical_details['heart_issue']=='No' || $card_medical_details['blood_donor']=='no')?'checked':'' }}>
      Don't Know
      </label>
      </div>

      </div>
        <div class="col-sm-4">

      <label class="control-label"><b>Are You Disabled? </b></label>
      <div class="radio">

      <label>
      <input type="radio" name="DISABLED" class="minimal" value="YES" {{ ($card_medical_details['DISABLED']=='YES' || $card_medical_details['DISABLED']=='yes'|| $card_medical_details['DISABLED']=='Yes')?'checked':'' }} required>
      Yes
      </label>

      <label>
      <input type="radio" name="DISABLED" class="minimal" value="NO" {{ ($card_medical_details['DISABLED']=='NO' || $card_medical_details['DISABLED']=='no'|| $card_medical_details['DISABLED']=='No')?'checked':'' }} >
      No
      </label>
      </div>
     </div>


























    <div class="col-sm-4">

    <label class="control-label"><b>You have Diabetes?</b></label>
    <div class="radio">

    <label>
    <input type="radio" name="diabetes" class="minimal" value="YES" {{ ($card_medical_details['diabetes']=='YES' || $card_medical_details['diabetes']=='yes'|| $card_medical_details['diabetes']=='Yes')?'checked':'' }} required>
    Yes
    </label>

<!--     <label>
    <input type="radio" name="db" value="no">
    No
    </label>
 -->
    <label>
    <input type="radio" name="diabetes" class="minimal" value="DONT KNOW" {{ ($card_medical_details['diabetes']=='DONT KNOW' || $card_medical_details['diabetes']=='DK' || $card_medical_details['diabetes']=='dk' || $card_medical_details['diabetes']=='no' || $card_medical_details['diabetes']=='No')?'checked':'' }} >
    Don't Know
    </label>
    </div>




    </div>

    <div class="col-sm-4">

    <label class="control-label"><b>You have Epilepsy? <a data-toggle="tooltip" dataplacement="top" title="" data-original-title="A disorder in which nerve cell activity in the brain is disturbed, causing seizures."> <i class="fa fa-question-circle"></i></a></b></label>
    <div class="radio">

    <label>
    <input type="radio" name="epilepsy" class="minimal" value="YES" {{ ($card_medical_details['epilepsy']=='YES' || $card_medical_details['epilepsy']=='yes' || $card_medical_details['epilepsy']=='Yes')?'checked':'' }} required>
    Yes
    </label>

<!--     <label>
    <input type="radio" name="ep" value="No">
    No
    </label> -->

    <label>
    <input type="radio" name="epilepsy" class="minimal" value="DONT KNOW" {{ ($card_medical_details['epilepsy']=='DONT KNOW' || $card_medical_details['epilepsy']=='DK' || $card_medical_details['epilepsy']=='dk' || $card_medical_details['epilepsy']=='No' || $card_medical_details['epilepsy']=='no')?'checked':'' }}>
    Don't Know
    </label>
    </div>




    </div>


    <div class="col-sm-4">

    <label class="control-label"><b>You have Asthma? <a data-toggle="tooltip" dataplacement="top" title="" data-original-title="A condition in which a person's airways become inflamed, narrow and swell and produce extra mucus, which makes it difficult to breathe."> <i class="fa fa-question-circle"></i></a></b></label>
    <div class="radio">

    <label>
    <input type="radio" name="asthama" class="minimal" value="YES" {{ ($card_medical_details['asthama']=='YES' || $card_medical_details['asthama']=='yes'|| $card_medical_details['asthama']=='Yes')?'checked':'' }} required>
    Yes
    </label>

<!--     <label>
    <input type="radio" name="as" value="No">
    No
    </label> -->

    <label>
    <input type="radio" name="asthama" class="minimal" value="DONT KNOW" {{ ($card_medical_details['asthama']=='DONT KNOW' || $card_medical_details['asthama']=='DK' || $card_medical_details['asthama']=='dk' || $card_medical_details['asthama']=='no' || $card_medical_details['asthama']=='No')?'checked':'' }}>
    Don't Know
    </label>
    </div>




    </div>


        <div class="col-sm-4">

        <label class="control-label"><b>You have Mental Illness? <a data-toggle="tooltip" dataplacement="top" title="" data-original-title="A wide range of conditions that affect mood, thinking and behaviour."> <i class="fa fa-question-circle"></i></a></b></label>
        <div class="radio">

        <label>
        <input type="radio" name="mental_illness" class="minimal" value="YES"  {{ ($card_medical_details['mental_illness']=='YES' || $card_medical_details['mental_illness']=='yes'|| $card_medical_details['mental_illness']=='Yes')?'checked':'' }} required>
        Yes
        </label>

    <!--     <label>
        <input type="radio" name="il" value="No">
        No
        </label> -->

        <label>
        <input type="radio" name="mental_illness" class="minimal" value="DONT KNOW" {{ ($card_medical_details['mental_illness']=='DONT KNOW' || $card_medical_details['mental_illness']=='DK' || $card_medical_details['mental_illness']=='dk' || $card_medical_details['mental_illness']=='No' || $card_medical_details['mental_illness']=='no')?'checked':'' }}>
        Don't Know
        </label>
        </div>




        </div>

        <div class="col-sm-4">

        <label class="control-label"><b>You have TB(Tuberculosis)? <a data-toggle="tooltip" dataplacement="top" title="" data-original-title="A potentially serious infectious bacterial disease that mainly affects the lungs."> <i class="fa fa-question-circle"></i></a></b></label>
        <div class="radio">

        <label>
        <input type="radio" name="tb" class="minimal" value="YES" {{ ($card_medical_details['tb']=='YES' || $card_medical_details['tb']=='yes')?'checked':'' }} required>
        Yes
        </label>

    <!--     <label>
        <input type="radio" name="tb" value="No">
        No
        </label>
     -->
        <label>
        <input type="radio" name="tb" class="minimal" value="DONT KNOW" {{ ($card_medical_details['tb']=='DONT KNOW' ||$card_medical_details['tb']=='No Issues'||$card_medical_details['tb']=='Dont Know' || $card_medical_details['tb']=='DK' || $card_medical_details['tb']=='No' || $card_medical_details['tb']=='dk' || $card_medical_details['tb']=='no')?'checked':'' }}><span class="circle" ></span><span class="check"></span>
        Don't Know
        </label>
        </div>




        </div>


        <div class="col-sm-4">

        <label class="control-label"><b>You have Dyslipidemia? <a data-toggle="tooltip" dataplacement="top" title="" data-original-title="Dyslipidemia can increase the risk of coronary artery disease (CAD) and peripheral arterial disease. Symptoms of peripheral arterial disease include intermittent claudication (pain, numbness, aching, or heaviness in the leg muscles during movement and/or cramping in the legs, buttocks, thighs, calves, or feet)."> <i class="fa fa-question-circle"></i></a></b></label>
        <div class="radio">

        <label>
        <input type="radio" name="dyslipidemia"  class="minimal" value="YES" {{ ($card_medical_details['dyslipidemia']=='YES' || $card_medical_details['dyslipidemia']=='yes'|| $card_medical_details['dyslipidemia']=='Yes')?'checked':'' }} required>
        Yes
        </label>

    <!--     <label>
        <input type="radio" name="dy" value="No">
        No
        </label> -->

        <label>
        <input type="radio" name="dyslipidemia" class="minimal"  value="DONT KNOW" {{ ($card_medical_details['dyslipidemia']=='DONT KNOW' || $card_medical_details['dyslipidemia']=='DK' || $card_medical_details['dyslipidemia']=='dk' || $card_medical_details['dyslipidemia']=='no' || $card_medical_details['dyslipidemia']=='No')?'checked':'' }}>
        Don't Know
        </label>
        </div>

    </div>



















</fieldset>











<fieldset>
  <legend>Medication Details</legend>



       <div class="col-sm-4">

    <label class="control-label"><b>Do you take NSAIDS? </b></label>
    <div class="radio">
    <label>
    <input type="radio" name="NSAIDS" class="minimal" value="YES" {{ ($card_medical_details['NSAIDS']=='YES' || $card_medical_details['NSAIDS']=='yes' || $card_medical_details['NSAIDS']=='Yes')?'checked':'' }} required>
    Yes
    </label>
    <label>
    <input type="radio" name="NSAIDS" class="minimal" value="NO" {{ ($card_medical_details['NSAIDS']=='NO' || $card_medical_details['NSAIDS']=='no' || $card_medical_details['NSAIDS']=='No')?'checked':'' }}>
    No
    </label>
    </div>
   </div>

      <div class="col-sm-4">

    <label class="control-label"><b>Do you take STEROIDS? </b></label>
    <div class="radio">

    <label>
    <input type="radio" name="STEROIDS" class="minimal" value="YES" {{ ($card_medical_details['STEROIDS']=='YES' || $card_medical_details['STEROIDS']=='yes' || $card_medical_details['STEROIDS']=='Yes')?'checked':'' }} required>
    Yes
    </label>

    <label>
    <input type="radio" name="STEROIDS" class="minimal" value="NO" {{ ($card_medical_details['STEROIDS']=='NO' || $card_medical_details['STEROIDS']=='no'|| $card_medical_details['STEROIDS']=='No')?'checked':'' }}>
    No
    </label>
    </div>




    </div>




      <div class="col-sm-4">

    <label class="control-label"><b>Do you take ANTICOGULANT?</b></label>
    <div class="radio">

    <label>
    <input type="radio" name="ANTICOGULANT" class="minimal" value="YES" {{ ($card_medical_details['ANTICOGULANT']=='YES' || $card_medical_details['ANTICOGULANT']=='yes' ||  $card_medical_details['ANTICOGULANT']=='Yes')?'checked':'' }} required>
    Yes
    </label>

    <label>
    <input type="radio" name="ANTICOGULANT" class="minimal" value="NO" {{ ($card_medical_details['ANTICOGULANT']=='NO' || $card_medical_details['ANTICOGULANT']=='no' ||  $card_medical_details['ANTICOGULANT']=='No')?'checked':'' }}>
    No
    </label>
    </div>
    </div>

         <div class="col-sm-4">

    <label class="control-label"><b>Any History Of Surgery? </b></label>
    <div class="radio">

    <label>
    <input type="radio" name="SURGERY" class="minimal" value="YES" {{ ($card_medical_details['SURGERY']=='YES' || $card_medical_details['SURGERY']=='yes'|| $card_medical_details['SURGERY']=='Yes')?'checked':'' }} required>
    Yes
    </label>

    <label>
    <input type="radio" name="SURGERY" class="minimal" value="NO"  {{ ($card_medical_details['SURGERY']=='NO' || $card_medical_details['SURGERY']=='no' || $card_medical_details['SURGERY']=='No')?'checked':'' }}>
    No
    </label>
    </div>
    </div>
      <div class="col-sm-8">

    <label class="control-label"><b>Any History Of Organ Implant?</b></label>
    <div class="radio">

    <label>
    <input type="radio" name="IMPLANT"  class="minimal" value="YES" {{ ($card_medical_details['IMPLANT']=='YES' ||$card_medical_details['IMPLANT']=='yes' || $card_medical_details['IMPLANT']=='Yes')?'checked':'' }} required>
    Yes
    </label>

    <label>
    <input type="radio" name="IMPLANT"  class="minimal" value="NO" {{ ($card_medical_details['IMPLANT']=='NO' || $card_medical_details['IMPLANT']=='no'||$card_medical_details['IMPLANT']=='No')?'checked':'' }} >
    No
    </label>
    </div>
    </div>


   <!-- <div class="col-sm-12 text-center">
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

    <input type="radio" id="don" name="don" value="Yes" onclick="handleClick();">
   I Agree
    </label>

    <label>
    <input type="radio" id="don" name="don" value="No" >
  I Disagree
    </label>
    </div>
    </div>


     <div class="col-sm-12 text-center">

    <label class="control-label"><b>Do You Have Medical Insurance? </b></label>
    <div class="radio">

    <label>
    <input type="radio" name="ins" value="Yes" onclick="handleClick1();">
    Yes
    </label>

    <label>
    <input type="radio" name="ins" value="No" >
    No
    </label>
    </div>
    </div> -->







<!--           <div class="col-sm-4">

    <label class="control-label"><b>Any History Of Surgery? </b></label>
    <div class="radio">

    <label>
    <input type="radio" name="surg" value="Yes" onclick="handleClick2();">
    Yes
    </label>

    <label>
    <input type="radio" name="surg" value="No">
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
    <input type="radio" name="orgim" value="No">
    No
    </label>
    </div>
    </div> -->

</fieldset>
    <div class="col-sm-12 col-xs-12 text-center">
      <button class="btn btn-primary btn-lg pull-center" id="subm"  type="submit" ><b>Save & Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i> </button>
      <button class="nextBtn" type="button" id="medical_detailsa" style="display:none;"></button>

    </div>

</div>


</div>


</form>

    </div>







</div>
</div>
</div>
</div>
<div class="row setup-content" id="step-3">

      <div class="col-md-12">
        <div class="col-xs-12">
          <!-- <center><b><h4>Emergency Contacts</h4></b></center> -->
          <div class="panel panel-default">
            <div class="panel-heading">Emergency Contacts( for throwing SOS when your card is scanned by doctor or bystander)</div>
            <div class="panel-body">
          <form role="form" id="emergency_contact_submit">
          <input type="hidden" name="card_id1" id="" value="{{ $card_id }}">



<div class="col-md-12">
  <fieldset>
    <legend>Family Contact Primary</legend>
  <div class="row" style="padding: 5px;">

       <div class="col-sm-4">
  <div class="form-group label-floating ">
  <label class="control-label">Family Name 1</label>
  <input type="name" class="form-control" id="fnam1" name="family_name1" value="{{ $card_emergency_contacts['family_name1'] }}" required>
  <span class="material-input"></span></div></div>
    <div class="col-sm-4">
  <div class="form-group label-floating ">
  <label class="control-label">Family Contact Number 1</label>
  <input type="number" maxlength="10" class="form-control" name="family_number1" id="fnum1" value="{{ $card_emergency_contacts['family_number1'] }}" required>
  <span class="material-input"></span></div></div>
  <div class="col-sm-4">
  <div class="form-group label-floating ">

      <label class="control-label">Relation With Contact 1</label>
                  <select id="fr1" name="family_relation1" class="form-control">
    <option value="" {{ ($card_emergency_contacts['family_relation1']=='')?'selected':'' }}></option>
    <option value="Father" {{ ($card_emergency_contacts['family_relation1']=='Father')?'selected':'' }}>Father</option>
    <option value="Mother" {{ ($card_emergency_contacts['family_relation1']=='Mother')?'selected':'' }}>Mother</option>
    <option value="Son" {{ ($card_emergency_contacts['family_relation1']=='Son')?'selected':'' }}>Son</option>
    <option value="Daughter" {{ ($card_emergency_contacts['family_relation1']=='Daughter')?'selected':'' }} >Daughter</option>
    <option value="Husband" {{ ($card_emergency_contacts['family_relation1']=='Husband')?'selected':'' }}>Husband</option>
    <option value="Wife" {{ ($card_emergency_contacts['family_relation1']=='Wife')?'selected':'' }}>Wife</option>
    <option value="Brother" {{ ($card_emergency_contacts['family_relation1']=='Brother')?'selected':'' }}>Brother</option>
    <option value="Sister" {{ ($card_emergency_contacts['family_relation1']=='Sister')?'selected':'' }}>Sister</option>
    <option value="GrandFather" {{ ($card_emergency_contacts['family_relation1']=='GrandFather')?'selected':'' }}>Grand Father</option>
    <option value="GrandMother" {{ ($card_emergency_contacts['family_relation1']=='GrandMother')?'selected':'' }}>Grand Mother</option>
    <option value="GrandSon" {{ ($card_emergency_contacts['family_relation1']=='GrandSon')?'selected':'' }}>Grand Son</option>
    <option value="GrandDaughter" {{ ($card_emergency_contacts['family_relation1']=='GrandDaughter')?'selected':'' }}>Grand Daughter</option>
    <option value="Uncle" {{ ($card_emergency_contacts['family_relation1']=='Uncle')?'selected':'' }}>Uncle</option>
    <option value="Aunt" {{ ($card_emergency_contacts['family_relation1']=='Aunt')?'selected':'' }}>Aunt</option>
    <option value="Nephew" {{ ($card_emergency_contacts['family_relation1']=='Nephew')?'selected':'' }}>Nephew</option>
    <option value="Niece" {{ ($card_emergency_contacts['family_relation1']=='Niece')?'selected':'' }}>Niece</option>
    <option value="FatherInLaw" {{ ($card_emergency_contacts['family_relation1']=='FatherInLaw')?'selected':'' }}>Father In Law</option>
    <option value="MotherInLaw" {{ ($card_emergency_contacts['family_relation1']=='MotherInLaw')?'selected':'' }}>Mother In Law</option>
    <option value="BrotherInLaw" {{ ($card_emergency_contacts['family_relation1']=='BrotherInLaw')?'selected':'' }}>Brother In Law</option>
    <option value="SisterInLaw" {{ ($card_emergency_contacts['family_relation1']=='SisterInLaw')?'selected':'' }}>Sister In Law</option>
    <option value="SonInLaw" {{ ($card_emergency_contacts['family_relation1']=='SonInLaw')?'selected':'' }}>Son In Law</option>
    <option value="DaughterInLaw" {{ ($card_emergency_contacts['family_relation1']=='DaughterInLaw')?'selected':'' }}>Daughter In Law</option>
    </select>

  <span class="material-input"></span></div>
  </div>
      </div>
    </fieldset>



    <fieldset>
      <legend>Family Contact Secondary</legend>
    <div class="row" style="padding: 5px;">



        <div class="col-sm-4">
    <div class="form-group label-floating ">
    <label class="control-label">Family Name 2</label>
    <input type="name" class="form-control" id="fnam2" name="family_name2" value="{{ $card_emergency_contacts['family_name2'] }}" required>
    <span class="material-input"></span></div></div>
    <div class="col-sm-4">
    <div class="form-group label-floating ">
    <label class="control-label">Family Contact Number 2</label>
    <input type="number" maxlength="10" class="form-control" name="family_number2" id="fnum2" value="{{ $card_emergency_contacts['family_number2'] }}" required>
    <span class="material-input"></span></div>
    </div>
    <div class="col-sm-4">
    <div class="form-group label-floating ">

        <label class="control-label">Relation With Contact 2</label>
                    <select id="fr2" name="family_relation2" class="form-control">
                      <option value="" {{ ($card_emergency_contacts['family_relation2']=='')?'selected':'' }}></option>
                      <option value="Father" {{ ($card_emergency_contacts['family_relation2']=='Father')?'selected':'' }}>Father</option>
                      <option value="Mother" {{ ($card_emergency_contacts['family_relation2']=='Mother')?'selected':'' }}>Mother</option>
                      <option value="Son" {{ ($card_emergency_contacts['family_relation2']=='Son')?'selected':'' }}>Son</option>
                      <option value="Daughter" {{ ($card_emergency_contacts['family_relation2']=='Daughter')?'selected':'' }} >Daughter</option>
                      <option value="Husband" {{ ($card_emergency_contacts['family_relation2']=='Husband')?'selected':'' }}>Husband</option>
                      <option value="Wife" {{ ($card_emergency_contacts['family_relation2']=='Wife')?'selected':'' }}>Wife</option>
                      <option value="Brother" {{ ($card_emergency_contacts['family_relation2']=='Brother')?'selected':'' }}>Brother</option>
                      <option value="Sister" {{ ($card_emergency_contacts['family_relation2']=='Sister')?'selected':'' }}>Sister</option>
                      <option value="GrandFather" {{ ($card_emergency_contacts['family_relation2']=='GrandFather')?'selected':'' }}>Grand Father</option>
                      <option value="GrandMother" {{ ($card_emergency_contacts['family_relation2']=='GrandMother')?'selected':'' }}>Grand Mother</option>
                      <option value="GrandSon" {{ ($card_emergency_contacts['family_relation2']=='GrandSon')?'selected':'' }}>Grand Son</option>
                      <option value="GrandDaughter" {{ ($card_emergency_contacts['family_relation2']=='GrandDaughter')?'selected':'' }}>Grand Daughter</option>
                      <option value="Uncle" {{ ($card_emergency_contacts['family_relation2']=='Uncle')?'selected':'' }}>Uncle</option>
                      <option value="Aunt" {{ ($card_emergency_contacts['family_relation2']=='Aunt')?'selected':'' }}>Aunt</option>
                      <option value="Nephew" {{ ($card_emergency_contacts['family_relation2']=='Nephew')?'selected':'' }}>Nephew</option>
                      <option value="Niece" {{ ($card_emergency_contacts['family_relation2']=='Niece')?'selected':'' }}>Niece</option>
                      <option value="FatherInLaw" {{ ($card_emergency_contacts['family_relation2']=='FatherInLaw')?'selected':'' }}>Father In Law</option>
                      <option value="MotherInLaw" {{ ($card_emergency_contacts['family_relation2']=='MotherInLaw')?'selected':'' }}>Mother In Law</option>
                      <option value="BrotherInLaw" {{ ($card_emergency_contacts['family_relation2']=='BrotherInLaw')?'selected':'' }}>Brother In Law</option>
                      <option value="SisterInLaw" {{ ($card_emergency_contacts['family_relation2']=='SisterInLaw')?'selected':'' }}>Sister In Law</option>
                      <option value="SonInLaw" {{ ($card_emergency_contacts['family_relation2']=='SonInLaw')?'selected':'' }}>Son In Law</option>
                      <option value="DaughterInLaw" {{ ($card_emergency_contacts['family_relation2']=='DaughterInLaw')?'selected':'' }}>Daughter In Law</option>
      </select>

    <span class="material-input"></span></div>
    </div>
        </div>
</fieldset>

<fieldset>
  <legend>Friend Contact Primary</legend>
  <div class="row" style="padding: 5px;">



      <div class="col-sm-4">
<div class="form-group label-floating ">
<label class="control-label">Friend's Name 1</label>
<input type="name" class="form-control" id="frn1" name="friend_name1" value="{{ $card_emergency_contacts['friend_name1'] }}" required>
<span class="material-input"></span></div></div>
<div class="col-sm-4">
<div class="form-group label-floating ">
<label class="control-label">Friend's Contact Number 1</label>
<input type="number" maxlength="10" class="form-control" id="frnum1" name="friend_number1" value="{{ $card_emergency_contacts['friend_number1'] }}" required>
<span class="material-input"></span></div></div>



    </div>
  </fieldset>

  <fieldset>
    <legend>Friend Contact Secondary</legend>

    <div class="row" style="padding: 5px;">

         <div class="col-sm-4">
    <div class="form-group label-floating ">
    <label class="control-label">Friend's Name 2</label>
    <input type="name" class="form-control" id="frn2" name="friend_name2" value="{{ $card_emergency_contacts['friend_name2'] }}" required>
    <span class="material-input"></span></div></div>
    <div class="col-sm-4">
    <div class="form-group label-floating ">
    <label class="control-label">Friend's Contact Number 2</label>
    <input type="number" maxlength="10" class="form-control" id="frnum2" name="friend_number2" value="{{ $card_emergency_contacts['friend_number2'] }}" required>
    <span class="material-input"></span></div></div>


        </div>
</fieldset>
<div class="row">
  <div class="col-sm-12 text-center">

    <button class="btn btn-primary btn-lg pull-center" id="sube"  type="submit" ><b>Save & Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i> </button>
    <button class="nextBtn" type="button" id="emergency_detailsa" style="display:none;"></button>

  </div>


</div>
    </div>




  </form>
</div></div></div>
</div>

    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Crop Pic</h4>
            </div>
            <div class="modal-body">

              <div id="upload-demo" style="width:350px"></div>

    <input type="file" id="upload"  style="display:none;">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button class="btn btn-success upload-result">Save Image</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


    <div class="row setup-content" id="step-4">

          <div class="col-md-12">
            <div class="col-xs-12">
              <center><b><h4>Card Profile Pic</h4></b></center>
              <div class="panel panel-default">
            	  <div class="panel-heading">Crop your pic before uploading(Photos on Physical Card cannot be changed once card number assigned)</div>
            	  <div class="panel-body">


            	  	<div class="row text-center">
                    <div id="upload-demo-i" style="">


<img src="{{$pic}}" style="width:250px;">




                    </div>



                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" onclick="document.getElementById('upload').click()">
      Select Pic
    </button>
            	  		<!-- <div class="col-md-4 col-xs-12 text-center">
            				<div id="upload-demo" style="width:100%;"></div>
            	  		</div>
            	  		<div class="col-md-4 col-xs-12" style="padding-top:30px;">
            				<strong>Select Image:</strong>
            				<br/>
            				<input type="file" id="upload">
            				<br/>
            				<button class="btn btn-success upload-result">Upload Image</button>
            	  		</div>


            	  		<div class="col-md-4 col-xs-12 text-center" style="padding-top:30px;">
            				<div id="upload-demo-i" style="background:#e1e1e1;">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqUT50jCluq_GHc0sZNQGal6hzJs7kLmKIN6GuoeB1pHh_YdjzlQ">
                    </div> -->
                    <!-- <button class="btn btn-primary"  onclick="document.getElementById('upload').click()">Change Pi</button> -->


<div class="row">
  <div class="coil-sm-12 text-center">

    @if($pay_s=='Done')
    <center><span class="label label-success">You have Already paid for the card</span></center>

    @else
<a href="{{ url('checkout')}}/{{ $id }}" class="btn btn-success btn-lg" id="finish" @if($card_files['url']=='')
 disabled
@else
@endif>

<i class="fa fa-check"></i> Finish and Proceed to payment</a>
@endif
</div>
</div>

            	  		</div>
            	  	</div>


            	  </div>
            	</div>
            </div>
          </div>






  </div>


<script>





$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'square'
    },
    boundary: {
        width: 300,
        height: 300
    }
});


$('#upload').on('change', function () {
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-result').on('click', function (ev) {
  var x = document.getElementById("snackbar");
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {
		$.ajax({
			url: "{{ url('card-crop') }}",
			type: "POST",
			data: {"image":resp,"card_id":'{{ $id }}' },
			success: function (data) {
        console.log(data);
				html = '<img src="' + resp + '" style="width:300px;" />';
        $('#modal-default').modal('hide');
        x.innerHTML = data.msg;
               // Add the "show" class to DIV
               x.className = "show";
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
				$("#upload-demo-i").html(html);
            $('#finsih').prop('disabled', false);
			}
		});
	});
});



















$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});


$(function(){

$('#personal_details').on('submit',function(e){

  $('#subp').html('<i class="fa fa-spin fa-spinner" aria-hidden="true"></i>');
  $('#subp').prop('disabled', true);
    $.ajaxSetup({
        header:$('meta[name="_token"]').attr('content')
    })
    e.preventDefault(e);

        $.ajax({
        type:"POST",
        url:'{{ route('add_personal_details') }}',
        data:$(this).serialize(),
        dataType: 'json',
        success: function(data){
            var x = document.getElementById("snackbar");
          if(data.error==true){
$('#subp').html('<b>Save & Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i>');
  $('#subp').prop('disabled', false);
        x.innerHTML = data.msg;
               // Add the "show" class to DIV
               x.className = "show";

               // After 3 seconds, remove the show class from DIV
               setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

          }
          else if(data.error==false) {
            $('#card_id').val(data.token);
            $('#subp').html('<b>Save & Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i>');
              $('#subp').prop('disabled', false);

          //  var x = document.getElementById("snackbar")
        x.innerHTML = data.msg;
               // Add the "show" class to DIV
               x.className = "show";

               // After 3 seconds, remove the show class from DIV
               setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

          $('#personal_detailsa').click();
          }
            // console.log(data.msg);
        },
        error: function(data){

        }
    })
    });
});











$(function(){

$('#medical_details_submit').on('submit',function(e){

  $('#subm').html('<i class="fa fa-spin fa-spinner" aria-hidden="true"></i>');
  $('#subm').prop('disabled', true);
    $.ajaxSetup({
        header:$('meta[name="_token"]').attr('content')
    })
    e.preventDefault(e);

        $.ajax({
        type:"POST",
        url:'{{ route('add_medical_details') }}',
        data:$(this).serialize(),
        dataType: 'json',
        success: function(data){
            var x = document.getElementById("snackbar");
          if(data.error==true){
$('#subm').html('<b>Save & Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i>');
  $('#subm').prop('disabled', false);
        x.innerHTML = data.msg;
               // Add the "show" class to DIV
               x.className = "show";

               // After 3 seconds, remove the show class from DIV
               setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
               //console.log(data.dat);

          }
          else if(data.error==false) {

            $('#subm').html('<b>Save & Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i>');
              $('#subm').prop('disabled', false);

          //  var x = document.getElementById("snackbar")
        x.innerHTML = data.msg;
               // Add the "show" class to DIV
               x.className = "show";

               // After 3 seconds, remove the show class from DIV
               setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

          $('#medical_detailsa').click();
          }
            // console.log(data.msg);
        },
        error: function(data){

        }
    })
    });
});


$(function(){

$('#emergency_contact_submit').on('submit',function(e){

  $('#sube').html('<i class="fa fa-spin fa-spinner" aria-hidden="true"></i>');
  $('#sube').prop('disabled', true);
    $.ajaxSetup({
        header:$('meta[name="_token"]').attr('content')
    })
    e.preventDefault(e);

        $.ajax({
        type:"POST",
        url:'{{ route('add_emergency_contacts') }}',
        data:$(this).serialize(),
        dataType: 'json',
        success: function(data){
            var x = document.getElementById("snackbar");
          if(data.error==true){
$('#sube').html('<b>Save & Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i>');
  $('#sube').prop('disabled', false);
        x.innerHTML = data.msg;
               // Add the "show" class to DIV
               x.className = "show";

               // After 3 seconds, remove the show class from DIV
               setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
               console.log(data.dat);

          }
          else if(data.error==false) {

            $('#sube').html('<b>Save & Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i>');
              $('#sube').prop('disabled', false);

          //  var x = document.getElementById("snackbar")
        x.innerHTML = data.msg;
               // Add the "show" class to DIV
               x.className = "show";

               // After 3 seconds, remove the show class from DIV
               setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

          $('#emergency_detailsa').click();
          }
            // console.log(data.msg);
        },
        error: function(data){

        }
    })
    });
});




























</script>

<!-- javascript -->
<script>
$('#datepicker').datepicker({
autoclose: true
})
//Datemask dd/mm/yyyy

//Datemask2 mm/dd/yyyy
$('#datepicker').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
//iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    </script>
@endsection
