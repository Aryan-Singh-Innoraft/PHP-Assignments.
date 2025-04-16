/**
 * Fetching firstname,lastname and displaying fullname.
 */
function updateFullName() {
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    document.getElementById("fullName").value = firstName + " " + lastName;
}

/**
 * Performs both firstname,lastname validity.
 * 
 * @param string id 
 *   This parameter determines which field needs to be validated.
 *   
 * @returns boolean
 *   Returns boolean based on name validity.
 */
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

/**
 * Confirms that input value is not empty.
 * 
 * @returns boolean
 *   Returns boolean value based on validation.
 */
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

/**
 * Validates the entire form.
 * 
 * @returns boolean 
 *   Returns boolean value to the form after validation.
 */
function validateForm() {
    let isValid = validateName("both");
    let notNull = notEmpty();
    if(isValid == false || notNull == false) {
        return false;
    }
    else {
        return true;
    }
}
