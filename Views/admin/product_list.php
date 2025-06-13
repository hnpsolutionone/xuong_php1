<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Product List</strong> | <a href="<?=$baseUrl?>admin.php?page=create_product">Create product</a>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Avatar</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(count($products)>0) {
                                foreach($products as $product) {
                                ?>
                                <tr>
                                    <td class="serial">1.</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src=<?=$product['image']?>
                                                    alt=""></a>
                                        </div>
                                    </td>
                                    <td> #5469 </td>
                                    <td> <span class="name"><?=$product['name']?></span> </td>
                                    <td> <span class="product"><?=$product['price']?></span> </td>
                                    <td><span class="count"><?=$product['quantity']?></span></td>
                                    <td>
                                        <span class="badge badge-complete"><a href="<?=$baseUrl?>admin.php?page=product_edit&id=<?=$product['id']?>">Edit</a></span>
                                        <span class="badge badge-pending"><a href="<?=$baseUrl?>admin.php?page=delete&id=<?=$product['id']?>">Delete</a></span>
                                    </td>
                                </tr>
                                <?php
                                }
                            }
                                ?>
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>