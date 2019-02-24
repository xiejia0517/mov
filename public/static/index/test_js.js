/* Copyright 2014+, Federico Zivolo, LICENSE at https://github.com/FezVrasta/bootstrap-material-design/blob/master/LICENSE.md */
/* globals jQuery, navigator */
 
// window.onload = function (ev)
// {
//   var div1 = document.getElementsByTagName("div")[0];
//   var div2 = document.getElementsByClassName("div2")[0];
//   var div3 = document.getElementById("div3");
//   console.log(div1);
//   console.log(div2);

//   div1.style.backgroundColor = "red";
//   div2.style.backgroundColor = "blue";
//   div3.style.backgroundColor = "yellow";
// }

// $(function(){
//   var $div1 = $("div");
//   var $div2 = $(".div2");
//   var $div3 = $("#div3");
  

//   $div1.css({
//     backgroundColor:"red",
//   });
//   $div2.css({
//     backgroundColor:"blue",
//   });
//   $div3.css({
//     backgroundColor:"yellow",
//   });
// })

function changeColor(color){
  var oDiv = document.getElementById('div4');
  if(color == 'Green'){
    oDiv.style.backgroundColor = 'green';
  }else if(color == 'Red'){
    oDiv.style.backgroundColor = 'red';
  }else if(color == 'Blue'){
    oDiv.style.backgroundColor = 'blue';
  }
  
}

function resize(){
  document.getElementById('div4').style.width = '100px';
  document.getElementById('div4').style.height = '100px';
  document.getElementById('div4').style.backgroundColor = 'aqua';
}
