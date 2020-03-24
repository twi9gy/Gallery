<?php
require('../db/connect.php');

require ('../../../lib/class/photo.php');
require ('../../../lib/class/user.php');
require_once ('../../../lib/class/score.php');

require ('../../template/header.php');
require ('../../template/form/login-form.php');
require ('../../template/form/signup-form.php');


var_dump($connection);
if (isset($connection)) {
    $userObj = new User();
    $photoObj = new Photo();
    $scoreObj = new Score();

    $user = $userObj->get_user_byLogin($_POST['Login_author']);
    $data = $photoObj->get_user_photo($user->id_user);
    ?>
    <div class="wrapper-template">
        <main>
            <div class="wrapper">
                <div class="profile-info">
                    <div class="profile-forms">
                        <div class="profile-form">
                            <div class="profile-avatar-elem user-profile">
                                <div class="profile-img">
                                    <?php $avatar = $photoObj->get_avatar($user->id_user); ?>
                                    <?php if (isset($avatar) && $avatar) { ?>
                                        <a href="<?php echo $avatar->src_photo?>" rel="lightbox"
                                           title="<?php echo $avatar->description_photo ?>">
                                            <img src="<?php echo $avatar->src_photo?>" class="profile-pic">
                                        </a>
                                    <?php } else {?>
                                        <a href="../../img/login-form-img.png" rel="lightbox">
                                            <img src="../../img/login-form-img.png" class="profile-pic">
                                        </a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="profile-form">
                            <?php require ('../../template/form/infouser-form.php') ?>
                        </div>
                    </div>
                </div>
                <div class="cards-block">
                    <?php for ($i = 0; $i < count($data); $i++) : ?>
                        <?php if (!is_null($data[$i]->author_photo)) : ?>
                            <div class="card-block">
                                <div class="card-img">
                                    <a href="<?php echo $data[$i]->src_photo?>" rel="lightbox[roadtrip]"
                                       title="<?php echo $data[$i]->description_photo; ?>">
                                        <img src="<?php echo $data[$i]->src_photo?>" class="card-img-pic">
                                    </a>
                                </div>
                                <div class="card-score">
                                    <?php if (isset($_SESSION['logged_id'])) { ?>
                                        <?php
                                        $user = $userObj->get_user($_SESSION['logged_id']);
                                        require ('../../template/form/like-form.php');
                                        ?>
                                    <?php } else { ?>
                                        <div class="custom-select">
                                            <div class="value-score-row"></div>
                                            <div class="value-score-row"></div>
                                            <div class="value-score-row">
                                                <p class="btn" style="width: 100%" >
                                                    <?php $scoreObj->get_count($data[$i]->id_photo); ?> шт</p>
                                            </div>
                                            <div class="value-score-row">
                                                <p class="btn" style="width: 100%" ><?php echo $data[$i]->avgscore_photo ?></p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="card-info">
                                    <div class="card-author">
                                        <i class="fa fa-user icon icon-content"></i>
                                        <a class="card-info-title"><?php echo $data[$i]->author_photo; ?></a>
                                    </div>
                                    <button class="accordion">Описание</button>
                                    <div class="panel">
                                        <p><?php echo $data[$i]->description_photo; ?></p>
                                    </div>
                                    <div class="card-calendar">
                                        <i class="fa fa-calendar icon icon-content"></i>
                                        <a class="card-info-title"><?php echo $data[$i]->date_photo; ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </main>
        <?php require ('../../template/footer.php');?>
    </div>
<?php } ?>
