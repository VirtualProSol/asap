<!DOCTYPE html>
<html>

  <head>
    <title>ASAP Car Rental</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"> 
    <link rel="icon" type="image/png" href="/logo.png"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery-ui.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/semantic.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/Semantic-UI-Alert.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <style type="text/css">
      body,a,h1,h2,h3,h4,.header,p,button,input,.search{
        font-family: "Montserrat",sans-serif !important;
      }

      .fas{
        font-size: 20px !important;
      }
      .more{
        margin:auto 0px !important;
      }

      .input.selection{
        margin:0 0 35px 0;
        width: 100%;
      }

      .menu.transition{
        width: 100% !important;
      }

      .button.search{
        background: #fff;
        border:1px solid rgba(34,36,38,.15);
      }

      .button.search:hover{
        background: #fff;
        border:1px solid #cccccc;
      }
      #app{
        display:flex;
        min-height: 100vh;
        flex-direction: column;
      }
      .site_content{
        flex: 1;
      }
      .ui.secondary.inverted.menu .active.item{
        background: none;
        font-weight: bold;
      }
      .ui.secondary.inverted.menu .item:hover{
        background: none !important;
        font-weight: bold !important;
        color: #cccccc;
      }
      .ui.secondary.inverted.menu .item{
        font-size: 14px;
      }
      .orange.button{
        background: #FF0000 !important;
      }

      #reservation_form p,#reservation_form h4{
          font-size: 13px !important;
      }

      i.fa.fa-star.rating{
            color: gold !important;
        }

        .big_info{
          font-size: 16px;
        }

    </style>
  </head>




  <body>
    <div id="app">
      
      <header>
          <div class="ui secondary menu inverted" style="background:#800000;padding:5px" >
              <div class="ui container">
                  <div style="margin:auto 0px;">
                    <a href="/">
                      <img style="margin-right:20px" src="/logo.png" alt="Logo" height="40px" width="80px">
                    </a>
                  </div>
                  <a class="item <?php if($home ?? false): ?> active <?php endif; ?>" href="/">Home</a>
                  <a class="item <?php if($vehicles ?? false): ?> active <?php endif; ?>" href="/cars">Our Vehicles</a>
                  <a class="item <?php if($register ?? false): ?> active <?php endif; ?>" href="/cars/new" style="display:none">Register Vehicle</a>
                  <a class="item <?php if($my_reservation ?? false): ?> active <?php endif; ?>" href="/reservations">My Reservations</a>
                  <a class="item <?php if($admin ?? false): ?> active <?php endif; ?>" href="/admin">Admin</a>
                  <div class="right menu">
                      <div class="item">
                          <div class="ui icon input" style="display: none">
                          <input type="text" placeholder="Search Vehicles">
                          <i class="search link icon"></i>
                          </div>
                      </div>
                      <?php if(Auth::user()->isSupplier): ?>
                      <div class="item">
                        <a href="/supplier/home" class="ui button inverted" style="margin-left:10px">Go to Supplier Portal</a>
                      </div>
                      <?php else: ?>
                      <div class="item">
                        <a href="/cars/new" class="ui button inverted" style="margin-left:10px">Become A Supplier</a>
                      </div>
                      <?php endif; ?>
                      <div class="item">
                        <div class="ui right dropdown item">
                          <span style="font-family:'Nunito' !important;font-size:16px"><?php echo e(Auth::user()->name); ?></span>
                          <i class="dropdown icon"></i>
                          <div class="menu">
                            <form class="ui item" style="padding:0 !important" action="<?php echo e(route("logout")); ?>" method="POST">
                              <?php echo csrf_field(); ?>
                              <button class="ui button inverted" style="color:#333 !important;width:100%;margin:0;" type="submit">Logout</button>
                          </form>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </header>
      

      <main class="site_content">

            <?php echo $__env->yieldContent('content'); ?>


          <div class="ui tiny modal middle aligned " id="reservationmodal" style="display:none">
            <i class="close icon"></i>
            <div class="header">Rent a {{car.brand}} {{car.model}}</div>
            <div class="content">
                <form form class="ui form" id="reservation_form" method="POST" action="<?php echo e(route('new_reservation')); ?>" enctype="multipart/form-data" >
                <?php echo csrf_field(); ?>
                    <div class="field">
                      <label style="margin-bottom:10px !important">Reservation Dates</label>
                      <div class="ui two column centered grid">
                          <div class="column">
                              <div class="ui input fluid ">
                                  <input id="date_picker1" autocomplete="off" name="pick_up_date" placeholder="Start Date" type="text" @click="datepickers(car)" required>
                              </div>
                          </div>
                          <div class="column">
                              <div class="ui input fluid">
                                  <input id="date_picker2" name="return_date"placeholder="End Date"  autocomplete="off" required>
                              </div>
                          </div>
                      </div>
                    </div>

                    <div class="field" id="extra_kms" v-if="car.type == 'Tow Truck'">
                      <label style="margin-bottom:10px !important">Tow Truck kms i.e if distance above 30km</label>
                      <div class="ui input">
                        <input type="number" placeholder="Kilometres" v-model="tow_kms"></input>
                    </div>
                    </div>

                    <div class="field">
                      <label style="margin-bottom:10px !important">Choose currency</label>
                      <select class="ui fluid dropdown currency" id="currency" name="currency" required>
                        <option value="USD">USD</option>
                        <option value="Rand">Rand</option>
                        <option value="ZWL">ZWL</option>
                      </select>
                    </div>


                    <div class="field">
                      <label style="margin-bottom:10px !important">Payment Method</label>
                      <select class="ui fluid dropdown payment_method" name="payment_method" required>
                        <option value="Ecocash">Ecocash</option>
                        <option value="OneMoney">OneMoney</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>

                    <div class="field" id="mobile_money">
                      <label style="margin-bottom:10px !important">Phone Number</label>
                      <div class="ui input">
                        <input type="text" name="phone_number" placeholder="eg 0771234567" value=""></input>
                    </div>
                    </div>

                    <div class="field">
                      <label style="margin-top:10px !important">Summary</label>
                      <div class="ui divider"></div>
                      <div class="ui two column grid" style="margin-bottom:-2rem">
                        <div class="column ten wide">
                          <p>Daily Rate</p>
                        </div>
                        <div class="column six wide" style="text-align:end">
                        <p id="rate">{{this.$root.current_currency + this.$root.co_daily_rate}}</p>
                        </div>
                      </div>
                      <div class="ui two column grid">
                        <div class="column ten wide">
                          <p>Number of Days</p>
                        </div>
                        <div class="column six wide" style="text-align:end">
                          <p id="no_of_days">x  {{this.$root.num_days}} days</p>
                        </div>
                      </div>
                      <div class="ui divider"></div>
                      <div class="ui two column grid">
                          <div class="column ten wide">
                            <h4>Total Amount</h4>
                          </div>
                          <div class="column six wide" style="text-align:end">
                            <h4 id="total_price">{{this.$root.totalAmount}}</h4>
                          </div>
                      </div>
                    </div>

                    <input type="hidden" id="custId" name="car_id" :value='car.id'>

                    <input type="hidden" name="amount" :value='this.$root.total'>

                    <div class="ui divider"></div>

                    <div class="inline field">
                      <div class="ui checkbox">
                        <input type="checkbox" id="terms" required>
                        <label>I agree to the terms and conditions</label>
                      </div>
                    </div>

                    <div class="ui divider"></div>

                    <button type="submit" @click="submitTheForm()" class="ui compact button red large" id="submit_reservation" style="width:100%">Reserve</button>

                </form>
            </div>
        </div>

        <div class="ui  mini modal" id="loading_payment" style="height:200px" hidden>
          <div class="ui active dimmer">
            <div class="ui indeterminate text loader">Processing your reservation and payment...Please Wait</div>
          </div>
        </div>

      </main>

      
      <div class="ui inverted vertical footer segment" style="padding:25px 0;background:#800000;">
          <div class="ui container">
              <div class="ui stackable inverted divided equal height stackable grid">
                <div class="three wide column">
                    <h4 class="ui inverted header">About US</h4>
                    <div class="ui inverted link list">
                    <a href="#" class="item">ASAP Group Cars</a>
                    <a href="#" class="item">How it Works</a>
                    <a href="#" class="item">FAQ</a>

                    </div>
                </div>
                <div class="four wide column">
                  <h4 class="ui inverted header">Social Media</h4>
                    <div class="ui inverted link list">
                    <a href="#" class="item">Whatsapp</a>
                    <a href="#" class="item">Facebook</a>
                    <a href="#" class="item">Twitter</a>
                    <a href="#" class="item">Instagram</a>
                    </div>
                </div>

                <div class="four wide column">
                  <h4 class="ui inverted header">Visit Us</h4>
                    <div class="ui inverted link list">
                    <a href="#" class="item">
                      62 Palmer Rd<br/>
                      Milton Park<br/>
                      Harare</a>
                    </div>
                </div>

                <div class="four wide column">
                  <h4 class="ui inverted header">Contact Us</h4>
                    <div class="ui inverted link list">
                    <a href="#" class="item">Email us - sales@asapcars.com</a><br/>
                    <a href="#" class="item">Phone Number(s)<br/>
                      +263 773 123 299<br/>
                      +263 777 990 047</a>
                    </div>
                </div>

              </div>

          </div>
      </div>
      
    </div>

  </body>

  <script src="<?php echo e(asset('js/app.js')); ?>"></script>
  <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/semantic.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/Semantic-UI-Alert.js')); ?>"></script>

  <script>
    $(document).ready(function() {
        $('.ui.dropdown')
          .dropdown({on: 'click'
          })
        ;
      })
    ;
    $('.special.cards .image').dimmer({
      on: 'hover'
    });
    <?php if(session('status')): ?>
    $(document).ready(function() {
$.uiAlert({
textHead: 'cant connect to paynow server', // header
text: 'please check yor internet connection', // Text
bgcolor: '#FF0000', // background-color
textcolor: '#fff', // color
position: 'top-right',// position . top And bottom ||  left / center / right
icon: 'warning sign', // icon in semantic-UI
time: 3, // time
  })
});

    <?php endif; ?>
<?php if(session('reservation_status')): ?>
$(document).ready(function() {
$.uiAlert({
textHead: 'Vehicle is reserved in this period', // header
text: 'please choose another vehicle or period', // Text
bgcolor: '#FF0000', // background-color
textcolor: '#fff', // color
position: 'top-right',// position . top And bottom ||  left / center / right
icon: 'warning sign', // icon in semantic-UI
time: 3, // time
})
});

<?php endif; ?>
<?php if(session('vehicle_status')): ?>
$(document).ready(function() {
$.uiAlert({
textHead: 'Vehicle is already in sysytem', // header
text: 'If you didnt register your Vehicle please get in touch with us ', // Text
bgcolor: '#FF0000', // background-color
textcolor: '#fff', // color
position: 'top-right',// position . top And bottom ||  left / center / right
icon: 'warning sign', // icon in semantic-UI
time: 3, // time
})
});

<?php endif; ?>

    </script>

  <?php echo $__env->yieldContent('javascript'); ?>


</html>
<?php /**PATH /home/nya/Downloads/Compressed/copy-car-rental-master/resources/views/layouts/layout.blade.php ENDPATH**/ ?>