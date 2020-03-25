<?php
require ('../lib/class/photo.php');

if (isset($connection)) {
    $userObj = new User();
    $photoObj = new Photo();
    $scoreObj = new Score();

    $data = $photoObj->get_photos();
    ?>
        <div class="wrapper">
            <div class="cards-block">

                <?php for ($i = 0; $i < count($data); $i++) : ?>
                    <?php if (!is_null($data[$i]->author_photo)) : ?>
                        <div class="card-block">
                            <div class="errors" style="display: none">
                                <p>ERROR</p>
                            </div>
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
                                    require ('template/form/like-form.php');
                                    ?>
                                <?php } else { ?>
                                    <div class="custom-select">
                                        <div class="value-score-row"></div>
                                        <div class="value-score-row"></div>
                                        <div class="value-score-row">
                                            <p class="btn btn-Score" style="width: 100%" ><?php $scoreObj->get_count($data[$i]->id_photo); ?> шт</p>
                                        </div>
                                        <div class="value-score-row">
                                            <p class="btn btn-Score" style="width: 100%" ><?php echo $data[$i]->avgscore_photo ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="card-info">
                                <div class="card-author">
                                    <i class="fa fa-user icon icon-content"></i>
                                    <?php
                                    global $logged_user;
                                    if ($logged_user->login_user != $data[$i]->author_photo) { ?>
                                        <form action="methods/get/profile.php" method="POST">
                                            <input type="hidden" name="Login_author" value="<?php echo $data[$i]->author_photo; ?>">
                                            <input type="submit" class="author_link"
                                                   value="<?php echo $data[$i]->author_photo; ?>">
                                        </form>
                                    <?php } else { ?>
                                        <a class="card-info-title"><?php echo $data[$i]->author_photo; ?></a>
                                    <?php } ?>
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
    <?php
}