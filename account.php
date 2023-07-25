<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="account.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="cont">
        <div id="formCard">
            <div class="design"></div>
            <h1 id="formText">Sign In</h1>
            <div id="formTopButton">
                <div class="topButton" onclick="signInText()">Sign In</div>
                <div class="topButton" onclick="signUpText()">Sign Up</div>
                <span id="textDesign"></span>
            </div>
            <div id="success">This is success message</div>
            <div id="error">This is Error message</div>
            <!-- <p id="error">This is error message</p> -->
            <div id="formCont">
                <form action="" id="signinForm" method="post" autocomplete="off">
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control" id="emailInput" placeholder="name@example.com" name="email">
                        <label for="emailInput">Email</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="passwordInput" placeholder="example" name="password">
                        <label for="passwordInput">Password</label>
                    </div>
                    <input type="submit" id="signinBtn" class="btn" value="Sign in">
                </form>
                <form action="" id="signupForm" autocomplete="off">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="nameInput" placeholder="name@example.com" name="name">
                        <label for="nameInput">Name</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control" id="emailInput" placeholder="name@example.com" name="email">
                        <label for="emailInput">Email</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="passwordInput" placeholder="example" name="password">
                        <label for="passwordInput">Password</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="confirmPasswordInput" placeholder="example" name="cofirmPassword">
                        <label for="confirmPasswordInput">Confirm Password</label>
                    </div>
                    <input type="submit" id="signupBtn" class="btn" value="Sign Up">
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        let signinForm = document.getElementById("signinForm"),
            signupForm = document.getElementById("signupForm"),
            formCont = document.getElementById("formCont"),
            textDesign = document.getElementById("textDesign"),
            formText = document.getElementById("formText"),
            topButton = document.getElementsByClassName("topButton"),
            signinBtn = document.getElementById("signinBtn"),
            signupBtn = document.getElementById("signupBtn"),
            error = document.getElementById("error"),
            success = document.getElementById("success");

        function signInText() {
            formCont.style.height = "180px"; // form height trigger
            setTimeout(() => {
                // showing hiding form
                signinForm.style.display = "block";
                signupForm.style.display = "none";

                // text changing in top heading
                formText.innerText = "Sign In";

                // top button style
                topButton[0].style.color = "white";
                topButton[1].style.color = "black";

                // moving the design back to right place
                textDesign.style.left = 0;
                textDesign.style.right = "initial";
            }, 200);

        }

        function signUpText() {
            formCont.style.height = "310px" // form height trigger
            setTimeout(() => {
                // showing hiding form
                signinForm.style.display = "none";
                signupForm.style.display = "block";

                // text changing in top heading
                formText.innerText = "Sign Up";

                // top button style
                topButton[1].style.color = "white";
                topButton[0].style.color = "black";

                // moving the design back to right place
                textDesign.style.right = 0;
                textDesign.style.left = "initial";
            }, 200);

        }

        signinForm.onsubmit = (e) => {
            e.preventDefault();
        }

        signinBtn.onclick = () => {
            console.log('signin');
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./components/signin.php", true);
            xhr.onload = () => {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        if (data == "success") {
                            setTimeout(() => {
                                error.style.display = 'none';
                                success.style.display = 'block';
                                success.textContent = 'Login Verified';
                            }, 800);
                            setTimeout(() => {
                                location.href = "./"
                            }, 1500);
                        } else {
                            setTimeout(() => {
                                error.style.display = 'block'
                                success.style.display = 'none';
                                error.textContent = data;
                            }, 800);
                        }
                    }
                }
            }

            let formData = new FormData(signinForm);
            xhr.send(formData);
        }
        signupForm.onsubmit = (e) => {
            e.preventDefault();
        }
        signupBtn.onclick = () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./components/signup.php", true);
            xhr.onload = () => {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        if (data == "success") {
                            setTimeout(() => {
                                error.style.display = 'none';
                                success.style.display = 'block';
                                success.textContent = 'Account created Sccessfully';
                            }, 800);
                            setTimeout(() => {
                                success.textContent = 'Please Login';
                            }, 2000);
                            setTimeout(() => {
                                signInText();
                            }, 2500);
                        } else {
                            // console.log(data);
                            setTimeout(() => {
                                error.style.display = 'block'
                                success.style.display = 'none';
                                error.textContent = data;
                            }, 800);
                        }
                    }
                }
            }

            let formData = new FormData(signupForm);
            xhr.send(formData);
        }
    </script>
</body>

</html>