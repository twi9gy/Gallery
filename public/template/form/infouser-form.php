<form class="form-Infoprofile" ">
    <?php global $user; ?>
    <div class="input-container">
        <i class="fa fa-info icon"></i>
        <input class="input-field" type="text" placeholder="Введите ваше имя..." name="Name_user"
               value="<?php echo $user->name_user ?>" readonly>
    </div>

    <div class="input-container">
        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" placeholder="Логин" name="Login"
               value="<?php echo $user->login_user ?>" readonly>
    </div>

    <div class="input-container">
        <i class="fa fa-envelope icon"></i>
        <input class="input-field" type="text" placeholder="Email" name="Email_user"
               value="<?php echo $user->email_user; ?>" readonly>
    </div>

    <div class="input-container">
        <i class="fa fa-birthday-cake icon"></i>
        <input class="input-field" type="text" placeholder="Дата рождения" name="DateBirth_user"
               value="<?php echo $user->datebirth_user ?>" readonly>
    </div>

    <div class="wrapper-radio profile-wrapper_radio">
        <h2 class="h2-profile" style="font-size: 18px; margin-bottom: 10px;">Пол:</h2>

        <label class="container-radio profile-radio">Мужчина
            <?php if (isset($user->gender_user) && $user->gender_user == "Man" ||
                !isset($user->gender_user)) { ?>

                <input type="radio" name="Gender" value="Man" checked>
            <?php } else { ?>
                <input type="radio" name="Gender" value="Man">
            <?php } ?>
            <span class="checkmark"></span>
        </label>


        <label class="container-radio profile-radio">Женщина
            <?php if (isset($user->gender_user) && $user->gender_user == "Woman") { ?>
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
               value="<?php echo $user->phone_user ?>" readonly>
    </div>

    <div class="input-container">
        <i class="fa fa-bank icon"></i>
        <input class="input-field" type="text" placeholder="Город" name="City_user"
               value="<?php echo $user->city_user ?>" readonly>
    </div>

</form>
