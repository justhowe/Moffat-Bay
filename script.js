function loginUser() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // here we can call an API or the backend code to authenticate the user
    // let's assume the authentication was successful

    // you can then redirect the user to another page
   

    // or we can show a success message on the same page
    alert("Login successful! You will now be redirected to the dashboard.");
}

document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault();
    loginUser();
});
