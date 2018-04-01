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
<div class="stepwizard" style="display:none;">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>

        </div>

    </div>
</div>

    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <!-- <center><b><h4>Personal Details</h4></b></center> -->
                <!-- <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name"  />
                </div>
                <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
                </div> -->
                <h4 class="text-center" style="font-weight:900;">Apply For New Card</h4>
                <div class="panel panel-default">
                  <!-- <div class="panel-heading">Personal Details</div> -->
                  <div class="panel-body">
                      <form role="form" id="newcard">
<div class="col-md-12">
  <fieldset>
        <legend>Basic Details</legend>
                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">First Name</label>
                      <input type="text" id="first_name" name="first_name" class="form-control"  placeholder="First Name" required="required">
                </div></div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Last Name</label>
                      <input type="text" id="last_name" name="last_name"  class="form-control" placeholder="Last Name" required="required">
                </div></div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Display Name</label>
                      <input type="text" id="display_name" name="display_name" class="form-control" placeholder="Display Name" required="required">
                </div></div>



                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Email</label>
                      <input type="text" id="email" class="form-control"name="email" placeholder="Email ID" required="required">
                </div></div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Mobile</label>
                      <input type="text" id="mobile" class="form-control" name="mobile"  placeholder="Mobile No." required="required">
                </div></div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Land Line</label>
                     <input type="text" id="land_line" class="form-control" name="landline" placeholder="Land Line">
                   </div>
                </div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Office Phone</label>
                      <input type="text" id="office_phone" class="form-control" name="officephone" placeholder="Office Phone" >
                </div></div>

                 <div class="col-sm-3 col-xs-12">
                   <div class="form-group">
                       <label class="control-label">Aadhaar Number</label>
                      <input type="text" id="aadhaar" class="form-control" name="aadhaar" placeholder="Aadhaar Number">
                  </div></div>

                 <div class="col-sm-6 col-xs-12">
                   <label>Birthday:</label>
                   <div class="form-group">


                     <div class="col-sm-4">
                         <label class="control-label"><small>Month</small></label>

                                    <select name='month' id='monthddl' class="form-control">
                                    <option value='01'>JANUARY</option>
                                    <option value='02'>FEBURARY</option>
                                    <option value='03'>MARCH</option>
                                    <option value='04'>APRIL</option>
                                    <option value='05'>MAY</option>
                                    <option value='06'>JUNE</option>
                                    <option value='07'>JULY</option>
                                    <option value='08'>AUGUST</option>
                                    <option value='09'>SEPTEMBER</option>
                                    <option value='10'>OCTOBER</option>
                                    <option value='11'>NOVEMBER</option>
                                    <option value='12'>DECEMBER</option>
                                    </select>
                 </div>




<div class="col-sm-3">
                    <label class="control-label"><small>Day</small></label>
                   <select name='day' id='dayddl' class="form-control">
                   <option value='01'>01</option>
                   <option value='02'>02</option>
                   <option value='03'>03</option>
                   <option value='04'>04</option>
                   <option value='05'>05</option>
                   <option value='06'>06</option>
                   <option value='07'>07</option>
                   <option value='08'>08</option>
                   <option value='09'>09</option>
                   <option value='10'>10</option>
                   <option value='11'>11</option>
                   <option value='12'>12</option>
                   <option value='13'>13</option>
                   <option value='14'>14</option>
                   <option value='15'>15</option>
                   <option value='16'>16</option>
                   <option value='17'>17</option>
                   <option value='18'>18</option>
                   <option value='19'>19</option>
                   <option value='20'>20</option>
                   <option value='21'>21</option>
                   <option value='22'>22</option>
                   <option value='23'>23</option>
                   <option value='24'>24</option>
                   <option value='25'>25</option>
                   <option value='26'>26</option>
                   <option value='27'>27</option>
                   <option value='28'>28</option>
                   <option value='29'>29</option>
                   <option value='30'>30</option>
                   <option value='31'>31</option>
                   </select>
</div>


