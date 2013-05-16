<h1>Install modules</h1>

<p>The following modules were affected by this action.</p>

<table>
<caption>Results from installing modules.</caption>
<thead>
  <tr><th>Module</th><th>Result</th></tr>
</thead>
<tbody>
<?php foreach($modules as $module): ?>
  <tr><td><?=$module['name']?></td><td><div class='<?=$module['result'][0]?>'><?=$module['result'][1]?></div></td></tr>
<?php endforeach; ?>
</tbody>
</table>

<p>
If all the boxes are green, you now only need to deactivate the Setup controller in the config-file.
You do this by entering the Lumina directory, navigate to /site then open the config.php file.
<p>
From here, scroll down to the line that says:
<blockquote>
<code>$lu->config['controllers']</code>
</blockquote>
Then look at the line that says:
<p>
<blockquote>
<code> 'setup'     => array('enabled' => true,'class' => 'CCSetup'),</code>
</blockquote>
</p>
You need to change the part that says "true" to "false".
</p>
<p>
That's it! You can now start using Lumina with the default user accounts.
Please change the default password if you're using Lumina on a day-to-day basis.
</p>
</p>