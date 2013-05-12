<h1>Index Controller</h1>
<p>Welcome to Lumina index controller.</p>

<h2>Download</h2>
<p>You can download Lumina from github.</p>
<blockquote>
<code>git clone git://github.com/hubbajonte/Lumina.git</code>
</blockquote>
<p>You can review its source directly on github: <a href='https://github.com/hubbajonte/Lumina'>https://github.com/hubbajonte/Lumina</a></p>

<h2>Installation</h2>
<p><strong>Note: </strong><em>If you're on the BTH Student server then you need to change the .htaccess ReWriteBase so it points to your directory</em>
</p>
<p>First you have to make the data-directory writable. This is the place where Lumina needs
to be able to write and create files. You also need to make the grid-directory writable so lessphp can work. </p>
<blockquote>
<code>cd lumina; chmod 777 site/data</code>
</blockquote>

<p>Second, Lumina has some modules that need to be initialised. You can do this through a 
controller. Point your browser to the following link.</p>
<blockquote>
<a href='<?=create_url('module/install')?>'>module/install</a>
</blockquote>