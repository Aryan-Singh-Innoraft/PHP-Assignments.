// Code for automatically updating the fullname field when user types in any of the given input fields
function updateFullName() {
    let firstname = document.getElementById("firstName").value;
    let lastname = document.getElementById("lastName").value;
    document.getElementById("fullName").value = firstname + " " + lastname;
}
function validateForm(event){
    let firstname = document.getElementById("firstName").value.trim();
    let lastname=document.getElementById("lastName").value.trim();

    let regex=/^[A-Za-z ]+$/;
    let firstNameError=document.getElementById("firstNameError");
    let lastNameError=document.getElementById("lastNameError");
    firstNameError.textContent="";
    lastNameError.textContent="";
    let isvalid=true;
    // Code for checking that only alphabets are added to the fields and give correct message 
    if(!regex.test(firstname)){
        firstNameError.textContent="Firstname can have only alphabets.";
        isvalid=false;
    }
    if(!regex.test(lastname)){
        lastNameError.textContent="Lastname can have only alphabets.";
        isvalid=false;
    }
    // Code for checking if the fields are empty and give correct message 
    if(firstname==""){
        firstNameError.textContent="Firstname cannot be empty.";
        isvalid=false;
    }
    if(lastname==""){
        lastNameError.textContent="Lastname cannot be empty.";
        isvalid=false;
    }
    if(!isvalid){
        event.preventDefault();
    }
}
