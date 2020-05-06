@extends('layouts.app')

<style>

  main {
    margin-top: 85px;
  }
  body {
    margin: 0px;
    -ms-overflow-style: none;
    overflow-y: scroll;
  }
  body::-webkit-scrollbar {
    display: none;
  }
  .main-grid-container {
    display: grid;
    grid-template-columns: 300px 3fr;
    column-gap: 100px;
  }
  .profile-picture-container {
    display: flex;
    align-items: baseline;
  }
  #picture {
    object-fit: cover;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-right: 50px;
  }
  .account-info-title {
    letter-spacing: 1.08px;
    font-size: 20px;
    font-weight: bold;
    padding: 20px 0px;
    color: #501A3E;
  }
  .account-info {
    display: grid;
    grid-template-columns: auto auto;
    font-size: 16px;
    row-gap: 20px;
    letter-spacing: 1.08px;
    color: #501A3E;
  }
  .account-info-description {
    text-transform: uppercase;
  }
  .profile-description {
    color: #FF485A;
  }
  .edit-profile, .follow {
    background-color: #501A3E;;
    border-radius: 4px;
    outline: none;
    letter-spacing: 1.08px;
  }
  .edit-profile a, .follow a {
    text-decoration: none;
    color: #FAF0F8;
  }
  .edit-profile a:hover, .follow a:hover {
    text-decoration: none;
  }
    
  label {
    padding: 10px 0px;
  }
  input {
    width: 400px;
    height: 40px;
    padding-left: 10px;
  }
  input:focus {
    outline: 3px solid #501A3E;
    border-color: transparent
  }
  input[type=submit] {
    color: #FAF0F8;
    background-color: #501A3E;
    letter-spacing: 1.08px; 
    margin-top: 20px;
  }
  input[type=submit]:focus {
    outline: 2px dotted #501A3E;
    outline-offset: 4px;
  }
  input[type=submit]::-moz-focus-inner {
    border: 0;
  }
  input[type=submit]:hover {
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  }
  select {
    width: 400px;
    height: 40px;
  }
  select:focus {
    outline: 3px solid #501A3E;
    border-color: transparent
  } 

  @media (max-width:1161px) {
    .account-info {
      grid-template-columns: auto;
    }
    #picture {
      margin-right: 20px;
    }
  }

  @media (max-width: 861px) {
    input, select {
      width: 300px;
    }
  }


  @media (max-width: 754px) {
    .main-grid-container {
      display: grid;
      grid-template-columns: auto;
    } 
    .form-container {
      width: 90%;
      margin: auto;
      margin-bottom: 20px;
    }
    input, select {
      width: 80%;
    }
    .account-info {
      grid-template-columns: auto auto;
    }
  }

  @media(max-width: 700px) {
    .account-info {
      grid-template-columns: auto;
    }
  }

  @media (max-width: 500px) {
    #picture {
      object-fit: cover;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-right: 10px;
    }
  }

  @media (max-width: 318px) {
    main {
      margin-top: 125px;
    }
  }
             
</style>
@section('content')

<div class="main-grid-container">
  <left-menu
    dashboard-route="{{route('home')}}" 
    view-profile-route="{{route('profiles.show', ['id' => $profile->id])}}"
    posts-route="{{route('posts.index')}}"
    drafts-route="{{route('drafts.index')}}"
    followers-route = "{{route('follows.followers')}}"
    following-route = "{{route('follows.following')}}"
  >
  </left-menu>

  <div class="form-container">
    <form action="/profiles/{{$profile->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      <div class="profile-picture-container">
        <div class="image-container">
          @if ($profile->profilePicture !== NULL)
            <img src="/storage/profilePictures/{{$profile->profilePicture}}" alt="profile picture" id="picture">
          @else
            <img src="/images/profilePicture.svg" alt="profile picture" id="picture">
          @endif
        </div>

        <div class="file-container">
          <label for="profilePicture"> Profile picture</label> <br>
          <input type="file" name="profilePicture" accept="image/*" onchange="loadFile(event)">
        </div>
      </div>

      <div class="account-info-title"> ACCOUNT INFORMATION </div>

        <div>
          <label for="firstName"> First Name </label> <br>
          <input type="text" name="firstName" id="firstName" value="{{$profile->firstName}}" >
        </div>

        <div>
          <label for="lastName"> Last Name </label> <br>
          <input type="text" name="lastName" id="lastName" value="{{$profile->lastName}}" >
        </div>

        <div>
          <label for="phone"> Phone </label> <br>
          <input type="number" name="phone" id="phone" value="{{$profile->phone}}" >
        </div>

        <div>
          <label for="country"> Country </label> <br>
              <select id="country" name="country" >
              <option value="" selected>Choose country</option>
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
              <option value="Midway Islands">Midway Islands</option>
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
              <option value="Trinidad & Tobago">Trinidad & Tobago</option>
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

          <div>
            <label for="state"> State </label> <br>
            <input type="text" name="state" id="state" value="{{$profile->state}}" >
          </div>

          <div>
            <input type="submit" value="Update Profile">
          </div>

        </form>
          
      </div>
</div>

<create-post create-post-route="{{route('posts.create')}}"> </create-post>
        
@endsection

<script>
    function loadFile (event) {
    var output = document.getElementById('picture');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
