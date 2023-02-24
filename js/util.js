/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function toggleNav() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

//   script for menu 
function togglemenu(x) {
    x.classList.toggle("change");
  }



  function close(){
    document.getElementById('alert').style.display=`none`;
    document.getElementById('error').style.display=`none`;
  }


  if(document.getElementById("alert").style.display==`block` || document.getElementById("error").style.display==`block`){
  setTimeout(close, 1000 )}

  setInterval(close, 1000);