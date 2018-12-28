<?php 
///htdocs/wlib/html/pages/index
include (THEPAGESPATH.'/includes/searchdiv.php');
require_once "get_books.php";
?>
<div id="infor">
	<div class="table index_page">
		<div class="row h100">
			<!--<div class="td w33 p3 h100 vtop curs acenter" onmousedown="searchNews(null,300);">-->
			<div class="td w33 p3 h100 vtop curs acenter">
				<div class="dib w100">
					<div onmousedown="searchNews(null,300);" class="header">Новые поступления</div>
					<!--div class="spacer h100x"></div-->
					<div id="newbooks"><!-- не трогать -->
	
						<div id="sldr"></div>

					</div><!-- не трогать -->
					<a class="button15" id="more_books">Показать еще...</a>
					<div class="spacer h50x"></div>
					<div onmousedown="searchNews(null,300);" class="else1"><span>Список новых поступлений...</span></div>
					
				</div>
				
			</div>
			
			
			<!--div class="td h100 p3 vtop">
				<div class="header w100">Популярное</div>
				<div class="table w100">
					<div class="row h100">
						<div class="td w50 vtop curs acenter" onmousedown="goToLocation('bookrating');">
							<div class="dib">
								<div class="header1">Книги</div>
								<div id="bookrating"></div>
								<div class="else1"><span>Еще...</span></div>
							</div>
						</div>
						<div class="td vtop curs acenter" onmousedown="goToLocation('ebookrating');">
							<div class="dib">
								<div class="header1">Электронные книги</div>
								<div id="ebookrating"></div>
								<div class="else1"><span>Еще...</span></div>
							</div>
						</div>
					</div>
				</div>
			</div-->
		</div>
	</div>
</div>

<script type="text/javascript">

	var data = <?php echo $con->data; ?>;

	var slider = {};

	slider.get_link = function(text){
		
		var htmlObject = document.createElement('div');
		
		htmlObject.innerHTML = text;
		
		var link = htmlObject.getElementsByTagName('a');
		
		return link[0].href;

	}

	slider.start = 0;
	slider.end = 3;

	var prnt = document.getElementById('sldr');

	slider.cycle = function(){
		
		for(var i=slider.start;i<slider.end;i++){

		var sldr_item = document.createElement('div');
		sldr_item.className = "sldr-item";
		sldr_item.style = "width:300px;";
		
		var img = document.createElement('img');
		img.src = "http://liart.ru/media/uploads/newinlib/itemavatars/big/" + data[i]['avatar_img_name'];
		img.style = "padding:10px;";
		
		
		var link = document.createElement('a');
		
		link.href = slider.get_link(data[i]['content']);
		link.target = "_blank";
		link.innerHTML = "Ccылка на книгу";
		
		
		var image_link = document.createElement('a');
		image_link.href = link.href;
		image_link.target = "_blank";
		
		
		var title = document.createElement('p');
		title.innerHTML = data[i]['title'];
		title.style = "line-height:1.5em;";
		
		
		prnt.appendChild(sldr_item);
		sldr_item.appendChild(image_link);
		image_link.appendChild(img);
		sldr_item.appendChild(link);
		sldr_item.appendChild(title);
	}

	}

	slider.cycle();

	slider.add_books = function(){
		
		prnt.innerHTML = '';
		
		if(slider.end == data.length){
			slider.start=0;
			slider.end=3;
		}else{
			slider.start+=3;
			slider.end+=3;
		}
		
		slider.cycle();
	} 
	 
	document.getElementById('more_books').addEventListener('click',slider.add_books);

</script>
<script type="text/javascript">
	//блок бездействия
	var t;
	document.onload = resetTimer;
	document.onmousemove = resetTimer;
	document.onmousedown = resetTimer; 
	document.ontouchstart = resetTimer;
	document.onclick = resetTimer;     
	document.onscroll = resetTimer;    
	document.onkeypress = resetTimer;


	function clicker() {
		document.getElementById('more_books').click();
	}

	function resetTimer() {
		clearTimeout(t);
		t = setTimeout(clicker, 15000)
		  // 1000 milisec = 1 sec
	}

</script>
<?php 
include (THEPAGESPATH.'/includes/footer.php');
?>
