/**
 * alert提示框
 * @param msg 提示内容
 * @param icon 旋转方式 0:里往外；1：上往下；2：下往上;3:左往右;4:左往右翻转;5:正常;6:抖动
 * @param type 提示图标 0:!;1:正确；2：错误；3：问号；4：锁；5：哭脸；6：笑脸；7：下载云
 * @param delayTime 多少秒后，自动关闭
 */
function alertBox(msg='注意！', icon=0, type=1, delayTime=3000) {
    layer.alert(msg, {
        skin: 'layui-layer-lan' //样式类名
        ,closeBtn: 0
        ,shift: type
        ,time: delayTime
        ,icon: icon
    });
}

//显示加载框
function showBg(){
    document.getElementById("noticeBox").style.display="";
}
//隐藏加载框
function hiddenBg(){
    document.getElementById("noticeBox").style.display="none";
}