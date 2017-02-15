<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = '微信列表';
?>
<!-- Main content -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="form-group pull-right">
                    <form action="" method="get">
                        <select style="width: 100px; height: 30px; padding-bottom: 4px;" name="status">
                            <option value="0"  selected="selected">审核中</option>
                            <option value="1" >已完成</option>
                        </select>
                        <input type="text" name="keyword" value="" class="" placeholder="提现者" style="width: 150px; height: 30px; padding-bottom: 4px;">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <td> <input type="checkbox" id="CheckAll" name="chkSelectAll"></td>
                        <th>ID</th>
                        <th>公众号名称</th>
                        <th>微信原始Id</th>
                        <th>时间</th>
                        <th>状态</th>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="subBox" checkedId="25"></td>
                        <td>25</td>
                        <td>18521402147</td>
                        <td>1</td>
                        <td>2016-05-11 13:51:41</td>
                        <td>审核中</td>
                    </tr>
                </table>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <ul class="pagination"><li class="prev disabled"><span>&laquo;</span></li>
                            <li class="active"><a href="/finance/withdraw?page=1" data-page="0">1</a></li>
                            <li><a href="/finance/withdraw?page=2" data-page="1">2</a></li>
                            <li><a href="/finance/withdraw?page=3" data-page="2">3</a></li>
                            <li class="next"><a href="/finance/withdraw?page=2" data-page="1">&raquo;</a></li>
                        </ul>
                    </ul>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
