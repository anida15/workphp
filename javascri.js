function validateForm() {
    let x = document.forms["myForm"]["fname"].value;

  if (x != "") {


    alert(" You Have Succefully registered");
    return true;
  }
     
  }