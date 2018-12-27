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
	
						<div id="sldr">
						
						</div>
					
					
					</div><!-- не трогать -->
					
					<div onmousedown="searchNews(null,300);" class="else1"><span>Еще...</span></div>
					
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

var start = 0;
var end = 3;

var prnt = document.getElementById('sldr');


function get_link(text){
	
	var htmlObject = document.createElement('div');
	
	htmlObject.innerHTML = text;
	
	var link = htmlObject.getElementsByTagName('a');
	
	return link[0].href;

}

for(var i=start;i<end;i++){

	var sldr_item = document.createElement('div');
	sldr_item.className = "sldr-item";
	sldr_item.style = "width:300px;";
	
	var img = document.createElement('img');
	img.src = "http://liart.ru/media/uploads/newinlib/itemavatars/big/" + data[i]['avatar_img_name'];
	img.style = "padding:10px;";
	
	
	var link = document.createElement('a');
	
	link.href = get_link(data[i]['content']);
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

</script>



<?php 
include (THEPAGESPATH.'/includes/footer.php');
?>
