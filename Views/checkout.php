<?php if (isset($_SESSION['userInfo'])): ?>
  <?php
  $total = 0;
  foreach ($_SESSION['cart'] as $id => $item) {
    $total += $item['price'] * $item['quantity'];
  }
  ?>
  <section class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-8 mb-4">
          <!-- Checkout -->
          <form action="<?= $baseUrl ?>index.php?page=payment" method="POST">
            <div class="card shadow-0 border">
              <div class="p-4">
                <h5 class="card-title mb-3">Thanh toán</h5>
                <div class="row">
                  <div class="col-6 mb-3">
                    <p class="mb-0">Họ tên</p>
                    <div class="form-outline">
                      <input type="text" name="receiver_name"
                        value="<?php echo isset($_SESSION['userInfo']['fullname']) ? $_SESSION['userInfo']['fullname'] : ''; ?>"
                        id="receiver_name" placeholder="Type here" class="form-control" />
                    </div>
                  </div>

                  <div class="col-6">
                    <p class="mb-0">Địa chỉ</p>
                    <div class="form-outline">
                      <input type="text" name="receiver_address"
                        value="<?php echo isset($_SESSION['userInfo']['address']) ? $_SESSION['userInfo']['address'] : ''; ?>"
                        id="receiver_address" placeholder="Type here" class="form-control" />
                    </div>
                  </div>

                  <div class="col-6 mb-3">
                    <p class="mb-0">Mobile</p>
                    <div class="form-outline">
                      <input type="tel" name="receiver_mobile"
                        value="<?php echo isset($_SESSION['userInfo']['mobile']) ? $_SESSION['userInfo']['mobile'] : ''; ?>"
                        id="typePhone" value="+48 " class="form-control" />
                    </div>
                  </div>

                  <div class="col-6 mb-3">
                    <p class="mb-0">Email</p>
                    <div class="form-outline">
                      <input type="email"
                        value="<?php echo isset($_SESSION['userInfo']['email']) ? $_SESSION['userInfo']['email'] : ''; ?>"
                        id="typeEmail" placeholder="example@gmail.com" class="form-control" />
                    </div>
                  </div>
                </div>

                <hr class="my-4" />

                <h5 class="card-title mb-3">Phương thức thanh toán</h5>

                <div class="row mb-3">
                  <div class="col-lg-4 mb-3">
                    <!-- Default checked radio -->
                    <div class="form-check">
                      <div class="p-3">
                        <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault1"
                          value="CASH" />
                        <label class="form-check-label" for="flexRadioDefault1">
                          CASH
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <!-- Default radio -->
                    <div class="form-check">
                      <div class="p-3">
                        <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault2"
                          value="VNPay" checked />
                        <label class="form-check-label" for="flexRadioDefault2">
                          VNPay
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <!-- Default radio -->
                    <div class="form-check">
                      <div class="p-3">
                        <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault3"
                          value="Paypal" />
                        <label class="form-check-label" for="flexRadioDefault3">
                          Paypal
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="float-end">
                  <input type="hidden" name="total_price" value="<?= $total ?>">
                  <button class="btn btn-light border">Hủy</button>
                  <button type="submit" class="btn btn-success shadow-0 border">Thanh toán</button>
                </div>
              </div>
            </div>
          </form>
          <!-- Checkout -->
        </div>
        <div class="col-xl-4 col-lg-4 d-flex justify-content-center justify-content-lg-end">
          <div class="ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
            <h6 class="mb-3">Tóm tắt</h6>
            <div class="d-flex justify-content-between">
              <p class="mb-2">Tổng giá:</p>
              <p class="mb-2">$
                <?php
                echo $total;
                ?>
              </p>
            </div>
            <div class="d-flex justify-content-between">
              <p class="mb-2">Giảm giá:</p>
              <p class="mb-2 text-danger">- $0.00</p>
            </div>
            <div class="d-flex justify-content-between">
              <p class="mb-2">Phí giao hàng:</p>
              <p class="mb-2">+ $0.00</p>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
              <p class="mb-2">Tổng:</p>
              <p class="mb-2 fw-bold">$<?= $total ?></p>
            </div>

            <div class="input-group mt-3 mb-4">
              <input type="text" class="form-control border" name="" placeholder="Promo code" />
              <button class="btn btn-light text-primary border">Apply</button>
            </div>

            <hr />
            <h6 class="text-dark my-4">Chi tiết giỏ hàng</h6>

            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $item):
              $total += $item['price'] * $item['quantity'];
              ?>
              <div class="d-flex align-items-center mb-4">
                <div class="me-3 position-relative">
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                    1
                  </span>
                  <img src="<?= $item['image'] ?>" style="height: 96px; width: 96x;" class="img-sm rounded border" />
                </div>
                <div class="">
                  <a href="#" class="nav-link"><?= $item['name'] ?>
                  </a>
                  <div class="price text-muted">Total: $<?= $item['price'] ?></div>
                </div>
              </div>
              <?php
            endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php else: ?>
  <section class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-8 mb-4">
          Bạn cần phải đang nhập để thanh toán
        </div>
      </div>
    </div>
  </section>
<?php endif ?>