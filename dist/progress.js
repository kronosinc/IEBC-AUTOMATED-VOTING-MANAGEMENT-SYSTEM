document.onreadystatechange=function(e){
  if(document.readyState==="interactive"){
                    var all=document.getElementsByTagName("*");
                    var max=all.length;
                    setEle(max);
  }
  
}
var all=document.getElementsByTagName("*");
var el=0;
function setEle(i){  
   var per=(el/i)*100;
         $('#prog_per').html(per.toFixed()+" %");
          if(el<i){
              el++;
              setTimeout(process,20);  
          }
          else{
              stop();
          }
}
var objwidth=null;
var objheight;
var animate ;
function init(){
      document.getElementById('cirprogress').style.display="block";
  objwidth=document.getElementById('prog_per');
  objwidth.style.width='60px';
  objheight=document.getElementById('prog_per').style.height;
}
function process(){
  setEle(all.length);
  //objwidth.style.width=parseInt(objwidth.style.width)+10+'px';
animate = setTimeout(process,500); // call moveRight in 20msec
}
function stop(){
clearTimeout(animate);
document.getElementById('cirprogress').style.display="none";
}
document.getElementById('cirprogress').style.display="none";
window.onload =init;
