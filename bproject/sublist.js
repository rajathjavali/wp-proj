function retrieveSub() {
	var sem=document.getElementById("sem").value;
	var dept=document.getElementById("dept").value;
	var course=document.getElementById("course").value;
	var acy=document.getElementById("acy").value;
	var dataString="sem1="+sem+"&dept1="+dept+"&course1="+course+"&acy1="+acy;
	//alert('hello');
	$.ajax({
		type: "POST",
		url: "sub_list.php",
		data: dataString,
		cache: false,
		success: function(data){
			// alert(data);
			document.getElementById("submit").style.visibility="hidden";
			document.getElementById("b").innerHTML=data;

		}
	});
}
