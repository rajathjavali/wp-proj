function check() {
  var sem=document.getElementById("sem").value;
  var dept=document.getElementById("dept").value;
  var acy=document.getElementById("acy").value;
  var dataString="sem1="+sem+"&dept1="+dept+"&acy1="+acy;
  alert('hello');
  /*$.ajax({
    type: "POST",
    url: "sem_check.php",
    data: dataString,
    cache: false,
    success: function(data){
      // alert(data);
      document.getElementById("submit").style.visibility="hidden";
      document.getElementById("b").innerHTML=data;

    }
  });*/
}