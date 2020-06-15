<?php global $userinfo; ?>

<form id="profileform"  method="post" class="form-Infoprofile">
    <p class="errors" id="errorsProfile" style="display: none; margin: 0 5% 15px 1px;"></p>
    <p id="changeInfSuccess" class="success" style="display: none;  margin: 0 5% 15px 1px;">Успешно.</p>
    <div class="input-container">
        <i class="fa fa-info icon"></i>
        <input class="input-field" type="text" placeholder="Введите ваше имя..." name="Name_user"
               value="<?php echo @$userinfo->name_user ?>">
    </div>
    <div class="input-container">
        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" placeholder="Логин" name="Login"
               value="<?php echo $userinfo->login_user ?>">
    </div>
    <div class="input-container">
        <i class="fa fa-envelope icon"></i>
        <input class="input-field" type="text" placeholder="Email" name="Email_user"
               value="<?php echo $userinfo->email_user ?>">
    </div>
    <div class="input-container">
        <i class="fa fa-birthday-cake icon"></i>
        <input class="input-field" type="text" placeholder="Дата рождения" name="DateBirth_user"
               value="<?php echo $userinfo->datebirth_user ?>">
    </div>
    <div class="wrapper-radio profile-wrapper_radio">
        <h2 class="h2-profile" style="font-size: 18px; margin-bottom: 10px;">Пол:</h2>

        <label class="container-radio profile-radio">Мужчина
            <?php if (isset($userinfo->gender_user) && $userinfo->gender_user == "Man" ||
                !isset($userinfo->gender_user)) { ?>
                <input type="radio" name="Gender" value="Man" checked>
            <?php } else { ?>
                <input type="radio" name="Gender" value="Man">
            <?php } ?>
            <span class="checkmark"></span>
        </label>


        <label class="container-radio profile-radio">Женщина
            <?php if (isset($userinfo->gender_user) && $userinfo->gender_user == "Woman") { ?>
                <input type="radio" name="Gender" value="Woman" checked>
            <?php } else { ?>
                <input type="radio" name="Gender" value="Woman">
            <?php } ?>
            <span class="checkmark"></span>
        </label>

    </div>
    <div class="input-container">
        <i class="fa fa-phone icon"></i>
        <input class="input-field" type="text" placeholder="Телефон" name="Phone_user"
               value="<?php echo $userinfo->phone_user ?>">
    </div>
    <div class="input-container">
        <i class="fa fa-bank icon"></i>
        <input class="input-field" type="text" placeholder="Город" name="City_user"
               value="<?php echo $userinfo->city_user ?>">
    </div>
    <div class="btn-group">
        <input type="submit" class="btn btn-left btn-changeInf" value="Изменить данные">
        <button id="change_pas_view" class="btn btn-right btn-changePas" >Изменить пароль</button>
    </div>
</form>