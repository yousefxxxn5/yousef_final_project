
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart Guardian</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1E3A8A, #3B82F6);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background: linear-gradient(135deg, #1E3A8A, #3B82F6);
            color: white;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3B82F6, #1E3A8A);
            border: none;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-shield-alt"></i> Smart Guardian Login
                    </div>
                    <div class="card-body">

                        <!-- رسالة نجاح عند التسجيل -->
                        @if (session()->has('register'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('register') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Country Code + Email -->
                            <div class="mb-3">
                                <label class="form-label">ٍSelect contry</label>

                                <!-- Select رمز الدولة -->
                                <select name="country_code"
                                    class="form-select mb-2 @error('country_code') is-invalid @enderror" required>
                                    <option value="+967" selected>Yemen (+967)</option>
                                    <option value="+93">Afghanistan (+93)</option>
                                    <option value="+358">Aland Islands (+358)</option>
                                    <option value="+355">Albania (+355)</option>
                                    <option value="+213">Algeria (+213)</option>
                                    <option value="+1684">American Samoa (+1684)</option>
                                    <option value="+376">Andorra (+376)</option>
                                    <option value="+244">Angola (+244)</option>
                                    <option value="+1264">Anguilla (+1264)</option>
                                    <option value="+672">Antarctica (+672)</option>
                                    <option value="+1268">Antigua and Barbuda (+1268)</option>
                                    <option value="+54">Argentina (+54)</option>
                                    <option value="+374">Armenia (+374)</option>
                                    <option value="+297">Aruba (+297)</option>
                                    <option value="+61">Australia (+61)</option>
                                    <option value="+43">Austria (+43)</option>
                                    <option value="+994">Azerbaijan (+994)</option>
                                    <option value="+1242">Bahamas (+1242)</option>
                                    <option value="+973">Bahrain (+973)</option>
                                    <option value="+880">Bangladesh (+880)</option>
                                    <option value="+1246">Barbados (+1246)</option>
                                    <option value="+375">Belarus (+375)</option>
                                    <option value="+32">Belgium (+32)</option>
                                    <option value="+501">Belize (+501)</option>
                                    <option value="+229">Benin (+229)</option>
                                    <option value="+1441">Bermuda (+1441)</option>
                                    <option value="+975">Bhutan (+975)</option>
                                    <option value="+591">Bolivia, Plurinational State of (+591)</option>
                                    <option value="+387">Bosnia and Herzegovina (+387)</option>
                                    <option value="+267">Botswana (+267)</option>
                                    <option value="+55">Brazil (+55)</option>
                                    <option value="+246">British Indian Ocean Territory (+246)</option>
                                    <option value="+673">Brunei Darussalam (+673)</option>
                                    <option value="+359">Bulgaria (+359)</option>
                                    <option value="+226">Burkina Faso (+226)</option>
                                    <option value="+257">Burundi (+257)</option>
                                    <option value="+855">Cambodia (+855)</option>
                                    <option value="+237">Cameroon (+237)</option>
                                    <option value="+1">Canada (+1)</option>
                                    <option value="+238">Cape Verde (+238)</option>
                                    <option value="+345">Cayman Islands (+345)</option>
                                    <option value="+236">Central African Republic (+236)</option>
                                    <option value="+235">Chad (+235)</option>
                                    <option value="+56">Chile (+56)</option>
                                    <option value="+86">China (+86)</option>
                                    <option value="+61">Christmas Island (+61)</option>
                                    <option value="+61">Cocos (Keeling) Islands (+61)</option>
                                    <option value="+57">Colombia (+57)</option>
                                    <option value="+269">Comoros (+269)</option>
                                    <option value="+242">Congo (+242)</option>
                                    <option value="+243">Congo, The Democratic Republic of the Congo (+243)</option>
                                    <option value="+682">Cook Islands (+682)</option>
                                    <option value="+506">Costa Rica (+506)</option>
                                    <option value="+225">Cote d'Ivoire (+225)</option>
                                    <option value="+385">Croatia (+385)</option>
                                    <option value="+53">Cuba (+53)</option>
                                    <option value="+357">Cyprus (+357)</option>
                                    <option value="+420">Czech Republic (+420)</option>
                                    <option value="+45">Denmark (+45)</option>
                                    <option value="+253">Djibouti (+253)</option>
                                    <option value="+1767">Dominica (+1767)</option>
                                    <option value="+1849">Dominican Republic (+1849)</option>
                                    <option value="+593">Ecuador (+593)</option>
                                    <option value="+20">Egypt (+20)</option>
                                    <option value="+503">El Salvador (+503)</option>
                                    <option value="+240">Equatorial Guinea (+240)</option>
                                    <option value="+291">Eritrea (+291)</option>
                                    <option value="+372">Estonia (+372)</option>
                                    <option value="+251">Ethiopia (+251)</option>
                                    <option value="+500">Falkland Islands (Malvinas) (+500)</option>
                                    <option value="+298">Faroe Islands (+298)</option>
                                    <option value="+679">Fiji (+679)</option>
                                    <option value="+358">Finland (+358)</option>
                                    <option value="+33">France (+33)</option>
                                    <option value="+594">French Guiana (+594)</option>
                                    <option value="+689">French Polynesia (+689)</option>
                                    <option value="+241">Gabon (+241)</option>
                                    <option value="+220">Gambia (+220)</option>
                                    <option value="+995">Georgia (+995)</option>
                                    <option value="+49">Germany (+49)</option>
                                    <option value="+233">Ghana (+233)</option>
                                    <option value="+350">Gibraltar (+350)</option>
                                    <option value="+30">Greece (+30)</option>
                                    <option value="+299">Greenland (+299)</option>
                                    <option value="+1473">Grenada (+1473)</option>
                                    <option value="+590">Guadeloupe (+590)</option>
                                    <option value="+1671">Guam (+1671)</option>
                                    <option value="+502">Guatemala (+502)</option>
                                    <option value="+44">Guernsey (+44)</option>
                                    <option value="+224">Guinea (+224)</option>
                                    <option value="+245">Guinea-Bissau (+245)</option>
                                    <option value="+595">Guyana (+595)</option>
                                    <option value="+509">Haiti (+509)</option>
                                    <option value="+379">Holy See (Vatican City State) (+379)</option>
                                    <option value="+504">Honduras (+504)</option>
                                    <option value="+852">Hong Kong (+852)</option>
                                    <option value="+36">Hungary (+36)</option>
                                    <option value="+354">Iceland (+354)</option>
                                    <option value="+91">India (+91)</option>
                                    <option value="+62">Indonesia (+62)</option>
                                    <option value="+98">Iran, Islamic Republic of Persian Gulf (+98)</option>
                                    <option value="+964">Iraq (+964)</option>
                                    <option value="+353">Ireland (+353)</option>
                                    <option value="+44">Isle of Man (+44)</option>
                                    <option value="+972">Israel (+972)</option>
                                    <option value="+39">Italy (+39)</option>
                                    <option value="+1876">Jamaica (+1876)</option>
                                    <option value="+81">Japan (+81)</option>
                                    <option value="+44">Jersey (+44)</option>
                                    <option value="+962">Jordan (+962)</option>
                                    <option value="+7">Kazakhstan (+7)</option>
                                    <option value="+254">Kenya (+254)</option>
                                    <option value="+686">Kiribati (+686)</option>
                                    <option value="+850">Korea, Democratic People's Republic of Korea (+850)</option>
                                    <option value="+82">Korea, Republic of South Korea (+82)</option>
                                    <option value="+383">Kosovo (+383)</option>
                                    <option value="+965">Kuwait (+965)</option>
                                    <option value="+996">Kyrgyzstan (+996)</option>
                                    <option value="+856">Laos (+856)</option>
                                    <option value="+371">Latvia (+371)</option>
                                    <option value="+961">Lebanon (+961)</option>
                                    <option value="+266">Lesotho (+266)</option>
                                    <option value="+231">Liberia (+231)</option>
                                    <option value="+218">Libyan Arab Jamahiriya (+218)</option>
                                    <option value="+423">Liechtenstein (+423)</option>
                                    <option value="+370">Lithuania (+370)</option>
                                    <option value="+352">Luxembourg (+352)</option>
                                    <option value="+853">Macao (+853)</option>
                                    <option value="+389">Macedonia (+389)</option>
                                    <option value="+261">Madagascar (+261)</option>
                                    <option value="+265">Malawi (+265)</option>
                                    <option value="+60">Malaysia (+60)</option>
                                    <option value="+960">Maldives (+960)</option>
                                    <option value="+223">Mali (+223)</option>
                                    <option value="+356">Malta (+356)</option>
                                    <option value="+692">Marshall Islands (+692)</option>
                                    <option value="+596">Martinique (+596)</option>
                                    <option value="+222">Mauritania (+222)</option>
                                    <option value="+230">Mauritius (+230)</option>
                                    <option value="+262">Mayotte (+262)</option>
                                    <option value="+52">Mexico (+52)</option>
                                    <option value="+691">Micronesia, Federated States of Micronesia (+691)</option>
                                    <option value="+373">Moldova (+373)</option>
                                    <option value="+377">Monaco (+377)</option>
                                    <option value="+976">Mongolia (+976)</option>
                                    <option value="+382">Montenegro (+382)</option>
                                    <option value="+1664">Montserrat (+1664)</option>
                                    <option value="+212">Morocco (+212)</option>
                                    <option value="+258">Mozambique (+258)</option>
                                    <option value="+95">Myanmar (+95)</option>
                                    <option value="+264">Namibia (+264)</option>
                                    <option value="+674">Nauru (+674)</option>
                                    <option value="+977">Nepal (+977)</option>
                                    <option value="+31">Netherlands (+31)</option>
                                    <option value="+599">Netherlands Antilles (+599)</option>
                                    <option value="+687">New Caledonia (+687)</option>
                                    <option value="+64">New Zealand (+64)</option>
                                    <option value="+505">Nicaragua (+505)</option>
                                    <option value="+227">Niger (+227)</option>
                                    <option value="+234">Nigeria (+234)</option>
                                    <option value="+683">Niue (+683)</option>
                                    <option value="+672">Norfolk Island (+672)</option>
                                    <option value="+1670">Northern Mariana Islands (+1670)</option>
                                    <option value="+47">Norway (+47)</option>
                                    <option value="+968">Oman (+968)</option>
                                    <option value="+92">Pakistan (+92)</option>
                                    <option value="+680">Palau (+680)</option>
                                    <option value="+970">Palestinian Territory, Occupied (+970)</option>
                                    <option value="+507">Panama (+507)</option>
                                    <option value="+675">Papua New Guinea (+675)</option>
                                    <option value="+595">Paraguay (+595)</option>
                                    <option value="+51">Peru (+51)</option>
                                    <option value="+63">Philippines (+63)</option>
                                    <option value="+872">Pitcairn (+872)</option>
                                    <option value="+48">Poland (+48)</option>
                                    <option value="+351">Portugal (+351)</option>
                                    <option value="+1939">Puerto Rico (+1939)</option>
                                    <option value="+974">Qatar (+974)</option>
                                    <option value="+40">Romania (+40)</option>
                                    <option value="+7">Russia (+7)</option>
                                    <option value="+250">Rwanda (+250)</option>
                                    <option value="+262">Reunion (+262)</option>
                                    <option value="+590">Saint Barthelemy (+590)</option>
                                    <option value="+290">Saint Helena, Ascension and Tristan Da Cunha (+290)</option>
                                    <option value="+1869">Saint Kitts and Nevis (+1869)</option>
                                    <option value="+1758">Saint Lucia (+1758)</option>
                                    <option value="+590">Saint Martin (+590)</option>
                                    <option value="+508">Saint Pierre and Miquelon (+508)</option>
                                    <option value="+1784">Saint Vincent and the Grenadines (+1784)</option>
                                    <option value="+685">Samoa (+685)</option>
                                    <option value="+378">San Marino (+378)</option>
                                    <option value="+239">Sao Tome and Principe (+239)</option>
                                    <option value="+966">Saudi Arabia (+966)</option>
                                    <option value="+221">Senegal (+221)</option>
                                    <option value="+381">Serbia (+381)</option>
                                    <option value="+248">Seychelles (+248)</option>
                                    <option value="+232">Sierra Leone (+232)</option>
                                    <option value="+65">Singapore (+65)</option>
                                    <option value="+421">Slovakia (+421)</option>
                                    <option value="+386">Slovenia (+386)</option>
                                    <option value="+677">Solomon Islands (+677)</option>
                                    <option value="+252">Somalia (+252)</option>
                                    <option value="+27">South Africa (+27)</option>
                                    <option value="+211">South Sudan (+211)</option>
                                    <option value="+500">South Georgia and the South Sandwich Islands (+500)</option>
                                    <option value="+34">Spain (+34)</option>
                                    <option value="+94">Sri Lanka (+94)</option>
                                    <option value="+249">Sudan (+249)</option>
                                    <option value="+597">Suriname (+597)</option>
                                    <option value="+47">Svalbard and Jan Mayen (+47)</option>
                                    <option value="+268">Swaziland (+268)</option>
                                    <option value="+46">Sweden (+46)</option>
                                    <option value="+41">Switzerland (+41)</option>
                                    <option value="+963">Syrian Arab Republic (+963)</option>
                                    <option value="+886">Taiwan (+886)</option>
                                    <option value="+992">Tajikistan (+992)</option>
                                    <option value="+255">Tanzania, United Republic of Tanzania (+255)</option>
                                    <option value="+66">Thailand (+66)</option>
                                    <option value="+670">Timor-Leste (+670)</option>
                                    <option value="+228">Togo (+228)</option>
                                    <option value="+690">Tokelau (+690)</option>
                                    <option value="+676">Tonga (+676)</option>
                                    <option value="+1868">Trinidad and Tobago (+1868)</option>
                                    <option value="+216">Tunisia (+216)</option>
                                    <option value="+90">Turkey (+90)</option>
                                    <option value="+993">Turkmenistan (+993)</option>
                                    <option value="+1649">Turks and Caicos Islands (+1649)</option>
                                    <option value="+688">Tuvalu (+688)</option>
                                    <option value="+256">Uganda (+256)</option>
                                    <option value="+380">Ukraine (+380)</option>
                                    <option value="+971">United Arab Emirates (+971)</option>
                                    <option value="+44">United Kingdom (+44)</option>
                                    <option value="+1">United States (+1)</option>
                                    <option value="+598">Uruguay (+598)</option>
                                    <option value="+998">Uzbekistan (+998)</option>
                                    <option value="+678">Vanuatu (+678)</option>
                                    <option value="+58">Venezuela, Bolivarian Republic of Venezuela (+58)</option>
                                    <option value="+84">Vietnam (+84)</option>
                                    <option value="+1284">Virgin Islands, British (+1284)</option>
                                    <option value="+1340">Virgin Islands, U.S. (+1340)</option>
                                    <option value="+681">Wallis and Futuna (+681)</option>
                                    <option value="+260">Zambia (+260)</option>
                                    <option value="+263">Zimbabwe (+263)</option>
                                </select>
                                @error('country_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <label class="form-label">Email number</label>

                                <input type="text" name="email"
                                    class="form-control mt-2 @error('email') is-invalid @enderror"
                                    placeholder="Enter email number" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt"></i> Login
                                </button>
                            </div>

                            <div class="mt-3 text-center">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                                @endif
                            </div>

                            <div class="mt-2 text-center">
                                Don’t have an account? <a href="{{ route('conf_user.index') }}">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>





{{--
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Smart Guardian</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        :root {
            --primary-blue: #1E3A8A;
            --light-blue: #3B82F6;
            --dark-gray: #374151;
            --light-gray: #F8FAFC;
            --success-green: #10B981;
            --error-red: #EF4444;
            --warning-orange: #F59E0B;
            --white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--light-blue) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        .auth-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }

        .auth-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-blue) 0%, var(--light-blue) 100%);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--light-blue) 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            box-shadow: 0 8px 16px rgba(30, 58, 138, 0.3);
        }

        .logo i {
            font-size: 2rem;
            color: white;
        }

        .logo-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }

        .logo-subtitle {
            color: var(--dark-gray);
            opacity: 0.7;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark-gray);
        }

        .email-input-group {
            display: flex;
            gap: 0.5rem;
        }

        .country-code-input {
            flex: 0 0 30%;
            /* Adjust width as needed */
        }

        .email-number-input {
            flex: 1;
            /* Take remaining space */
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #E5E7EB;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--light-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-input.error {
            border-color: var(--error-red);
        }

        .error-message {
            color: var(--error-red);
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }

        .btn {
            width: 100%;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--light-blue) 0%, var(--primary-blue) 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--light-blue);
            border: 2px solid var(--light-blue);
        }

        .btn-secondary:hover {
            background-color: var(--light-blue);
            color: white;
        }

        .form-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #E5E7EB;
        }

        .form-footer a {
            color: var(--light-blue);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: var(--primary-blue);
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .checkbox {
            width: 18px;
            height: 18px;
            accent-color: var(--light-blue);
        }

        .checkbox-label {
            font-size: 0.9rem;
            color: var(--dark-gray);
            cursor: pointer;
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .auth-container {
                padding: 1rem;
            }

            .auth-card {
                padding: 2rem;
            }

            .logo-title {
                font-size: 1.5rem;
            }
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-up {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <div class="auth-card fade-in">
            <div class="logo-section">
                <div class="logo">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h1 class="logo-title">Smart Guardian</h1>
                <p class="logo-subtitle">Advanced Security System</p>
            </div>

            <div class="slide-up">
                <form id="loginForm">
                    <div class="form-group">
                        <label for="email" class="form-label">Email Number</label>
                        <div class="email-input-group">
                            <select id="countryCode" name="countryCode" class="form-input country-code-input" required>
                                <option value="+93">Afghanistan (+93)</option>
                                <option value="+358">Aland Islands (+358)</option>
                                <option value="+355">Albania (+355)</option>
                                <option value="+213">Algeria (+213)</option>
                                <option value="+1684">American Samoa (+1684)</option>
                                <option value="+376">Andorra (+376)</option>
                                <option value="+244">Angola (+244)</option>
                                <option value="+1264">Anguilla (+1264)</option>
                                <option value="+672">Antarctica (+672)</option>
                                <option value="+1268">Antigua and Barbuda (+1268)</option>
                                <option value="+54">Argentina (+54)</option>
                                <option value="+374">Armenia (+374)</option>
                                <option value="+297">Aruba (+297)</option>
                                <option value="+61">Australia (+61)</option>
                                <option value="+43">Austria (+43)</option>
                                <option value="+994">Azerbaijan (+994)</option>
                                <option value="+1242">Bahamas (+1242)</option>
                                <option value="+973">Bahrain (+973)</option>
                                <option value="+880">Bangladesh (+880)</option>
                                <option value="+1246">Barbados (+1246)</option>
                                <option value="+375">Belarus (+375)</option>
                                <option value="+32">Belgium (+32)</option>
                                <option value="+501">Belize (+501)</option>
                                <option value="+229">Benin (+229)</option>
                                <option value="+1441">Bermuda (+1441)</option>
                                <option value="+975">Bhutan (+975)</option>
                                <option value="+591">Bolivia, Plurinational State of (+591)</option>
                                <option value="+387">Bosnia and Herzegovina (+387)</option>
                                <option value="+267">Botswana (+267)</option>
                                <option value="+55">Brazil (+55)</option>
                                <option value="+246">British Indian Ocean Territory (+246)</option>
                                <option value="+673">Brunei Darussalam (+673)</option>
                                <option value="+359">Bulgaria (+359)</option>
                                <option value="+226">Burkina Faso (+226)</option>
                                <option value="+257">Burundi (+257)</option>
                                <option value="+855">Cambodia (+855)</option>
                                <option value="+237">Cameroon (+237)</option>
                                <option value="+1">Canada (+1)</option>
                                <option value="+238">Cape Verde (+238)</option>
                                <option value="+345">Cayman Islands (+345)</option>
                                <option value="+236">Central African Republic (+236)</option>
                                <option value="+235">Chad (+235)</option>
                                <option value="+56">Chile (+56)</option>
                                <option value="+86">China (+86)</option>
                                <option value="+61">Christmas Island (+61)</option>
                                <option value="+61">Cocos (Keeling) Islands (+61)</option>
                                <option value="+57">Colombia (+57)</option>
                                <option value="+269">Comoros (+269)</option>
                                <option value="+242">Congo (+242)</option>
                                <option value="+243">Congo, The Democratic Republic of the Congo (+243)</option>
                                <option value="+682">Cook Islands (+682)</option>
                                <option value="+506">Costa Rica (+506)</option>
                                <option value="+225">Cote d'Ivoire (+225)</option>
                                <option value="+385">Croatia (+385)</option>
                                <option value="+53">Cuba (+53)</option>
                                <option value="+357">Cyprus (+357)</option>
                                <option value="+420">Czech Republic (+420)</option>
                                <option value="+45">Denmark (+45)</option>
                                <option value="+253">Djibouti (+253)</option>
                                <option value="+1767">Dominica (+1767)</option>
                                <option value="+1849">Dominican Republic (+1849)</option>
                                <option value="+593">Ecuador (+593)</option>
                                <option value="+20">Egypt (+20)</option>
                                <option value="+503">El Salvador (+503)</option>
                                <option value="+240">Equatorial Guinea (+240)</option>
                                <option value="+291">Eritrea (+291)</option>
                                <option value="+372">Estonia (+372)</option>
                                <option value="+251">Ethiopia (+251)</option>
                                <option value="+500">Falkland Islands (Malvinas) (+500)</option>
                                <option value="+298">Faroe Islands (+298)</option>
                                <option value="+679">Fiji (+679)</option>
                                <option value="+358">Finland (+358)</option>
                                <option value="+33">France (+33)</option>
                                <option value="+594">French Guiana (+594)</option>
                                <option value="+689">French Polynesia (+689)</option>
                                <option value="+241">Gabon (+241)</option>
                                <option value="+220">Gambia (+220)</option>
                                <option value="+995">Georgia (+995)</option>
                                <option value="+49">Germany (+49)</option>
                                <option value="+233">Ghana (+233)</option>
                                <option value="+350">Gibraltar (+350)</option>
                                <option value="+30">Greece (+30)</option>
                                <option value="+299">Greenland (+299)</option>
                                <option value="+1473">Grenada (+1473)</option>
                                <option value="+590">Guadeloupe (+590)</option>
                                <option value="+1671">Guam (+1671)</option>
                                <option value="+502">Guatemala (+502)</option>
                                <option value="+44">Guernsey (+44)</option>
                                <option value="+224">Guinea (+224)</option>
                                <option value="+245">Guinea-Bissau (+245)</option>
                                <option value="+595">Guyana (+595)</option>
                                <option value="+509">Haiti (+509)</option>
                                <option value="+379">Holy See (Vatican City State) (+379)</option>
                                <option value="+504">Honduras (+504)</option>
                                <option value="+852">Hong Kong (+852)</option>
                                <option value="+36">Hungary (+36)</option>
                                <option value="+354">Iceland (+354)</option>
                                <option value="+91">India (+91)</option>
                                <option value="+62">Indonesia (+62)</option>
                                <option value="+98">Iran, Islamic Republic of Persian Gulf (+98)</option>
                                <option value="+964">Iraq (+964)</option>
                                <option value="+353">Ireland (+353)</option>
                                <option value="+44">Isle of Man (+44)</option>
                                <option value="+972">Israel (+972)</option>
                                <option value="+39">Italy (+39)</option>
                                <option value="+1876">Jamaica (+1876)</option>
                                <option value="+81">Japan (+81)</option>
                                <option value="+44">Jersey (+44)</option>
                                <option value="+962">Jordan (+962)</option>
                                <option value="+7">Kazakhstan (+7)</option>
                                <option value="+254">Kenya (+254)</option>
                                <option value="+686">Kiribati (+686)</option>
                                <option value="+850">Korea, Democratic People's Republic of Korea (+850)</option>
                                <option value="+82">Korea, Republic of South Korea (+82)</option>
                                <option value="+383">Kosovo (+383)</option>
                                <option value="+965">Kuwait (+965)</option>
                                <option value="+996">Kyrgyzstan (+996)</option>
                                <option value="+856">Laos (+856)</option>
                                <option value="+371">Latvia (+371)</option>
                                <option value="+961">Lebanon (+961)</option>
                                <option value="+266">Lesotho (+266)</option>
                                <option value="+231">Liberia (+231)</option>
                                <option value="+218">Libyan Arab Jamahiriya (+218)</option>
                                <option value="+423">Liechtenstein (+423)</option>
                                <option value="+370">Lithuania (+370)</option>
                                <option value="+352">Luxembourg (+352)</option>
                                <option value="+853">Macao (+853)</option>
                                <option value="+389">Macedonia (+389)</option>
                                <option value="+261">Madagascar (+261)</option>
                                <option value="+265">Malawi (+265)</option>
                                <option value="+60">Malaysia (+60)</option>
                                <option value="+960">Maldives (+960)</option>
                                <option value="+223">Mali (+223)</option>
                                <option value="+356">Malta (+356)</option>
                                <option value="+692">Marshall Islands (+692)</option>
                                <option value="+596">Martinique (+596)</option>
                                <option value="+222">Mauritania (+222)</option>
                                <option value="+230">Mauritius (+230)</option>
                                <option value="+262">Mayotte (+262)</option>
                                <option value="+52">Mexico (+52)</option>
                                <option value="+691">Micronesia, Federated States of Micronesia (+691)</option>
                                <option value="+373">Moldova (+373)</option>
                                <option value="+377">Monaco (+377)</option>
                                <option value="+976">Mongolia (+976)</option>
                                <option value="+382">Montenegro (+382)</option>
                                <option value="+1664">Montserrat (+1664)</option>
                                <option value="+212">Morocco (+212)</option>
                                <option value="+258">Mozambique (+258)</option>
                                <option value="+95">Myanmar (+95)</option>
                                <option value="+264">Namibia (+264)</option>
                                <option value="+674">Nauru (+674)</option>
                                <option value="+977">Nepal (+977)</option>
                                <option value="+31">Netherlands (+31)</option>
                                <option value="+599">Netherlands Antilles (+599)</option>
                                <option value="+687">New Caledonia (+687)</option>
                                <option value="+64">New Zealand (+64)</option>
                                <option value="+505">Nicaragua (+505)</option>
                                <option value="+227">Niger (+227)</option>
                                <option value="+234">Nigeria (+234)</option>
                                <option value="+683">Niue (+683)</option>
                                <option value="+672">Norfolk Island (+672)</option>
                                <option value="+1670">Northern Mariana Islands (+1670)</option>
                                <option value="+47">Norway (+47)</option>
                                <option value="+968">Oman (+968)</option>
                                <option value="+92">Pakistan (+92)</option>
                                <option value="+680">Palau (+680)</option>
                                <option value="+970">Palestinian Territory, Occupied (+970)</option>
                                <option value="+507">Panama (+507)</option>
                                <option value="+675">Papua New Guinea (+675)</option>
                                <option value="+595">Paraguay (+595)</option>
                                <option value="+51">Peru (+51)</option>
                                <option value="+63">Philippines (+63)</option>
                                <option value="+872">Pitcairn (+872)</option>
                                <option value="+48">Poland (+48)</option>
                                <option value="+351">Portugal (+351)</option>
                                <option value="+1939">Puerto Rico (+1939)</option>
                                <option value="+974">Qatar (+974)</option>
                                <option value="+40">Romania (+40)</option>
                                <option value="+7">Russia (+7)</option>
                                <option value="+250">Rwanda (+250)</option>
                                <option value="+262">Reunion (+262)</option>
                                <option value="+590">Saint Barthelemy (+590)</option>
                                <option value="+290">Saint Helena, Ascension and Tristan Da Cunha (+290)</option>
                                <option value="+1869">Saint Kitts and Nevis (+1869)</option>
                                <option value="+1758">Saint Lucia (+1758)</option>
                                <option value="+590">Saint Martin (+590)</option>
                                <option value="+508">Saint Pierre and Miquelon (+508)</option>
                                <option value="+1784">Saint Vincent and the Grenadines (+1784)</option>
                                <option value="+685">Samoa (+685)</option>
                                <option value="+378">San Marino (+378)</option>
                                <option value="+239">Sao Tome and Principe (+239)</option>
                                <option value="+966">Saudi Arabia (+966)</option>
                                <option value="+221">Senegal (+221)</option>
                                <option value="+381">Serbia (+381)</option>
                                <option value="+248">Seychelles (+248)</option>
                                <option value="+232">Sierra Leone (+232)</option>
                                <option value="+65">Singapore (+65)</option>
                                <option value="+421">Slovakia (+421)</option>
                                <option value="+386">Slovenia (+386)</option>
                                <option value="+677">Solomon Islands (+677)</option>
                                <option value="+252">Somalia (+252)</option>
                                <option value="+27">South Africa (+27)</option>
                                <option value="+211">South Sudan (+211)</option>
                                <option value="+500">South Georgia and the South Sandwich Islands (+500)</option>
                                <option value="+34">Spain (+34)</option>
                                <option value="+94">Sri Lanka (+94)</option>
                                <option value="+249">Sudan (+249)</option>
                                <option value="+597">Suriname (+597)</option>
                                <option value="+47">Svalbard and Jan Mayen (+47)</option>
                                <option value="+268">Swaziland (+268)</option>
                                <option value="+46">Sweden (+46)</option>
                                <option value="+41">Switzerland (+41)</option>
                                <option value="+963">Syrian Arab Republic (+963)</option>
                                <option value="+886">Taiwan (+886)</option>
                                <option value="+992">Tajikistan (+992)</option>
                                <option value="+255">Tanzania, United Republic of Tanzania (+255)</option>
                                <option value="+66">Thailand (+66)</option>
                                <option value="+670">Timor-Leste (+670)</option>
                                <option value="+228">Togo (+228)</option>
                                <option value="+690">Tokelau (+690)</option>
                                <option value="+676">Tonga (+676)</option>
                                <option value="+1868">Trinidad and Tobago (+1868)</option>
                                <option value="+216">Tunisia (+216)</option>
                                <option value="+90">Turkey (+90)</option>
                                <option value="+993">Turkmenistan (+993)</option>
                                <option value="+1649">Turks and Caicos Islands (+1649)</option>
                                <option value="+688">Tuvalu (+688)</option>
                                <option value="+256">Uganda (+256)</option>
                                <option value="+380">Ukraine (+380)</option>
                                <option value="+971">United Arab Emirates (+971)</option>
                                <option value="+44">United Kingdom (+44)</option>
                                <option value="+1">United States (+1)</option>
                                <option value="+598">Uruguay (+598)</option>
                                <option value="+998">Uzbekistan (+998)</option>
                                <option value="+678">Vanuatu (+678)</option>
                                <option value="+58">Venezuela, Bolivarian Republic of Venezuela (+58)</option>
                                <option value="+84">Vietnam (+84)</option>
                                <option value="+1284">Virgin Islands, British (+1284)</option>
                                <option value="+1340">Virgin Islands, U.S. (+1340)</option>
                                <option value="+681">Wallis and Futuna (+681)</option>
                                <option value="+967">Yemen (+967)</option>
                                <option value="+260">Zambia (+260)</option>
                                <option value="+263">Zimbabwe (+263)</option>
                            </select>
                            <input type="tel" id="email" name="email" class="form-input email-number-input"
                                placeholder="Enter your email number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-input"
                            placeholder="Enter your password" required>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="remember" name="remember" class="checkbox">
                        <label for="remember" class="checkbox-label">Remember me</label>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i>
                        Login
                    </button>
                </form>

                <div class="form-footer">
                    <p>
                        <a href="#">Forgot Password?</a>
                    </p>
                    <p style="margin-top: 1rem;">
                        Don't have an account?
                        <a href="#">Create New Account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>


</body>

</html> --}}
