<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = '微信设置';
?>
<link rel="stylesheet" href="<?= Url::to('@web/third/validform/validform.css') ?>" type="text/css" media="all" />
<script type="text/javascript" src="<?= Url::to('@web/third/validform/Validform_v5.3.2_min.js') ?>"></script>
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
                <form role="form" action="" method="post" class="registerform">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">微信帐号 * </label>
                            <input class="form-control" type="text" name="account" placeholder="微信帐号" datatype="s2-30" nullmsg="请输入微信账号！" errormsg="微信账号为2-30个字符！">
                            <div class="Validform_checktip">为2-30位字符，中文字符算两个字符</div>
                        </div>
                        <div class="form-group">
                            <label for="">原始ID  * </label>
                            <input class="form-control" type="text" name="original" placeholder="原始ID" datatype="s2-30" nullmsg="请输入原始ID！" errormsg="原始ID为2-30个字符！">
                            <div class="Validform_checktip">2-30位字符，中文字符算两个字符</div>
                        </div>
                        <div class="form-group">
                            <label for="">微信appid  * </label>
                            <input class="form-control" type="text" name="appId" placeholder="微信appid" datatype="s2-30" nullmsg="请输入微信appid！" errormsg="微信appid为2-30个字符！">
                            <div class="Validform_checktip">为2-30位字符，中文字符算两个字符</div>
                        </div>
                        <div class="form-group">
                            <label for="">微信appSecret  * </label>
                            <input class="form-control" type="text" name="appSecret" placeholder="微信appSecret" datatype="s2-30" nullmsg="请输入微信appSecret！" errormsg="微信appSecret为2-30个字符！">
                            <div class="Validform_checktip">为2-30位字符，中文字符算两个字符</div>
                        </div>
                        <div class="form-group">
                            <label for="">微信公众平台登录名</label>
                            <input class="form-control" type="text" name="username" placeholder="微信公众平台登录名" ignore="ignore" datatype="s2-30" nullmsg="请输入微信公众平台登录名！" errormsg="微信公众平台登录名为2-30个字符！">
                            <div class="Validform_checktip">为2-30位字符，中文字符算两个字符</div>
                        </div>
                        <div class="form-group">
                            <label for="">微信公众平台登录密码 </label>
                            <input class="form-control" type="password" name="password" placeholder="微信公众平台登录密码" ignore="ignore" datatype="s2-30" nullmsg="请输入微信公众平台登录密码！" errormsg="微信公众平台登录密码为2-30个字符！">
                            <div class="Validform_checktip">为2-30位字符，中文字符算两个字符</div>
                        </div>
                        <div class="form-group">
                            <label for="">公众号名称</label>
                            <input class="form-control" type="text" name="name" placeholder="公众号名称" ignore="ignore" datatype="s2-30" nullmsg="请输入原始ID公众号名称" errormsg="公众号名称为2-30个字符！">
                            <div class="Validform_checktip">为2-30位字符，中文字符算两个字符</div>
                        </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button type="button" class="btn btn-primary" onclick="add();">提交</button>
                    </div>
                    <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                </form>
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
<!--alert弹框-->
<script src="<?= Url::to('@web/third/layer/layer.js') ?>"></script>
<script src="<?= Url::to('@web/comm/comm.js') ?>"></script>
<script type="text/javascript">
    $(".registerform").Validform({
        tiptype:function(msg,o,cssctl){
            //msg：提示信息;
            //o:{obj:*,type:*,curform:*}, obj指向的是当前验证的表单元素（或表单对象），type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, curform为当前form对象;
            //cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;
            if(!o.obj.is("form")){//验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
                var objtip=o.obj.siblings(".Validform_checktip");
                cssctl(objtip,o.type);
                objtip.text(msg);
            }else{
                var objtip=o.obj.find("#msgdemo");
                cssctl(objtip,o.type);
                objtip.text(msg);
            }
        },
        //ajaxPost:true
    });

    function add() {
        var params = {};
        params.account = $("input[name='account']").val();
        params.original = $("input[name='original']").val();
        params.appId = $("input[name='appId']").val();
        params.appSecret = $("input[name='appSecret']").val();
        params.username = $("input[name='username']").val();
        params.password = $("input[name='password']").val();
        params.name = $("input[name='name']").val();

        if (params.account == '' || params.original == '' || params.appId == '' || params.appSecret == '' ) {
            alertBox('请根据提示内容，填写必填信息！', 0, 6);return;
        }
        showBg();
        $.post('/weixin/do-add', params, function(res) {
            if (res.code == 100200) {
                hiddenBg();
                alertBox(res.msg, 1,2);
                location.reload();
            } else {
                alert(res.msg);
            }
        }, 'json');
    }
</script>