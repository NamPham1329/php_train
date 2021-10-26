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
                                <h3 class="title-5 m-b-35">category</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right" style="position: absolute; right: 2%;">
                                        <a href="/php_train/admin/them-danh-muc-sp">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item
                                        </button></a>   
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <?php
                                            
                                            ?>
                                            <tr>
                                                <th>id</th>
                                                <th>category name</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($data))
                                            {
                                                foreach($data['category'] as $values){
                                                    
                                            ?>
                                            <tr class="tr-shadow">
                                                <td><?php echo $values['id']?></td>
                                                <td><?php echo $values['category_name']?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="/php_train/admin/cap-nhat-danh-muc/id-<?php echo $values['id'];?>.html" style="margin-right: 5px;">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>
                                                        <form method="post" action="/php_train/admin/xoa-danh-muc" style="margin-right: 5px;">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" type="submit" name="delete" value="<?php echo $values['id']; ?>">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>

                                            </tr>
                                            <?php } }?>
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
$this->render('blocks/footer');

?>