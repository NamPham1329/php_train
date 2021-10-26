<?php
if ($_SESSION['user']['role_id'] !== 1) {
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
                        <form action="<?php echo _WEB_ROOT ?>/product/postProduct" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card-header">
                                <strong>New Product</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Product Name</label>
                                    </div>
                                    <div class="col-12 col-md-9" style="color: red">
                                        <input name="product_name" value="" type="text" id="text-input" placeholder="Text" class="form-control">
                                        <?php
                                        if (isset($data['errors']['product_name'])) {
                                            foreach ($data['errors']['product_name'] as $key => $value) {
                                                echo '* '.$value;
                                                echo '<br>';
                                            }
                                        }
                                        ?>
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Price</label>
                                    </div>
                                    <div class="col-12 col-md-9" style="color: red">
                                        <input name="price" value="" type="text" id="text-input" placeholder="Text" class="form-control">
                                        <?php
                                        if (isset($data['errors']['price'])) {
                                            foreach ($data['errors']['price'] as $key => $value) {
                                                echo '* '.$value;
                                                echo '<br>';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class=" form-control-label">Image</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="image" value="" type="file" id="file-input" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Detail</label>
                                    </div>
                                    <div class="col-12 col-md-9" style="color: red">
                                        <input name="product_detail" value="" type="text" id="text-input" placeholder="Text" class="form-control">
                                        <?php
                                        if (isset($data['errors']['product_detail'])) {
                                            foreach ($data['errors']['product_detail'] as $key => $value) {
                                                echo '* '.$value;
                                                echo '<br>';
                                            }
                                        }
                                        ?>
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
                                <button type="submit" class="btn btn-primary btn-sm" name="add_prd" value="save">
                                    <i class="fa fa-dot-circle-o"></i>Save
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
if(isset($this->data['alert'])){
    echo $this->data['alert'];
}
$this->render('blocks/footer');

?>