<?php
global $data, $i, $user;
$scoreObj = new Score();
?>

<form class="likeform" method="post">
    <input type="hidden" name="Id_photo_like"
           value="<?php echo $data[$i]->id_photo; ?>" required>
    <input type="hidden" name="Author_score"
           value="<?php echo $user->login_user; ?>" required>
    <div class="custom-select">
        <div class="value-score-row">
            <?php if( $user->login_user != $data[$i]->author_photo ) : ?>
                <select name="Score" class="btn btn-select btn-Score" required>
                    <option value="0">Оценить</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            <?php endif; ?>
        </div>
        <div class="value-score-row">
            <input type="submit" class="btn btn-Score btn-save_like" style="width: 100%;display: none" value="Сохранить">
        </div>
        <div class="value-score-row count-score">
            <p class="btn btn-Score" style="width: 100%" ><?php $scoreObj->get_count($data[$i]->id_photo); ?> шт</p>
        </div>
        <div class="value-score-row avg-score">
            <p class="btn btn-Score" style="width: 100%" ><?php echo $data[$i]->avgscore_photo ?></p>
        </div>
    </div>
</form>
