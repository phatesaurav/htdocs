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
    <title></title>
</head>

<body>
    <div class="container mt-3 h1">Input Form</div>
    <div class="container mt-3">
        <?php echo form_open('homecontroller/formFunction', ['method' => 'post', 'enctype' => 'multipart/form-data']); ?>
        <?php echo form_label('Name:'); ?>
        <?php echo form_input(['type' => 'text', 'class' => 'form-control mb-1', 'name' => 'name', 'value' => set_value('name'), 'placeholder' => 'Enter name']); ?>
        <?php echo form_error('name', '<div class="text-danger mb-3">', '</div>'); ?>

        <?php echo form_label('Email:'); ?>
        <?php echo form_input(['type' => 'text', 'class' => 'form-control mb-1', 'name' => 'email', 'value' => set_value('email'), 'placeholder' => 'Enter email']); ?>
        <?php echo form_error('email', '<div class="text-danger mb-3">', '</div>'); ?>

        <?php echo form_label('Mobile:'); ?>
        <?php echo form_input(['type' => 'text', 'class' => 'form-control mb-1', 'name' => 'mobile', 'value' => set_value('mobile'), 'placeholder' => 'Enter mobile']); ?>
        <?php echo form_error('mobile', '<div class="text-danger mb-3">', '</div>'); ?>

        <?php echo form_label('Image:'); ?>
        <?php echo form_input(['type' => 'file', 'class' => 'form-control mb-1', 'name' => 'image']); ?>
        <?php echo form_error('image', '<div class="text-danger mb-3">', '</div>'); ?>

        <?php echo form_label('Date:'); ?>
        <?php echo form_input(['type' => 'date', 'class' => 'form-control mb-1', 'name' => 'date', 'value' => set_value('date'), 'placeholder' => 'Enter date']); ?>
        <?php echo form_error('date', '<div class="text-danger mb-3">', '</div>'); ?>

        <?php echo form_label('Password:'); ?>
        <?php echo form_password(['type' => 'password', 'class' => 'form-control mb-1', 'name' => 'password', 'value' => set_value('password'), 'placeholder' => 'Enter password']); ?>
        <?php echo form_error('password', '<div class="text-danger mb-3">', '</div>'); ?>

        <?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'submit']); ?>
        <?php echo form_close(); ?>
    </div>
</body>

</html>