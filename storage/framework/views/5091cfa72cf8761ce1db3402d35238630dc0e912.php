<!DOCTYPE html>
<html>
<head>
    <title><?php echo e(trans('messages.email.invite')); ?></title>
    <style>
        .content {
            background: #1ab9a7;
            padding: 50px;
            font-size: 19px;
            font-family: arial;
        }
        .register {
            display: block;
            margin: 50px auto;
            background: white;
            max-width: 500px;
            padding: 15px;
            box-shadow: 5px 5px 2px rgba(54, 69, 70, 0.66);
        }
        .register .heding {
            text-align: center;
            font-size: 35px;
            font-family: VnBodoni;
            color: #697b79;
            margin-top: 4%;
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
        .hr-body-footer {
            border: 1px solid darkcyan;
        }
        .box-info .head {
            text-align: center;
        }
        .content-survey {
            padding-left: 3%;
            padding-right: 3%;
            margin-top: -5%;
        }
        a {
            word-wrap: break-word;
            color: #f15e10;
        }
    </style>
</head>
<body>
<div class="content">
    <div class="register">
        <div class="heding">
            FSURVEY
        </div>
        <div class="body">
            <h4>Dear, <?php echo e($name); ?></h4>
            <p>Thank you because you have used website our. </p>
            <p>Your poll created SUCCESS.</p>
            <p>Below, it's two link which they send your mail.</p>
            <p>Access this link help you can change, close or delete poll of you.</p>
            <a href="<?php echo e($link_manage); ?>"><?php echo e($link_manage); ?></a>
            <hr>
        </div>
        <div class="content-survey">
            <h4>Infor your survey</h4>
            <p>Title: <?php echo e($title); ?></p>
            <p>Description: <?php echo e($description); ?></p>
            <div class="hr-heading-body">
                <p>Send this link to every body that you want invite for participant.</p>
                <a href="<?php echo e($link); ?>"><?php echo e($link); ?></a>
            </div>
        </div>
        <hr class="hr-body-footer">
    </div>
</div>
</body>
</html>
