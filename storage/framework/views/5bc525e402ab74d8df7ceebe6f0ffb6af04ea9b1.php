<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Charts</title>



    </head>
    <body>



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo e(trans('admin.dashboard')); ?></div>

                <div class="panel-body">
                    <?php echo e(trans('generate.example')); ?>

                </div>
            </div>


                <div id="my-dash">
                    <div id="chart">
                    </div>
                    <div id="control">
                    </div>
                </div>

            <?php echo e($lava->render('Dashboard', 'Donuts', 'my-dash')); ?>


        </div>
    </div>
</div>

</body>
</html>
