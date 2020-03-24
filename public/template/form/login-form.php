<div class="wrapper">
    <div class="login">
        <div class="login-content">
            <form id="loginform" class="form-login" method="POST">
                <div class="login-img">
                    <img class="login-pic" src="/img/login-form-img.png"/>
                </div>
                <div class="login-title">
                    <h2 class="form-title">Авторизация</h2>
                </div>
                <p class="errors" id="errorslogin" style="display: none"></p>
                <div class="input-container">
                    <i class="fa fa-user icon i-login"></i>
                    <input type="text" class="input-field input-login" name="Login" placeholder="Логин" require
                        value="<?php echo @$_POST['Login'] ?>">
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon i-login"></i>
                    <input type="password" class="input-field input-login" name="Password" placeholder="Пароль" required>
                </div>
                <input type="submit" class="btn btn-left" value="Войти">
                <input type="submit" class="btn btn-right" id="login_close" value="Закрыть">
            </form>
        </div>
    </div>
</div>