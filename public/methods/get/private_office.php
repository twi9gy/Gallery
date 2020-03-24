<?php
require('../db/connect.php');

require ('../../../lib/class/photo.php');
require ('../../../lib/class/user.php');
require_once ('../../../lib/class/score.php');

require ('../../template/header.php');
require ('../../template/form/changePas-form.php');


if( isset($connection) ) {
    $userObj = new User();
    $photosObj = new Photo();
    $scoreObj = new Score();

    $userinfo = $userObj->get_user($_SESSION['logged_id']);
    $photoinfo = $photosObj->get_user_photo($_SESSION['logged_id']);
    ?>
    <div class="wrapper-template">
        <main>
            <div class="wrapper">
                <div class="profile-info">
                    <div class="profile-forms">
                        <div class="profile-form">
                            <div class="profile-avatar">
                                <div class="profile-avatar-elem">
                                    <div class="profile-img">
                                        <?php $avatar = $photosObj->get_avatar($userinfo->id_user); ?>
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

                                <div class="profile-avatar-elem">
                                    <div class="upload-group_button">
                                        <a href="../../template/form/uploadAvatar-form.php" class="btn upload-left"
                                        >Загрузите аватар</a>
                                        <a href="../../template/form/upload-form.php" class="btn upload-right"
                                        >Загрузите ваши фото</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="profile-form">
                            <?php require ('../../template/form/profile-form.php'); ?>
                        </div>

                    </div>
                </div>

                <div class="cards-block">
                    <?php foreach ( $photoinfo as $value ) : ?>
                        <div class="card-block">
                            <div>
                                <form class="delImgform" method="post">
                                    <input type="hidden" name="ID_photo" value="<?php echo $value->id_photo ?>">
                                    <input type="image" class="card-img-del" src="../../img/del.png" name="del_photo"
                                           value="удалить">
                                </form>
                            </div>
                            <div class="card-img">
                                <a href="<?php echo $value->src_photo?>" rel="lightbox[roadtrip]"
                                   title="<?php echo $value->description_photo; ?>">
                                    <img src="<?php echo $value->src_photo?>" class="card-img-pic profile-content-img">
                                </a>
                            </div>
                            <div class="card-score">
                                <div class="custom-select">
                                    <div class="value-score-row"></div>
                                    <div class="value-score-row"></div>
                                    <div class="value-score-row">
                                        <p class="btn btn-Score" style="width: 100%" >
                                            <?php $scoreObj->get_count($value->id_photo); ?> шт</p>
                                    </div>
                                    <div class="value-score-row">
                                        <p class="btn btn-Score" style="width: 100%" ><?php echo $value->avgscore_photo ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-info">
                                <div class="card-author">
                                    <?php if ( $avatar->id_photo != $value->id_photo ) { ?>
                                        <form action="../post/set_avatar.php" method="POST">
                                            <input type="hidden" name="Id_photo" value="<?php echo $value->id_photo; ?>">
                                            <input type="submit" class="author_link" style="margin-left: -55%;"
                                                   value="Сделать аватаром">
                                        </form>
                                        <a href="#!" class="card-info-title profile_title_NotAvatar" style="">
                                            <?php echo $value->author_photo; ?></a>
                                    <?php } else { ?>
                                       <i class="fa fa-user icon icon-content"></i>
                                        <a href="#!" class="card-info-title profile_title" >
                                            <?php echo $value->author_photo; ?></a>
                                        <?php } ?>
                                </div>
                                <button class="accordion">Описание</button>
                                <div class="panel">
                                    <form class="editImgform" method="post">
                                        <input type="hidden" name="ID_photo" value="<?php echo $value->id_photo ?>">
                                        <textarea class="img-desc" name="Text_desc" style="width:100%;margin: 10px 10px 10px 0;">
                                            <?php echo $value->description_photo; ?></textarea>
                                        <input type="submit" class="btn btn-saveDesc" value="Сохранить"></input>
                                    </form>
                                </div>
                                <div class="card-calendar">
                                    <i class="fa fa-calendar icon icon-content"></i>
                                    <a class="card-info-title"><?php echo $value->date_photo; ?></php></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
        <?php require ('../../template/footer.php'); ?>
    </div>
<?php } ?>
