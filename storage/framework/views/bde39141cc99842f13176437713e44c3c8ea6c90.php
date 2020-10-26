<?php $__env->startSection('content'); ?>
<div class="container">


  <div class="ui mini modal middle aligned " id="addmodal">

    <i class="close icon"></i>
    <div class="header modal_header">Vehicle Added Succesfully</div>
    <div class="content">
      <p class="modal_text">Do you want to add another vehicle</p>
      <a href=<?php echo e(route('home')); ?> class="ui red button">No</a>
      <a href=<?php echo e(route('new_car_post')); ?> class="ui green button yes">Yes</a>

    </div>



    </div>




  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="ui container" style="margin-bottom:20px;padding:20px 0">
              <div class="column">

                  <div class="ui two column grid stackable" style="margin:auto">
                    <div class="column">
                      <h1><?php echo e($car->year); ?> <?php echo e($car->brand); ?> <?php echo e($car->model); ?></h1>
                    </div>

                    <div class="column stackable" style="text-align:end;margin:0">
                      <button <?php if($car->supplier_id != Auth::id()): ?> class="ui button red" <?php else: ?> class="ui button red disabled" <?php endif; ?>  @click="showModal(<?php echo e($car); ?>)">
                        Reserve Car
                      </button>
                      <a href="#information"><button class="ui button secondary">
                        More Info...
                      </button></a>
                    </div>
                  </div>
                  <div class="ui divider"></div>

              </div>
              <div class="ui three column grid">
                <div class="two wide column">
                  <div style="margin:50px 0">
                    <p style="margin:0;padding:0;font-size:16px"><b> <i class="map marker alternate icon" style="margin-left:-5px"></i>Location</b></p>
                    <p style="margin:auto;padding:0"><?php echo e($car->location); ?></p>
                  </div>

                  <div>
                    <p style="margin:0;padding-top:10px;font-size:16px"><b><i class="money bill alternate icon" style="margin-right:10px"></i>Daily Rate</b></p>
                    <p style="margin:0;padding:0">USD<?php echo e($car->daily_rate); ?></p>
                  </div>

                </div>

                <div class="twelve wide column" style="margin:0px 0">
                  <img class="ui image responsive" style="height:100%;width:60%;margin:auto;" src="<?php echo e($car->imageUrl); ?>">
                </div>

                <div class=" two wide column" style="text-align:end;">
                  <div style="margin:50px 0">
                    <p style="margin:0;padding:0;font-size:16px"><b><i class="car icon" style="margin-right:10px"></i>Fuel Type</b></p>
                    <p style="margin:0;padding:0"><?php echo e(ucfirst($car->fuel_type)); ?></p>
                  </div>

                  <div>
                    <p style="margin:0;padding-top:10px;font-size:16px"><b><i class="location arrow icon" style="margin-right:10px"></i>Milage</b></p>
                    <p style="margin:0;padding:0"><?php echo e($car->milage); ?> Km</p>
                  </div>
                </div>
              </div>

              <div class="column" style="margin:auto;text-align: center; padding-bottom:20px;display:none">

              </div>
          </div>

          <div class="ui four column grid container" style="margin-bottom:40px;">
              <div class="column">
                <img class="ui large bordered image" style="height:100%;width:100%" src="<?php echo e($car->imageUrl1); ?>">
              </div>
              <div class="column">
                  <img class="ui large bordered image" style="height:100%;width:100%" src="<?php echo e($car->imageUrl2); ?>">
              </div>
              <div class="column">
                  <img class="ui large bordered image" style="height:100%;width:100%" src="<?php echo e($car->imageUrl3); ?>">
              </div>
              <div class="column">
                  <img class="ui large bordered image" style="height:100%;width:100%" src="<?php echo e($car->imageUrl4); ?>">
              </div>
          </div>

          <div id="information" class="anchor ui grid container">
              <h3 style="margin:0">Vehicle Info</h3>
              <div class="row" style="margin-bottom:10px;">
                  <div class="ui column divider"></div>
                </div>
              <div class="ui row three column centered stackable" style="margin:0;padding:0">
                  <div class="ui grid two column" style="margin-bottom:40px;">
                      <div class="ui row centered segment">
                          <div class="two wide column more">
                              <i class="fas rocket icon" style="margin:auto;"></i>
                          </div>
                          <div class="column info">
                              <p style="margin:0;font-size: 14px;">Engine Capacity</p>
                          <p class="big_info"><b><?php echo e($car->engine_capacity); ?> Litres</b></p>
                          </div>
                      </div>
                  </div>
                  <div class="ui grid two column" style="margin:auto 15px">
                      <div class="ui segment row centered">
                          <div class="two wide column more">
                              <i class="fas cogs icon" style="margin:auto;"></i>
                          </div>
                          <div class="column info">
                              <p style="margin:0;font-size: 14px;">Transmission</p>
                          <p class="big_info"><b><?php echo e(ucfirst($car->transmission)); ?></b></p>
                          </div>
                      </div>
                  </div>
                  <div class="ui grid two column">
                      <div class="ui segment row centered">
                          <div class="two wide column more">
                              <i class="fas car icon" style="margin: auto;"></i>
                          </div>
                          <div class="column info">
                              <p style="margin:0;font-size: 14px;">Number of Seats</p>
                          <p class="big_info"><b><?php echo e($car->seats); ?></b></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="ui grid container" style="margin-bottom:40px;margin-top:20px">
              <h3 style="margin:0">Reviews (<?php echo e(count($car->reviews)); ?>)</h3>
              <div class="row" style="margin-bottom:10px;">
                <div class="ui column divider"></div>
              </div>
              <div style="width:100%">
                <?php if(count($car->reviews) > 0): ?>
                  <?php if(count($car->reviews) >= 4): ?>
                  <div class="ui four cards stackable">
                  <?php else: ?>
                  <div class="ui cards stackable">
                  <?php endif; ?>
                    <?php $__currentLoopData = $car->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="card">
                        <div class="content">
                        <div class="header" style="font-size:16px"><?php echo e($review->reviewer); ?></div>
                          <div class="meta" style="color:#333!important"><small><?php echo e(date("D d M Y",strtotime($review->created_at))); ?></small></div>
                          <div class="description">
                           <?php echo e($review->review); ?>

                          </div>
                          <div style="margin-top:10px">
                            <span><strong>Rating</strong><br/>  
                              <?php for($i = 0; $i < $review->rating; $i++): ?>
                                <i class="fa fa-star rating"></i>
                              <?php endfor; ?>
                              <?php for($i = 0; $i < 5 - $review->rating; $i++): ?>
                                <i class="fa fa-star-o"></i>
                              <?php endfor; ?>
                            </span>
                          </div>
                          
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                  <?php endif; ?>
                </div>
          </div>
      </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("javascript"); ?>
<script type="text/javascript">




<?php if(session('modal')): ?>
$(document).ready(function() {
  $("#addmodal").modal("show");
});

<?php endif; ?>





  function showModal(){
    $(".modal").modal("show");
  }

  function datepickers(){
    var startDate;
    var endDate;

    $("#date_picker1").datepicker({
        minDate: '+0d',
        changeMonth: true,
        changeYear: true,
      });

      $("#date_picker1").datepicker('show');

      $(function() {

          $("#date_picker2").datepicker({});

      });

      $('#date_picker1').change(function() {

          startDate = $(this).datepicker('getDate');

          $("#date_picker2").datepicker("option", "minDate", startDate);
      })

      $('#date_picker2').change(function() {

          endDate = $(this).datepicker('getDate');

          $("#date_picker1").datepicker("option", "maxDate", endDate);
          var diffDays = endDate.getDate() - startDate.getDate();
          var total=diffDays* <?php echo e($car->daily_rate); ?>;
          $("#attribute").text("Total $");
          $("#total_price").text(total);

      });
  }
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nya/Downloads/Compressed/copy-car-rental-master/resources/views/car_info.blade.php ENDPATH**/ ?>