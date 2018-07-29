<?php 

 

if(isset($_POST['step1date'])){$step1date = $_POST['step1date']; }
if(isset($_POST['step1mphone'])){$step1mphone = $_POST['step1mphone']; }
if(isset($_POST['step1fname'])){$step1fname = $_POST['step1fname']; }
if(isset($_POST['step1lname'])){$step1lname = $_POST['step1lname']; }
if(isset($_POST['step1wphonw'])){$step1wphonw = $_POST['step1wphonw']; }
if(isset($_POST['step1hphone'])){$step1hphone = $_POST['step1hphone']; }
if(isset($_POST['step1age'])){$step1age = $_POST['step1age']; }
if(isset($_POST['step1gender'])){$step1gender = $_POST['step1gender']; }
if(isset($_POST['step1occupation'])){$step1occupation = $_POST['step1occupation']; }
if(isset($_POST['step1homeaddress'])){$step1homeaddress = $_POST['step1homeaddress']; }
if(isset($_POST['step1city'])){$step1city = $_POST['step1city']; }
if(isset($_POST['step1state'])){$step1state = $_POST['step1state']; }
if(isset($_POST['step1zipcode'])){$step1zipcode = $_POST['step1zipcode']; }
if(isset($_POST['step1email'])){$step1email = $_POST['step1email']; }
if(isset($_POST['step1referral'])){$step1referral = $_POST['step1referral']; }
if(isset($_POST['step1complaints'])){$step1complaints = $_POST['step1complaints']; }
if(isset($_POST['step1how_many_time'])){$step1how_many_time = $_POST['step1how_many_time']; }
if(isset($_POST['step1diet'])){$step1diet = $_POST['step1diet']; }
if(isset($_POST['step1family-medical-history'])){$step1family_medical_history = $_POST['step1family-medical-history']; }
if(isset($_POST['step2Emotions'])){$step2Emotions = $_POST['step2Emotions']; }
if(isset($_POST['Emotions_dropdown'])){$Emotions_dropdown = $_POST['Emotions_dropdown']; }
if(isset($_POST['step2Emotions-description'])){$step2Emotions_description = $_POST['step2Emotions-description']; }
if(isset($_POST['step2Energy'])){$step2Energy = $_POST['step2Energy']; }
if(isset($_POST['Energy_dropdown'])){$Energy_dropdown = $_POST['Energy_dropdown']; }
if(isset($_POST['step2Energy-description'])){$step2Energy_description = $_POST['step2Energy-description']; }
if(isset($_POST['step2sleep-pattern-normal'])){$step2sleep_pattern_normal = $_POST['step2sleep-pattern-normal']; }
if(isset($_POST['Sleep_pattern_dropdown'])){$Sleep_pattern_dropdown = $_POST['Sleep_pattern_dropdown']; }
if(isset($_POST['step2-wakingup'])){$step2_wakingup = $_POST['step2-wakingup']; }
if(isset($_POST['step2-wakingupcheck'])){$step2_wakingupcheck = $_POST['step2-wakingupcheck']; }
if(isset($_POST['Sleep_quality_dropdown'])){$Sleep_quality_dropdown = $_POST['Sleep_quality_dropdown']; }
if(isset($_POST['step2-Sleeppattern-description'])){$step2_Sleeppattern_description = $_POST['step2-Sleeppattern-description']; }
if(isset($_POST['Menstrualcycle'])){$Menstrualcycle = $_POST['Menstrualcycle']; }
if(isset($_POST['step2-Ageofoutset'])){$step2_Ageofoutset = $_POST['step2-Ageofoutset']; }
if(isset($_POST['step2-Dateoflastperiod'])){$step2_Dateoflastperiod = $_POST['step2-Dateoflastperiod']; }
if(isset($_POST['step2-How-many-days-per-cycle'])){$step2_How_many_days_per_cycle = $_POST['step2-How-many-days-per-cycle']; }
if(isset($_POST['step2-How-many-days-did-it-last'])){$step2_How_many_days_did_it_last = $_POST['step2-How-many-days-did-it-last']; }
if(isset($_POST['step2-Color'])){$step2_Color = $_POST['step2-Color']; }
if(isset($_POST['step2-Whendidyoufeelpain'])){$step2_Whendidyoufeelpain = $_POST['step2-Whendidyoufeelpain']; }
if(isset($_POST['step2-menstrual-pain'])){$step2_menstrual_pain = $_POST['step2-menstrual-pain']; }
if(isset($_POST['When_did_you_feel_pain_dropdown'])){$When_did_you_feel_pain_dropdown = $_POST['When_did_you_feel_pain_dropdown']; }
if(isset($_POST['Where_did_you_feel_pain_drop_down'])){$Where_did_you_feel_pain_drop_down = $_POST['Where_did_you_feel_pain_drop_down']; }
if(isset($_POST['step2-Emotionsaroundperiod'])){$step2_Emotionsaroundperiod = $_POST['step2-Emotionsaroundperiod']; }
if(isset($_POST['When_do_you_feel_most_emotional_dropdown'])){$When_do_you_feel_most_emotional_dropdown = $_POST['When_do_you_feel_most_emotional_dropdown']; }
if(isset($_POST['What_emotions_do_you_feel_dropdown'])){$What_emotions_do_you_feel_dropdown = $_POST['What_emotions_do_you_feel_dropdown']; }
if(isset($_POST['step2-Menstrualcycle-description'])){$step2_Menstrualcycle_description = $_POST['step2-Menstrualcycle-description']; }
if(isset($_POST['step3-Temperature'])){$step3_Temperature = $_POST['step3-Temperature']; }
if(isset($_POST['step3-Temperature_dropdown'])){$step3_Temperature_dropdown = $_POST['step3-Temperature_dropdown']; }
if(isset($_POST['step3-Temperature-description'])){$step3_Temperature_description = $_POST['step3-Temperature-description']; }
if(isset($_POST['step3-Sweating'])){$step3_Sweating = $_POST['step3-Sweating']; }
if(isset($_POST['Sweating_dropdown'])){$Sweating_dropdown = $_POST['Sweating_dropdown']; }
if(isset($_POST['step3-Sweating-description'])){$step3_Sweating_description = $_POST['step3-Sweating-description']; }
if(isset($_POST['step3-SensitivityAllergy'])){$step3_SensitivityAllergy = $_POST['step3-SensitivityAllergy']; }
if(isset($_POST['step3-Sensitivity-description'])){$step3_Sensitivity_description = $_POST['step3-Sensitivity-description']; }
if(isset($_POST['step3-Bowelmovement'])){$step3_Bowelmovement = $_POST['step3-Bowelmovement']; }
if(isset($_POST['bowel_movement_dropdown'])){$bowel_movement_dropdown = $_POST['bowel_movement_dropdown']; }
if(isset($_POST['step3-Bowel-movement-description'])){$step3_Bowel_movement_description = $_POST['step3-Bowel-movement-description']; }
if(isset($_POST['step4-Bodyweight'])){$step4_Bodyweight = $_POST['step4-Bodyweight']; }
if(isset($_POST['step4-howmanypoundwoulyouliketoloose'])){$step4_howmanypoundwoulyouliketoloose = $_POST['step4-howmanypoundwoulyouliketoloose']; }
if(isset($_POST['step4-Howmanyyearsagodidyoufirststarttogainweight'])){$step4_Howmanyyearsagodidyoufirststarttogainweight = $_POST['step4-Howmanyyearsagodidyoufirststarttogainweight']; }
if(isset($_POST['step4-Areyoufollowingaweightcontrolprogramatthistime'])){$step4_Areyoufollowingaweightcontrolprogramatthistime = $_POST['step4-Areyoufollowingaweightcontrolprogramatthistime']; }
if(isset($_POST['step4-Menstrualcycle-description'])){$step4_Menstrualcycle_description = $_POST['step4-Menstrualcycle-description']; }
if(isset($_POST['step4-Drinking'])){$step4_Drinking = $_POST['step4-Drinking']; }
if(isset($_POST['drinking_dropdown'])){$drinking_dropdown = $_POST['drinking_dropdown']; }
if(isset($_POST['step4-Drinking-description'])){$step4_Drinking_description = $_POST['step4-Drinking-description']; }
if(isset($_POST['ste4-Urination'])){$ste4_Urination = $_POST['ste4-Urination']; }
if(isset($_POST['urination_dropdown'])){$urination_dropdown = $_POST['urination_dropdown']; }
if(isset($_POST['step4-Urination-description'])){$step4_Urination_description = $_POST['step4-Urination-description']; }
if(isset($_POST['step4-Checkhereifyouaccepttheseterms'])){$step4_Checkhereifyouaccepttheseterms = $_POST['step4-Checkhereifyouaccepttheseterms']; }


    

    $encoding = "utf-8";

    // Preferences for Subject field
    $subject_preferences = array(
        "input-charset" => $encoding,
        "output-charset" => $encoding,
        "line-length" => 76,
        "line-break-chars" => "\r\n"
    );

    // Mail header
    $header = "Content-type: text/html; charset=".$encoding." \r\n";
    $header .= "Reply-To: The Sender <".$step1email.">\r\n";
    // $header .= "From: ".$step1fname." <".$step1email."> \r\n";
    $header .= "From: ".$step1fname." <'info@chicagoacupuncture.com'> \r\n";
    $header .= "Bcc: rickywhitedesigns@gmail.com  \r\n";
    $header .= "MIME-Version: 1.0 \r\n";
    $header .= "Content-Transfer-Encoding: 8bit \r\n";
    $header .= "Date: ".date("r (T)")." \r\n";
    $header .= iconv_mime_encode("Subject", $mail_subject, $subject_preferences);

    $mail_subject = 'Intake form from : '.$step1fname;
    $mail_to = 'larisaturin@chicagoacupuncture.com';
    // $mail_to = 'usamajob@gmail.com';
    // $mail_to = 'rickywhitedesigns@gmail.com';
    $mail_message = '
    <style>
    ul {
    list-style: decimal;
    }
    inspector-stylesheet:1
    ul li {
        line-height:20px;
    }
    </style>
    <h3>Step 1/4 </h3>
    <hr>
