    <div class="signup">
        <div class="signup__content">
            <h1 class="signup__heading">Sign Up</h1>
            <h2 class="signup__caption">Sign up with</h2>
            <div class="signup-social">
                <div class="signup-social__item">
                    <i class="fab fa-google signup-social__icon"></i>
                    <span class="signup-social__text">Login with Google</span>
                </div>
                <div class="signup-social__item">
                    <i class="fab fa-facebook signup-social__icon"></i>
                    <span class="signup-social__text">Login with Google</span>
                </div>
            </div>
            <form action="Register/RegisterUser" class="signup-form" method="post">
                <div class="signup-form__row">
                    <div class="signup-form__group">
                        <label for="name" class="signup-form__label">Name</label>
                        <div class="signup-form__validate">
                            <input type="text" class="signup-form__input" id="name" name="name">
                            <div class="signup-form__check"><i class="fa fa-check"></i></div>
                        </div>

                    </div>
                    <div class="signup-form__group">
                        <label for="email" class="signup-form__label">Email</label>
                        <input type="text" class="signup-form__input" id="email" name="username">
                    </div>
                </div>
                <div class="signup-form__group">

                    <label for="password" class="signup-form__label">Password</label>
                    <input type="text" class="signup-form__input" id="password" name="password">
                </div>
                <button class="signup-form__submit" type="submit" name="register">
                    <i class="fa fa-arrow-right"></i>
                </button>
            </form>


            <p class="signup__already">Already Signin have an account?<a href="Login">Sign in</a></p>
        </div>
        <div class="signup__image">
            <img src="https://images.unsplash.com/photo-1613520054193-d09b13a03aab?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=334&q=80" alt="">
        </div>
    </div>
    </body>

    </html>