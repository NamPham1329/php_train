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
                                <h3 class="title-5 m-b-35">account</h3>
                                
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>user id</th>
                                                <th>user name</th>
                                                <th>role</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($data))
                                            {
                                                foreach($data as $values){
                                            ?>
                                            <tr class="tr-shadow">
                                                <td><?php echo $values['id']?></td>
                                                <td><?php echo $values['username']?></td>
                                                <td><?php echo $values['role_name']?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="/php_train/admin/update-account/id-<?php echo $values['id'];?>.html" style="margin-right: 5px;">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>
                                                        <form method="POST" action="/php_train/admin/delete-account" style="margin-right: 5px;">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" type="submit" name="delete" value="<?php echo $values['id'];?>">
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
<?php
$this->render('blocks/footer');

?>