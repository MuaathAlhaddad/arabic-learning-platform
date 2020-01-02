@extends('layouts.app')
@section('content')

<div class="container col-sm-6 mt-5">
 

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (isset($tutor))	

	<form class="shadow p-3 mb-5 bg-white rounded text-sm-center" method="post" action=" {{ route('tutors.update') }}" enctype="multipart/form-data">
			@csrf
			@method('PATCH')
		
			<h3 class=" text-sm-center text-uppercase font-weight-bold">Update your profile</h3>
			<!-- ---------------First and last name----------- -->
			<hr>
					
				
			<div class="form-row col-sm-12">
					<div class="form-group col-sm-6">
					<input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{$tutor->first_name}}">
					</div>
					<div class="form-group col-sm-6">
					<input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{$tutor->last_name}}">
					</div>
			</div>

			<!-- ---------------Password----------- -->
			<div class="form-row col-sm-12">
				<div class="form-group col-sm-6">
					<input type="password" class="form-control " name="password" placeholder="Password">
				</div>
				<div class="form-group col-sm-6">
					<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
				</div>
			</div>

			<!-- --------------- Email & ic_passport_no ----------- -->
			<div class="form-row col-sm-12">
				<div class="form-group col-sm-6">
					<input type="text" class="form-control" placeholder="Email" name="email" value="{{$tutor->email}}">
				</div>
				<div class="form-group col-sm-6">
					<input type="text" class="form-control" placeholder="IC/Passport no" name="ic_passport_no" value="{{$tutor->ic_passport_no}}">
				</div>
			</div>

			<!-- ---------------Address & Country of Origin----------- -->
			<div class="form-row col-sm-12">
				<div class="form-group col-sm-6">
				<input type="text" class="form-control" placeholder="Address" name="address" value="{{$tutor->address}}">
				</div>
				<div class="form-group col-sm-6">
				<select placeholder="" name="country" class="form-control">
					<option hidden disabled selected value>Country of Origin</option>
					<option value="Afganistan">Afghanistan</option>
					<option value="Albania">Albania</option>
					<option value="Algeria">Algeria</option>
					<option value="American Samoa">American Samoa</option>
					<option value="Andorra">Andorra</option>
					<option value="Angola">Angola</option>
					<option value="Anguilla">Anguilla</option>
					<option value="Antigua & Barbuda">Antigua & Barbuda</option>
					<option value="Argentina">Argentina</option>
					<option value="Armenia">Armenia</option>
					<option value="Aruba">Aruba</option>
					<option value="Australia">Australia</option>
					<option value="Austria">Austria</option>
					<option value="Azerbaijan">Azerbaijan</option>
					<option value="Bahamas">Bahamas</option>
					<option value="Bahrain">Bahrain</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="Barbados">Barbados</option>
					<option value="Belarus">Belarus</option>
					<option value="Belgium">Belgium</option>
					<option value="Belize">Belize</option>
					<option value="Benin">Benin</option>
					<option value="Bermuda">Bermuda</option>
					<option value="Bhutan">Bhutan</option>
					<option value="Bolivia">Bolivia</option>
					<option value="Bonaire">Bonaire</option>
					<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
					<option value="Botswana">Botswana</option>
					<option value="Brazil">Brazil</option>
					<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
					<option value="Brunei">Brunei</option>
					<option value="Bulgaria">Bulgaria</option>
					<option value="Burkina Faso">Burkina Faso</option>
					<option value="Burundi">Burundi</option>
					<option value="Cambodia">Cambodia</option>
					<option value="Cameroon">Cameroon</option>
					<option value="Canada">Canada</option>
					<option value="Canary Islands">Canary Islands</option>
					<option value="Cape Verde">Cape Verde</option>
					<option value="Cayman Islands">Cayman Islands</option>
					<option value="Central African Republic">Central African Republic</option>
					<option value="Chad">Chad</option>
					<option value="Channel Islands">Channel Islands</option>
					<option value="Chile">Chile</option>
					<option value="China">China</option>
					<option value="Christmas Island">Christmas Island</option>
					<option value="Cocos Island">Cocos Island</option>
					<option value="Colombia">Colombia</option>
					<option value="Comoros">Comoros</option>
					<option value="Congo">Congo</option>
					<option value="Cook Islands">Cook Islands</option>
					<option value="Costa Rica">Costa Rica</option>
					<option value="Cote DIvoire">Cote DIvoire</option>
					<option value="Croatia">Croatia</option>
					<option value="Cuba">Cuba</option>
					<option value="Curaco">Curacao</option>
					<option value="Cyprus">Cyprus</option>
					<option value="Czech Republic">Czech Republic</option>
					<option value="Denmark">Denmark</option>
					<option value="Djibouti">Djibouti</option>
					<option value="Dominica">Dominica</option>
					<option value="Dominican Republic">Dominican Republic</option>
					<option value="East Timor">East Timor</option>
					<option value="Ecuador">Ecuador</option>
					<option value="Egypt">Egypt</option>
					<option value="El Salvador">El Salvador</option>
					<option value="Equatorial Guinea">Equatorial Guinea</option>
					<option value="Eritrea">Eritrea</option>
					<option value="Estonia">Estonia</option>
					<option value="Ethiopia">Ethiopia</option>
					<option value="Falkland Islands">Falkland Islands</option>
					<option value="Faroe Islands">Faroe Islands</option>
					<option value="Fiji">Fiji</option>
					<option value="Finland">Finland</option>
					<option value="France">France</option>
					<option value="French Guiana">French Guiana</option>
					<option value="French Polynesia">French Polynesia</option>
					<option value="French Southern Ter">French Southern Ter</option>
					<option value="Gabon">Gabon</option>
					<option value="Gambia">Gambia</option>
					<option value="Georgia">Georgia</option>
					<option value="Germany">Germany</option>
					<option value="Ghana">Ghana</option>
					<option value="Gibraltar">Gibraltar</option>
					<option value="Great Britain">Great Britain</option>
					<option value="Greece">Greece</option>
					<option value="Greenland">Greenland</option>
					<option value="Grenada">Grenada</option>
					<option value="Guadeloupe">Guadeloupe</option>
					<option value="Guam">Guam</option>
					<option value="Guatemala">Guatemala</option>
					<option value="Guinea">Guinea</option>
					<option value="Guyana">Guyana</option>
					<option value="Haiti">Haiti</option>
					<option value="Hawaii">Hawaii</option>
					<option value="Honduras">Honduras</option>
					<option value="Hong Kong">Hong Kong</option>
					<option value="Hungary">Hungary</option>
					<option value="Iceland">Iceland</option>
					<option value="Indonesia">Indonesia</option>
					<option value="India">India</option>
					<option value="Iran">Iran</option>
					<option value="Iraq">Iraq</option>
					<option value="Ireland">Ireland</option>
					<option value="Isle of Man">Isle of Man</option>
					<option value="Israel">Israel</option>
					<option value="Italy">Italy</option>
					<option value="Jamaica">Jamaica</option>
					<option value="Japan">Japan</option>
					<option value="Jordan">Jordan</option>
					<option value="Kazakhstan">Kazakhstan</option>
					<option value="Kenya">Kenya</option>
					<option value="Kiribati">Kiribati</option>
					<option value="Korea North">Korea North</option>
					<option value="Korea Sout">Korea South</option>
					<option value="Kuwait">Kuwait</option>
					<option value="Kyrgyzstan">Kyrgyzstan</option>
					<option value="Laos">Laos</option>
					<option value="Latvia">Latvia</option>
					<option value="Lebanon">Lebanon</option>
					<option value="Lesotho">Lesotho</option>
					<option value="Liberia">Liberia</option>
					<option value="Libya">Libya</option>
					<option value="Liechtenstein">Liechtenstein</option>
					<option value="Lithuania">Lithuania</option>
					<option value="Luxembourg">Luxembourg</option>
					<option value="Macau">Macau</option>
					<option value="Macedonia">Macedonia</option>
					<option value="Madagascar">Madagascar</option>
					<option value="Malaysia">Malaysia</option>
					<option value="Malawi">Malawi</option>
					<option value="Maldives">Maldives</option>
					<option value="Mali">Mali</option>
					<option value="Malta">Malta</option>
					<option value="Marshall Islands">Marshall Islands</option>
					<option value="Martinique">Martinique</option>
					<option value="Mauritania">Mauritania</option>
					<option value="Mauritius">Mauritius</option>
					<option value="Mayotte">Mayotte</option>
					<option value="Mexico">Mexico</option>
					<option value="Mnameway Islands">Mnameway Islands</option>
					<option value="Moldova">Moldova</option>
					<option value="Monaco">Monaco</option>
					<option value="Mongolia">Mongolia</option>
					<option value="Montserrat">Montserrat</option>
					<option value="Morocco">Morocco</option>
					<option value="Mozambique">Mozambique</option>
					<option value="Myanmar">Myanmar</option>
					<option value="Nambia">Nambia</option>
					<option value="Nauru">Nauru</option>
					<option value="Nepal">Nepal</option>
					<option value="Netherland Antilles">Netherland Antilles</option>
					<option value="Netherlands">Netherlands (Holland, Europe)</option>
					<option value="Nevis">Nevis</option>
					<option value="New Caledonia">New Caledonia</option>
					<option value="New Zealand">New Zealand</option>
					<option value="Nicaragua">Nicaragua</option>
					<option value="Niger">Niger</option>
					<option value="Nigeria">Nigeria</option>
					<option value="Niue">Niue</option>
					<option value="Norfolk Island">Norfolk Island</option>
					<option value="Norway">Norway</option>
					<option value="Oman">Oman</option>
					<option value="Pakistan">Pakistan</option>
					<option value="Palau Island">Palau Island</option>
					<option value="Palestine">Palestine</option>
					<option value="Panama">Panama</option>
					<option value="Papua New Guinea">Papua New Guinea</option>
					<option value="Paraguay">Paraguay</option>
					<option value="Peru">Peru</option>
					<option value="Phillipines">Philippines</option>
					<option value="Pitcairn Island">Pitcairn Island</option>
					<option value="Poland">Poland</option>
					<option value="Portugal">Portugal</option>
					<option value="Puerto Rico">Puerto Rico</option>
					<option value="Qatar">Qatar</option>
					<option value="Republic of Montenegro">Republic of Montenegro</option>
					<option value="Republic of Serbia">Republic of Serbia</option>
					<option value="Reunion">Reunion</option>
					<option value="Romania">Romania</option>
					<option value="Russia">Russia</option>
					<option value="Rwanda">Rwanda</option>
					<option value="St Barthelemy">St Barthelemy</option>
					<option value="St Eustatius">St Eustatius</option>
					<option value="St Helena">St Helena</option>
					<option value="St Kitts-Nevis">St Kitts-Nevis</option>
					<option value="St Lucia">St Lucia</option>
					<option value="St Maarten">St Maarten</option>
					<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
					<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
					<option value="Saipan">Saipan</option>
					<option value="Samoa">Samoa</option>
					<option value="Samoa American">Samoa American</option>
					<option value="San Marino">San Marino</option>
					<option value="Sao Tome & Principe">Sao Tome & Principe</option>
					<option value="Saudi Arabia">Saudi Arabia</option>
					<option value="Senegal">Senegal</option>
					<option value="Seychelles">Seychelles</option>
					<option value="Sierra Leone">Sierra Leone</option>
					<option value="Singapore">Singapore</option>
					<option value="Slovakia">Slovakia</option>
					<option value="Slovenia">Slovenia</option>
					<option value="Solomon Islands">Solomon Islands</option>
					<option value="Somalia">Somalia</option>
					<option value="South Africa">South Africa</option>
					<option value="Spain">Spain</option>
					<option value="Sri Lanka">Sri Lanka</option>
					<option value="Sudan">Sudan</option>
					<option value="Suriname">Suriname</option>
					<option value="Swaziland">Swaziland</option>
					<option value="Sweden">Sweden</option>
					<option value="Switzerland">Switzerland</option>
					<option value="Syria">Syria</option>
					<option value="Tahiti">Tahiti</option>
					<option value="Taiwan">Taiwan</option>
					<option value="Tajikistan">Tajikistan</option>
					<option value="Tanzania">Tanzania</option>
					<option value="Thailand">Thailand</option>
					<option value="Togo">Togo</option>
					<option value="Tokelau">Tokelau</option>
					<option value="Tonga">Tonga</option>
					<option value="Trinnamead & Tobago">Trinnamead & Tobago</option>
					<option value="Tunisia">Tunisia</option>
					<option value="Turkey">Turkey</option>
					<option value="Turkmenistan">Turkmenistan</option>
					<option value="Turks & Caicos Is">Turks & Caicos Is</option>
					<option value="Tuvalu">Tuvalu</option>
					<option value="Uganda">Uganda</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="Ukraine">Ukraine</option>
					<option value="United Arab Erimates">United Arab Emirates</option>
					<option value="United States of America">United States of America</option>
					<option value="Uraguay">Uruguay</option>
					<option value="Uzbekistan">Uzbekistan</option>
					<option value="Vanuatu">Vanuatu</option>
					<option value="Vatican City State">Vatican City State</option>
					<option value="Venezuela">Venezuela</option>
					<option value="Vietnam">Vietnam</option>
					<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
					<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
					<option value="Wake Island">Wake Island</option>
					<option value="Wallis & Futana Is">Wallis & Futana Is</option>
					<option value="Yemen">Yemen</option>
					<option value="Zaire">Zaire</option>
					<option value="Zambia">Zambia</option>
					<option value="Zimbabwe">Zimbabwe</option>
				</select>
				</div>
			</div>

			
			<!-- ---------------Upload your Profile----------- -->
			<div class="form-row col-sm-12">
					<div class="input-group col-sm-12">
					<div class="input-group-prepend">
						<span class="input-group-text" name="inputGroupFileAddon01">Upload your Profile</span>
					</div>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="profile_photo" id="inputGroupFile01" 
						aria-describedby="inputGroupFileAddon01" value="{{$tutor->profile_photo}}">
						<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
					</div>
					</div>  
			</div>


			<!-- ---------------Upload your Qualifications----------- -->
			<div class="form-row col-sm-12 pt-3">
					<div class="input-group col-sm-12">
					<div class="input-group-prepend">
						<span class="input-group-text" name="inputGroupFileAddon01">Upload your Qualifications</span>
					</div>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="qualifications" id="inputGroupFile02" 
						aria-describedby="inputGroupFileAddon01" value="{{$tutor->qualifications}}">
						<label class="custom-file-label" for="inputGroupFile02">Choose file</label>
					</div>
					</div>  
			</div>
			<br>
			<!-- ---------------Headline @ Gender----------- -->
			<div class="form-row col-sm-12">
				<div class="form-group col-sm-6">
				<input type="text" class="form-control" name="headline" placeholder="Headline" value="{{$tutor->headline}}">
				</div>
				<div class="form-group col-sm-6">
				<select name="gender" class="form-control">
					<option hidden disabled selected value>Gender</option>
					<option value="male" {{$tutor->gender ==='male' ? 'selected' : 'null'}}>Male</option>
					<option value="female" {{$tutor->gender ==='female' ? 'selected' : 'null'}}>Female</option>
				</select>
				</div>
			</div>  

			<!-- ---------------Description----------- -->
			<div class="form-row col-sm-12">
				<div class="form-group col-sm-12">
				<label for="exampleFormControlTextarea1" class="font-weight-bold">Write your description in English</label>
				<textarea class="form-control" name="tutor_desc" rows="3"> {{$tutor->tutor_desc}} </textarea>
				</div>
			</div> 


			<!-- -----------------Day Time Schedule--------------- -->  
			<label for="DayTimeTable" class=" col-ms-12 h-25 font-weight-bold">Time Table</label>
			<div class="form-row col-sm-12 d-flex justify-content-center align-items-center p-2">
				  <table >
					  <tr>
					  <th style="width: 60px;"></th><th>Mon</th> <th>Tue</th> <th>Wed</th> <th>Thur</th> <th>Fir</th> <th>Sat</th> <th>Sun</th>
					</tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
				  </table>
			</div>

			<br> <br>
			<button type="submit" class="btn btn-primary">Update</button>
	</form>
