function signUp(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get the form element directly by its ID
    let form = new FormData(document.getElementById("user_signUpForm"));

    // Send an AJAX request to the server
    let xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                if (this.responseText === "success") {
                    // Display success message
                    document.getElementById("user_signUpSuccessMessage").style.display = "block";
                    document.getElementById("user_signUpErrorMessage").style.display = "none";
                } else {
                    // Display error message
                    document.getElementById("user_signUpErrorMessage").style.display = "block";
                    document.getElementById("user_signUpSuccessMessage").style.display = "none";
                    document.getElementById("user_signUpErrorMessage").innerText = this.responseText;
                }
            } else {
                alert("An error occurred.");
            }
        }
    };
    
    // Use the FormData object directly from the form element
    xhr.open("POST", "processor/user_signup.php", true);
    xhr.send(form);
}

function signIn(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get the form element directly by its ID
    let form = new FormData(document.getElementById("user_signInForm"));

    // Send an AJAX request to the server
    let xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                if (this.responseText === "success") {
                    // Display success message
                    document.getElementById("user_signInSuccessMessage").style.display = "block";
                    document.getElementById("user_signInErrorMessage").style.display = "none";
                    // Delay for 0.5 seconds (500 milliseconds)
                    setTimeout(function () {
                        window.location.href = "index.php";
                    }, 800);

                } else {
                    // Display error message
                    document.getElementById("user_signInErrorMessage").style.display = "block";
                    document.getElementById("user_signInSuccessMessage").style.display = "none";
                    document.getElementById("user_signInErrorMessage").innerText = this.responseText;
                }
            } else {
                alert("An error occurred.");
            }
        }
    };
    
    // Use the FormData object directly from the form element
    xhr.open("POST", "processor/user_signin.php", true);
    xhr.send(form);
}

function signOut() {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                if (xhr.responseText === "success") {
                    window.location.href = "index.php";
                }
            } else {
                alert("An error occurred.");
            }
        }
    }
    xhr.open("GET", "processor/user_signout.php", true);
    xhr.send();
}

function restaurantSignUp(event){
    event.preventDefault(); // Prevent the default form submission

    // Get the form element directly by its ID
    let form = new FormData(document.getElementById("restaurant_signUpForm"));

    // Send an AJAX request to the server
    let xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                if (this.responseText === "success") {
                    // Display success message
                    document.getElementById("restaurant_signUpSuccessMessage").style.display = "block";
                    document.getElementById("restaurant_signUpErrorMessage").style.display = "none";
                } else {
                    // Display error message
                    document.getElementById("restaurant_signUpErrorMessage").style.display = "block";
                    document.getElementById("restaurant_signUpSuccessMessage").style.display = "none";
                    document.getElementById("restaurant_signUpErrorMessage").innerText = this.responseText;
                }
            } else {
                alert("An error occurred.");
            }
        }
    };
    
    // Use the FormData object directly from the form element
    xhr.open("POST", "../processor/restaurant_signup.php", true);
    xhr.send(form);
}

function addToCart(menu_id){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            } else {
                alert("An error occurred.");
            }
        }
    }
    xhr.open("GET", "../processor/add_to_cart.php?menu_id="+menu_id, true);
    xhr.send();
}

function removeFromCart(cart_id) {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                alert(xhr.responseText);
                location.reload();
            } else {
                alert("An error occurred.");
            }
        }
    }
    xhr.open("GET", "../processor/remove_from_cart.php?cart_id=" + cart_id, true);
    xhr.send();
}

function payment(){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
            }
        }
    }
    xhr.open("GET", "../processor/payment.php", true);
    xhr.send();
}