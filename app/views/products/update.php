<?php
if($_SESSION['user']['role_id'] !== 1)
{
    header('location: /php_train/home');
}
$this->render('blocks/header');
$this->render('blocks/header_desktop');
$this->render('blocks/sidebar');
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="card">
                        <form action="/php_train/admin/cap-nhat-san-pham" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card-header">
                                <strong>Update Product</strong>
                            </div>
                            <div class="card-body card-block">

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Product ID</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="id" value="<?php
                                                                    if (!empty($data['product'])) {
                                                                        foreach ($data['product'] as $value) {
                                                                            echo $value['id'];
                                                                        }
                                                                    }
                                                                    ?>" type="text" id="text-input" placeholder="Text" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Product Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="product_name" value="<?php
                                                                    if (!empty($data['product'])) {
                                                                        foreach ($data['product'] as $value) {
                                                                            echo $value['product_name'];
                                                                        }
                                                                    }
                                                                    ?>" type="text" id="text-input" placeholder="Text" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Price</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="price" value="<?php
                                                                    if (!empty($data['product'])) {
                                                                        foreach ($data['product'] as $value) {
                                                                            echo $value['price'];
                                                                        }
                                                                    }
                                                                    ?>" type="text" id="text-input" placeholder="Text" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class=" form-control-label">Image</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="product_img" value="" type="file" id="file-input" class="form-control-file">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Detail</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="product_detail" value="<?php
                                                                    if (!empty($data['product'])) {
                                                                        foreach ($data['product'] as $value) {
                                                                            echo $value['product_detail'];
                                                                        }
                                                                    }
                                                                    ?>" type="text" id="text-input" placeholder="Text" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Category ID</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="category_id" id="select" class="form-control">
                                            <?php
                                            foreach ($data['category'] as $values) {
                                                echo "<option value=" . $values['id'] . ">"
                                                    . $values["category_name"] .
                                                    "</option>";
                                                echo "<br>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" name="update_prd" value="save">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>

<?php
$this->render('blocks/footer');

?>