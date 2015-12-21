 addEventListener('load', initiate);
 
 function initiate(){
	dell = document.querySelectorAll('.dell');
	
		for(var i=0, cnt=dell.length; i<cnt; i++){
		
			dell[i].addEventListener('click',  function(){
			var url = this.getAttribute('data_url');
	var ask = "Вы действительно хотите удалить новость?";
		if(confirm(ask)){
		   //var attr = document.getElementById('dell').getAttribute('data_url');
		   console.log(url);
			//document.location.href = attr;
		}
		else{
			console.log('No');
		}
 });
		}
	//console.log(dell);
	//dell.addEventListener('click', deleteNews);
 }
 
 /*function deleteNews(){
	var ask = "Вы действительно хотите удалить новость?";
		if(confirm(ask)){
		   var attr = document.getElementById('dell').getAttribute('data_url');
			document.location.href = attr;
		}
		else{
			console.log('No');
		}
 }*/