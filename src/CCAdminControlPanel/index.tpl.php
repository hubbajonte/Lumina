<?php if($hasRoleAdmin): ?>
<h1>Admin Control Panel Index</h1>
<p>Edit, create and delete content from here.
You can also browse through Luminas modules from here.
</p>
<h2>Content</h2>
<a href='<?=create_url('content/create')?>'>Create new content</a>
<p><a href='<?=create_url('content')?>'>View all content</a></p>

<?php else: ?>
<p>
Content only visible to the admin/root user..
</p>
<?php endif; ?>