<ul>
<li>Date: '.$step1date.'</li>
<li>Mobile Phone: '.$step1mphone.'</li>
<li>First Name: '.$step1fname.'</li>
<li>Last Name: '.$step1lname.'</li>
<li>Work Phone: '.$step1wphonw.'</li>
<li>Home Phone: '.$step1hphone.'</li>
<li>Age: '.$step1age.'</li>
<li>Gender: '.$step1gender.'</li>
<li>Occupation: '.$step1occupation.'</li>
<li>Home Address: '.$step1homeaddress.'</li>
<li>City: '.$step1city.'</li>
<li>State: '.$step1state.'</li>
<li>Zip: '.$step1zipcode.'</li>
<li>Your E-Mail: '.$step1email.'</li>
<li>Referral: '.$step1referral.'</li>
<li>Complaints: '.$step1complaints.'</li>
<li>How many times per year do you get a cold or the flu? '.$step1how_many_time.'</li>
<li>Diet: '.$step1diet.'</li>
<li>Family medical history: '.$step1family_medical_history.'</li>
</ul>

<h3>Step 2/4</h3>
<hr>
<ul>
<li>Emotions: '.$step2Emotions.'</li>
<li>Emotions Selection : '.$Emotions_dropdown.'</li>
<li>Describe: '.$step2Emotions_description.'</li>
<br>
<li>Energy: '.$step2Energy.'</li>
<li>Energy Selection: '.$Energy_dropdown.'</li>
<li>Describe: '.$step2Energy_description.'</li>
<br>
<li>Sleep pattern: '.$step2sleep_pattern_normal.'</li>
<li>Sleep pattern Selection: '.$Sleep_pattern_dropdown.'</li>
<li>wake up at night and cannot go back to sleep again: '.$step2_wakingupcheck.'</li>
<li> Sleep quality: '.$Sleep_quality_dropdown.'</li>
<li>Describe: '.$step2_Sleeppattern_description.'</li>
<br>
<li>Menstrual cycle: '.$step2_Menstrualcycle.'</li>
<li>Age of outset: '.$step2_Ageofoutset.'</li>
<li>Date of last period: '.$step2_Dateoflastperiod.'</li>
<li>How many days per cycle? '.$step2_How_many_days_per_cycle.'</li>
<li>How many days did it last? '.$step2_How_many_days_did_it_last.'</li>
<li>Color: '.$step2_Color.'</li>
<li>When did you feel pain?: '.$step2_menstrual_pain.'</li>
<li>Menstrual pain: '.$step2_menstrual_pain.'</li>
<li>When did you feel pain? '.$When_did_you_feel_pain_dropdown.'</li>
<li>Where did you feel pain? '.$Where_did_you_feel_pain_drop_down.'</li>
<li>Emotions around period: '.$step2_Emotionsaroundperiod.'</li>
<li>When do you feel most emotional? '.$When_do_you_feel_most_emotional_dropdown.'</li>
<li>What emotions do you feel? '.$What_emotions_do_you_feel_dropdown.'</li>
<li>Describe: '.$step2_Menstrualcycle_description.'</li>
</ul>

