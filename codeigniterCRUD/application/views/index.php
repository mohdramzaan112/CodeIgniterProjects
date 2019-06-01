<?php
defined('BASEPATH') OR exit('No direct script access allowed.');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>index</title>
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
        <div><a class="btn btn-primary" href="<?php echo site_url('posts/add/');?>">Add</a></div>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
            <?php if(!empty($posts)): foreach($posts as $post):?>
            <tr>
                <td><?php echo $post['id'];?></td>
                <td><?php echo $post['title'];?></td>
                <td><?php echo $post['content'];?></td>
                <td>
                    <a class="btn btn-secondary" href="<?php echo site_url('posts/view/'.$post['id']);?>">View</a>
                    <a class="btn btn-warning" href="<?php echo site_url('posts/edit/'.$post['id']);?>">Edit</a>
                    <a class="btn btn-danger" href="<?php echo site_url('posts/delete/'.$post['id']);?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </table>

    </div>
</body>
</html>