//Fetching firstname,lastname and displaying fullname.

function updateFullName() {
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    document.getElementById("fullName").value = firstName + " " + lastName;
}
function validateName(id) {
    let firstName = document.getElementById("firstName").value.trim();
    let lastName = document.getElementById("lastName").value.trim();

    let regex = /^$|^[A-Za-z ]+$/;
    let firstNameError = document.getElementById("firstNameError");
    let lastNameError = document.getElementById("lastNameError");
    firstNameError.textContent = "";
    lastNameError.textContent = "";
    let isValid = true;

    // Validation for checking alphabets
    if (id === "firstName") {
        if (!regex.test(firstName)) {
            firstNameError.textContent = "First name can have only alphabets.";
            isValid = false;
        }
        // Validation for alphabet limit 
        if (firstName.length > 30) {
            firstNameError.textContent = "First name cannot have more than 30 alphabets.";
            isValid = false;
        }
        return isValid;
    }
    else if (id === "lastName") {
        if (!regex.test(lastName)) {
            lastNameError.textContent = "Last name can have only alphabets.";
            isValid = false;
        }
        // Validation for alphabet limit 
        if (lastName.length > 30) {
            lastNameError.textContent = "Last name cannot have more than 30 alphabets.";
            isValid = false;
        }
        return isValid;
    }
    else {
        if (!regex.test(firstName)) {
            firstNameError.textContent = "First name can have only alphabets.";
            isValid = false;
        }
        // Validation for alphabet limit 
        if (firstName.length > 30) {
            firstNameError.textContent = "First name cannot have more than 30 alphabets.";
            isValid = false;
        }
        if (!regex.test(lastName)) {
            lastNameError.textContent = "Last name can have only alphabets.";
            isValid = false;
        }
        // Validation for alphabet limit 
        if (lastName.length > 30) {
            lastNameError.textContent = "Last name cannot have more than 30 alphabets.";
            isValid = false;
        }
        return isValid;
    }
}
function validateFile() {
    let uploadedFile = document.getElementById("imageToUpload");
    let imageErrorMessage = document.getElementById("imageErrorMessage");
    imageErrorMessage.textContent = "";
    let imageUploaded = true;
    if (!uploadedFile.files || uploadedFile.files.length === 0) {
        imageErrorMessage.textContent = "Choose an image";
        imageUploaded = false;
    }
    return imageUploaded;
}
function validateMarks() {
    let marks = document.getElementById("marksField").value;
    let marksErrorMessage = document.getElementById("marksErrorMessage");
    let validMarks = true;
    let subjectRegex = /^[A-Za-z ]+$/;
    let marksRegex = /^\s*[0-9]+(\.[0-9]+)?\s*$/;
    marksErrorMessage.textContent = "";
    let marksArray = marks.split("\n");
    if (marks == "") {
        marksErrorMessage.textContent = "Marks field cannot be empty.";
        return false;
    }
    for(let i = 0; i < marksArray.length    ; i++) {
        marksErrorMessage.textContent = "";
        marks = marksArray[i].trim();
        console.log("i am blank");
        if(marks == "") {
            marksErrorMessage.textContent = "No empty lines.";
            validMarks = false;
            break;
        }
        let singleMarks = marks.split("|");
        if(singleMarks.length < 2){
            marksErrorMessage.textContent = "Enter subject and marks both.";
            validMarks = false;
            break;
        }       
        else if(singleMarks.length > 2) {
            marksErrorMessage.textContent = "Marks needs to be entered in the pattern (eg:English|85) all in new line.";
            validMarks = false;
            console.log("I am printed")
            break;
        }
        else if (!subjectRegex.test(singleMarks[0])) {
            marksErrorMessage.textContent = "Subject name should have only alphabets.";
            validMarks = false;
            console.log("I am printed")
            break;
        }
        else if (!marksRegex.test(singleMarks[1])) {
            marksErrorMessage.textContent = "Subject marks should have only digits.";
            validMarks = false;
            break;
        }
        else if(singleMarks[1] > 100) {
            marksErrorMessage.textContent = "Enter marks below 100.";
            validMarks = false;
            break;  
        }
        else if (!subjectRegex.test(singleMarks[0]) && !marksRegex.test(singleMarks[1])) {
            marksErrorMessage.textContent = "Follow the pattern (English|85)";
            validMarks = false;
            break;
        }
    }
    return validMarks;
}
function validateNumber() {
    let phoneNumber = document.getElementById("phoneField").value.trim();
    let phoneNumberError = document.getElementById("phoneNumberError");
    phoneNumberError.textContent = "";
    // Regex for exactly 10 digits
    let regexPhone = /^\d{10}$/;
    let validNumber = true;

    if (!regexPhone.test(phoneNumber)) {
        phoneNumberError.textContent = "Phone number should be exactly 10 digits.";
        validNumber = false;
    }
    if (/[A-Za-z]/.test(phoneNumber)) {
        phoneNumberError.textContent = "Phone number should have only digits.";
        validNumber = false;
    }
    if (phoneNumber == "") {
        phoneNumberError.textContent = "Phone number should not be empty."
        validNumber = false;
    }
    return validNumber;

}

