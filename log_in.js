function logIn() {
    let username = document.forms["form"]["user"].value; //creamos las variables con los nombres para que guarden la informacion del input en el html
    let password = document.forms["form"]["passwordid"].value;

    //Velifica mediante el id que el formulario (en este caso) sea completado. 
    if(username == ""){
        alert("You need to fill all the blanks")
        return false; // no permite que se envien los datos, interrumpe el ciclo hasta que se cumplan todas las condiciones.
    }

    if (username.length < 8 || username.length > 20)
    {
        alert("The username must be between 8 and 20 characters");
        return false;
    }

    if (password == ""){
        alert("You need to field all the blanks")
        return false;
    }

    alert("Welcome! You are in now!")
    alert("Your username is " + username + "and you password is " + password)
    return true;

}