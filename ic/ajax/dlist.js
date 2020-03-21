function showDList(str)
{
    document.getElementById("DListButton").innerHTML="<i class='iconfont icon-loading'></i>正在拼命加载...";
    if (str==="")
    {
        document.getElementById("DList").innerHTML="获取地址失败！";
        return;
    }
    if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("DList").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","usr/themes/QuarkCMS/ic/ajax/dlist.php?q="+str,true);
    xmlhttp.send();
}