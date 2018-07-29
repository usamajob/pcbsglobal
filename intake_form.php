<?php 
$page = 'intake';
$title ='Intake Form';
$description ='';
$keywords = '';
$ogtitle='';
$ogimage='';
$ogdescription = '';
$ogtype = '';
$oglocale ='';
?>
<?php include('header.php') ?>
<?php include('navigation_bar.php') ?>


<style type="text/css">
select.form-control {
	border-radius: 0px !important;
	font-size: 17px !important;
	margin-top: 10px;
}
	
	input[type=checkbox], input[type=radio] {
    margin: 4px 6px 0 0px !important;
    margin-top: 1px\9;
    line-height: normal;
}
</style>

<div class="container">
	<div class="row">
		<div class="col-lg-6"><h2 class="page_title">Intake Form</h2></div>
		<div class="col-lg-6">
		</div>
		<div class="col-lg-12">
			<div class="space"></div>
			<?php 
			if(isset($_GET['flag'])){
				?>
				<div class="alert alert-success col-lg-12">
					<p>Message successfully sent will get back to you as  soon as possible</p>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<p>New Patients: Please fill out the following consultation form, and send it to us, prior to your first appointment so that we can better service your needs.</p>
		</div>
		<div class="col-lg-6">
			<p>If you have a question fill out the short form here, or give us a call at  (312) 399-4919, or use direct e-mail: <a href="mailto:larisaturin@chicagoacupuncture.com">larisaturin@chicagoacupuncture.com</a></p>
		</div>
	</div>
	<div class="row contact">
		<form action="intake-form.php" method="POST">
			<p style="float:none;text-align: left;"><strong>Step 1/4</strong></p>
			<hr>
			<div class="row">
				<div class="col-lg-4">
					<div class="col-lg-6">
						<p>Date: </p>
					</div>
					<div class="col-lg-6">
						<input required="required" type="text"  placeholder="Date" name="step1date" data-provide="datepicker" class="datepicker">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="col-lg-6">
						<p>Mobile Phone: </p>
					</div>
					<div class="col-lg-6">
						<input required="required" type="text" name="step1mphone">
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-lg-4">
					<div class="col-lg-6">
						<p>First Name: </p>
					</div>
					<div class="col-lg-6">
						<input required="required" type="text" name="step1fname" >
					</div>
				</div>
				<div class="col-lg-4">
					<div class="col-lg-6">
						<p>Last Name: </p>
					</div>
					
					<div class="col-lg-6">
						<input required="required" type="text" name="step1lname">
					</div>
				</div>
				<div class="clearfix"></div>
				
				<div class="col-lg-4">
					<div class="col-lg-6">
						<p>Work Phone: </p>
					</div>
					<div class="col-lg-6">
						<input type="text" name="step1wphonw">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="col-lg-6">
						<p>Home Phone: </p>
					</div>
					<div class="col-lg-6">
						<input type="text" name="step1hphone">
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="col-lg-4">
					<div class="col-lg-6">
						<p>Age: </p>
					</div>
					<div class="col-lg-6">
						<input required="required" type="text" name="step1age" style="width: 60px !important;min-width: 60px;">
					</div>
				</div>

				<div class="col-lg-4">
					<div class="col-lg-6">
						<p>Gender: </p>
					</div>
					<div class="col-lg-6">
						<span style="border:1px solid gray; float: left;padding: 5px 5px 0px 5px;min-height: 25px;min-width: 210px;">
							<p  style="min-width: 20px;margin-bottom: 0px;"><input type="radio" name="step1gender" value="Male" style="min-width: 20px;margin-bottom: 0px;">
							Male</p>
							<p  style="min-width: 20px;margin-bottom: 0px;"><input type="radio" name="step1gender" value="Female" style="min-width: 20px;margin-bottom: 0px;">
							Female</p>
						</span>
					</div>
				</div>
<div class="clearfix"></div>
				<div class="col-lg-6">
					<div class="col-lg-4">
						<p>Occupation: </p>
					</div>
					<div class="col-lg-8">
						<input type="text" name="step1occupation" style="width:100%;">
					</div>
				</div>				

				<div class="col-lg-12">
					<div class="col-lg-2">
						<p>Home Address: </p>
					</div>
					<div class="col-lg-10">
						<input required="required" type="text" name="step1homeaddress" style="width:100%;">
					</div>
				</div>

				<div class="col-lg-4">
					<div class="col-lg-6">
						<p>City: </p>
					</div>
					<div class="col-lg-6">
						<input required="required" type="text" name="step1city">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="col-lg-6">
						<p>State: </p>
					</div>
					<div class="col-lg-6">
						<input required="required" type="text" name="step1state">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="col-lg-6">
						<p>Zip: </p>
					</div>
					<div class="col-lg-6">
						<input required="required" type="text" name="step1zipcode">
					</div>					
				</div>

				<div class="col-lg-6">
					<div class="col-lg-4"><p>Your E-Mail: </p></div>
					<div class="col-lg-8"><input required="required" type="email" name="step1email" ></div>					
				</div>
<div class="clearfix"></div>
				<div class="col-lg-6">
					<div class="col-lg-2">
						<p>Referral: </p>
					</div>
					<div class="col-lg-10">
						<input required="required" type="text" name="step1referral" >
					</div>
				</div>

			<div class="clearfix"></div>
				<div class="col-lg-12">
					<div class="col-lg-6">
						<p>Complaints: </p>
					</div>
					<div class="col-lg-6">
						<textarea name="step1complaints"></textarea>
					</div>
				</div>
<div class="clearfix"></div>
				<div class="col-lg-12">
					<div class="col-lg-6">
						<p>How many times per year do you get a cold or the flu?</p>
					</div>
					<div class="col-lg-6">
						<input type="text" name="step1how_many_time">
					</div>
				</div>
<div class="clearfix"></div>
				<div class="col-lg-12">
					<div class="col-lg-6">
						<p>Diet: </p>
					</div>
					<div class="col-lg-6">
						<textarea name="step1diet" class="col-lg-8" placeholder="Summarize how you eat;List any special diet such as high protein, row food etc."></textarea>
					</div>
				</div>
<div class="clearfix"></div>
				<div class="col-lg-12">
					<div class="col-lg-6">
						<p>Family medical history:</p>
					</div>
					<div class="col-lg-6">
						<textarea name="step1family-medical-history"></textarea>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="space"></div>
					<p style="text-align:left;float:none;"><strong>Step 2/4</strong></p>
					<hr>
				</div>

				<div class="col-lg-12">
					<div class="col-lg-2">
						<p>Emotions: </p>
					</div>
					<div class="col-lg-5">
						<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;margin-bottom:10px;">
							<p  style="min-width: 20px;"><input type="radio" name="step2Emotions" value="normal" style="min-width: 20px;">
							normal</p>
							<p  style="min-width: 20px;"><input type="radio" name="step2Emotions" value="problem" style="min-width: 20px;">
							problem</p>
						</span>
						<select name="Emotions_dropdown" class="form-control">
							<option>No Selection Made</option>
							<option value="Depression">Depression</option>
							<option value="Sadness">Sadness</option>
							<option value="Panick attack">Panick attack</option>
							<option value="Sensitive">Sensitive</option>
							<option value="Worries">Worries</option>
							<option value="Angry">Angry</option>
							<option value="Overly excited">Overly excited</option>
							<option value="Anxiety">Anxiety</option>
						</select>
					</div>
					<div class="col-lg-5">
						<p>Describe:</p>
						<textarea name="step2Emotions-description" ></textarea>
					</div>
				</div>
				

				<div class="col-lg-12">
					<div class="col-lg-2">
						
					</div>
					
				</div>

				<div class="col-lg-12">
					<div class="col-lg-12">
						<div class="space"></div>
					</div>
					<div class="col-lg-2">
						<p>Energy: </p>
					</div>
					<div class="col-lg-5">
						<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;margin-bottom:10px;">
							<p  style="min-width: 20px;"><input type="radio" name="step2Energy" value="normal" style="min-width: 20px;">
							normal</p>
							<p  style="min-width: 20px;"><input type="radio" name="step2Energy" value="problem" style="min-width: 20px;">
							problem</p>
						</span>

						<select class="form-control" name="Energy_dropdown">
							<option>No Selection Made</option>
							<option>low</option>
							<option>up & down</option>
							<option>exhausted</option>
							<option>hiperactive</option>
							<option>nervous energy</option>
							<option>abundant</option>
						</select>


					</div>
					<div class="col-lg-5">
						<p>Describe:</p>
						<textarea name="step2Energy-description" ></textarea>
					</div>
				</div>
				

				<div class="col-lg-12">
					<div class="col-lg-12"><div class="space"></div></div>
					<div class="col-lg-2">
						<p>Sleep pattern: </p>
					</div>
					<div class="col-lg-5">
						<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;margin-bottom: 10px;">
							<p  style="min-width: 20px;"><input type="radio" name="step2sleep-pattern-normal" value="normal" style="min-width: 20px;">
							normal</p>
							<p  style="min-width: 20px;"><input type="radio" name="step2sleep-pattern-insomnia" value="insomnia" style="min-width: 20px;">
							insomnia</p>
						</span>
						<p style="clear:both;">Falling asleep: </p>
						<select class="form-control" name="Sleep_pattern_dropdown">
							<option>No Selection Made</option>
							<option value="Sometimes_difficult">Sometimes difficult</option>
							<option value="Sometimes_very_difficult">Sometimes very difficult</option>
							<option value="Takes_Naps">takes naps</option>
							<option value="Always_Difficult">always difficult</option>
							<option value="Always_very_difficult">always very difficult</option>
							<option value="sleepy_in_daytime">sleepy in daytime</option>
							<option value="wake_up_too_early">wake up too early</option>
						</select>
					</div>
					<div class="col-lg-5">
						<p>Waking up:</p>
						<input type="text" name="step2-wakingup">

						<input type="checkbox" name="step2-wakingupcheck" value="wake-up-at-night-and-cannot-go-back-to-sleep-again" class="cus-check" style="margin-left: 10px;">
						<p>wake up at night and cannot go back to sleep again</p>	
					</div>
				</div>

				<div class="col-lg-12">
					<div class="col-lg-2"></div>
					<div class="col-lg-5">
						<p>Sleep quality:</p>
							<select class="form-control" name="Sleep_quality_dropdown">
								<option>No Selection Made</option>
								<option>deep</option>
								<option>many dreams</option>
								<option>talking in sleep</option>
								<option>light</option>
								<option>bad dreams</option>
								<option>other</option>
								<option>bad</option>
								<option>greending teeth</option>
							</select>
					</div>
					<div class="col-lg-5">
						<p>Describe: </p>
						<textarea  name="step2-Sleeppattern-description" value=""></textarea>
					</div>
				</div>



				<div class="col-lg-12">
					<div class="col-lg-12"><div class="space"></div></div>
					<div class="col-lg-2">
						<p> Menstrual cycle: </p>
					</div>
					<div class="col-lg-10">
						<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;">
							<p  style="min-width: 20px;"><input type="radio" name="Menstrualcycle" value="regular" style="min-width: 20px;">
							regular</p>
							<p  style="min-width: 20px;"><input type="radio" name="Menstrualcycle" value="irregular" style="min-width: 20px;">
							irregular</p>
						</span>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<div class="col-lg-6">
							<div class="col-sm-8"><p>Age of outset: </p></div>
							<div class="col-sm-4"><input type="text" name="step2-Ageofoutset" >
							</div>			
						</div>
						<div class="col-lg-6">
							<div class="col-sm-6"><p>Date of last period: </p></div>
							<div class="col-sm-6"><input type="text" name="step2-Dateoflastperiod"  data-provide="datepicker" class="datepicker" placeholder="Date"></div>
						</div>
						<div class="col-lg-6">
							<div class="col-sm-8"><p>How many days per cycle?</p></div>
							<div class="col-sm-4"><input type="text" name="step2-How-many-days-per-cycle" ></div>
						</div>
						<div class="col-lg-6">
							<div class="col-sm-8"><p>How many days did it last?</p></div>
							<div class="col-sm-4"><input type="text" name="step2-How-many-days-did-it-last" ></div>
						</div>
						<div class="col-lg-12">
							<p>Color: </p>
							<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;">
								<p  style="min-width: 20px;"><input type="radio" name="step2-Color" value="regular" style="min-width: 20px;">
								regular</p>
								<p  style="min-width: 20px;"><input type="radio" name="step2-Color" value="irregular" style="min-width: 20px;">
								irregular</p>
								<p  style="min-width: 20px;"><input type="radio" name="step2-Color" value="bright-red" style="min-width: 20px;">bright red</p>
								<p  style="min-widtm: 20px;"><input type="radio" name="step2-Color" value="purplish" style="min-width: 20px;">purplish</p>
							</span>
						</div>
						<div class="col-lg-6">
							<p>When did you feel pain?</p>
							<p  style="min-width: 20px;"><input type="radio" name="step2-Whendidyoufeelpain" value="Yes" style="min-width: 20px;">
							Yes</p>
							<p  style="min-width: 20px;"><input type="radio" name="step2-Whendidyoufeelpain" value="No" style="min-width: 20px;">
							No</p>
						</div>
						<div class="col-lg-6">
							<p>Menstrual pain:</p>
							<p  style="min-width: 20px;"><input type="radio" name="step2-menstrual-pain" value="Yes" style="min-width: 20px;">
							Yes</p>
							<p  style="min-width: 20px;"><input type="radio" name="step2-menstrual-pain" value="No" style="min-width: 20px;">
							No</p>
						</div>

						<div class="col-lg-12">
							<div class="col-lg-5">
								<p>When did you feel pain?</p>
								<select class="form-control" name="When_did_you_feel_pain_dropdown">
									<option>No Selection Made</option>
									<option value="before">before</option>
									<option value="during">during</option>
									<option value="after">after</option>
								</select>
							</div>
							<div class="col-lg-5">
							<p>Where did you feel pain?</p>
							<select class="form-control" name="Where_did_you_feel_pain_drop_down">
								<option>No Selection Made</option>
								<option value="abdomen">abdomen</option>
								<option value="back">back</option>
								<option value="breasts">breasts</option>
							</select>
							
						</div>
						</div>

						
						<div class="col-lg-12">
							<p>Emotions around period:</p>
							<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;margin-top:12px;">
								<p  style="min-width: 20px;"><input type="radio" name="step2-Emotionsaroundperiod" value="normal" style="min-width: 20px;">
								normal</p>
								<p  style="min-width: 20px;"><input type="radio" name="step2-Emotionsaroundperiod" value="abnormal" style="min-width: 20px;">
								abnormal</p>
							</span>
						</div>
						<div class="col-lg-12">
							<div class="col-lg-6">
								<p>When do you feel most emotional?</p>
								<select class="form-control" name="When_do_you_feel_most_emotional_dropdown">
									<option>No Selection Made</option>
									<option value="before">before</option>
									<option value="during">during</option>
									<option value="after">after</option>
								</select>

								<p>What emotions do you feel?</p>
								<select class="form-control" name="What_emotions_do_you_feel_dropdown">
									<option>No Selection Made</option>
									<option value="depression">depression</option>
									<option value="irritability">irritability</option>
									<option value="sadness">sadness</option>
									<option value="crying">crying</option>
								</select>
							</div>
							<div class="col-lg-6">
								<p>Describe: </p>
							<textarea class="col-lg-9" name="step2-Menstrualcycle-description" ></textarea>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="space"></div>
					<p style="text-align:left;float:none;"><strong>Step 3/4</strong></p>
					<hr>
					<div class="col-lg-2">
						<p>Temperature: </p>
					</div>
						<div class="col-lg-5">
						<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;margin-bottom: 10px;">
							<p  style="min-width: 20px;"><input type="radio" name="step3-Temperature" value="normal" style="min-width: 20px;">
							normal</p>
							<p  style="min-width: 20px;"><input type="radio" name="step3-Temperature" value="abnormal" style="min-width: 20px;">
							abnormal</p>
						</span>
						<select class="form-control" name="step3-Temperature_dropdown">
							<option>No Selection Made</option>
							<option value="feel cold easily">feel cold easily</option>
							<option value="cold hands">cold hands</option>
							<option value="cold feet">cold feet</option>
							<option value="alternating hot & cold">alternating hot & cold</option>
							<option value="hot flash">hot flash</option>
							<option value="feel hot easily">feel hot easily</option>
							<option value="sensitive to weather changes">sensitive to weather changes</option>
						</select>
						
					</div>
					<div class="col-lg-5">
						<p>Describe: </p>
						<textarea  name="step3-Temperature-description" ></textarea>
					</div>
			</div>

				<div class="col-lg-12" style="margin-top:20px;">
					<div class="col-lg-2">
						<p>Sweating: </p>
					</div>
					<div class="col-lg-5">
						<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;margin-bottom: 10px;margin-top:20px;">
							<p  style="min-width: 20px;"><input type="radio" name="step3-Sweating" value="normal" style="min-width: 20px;">
							normal</p>
							<p  style="min-width: 20px;"><input type="radio" name="step3-Sweating" value="abnormal" style="min-width: 20px;">
							abnormal</p>
						</span>
						<select class="form-control" name="Sweating_dropdown" >
							<option>No Selection Made</option>
							<option value="too easily">too easily</option>
							<option value="too much">too much</option>
							<option value="difficult">difficult</option>
							<option value="too little">too little</option>
							<option value="nightsweats">nightsweats</option>
							<option value="other">other</option>
						</select>
					</div>
					<div class="col-lg-5">
						<p>Describe: </p>
						<textarea  name="step3-Sweating-description" ></textarea>
					</div>
				</div>

				<div class="col-lg-12" style="margin-top:20px;">
					<div class="col-lg-2">
						<p>Sensitivity & Allergy:</p>
					</div>
					<div class="col-lg-5">
						<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;margin-bottom: 10px;margin-top:20px;">
							<p  style="min-width: 20px;"><input type="radio" name="step3-SensitivityAllergy" value="normal" style="min-width: 20px;">normal</p>
							<p  style="min-width: 20px;"><input type="radio" name="step3-SensitivityAllergy" value="problem" style="min-width: 20px;">problem</p>
						</span>
					</div>
					<div class="col-lg-5">
						<p>Describe: </p>
						<textarea class="col-lg-9" name="step3-Sensitivity-description" ></textarea>
					</div>
				</div>

				<div class="col-lg-12" style="margin-top:20px;">
					<div class="col-lg-2">
						<p>Bowel movement:</p>
					</div>
					<div class="col-lg-5">
						<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;margin-bottom: 10px;">
							<p  style="min-width: 20px;"><input type="radio" name="step3-Bowelmovement" value="normal" style="min-width: 20px;">normal</p>
							<p  style="min-width: 20px;"><input type="radio" name="step3-Bowelmovement" value="abnormal" style="min-width: 20px;">abnormal</p>
						</span>
						<select class="form-control" name="bowel_movement_dropdown">
							<option>No Selection Made</option>
							<option value="Time of day">Time of day</option>
							<option value="morning">morning</option>
							<option value="afternoon">afternoon</option>
							<option value="evening">evening</option>
							<option value="night">night</option>
							<option value="early morning">early morning</option>
							<option value="constipation">constipation</option>
							<option value="diarrhea">diarrhea</option>
							<option value="loose">loose</option>
							<option value="watery">watery</option>
							<option value="incomplete">incomplete</option>
							<option value="hard & dry">hard & dry</option>
							<option value="strong smell">strong smell</option>
							<option value="with mucous">with mucous</option>
							<option value="with blood">with blood</option>
							<option value="Other">Other</option>
						</select>
					</div>
					<div class="col-lg-5">
						<p>Describe: </p>
						<textarea  name="step3-Bowel-movement-description" ></textarea>
					</div>
				</div>

				<div class="col-lg-12">
					<p style="float:none;text-align: left;"><strong>Step 4/4</strong></p>
					<hr>
				</div>
				<div class="col-lg-12">

					<div class="col-lg-2">
						<p>Body weight: </p>
					</div>
					<div class="col-lg-10">

						<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;">
							<p  style="min-width: 20px;"><input type="radio" name="step4-Bodyweight" value="normal" style="min-width: 20px;">
							normal</p>
							<p  style="min-width: 20px;"><input type="radio" name="step4-Bodyweight" value="overweight" style="min-width: 20px;">
							overweight</p>
							<p  style="min-width: 20px;"><input type="radio" name="step4-Bodyweight" value="underweight" style="min-width: 20px;">
							underweight</p>
						</span>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<div class="col-lg-10">
							<p>How many pounds would you like to loose?</p>
						</div>
						<div class="col-lg-2">
							<input type="text" name="step4-howmanypoundwoulyouliketoloose" style="width: 50px;min-width: 50px;">
						</div>
						<div class="col-lg-10">
							<p>How many years ago did you first start to gain weight?</p>
						</div>
						<div class="col-lg-2">
							<input type="text" name="step4-Howmanyyearsagodidyoufirststarttogainweight" style="width: 50px;min-width: 50px;">
						</div>
					</div>

					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<p>Are you following a weight control program at this time?</p>
						<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;">
							<p  style="min-width: 20px;"><input type="radio" name="step4-Areyoufollowingaweightcontrolprogramatthistime" value="yes" style="min-width: 20px;">
							yes</p>
							<p  style="min-width: 20px;"><input type="radio" name="step4-Areyoufollowingaweightcontrolprogramatthistime" value="no" style="min-width: 20px;">
							no</p>
						</span>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<p>Describe: </p>
						<textarea name="step4-Menstrualcycle-description" ></textarea>
					</div>

					<div class="col-lg-12" style="margin-top:20px;">
					<div class="col-lg-2"><p>Drinking: </p></div>
					<div class="col-lg-5">
						<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;margin-bottom: 10px;">
							<p  style="min-width: 20px;"><input type="radio" name="step4-Drinking" value="normal" style="min-width: 20px;">
							normal</p>
							<p  style="min-width: 20px;"><input type="radio" name="step4-Drinking" value="abnormal" style="min-width: 20px;">
							abnormal</p>
						</span>
						<select class="form-control" name="drinking_dropdown">
							<option>No Selection Made</option>
							<option value="thirsty">thirsty</option>
							<option value="dry mouth">dry mouth</option>
							<option value="drink a lot">drink a lot</option>
							<option value="dry mouth but no desire to drink">dry mouth but no desire to drink</option>
							<option value="not thirsty, but drink a lot of water anyway">not thirsty, but drink a lot of water anyway</option>
						</select>
					</div>
					<div class="col-lg-5">
						<p>Describe: </p>
						<textarea name="step4-Drinking-description" ></textarea>
					</div>
					</div>
					
					<div class="col-lg-12" style="margin-top:20px;">
					<div class="col-lg-2" >
						<p>Urination: </p>
					</div>
					<div class="col-lg-5">
						<span style="border:1px solid gray; float: left;padding: 5px;min-height: 45px;min-width: 210px;margin-bottom: 10px;">
							<p  style="min-width: 20px;"><input type="radio" name="ste4-Urination" value="normal" style="min-width: 20px;">normal</p>
							<p  style="min-width: 20px;"><input type="radio" name="ste4-Urination" value="abnormal" style="min-width: 20px;">abnormal</p>
						</span>
						<select class="form-control" name="urination_dropdown">
							<option>No Selection Made</option>
							<option value="frequent">frequent</option>
							<option value="urgent">urgent</option>
							<option value="burning">burning</option>
							<option value="painful">painful</option>
							<option value="cloudy">cloudy</option>
							<option value="dark color">dark color</option>
							<option value="foul smell">foul smell</option>
							<option value="bloody">bloody</option>
							<option value="difficult">difficult</option>
							<option value="retention">retention</option>
							<option value="other">other</option>
						</select>
					</div>
					<div class="col-lg-5">
						<p>Describe: </p>
						<textarea class="col-lg-9" name="step4-Urination-description" ></textarea>
					</div>
					</div>
				</div>


				<div class="col-lg-12">
					<div class="space"></div>
					<p style="text-align: left;">Please note that if you make an Appointment, you are required to give at least a 24 hour notice if you cannot make it, otherwise you will be charged the full price of the appointment.</p>
				</div>
				<div class="col-lg-12">
					<input type="checkbox" name="step4-Checkhereifyouaccepttheseterms" value="Check-here-if-you-accept-these-terms" class="cus-check" required="required"><p class="txt-left">Check here if you accept these terms.</p>
				</div>
				<div class="col-lg-12">
					<p style="text-align: left;">Please, make sure to fill out all required fields marked with * After you press submit, if you missed a required field, the form will not submit, but it will mark in red the missing fields to remind you to fill them in. Please do so, and press send again.</p>
				</div>

				<div class="col-lg-12">
					<input type="submit" value="Submit" class="submit" style="width:200px !important;min-width: 200px;float:right;">
				</div>

			</form>
		</div>
		<div class="space"></div>
		<div class="space"></div>
	</div>
</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css">
<?php include('footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datepicker();
	});
</script>
