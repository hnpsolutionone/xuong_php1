<section class="middle">
    <div class="container">
        <div class="container">
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0;
                        foreach ($_SESSION['cart'] as $id => $item): 
                        $total += $item['price']*$item['quantity'];
                        ?>
                            <tr>
                                <td>
                                    <img width="100" src="<?=$item['image']?>"
                                        class="img-fluid rounded" alt="Quần khaki nam dài. Slim cropped - 10F24PCA037" />
                                </td>
                                <td><?=$item['name']?></td>
                                <td>$<?=$item['price']?></td>
                                <td>
                                    <?=$item['quantity']?><button type="button" class="btn btn-sm btn-primary ms-3 me-1">
                                        <strong>-</strong></button><button type="button" class="btn btn-sm btn-primary">
                                        <strong>+</strong>
                                    </button>
                                </td>
                                <td>$<?=$item['price']*$item['quantity']?></td>
                                <td>
                                    <button class="btn btn-sm btn-danger btn-remove">
                                        <a href="<?=$baseUrl?>index.php?page=removeItemCart&id=<?=$id?>"><i class="fas fa-trash-alt"></i></a>
                                    </button>
                                </td>
                            </tr>
                            <?php
                        endforeach ?>
                    </tbody>
                </table>
                <div class="col-md-12">
                    <span class="float-end me-2"><strong>Total: $<?=$total?></strong></span>
                </div>
                <div class="col-md-2 mt-5 mb-5">
                    <a href="<?=$baseUrl?>index.php?page=product" class="btn btn-sm btn-primary float-start" href="/products">Tiếp tục mua hàng</a>
                </div>
                <div class="col-md-2 mt-5 mb-5">
                    <button class="btn btn-sm btn-success float-end me-2 d-block">
                        Đặt hàng
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>