@endif
</div>
<script>
		// Day and Timeslot Schedule
		var rows = document.getElementsByTagName('tr');
						
						rows[1].innerHTML +="<td>8:00 </td>";	
						for (var i = 1; i <= 7; i++) {
							rows[1].innerHTML += 
										"<td>"+	 
											"<div class='timeslot-container'>"+
												"<div class='timeslot-success'>"+
														"<input type='checkbox' name='timeslot[]' id='"+i+"' value='"+i+"' />"+
															"<label for='"+i+"'>"+i+"</label>"+
												"</div>"+	     	
											"</div>"+
										"</td>";
						}
						rows[2].innerHTML +="<td>9:00 </td>";	
						for (var i = 8; i <= 14; i++) {
							rows[2].innerHTML += 
										"<td>"+	 
											"<div class='timeslot-container'>"+
												"<div class='timeslot-success'>"+
													"<input type='checkbox' name='timeslot[]' id='"+i+"' value='"+i+"' />"+
														"<label for='"+i+"'>"+i+"</label>"+
												"</div>"+	     	
											"</div>"+
										"</td>";
						}
						rows[3].innerHTML +="<td>10:00 </td>";	
						for (var i = 15; i <= 21; i++) {
							rows[3].innerHTML += 
										"<td>"+	 
											"<div class='timeslot-container'>"+
												"<div class='timeslot-success'>"+
													"<input type='checkbox' name='timeslot[]' id='"+i+"' value='"+i+"' />"+
														"<label for='"+i+"'>"+i+"</label>"+
												"</div>"+	     	
											"</div>"+
										"</td>";
						}
						rows[4].innerHTML +="<td>11:00 </td>";	
						for (var i = 22; i <= 28; i++) {
							rows[4].innerHTML += 
										"<td>"+	 
											"<div class='timeslot-container'>"+
												"<div class='timeslot-success'>"+
													"<input type='checkbox' name='timeslot[]' id='"+i+"' value='"+i+"' />"+
														"<label for='"+i+"'>"+i+"</label>"+
												"</div>"+	     	
											"</div>"+
										"</td>";
						}
						rows[5].innerHTML +="<td>12:00 </td>";	
						for (var i = 29; i <= 35; i++) {
							rows[5].innerHTML += 
										"<td>"+	 
											"<div class='timeslot-container'>"+
												"<div class='timeslot-success'>"+
													"<input type='checkbox' name='timeslot[]' id='"+i+"' value='"+i+"' />"+
														"<label for='"+i+"'>"+i+"</label>"+
												"</div>"+	     	
											"</div>"+
										"</td>";
						}
						rows[6].innerHTML +="<td>13:00 </td>";	
						for (var i = 36; i <= 42; i++) {
							rows[6].innerHTML += 
										"<td>"+	 
											"<div class='timeslot-container'>"+
												"<div class='timeslot-success'>"+
													"<input type='checkbox' name='timeslot[]' id='"+i+"' value='"+i+"' />"+
														"<label for='"+i+"'>"+i+"</label>"+
												"</div>"+	     	
											"</div>"+
										"</td>";
						}
						rows[7].innerHTML +="<td>14:00 </td>";	
						for (var i = 43; i <= 49; i++) {
							rows[7].innerHTML += 
										"<td>"+	 
											"<div class='timeslot-container'>"+
												"<div class='timeslot-success'>"+
													"<input type='checkbox' name='timeslot[]' id='"+i+"' value='"+i+"' />"+
														"<label for='"+i+"'>"+i+"</label>"+
												"</div>"+	     	
											"</div>"+
										"</td>";
						}
						rows[8].innerHTML +="<td>15:00 </td>";	
						for (var i = 50; i <= 56; i++) {
							rows[8].innerHTML += 
										"<td>"+	 
											"<div class='timeslot-container'>"+
												"<div class='timeslot-success'>"+
													"<input type='checkbox' name='timeslot[]' id='"+i+"' value='"+i+"' />"+
														"<label for='"+i+"'>"+i+"</label>"+
												"</div>"+	     	
											"</div>"+
										"</td>";
						}
						rows[9].innerHTML +="<td>16:00 </td>";	
						for (var i = 57; i <= 63; i++) {
							rows[9].innerHTML += 
										"<td>"+	 
											"<div class='timeslot-container'>"+
												"<div class='timeslot-success'>"+
													"<input type='checkbox' name='timeslot[]' id='"+i+"' value='"+i+"' />"+
														"<label for='"+i+"'>"+i+"</label>"+
												"</div>"+	     	
											"</div>"+
										"</td>";
						}
						rows[10].innerHTML +="<td>17:00 </td>";	
						for (var i = 64; i <= 70; i++) {
							rows[10].innerHTML += 
										"<td>"+	 
											"<div class='timeslot-container'>"+
												"<div class='timeslot-success'>"+
													"<input type='checkbox' name='timeslot[]' id='"+i+"' value='"+i+"' />"+
														"<label for='"+i+"'>"+i+"</label>"+
												"</div>"+	     	
											"</div>"+
										"</td>";
						}
						rows[11].innerHTML +="<td>18:00 </td>";	
						for (var i = 71; i <= 77; i++) {
							rows[11].innerHTML += 
										"<td>"+	 
											"<div class='timeslot-container'>"+
												"<div class='timeslot-success'>"+
													"<input type='checkbox' name='timeslot[]' id='"+i+"' value='"+i+"' />"+
														"<label for='"+i+"'>"+i+"</label>"+
												"</div>"+	     	
											"</div>"+
										"</td>";
						}
						rows[12].innerHTML +="<td>19:00 </td>";	
						for (var i = 78; i <= 84; i++) {
							rows[12].innerHTML += 
										"<td>"+	 
											"<div class='timeslot-container'>"+
												"<div class='timeslot-success'>"+
													"<input type='checkbox' name='timeslot[]' id='"+i+"' value='"+i+"' />"+
														"<label for='"+i+"'>"+i+"</label>"+
												"</div>"+	     	
											"</div>"+
										"</td>";
						}rows[13].innerHTML +="<td>20:00 </td>";	
						for (var i = 85; i <= 91; i++) {
							rows[13].innerHTML += 
										"<td>"+	 
											"<div class='timeslot-container'>"+
												"<div class='timeslot-success'>"+
													"<input type='checkbox' name='timeslot[]' id='"+i+"' value='"+i+"' />"+
														"<label for='"+i+"'>"+i+"</label>"+
												"</div>"+	     	
											"</div>"+
										"</td>";
						}
		
		</script>

@endsection