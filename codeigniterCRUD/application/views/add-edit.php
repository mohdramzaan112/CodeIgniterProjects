<?php
defined('BASEPATH') OR exit('No direct script access allowed.');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>add edit</title>
    <link rel="stylesheet" href="<?php echo base_url();?>/application/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <?php if(!empty($success_msg)) {?>
        <div class="col-xs-12">
            <div class="alert alert-success"><?php echo $success_msg;?></div>
        </div>
        <?php }elseif(!empty($error_msg)) {?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo $error_msg;?></div>
        </div>
        <?php } ?>

        <form action="" method="post" class="form">
            Title: <input class="form-control" type="text" name="title" value="<?php echo !empty($post['title'])?$post['title']:'';?>"><br><br>
            Content: <input class="form-control" type="text" name="content" value="<?php echo !empty($post['content'])?$post['content']:'';?>"><br><br>
            <input class="btn btn-primary" type="submit" name="postSubmit" value="Submit">
        </form>
    </div>
</body>
</html>







