    <?php
    if($_SESSION['user']['role_id'] !== 1)
    {
        header('location: /php_train/home');
    }
    $this->render('blocks/header');
    $this->render('blocks/header_desktop');
    $this->render('blocks/sidebar');
    ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong><h3 class="title-5 m-b-35">new category</h3></strong>
                                        </div>
                                        <form action="<?php echo _WEB_ROOT?>/category/post_category" method="post" class="form-horizontal">
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-sm-6">
                                                    <input name="category_name" type="text" id="input-large" name="input-large" placeholder="Enter name category" class="input-lg form-control-lg form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button name="create" value="create" type="submit" class="btn btn-primary btn-sm">
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