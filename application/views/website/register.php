
<!-- main content start -->

  <div class=breadcrumbs>
    <div class=container>
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">
          <div class=breadcrumbs-content>
            <h1 class=page-title>Registration</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <ul class=breadcrumb-nav>
            <li><a href=index-2.html><i class="lni lni-home"></i> Home</a></li>
            <li>Registration</li>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <div class="account-login section">
    <div class=container>
      <div class=row>
        <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
          <div class=register-form>
            <div class=title>
              <h3>No Account? Register</h3>
              <p>Registration takes less than a minute but gives you full control over your orders.</p>
            </div>
            <form class=row method="post" action="<?= base_url('Home/UserRegistration')?>">
              <div class=col-sm-6>
                <div class=form-group>
                  <label for=reg-fn>First Name <span>*</span></label>
                  <input class=form-control type=text id=reg-fn name="fname" required>
                </div>
              </div>
              <div class=col-sm-6>
                <div class=form-group>
                  <label for=reg-ln>Last Name <span>*</span></label>
                  <input class=form-control type=text id=reg-ln name="lname" required>
                </div>
              </div>
              <div class=col-sm-6>
                <div class=form-group>
                  <label for=reg-email>E-mail Address <span>*</span></label>
                  <input class=form-control type=email id=reg-email name="email">
                </div>
              </div>
              <div class=col-sm-6>
                <div class=form-group>
                  <label for=reg-phone>Phone Number <span>*</span></label>
                  <input class=form-control type=text id=reg-phone name="phone_no" required>
                </div>
              </div>
              <!-- <div class=col-sm-6>
                <div class=form-group>
                  <label for=reg-pass>Password</label>
                  <input class=form-control type=password id=reg-pass name="password" required>
                </div>
              </div> -->
              <!-- <div class=col-sm-6>
                <div class=form-group>
                  <label for=reg-pass-confirm>Confirm Password</label>
                  <input class=form-control type=password id=reg-pass-confirm  required>
                </div>
              </div> -->
              <div class=button>
                <button class="btn" type="button" onclick="Registration()">Register</button>
              </div>
              <p class=outer-link>Already have an account? <a href=<?= base_url('Home/Login')?>>Login Now</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- main content end  -->
<script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
  <script>

function Registration() {
  var fname=$('#reg-fn').val()
  var lname=$('#reg-ln').val()
  var email=$('#reg-email').val()
  var phone_no=$('#reg-phone').val()
  if(phone_no!='' && fname!=''&& lname!=''&& email!=''){
    jQuery.ajax({
    type: 'POST',
    data: {
      phone_no,
      fname,
      lname,
      email
    },
    url: '<?= base_url('Home/UserRegistration') ?>',
    dataType: 'json',
    beforeSend: function () {
    },
    success: function (data) {
       if(data.result==true){
        alert('Registration Successfully')
        window.location.href = "<?= base_url('Home/Login') ?>";
       }else if(data.result==4){
        alert('Mobile Already Exists');
       }else{
        alert('Something went wrong')
       }
    },
    error: function (e) {
    },
  });
  }else{
    alert('Please Enter Requird fields')
  }
  
}
</script>
 