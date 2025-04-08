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
    if(id === "firstName") {
        if(!regex.test(firstName)) {
            firstNameError.textContent = "First name can have only alphabets.";
            isValid = false;
        }
        // Validation for alphabet limit 
        if(firstName.length >30) {
            firstNameError.textContent = "First name cannot have more than 30 alphabets.";
            isValid=false;
        }
        return isValid;
    }
    else if(id === "lastName") {
        if(!regex.test(lastName)) {
            lastNameError.textContent = "Last name can have only alphabets.";
            isValid = false;
        }
        // Validation for alphabet limit 
        if(lastName.length > 30) {
            lastNameError.textContent = "Last name cannot have more than 30 alphabets.";
            isValid=false;
        }
        return isValid;
    }
    else {
        if(!regex.test(firstName)) {
            firstNameError.textContent = "First name can have only alphabets.";
            isValid = false;
        }
        // Validation for alphabet limit 
        if(firstName.length >30) {
            firstNameError.textContent = "First name cannot have more than 30 alphabets.";
            isValid=false;
        }
        if(!regex.test(lastName)) {
            lastNameError.textContent = "Last name can have only alphabets.";
            isValid = false;
        }
        // Validation for alphabet limit 
        if(lastName.length > 30) {
            lastNameError.textContent = "Last name cannot have more than 30 alphabets.";
            isValid=false;
        }
        return isValid;
    }
}
function validateFile() {
    let uploadedFile = document.getElementById("imageToUpload");
    let imageErrorMessage = document.getElementById("imageErrorMessage");
    imageErrorMessage.textContent = "";
    let imageUploaded = true;
    if(!uploadedFile.files || uploadedFile.files.length === 0){
        imageErrorMessage.textContent = "Choose an image";
        imageUploaded = false;
    }
    return imageUploaded;
}
function validateMarks() {
    let marks = document.getElementById("marksField").value;
    let marksErrorMessage = document.getElementById("marksErrorMessage");
    let validMarks = true;
    let subjectRegex = /^[A-Za-z]+$/;
    let marksRegex = /^[0-9]+(\.[0-9]+)?$/;//supports decimal numbers
    marksErrorMessage.textContent = "";
    let marksArray = marks.split("\n");
    if(marks == "") {
        marksErrorMessage.textContent = "Marks field cannot be empty.";
        return false;
    }
    marksArray.forEach((marks) => {
        let singleMarks = marks.split("|");
        if(!subjectRegex.test(singleMarks[0])) { 
            marksErrorMessage.textContent = "Subject name should have only alphabets.";
            validMarks = false;
        }
        if(!marksRegex.test(singleMarks[1])) {
            marksErrorMessage.textContent = "Subject marks should have only digits.";
            validMarks = false;
        }
        if(!subjectRegex.test(singleMarks[0]) && !marksRegex.test(singleMarks[1])) {
            marksErrorMessage.textContent = "Follow the pattern (English|85)";
            validMarks = false;
        }
        if(singleMarks.length > 2) {
            marksErrorMessage.textContent = "Marks needs to be entered in the pattern (eg:English|85)all in new line.";
            validMarks = false;
        }
    });
    return validMarks;
}
function validateNumber() {
    let phoneNumber = document.getElementById("phoneField").value.trim();
    let phoneNumberError = document.getElementById("phoneNumberError");
    phoneNumberError.textContent = "";
     // Regex for exactly 10 digits
     let regexPhone = /^\d{10}$/;
     let validNumber = true;
     if(/^[A-Za-z]+$/.test(phoneNumber)) {
        phoneNumberError.textContent = "Phone number should have only digits.";
         validNumber = false;
     }
     if (!regexPhone.test(phoneNumber)) {
         phoneNumberError.textContent = "Phone number should be exactly 10 digits.";
         validNumber = false;
     }
     if(phoneNumber == ""){
         phoneNumberError.textContent = "Phonenumber should not be empty."
         validNumber = false;
     }
     return validNumber;
      
}
function notEmpty() {
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    let firstNameError = document.getElementById("firstNameError");
    let lastNameError = document.getElementById("lastNameError");
    let notNull = true;
    if(firstName == "") {
        firstNameError.textContent = "First name cannot be empty.";
        notNull = false;
    }
    if(lastName == "") {
        lastNameError.textContent = "Last name cannot be empty";
        notNull = false;
    }
    return notNull;
}
function validateForm() {
    let isValid = validateName("both");
    let imageUploaded = validateFile();
    let validMarks = validateMarks();
    let validNumber = validateNumber();
    let notNull = notEmpty();
    if(isValid == false || notNull == false || imageUploaded == false || validMarks == false ||validNumber ==false) {
        return false;
    }
    else {
        return true;
    }
}

