//Fetching firstname,lastname and displaying fullname. 
function updateFullName() {
    let firstname = document.getElementById("firstName").value;
    let lastname = document.getElementById("lastName").value;
    document.getElementById("fullName").value = firstname + " " + lastname;
}
function validateForm(event) {
    console.log("Validation function called."); // Debugging
    let firstname = document.getElementById("firstName").value.trim();
    let lastname = document.getElementById("lastName").value.trim();
    let phoneNumber = document.getElementById("phoneField").value.trim();
    let email = document.getElementById("email").value.trim();
    
    let regex = /^[A-Za-z ]+$/;
    let firstNameError = document.getElementById("firstNameError");
    let lastNameError = document.getElementById("lastNameError");
    let phoneNumberError = document.getElementById("phoneNumberError");

    firstNameError.textContent = "";
    lastNameError.textContent = "";
    phoneNumberError.textContent = "";
    emailError.textContent = "";
    let isvalid = true;
    // Validation for checking alphabets
    if(!regex.test(firstname)) {
        firstNameError.textContent = "Firstname can have only alphabets.";
        isvalid = false;
    }
    if(!regex.test(lastname)) {
        lastNameError.textContent = "Lastname can have only alphabets.";
        isvalid = false;
    }
    // Validation for empty fields.
    if(firstname == "") {
        firstNameError.textContent = "Firstname cannot be empty.";
        isvalid=false;
    }
    if(lastname == "") {
        lastNameError.textContent = "Lastname cannot be empty.";
        isvalid = false;
    }
    // Validation for phoneNumber
    let regexPhone = /^\d{10}$/;

    if (!regexPhone.test(phoneNumber)) {
        phoneNumberError.textContent = "Phone number should be exactly 10 digits between 0-9.";
        isvalid = false;
    }
    if(phoneNumber == ""){
        phoneNumberError.textContent = "Phonenumber should not be empty."
        isvalid = false;
    }
    // Validation for email 
    let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if(!emailRegex.test(email)){
        emailError.textContent = "Invalid email format."
        isvalid = false;
    }
    if(!isvalid) {
        event.preventDefault();
    }
}
