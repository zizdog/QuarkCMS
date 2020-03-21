<style>.main{margin-top:0;}</style>
<div class="w1 slide-box-wrap">
<div class="slide-box-inner">
    <div class="slide-box" id="slide-box">
        <ul id="inner-slide-box">
            <li><a href="http://v.zizdog.com/search/黑凤凰/" target="_blank"><img src="http://link.zizdog.com/b839f3640489426a.jpg"></a></li>
            <li><a href="http://v.zizdog.com/search/黑衣人/" target="_blank"><img src="http://link.zizdog.com/a6f03e64e3e664a8.jpg"></a></li>
            <li><a href="http://v.zizdog.com/search/反贪风暴/" target="_blank"><img src="<?php $this->options->themeUrl('ic/slider/3.jpg'); ?>"></a></li>
            <li><a href="http://v.zizdog.com/search/西虹市首富/" target="_blank"><img src="<?php $this->options->themeUrl('ic/slider/4.jpg'); ?>"></a></li>
            <li><a href="http://v.zizdog.com/search/黑凤凰/" target="_blank"><img src="http://link.zizdog.com/b839f3640489426a.jpg"></a></li>
        </ul>
        <ol id="slide-ol">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ol>
        <div class="slide-btn">
            <span class="left" id="slide-btn-left">‹</span>
            <span class="right" id="slide-btn-right">›</span>
        </div>
</div></div></div>

<?php SlideShow_Plugin::outputSlideShow() ?>

<script type="text/javascript">
var oBox = document.getElementById("slide-box");
var oUl = document.getElementById("inner-slide-box");
var oLeft = document.getElementById("slide-btn-left");
var oRight = document.getElementById("slide-btn-right");
var cur = 0;
var timer = null;
var target = 0;
var timer1 = null;
var i = 0;
timer = setInterval(autoPlay, 5000); 
function autoPlay() {
    if (target <= -400) {
        cur = 0;
        target = -100;
    } else {
        target -= 100;
    }
    sport(target);

     
    btnBottom();
}

oRight.onclick = function  (argument) {
    if (target <= -400) {
        cur = 0;
        target = -100;
    } else {
        target -= 100;
    }
     sport(target); 
    btnBottom();
}   

oLeft.onclick = function  (argument) {
    if (target > -100) {
       cur -= 400;
       target = -300; 

    } else{
        target += 100;
    }
    sport(target);

    
    btnBottom();
}   

btnBottom(i)

function  btnBottom() {
    i = -(target/100);
    i == 4 ? i = 0 : i; 
    var oOl = document.getElementById("slide-ol");
    var oLi = oOl.getElementsByTagName("li");
    for( j=0 ; j<oLi.length ; j++){
      oLi[j].style.background = '';
    }
    oLi[i].style.background = '#fff';
}

var oOl = document.getElementById("slide-ol");
var oLi = oOl.getElementsByTagName("li");
for( j=0 ; j<oLi.length ; j++){
    oLi[j].index = j
    oLi[j].onclick = function() {
           target = -(this.index*100);
           sport(target);
           btnBottom()
    }
}

function sport(tar) {
    clearInterval(timer1);
    timer1 = setInterval(autoPlay, 30);
    function autoPlay() {
        if (cur == tar) {
            clearInterval(timer1)
        } else {
            speed = (tar - cur) / 7;
            speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);
            cur = cur + speed; 
            oUl.style.left = cur + "%";
        }
    }
}
oBox.onmouseover = function() {
    clearInterval(timer);
}
oBox.onmouseout = function() {
    timer = setInterval(autoPlay, 5000);
}
</script>