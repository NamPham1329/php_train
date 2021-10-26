<?php
$this->render('blocks/header');
$this->render('blocks/header_desktop');
$this->render($content, $sub_content);
$this->render('blocks/sidebar');
echo '<pre>';
print_r($data);
echo '<pre>';
$this->render('blocks/footer');
?>
