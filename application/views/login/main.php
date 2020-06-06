<?php  

$username = array(
    'name'  => 'username',
    'id'    => 'username',
    'value' => set_value('username'),
    'class' => 'form-control',
    'placeholder'   => 'Username'
);

$password = array(
    'name'  => 'password',
    'id'    => 'password',
    'value' => set_value('password'),
    'class' => 'form-control',
    'placeholder'   => 'Password',
    'type'  => 'password'
)
?>

<div class="login-box">
  <div class="login-logo">
    <b>Mạng xã hội
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Đăng nhập vào MXH</p>

      <form action="<?=site_url('login/index')?>" method="post">
        <div class="input-group mb-3">
          <?=form_input($username)?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          
        </div>
        <div class="input-group mb-3">
          <?=form_input($password)?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <?php if(isset($error_msg)):?>
                <span class="error text-danger"><?=$error_msg?></span>
            <?php else:?>
            <?=form_error('username', '<span class="error text-danger">', '</span>')?>
            <?=form_error('password', '<span class="error text-danger">', '</span>')?>
            <?php endif?>
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-6"></div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
            </div>
        </div>
      </form>

      <p class="mb-0">
        <a href="<?=site_url('login/register')?>" class="text-center">Đăng ký thành viên</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
