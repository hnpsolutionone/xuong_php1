<section class="middle">
  <div class="container">
    <div class="row">

      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="row">
          <div class="col-12"><a href="" data-lightbox="roadtrip" class="d-block mb-4">
            <img src="<?=$product['image']?>" class="img-fluid rounded" alt="" /></a></div>
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="brd_crumbs mb-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Library</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
          </nav>
        </div>

        <div class="prt_01 mb-1 d-flex align-items-center justify-content-between">
          <!-- <div class="flex-1"><span class="text-muted ft-medium">Up to 50% Off</span></div> -->
          <!-- <div class=""><span class="bg-danger text-light rounded py-1 px-2">Up to 50% Off</span></div> -->
        </div>
        <div class="prt_02 mb-3">
          <h2 class="ft-bold mb-1"><?=$product['name']?></h2>
          <div class="text-left">
            <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
              <i class="fas fa-star filled"></i>
              <i class="fas fa-star filled"></i>
              <i class="fas fa-star filled"></i>
              <i class="fas fa-star filled"></i>
              <i class="fas fa-star"></i>
              <!-- <span class="small">(412 Reviews)</span> -->
            </div>
            <div class="elis_rty">
              <span class="ft-medium text-muted line-through fs-md mr-2">$<?=$product['price']?></span>
              <span class="ft-bold theme-cl fs-lg mr-2">$<?=$product['price']?></span><span
                class="ft-regular text-light bg-success py-1 px-2 fs-sm">In Stock</span>
            </div>
          </div>
        </div>

        <div class="prt_03 mb-4">
          <p><?=$product['description']?></p>
        </div>

        <div class="short_products_info_body mb-4">



          <!-- Single Option -->
          <div class="single_search_boxed">
            <div class="widget-boxed-header">
              <h4><a href="#choosesize" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button"><i
                    class="ti-view-list mr-2"></i>Select Sizes</a></h4>
            </div>
            <div class="widget-boxed-body collapse" id="choosesize" data-parent="#choosesize">
              <div class="card-body pt-0 side-list no-border">
                <!-- Choose Size -->
                <div class="text-left pb-0 pt-2">
                  <div class="form-check size-option form-option form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size" id="28" checked="">
                    <label class="form-option-label" for="28">28</label>
                  </div>
                  <div class="form-check form-option size-option  form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size" id="30">
                    <label class="form-option-label" for="30">30</label>
                  </div>
                  <div class="form-check form-option size-option  form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size" id="32">
                    <label class="form-option-label" for="32">32</label>
                  </div>
                  <div class="form-check form-option size-option  form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size" id="34">
                    <label class="form-option-label" for="34">34</label>
                  </div>
                  <div class="form-check form-option size-option  form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size" id="36">
                    <label class="form-option-label" for="36">36</label>
                  </div>
                  <div class="form-check form-option size-option  form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size" id="38">
                    <label class="form-option-label" for="38">38</label>
                  </div>
                  <div class="form-check form-option size-option  form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size" id="40">
                    <label class="form-option-label" for="40">40</label>
                  </div>
                  <div class="form-check form-option size-option  form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size" id="42">
                    <label class="form-option-label" for="42">42</label>
                  </div>
                  <div class="form-check form-option size-option  form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size" id="44">
                    <label class="form-option-label" for="44">44</label>
                  </div>
                  <div class="form-check form-option size-option  form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size" id="46">
                    <label class="form-option-label" for="46">46</label>
                  </div>
                  <div class="form-check form-option size-option  form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size" id="48">
                    <label class="form-option-label" for="48">48</label>
                  </div>
                  <div class="form-check form-option size-option  form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size" id="50">
                    <label class="form-option-label" for="50">50</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="prt_05 mb-4">
          <form action="<?=$baseUrl?>index.php?page=cart" method="POST">
          <div class="form-row mb-7">
            <div class="col-12 col-lg-auto">
              <!-- Quantity -->
              <select name="quantity" class="mb-2 custom-select">
                <option value="1" selected="">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
            <div class="col-12 col-lg">
              <input type="hidden" name="image" value="<?=$product['image']?>">
              <input type="hidden" name="name" value="<?=$product['name']?>">
              <input type="hidden" name="price" value="<?=$product['price']?>">
              <input type="hidden" name="id" value="<?=$product['id']?>">
              <!-- Submit -->
              <button type="submit" name="addToCart" value="addToCart" class="btn btn-block custom-height bg-dark mb-2">
                <i class="lni lni-shopping-basket mr-2"></i>Add to Cart
              </button>
            </div>
            <div class="col-12 col-lg-auto">
              <!-- Wishlist -->
              <button class="btn custom-height btn-default btn-block mb-2 text-dark" data-toggle="button">
                <i class="lni lni-heart mr-2"></i>Wishlist
              </button>
            </div>
          </div>
          </form>
        </div>

        <div class="prt_06">
          <p class="mb-0 d-flex align-items-center">
            <span class="mr-4">Share:</span>
            <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2"
              href="#!">
              <i class="fab fa-twitter position-absolute"></i>
            </a>
            <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2"
              href="#!">
              <i class="fab fa-facebook-f position-absolute"></i>
            </a>
            <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted"
              href="#!">
              <i class="fab fa-pinterest-p position-absolute"></i>
            </a>
          </p>
        </div>

      </div>
    </div>
  </div>
</section>