<h3>Step 3/4 </h3>
<hr>
<ul>
<li>Temperature: '.$step3_Temperature.'</li>
<li>Temperature Selection: '.$step3_Temperature_dropdown.'</li>
<li>Describe: '.$step3_Temperature_description.'</li>
<br>
<li>Sweating: '.$step3_Sweating.'</li>
<li>Sweating Selection: '.$Sweating_dropdown.'</li>
<li>Describe: '.$step3_Sweating_description.'</li>
<br>
<li>Sensitivity & Allergy: '.$step3_SensitivityAllergy.'</li>
<li>Describe: '.$step3_Sensitivity_description.'</li>
<br>
<li>Bowel movement: '.$step3_Bowelmovement.'</li>
<li>Bowel movement Selection: '.$bowel_movement_dropdown.'</li>
<li>Describe: '.$step3_Bowel_movement_description.'</li>
</ul>

<h3>Step 4/4</h3>
<hr>
<ul>
<li>Body weight: '.$step4_Bodyweight.'</li>
<li>How many pounds would you like to loose? '.$step4_howmanypoundwoulyouliketoloose.'</li>
<li>How many years ago did you first start to gain weight? '.$step4_Howmanyyearsagodidyoufirststarttogainweight.'</li>
<li>Are you following a weight control program at this time? '.$step4_Areyoufollowingaweightcontrolprogramatthistime.'</li>
<li>Describe: '.$step4_Menstrualcycle_description.'</li>
<br>
<li>Drinking: '.$step4_Drinking.'</li>
<li>Drinking Selection: '.$drinking_dropdown.'</li>
<li>Describe: '.$step4_Drinking_description.'</li>
<br>
<li>Urination: '.$ste4_Urination.'</li>
<li>Urination Selection: '.$urination_dropdown.'</li>
<li>Describe: '.$step4_Urination_description.'</li>

    </ul>
    ';

    // Send mail
    
 $success = mail($mail_to, $mail_subject, $mail_message, $header);;
if (!$success) {
    // $errorMessage = error_get_last();
}
    header("location:intake_form.php?flag=success");



 ?>