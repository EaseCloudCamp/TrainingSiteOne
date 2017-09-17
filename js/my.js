/**
 * Created by XIAOHAO on 2017-08-22.
 */
function test() {

    alert("hello world");
}
function toPageCenter(obj) {
    var rW, rH;//原始尺寸
    var image = new Image();
    image.src = obj.src;
    rW = image.width;
    rH = image.height;

    var myContainer = $('#myContainer');
    var docW = $(window).width();
    var docH = $(window).height();

    //设置div的宽高度
    var needW = (docW * 3 / 4);
    var needH = (docH * 3 / 4);
    alert(needW);
    // 计算div中心位置
    var centerL = (docW - needW )/ 2 + 'px'
    var centerT = (docH - needH )/ 2 + 'px';
    alert(centerL)
    myContainer.css({'background':'red','width': needW, 'height': needH, 'left': centerL, 'top': centerT});
}
 function setPros(id,pros,value){
     var who=$("#"+id);
     who.prop(pros,value);
 }