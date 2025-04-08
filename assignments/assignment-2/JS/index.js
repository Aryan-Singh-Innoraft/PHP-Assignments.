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
    let imageUploaded = true;
    if(!uploadedFile.files || uploadedFile.files.length === 0){
        imageErrorMessage.textContent = "Choose an image";
        imageUploaded = false;
    }
    return imageUploaded;
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
    let notNull = notEmpty();
    let imageUploaded = validateFile();
    if(isValid == false || notNull == false || imageUploaded == false) {
        return false;
    }
    else {
        return true;
    }
}
