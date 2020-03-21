
function addClass(obj, cls) {
        if (obj.className === '') {
            obj.className = cls;
        } else {
            var arrclassname = obj.className.split(' ');
            var index = arrIndexOf(arrclassname, cls);
            if (index == -1) {
                obj.className += ' ' + cls;
            }
        }
    }

    function arrIndexOf(arr, v) { //检测数组中是否有相同的值存在，并且返回它的位置；
        for (var i = 0; i < arr.length; i++) {
            if (arr[i] == v) {
                return i;
            }
        }
        return -1;
    }

    function removeClass(obj, cls) {
        //如果有class的话：
        if (obj.className !== '') {
            var arrClassName = obj.className.split(' '); //对原有class进行拆分，看看是否包含需要移除的class，也就是传参cls的classname；
            var index = arrIndexOf(arrClassName, cls);
            //r如果有需要移除的class
            if (index != -1) {
                arrClassName.splice(index, 1);
                obj.className = arrClassName.join('');
            }
        }
    }

    function hasClass(obj, cls) {
        var cls = cls || '';
        if (cls.replace(/\s/g, '').length === 0) {
            return false; //当cls没有参数时,返回false;
        } else {
            return new RegExp(' ' + cls + '').test(' ' + obj.className);
        }
    }

    function toggleClass(obj, cls) {
        obj = document.getElementById(obj);
        hasClass(obj, cls) ? removeClass(obj, cls) : addClass(obj, cls);
    }

    function getByClass(oParent, sClass) {
        if (oParent.getElementsByClassName) {
            return oParent.getElementsByClassName(sClass);
        } else { //IE 8 7 6
            var arr = [];
            var reg = new RegExp('\\b' + sClass + '\\b');
            var aEle = oParent.getElementsByTagName('*');
            for (var i = 0; i < aEle.length; i++) {
                if (reg.test(aEle[i].className)) {
                    arr.push(aEle[i]);
                }
            }
            return arr;
        }
    }

function changeNavState() {
	if (document.getElementById('menu').getAttribute('mobile') == 'on') {
		document.getElementById('menu').setAttribute('mobile','off');
		document.getElementById('x').setAttribute('mobile','off');
	} else {
		document.getElementById('menu').setAttribute('mobile','on');
		document.getElementById('x').setAttribute('mobile','on');
	}
}

var imgs = document.querySelectorAll('.item img');
function getTop(e) {
	var T = e.offsetTop;
	while(e = e.offsetParent) {
		T += e.offsetTop;
	}
	return T;
}

function lazyLoad(imgs) {
	var H = window.innerHeight;
    var S = document.documentElement.scrollTop || document.body.scrollTop;
	for (var i = 0; i < imgs.length; i++) {
		if (H + S > getTop(imgs[i])) {
			imgs[i].src = imgs[i].getAttribute('data-src');
		}
	}
}

// 简单的节流函数
function throttle(func, wait, mustRun) {
    var timeout,
        startTime = new Date();
 
    return function() {
        var context = this,
            args = arguments,
            curTime = new Date();
 
        clearTimeout(timeout);
        // 如果达到了规定的触发时间间隔，触发 handler
        if(curTime - startTime >= mustRun){
            func.apply(context,args);
            startTime = curTime;
        // 没达到触发间隔，重新设定定时器
        }else{
            timeout = setTimeout(func, wait);
        }
    };
}
//（手动）夜间模式切换函数
function switchNightMode(){
    var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
    var snm = document.querySelector('#snm-ico');
    if(night == '0'){
        document.querySelector('link[title="dark"]').disabled = true;
        document.querySelector('link[title="dark"]').disabled = false;
        document.cookie = "night=1;path=/"
        removeClass(snm,'icon-moon');
        addClass(snm,'icon-sun');
        document.getElementById('snm-text').innerHTML = '日间模式';
        console.log('夜间模式开启');
    }else{
        document.querySelector('link[title="dark"]').disabled = true;
        document.cookie = "night=0;path=/"
        removeClass(snm,'icon-sun');
        addClass(snm,'icon-moon');
        document.getElementById('snm-text').innerHTML = '夜间模式';
        console.log('夜间模式关闭');
    }
}

function realFunc(){
	lazyLoad(imgs);
}

//页面加载时执行lazyload，否则滚动页面前可视的图片不显示
window.onload =function (){
    lazyLoad(imgs);
    var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
    var snm = document.querySelector('#snm-ico');
    
    if(night == '0'){
        addClass(snm,'icon-moon');
        document.getElementById('snm-text').innerHTML = '夜间模式';
    }else{
        addClass(snm,'icon-sun');
        document.getElementById('snm-text').innerHTML = '日间模式';
    }
};

window.addEventListener('scroll',throttle(realFunc,250,500));//调用节流函数->调用lazyload