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
);

$name = array(
    'name'  => 'name',
    'id'    => 'name',
    'value' => set_value('name'),
    'class' => 'form-control',
    'placeholder'   => 'Tên tài khoản'
);

$birthday = array(
    'name'  => 'birthday',
    'id'    => 'birthday',
    'value' => set_value('birthday'),
    'class' => 'form-control',
    'placeholder'   => 'Ngày sinh'
);
?>

<div class="login-box">
    <div class="login-logo">
        <b>Đăng ký tài khoản
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Thông tin tài khoản</p>

            <form action="<?=site_url('login/register')?>" method="post">
                <div class="input-group mb-3">
                    <?=form_input($name)?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

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

                <div class="input-group mb-3">
                    <?=form_input($birthday)?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-calendar-day"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <?php if(isset($error_msg)):?>
                            <span class="error text-danger"><?=$error_msg?></span>
                        <?php else:?>
                        <?=form_error('username', '<span class="error text-danger">', '</span><br>')?>
                        <?=form_error('password', '<span class="error text-danger">', '</span><br>')?>
                        <?php endif?>

                        <?php if(isset($success_msg)):?>
                            <span class="success text-success"><?=$success_msg?><br><a href="<?=site_url('login/index')?>">Tới đăng nhập</a></span>
                        <?php endif?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
