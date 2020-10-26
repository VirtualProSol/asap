<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="ui card p-5" style="width:30%;margin:auto;top:6rem;padding:40px">
        <div class="content">
            <div class="ui form">
                <?php echo csrf_field(); ?>
                <img src="/logo.png" style="width:100px;height:50px"/>
                <h3 style="margin:20px 0">Send Password Link</h3>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="invalid-feedback">
                          <strong><?php echo e($message); ?></strong>
                      </p>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  <div id="form">
                    <div class="field <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <label>Email Address</label>
                        <input id="email" type="email" name="email" placeholder="Email Address" required>
                      </div>
                      <p>NB. Use the email address you registered with.</p>
                      <button class="ui button orange send" style="margin:10px 0 20px 0" onclick="sendLink()">Send Link</button>
                  </div>

                  <div id="notification" style="margin-bottom:20px;display:none">
                    <div class="ui message">
                        <i class="close icon"></i>
                        <div class="header">
                          Notification
                        </div>
                        <p id="message"></p>
                      </div>
                  </div>
                </div>
            <a href="/login">
                <button class="ui button blue" style="margin:0px">Go to Login</button></a>
          </div>
    </div>
  
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("js"); ?>
<script>
    function sendLink(){
        $(".send").attr("class","ui button orange send loading");
        if($("#email").val() != null){
            $.ajax({
                url: '/send/link',
                type: 'post',
                data: {
                'email':$("#email").val()
                },
                headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') //for object property name, use quoted notation shown in second
                },
                dataType: 'json',
                success: function (data) {
                    $("#form").hide();
                    $("#message").html('If email is found a reset link will be sent to <b>'+$("#email").val()+'</b>. Check your mailbox.')
                    $("#notification").show();
                }
            });
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nya/Downloads/Compressed/copy-car-rental-master/resources/views/auth/passwords/sendlink.blade.php ENDPATH**/ ?>