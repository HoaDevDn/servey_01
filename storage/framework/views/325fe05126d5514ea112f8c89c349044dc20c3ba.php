<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" href="bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
    <?php echo Html::style(elixir('/admin/css/bootstrap.css')); ?>

    <?php echo Html::style(elixir('/admin/css/bootstrap.min.css')); ?>

</head>
<body>
   <!--  <script src="/bower/bootstrap/dist/css/bootstrap.css"></script>
    <script src="/bower/bootstrap/dist/css/bootstrap.min.css"></script> -->
    <?php echo e(Html::script(elixir('/user/js/jquery.min.js'))); ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
    <script src="bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

    <!-- <script type="text/javascript" src="js/test.js"></script> -->
    <input type="hidden" data-number="0" idtoken="<?php echo e(csrf_token()); ?>" data-route="<?php echo url('/'); ?>" class="url-token"/>
    <?php echo Form::text('emails', '', ['class' => 'form-emails', 'data-role' => 'tagsinput']); ?>

    <?php echo Form::button('submit', ['class' => 'bt-send']); ?>


</body>
</html>
