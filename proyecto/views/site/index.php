<?php

/* @var $this yii\web\View */

$this->title = 'Principal';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Bienvenido</h1>

        <p class="lead"><?php echo Yii::$app->session->get('userRol'); ?></p>

    </div>

    <div class="body-content">

        <div class="row">

            <div class="col-lg-2">
            </div>

            <div class="col-lg-4">
                <h2>Bienvenido</h2>

                <p>Plataforma educativa de prueba</p>

                <p><a class="btn btn-outline-secondary" href="#">Algún link... &raquo;</a></p>
            </div>

        </div>

    </div>
</div>