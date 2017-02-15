<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = '提现列表';
?>
<script src="<?= Url::to('@web/third/laydate/laydate.js') ?>"></script>
<!-- Main content -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="form-group pull-right">
                    <form action="" method="get">
                        开始时间<input name="start_time" value="" type="text" class="pass_ipt edit_ipt ml60 fl mt5 laydate-icon" id="start" style="height: 30px; width: 140px;"/>
                        <span class="fl ml10">至</span>
                        结束时间<input name="end_time" value="" type="text" class="pass_ipt edit_ipt ml10 fl mt5 laydate-icon" id="end" style="height: 30px; width: 140px;"/>
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
                        <th>提现者</th>
                        <th>提现金额</th>
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
                    <tr>
                        <td><input type="checkbox" name="subBox" checkedId="19"></td>
                        <td>19</td>
                        <td>18521402147</td>
                        <td>1</td>
                        <td>2016-05-06 22:09:52</td>
                        <td>审核中</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="subBox" checkedId="18"></td>
                        <td>18</td>
                        <td>18521402147</td>
                        <td>0</td>
                        <td>2016-05-06 22:09:12</td>
                        <td>审核中</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="subBox" checkedId="15"></td>
                        <td>15</td>
                        <td>jidi</td>
                        <td>0.1</td>
                        <td>2016-05-06 21:56:19</td>
                        <td>审核中</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="subBox" checkedId="12"></td>
                        <td>12</td>
                        <td>18521402147</td>
                        <td>12</td>
                        <td>2016-05-06 19:17:18</td>
                        <td>审核中</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="subBox" checkedId="23"></td>
                        <td>23</td>
                        <td>刚达R</td>
                        <td>0.5</td>
                        <td>2016-05-06 14:43:55</td>
                        <td>审核中</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="subBox" checkedId="22"></td>
                        <td>22</td>
                        <td>刚达R</td>
                        <td>0.5</td>
                        <td>2016-05-06 14:43:50</td>
                        <td>审核中</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="subBox" checkedId="21"></td>
                        <td>21</td>
                        <td>刚达R</td>
                        <td>0.5</td>
                        <td>2016-05-06 14:43:47</td>
                        <td>审核中</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="subBox" checkedId="6"></td>
                        <td>6</td>
                        <td>jidi</td>
                        <td>160</td>
                        <td>2016-05-05 22:15:03</td>
                        <td>审核中</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="subBox" checkedId="5"></td>
                        <td>5</td>
                        <td>jidi</td>
                        <td>155</td>
                        <td>2016-05-05 22:14:57</td>
                        <td>审核中</td>
                    </tr>
                </table>
                <div class="box-footer clearfix">
                    <button class="btn bg-olive margin" onclick="alipay();">通过并转支付宝</button>
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <ul class="pagination"><li class="prev disabled"><span>&laquo;</span></li>
                            <li class="active"><a href="/finance/withdraw?page=1" data-page="0">1</a></li>
                            <li><a href="/finance/withdraw?page=2" data-page="1">2</a></li>
                            <li><a href="/finance/withdraw?page=3" data-page="2">3</a></li>
                            <li class="next"><a href="/finance/withdraw?page=2" data-page="1">&raquo;</a></li></ul>                    </ul>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
<input type="hidden" name="ids" id="ids" value="" />
<script>
    //日历插件
    var start = {
        elem: '#start',
        format: 'YYYY-MM-DD 0:0:0',
        //min: laydate.now(), //设定最小日期为当前日期
        max: '2099-06-16 23:59:59', //最大日期
        istime: true,
        istoday: false,
        choose: function(datas){
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
        }
    };
    var end = {
        elem: '#end',
        format: 'YYYY-MM-DD 0:0:0',
        //min: laydate.now(),
        max: '2099-06-16 23:59:59',
        istime: true,
        istoday: false,
        choose: function(datas){
            start.max = datas; //结束日选好后，重置开始日的最大日期
        }
    };
    laydate.skin('molv');
    laydate(start);
    laydate(end);
</script>
