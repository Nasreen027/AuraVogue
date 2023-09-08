<?php

include_once('components/header.php')

?>

<style>
    #mainSignup{
    margin-top: -2rem!important;
    }
</style>

    <main id="mainSignup">
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-section">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper text-center">
                    <h2 class="breadcrumb-wrapper__title">
                        LogIn OR SignUp
                    </h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="index.php">Home</a></li>
                        <li><span>Log In / Sign Up to Continue</span></li>
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
                            <h3 class="login-register__title">Sign Up</h3>

                            <form action="#" method='post'>
                                <div class="login-register__form">
                                    <div class="single-form">
                                        <input class="single-form__input" id="username" name="username" type="text" placeholder="First name *" required/>
                                    <span id="errorFirstName"></span>
                                    </div>
                                    <div class="single-form">
                                        <input class="single-form__input" id="lastname" name="fullname" type="text" placeholder="Last name *" required/>
                                        <span id="errorLastName"></span>
                                    </div>
                                    <div class="single-form">
                                        <input class="single-form__input" id="email" name="email" type="email" placeholder="Email address *" required/>
                                        <span id="errorEmail"></span>
                                    </div>
                                   
                                    <div class="single-form">
                                        <input class="single-form__input" id="password" type="password" name="password" placeholder="Password *" required/>
                                        <span id="errorPassword"></span>
                                    </div>
                                    <p class="text-danger">
                             <?= isset($_REQUEST['error']) ? $_REQUEST['error'] : "" ?>
                            </p>
                                    <div class="single-form">
                                    <div class="single-form">
                                        <p class="lost-password">
                                            <span>already have an account?
                                            <a href="login.php" class='text-primary'>Log in</a>
                                            </span>
                                        </p>
                                    </div>
                                    
                                        <button type="submit" id="signup" name="signup" class="single-form__btn btn">
                                            Sign Up
                                        </button>
                                        
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                    <div class="col-md-3"></div>

                </div>
            </div>
        </div>
    </main>   
    <?php
    include_once('components/footer.php')
        ?>

    <!-- Footer End -->

    <!-- JS Vendor, Plugins & Activation Script Files -->


<script src="assets/js/app.js"></script>
</body>
</html>