//移动端适配
function refreshRem(){
    var docEl = window.document.documentElement;
    var width = parseInt($(window).width());
    var rootSize = width/20;
    docEl.style.fontSize = rootSize + 'px';
}

//页面位置及移动适配
function resize(){
    refreshRem();
};

//整站页面加载
$(function(){
    resize();
    $(window).resize(function(){
        resize();
    });
});