<?php $__env->startSection("content"); ?>

<div class="ui container" style="padding:2% 0 4% 0">
    <?php if(count($search) > 0): ?>
    <div class="ui row grid">
        <div class="column ">
            <h3>Our Vehicle Fleet</h3>
            <div class="ui divider"></div>
            <div class="ui four cards stackable">
                <?php $__currentLoopData = $search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="image">
                        <img style="width:80%;height:100%;margin:auto;padding:20px" src="<?php echo e($car->imageUrl); ?>">
                    </div>
                    <div class="content">
                        <div class="header" style="font-size:16px"><?php echo e($car->year); ?> <?php echo e($car->brand); ?> <?php echo e($car->model); ?></div>
                        <div class="meta" style="padding-bottom:10px">
                        </div>
                        <p><strong>Milage</strong> : <?php echo e($car->milage); ?>km</p>
                        <p><strong>Location</strong> : <?php echo e($car->location); ?></p>
                        <p><strong>Rental Rate</strong> : USD<?php echo e($car->daily_rate); ?>/day</p>
                    </div>
                    <div class="extra content">
                    <a href="<?php echo e('cars/info/'.$car->id); ?>">
                            <button class="ui button icon orange right floated" style="width:48%">
                            View
                            </button>
                          </a>
                          
                            <button <?php if($car->supplier_id != Auth::id()): ?> class="ui button orange" <?php else: ?> class="ui button orange disabled" <?php endif; ?> style="width:48%" @click="showModal(<?php echo e($car); ?>)">
                            Reserve
                            </button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="column" style="margin:auto;height:60vh;text-align:center;padding:10% 0">
        <img src="https://img.icons8.com/cute-clipart/64/000000/nothing-found.png">
        <h3>No vehicles found...Please try again</h3>
        <button class="ui button orange" onclick=" parent.history.back();"><i class="ui icon arrow left"></i> Go Back</button>
    </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nya/Downloads/Compressed/copy-car-rental-master/resources/views/cars.blade.php ENDPATH**/ ?>