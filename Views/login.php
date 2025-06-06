<section class="middle">
  <div class="container">
    <div class="row align-items-start justify-content-between">

      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?=htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <form action="<?=$baseUrl?>index.php?page=login" method="POST">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="id">Tên đăng nhập</label>
                <input type="text" name="username" id="id"
                formControlName="name"
                class="form-control" placeholder="Input any Username" aria-describedby="idHelpId" required>
                <!--<small id="idHelpId" class="text-muted">Username is required</small>-->
              </div>
              <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="name"
                formControlName="password"
                class="form-control" placeholder="Input any password" aria-describedby="nameHelpId" required>
                <!--<small id="nameHelpId" class="text-muted">Password is required and at least 6 characters</small>-->
              </div>
              <div class="form-group">
                <button class="btn btn-primary">Login</button>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mfliud">
        <?php if (!empty($errorReg)): ?>
            <div class="alert alert-danger" role="alert">
                <?=htmlspecialchars($errorReg) ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
            <div class="alert alert-success" role="alert">
                <?=htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>
        <form  action="<?=$baseUrl?>index.php?page=register" method="POST" class="border p-3 rounded">
          <div class="row">
            <div class="form-group col-md-12">
              <label>Tên đăng nhập</label>
              <input type="text" name="username" class="form-control" formControlName="name" placeholder="Vd: Nguyễn Lê Phương" required>
              <!--<div>
                <div class="text-danger">Tên đăng nhâp tối thiểu 6 ký tự.</div>
              </div>-->
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              <label>Họ Và Tên</label>
              <input type="text" name="fullname" class="form-control" formControlName="fullname" placeholder="Vd: Nguyễn Lê Phương" required>
              <!--<div>
                <div class="text-danger">Họ Và Tên không được chứa từ 'ma tuý' hoặc 'hàng trắng'.</div>
              </div>-->
            </div>
          </div>

          <div class="form-group">
            <label>Email *</label>
            <input type="text" name="email" class="form-control" formControlName="email" placeholder="name@email.com*" required>
            <!--<div>
              <div class="text-danger alert-dismissible fade show" role="alert">
                <strong>Email </strong> không hợp lệ
              </div>
            </div>-->
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <label>Mật khẩu *</label>
              <input type="password" name="password" class="form-control" formControlName="password" placeholder="Password*" required>
              <!--<div>
                <div class="text-danger">Mật khẩu tối thiểu 6 ký tự.</div>
              </div>-->
            </div>

            <div class="form-group col-md-6">
              <label>Nhập lại mật khẩu *</label>
              <input type="password" name="rePassword" class="form-control" formControlName="rePassword" placeholder="Confirm Password*" required>
            </div>

          </div>
          <!--
          <div>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Mật khẩu không khớp.
            </div>
          </div>
-->
          <div class="form-group">
            <button type="submit" class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Tạo tài
              khoản</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</section>