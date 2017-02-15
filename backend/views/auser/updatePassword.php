<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = '修改密码';
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
                            <label for="">原密码 * </label>
                            <input class="form-control" type="text" name="" id="oldPass" placeholder="原密码" >
                        </div>
                        <div class="form-group">
                            <label for="">新密码  * </label>
                            <input class="form-control" type="text" name="" id="newPass" placeholder="新密码">
                        </div>
                        <div class="form-group">
                            <label for="">确认新密码  * </label>
                            <input class="form-control" type="text" name="" id="newPass2" placeholder="确认新密码">
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
        params.oldPass = $("#oldPass").val();
        params.newPass = $("#newPass").val();
        params.newPass2 = $("#newPass2").val();
        if (params.oldPass =='') {
            alert('请填写旧密码');return;
        }
        if (params.newPass =='') {
            alert('请填写新密码');return;
        }
        if (params.newPass != params.newPass2 ) {
            alert('两次密码不一致');return;
        }

        $.post('/auser/do-update-password', params, function(res) {
            if (res.code == 100200) {
                alert(res.msg);
                location.href = '/site/index';
            } else {
                alert(res.msg);
            }
        }, 'json');
    }
</script>