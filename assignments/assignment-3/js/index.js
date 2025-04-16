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
 * Performs image validation.
 * 
 * @returns boolean
 *   Whether the file is uploaded or not.
 */
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

/**
 * Performs validation of marks entered.
 * 
 * @returns boolean
 *   Validates subject-name,marks and returns boolean value. 
 */
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
    let imageUploaded = validateFile();
    let validMarks = validateMarks();
    let notNull = notEmpty();
    if(isValid == false || notNull == false || imageUploaded == false || validMarks == false) {
        return false;
    }
    else {
        return true;
    }
}
