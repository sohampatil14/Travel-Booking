
function validateForm() {
    let name = document.forms["form"]["full_name"].value;
    let email = document.forms["form"]["e-mail"].value;
    let uname = document.forms["form"]["user_name"].value;
    let pass = document.forms["form"]["password"].value;
    let passre = document.forms["form"]["passwordre"].value;
    let phone = document.forms["form"]["phone"].value;
    let address = document.forms["form"]["address"].value;
    let auth = 0;
    if(name == "" || email == "" || uname == "" || pass == "" || passre == "" || phone == "" || address == "") {
      if(auth==0) {
      alert("Please fill all fields!");
      auth = 1;
      }
    }


    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.match(mailformat))
    {
    }
    else
    {
      if(auth==0) {
    alert("You have entered an invalid email address!");
    auth = 1;
      }
    }

    
    var passw =  /^[A-Za-z]\w{7,14}$/;
    if(pass.match(passw)) 
    { 
    }
    else
    { 
      if(auth==0) {
    alert("Password must be between 7 to 16 characters which contain only characters, numeric digits, underscore and first character must be a letter.")
    auth = 1;
      }
    }
    if(pass!==passre) {
      if(auth==0) {
        alert("Confrom Password is not same as Password.")
      auth = 1;
      }
    }

    var phoneno = /^\d{10}$/;
    if(document.forms["form"]["phone"].value.match(phoneno))
        {
        }
      else
        {
          if(auth==0) {
        alert("Phone number must be of 10 numbers.");
        auth = 1;
          }
        }

        if(auth==1) {
          return false;
        }
        
  }


  function login_check(){
    console.log(uname)
  }