<div class="col-sm-3">
  <label class="control-label"><small>Year</small></label>


                   <select name='year' id='blah' class="form-control">
                   <option value='1947'>1947</option>
                   <option value='1948'>1948</option>
                   <option value='1949'>1949</option>
                   <option value='1950'>1950</option>
                   <option value='1951'>1951</option>
                   <option value='1952'>1952</option>
                   <option value='1953'>1953</option>
                   <option value='1954'>1954</option>
                   <option value='1955'>1955</option>
                   <option value='1956'>1956</option>
                   <option value='1957'>1957</option>
                   <option value='1958'>1958</option>
                   <option value='1959'>1959</option>
                   <option value='1960'>1960</option>
                   <option value='1961'>1961</option>
                   <option value='1962'>1962</option>
                   <option value='1963'>1963</option>
                   <option value='1964'>1964</option>
                   <option value='1965'>1965</option>
                   <option value='1966'>1966</option>
                   <option value='1967'>1967</option>
                   <option value='1968'>1968</option>
                   <option value='1969'>1969</option>
                   <option value='1970'>1970</option>
                   <option value='1971'>1971</option>
                   <option value='1972'>1972</option>
                   <option value='1973'>1973</option>
                   <option value='1974'>1974</option>
                   <option value='1975'>1975</option>
                   <option value='1976'>1976</option>
                   <option value='1977'>1977</option>
                   <option value='1978'>1978</option>
                   <option value='1979'>1979</option>
                   <option value='1980'>1980</option>
                   <option value='1981'>1981</option>
                   <option value='1982'>1982</option>
                   <option value='1983'>1983</option>
                   <option value='1984'>1984</option>
                   <option value='1985'>1985</option>
                   <option value='1986'>1986</option>
                   <option value='1987'>1987</option>
                   <option value='1988'>1988</option>
                   <option value='1989'>1989</option>
                   <option value='1990'>1990</option>
                   <option value='1991'>1991</option>
                   <option value='1992'>1992</option>
                   <option value='1993'>1993</option>
                   <option value='1994'>1994</option>
                   <option value='1995'>1995</option>
                   <option value='1996'>1996</option>
                   <option value='1997'>1997</option>
                   <option value='1998'>1998</option>
                   <option value='1999'>1999</option>
                   <option value='2000'>2000</option>
                   <option value='2001'>2001</option>
                   <option value='2002'>2002</option>
                   <option value='2003'>2003</option>
                   <option value='2004'>2004</option>
                   <option value='2005'>2005</option>
                   <option value='2006'>2006</option>
                   <option value='2007'>2007</option>
                   <option value='2008'>2008</option>
                   <option value='2009'>2009</option>
                   <option value='2010'>2010</option>
                   <option value='2011'>2011</option>
                   <option value='2012'>2012</option>
                   <option value='2013'>2013</option>
                   <option value='2014'>2014</option>
                   <option value='2015'>2015</option>
                   <option value='2016'>2016</option>
                   <option value='2017'>2017</option>
                   <option value='2018'>2018</option>
                   </select>

</div>







  </div>



                 </div>
                 <!-- /.input group -->

                                <div class="col-sm-6 col-xs-12">
                                  <div class="form-group">
                                      <label class="control-label">Gender</label>
                                      <div class="radio">
                                        <label>
                                        <input type="radio" id="gender" name="gender" class="minimal" value="Male" required="required"  >
                                        Male
                                        </label>
                                        <label>
                                        <input type="radio" id="gender" name="gender" class="minimal" value="Female" required="required" >
                                        Female
                                        </label>
                                        <label>
                                        <input type="radio" id="gender" name="gender" class="minimal" value="TransGender" required="required" >
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
                    <input type="text" id="doorno" class="form-control" name="doorno" placeholder="Door Number" required="required">
                </div>
              </div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Building/Street Name</label>
                    <input type="text" id="building_street" class="form-control" name="buildingstreet" placeholder="Building/Street Name"  required="required">
                </div></div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">Area/Locality </label>
                  <input type="text" id="area_locality" class="form-control" name="arealocality" placeholder="Area/Locality Name"   required="required" >
                </div></div>

                <div class="col-sm-3 col-xs-12">
                  <div class="form-group">
                      <label class="control-label">City</label>
                  <input type="text" id="city" class="form-control" placeholder="City"  name="city" required="required">
                </div></div>
{{$card_personal_details['state']=''}}
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
    <option value="Punjab"  {{ ($card_personal_details['state']=='Kerala')?'Punjab':'' }}>Punjab</option>
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
                  <input type="text" id="pincode" class="form-control" placeholder="Area Pin Code" name="pincode" required="required">
                </div>
</div>
                <div class="col-sm-12 col-xs-12 text-center">
                  <button class="btn btn-primary btn-lg pull-center" id="subp"  type="submit" ><b>Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i> </button>
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


<script>

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

$('#newcard').on('submit',function(e){

  $('#subp').html('<i class="fa fa-spin fa-spinner" aria-hidden="true"></i>');
  $('#subp').prop('disabled', true);
    $.ajaxSetup({
        header:$('meta[name="_token"]').attr('content')
    })
    e.preventDefault(e);

        $.ajax({
        type:"POST",
        url:'{{ route('create_card') }}',
        data:$(this).serialize(),
        dataType: 'json',
        success: function(data){
            var x = document.getElementById("snackbar");
          if(data.error==true){
$('#subp').html('<b>Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i>');
  $('#subp').prop('disabled', false);
        x.innerHTML = data.msg;
               // Add the "show" class to DIV
               x.className = "show";

               // After 3 seconds, remove the show class from DIV
               setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

          }
          else if(data.error==false) {
          //  $('#card_id').val(data.token);
            // $('#subp').html('<b>Proceed to Next</b> <i class="fa fa-arrow-circle-right"></i>');
            //   $('#subp').prop('disabled', false);

          //  var x = document.getElementById("snackbar")
        x.innerHTML = data.msg;
               // Add the "show" class to DIV
               x.className = "show";

               // After 3 seconds, remove the show class from DIV
               setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
     window.location.href="{{ url('/getCard/') }}"+"/"+data.id;
  //        $('#personal_detailsa').click();
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
