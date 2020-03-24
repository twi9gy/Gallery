<div class="wrapper">
    <div class="change_pas">
        <div class="change_pas-content">
            <form id="changePasform" method="POST">
                <div class="login-title">
                    <h2 class="form-title">Смена пароля:</h2>
                </div>
                <p class="errors" id="errorsChPas" style="display: none"></p>
                <p id="changePasSuccess" class="success" style="display: none">Успешно.</p>
                <div class="input-container">
                    <i class="fa fa-key icon i-login"></i>
                    <input type="password" class="input-field input-login" name="Password1"
                           placeholder="Введите новый пароль" value="<?php echo @$_POST['Password1'] ?>" require >
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon i-login"></i>
                    <input type="password" class="input-field input-login" name="Password2"
                           placeholder="Повторно введите пароль" required>
                </div>
                <input type="submit" class="btn btn-left"  value="Изменить">
                <input type="submit" class="btn btn-right" id="changePas_close" value="Закрыть">
            </form>
        </div>
    </div>
</div>