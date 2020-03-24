<div class="wrapper">
    <div class="signup">
        <div class="signup-content">
            <form id="singUpform" form="form-signup animate" id="form_signup" method="POST">

                <div class="login-img">
                    <img class="login-pic" src="/img/login-form-img.png"/>
                </div>

                <div class="login-title">
                    <h2 class="form-title">Регистрация</h2>
                </div>

                <p class="errors" id="errorsSignUp" style="display: none"></p>

                <p class="success" id="signUpSuccess" style="display: none">Успешно.</p>

                <div class="input-container">
                    <i class="fa fa-user icon i-login"></i>
                    <input type="text" class="input-field input-login" name="Login" placeholder="Логин" require
                        value="<?php echo @$_POST['Login'] ?>">
                </div>

                <div class="input-container">
                    <i class="fa fa-envelope icon i-login"></i>
                    <input type="email" class="input-field input-login" name="Email" placeholder="Email" required
                        value="<?php echo @$_POST['Email'] ?>">
                </div>

                <div class="input-container">
                    <i class="fa fa-key icon i-login"></i>
                    <input type="password" class="input-field input-login" name="Password" placeholder="Пароль" required>
                </div>

                <div class="input-container">
                    <i class="fa fa-key icon i-login"></i>
                    <input type="password" class="input-field input-login" name="Password2" placeholder="Повторите пароль" required>
                </div>

                <div class="wrapper-radio">
                    <h2 class="h-signUp">Согласие на обработку персональных данных:</h2>
                    <label class="container-radio" style="color: white;">Да
                        <input type="radio" checked="checked" name="Agree" value="1">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" style="color: white;">Нет
                        <input type="radio" name="Agree" value="2">
                        <span class="checkmark"></span>
                    </label>
                </div>

                <input type="submit" name="do_signup" class="btn btn-left" value="Зарегистрироваться">
                <input type="submit" class="btn btn-right" id="signup_close" value="Закрыть">
            </form>
        </div>
    </div>
</div>
