
<!-- main content -->
  <div class=breadcrumbs>
    <div class=container>
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">
          <div class=breadcrumbs-content>
            <h1 class=page-title>Login</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <ul class=breadcrumb-nav>
            <li><a href=index-2.html><i class="lni lni-home"></i> Home</a></li>
            <li>Login</li>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <div class="account-login section">
    <div class=container>
      <div class=row>
        <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
          <form class="card login-form" method="post" action="<?= base_url('Home/CheckLogin')?>">
            <div class=card-body>
              <div class=title>
                <h3>Login Now</h3>
                <!-- <p>You can login using your social media account or email address.</p> -->
              </div>
              <!-- <div class=social-login>
                <div class=row>
                  <div class="col-lg-4 col-md-4 col-12"><a class="btn facebook-btn" href="javascript:void(0)"><i
                        class="lni lni-facebook-filled"></i> Facebook
                      login</a></div>
                  <div class="col-lg-4 col-md-4 col-12"><a class="btn twitter-btn" href="javascript:void(0)"><i
                        class="lni lni-twitter-original"></i> Twitter
                      login</a></div>
                  <div class="col-lg-4 col-md-4 col-12"><a class="btn google-btn" href="javascript:void(0)"><i
                        class="lni lni-google"></i> Google login</a>
                  </div>
                </div>
              </div> -->
              <!-- <div class=alt-option>
                <span>Or</span>
              </div> -->
              <div class="form-group input-group hide">
                <label for=reg-fn>Mobile No.</label>
                <input class=form-control type="text" id=reg-email name="email" required>
              </div>
              <div class="button hide" >
                <button class=btn type=button onclick="send_otp()">Send Otp</button>
              </div>
              <div class="form-group input-group show" style="display:none">
                <label for=reg-fn>Enter Otp</label>
                <input class=form-control type=text id=reg-pass name="password" required>
              </div>
              <div class="button show" style="display:none">
                <button class=btn type="button" onclick="verify_otp()">Verify Otp</button>
              </div>
              <p class=outer-link>Don't have an account? <a href=register.html>Register here </a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
  <script>

function send_otp() {
  var mobile=$('#reg-email').val()
  if(mobile!=''){
    jQuery.ajax({
    type: 'POST',
    data: {
      mobile
    },
    url: '<?= base_url('Home/SendOtp') ?>',
    dataType: 'json',
    beforeSend: function () {
    },
    success: function (data) {
       if(data==true){
        alert('Otp send Successfully')
        $('.show').show();
        $('.hide').hide();
       }else{
        alert('Something went wrong')
       }
    },
    error: function (e) {
    },
  });
  }else{
    alert('Please Enter Mobile No.')
  }
  
}


function verify_otp() {
  var otp=$('#reg-pass').val()
  var mobile=$('#reg-email').val()
  if(otp!=''){
    jQuery.ajax({
    type: 'POST',
    data: {
      otp,mobile
    },
    url: '<?= base_url('Home/VerifyOtp') ?>',
    // dataType: 'json',
    beforeSend: function () {
    },
    success: function (data) {
       if(data==true){
        alert('Otp vrified Successfully');
        window.location.href = "<?= base_url('Home') ?>";
       }else{
        alert('Otp not matched')
       }
    },
    error: function (e) {
    },
  });
  }else{
    alert('Please Enter Mobile No.')
  }
  
}
  </script>