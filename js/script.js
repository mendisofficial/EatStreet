function signup() {
    // Prevent the default form submission
    event.preventDefault();

    let form = new FormData(document.getElementById("signupForm"));

    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                if (this.responseText == "success") {
                    // Clear the form
                    document.getElementById("signupForm").reset();
                    // Display success message
                    document.getElementById("successMessage").style.display = "block";
                    document.getElementById("errorMessage").style.display = "none";
                } else {
                    // Display error message
                    document.getElementById("errorMessage").style.display = "block";
                    document.getElementById("successMessage").style.display = "none";
                    document.getElementById("errorMessageText").innerText = this.responseText;
                }
            } else {
                alert("An error occurred.");
            }
        }
    };

    request.open("POST", "processor/user_signup.php", true);
    request.send(form);
}
