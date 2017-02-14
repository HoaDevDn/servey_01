<!DOCTYPE html>
<html>
<head>
    <title><?php echo e(trans('messages.email.invite')); ?></title>
    <style>
        .title {
            text-transform: uppercase;
        }
        .content {
            background: #45a1ff;
            padding: 50px;
            border-radius: 5px;
        }
        .register {
            display: block;
            margin: 50px auto;
            background: white;
            max-width: 500px;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 5px 5px 2px black;
        }
        .register .heding {
            text-align: center;
        }
        .register .body {
            padding:15px;
        }
        .dear {
            font-size: 20px;
        }
        .link-active {
            background: green;
            color: white;
            display: block;
            width: 200px;
            text-align: center;
            margin: 0 auto;
        }
        .hr-heading-body {
            width: 700px;
        }
        .hr-body-footer {
            border: 1px solid #45a1ff;
        }
        .box-info .head {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="register">
            <div class="heding">
                <h2>
                    <b>
                        <p class="title"><?php echo e($title); ?></p>
                        <?php echo e($email); ?> ( <?php echo e($senderName); ?> )
                    </b>
                </h2>
            </div>
            <hr class="hr-heading-body">
            <div class="body">
                <p><?php echo e(trans('messages.email.from')); ?> <?php echo e($email); ?> ( <?php echo e($senderName); ?> )
            </div>
            <div class="hr-heading-body">
                <a href="<?php echo e($link); ?>"><?php echo e($link); ?></a>
            </div>
            <hr class="hr-body-footer">
        </div>
    </div>
</body>
</html>
