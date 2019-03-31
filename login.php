<?php
require "./header.php";
require "./inc/signup.inc.php";
require "./inc/login.inc.php";

?>


    <div class="main-container">
        <div class="content-container">
            <button onclick="document.getElementById('id01').style.display='block'" style="width:100%;">Sign Up</button>
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <form class="modal-content" method="POST" action="./inc/signup.inc.php">

                    <div class="sign-container">
                        <h1>Sign Up</h1>
                        <p>Please fill in this form to create an account.</p>
                        <hr>
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <label for="psw-repeat"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                        <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn" name="signup">Sign Up</button>
                        </div>
                    </div> <!-- sign-container -->
                </form>
            </div> <!-- id01 -->
            <script src="js/signup.js"></script>

            <p>or</p>
            <h1>Login below</h1>
            <button onclick="document.getElementById('id02').style.display='block'" style="width:100%;">Login</button>

            <div id="id02" class="modal">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <form class="modal-content" method="POST" action="./inc/login.inc.php">

                    <div id="login-container">
                        <label for="uname"><b>Email</b></label>
                        <input type="text" placeholder="Enter Username" name="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                        <button type="submit">Login</button>
                        <label>
                            <input type="checkbox" checked="checked" name="remember">Remember me
                        </label>
                    <span class="psw"><a href="#">Forgot password?</a></span>

                    </div> <!-- login-container -->
                </form>
            </div> <!-- id02 -->
            <script src="js/login.js"></script>
        </div> <!-- content-container -->
    </div> <!-- main-container -->
