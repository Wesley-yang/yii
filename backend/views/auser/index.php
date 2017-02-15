<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = '用户列表';
?>
<!-- Main content -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools">
                    <form action="" method="get">
                        <div class="input-group" style="width: 150px;">
                            <input type="text" name="keyword" value="<?php echo $keyword?>" class="form-control input-sm pull-right" placeholder="id或昵称">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>email</th>
                        <th>角色等级</th>
                        <th>状态</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    <?php if ($resultInfo) :?>
                        <?php foreach ($resultInfo as $item): ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['username'] ?></td>
                                <td><?= $item['email'] ?></td>
                                <td><?= $item['role'] ?></td>
                                <td><?= $item['status'] ?></td>
                                <td><?php echo  date('Y-m-d H:i', $item['created_at']); ?></td>
                                <td>
                                    <?php if ($item['status']==0):?>
                                        <button class="btn btn-danger" onclick="updateUserStatus(<?= $item['id'] ?>, <?= $item['status'] ?>);">解除锁定</button>
                                    <?php else:?>
                                        <button class="btn btn-success"  onclick="updateUserStatus(<?= $item['id'] ?>, <?= $item['status'] ?>);"> 加入锁定 </button>
                                    <?php endif;?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif;?>
                </table>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <?= LinkPager::widget(['pagination' => $pagination]) ?>
                    </ul>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
<script>
    function updateUserStatus($id, $status) {
        var params = {};
        params.userId = $id;
        params.status = $status;
        $.post('/auser/update-user-status', params, function(res) {
            if (res.code == 100200) {
                alert(res.msg);
                window.location.reload();
            } else {
                alert(res.msg);
            }
        }, 'json');
    }
</script>