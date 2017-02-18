<?php
/**
 * Template Name: User Account Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// If User is not logged in redirect to landing
if (!is_user_logged_in()){
	wp_redirect( home_url() );
	exit;
}

// Retreive current user object https://codex.wordpress.org/Function_Reference/wp_get_current_user
$current_user = wp_get_current_user();

get_header('icpa');
?>

<div class="container-wrapper container-wrapper-primary-darker pt-4 pb-0">
	<div class="container">
		<div class="row pt-3">
			<div class="col-12">
				<h1 class="display-1 display-responsive">
					<?php echo $current_user->display_name; ?>
				</h1>
				<p class="organization">
					<i><?php echo $current_user->description; ?></i>
				</p>
				<ul class="nav nav-tabs p-0 pt-3" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#contribution" role="tab">Contribution Details</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#payment" role="tab">Payment Options</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container-wrapper container-wrapper-gray-lighter py-4">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<p class="mb-0"><small class="text-danger"><strong>Your account status is ‘Pending’. <br />We need to double check your information before we approve you as a participant.</strong></small></p>
			</div>
		</div>
	</div>
</div>
<div class="container pb-4">
	<div class="row">
		<div class="col-lg-9">
			<div class="tab-content">
				<div class="tab-pane fade show active mt-5" id="contribution" role="tabpanel">
					<form>
						<div class="form-group row">
		                    <label for="input-email" class="col-md-3 col-form-label">Title</label>
		                    <div class="col-md-9">
		                        <div class="btn-group btn-group-input" data-toggle="buttons">
		                            <label class="btn btn-primary active">
		                                <input type="radio" name="input-title" value="prof" id="input-title-prof" autocomplete="off" checked> Prof.
		                            </label>
		                            <label class="btn btn-primary">
		                                <input type="radio" name="input-title" value="dr" id="input-title-dr" autocomplete="off"> Dr.
		                            </label>
		                            <label class="btn btn-primary">
		                                <input type="radio" name="input-title" value="mr" id="input-title-mr" autocomplete="off"> Mr.
		                            </label>
		                            <label class="btn btn-primary">
		                                <input type="radio" name="input-title" value="ms" id="input-title-ms" autocomplete="off"> Ms.
		                            </label>
		                        </div>
		                    </div>
		                </div>		                <div class="form-group row">
		                    <label for="input-email" class="col-md-3 col-form-label">Participant type</label>
		                    <div class="col-md-9">
		                        <div class="btn-group btn-group-input" data-toggle="buttons">
		                            <label class="btn btn-primary active">
		                                <input type="radio" name="input-participant-type" value="regular" id="input-participant-type-regular" autocomplete="off" checked> Regular
		                            </label>
		                            <label class="btn btn-primary">
		                                <input type="radio" name="input-participant-type" value="student" id="input-participant-type-student" autocomplete="off"> Student
		                            </label>
		                            <label class="btn btn-primary">
		                                <input type="radio" name="input-participant-type" value="accompany" id="input-participant-type-accompany" autocomplete="off"> Accompany
		                            </label>
		                        </div>
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <label for="input-country" class="col-md-3 col-form-label">Country</label>
		                    <div class="col-md-9">
		                        <select class="custom-select">
		                        	<option value="AF">Afghanistan</option>
		                        	<option value="AX">Åland Islands</option>
		                        	<option value="AL">Albania</option>
		                        	<option value="DZ">Algeria</option>
		                        	<option value="AS">American Samoa</option>
		                        	<option value="AD">Andorra</option>
		                        	<option value="AO">Angola</option>
		                        	<option value="AI">Anguilla</option>
		                        	<option value="AQ">Antarctica</option>
		                        	<option value="AG">Antigua and Barbuda</option>
		                        	<option value="AR">Argentina</option>
		                        	<option value="AM">Armenia</option>
		                        	<option value="AW">Aruba</option>
		                        	<option value="AU">Australia</option>
		                        	<option value="AT">Austria</option>
		                        	<option value="AZ">Azerbaijan</option>
		                        	<option value="BS">Bahamas</option>
		                        	<option value="BH">Bahrain</option>
		                        	<option value="BD">Bangladesh</option>
		                        	<option value="BB">Barbados</option>
		                        	<option value="BY">Belarus</option>
		                        	<option value="BE">Belgium</option>
		                        	<option value="BZ">Belize</option>
		                        	<option value="BJ">Benin</option>
		                        	<option value="BM">Bermuda</option>
		                        	<option value="BT">Bhutan</option>
		                        	<option value="BO">Bolivia, Plurinational State of</option>
		                        	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
		                        	<option value="BA">Bosnia and Herzegovina</option>
		                        	<option value="BW">Botswana</option>
		                        	<option value="BV">Bouvet Island</option>
		                        	<option value="BR">Brazil</option>
		                        	<option value="IO">British Indian Ocean Territory</option>
		                        	<option value="BN">Brunei Darussalam</option>
		                        	<option value="BG">Bulgaria</option>
		                        	<option value="BF">Burkina Faso</option>
		                        	<option value="BI">Burundi</option>
		                        	<option value="KH">Cambodia</option>
		                        	<option value="CM">Cameroon</option>
		                        	<option value="CA">Canada</option>
		                        	<option value="CV">Cape Verde</option>
		                        	<option value="KY">Cayman Islands</option>
		                        	<option value="CF">Central African Republic</option>
		                        	<option value="TD">Chad</option>
		                        	<option value="CL">Chile</option>
		                        	<option value="CN">China</option>
		                        	<option value="CX">Christmas Island</option>
		                        	<option value="CC">Cocos (Keeling) Islands</option>
		                        	<option value="CO">Colombia</option>
		                        	<option value="KM">Comoros</option>
		                        	<option value="CG">Congo</option>
		                        	<option value="CD">Congo, the Democratic Republic of the</option>
		                        	<option value="CK">Cook Islands</option>
		                        	<option value="CR">Costa Rica</option>
		                        	<option value="CI">Côte d'Ivoire</option>
		                        	<option value="HR">Croatia</option>
		                        	<option value="CU">Cuba</option>
		                        	<option value="CW">Curaçao</option>
		                        	<option value="CY">Cyprus</option>
		                        	<option value="CZ">Czech Republic</option>
		                        	<option value="DK">Denmark</option>
		                        	<option value="DJ">Djibouti</option>
		                        	<option value="DM">Dominica</option>
		                        	<option value="DO">Dominican Republic</option>
		                        	<option value="EC">Ecuador</option>
		                        	<option value="EG">Egypt</option>
		                        	<option value="SV">El Salvador</option>
		                        	<option value="GQ">Equatorial Guinea</option>
		                        	<option value="ER">Eritrea</option>
		                        	<option value="EE">Estonia</option>
		                        	<option value="ET">Ethiopia</option>
		                        	<option value="FK">Falkland Islands (Malvinas)</option>
		                        	<option value="FO">Faroe Islands</option>
		                        	<option value="FJ">Fiji</option>
		                        	<option value="FI">Finland</option>
		                        	<option value="FR">France</option>
		                        	<option value="GF">French Guiana</option>
		                        	<option value="PF">French Polynesia</option>
		                        	<option value="TF">French Southern Territories</option>
		                        	<option value="GA">Gabon</option>
		                        	<option value="GM">Gambia</option>
		                        	<option value="GE">Georgia</option>
		                        	<option value="DE">Germany</option>
		                        	<option value="GH">Ghana</option>
		                        	<option value="GI">Gibraltar</option>
		                        	<option value="GR">Greece</option>
		                        	<option value="GL">Greenland</option>
		                        	<option value="GD">Grenada</option>
		                        	<option value="GP">Guadeloupe</option>
		                        	<option value="GU">Guam</option>
		                        	<option value="GT">Guatemala</option>
		                        	<option value="GG">Guernsey</option>
		                        	<option value="GN">Guinea</option>
		                        	<option value="GW">Guinea-Bissau</option>
		                        	<option value="GY">Guyana</option>
		                        	<option value="HT">Haiti</option>
		                        	<option value="HM">Heard Island and McDonald Islands</option>
		                        	<option value="VA">Holy See (Vatican City State)</option>
		                        	<option value="HN">Honduras</option>
		                        	<option value="HK">Hong Kong</option>
		                        	<option value="HU">Hungary</option>
		                        	<option value="IS">Iceland</option>
		                        	<option value="IN">India</option>
		                        	<option value="ID">Indonesia</option>
		                        	<option value="IR">Iran, Islamic Republic of</option>
		                        	<option value="IQ">Iraq</option>
		                        	<option value="IE">Ireland</option>
		                        	<option value="IM">Isle of Man</option>
		                        	<option value="IL">Israel</option>
		                        	<option value="IT">Italy</option>
		                        	<option value="JM">Jamaica</option>
		                        	<option value="JP">Japan</option>
		                        	<option value="JE">Jersey</option>
		                        	<option value="JO">Jordan</option>
		                        	<option value="KZ">Kazakhstan</option>
		                        	<option value="KE">Kenya</option>
		                        	<option value="KI">Kiribati</option>
		                        	<option value="KP">Korea, Democratic People's Republic of</option>
		                        	<option value="KR">Korea, Republic of</option>
		                        	<option value="KW">Kuwait</option>
		                        	<option value="KG">Kyrgyzstan</option>
		                        	<option value="LA">Lao People's Democratic Republic</option>
		                        	<option value="LV">Latvia</option>
		                        	<option value="LB">Lebanon</option>
		                        	<option value="LS">Lesotho</option>
		                        	<option value="LR">Liberia</option>
		                        	<option value="LY">Libya</option>
		                        	<option value="LI">Liechtenstein</option>
		                        	<option value="LT">Lithuania</option>
		                        	<option value="LU">Luxembourg</option>
		                        	<option value="MO">Macao</option>
		                        	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
		                        	<option value="MG">Madagascar</option>
		                        	<option value="MW">Malawi</option>
		                        	<option value="MY">Malaysia</option>
		                        	<option value="MV">Maldives</option>
		                        	<option value="ML">Mali</option>
		                        	<option value="MT">Malta</option>
		                        	<option value="MH">Marshall Islands</option>
		                        	<option value="MQ">Martinique</option>
		                        	<option value="MR">Mauritania</option>
		                        	<option value="MU">Mauritius</option>
		                        	<option value="YT">Mayotte</option>
		                        	<option value="MX">Mexico</option>
		                        	<option value="FM">Micronesia, Federated States of</option>
		                        	<option value="MD">Moldova, Republic of</option>
		                        	<option value="MC">Monaco</option>
		                        	<option value="MN">Mongolia</option>
		                        	<option value="ME">Montenegro</option>
		                        	<option value="MS">Montserrat</option>
		                        	<option value="MA">Morocco</option>
		                        	<option value="MZ">Mozambique</option>
		                        	<option value="MM">Myanmar</option>
		                        	<option value="NA">Namibia</option>
		                        	<option value="NR">Nauru</option>
		                        	<option value="NP">Nepal</option>
		                        	<option value="NL">Netherlands</option>
		                        	<option value="NC">New Caledonia</option>
		                        	<option value="NZ">New Zealand</option>
		                        	<option value="NI">Nicaragua</option>
		                        	<option value="NE">Niger</option>
		                        	<option value="NG">Nigeria</option>
		                        	<option value="NU">Niue</option>
		                        	<option value="NF">Norfolk Island</option>
		                        	<option value="MP">Northern Mariana Islands</option>
		                        	<option value="NO">Norway</option>
		                        	<option value="OM">Oman</option>
		                        	<option value="PK">Pakistan</option>
		                        	<option value="PW">Palau</option>
		                        	<option value="PS">Palestinian Territory, Occupied</option>
		                        	<option value="PA">Panama</option>
		                        	<option value="PG">Papua New Guinea</option>
		                        	<option value="PY">Paraguay</option>
		                        	<option value="PE">Peru</option>
		                        	<option value="PH">Philippines</option>
		                        	<option value="PN">Pitcairn</option>
		                        	<option value="PL">Poland</option>
		                        	<option value="PT">Portugal</option>
		                        	<option value="PR">Puerto Rico</option>
		                        	<option value="QA">Qatar</option>
		                        	<option value="RE">Réunion</option>
		                        	<option value="RO">Romania</option>
		                        	<option value="RU">Russian Federation</option>
		                        	<option value="RW">Rwanda</option>
		                        	<option value="BL">Saint Barthélemy</option>
		                        	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
		                        	<option value="KN">Saint Kitts and Nevis</option>
		                        	<option value="LC">Saint Lucia</option>
		                        	<option value="MF">Saint Martin (French part)</option>
		                        	<option value="PM">Saint Pierre and Miquelon</option>
		                        	<option value="VC">Saint Vincent and the Grenadines</option>
		                        	<option value="WS">Samoa</option>
		                        	<option value="SM">San Marino</option>
		                        	<option value="ST">Sao Tome and Principe</option>
		                        	<option value="SA">Saudi Arabia</option>
		                        	<option value="SN">Senegal</option>
		                        	<option value="RS">Serbia</option>
		                        	<option value="SC">Seychelles</option>
		                        	<option value="SL">Sierra Leone</option>
		                        	<option value="SG">Singapore</option>
		                        	<option value="SX">Sint Maarten (Dutch part)</option>
		                        	<option value="SK">Slovakia</option>
		                        	<option value="SI">Slovenia</option>
		                        	<option value="SB">Solomon Islands</option>
		                        	<option value="SO">Somalia</option>
		                        	<option value="ZA">South Africa</option>
		                        	<option value="GS">South Georgia and the South Sandwich Islands</option>
		                        	<option value="SS">South Sudan</option>
		                        	<option value="ES">Spain</option>
		                        	<option value="LK">Sri Lanka</option>
		                        	<option value="SD">Sudan</option>
		                        	<option value="SR">Suriname</option>
		                        	<option value="SJ">Svalbard and Jan Mayen</option>
		                        	<option value="SZ">Swaziland</option>
		                        	<option value="SE">Sweden</option>
		                        	<option value="CH">Switzerland</option>
		                        	<option value="SY">Syrian Arab Republic</option>
		                        	<option value="TW">Taiwan, Province of China</option>
		                        	<option value="TJ">Tajikistan</option>
		                        	<option value="TZ">Tanzania, United Republic of</option>
		                        	<option value="TH">Thailand</option>
		                        	<option value="TL">Timor-Leste</option>
		                        	<option value="TG">Togo</option>
		                        	<option value="TK">Tokelau</option>
		                        	<option value="TO">Tonga</option>
		                        	<option value="TT">Trinidad and Tobago</option>
		                        	<option value="TN">Tunisia</option>
		                        	<option value="TR">Turkey</option>
		                        	<option value="TM">Turkmenistan</option>
		                        	<option value="TC">Turks and Caicos Islands</option>
		                        	<option value="TV">Tuvalu</option>
		                        	<option value="UG">Uganda</option>
		                        	<option value="UA">Ukraine</option>
		                        	<option value="AE">United Arab Emirates</option>
		                        	<option value="GB">United Kingdom</option>
		                        	<option value="US">United States</option>
		                        	<option value="UM">United States Minor Outlying Islands</option>
		                        	<option value="UY">Uruguay</option>
		                        	<option value="UZ">Uzbekistan</option>
		                        	<option value="VU">Vanuatu</option>
		                        	<option value="VE">Venezuela, Bolivarian Republic of</option>
		                        	<option value="VN">Viet Nam</option>
		                        	<option value="VG">Virgin Islands, British</option>
		                        	<option value="VI">Virgin Islands, U.S.</option>
		                        	<option value="WF">Wallis and Futuna</option>
		                        	<option value="EH">Western Sahara</option>
		                        	<option value="YE">Yemen</option>
		                        	<option value="ZM">Zambia</option>
		                        	<option value="ZW">Zimbabwe</option>
		                        </select>
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <label for="input-email" class="col-md-3 col-form-label">Contribution</label>
		                    <div class="col-md-9">
		                        <div class="btn-group btn-group-input" data-toggle="buttons">
		                            <label class="btn btn-primary active">
		                                <input type="radio" name="input-contribution" value="presentation" id="input-contribution-presentation" autocomplete="off" checked> Presentation
		                            </label>
		                            <label class="btn btn-primary">
		                                <input type="radio" name="input-contribution" value="poster" id="input-contribution-talk" autocomplete="off"> Poster
		                            </label>
		                            <label class="btn btn-primary">
		                                <input type="radio" name="input-contribution" value="none" id="input-contribution-none" autocomplete="off"> None
		                            </label>
		                        </div>
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <label for="input-title" class="col-md-3 col-form-label">Title</label>
		                    <div class="col-md-9">
		                        <input class="form-control" type="text" id="input-title">
		                    </div>
		                </div>
		                <div class="form-group row">
		                    <label for="input-comments" class="col-md-3 col-form-label">Comments</label>
		                    <div class="col-md-9">
		                        <textarea class="form-control" id="input-comments" rows="3"></textarea>
		                    </div>
		                </div>
						<div class="py-3 text-right">
							<input type="submit" class="btn btn-warning" value="Update Information">
						</div>
					</form>
				</div>
				<div class="tab-pane fade mt-5" id="payment" role="tabpanel">
					<p>Soon to come</p>
				</div>
				<div class="tab-pane fade mt-5" id="profile" role="tabpanel">
					<form>
		                <div class="form-group row">
		                    <label for="input-email" class="col-md-3 col-form-label">Email</label>
		                    <div class="col-md-9">
		                        <input class="form-control" type="email" id="input-email" value="stepanovps@gmail.com" disabled />
		                    </div>
		                </div>
						<div class="form-group row">
							<label for="first_name" class="col-12 col-lg-3 col-form-label">First name</label>
							<div class="col-12 col-lg-9">
								<input class="form-control" type="text" name="first_name" id="first_name" />
							</div>
						</div>
						<div class="form-group row">
							<label for="last_name" class="col-12 col-lg-3 col-form-label">Last name</label>
							<div class="col-12 col-lg-9">
								<input class="form-control" type="text" name="last_name" id="last_name" />
							</div>
						</div>
						<div class="form-group row">
							<label for="description" class="col-12 col-lg-3 col-form-label">Organization</label>
							<div class="col-12 col-lg-9">
								<input class="form-control" type="text" name="description" id="description" />
							</div>
						</div>
						<div class="form-group row mt-4">
                            <div class="col-12 col-lg-9 offset-lg-3">
                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <a href="#" class="btn btn-link pl-0 js--reset-password-button"><?php _e( 'Reset password', 'understrap' ); ?></a>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <input type="submit" class="btn btn-warning" value="<?php _e( 'Update Information', 'understrap' ); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

define('__ROOT__', get_template_directory());

get_footer('icpa');

?>
