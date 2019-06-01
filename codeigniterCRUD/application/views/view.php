<?php
defined('BASEPATH') OR exit('No direct script access allowed.');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>view</title>
    <link rel="stylesheet" href="<?php echo base_url();?>/application/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>View Post</h1>
        <p><?php echo !empty($post['title']) ? $post['title']:'';?></p>
        <p><?php echo !empty($post['content']) ? $post['content']:'';?></p>
    </div>
</body>
</html>