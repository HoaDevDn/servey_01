<table class="table table">
    <thead class="thead-default">
        <tr>
            <th>
                Username
            </th>
            <th>
                Email
            </th>
            <th>
                Time
            </th>
            <th>
                Detail
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $listUserAnswer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
                <td>
                    <?php echo e($value->name); ?>

                </td>
                <td>
                    <?php echo e($value->email); ?>

                </td>
                <td>
                    <?php echo e($value->created_at); ?>

                </td>
                <td>
                    <?php echo e($value->created_at); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>

