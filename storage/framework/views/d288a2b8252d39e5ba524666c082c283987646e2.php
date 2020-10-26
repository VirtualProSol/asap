<?php $__env->startSection('content'); ?>
<div class="ui container">



<div class="ui horizontal statistics">
    <div class="statistic">
      <div class="value">
  <i class="teal  car icon"></i>
  <?php echo e($cars->count()); ?>

      </div>
      <div class="label">
  Vehicles
      </div>
    </div>
    <div class="statistic">
      <div class="value">
  <i class="orange dollar sign icon"></i>
5
      </div>
      <div class="label">
  In your Account
      </div>
    </div>
    <div class="statistic">
      <div class="value">
  <i class="blue calendar check icon"></i>
  <?php echo e(count($reservations)); ?>

      </div>
      <div class="label">
  Reservations
      </div>
    </div>
  </div>


</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('suppliers.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nya/Downloads/Compressed/copy-car-rental-master/resources/views/suppliers/home.blade.php ENDPATH**/ ?>