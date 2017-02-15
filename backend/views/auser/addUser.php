<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = '新增用户';
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">用户名 * </label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="用户名" >
                        </div>
                        <div class="form-group">
                            <label for="">密码  * </label>
                            <input class="form-control" type="text" name="password_hash" id="password_hash" placeholder="密码">
                        </div>
                        <div class="form-group">
                            <label for="">邮箱  * </label>
                            <input class="form-control" type="text" name="email" id="email" placeholder="邮箱">
                        </div>
                        
                    <div class="box-footer">
                        <button type="button" class="btn btn-primary" onclick="addUser();">提交</button>
                    </div>
                    <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                </form>
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
<script>
    function addUser() {
        var params = {};
        params._csrf = $("#_csrf").val();
        params.username = $("#username").val();
        params.password_hash = $("#password_hash").val();
        params.email = $("#email").val();
        if (params.username =='') {
            alert('请填写用户名');return;
        }
        if (params.password_hash =='') {
            alert('请填写密码');return;
        }
        if (params.email =='') {
            alert('请填写邮箱');return;
        }

        $.post('/auser/do-add-user', params, function(res) {
            if (res.code == 100200) {
                alert(res.msg);
                location.href = '/auser/index';
            } else {
                alert(res.msg);
            }
        }, 'json');
    }
</script>