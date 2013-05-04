<h1>This is the index Controller</h1>
<p>This is what Lumina can do for now.</p>

<?php foreach($menu as $val): ?>
<li><a href='<?=create_url($val)?>'><?=$val?></a>  
<?php endforeach; ?>