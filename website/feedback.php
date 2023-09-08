<?php
include_once('components/sessionHeader.php')
?>
 <?php
                                     if (isset($_SESSION['USER'])) {
                                         $user = $_SESSION['USER'];
                                         foreach ($user as $user) {
                                            //  echo '<script>alert("'.$user['userID'].'")</script>';
                                             $userID = $user['userID'];
                                        
                                         if(isset($_POST['submitFeedback'])){
                                            $feedbackMsg = $_POST['msgFeedback'];
                                            // echo '<script>alert("'.$user['userID'].'")</script>';
                                            // echo '<script>alert("'.$feedbackMsg.'")</script>';
                                            $query = $pdo->prepare('insert into feedback(feedbackUserID,feedback) values(:userID, :feedback)');
                                            $query->bindParam("userID",$userID);
                                            $query->bindParam("feedback",$feedbackMsg);
                                            $query->execute();
                                            // echo "<div class='alert'>Thanks for your feedback</div>";
                                            echo '<script>alert("Thanks for your feedback")</script>';
                                        } 
                                        }
                                     }
                                    ?>
<!-- Mobile Meta End -->
<style>
    #mainLogin {
        margin-top: -2rem;
    }
</style>
<main id="mainLogin">
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-section">
        <div class="container-fluid custom-container">
            <div class="breadcrumb-wrapper text-center">
                <h2 class="breadcrumb-wrapper__title">
                    FeedBack
                </h2>
                <ul class="breadcrumb-wrapper__items justify-content-center">
                    <li><a href="index.php">Home</a></li>
                    <li><span>feedback</span></li>
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
                        <h3 class="login-register__title">FeedBack</h3>

                        <form action="" method='post'>
                            <div class="login-register__form">
                                <!-- Single Form Start -->

                                <div class="single-form">
                                    <textarea class="single-form__input" placeholder="Type your feedback here..." name="msgFeedback" required id="feedback" cols="30" rows="10"></textarea>
                                     <!-- <span id="errorPasswordLogin"></span> -->
                                </div>

                                <div class="single-form">
                                      <button class="single-form__btn btn" type='submit' id="" name='submitFeedback'>
                                        submit
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