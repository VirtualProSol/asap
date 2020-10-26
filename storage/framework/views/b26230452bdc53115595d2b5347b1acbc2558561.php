<?php $__env->startSection('content'); ?>






<div class="ui container" style="padding:30px 0">

  <h3>My Reservations</h3>

  <hr/>
  <table class="ui very basic striped single right aligned table">
      <thead>
        <tr>
          <th class="left aligned">Car</th>
          <th>Pick Up Date</th>
          <th>Return Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>

      </thead>
      <tbody>
 <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td class="left aligned"><?php echo e($reservation->car["brand"]); ?>  <?php echo e($reservation->car["model"]); ?></td>
          <td ><?php echo e(date("D d M Y",strtotime($reservation->pick_up_date))); ?> </td>
          <td><?php echo e(date("D d M Y",strtotime($reservation->return_date))); ?></td>
          <td class="positive"><?php echo e(ucfirst($reservation->reservation_status)); ?></td>
          <td class="positive"><a href="reservation/view/<?php echo e($reservation->id); ?>" class="red ui compact button">VIEW</a></td>
          </tr>



          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>





</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nya/Downloads/Compressed/copy-car-rental-master/resources/views/reservations.blade.php ENDPATH**/ ?>