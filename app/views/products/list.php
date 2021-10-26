<?php
if($_SESSION['user']['role_id'] !== 1)
{
    header('location: /php_train/home');
}
$this->render('blocks/header');
$this->render('blocks/header_desktop');
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">product</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right" style="position: absolute; right: 2%;">
                            <a href="/php_train/admin/them-sp">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add item
                                </button></a>
                        </div>
                    </div>
                    
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>image</th>
                                    <th>description</th>
                                    <th>category</th>
                                    <th>price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $path = './public/asset/admin/upload/';
                                foreach($data as $values)
                                {
                                ?>
                                <tr class="tr-shadow">
                                <td><?php echo $values['product_name'] ?></td>
                                    <td>
                                        <img src="<?php echo $path.$values['product_img']?>" style="max-width: 100px;">
                                    </td>
                                    <td class="desc"> <?php echo $values['product_detail'] ?></>
                                    <td><?php echo $values['category_name'] ?></td>
                                    <td><?php echo $values['price'] ?></td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="/php_train/admin/cap-nhat-sp/id-<?php echo $values['id'];?>.html" style="margin-right: 5px;">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </a>

                                            <form method="post" action="/php_train/admin/xoa-sp" style="margin-right: 5px;">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" type="submit" name="delete" value="<?php echo $values['id']; ?>">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
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
$this->render('blocks/sidebar');
$this->render('blocks/footer');
?>