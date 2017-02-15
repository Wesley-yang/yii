<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = '测试';
?>
<!-- Main content -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>类型</th>
                        <th>触发类型</th>
                        <th>开发者</th>
                        <th>操作</th>
                    </tr>
                    <tr>
                        <td>传入地址，获得经纬度</td>
                        <td>a链接测试</td>
                        <td>jidi</td>
                        <th><a href="/test/geocoding-api" target="_blank">搜索延长路经纬度</a></th>
                    </tr>
                    <tr>
                        <td>传入地址，提示匹配的地址列表</td>
                        <td>a链接测试</td>
                        <td>jidi</td>
                        <th><a href="/test/suggestion-api" target="_blank">搜索和延长路有关的列表</a></th>
                    </tr>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
