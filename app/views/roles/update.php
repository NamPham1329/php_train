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
                    <div class="card">
                        <div class="card-header">
                            <strong>
                                <h3 class="title-5 m-b-35">update role</h3>
                            </strong>
                        </div>
                        <form action="/php_train/admin/save-role" method="post" class="form-horizontal">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-sm-6">
                                        <label for="id" class=" form-control-label">Role ID:</label>
                                        <input name="id" value="<?php
                                                                if (!empty($data)) {
                                                                    foreach ($data as $values) {
                                                                        echo $values['id'];
                                                                    }
                                                                }
                                                                ?>" type="text" id="input-large" class="input-lg form-control-lg form-control" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-sm-6">
                                        <label for="role_name" class=" form-control-label">Role Name:</label>
                                        <input name="role_name" value="<?php
                                                                        if (!empty($data)) {
                                                                            foreach ($data as $values) {
                                                                                echo $values['role_name'];
                                                                            }
                                                                        }
                                                                        ?>" type="text" id="input-large" name="input-large" placeholder="Enter name role" class="input-lg form-control-lg form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button name="update" value="update" type="submit" class="btn btn-primary btn-sm">
                                    SAVE
                                </button>
                            </div>
                        </form>
                    </div>
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