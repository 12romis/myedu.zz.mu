
	<h3><a href="index.php">Main page</a> |	<b>Console editor</b></h3>
	<hr/>
	<ul>
		<li>
			<b><a href="new.php">New article</a></b>
		</li>	
		<? foreach ($articles as $article): ?>
			<li>
				<a href="edit.php?id=<?=$article['id_article']?>">
					<?=$article['title']?>
				</a>
			</li>
		<? endforeach ?>
	</ul>

