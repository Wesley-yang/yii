<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">首页</span><span class="logo-lg">' . '后台管理' . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?php $session = Yii::$app->session;echo $session['user']['username']?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/>
                            <p>
                                欢迎<?php $session = Yii::$app->session;echo $session['user']['username']?>来到管理后台
                                <small><?php echo date('Y-m-d', time())?></small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a(
                                    '修改密码',
                                    ['/auser/update-password'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    '退出',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
<script type="text/javascript" src="<?= Url::to('@web/comm/jquery-1.9.1.min.js') ?>"></script>
<!-- 提交提示处理框 -->
<div class="col-md-9" id="noticeBox" style="display: none;position:absolute;top: 0px;left: 0px;width:100%;height:100%;z-index: 10000000;opacity: 0.8">
    <div class="box box-danger" style="height: 100%;">
        <div class="box-header" style="height: 100%;">
            <h3 class="box-title">正在紧张处理请求中</h3>
        </div>
        <div class="box-body" style="height: 100%;">
            请耐心等候...
        </div><!-- /.box-body -->
        <!-- Loading (remove the following to stop the loading)-->
        <div class="overlay" style="height: 100%;">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
        <!-- end loading -->
    </div><!-- /.box -->
</div>
