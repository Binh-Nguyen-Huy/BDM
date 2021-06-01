<?php include_once "file_exist.php" ?>

<?php
// define variables and set to empty values
$email = $phone = $fname = $lname = $address = $city = $zip = $country = $acctype = $businessname = $storename = $storecategory = $password = "";

$errors_count = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["first_name_user"])) {
        $errors_count++;
    } else {
        $fname = validate_input($_POST["first_name_user"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[A-Za-z]{3,}$/",$fname)) {
            $errors_count++;
       }
    }

    if (empty($_POST["last_name_user"])) {
        $errors_count++;
    } else {
        $lname = validate_input($_POST["last_name_user"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[A-Za-z]{3,}$/",$lname)) {
        $errors_count++;
        }
    }
    
    if (empty($_POST["email_address"])) {
        $errors_count++;
    } else {
        $email = validate_input($_POST["email_address"]);
        // check if e-mail address is well-formed
        if (!preg_match('/^[^.]([a-zA-Z0-9.]){2,}@[^.]([a-zA-Z0-9.]){2,}.[a-z]{2,5}$/',$email)) {
        $errors_count++;
        } else {
            if (file_exists("../users.csv")) {
                $file = file("../users.csv");
                foreach ($file as $row) {
                    $email_data = explode(',', $row)[0];
                    if ($email == $email_data) {
                        $errors_count++;
                        break;
                    }
                }
            }
        }
    }
        
    if (empty($_POST["phone_num"])) {
        $errors_count++;
    } else {
        $phone = validate_input($_POST["phone_num"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^([0-9]{1})([-. ]?[0-9]{1}){8,10}$/",$phone)) {
        $errors_count++;
        } else {
            if (file_exists("../users.csv")) {
                $file = file("../users.csv");
                foreach ($file as $row) {
                    $phone_data = explode(',', $row)[1];
                    if ($phone == $phone_data) {
                        $errors_count++;
                        break;
                    }
                }
            }
        }
    }

    if (empty($_POST["password_user"])) {
        $errors_count++;
    } else {
        $password = validate_input($_POST["password_user"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/",$password)) {
        $errors_count++;
        }
    }

    if (empty($_POST["repeat_pwd"])) {
        $errors_count++;
    } else {
        $retypepassword = validate_input($_POST["repeat_pwd"]);
        // check if name only contains letters and whitespace
        if ($password != $retypepassword) {
        $errors_count++;
        }
    }

    if (empty($_POST["address_user"])) {
        $errors_count++;
    } else {
        $address = validate_input($_POST["address_user"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^([a-zA-Z0-9]{2,}[ ]?[a-zA-Z0-9 ]+[, ]*[a-zA-Z0-9 ]*)+$/",$address)) {
        $errors_count++;
        }
    }

    if (empty($_POST["city"])) {
        $errors_count++;
        echo "17";
    } else {
        $city = validate_input($_POST["city"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^([a-zA-Z]{2,}[ ]*[a-zA-Z]+)+$/",$city)) {
        $errors_count++;
        }
    }
    
    if (empty($_POST["zipcode"])) {
        $errors_count++;
    } else {
        $zip = validate_input($_POST["zipcode"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[0-9]{4,6}$/",$zip)) {
        $errors_count++;
        }
    }

    if (empty($_POST["countryCode"])) {
        $errors_count++;
     
    } else {
        $country = validate_input($_POST["countryCode"]);
        $country_list = ["UK", "USA", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua & Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde Islands", "Cayman Islands", "Central African Republic", "Chile", "China", "Colombia", "Comoros", "Congo", "Cook Islands", "Costa Rica", "Croatia", "Cuba", "Cyprus North", "Cyprus South", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea - Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea North", "Korea South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mayotte", "Mexico", "Micronesia", "Moldova" ,"Vietnam"];
        if (!in_array($country, $country_list)) {
            $errors_count++;
            echo "loi country";
        }
    }

    if (empty($_POST["Account_Type"])) {
        $errors_count++;
    } else {
        $acctype = validate_input($_POST["Account_Type"]);
        echo $acctype;
        if ($acctype != 'shopper' && $acctype != 'store_owner') {
        $errors_count++;
        echo "3";
        }
    }
    
    if ($acctype == 'store_owner') {
    if (empty($_POST["business_name"])) {
        $errors_count++;

        echo "4";
    } else {
        $businessname = validate_input($_POST["business_name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[A-Za-z ]{1,}$/",$businessname)) {
        $errors_count++;
        echo "5";
        }
    }
    

    if (empty($_POST["store_name"])) {
        $errors_count++;
        echo "6";
    } else {
        $storename = validate_input($_POST["store_name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[A-Za-z ]{1,}$/",$storename)) {
        $errors_count++;
        echo "7";
        }
    }

    if (empty($_POST["store"])) {
        $errors_count++;
        echo "8 dcm";
    } else {
        $storecategory = validate_input($_POST["store"]);
        $store_list = ["Department Stores", "Grocery Stores", "Restaurants", "Clothing Stores", "Accessory Stores", "Pharmacies", "Technology Stores", "Pet Stores", "Toy Stores", "Speciality Stores", "Thrift Stores", "Services", "Kiosk"];
        if (!in_array($storecategory, $store_list)) {
            $errors_count++;
            echo "9";
        }
    }
}

    $userInfo = $email . ',' . $phone . ',' . $fname . ',' . $lname . ',' . $address . ',' . $city . ',' . $zip . ',' . $country . ',' . $acctype . ',' . $businessname . ',' . $storename . ',' . $storecategory . ',' . password_hash($password, PASSWORD_DEFAULT);
    $filename = '../users.csv';
    if ($errors_count == 0) {
        if (file_exists($filename)) {
            $fp = fopen($filename, "a");
            fwrite($fp, $userInfo . "\n");
            fclose($fp);
        }
        else {
            $fp = fopen($filename, "w");
            fwrite($fp, $userInfo . "\n");
            fclose($fp);
        }
        header('location: account_info.html');
    }
    
}

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <title>BDM Mall</title>
    </head>

    <header>
    <div class="nav">
            <a href="index.php">
                <img src="logo.webp" alt="logo" class="logo" />
            </a>
            <!-- Nav PC -->
            <nav class="nav__pc">
                <ul class="nav__list">
                    <li>
                        <a href="index.php" class="nav__link">HOME</a>
                    </li>
                    <li>
                        <a href="about_us.html" class="nav__link">ABOUT US</a>
                    </li>
                    <li>
                        <a href="fees.html" class="nav__link">FEES</a>
                    </li>
                    <li>
                        <a href="my_account_2.html" class="nav__link">MY ACCOUNT</a>
                    </li>
                    <li>
                        <input type="checkbox" name="" class="nav__drop" id="nav__dropdown">
                        <label for="nav__dropdown" class="nav__drop-btn">
                            <a>BROWSE</a>
                        </label>
                        <div class="nav__drop-content">
                            <a href="browse-by-name.php">Browse Stores by Name</a>
                            <a href="browse-by-category.php">Browse Stores by Category</a>
                        </div>
                    </li>
                    <li>
                        <a href="FAQs.html" class="nav__link">FAQs</a>
                    </li>
                    <li>
                        <a href="contact.html" class="nav__link">CONTACT</a>
                    </li>
                </ul>
            </nav>
            <!-- Nav Responsive -->
            <label for="nav__responsive-input" class="nav__responsive-bars-btn">
                <i class="fa fa-bars"></i>
            </label>
    
            <input type="checkbox" name="" class="nav__input" id="nav__responsive-input">
    
            <label for="nav__responsive-input" class="nav__overlay"></label>
    
            <nav class="nav__responsive">
                <ul class="nav__responsive-list">
                    <li>
                        <a href="index.php" class="nav__responsive-link">HOME</a>
                    </li>
                    <li>
                        <a href="about_us.html" class="nav__responsive-link">ABOUT US</a>
                    </li>
                    <li>
                        <a href="fees.html" class="nav__responsive-link">FEES</a>
                    </li>
                    <li>
                        <a href="my_account_2.html" class="nav__responsive-link">MY ACCOUNT</a>
                    </li>
                    <li>
                        <a href="browse-by-name.php" class="nav__responsive-link">Browse Stores by Name</a>
                    </li>
                    <li>
                        <a href="browse-by-category.php" class="nav__responsive-link">Browse Stores by Category</a>
                    </li>
                    <li>
                        <a href="FAQs.html" class="nav__responsive-link">FAQs</a>
                    </li>
                    <li>
                        <a href="contact.html" class="nav__responsive-link">CONTACT</a>
                    </li>
                </ul>
                <label for="nav__responsive-input" class="nav__responsive-close">
                    <i class="fa fa-times"></i>
                </label>
            </nav>
        </div>
    </header>

    <body class="acc_img">
        <div class = "grid">
            <div class="row">
                    <div class="col p-12 m-12 t-12">
                        <h1 id="register_account">Register Your Account</h1>
                    </div>
                    <form method="POST" class="form" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="row">
                            <div class="col p-6 m-12 t-12">
                                <div>
                                    <label for="email_address"><b id="register_label">Email</b></label><br>
                                    <input type="email" placeholder="Enter Email" name="email_address" id="register_input_email" onkeyup="ValidateEmail_register()" required><br><br>

                                    <span style="margin-left: 10%;" id ="text_mail_announce"></span>
                                    <br>
                                </div>
                            </div>

                            <div class="col p-6 m-12 t-12">
                                <div>
                                    <label for="phone_num"><b id="register_label">Phone Number</b></label><br>
                                    <input type="tel" placeholder="Enter Phone Number" name="phone_num" id="register_input_phone" onkeyup="ValidatePhone_register()" required><br><br>

                                    <span style="margin-left: 10%;" id ="phone_announce"></span>
                                    <br>
                                </div>
                            </div>

                            <div class="col p-6 m-12 t-12">
                                <div>
                                    <label for="password_user"><b id="register_label">Password</b></label><br>
                                    <input type="password" placeholder="Enter Your Password" name="password_user" id="register_input_pass" onkeyup="ValidPwd(), checkPass()" onblur="checkPass()"  required><br><br>

                                    <span style="margin-left: 10%;" id ="pass_announce"></span>
                                    <br>
                                </div>
                            </div>

                            <div class="col p-6 m-12 t-12">
                                <div>
                                    <label for="repeat_pwd"><b id="register_label">Repeat Password</b></label><br>
                                    <input type="password" placeholder="Repeat Your Password" name="repeat_pwd" id="register_input_repeat_pwd" onkeyup="checkPass()"required><br><br>

                                    <span style="margin-left: 10%;" id ="repeatpass_announce"></span>
                                    <br>
                                </div>
                            </div>

                            <div class="col p-6 m-12 t-12">
                                <div>
                                    <label for="first_name_user"><b id="register_label">First Name</b></label><br>
                                    <input type="text" placeholder="First Name" name="first_name_user" id="register_input_first_name" onkeyup="validNameAll('register_input_first_name', 'name_announce')" required><br><br>

                                    <span style="margin-left: 10%;" id ="name_announce"></span>
                                    <br>
                                </div>
                            </div>

                            <div class="col p-6 m-12 t-12">
                                <div>
                                    <label for="last_name_user"><b id="register_label">Last Name</b></label><br>
                                    <input type="text" placeholder="Last Name" name="last_name_user" id="register_input_last_name" onkeyup="validNameAll('register_input_last_name', 'name_announce_1')" required><br><br>

                                    <span style="margin-left: 10%;" id ="name_announce_1"></span>
                                    <br>
                                </div>
                            </div>

                            <div class="col p-6 m-12 t-12">
                                <div>
                                    <label for="address_user"><b id="register_label">Your Address</b></label><br>
                                    <input type="text" placeholder="Enter Your Address" name="address_user" id="register_input_address" onkeyup="validAddress('register_input_address', 'name_announce_3')" required><br><br>

                                    <span style="margin-left: 10%;" id ="name_announce_3"></span>
                                    <br>
                                </div>
                            </div>

                            <div class="col p-6 m-12 t-12">
                                <div>
                                    <label for="city"><b id="register_label">City</b></label><br>
                                    <input type="text" placeholder="Enter Your City" name="city" id="register_input_city" onkeyup="validNameAll('register_input_city', 'name_announce_4')" required><br><br>

                                    <span style="margin-left: 10%;" id ="name_announce_4"></span>
                                    <br>
                                </div>
                            </div>

                            <div class="col p-6 m-12 t-12">
                                <div class="reg-input">
                                    <label for="uname"><b id="register_label">Country</b></label><br>
                                    <select name="countryCode" id="countryCode_1">
                                        <option data-countryCode="GB" value="UK" Selected>UK (+44)</option>
                                        <option data-countryCode="US" value="USA">USA (+1)</option>
                                        <optgroup label="Other countries">
                                            <option data-countryCode="DZ" value="Algeria">Algeria (+213)</option>
                                            <option data-countryCode="AD" value="Andorra">Andorra (+376)</option>
                                            <option data-countryCode="AO" value="Angola">Angola (+244)</option>
                                            <option data-countryCode="AI" value="Anguilla">Anguilla (+1264)</option>
                                            <option data-countryCode="AG" value="Antigua">Antigua &amp; Barbuda (+1268)</option>
                                            <option data-countryCode="AR" value="Argentina">Argentina (+54)</option>
                                            <option data-countryCode="AM" value="Armenia">Armenia (+374)</option>
                                            <option data-countryCode="AW" value="Aruba">Aruba (+297)</option>
                                            <option data-countryCode="AU" value="Australia">Australia (+61)</option>
                                            <option data-countryCode="AT" value="Austria">Austria (+43)</option>
                                            <option data-countryCode="AZ" value="Azerbaijan">Azerbaijan (+994)</option>
                                            <option data-countryCode="BS" value="Bahamas">Bahamas (+1242)</option>
                                            <option data-countryCode="BH" value="Bahrain">Bahrain (+973)</option>
                                            <option data-countryCode="BD" value="Bangladesh">Bangladesh (+880)</option>
                                            <option data-countryCode="BB" value="Barbados">Barbados (+1246)</option>
                                            <option data-countryCode="BY" value="Belarus">Belarus (+375)</option>
                                            <option data-countryCode="BE" value="Belgium">Belgium (+32)</option>
                                            <option data-countryCode="BZ" value="Belize">Belize (+501)</option>
                                            <option data-countryCode="BJ" value="Benin">Benin (+229)</option>
                                            <option data-countryCode="BM" value="Bermuda">Bermuda (+1441)</option>
                                            <option data-countryCode="BT" value="Bhutan">Bhutan (+975)</option>
                                            <option data-countryCode="BO" value="Bolivia">Bolivia (+591)</option>
                                            <option data-countryCode="BA" value="Bosnia Herzegovina">Bosnia Herzegovina (+387)</option>
                                            <option data-countryCode="BW" value="Botswana">Botswana (+267)</option>
                                            <option data-countryCode="BR" value="Brazil">Brazil (+55)</option>
                                            <option data-countryCode="BN" value="Brunei">Brunei (+673)</option>
                                            <option data-countryCode="BG" value="Bulgaria">Bulgaria (+359)</option>
                                            <option data-countryCode="BF" value="Burkina Faso">Burkina Faso (+226)</option>
                                            <option data-countryCode="BI" value="Burundi">Burundi (+257)</option>
                                            <option data-countryCode="KH" value="Cambodia">Cambodia (+855)</option>
                                            <option data-countryCode="CM" value="Cameroon">Cameroon (+237)</option>
                                            <option data-countryCode="CA" value="Canada">Canada (+1)</option>
                                            <option data-countryCode="CV" value="Cape Verde Islands">Cape Verde Islands (+238)</option>
                                            <option data-countryCode="KY" value="Cayman Islands">Cayman Islands (+1345)</option>
                                            <option data-countryCode="CF" value="Central African Republic">Central African Republic (+236)</option>
                                            <option data-countryCode="CL" value="Chile">Chile (+56)</option>
                                            <option data-countryCode="CN" value="China">China (+86)</option>
                                            <option data-countryCode="CO" value="Colombia">Colombia (+57)</option>
                                            <option data-countryCode="KM" value="Comoros">Comoros (+269)</option>
                                            <option data-countryCode="CG" value="Congo">Congo (+242)</option>
                                            <option data-countryCode="CK" value="Cook Islands">Cook Islands (+682)</option>
                                            <option data-countryCode="CR" value="Costa Rica">Costa Rica (+506)</option>
                                            <option data-countryCode="HR" value="Croatia">Croatia (+385)</option>
                                            <option data-countryCode="CU" value="Cuba">Cuba (+53)</option>
                                            <option data-countryCode="CY" value="Cyprus North">Cyprus North (+90392)</option>
                                            <option data-countryCode="CY" value="Cyprus South">Cyprus South (+357)</option>
                                            <option data-countryCode="CZ" value="Czech Republic">Czech Republic (+42)</option>
                                            <option data-countryCode="DK" value="Denmark">Denmark (+45)</option>
                                            <option data-countryCode="DJ" value="Djibouti">Djibouti (+253)</option>
                                            <option data-countryCode="DM" value="Dominica">Dominica (+1809)</option>
                                            <option data-countryCode="DO" value="Dominican Republic">Dominican Republic (+1809)</option>
                                            <option data-countryCode="EC" value="Ecuador">Ecuador (+593)</option>
                                            <option data-countryCode="EG" value="Egypt">Egypt (+20)</option>
                                            <option data-countryCode="SV" value="El Salvador">El Salvador (+503)</option>
                                            <option data-countryCode="GQ" value="Equatorial Guinea">Equatorial Guinea (+240)</option>
                                            <option data-countryCode="ER" value="Eritrea">Eritrea (+291)</option>
                                            <option data-countryCode="EE" value="Estonia">Estonia (+372)</option>
                                            <option data-countryCode="ET" value="Ethiopia">Ethiopia (+251)</option>
                                            <option data-countryCode="FK" value="Falkland Islands">Falkland Islands (+500)</option>
                                            <option data-countryCode="FO" value="Faroe Islands">Faroe Islands (+298)</option>
                                            <option data-countryCode="FJ" value="Fiji">Fiji (+679)</option>
                                            <option data-countryCode="FI" value="Finland">Finland (+358)</option>
                                            <option data-countryCode="FR" value="France">France (+33)</option>
                                            <option data-countryCode="GF" value="French Guiana">French Guiana (+594)</option>
                                            <option data-countryCode="PF" value="French Polynesia">French Polynesia (+689)</option>
                                            <option data-countryCode="GA" value="Gabon">Gabon (+241)</option>
                                            <option data-countryCode="GM" value="Gambia">Gambia (+220)</option>
                                            <option data-countryCode="GE" value="Georgia">Georgia (+7880)</option>
                                            <option data-countryCode="DE" value="Germany">Germany (+49)</option>
                                            <option data-countryCode="GH" value="Ghana">Ghana (+233)</option>
                                            <option data-countryCode="GI" value="Gibraltar">Gibraltar (+350)</option>
                                            <option data-countryCode="GR" value="Greece">Greece (+30)</option>
                                            <option data-countryCode="GL" value="Greenland">Greenland (+299)</option>
                                            <option data-countryCode="GD" value="Grenada">Grenada (+1473)</option>
                                            <option data-countryCode="GP" value="Guadeloupe">Guadeloupe (+590)</option>
                                            <option data-countryCode="GU" value="Guam">Guam (+671)</option>
                                            <option data-countryCode="GT" value="Guatemala">Guatemala (+502)</option>
                                            <option data-countryCode="GN" value="Guinea">Guinea (+224)</option>
                                            <option data-countryCode="GW" value="Guinea - Bissau">Guinea - Bissau (+245)</option>
                                            <option data-countryCode="GY" value="Guyana">Guyana (+592)</option>
                                            <option data-countryCode="HT" value="Haiti">Haiti (+509)</option>
                                            <option data-countryCode="HN" value="Honduras">Honduras (+504)</option>
                                            <option data-countryCode="HK" value="Hong Kong">Hong Kong (+852)</option>
                                            <option data-countryCode="HU" value="Hungary">Hungary (+36)</option>
                                            <option data-countryCode="IS" value="Iceland">Iceland (+354)</option>
                                            <option data-countryCode="IN" value="India">India (+91)</option>
                                            <option data-countryCode="ID" value="Indonesia">Indonesia (+62)</option>
                                            <option data-countryCode="IR" value="Iran">Iran (+98)</option>
                                            <option data-countryCode="IQ" value="Iraq">Iraq (+964)</option>
                                            <option data-countryCode="IE" value="Ireland">Ireland (+353)</option>
                                            <option data-countryCode="IL" value="Israel">Israel (+972)</option>
                                            <option data-countryCode="IT" value="Italy">Italy (+39)</option>
                                            <option data-countryCode="JM" value="Jamaica">Jamaica (+1876)</option>
                                            <option data-countryCode="JP" value="Japan">Japan (+81)</option>
                                            <option data-countryCode="JO" value="Jordan">Jordan (+962)</option>
                                            <option data-countryCode="KZ" value="Kazakhstan">Kazakhstan (+7)</option>
                                            <option data-countryCode="KE" value="Kenya">Kenya (+254)</option>
                                            <option data-countryCode="KI" value="Kiribati">Kiribati (+686)</option>
                                            <option data-countryCode="KP" value="Korea North">Korea North (+850)</option>
                                            <option data-countryCode="KR" value="Korea South">Korea South (+82)</option>
                                            <option data-countryCode="KW" value="Kuwait">Kuwait (+965)</option>
                                            <option data-countryCode="KG" value="Kyrgyzstan">Kyrgyzstan (+996)</option>
                                            <option data-countryCode="LA" value="Laos">Laos (+856)</option>
                                            <option data-countryCode="LV" value="Latvia">Latvia (+371)</option>
                                            <option data-countryCode="LB" value="Lebanon">Lebanon (+961)</option>
                                            <option data-countryCode="LS" value="Lesotho">Lesotho (+266)</option>
                                            <option data-countryCode="LR" value="Liberia">Liberia (+231)</option>
                                            <option data-countryCode="LY" value="Libya">Libya (+218)</option>
                                            <option data-countryCode="LI" value="Liechtenstein">Liechtenstein (+417)</option>
                                            <option data-countryCode="LT" value="Lithuania">Lithuania (+370)</option>
                                            <option data-countryCode="LU" value="Luxembourg">Luxembourg (+352)</option>
                                            <option data-countryCode="MO" value="Macao">Macao (+853)</option>
                                            <option data-countryCode="MK" value="Macedonia">Macedonia (+389)</option>
                                            <option data-countryCode="MG" value="Madagascar">Madagascar (+261)</option>
                                            <option data-countryCode="MW" value="Malawi">Malawi (+265)</option>
                                            <option data-countryCode="MY" value="Malaysia">Malaysia (+60)</option>
                                            <option data-countryCode="MV" value="Maldives">Maldives (+960)</option>
                                            <option data-countryCode="ML" value="Mali">Mali (+223)</option>
                                            <option data-countryCode="MT" value="Malta">Malta (+356)</option>
                                            <option data-countryCode="MH" value="Marshall Islands">Marshall Islands (+692)</option>
                                            <option data-countryCode="MQ" value="Martinique">Martinique (+596)</option>
                                            <option data-countryCode="MR" value="Mauritania">Mauritania (+222)</option>
                                            <option data-countryCode="YT" value="Mayotte">Mayotte (+269)</option>
                                            <option data-countryCode="MX" value="Mexico">Mexico (+52)</option>
                                            <option data-countryCode="FM" value="Micronesia">Micronesia (+691)</option>
                                            <option data-countryCode="MD" value="Moldova">Moldova (+373)</option>
                                            <option data-countryCode="VN" value="Vietnam">Vietnam (+84)</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="col p-6 m-12 t-12">
                                <div class="reg-input">
                                    <label for="zipcode"><b id="register_label">Zip Code</b></label><br>
                                    <input type="number" placeholder="Enter Zip Code" name="zipcode" id="register_input_zip" minlength="4" maxlength="6" onkeyup="Validatzipcode_register()" required><br><br>

                                    <span style="margin-left: 10%;" id ="zip_announce"></span>
                                    <br>
                                </div>
                            </div>

                            <div class="col p-6 m-12 t-12">
                                <div>
                                    <label for="Account_Type"><b id="register_label">Account Type</b></label><br>
                                </div>
                                
                                <div class="col p-6 m-12 t-12">
                                    <input type="radio" id="register_input_1" name="Account_Type" value="store_owner" onclick="checkDisplay()" required>
                                    <label for="store_owner" id="register_label">Store Owner</label>
                                </div>

                                <div class="col p-6 m-12 t-12">
                                    <input type="radio" id="register_input_2" name="Account_Type" value="shopper" onclick="checkDisplay()">
                                    <label for="shopper" id="register_label">Shopper</label>
                                </div>
                            </div>


                            <div class="col p-6 m-12 t-12">
                                <div>
                                    <label for="img"><b id="register_label">Upload Picture</b></label><br>
                                    <input type="file" id="register_input" name="img" accept="image/*"><br><br>
                                </div>
                            </div>
                        </div>

                
                            <div class="only_register" id="content_head_apply" style="display: none;">
                                <h2>Only applied for Store Owner</h2>
                            </div>
                            <div class="row" id="abc" style="display: none;">
                        
                                    <div class="col p-6 m-12 t-12">
                                        <label for="business_name"><b id="register_label">Business Name</b></label><br>
                                        <input type="text"  placeholder="Enter Business Name" name="business_name" id="register_input"><br><br>
                                    </div>

                                    <div class="col p-6 m-12 t-12">
                                        <label for="store_name"><b id="register_label">Store Name</b></label><br>
                                        <input type="text" placeholder="Enter Store Name" name="store_name" id="register_input"><br><br>
                                    </div>


                                        <div class="col p-6 m-12 t-12">
                                            <div class="reg-input">
                                                <label for="uname"><b id="register_label">Store Categories</b></label><br>
                                                <select class="list" name="store" id="countryCode_1">
                                                    <option value="choose" >Select</option>		
                                                    <option value="Department Stores" >Department stores</option>
                                                    <option value="Grocery Stores" >Grocery stores</option>
                                                    <option value="Restaurants" >Restaurants</option>
                                                    <option value="Clothing Stores" >Clothing stores</option>
                                                    <option value="Accessory Stores" >Accessory stores</option>
                                                    <option value="Pharmacies" >Pharmacies</option>
                                                    <option value="Technology Stores" >Technology stores</option>
                                                    <option value="Pet Stores" >Pet stores</option>
                                                    <option value="Toy Stores" >Toy stores</option>
                                                    <option value="Specialty Stores" >Specialty stores</option>
                                                    <option value="Thrift Stores" >Thrift stores</option>
                                                    <option value="Services" >Services</option>
                                                    <option value=" Kiosks" > Kiosks</option>
                                                </select>
                                            </div>  
                                        </div>
                            </div>
                        <div class="row">
                            <div class="col p-6 m-12 t-12">
                                <div class="center-btn">
                                    <button type="reset" class="register_btn reset-btn">Reset</button>
                                </div>
                            </div>
                            <div class="col p-6 m-12 t-12">
                                <div class="center-btn">
                                    <button type="submit" class="register_btn signup-btn" id="register">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>

        <div class="cookies-container" id="mall">
            
            <h1>I use cookies</h1>
                
            <p>My website uses cookies necessary for its basic functioning. By continuing browsing, you consent to my use of cookies and other technologies</p>

            <div class="row">
                <div class="col p-2 t-12 m-12">
                    <button class="btn-cookies" id="mall">
                        I understand
                    </button>
                </div>

                <div class="col p-2 t-12 m-12">
                    <a href="">Learn More</a>
                </div>
            </div>
        </div>

        <script src="javascript/main.js"></script>
        <script src="javascript/cookies.js"></script>
    </body>
    
    <footer class="footer__distributed">
        <div class="footer__left">
            <img src="logo.webp" class="footer__logo">
            <p class="footer__links">
                <a href="index.php">HOME</a>
                |
                <a href="about_us.html">ABOUT US</a>
                |
                <a href="fees.html">FEES</a>
                |
                <a href="my_account_2.html">MY ACCOUNT</a>
                |
                <a href="browse-by-name.php">Browse Stores by Name</a>
                |
                <a href="browse-by-category.php">Browse Stores by Category</a>
                |
                <a href="FAQs.html">FAQs</a>
                |
                <a href="contact.html">CONTACT</a>
            </p>
        </div>
        <div class="footer__right">
            <p class="footer__company-about">
                <span>About the company</span>
                We specialize in providing fashion products with high-end brands of more than 500 famous brands globally, including fashion products, bags, watches, perfumes, eyewear, sneakers, beauty cosmetics, etc.</p>
            <div class="footer__icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>
            </div>
            <p class="footer__links">
                <a href="tos.php">Term of Service</a>
                |
                <a href="privacy.php">Privacy Policy</a>
                |
                <a href="copyright.php">Copyright</a>
            </p>
            <p class="footer__company-name">© 2021 BDM Team.</p>
        </div>
    </footer>
</html>