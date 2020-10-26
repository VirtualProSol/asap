<?php $__env->startSection("content"); ?>
<div class="container">
  <div class="ui card p-5" style="width:35%;margin:auto;top:3rem;padding:30px">
      <div class="content">
          <form method="POST" action="<?php echo e(route('supplier-login')); ?>" class="ui form">
              <?php echo csrf_field(); ?>
              <p align="right" style="margin:0;padding:0"><a href="/login"><i class="arrow left icon"></i> <strong>Go back to user login</strong></a></p>
              <img src="/logo.png" style="width:100px;height:50px"/>
              <h3 style="margin:20px 0">Supplier Sign In</h3>
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
              <div class="field <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Email Address" >
              </div>
              <div class="field <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <button class="ui button orange login" style="margin:10px 0 10px 0" onclick="showLoading()">Sign in with ASAP Account</button>
          </form>
          <a href="<?php echo e(route("supplier-facebook")); ?>">
            <button class="ui button blue facebook" onclick="showLoadingFb()" style="margin:0px 0 10px 0">
              <i class="fa fa-facebook" style="margin-right:10px"></i> Sign in with Facebook
            </button>
          </a>
          <a href="<?php echo e(url('/reset/link')); ?>">
            <button class="ui button green" style="margin:0px 0 20px 0">
               Forgot Password
            </button>
          </a>
          <p align="center">Not already a supplier?<a href="<?php echo e(route('supplier-register')); ?>"> <strong> Create a supplier account.</strong></a></p>
        </div>
  </div>

</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nya/Downloads/Compressed/copy-car-rental-master/resources/views/auth/supplierlogin.blade.php ENDPATH**/ ?>