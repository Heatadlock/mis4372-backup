/*
Program Name: script.js
Author: Harrison Tadlock
Date Created: February 18, 2025
Date Modified: May 12, 2026
Version Number: 2.1
Description: Does Clock and Validation
Changes:
04/07/2026: 2.0 | updated from mis3371
05/12/2026: 2.1 | removed useless function 
*/

window.onload = function () {
    document.getElementById("datetime").innerText = new Date().toLocaleString();
};

// Helper function to set error messages
function setError(id, message, fieldId = null) {
    const element = document.getElementById(id);
    element.innerHTML = message;
    if (fieldId) {
      const field = document.getElementById(fieldId);
      field.classList.remove("valid");
      field.classList.add("invalid");
    }
  }

// Helper function to clear error messages
function clearError(id, fieldId = null) {
    const element = document.getElementById(id);
    element.innerHTML = "";
    if (fieldId) {
      const field = document.getElementById(fieldId);
      field.classList.remove("invalid");
      field.classList.add("valid");
    }
  }
// First Name Validation
function validatefirstName() {
    const value = document.getElementById("firstName").value;
    const pattern = /^[A-Za-z'-]{1,30}$/;
    if (!pattern.test(value)) {
        setError("firstName-error", "Invalid first name.");
        return false;
    }
    clearError("firstName-error", "firstName");
    return true;
}

// Middle Initial Validation
function validatemiddleInitial() {
    const value = document.getElementById("middleInitial").value;
    const pattern = /^[A-Za-z]?$/;
    if (!pattern.test(value)) {
        setError("middleInitial-error", "Invalid middle initial.");
        return false;
    }
    clearError("middleInitial-error", "middleInitial");
    return true;
}

// Last Name Validation
function validatelastName() {
    const value = document.getElementById("lastName").value;
    const pattern = /^[A-Za-z'-]{1,30}$/;
    if (!pattern.test(value)) {
        setError("lastName-error", "Invalid last name.");
        return false;
    }
    clearError("lastName-error", "lastName");
    return true;
}

// Date of Birth Validation

function validateDob() {
    dob = document.getElementById("dob");
    let date = new Date(dob.value);
    let maxDate = new Date().setFullYear(new Date().getFullYear() - 120);

    if (date > new Date()) {
        document.getElementById("dob-error").innerHTML = 
        "Date cannot be in the future";
        dob.value = "";
        return false;
    } else if (date < new Date(maxDate)) {
        document.getElementById("dob-error").innerHTML = 
        "Date can't be more than 120 years ago";
        dob.value = "";
        return false;
    } else {
        document.getElementById("dob-error").innerHTML = "";
        return true;
    }
}

// SSN Validation
    // Function to format SSN as the user types
    function formatSSN(input) {
        // Get the value from the input field and remove any non-numeric characters
        let ssn = input.value.replace(/\D/g, '');  // Remove non-numeric characters

        if (ssn.length > 3 && ssn.length <= 5) {
            ssn = ssn.substring(0, 3) + '-' + ssn.substring(3);
        } else if (ssn.length > 5) {
            ssn = ssn.substring(0, 3) + '-' + ssn.substring(3, 5) + '-' + ssn.substring(5, 9);
        }

        input.value = ssn;
        
        if (ssn.length === 11 && /^[0-9]{3}-[0-9]{2}-[0-9]{4}$/.test(ssn)) {
            clearError("ssn-error", "ssn");
        } else {
            setError("ssn-error", "Please enter a valid SSN in the format XXX-XX-XXXX", "ssn");
        }
    }

    function setError(id, message, fieldId = null) {
        const element = document.getElementById(id);
        element.innerHTML = message;
        if (fieldId) {
            const field = document.getElementById(fieldId);
            field.classList.remove("valid");
            field.classList.add("invalid");
        }
    }
    function clearError(id, fieldId = null) {
        const element = document.getElementById(id);
        element.innerHTML = "";
        if (fieldId) {
            const field = document.getElementById(fieldId);
            field.classList.remove("invalid");
            field.classList.add("valid");
        }
    }

// Address Validation
function validateAddress() {
    const address1 = document.getElementById("address1").value;
    if (address1.trim().length < 2) {
        setError("address-error", "Please enter a valid address.");
        return false;
    }
    clearError("address-error", "address");
    return true;
}

// City Validation
function validateCity() {
    city = document.getElementById("city").value.trim();
    if (!validateCity()) {
        valid = false;
    }
    if (!city) {
        document.getElementById("city-error").innerHTML = "City can't be blank";
        return false;
    } else {
        document.getElementById("city-error").innerHTML = "";
        return true;
    }
}

// Zipcode Validation
function validateZipcode() {
    const zipInput = document.getElementById("zipcode");
    let zip = zipInput.value.replace(/[^\d-]/g, "");

    if (!zip) {
        document.getElementById("zcode-error").innerHTML = 
        "Zip code can't be blank";
        return false;
    }

    if (zip.length > 5) {
        zip = zip.slice(0, 5) + "-" + zip.slice(5, 9);
    } else {
        zip = zip.slice(0, 5);
    }

    zipInput.value = zip;
    document.getElementById("zipcode-error").innerHTML = "";
    return true;
}

// Email Validation
function validateEmail() {
    const email = document.getElementById("email").value;
    const pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,20}$/i;
    if (!pattern.test(email)) {
        setError("email-error", "Please enter a valid email address.");
        return false;
    }
    clearError("email-error", "email");
    return true;
}

// Phone Validation
function validatePhone() {
    const phone = document.getElementById("phone").value;
    const pattern = /^\d{3}-\d{3}-\d{4}$/;
    if (!pattern.test(phone)) {
        setError("phone-error", "Needed Format: 000-000-0000");
        return false;
    }
    clearError("phone-error", "phone");
    return true;
}

//UID Validation
function validateUserID() {
    uid = document.getElementById("userID").value.toLowerCase();
    document.getElementById("userID").value = uid;

    if (uid.length == 0) {
        document.getElementById("userID-error").innerHTML = 
        "User ID can't be blank";
        return false;
    }

    if (!isNaN(uid.charAt(0))) {
        document.getElementById("userID-error").innerHTML = 
        "User ID can't start with a number";
        return false;
    }

    let regex = /^[a-zA-Z0-9_-]+$/;
    if (!regex.test(uid)) {
        document.getElementById("userID-error").innerHTML = 
        "User ID can only have letters, numbers, underscores, and dashes";
        return false;
    } else if (uid.length < 5) {
        document.getElementById("userID-error").innerHTML = 
        "User ID must be at least 5 characters";
        return false;
    } else if (uid.length > 30) {
        document.getElementById("userID-error").innerHTML = 
        "User ID can't exceed 30 characters";
        return false;
    } else {
        document.getElementById("userID-error").innerHTML = "";
        return true;
    }
}

// Password Validation
function validatePassword() {
    const password = document.getElementById("password").value;
    const userID = document.getElementById("userID").value.toLowerCase();
    let errorMessage = [];

    if (password.length < 8 || password.length > 20) {
        errorMessage.push("Password must be 8-20 characters.");
    }
    if (!password.match(/[a-z]/)) errorMessage.push("Include at least one lowercase letter.");
    if (!password.match(/[A-Z]/)) errorMessage.push("Include at least one uppercase letter.");
    if (!password.match(/[0-9]/)) errorMessage.push("Include at least one number.");
    if (!password.match(/[!\@#\$%&*\-_\\.+\(\)]/)) errorMessage.push("Include at least one special character.");
    if (password.includes(userID)) errorMessage.push("Password can't contain user ID.");

    if (errorMessage.length > 0) {
        setError("password-error", errorMessage.join("<br>"));
        return false;
    }

    clearError("password-error", "password");
    return true;
}

// Confirm Password Validation
function validateConfirmPassword() {
    const password = document.getElementById("password").value;
    const confirm = document.getElementById("confirmPassword").value;
    if (confirm !== password) {
        setError("confirmPassword-error", "Passwords do not match.");
        return false;
    }
    clearError("confirmPassword-error", "confirmPassword");
    return true;
}

// Review Button Utility
function reviewInput() {
    var formcontent = document.getElementById("signup");
    var formoutput = "<table class='output'><th colspan = '3'> Review Your Information:</th>";
    for (let i = 0; i < formcontent.length; i++) {
        if (formcontent.elements[i].value !== "") {
            switch (formcontent.elements[i].type) {
                case "checkbox":
                    if (formcontent.elements[i].checked) {
                        formoutput += `<tr><td align='right'>${formcontent.elements[i].name}</td><td>&#x2713;</td></tr>`;
                    }
                    break;
                case "radio":
                    if (formcontent.elements[i].checked) {
                        formoutput += `<tr><td align='right'>${formcontent.elements[i].name}</td><td>${formcontent.elements[i].value}</td></tr>`;
                    }
                    break;
                default:
                    formoutput += `<tr><td align='right'>${formcontent.elements[i].name}</td><td>${formcontent.elements[i].value}</td></tr>`;
            }
        }
    }
    formoutput += "</table>";
    document.getElementById("showInput").innerHTML = formoutput;
}
function removeReview() {
    document.getElementById("showInput").innerHTML = "";
}

// Validate All
function validateEverything() {
    let valid = true;

    if (!validatefirstName()) {
        valid = false;
    }
    if (!validatemiddleInitial()) {
        valid = false;
    }
    if (!validatelastName()) {
        valid = false;
    }
    if (!validateDob()) {
        valid = false;
    }
    if (!validateSsn()) {
        valid = false;
    }
    if (!vaildateAddress()) {
        valid = false;
    }
    if (!validateZipcode()) {
        valid = false;
    }
    if (!validateEmail()) {
        valid = false;
    }
    if (!validatePhone()) {
        valid = false;
    }
    if (!validateUserID()) {
        valid = false;
    }
    if (!validatePassword()) {
        valid = false;
    }
    if (!validateConfirmPassword()) {
        valid = false;
    }
     if (valid) {
         document.getElementById("submit").disabled = false;
     } else{
        showAlert();
     }
 }
 function showAlert() {
    alert("Please correct the errors before submitting.");
}

// Thank You page
function handleSubmit() {
    if (!validateEverything()) {
        return false; // prevent form submission if validation fails
    }

    // Redirect to thankyou.html
    window.location.href = "thankyou.html";

    return false;
}

// Display current date and time
function updateDateTime() {
    const now = new Date();
    const datetime = document.getElementById("datetime");
    datetime.innerText = now.toLocaleString();
}
setInterval(updateDateTime, 1000);
updateDateTime(); // initial call

// Cookie functions
function setCookie(name, cvalue, expiryDays) {
    const day = new Date();
    day.setTime(day.getTime() + (expiryDays * 24 * 60 * 60 * 2));
    const expires = "expires=" + day.toUTCString();
    document.cookie = name + "=" + encodeURIComponent(cvalue) + ";" + expires + ";path=/";
}

function getCookie(name) {
    const cookieName = name + "=";
    const cookies = document.cookie.split(";");
    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i].trim();
        if (cookie.indexOf(cookieName) === 0) {
            return decodeURIComponent(cookie.substring(cookieName.length, cookie.length));
        }
    }
    return "";
}

function deleteAllCookies() {
    document.cookie.split(";").forEach(function(cookie) {
        const eqPos = cookie.indexOf("=");
        const name = eqPos > -1 ? cookie.substring(0, eqPos).trim() : cookie.trim();
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;";
    });
}

// Define which inputs to track for cookies
const inputs = [
    { id: "first-name", cookieName: "firstName" },
    { id: "last-name", cookieName: "lastName" },
    // Add more fields here if needed
];

// DOMContentLoaded for prefill and event listeners
document.addEventListener("DOMContentLoaded", function () {
    const rememberMeCheckbox = document.getElementById("remember-me");

    // Prefill fields from cookies
    inputs.forEach(function (input) {
        const inputElement = document.getElementById(input.id);
        const cookieValue = getCookie(input.cookieName);
        if (cookieValue !== "") {
            inputElement.value = cookieValue;
        }

        // Save cookies on input change if Remember Me is checked
        inputElement.addEventListener("input", function () {
            if (rememberMeCheckbox.checked) {
                setCookie(input.cookieName, inputElement.value, 30);
            }
        });
    });

    // Welcome Message
    const firstName = getCookie("firstName");
    if (firstName !== "") {
        document.getElementById("welcome1").innerHTML = `Welcome back, ${firstName}!<br>`;
        document.getElementById("welcome2").innerHTML =
            `<a href="#" id="new-user">Not ${firstName}? Click here to start a new form.</a>`;

        // Reset cookies
        document.getElementById("new-user").addEventListener("click", function () {
            inputs.forEach(function (input) {
                setCookie(input.cookieName, "", -1);
            });
            location.reload();
        });
    }

    // Remember Me behavior
    rememberMeCheckbox.addEventListener("change", function () {
        if (!this.checked) {
            deleteAllCookies();
            console.log("All cookies deleted because 'Remember Me' is unchecked.");
        } else {
            // Re-save cookies if checked again
            inputs.forEach(function (input) {
                const el = document.getElementById(input.id);
                if (el.value.trim() !== "") {
                    setCookie(input.cookieName, el.value, 30);
                }
            });
            console.log("Cookies saved because 'Remember Me' is checked.");
        }
    });

    // Delete cookies if Remember Me is unchecked on load
    if (!rememberMeCheckbox.checked) {
        deleteAllCookies();
    }
});

// end of script.js file