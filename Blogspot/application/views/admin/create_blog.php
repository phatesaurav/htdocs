<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>create_blog</title>
</head>

<body>
    <div class="container-sm mt-3 h1">Create Blog</div>
    <div class="container-sm mt-3">
        <?php echo form_open('admin/create_blog_validation', array('method' => 'post', 'enctype' => 'multipart/form-data')); ?>

        <?php echo form_label('Title:'); ?>
        <?php echo form_input(['type' => 'text', 'class' => 'form-control mb-1', 'name' => 'title', 'value' => set_value('title'), 'placeholder' => 'Enter title']); ?>
        <?php echo form_error('title', '<div class="text-danger mb-3">', '</div>'); ?>

        <?php echo form_label('Description:'); ?>
        <?php echo form_textarea(['class' => 'form-control mb-1', 'name' => 'description', 'value' => set_value('description'), 'placeholder' => 'Enter description', 'rows' => '3']); ?>
        <?php echo form_error('description', '<div class="text-danger mb-3">', '</div>'); ?>

        <?php echo form_label('Content:'); ?>
        <?php echo form_textarea(['class' => 'form-control mb-1', 'name' => 'content', 'value' => set_value('content'), 'placeholder' => 'Enter content', 'rows' => '7']); ?>
        <?php echo form_error('content', '<div class="text-danger mb-3">', '</div>'); ?>

        <?php echo form_label('Category:'); ?>
        <?php echo form_input(['type' => 'text', 'class' => 'form-control mb-1', 'name' => 'category', 'value' => set_value('category'), 'placeholder' => 'Enter category']); ?>
        <?php echo form_error('category', '<div class="text-danger mb-3">', '</div>'); ?>

        <?php echo form_label('Author:'); ?>
        <?php echo form_input(['type' => 'text', 'class' => 'form-control mb-1', 'name' => 'author', 'value' => set_value('author'), 'placeholder' => 'Enter author']); ?>
        <?php echo form_error('author', '<div class="text-danger mb-3">', '</div>'); ?>

        <?php echo form_label('Image:'); ?>
        <?php echo form_input(['type' => 'file', 'class' => 'form-control mb-1', 'name' => 'image']); ?>
        <?php echo form_error('image', '<div class="text-danger mb-3">', '</div>'); ?>

        <?php echo form_label('Date:'); ?>
        <?php echo form_input(['type' => 'date', 'class' => 'form-control mb-1', 'name' => 'date', 'value' => set_value('date'), 'placeholder' => 'Enter date']); ?>
        <?php echo form_error('date', '<div class="text-danger mb-3">', '</div>'); ?>

        <?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'submit']); ?>
        <?php echo form_close(); ?>
    </div>
</body>

</html>