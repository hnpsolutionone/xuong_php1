<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Product</strong> Edit
                    </div>
                    <div class="card-body card-block">
                        <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input"
                                        class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="Tên" name="name" value="" id="name"
                                        placeholder="Name" class="form-control" required><small
                                        class="form-text text-muted">Tên không được phép rỗng</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Danh
                                        mục</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="2">Thời trang Nữ</option>
                                        <option value="3">Thời trang Name</option>
                                        <option value="4">Thời trang Trẻ em</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input"
                                        class=" form-control-label">Image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="image" value="" id="image"
                                        placeholder="Hình ảnh" class="form-control" required><small
                                        class="form-text text-muted">Hình ảnh không được phép rỗng</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input"
                                        class=" form-control-label">Price</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="price" value="" id="price"
                                        placeholder="Giá" class="form-control" required><small
                                        class="form-text text-muted">Giá không được phép rỗng</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Sale
                                        price</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="sale_price" value=""
                                        id="sale_price" placeholder="Giá giảm" class="form-control" required><small
                                        class="form-text text-muted">Giá giảm không được phép rỗng</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input"
                                        class=" form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="description" value=""
                                        id="description" placeholder="Mô tả" class="form-control" required><small
                                        class="form-text text-muted">Mô tả không được phép rỗng</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input"
                                        class=" form-control-label">Quantity</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="quantity" value="" id="quantity"
                                        placeholder="Số lượng" class="form-control" required><small
                                        class="form-text text-muted">Số lượng không được phép rỗng</small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>