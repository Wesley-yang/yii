<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = '测试';
?>
<!-- 上传start -->

<script type="text/javascript" charset="utf-8" src="<?= Url::to('@web/third/uploader/plupload.full.min.js') ?>"></script>
<script type="text/javascript" charset="utf-8" src="<?= Url::to('@web/third/uploader/qiniu.js') ?>"></script>
<style>
    .uplogo{position:relative;width:150px;height:150px;display:inline-block;}
    .uplogo img{width:100%;height:100%;}
    .uplogo .btn,.thumbnail .btn{display:none;position:absolute;left:50%;top:50%;margin:-11px 0 0 -35px;}
    .uplogo .fcha{display:none;}
    .uplogo:hover .btn,.uplogo:hover .fcha,.thumbnail:hover .btn{display:block;}
    .upappend{cursor:pointer;opacity:0.7}
    .upappend:hover{cursor:pointer;opacity:1}
    .hyxqtxt{border: none; box-shadow: none !important;background-color:#fff !important;}

    .fcha{position:absolute;right:-5px;top:-5px;background-color:#14a689;color:#fff;width:16px;height:16px;border-radius:8px;text-align:center;line-height:15px;cursor:pointer;}
    .fcha:hover{background-color:#0D8069}
    <!-- 上传end -->
</style>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Quick Example</h3>
                    <h3 class="box-title"><a href="get-qiniu-token" target="_blank">获得七牛上传token</a></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <th width="200">多张照片：</th>
                        <td>
                            <div id="shopImgList">
                                <p class="mt5">请上传3-6张截图，支持JPG、PNG格式。截图尺寸要求：1024*768，单张图片不能超过2M。</p>
                                <?php if($imgs):?>
                                    <?php foreach ($imgs as $item): ?>
                                        <span class="uplogo shopImgs" sourceId="<?= $item['id']?>" style="padding-left:5px;"><img src="<?= $item['url']?>"/>
                                        <i class="fcha" onclick="deleteImg(this)">×</i> </span>
                                    <?php endforeach;?>
                                <?php endif;?>
                                <span class="uplogo" id="upimgs"><img src="<?= Url::to('@web/third/uploader/updefault.png') ?>" class="upappend"/></span>
                            </div>
                        </td>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
<script src="/assets/96c9d81c/jquery.js"></script>
<script>
    var _imgBaseUrl = "http://7xs3pn.com1.z0.glb.clouddn.com";
    $(function () {
        //初始化表单
        _initUp('upimgs', ShopImgFileUploadedBack);
    });
    /**
     * 初始化一个上传对象
     * @returns {undefined}
     */
    function _initUp(domId, upback) {
        return Qiniu.uploader({
            runtimes: 'html5,flash,html4',
            browse_button: domId,
            max_file_size: '100000kb',
            flash_swf_url: '<?= Url::to('@web/third/uploader/Moxie.swf') ?>',
            uptoken : '<?= $qiniuToken?>',
            uptoken_url: 'qiniu-token',
            domain: 'szlj',
            unique_names: true,
            auto_start: true,
            init: {
                'FilesAdded': function (up, files) {
                    //添加文件前置处理
                },
                'BeforeUpload': function (up, file) {

                },
                'UploadProgress': function (up, file) {

                },
                'FileUploaded': function (up, file, info) {
                    //每个文件上传成功后
                    getSourceId(_imgBaseUrl + '/' + $.parseJSON(info).key, upback);
                },
                'UploadComplete': function () {
                    //alert('全部完成！');
                },
                'Error': function (up, err, errTip) {
                    alert("上传失败");
                    return
                },
            }
        });
    }

    /**
     * 店铺环境图片上传
     */
    function ShopImgFileUploadedBack(imgUrl, sourceId) {
        if ($('.shopImgs').length == 6) {
            alert('最多只能上传6张图片,请删除部分图片再上传！');
            return;
        }
        $('#formshopimg').val($('#formshopimg').val() + '|' + sourceId);
        var str = '<span class="uplogo shopImgs" sourceId="' + sourceId + '" style="padding-left:5px;"><img src="' + imgUrl + '"/><i class="fcha" onclick="deleteImg(this)">×</i></span>';
        $('#shopImgList').prepend(str);
    }

    function deleteImg(obj) {
        var parent = $(obj).parent();
        parent.remove();
    }
    /**
     * 获取资源id
     * @param {type} imgUrl 七牛图片完整访问地址
     * @param {type} upback 渲染回调方法
     */
    function getSourceId(imgUrl, upback) {
        var req = {}
        req.imgUrl = imgUrl;
        $.post('upload', req, function (res) {
            if (res.code == 20200) {
                ShopImgFileUploadedBack(imgUrl, res.result.source_id)
            } else {
                Boxy.error('上传失败！');
            }
        }, 'json');

    }

    /**
     * 提交的时候，获得图片id
     * @returns {string}
     */
    function getShopImgIdlist() {
        var str = '';
        $('.shopImgs').each(function () {
            if (str == '') {
                str += $(this).attr('sourceId');
            } else {
                str += ',' + $(this).attr('sourceId');
            }

        });
        return str;
    }
</script>