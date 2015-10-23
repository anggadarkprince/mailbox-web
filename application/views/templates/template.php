<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
    <?php $this->load->view('templates/header'); ?>
    <?php $this->load->view('pages/'.$page); ?>
    <?php $this->load->view('templates/footer'); ?>
</body>
</html>