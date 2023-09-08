<?php
include_once('components/header.php')
?>
    <!-- Mobile Meta End -->
<style>
    #mainLogin{
        margin-top: -2rem;
    }
    #admin{
        margin-top:3rem!important
    }
</style>
    <main id="mainLogin">
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-section">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper text-center">
                    <h2 class="breadcrumb-wrapper__title">
                        Log In & Register
                    </h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="index.php">Home</a></li>
                        <li><span>Log In & Register</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Log In & Register Start -->
        <div class="login-register-section section-padding-2">
            <div class="container custom-container">
                <div class="row mb-5">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <!-- Log In & Register Box Start -->
                        <div class="login-register">
                            <h3 class="login-register__title">Log In</h3>

                            <form action="#" method='post'>
                                <div class="login-register__form">
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input class="single-form__input" placeholder="example@gmail.com" id="loginEmail" name="email" type="email" placeholder="Email address *" required/>
                                        <span id="errorEmailLogin"></span>
                                    </div>

                                    <div class="single-form">
                                        <input class="single-form__input" id="loginPassword" name="password" type="password" placeholder="Password *" required/>
                                        <span id="errorPasswordLogin"></span>
                                    </div>
                                    <p class="text-danger">
                                <?= isset($_REQUEST['error']) ? $_REQUEST['error'] : "" ?>
                            </p>
                                    <div class="single-form">
                                        <p class="lost-password">
                                            <span>Dont've an account?
                                                <a href="signup.php" class='text-primary'>Sign Up</a>
                                            </span>
                                        </p>
                                    </div>

                                    <div class="single-form" id='admin'>
                                        <p class="lost-password">
                                            <span>Sign In As Admin?
                                                <a href="adminPanel/signin.php" class='text-primary'>Sign In</a>
                                            </span>
                                        </p>
                                    </div>

                                    <div class="single-form">
                                        <button class="single-form__btn btn" type='submit' id="login" name='login'>
                                            Log In
                                        </button>
                                    </div>

                                </div>
                            </form>

                        </div>
                        <!-- Log In & Register Box End -->
                    </div>
                    <div class="col-md-3"></div>

                </div>
            </div>
            <!-- Log In & Register End -->

            <!-- Newsletter Start -->
            <!-- Newsletter Start -->
            <div class="newsletter-section">
                <div class="newsletter-left" style="background-image: url(assets/images/newsletter-bg-1.jpg)">
                    <!-- Newsletter Wrapper Start -->
                    <div class="newsletter-wrapper text-center">
                        <h4 class="newsletter-wrapper__title">Follow us on</h4>
                        <p>
                            Proin volutpat vitae libero at tincidunt. Maecenas sapien
                            lectus, vehicula vel euismod sed, vulputate
                        </p>

                        <div class="newsletter-social">
                            <ul class="newsletter-social__list">
                                <li>
                                    <a href="#" aria-label="facebook">
                                        <i class="lastudioicon-b-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" aria-label="twitter">
                                        <i class="lastudioicon-b-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" aria-label="instagram">
                                        <i class="lastudioicon-b-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" aria-label="vimeo">
                                        <i class="lastudioicon-b-vimeo"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" aria-label="envato">
                                        <i class="lastudioicon-envato"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Newsletter Wrapper End -->
                </div>
                <div class="newsletter-right" style="background-image: url(assets/images/newsletter-bg-2.jpg)">
                    <!-- Newsletter Wrapper Start -->
                    <div class="newsletter-wrapper text-center">
                        <h4 class="newsletter-wrapper__title">10% off when you sign up</h4>
                        <p>
                            Proin volutpat vitae libero at tincidunt. Maecenas sapien
                            lectus, vehicula vel euismod sed, vulputate
                        </p>
                        <form action="#">
                            <div class="newsletter-form-style-1">
                                <input type="text" placeholder="Enter your email address..." />
                                <button>Subscribe</button>
                            </div>
                        </form>
                    </div>
                    <!-- Newsletter Wrapper End -->
                </div>
            </div>
            <!-- Newsletter End -->

            <!-- Newsletter End -->
    </main>

    <!-- Footer Start -->
    <?php
    include_once('components/footer.php')
    ?>

    <script>
        let loginEmail = document.getElementById('loginEmail');
        let loginPassword = document.getElementById('loginPassword');
        let loginBtn = document.getElementById('login');

        loginBtn.addEventListener('submit', function(event) {
            event.preventDefault
            if (!loginEmail) {
                document.getElementById("loginEmail").style = "border:1px solid red"
                document.getElementById("errorEmailLogin").style = "color:red"
                document.getElementById("errorEmailLogin").innerHTML = "Please fill out this field!"
            }
            else if (!loginPassword) {
                document.getElementById("loginPassword").style = "border:1px solid red"
                document.getElementById("errorPasswordLogin").style = "color:red"
                document.getElementById("errorPasswordLogin").innerHTML = "Please fill out this field!"
            }
        })

        loginEmail.addEventListener('input', function(event) {
            event.preventDefault();
            let loginEmailValue = loginEmail.value; // Changed variable name to avoid confusion
            let emailRegexLogin = /^[\w]+@[A-Za-z]{4,5}[.][A-Za-z]{2,}$/;
            if (!loginEmailValue) {
                loginEmail.style = "border:1px solid red";
                document.getElementById("errorEmailLogin").style.color = "red";
                document.getElementById("errorEmailLogin").innerHTML = "Please fill out this field!";
            } else if (!emailRegexLogin.test(loginEmailValue)) {
                loginEmail.style = "border:1px solid red";
                document.getElementById("errorEmailLogin").style.color = "red";
                document.getElementById("errorEmailLogin").innerHTML = "Please enter a valid email!";
            } else {
                loginEmail.style = "";
                document.getElementById("errorEmailLogin").innerHTML = "";
            }
        });

        loginPassword.addEventListener('input', function(event) {
            event.preventDefault();
            let loginPasswordValue = loginPassword.value; // Changed variable name to avoid confusion
        
            if (!loginPasswordValue) {
                loginPassword.style = "border:1px solid red";
                document.getElementById("errorPasswordLogin").style.color = "red";
                document.getElementById("errorPasswordLogin").innerHTML = "Please fill out this field!";
            }  else {
                loginPassword.style = "";
                document.getElementById("errorPasswordLogin").innerHTML = "";
            }
        });
    </script>

</body>

</html>