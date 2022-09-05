<?php
$signupActive = "";
$loginActive = "";
$welcomeActive = "";
$notesActive = "";

if ($currentPage == "signup") {
    $signupActive = "active";
} else if ($currentPage == "login") {
    $loginActive = "active";
} else if ($currentPage == "welcome") {
    $welcomeActive = "active";
}else if ($currentPage == "notes") {
    $notesActive = "active";
}
echo "<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
        <a class='navbar-brand' href='#'>Notepad</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav mr-auto'>";
if ($loginStatus) {
    echo "<li class='nav-item ${welcomeActive}'>
            <a class='nav-link' href='welcome.php'>Welcome</a>
        </li>
        <li class='nav-item ${notesActive}'>
            <a class='nav-link' href='notes.php'>My Notes</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
}
if (!$loginStatus) {
    echo "<li class='nav-item ${signupActive}'>
    <a class='nav-link' href='signup.php'>Signup</a>
    </li>
    <li class='nav-item ${loginActive}'>
        <a class='nav-link' href='login.php'>Login</a>
    </li>";
}
echo "</ul>
        </div>
    </nav>";
