<?php
require('../../methods/db/connect.php');
require ('../../../lib/class/user.php');
require ('../../../lib/class/photo.php');

require ('../header.php');

$path = '../../upload';
$types = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
$size = 3 * 1024 * 1024;

$errors = array();
global $success;

if (isset($_POST['Upload'])) {

    if (!in_array($_FILES['Picture']['type'], $types, true)) {
        $errors[0] = "Запрещённый тип файла. Можно загружать только файлы формата jpg, jpeg, gif, png.";
    } else {
        if ($_FILES['Picture']['size'] > $size) {
            $errors[0] = "Слишком большой размер файла.";
        } else {
            if (@copy($_FILES['Picture']['tmp_name'], $path . '//' . $_FILES['Picture']['name'])) {
                $userObj = new User();
                $photoObj = new Photo();
                $data = $userObj->get_user($_SESSION['logged_id']);

                $prepared = $connection->prepare("SELECT * FROM photo WHERE id_user = (:id) AND 
                                                    avatarprofile_photo = true");
                $prepared->bindParam(':id',$_SESSION['logged_id']);
                $prepared->execute();

                if ($prepared->columnCount() > 0) {
                    $prepared = $connection->prepare("UPDATE photo SET avatarprofile_photo = false 
                                                    WHERE id_user = (:id)");
                    $prepared->bindParam(':id',$_SESSION['logged_id']);
                    $prepared->execute();
                }
                
                $full_path = $path . '/' . $_FILES['Picture']['name'];
                $photoObj->upload($data, $full_path);
                $success = "Успешно.";
            }
        }
    }
}
?>

<div class="upload-bg">
    <div style="height: 20vmin"></div>
    <div class="upload">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="upload-content">
                <div class="upload-elem">
                    <h2 class="h-upload">Загрузка аватара:</h2>
                </div>
                <div class="upload-elem">
                    <?php if (isset($errors[0])) : ?>
                        <div class="errors">
                            <p><?php echo $errors[0] ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($success)) : ?>
                        <div id="uploadSuccess" class="success">
                            <p>Успешно.</p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="upload-elem">
                    <input type="file" class="upload-input input-fileUpload" name="Picture"  required>
                </div>
                <div class="upload-elem">
                    <textarea class="input-field upload-input" style="height: 100%" name="Desc" required>
                        <?php echo @$_POST['Desc']?></textarea>
                </div>
                <div class="upload-elem">
                    <div class="input-container">
                        <input type="submit" class="btn upload-input" style="margin: 0 1% 10px 5%;" name="Upload" value="Загрузить">
                    <a href="../../methods/get/private_office.php" class="btn upload-input" style="text-decoration: none;
                    text-align: center; margin: 0 5% 10px 0;">Назад</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require ('../../template/footer.php'); ?>