function validateEmailSyntax() {
    // Validation for email 
    let validEmailSyntax = true;
    let emailError = document.getElementById("emailError");
    emailError.textContent = "";
    let email = document.getElementById("email").value;
    let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    // let validEmail = true;
    if (email === "") {
        emailError.textContent = "Email is required."
        console.log("Required");
        validEmailSyntax = false;
    }
    else if (!emailRegex.test(email)) {
        emailError.textContent = "Invalid email syntax."
        validEmailSyntax = false;
    }
    return validEmailSyntax;
}
async function validateEmail() {
    return new Promise(function (resolve, reject) {
        const emailJ = $('#email').val();
        console.log(emailJ);
        $.ajax({
            url: 'email.php',
            type: 'POST',
            data: { email: emailJ },
            dataType: 'json',
            success: function (response) {
                if (response.success === true) {
                    resolve(true);
                }
                else {
                    resolve(false);
                }
            },
            error: function () {
                reject("error");
            }
        });
}
)}
function notEmpty() {
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    let firstNameError = document.getElementById("firstNameError");
    let lastNameError = document.getElementById("lastNameError");
    let notNull = true;
    if (firstName == "") {
        firstNameError.textContent = "First name cannot be empty.";
        notNull = false;
    }
    if (lastName == "") {
        lastNameError.textContent = "Last name cannot be empty";
        notNull = false;
    }
    return notNull;
}
async function validateForm(event) {
    if(event)event.preventDefault();
    let isValid = validateName("both");
    console.log(isValid);
    let imageUploaded = validateFile();
    let validMarks = validateMarks();
    let validNumber = validateNumber();
    let notNull = notEmpty();
    let validEmailSyntax = validateEmailSyntax();
    let validEmail = true;
    // let response = await validateEmail();
    if(validEmailSyntax === true){
        try{
            var response = await validateEmail(); // Wait for the AJAX to finish
            let emailError = document.getElementById("emailError");
            if (response === true) {
                console.log(response);
                validEmail = true;
            } else {
                emailError.textContent = "Invalid email";
                validEmail = false;
            }
        } catch (error) {
            console.error("AJAX Error:", error);
            emailError.textContent = "Server error";
            validEmail = false;
        }
    }
          // let emailCheck = await validateEmail();
    if (response == true && notNull ==true && validEmail == true && validEmailSyntax == true && isValid == true && imageUploaded == true && validMarks == true && validNumber == true) {
        // return false;
        console.log("htrue");
        console.log(":white_check_mark: All validations passed");
        const form = document.getElementById("email-form");
        const submitInput = form.querySelector('[name="submit"]');
        if (submitInput) {
        submitInput.removeAttribute("name");
        }
        form.submit();
     }
     else {
        return false;
    }
    }
