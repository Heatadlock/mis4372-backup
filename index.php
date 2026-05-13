<?php
/*Program Name: index.
Author: Harrison Tadlock
Date Created: February 18, 2025
Date Modified: May 12, 2026
Version Number: 2.1
Description: Site Layout
Changes:
04/07/2026: 2.0 | updated from mis3371
05/12/2026: 2.1 | removed useless entries 
*/

include 'header.php'; 
?>

 <head>
    <meta charset="utf-8">

    <title>Medical Information Form</title>

    <!-- Load external CSS styles -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">
        <!--Header-->
        <!-- <header class="sticky">
            <div class="logo-text">
                <img src="brigid_health.png" alt="Brigid Health Logo" width="60" height="60"/>
                <h2>Brigid Health</h2>
            </div>
            <div id="datetime"></div>
        </header> -->
        <!-- <center>
            <span id="welcome1">Welcome</span>
            <h2>Medical Information Form</h2>
            <p id="datetime"></p>
        </center> -->
        <form
            name="medical-information"
            id="form"
            class="form-section"
            method="POST"
            action="database.php"
        >            
        <p1>Please fill out the following information</p1>
        
            <br><br>
            <!--Their Name-->
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" pattern="[A-Za-z]{1,30}" 
                    required onblur="validatefirstName()" minlength="1" 
                    maxlength="30" title="Letter, apostrophes, and dashes only">
                <span class="error" id="firstName-error"></span>
                <label for="middleInitial">Middle Initial:</label>
                <input type="text" id="middleInitial" name="middleInitial" pattern="[A-Za-z]{0,1}"
                    required onblur="validatemiddleInitial()" maxlength="1">
                <span class="error" id="middleInitial-error"></span>
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" pattern="[A-Za-z]{1,30}" 
                    required onblur="validatelastName()" minlength="1" 
                    maxlength="30" title="Letter, apostrophes, and dashes only">
                <span class="error" id="lastName-error"></span>
            <!--Remember Me-->
                <tr>
                    <td class="td1">
                        <label for="remember-me">Remember Me:</label>
                    </td>
                    <td>
                        <input type="checkbox" id="remember-me" name="remember-me" checked/>
                    </td>
                </tr>
            <br><br>
            <!--DOB-->
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="birthday" required onblur="validateDob()">
                <span class="error" id="dob-error"></span>
            <br><br>
            <!--SSN-->
                <label for="ssn">Social Security Number:</label>
                <input type="password" id="ssn" name="ssn" minlength="9" maxlength="11" 
                    placeholder="xxx-xx-xxxx" required title="Numbers, and dashes only" onblur="validateSSN()">
                <span class="error" id="ssn-error"></span>
            <br><br>
            <!--Address-->
                <label for="address1">Address Line 1:</label> <!--an XML list for extra credit-->
                <input type="text" id="address1" name="address1" minlength="2" maxlength="30"
                    required title="Please enter your address" placeholder="#####" onblur="vaildateAddress1()">
                <span class="error" id="address-error"></span>
            <br><br>
                <label for="address2">Address Line 2:</label>
                <input type="text" id="address2" name="address2" minlength="2" maxlength="30"
                    placeholder="#####" onblur="vaildateAddress()">
                <span class="error" id="address-error"></span>
            <br>
                <label for="city">City:</label>
                <input type="text" id="city" name="city" pattern="[A-Za-z]{1,30}" required onblur="validateCity()">
                <span class="error" id="city-error"></span>
                <label for="state">State:</label>
                <select id="states" name="states"> <!--SelectList is Copied from the web as listed in assignment-->
                    <option value="">Choose Your State</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                    <option value="DC">Washington D.C.</option>
                    <option value="PR">Puerto Rico</option>
                </select>
                <label for="zip">Zipcode:</label>
                <input type="text" id="zipcode" name="zipcode" pattern="^\d{5}(-\d{4})?$" required 
                    title="Numbers and a dash only" minlength="5" maxlength="10" placeholder="99999" onblur="validateZipcode()">
                <span class="error" id="zipcode-error"></span>
            <br><br>
                <!--Email-->
                <label for="email">Email Address:</label>
                <input type="text" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,20}$" placeholder="name@domain.tld"
                    onblur="validateEmail()">
                <span class="error" id="email-error"></span>
            <br><br>
                <!--Phone#-->
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="000-000-0000" 
                    onblur="validatePhone()"> <!--doesnt work-->
                <span class="error" id="phone-error"></span>
            <br><br>
                <!--Text Area-->
                <label>Describe your symptoms:</label>
                <textarea rows="3" cols="50" name="symptoms"></textarea>
            <br><br>
                <!--Checkboxes-->
                <fieldset>
                    <legend>Check all that apply:</legend>
                    <input type="checkbox" name="conditions[]" value="Headache"> Headache
                    <input type="checkbox" name="conditions[]" value="Soreness"> Soreness
                    <input type="checkbox" name="conditions[]" value="Temperature"> Temperature
                    <input type="checkbox" name="conditions[]" value="Nausea"> Nausea
                    <input type="checkbox" name="conditions[]" value="Tiredness"> Tiredness
                </fieldset>
            <br>
                <!--GeneralScale-->
                <label for="health">Rate your pain on a scale of (1-10):</label>
                <input type="range" id="health" name="health" min="1" max="10"> <!--needs to display 1-10-->
            <br><br>
                <!--Patient Sex-->
                <label>Biological Sex:</label>
                <input type="radio" id="Male" name="sex" value="Male">
                <label for="Male">Male</label>
                <input type="radio" id="Female" name="sex" value="Female">
                <label for="Female">Female</label>
            <br>
            <!--iFrame--> 
            <!-- <label>Symptom Look-up (not requried):</label>
            <div class="iframe-container">
                <iframe class="frame" src="https://symptoms.webmd.com/" frameborder="0" title="Look Up Your Symptoms">
                    iFrames are unsupported by your browser.
                </iframe>
            </div>  -->
                <!--Insured Status-->
                <label>Insured Status:</label>
                <input type="radio" id="Yes" name="insStatus" value="Yes">
                <label for="Yes">Patient is Insured</label>
                <input type="radio" id="No" name="insStatus" value="No"> 
                <label for="No">Patient is not Insured</label>
            <br>
                <!--Patient/Guardian-->
                <label>Who filled out this form:</label>
                <input type="radio" id="Patient" name="FormFiller" value="Patient">
                <label for="Patient">Patient</label>
                <input type="radio" id="Guardian" name="FormFiller" value="Guardian">
                <label for="Guardian">Guardian</label>
                <input type="radio" id="Other" name="FormFiller" value="Other">
                <label for="Other">Other</label>
            <br>
                <!--Set User/Pass-->
                <label for="userID">Desired User ID:</label>
                <input type="text" id="userID" name="userID" pattern=".{5,20}" required
                    onblur="validateUserID()">
                <span class="error" id="userID-error"></span>
            <br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" pattern=".{8,20}" placeholder="********"
                    required onblur="validatePassword()" oninput="validatePassword()" onfocus="validatePassword()">
                <span class="error" id="password-error"></span>
                <label for="confirmPassword">Re-enter Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" pattern=".{8,20}" 
                    placeholder="********" required onblur="validateConfirmPassword()" oninput="validateConfirmPassword()" onfocus="validateConfirmPassword()">
                <span class="error" id="confirmPassword-error"></span>
            
            <!--Buttons-->
                <!-- Review Button -->
                <input type="button" id="review" value="Review" onclick="reviewInput()">
                
                <!-- Validate Button -->
                <input type="button" id="validate" value="Validate" onclick="validateEverything()">
                
                <!-- Submit Button -->
                <input type="submit" id="submit" value="Submit">
                
                <!-- Reset Button -->
                <input type="reset" value="Clear and Restart">
            </div>
        </form>
            <center>
            <p id="showInput"></p>
        </center>
        
        <!-- Sticky Footer -->
            <footer class="footer sticky">
                <p>Brigid Health</p>
                <a href="mailto:hetadloc@cougarnet.uh.edu">Contact Us</a>
                <p>PO BOX 12345</p>
                <p>Houston TX 77001</p>
            </div>
    <!-- Load external JavaScript -->
    <script src="script.js"></script>
</body>

<!-- end of index.php file -->