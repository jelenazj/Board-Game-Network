
function prepareEdit(data) {
  console.log(data.class);
  var isInit = true; // indicates if the popup already been initialized.
  var isClosed = false; // indicates the state of the popup
  document.getElementById("popup").style.display = "block";
  //console.log("http://localhost/drustvena_igra/edit.php?postid="+data.id+"&postbody="+data.value);
  document.getElementById('iframe').src = "https://intermetallic-sign.000webhostapp.com/board-games-network/edit.php?postid="+data.id+"&postbody="+data.value;
  document.getElementById('page').className = "darken";
  document.getElementById('page').onclick = function() {
    if(isInit){isInit=false;return;}
    if(isClosed){return;} //if the popup is closed, do nothing.
    document.getElementById("popup").style.display = "none";
    document.getElementById('page').className = "";
    isClosed=true;
  }
  return false;

}

/*

document.getElementById("a").onclick = function(e) {
  e.preventDefault();
  console.log(e);
  var isInit = true; // indicates if the popup already been initialized.
  var isClosed = false; // indicates the state of the popup
  document.getElementById("popup").style.display = "block";
  document.getElementById('iframe').src = "http://example.com";
  document.getElementById('page').className = "darken";
  document.getElementById('page').onclick = function() {
    if(isInit){isInit=false;return;}
    if(isClosed){return;} //if the popup is closed, do nothing.
    document.getElementById("popup").style.display = "none";
    document.getElementById('page').className = "";
    isClosed=true;
  }
  return false;
}*/

  document.getElementById("popup").showpopup = function() {
  document.getElementById("popup").style.display = "block";
  document.getElementById('iframe').src = "edit.php";
  document.getElementById('page').className = "darken";
  document.getElementById("page").style.display = "block";
}

document.querySelector("abc").onclick = function(e) {
  e.preventDefault();
  document.getElementById("popup").showpopup();
}

document.getElementById('page').onclick = function() {
  if(document.getElementById("popup").style.display == "block") {
    document.getElementById("popup").style.display = "none";
    document.getElementById("page").style.display = "none";
    document.getElementById('page').className = "";
  }
};