function ajax(){
let username = document.getElementById("username").value;
let password = document.getElementById("password").value;

let xhttp = new XMLHttpRequest();

xhttp.send('username='+username);
xhttp.send('password='+password);

xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementsByTagName('h1')[0].innerHTML = this.responseText;
    }
  }
 
 
}
 