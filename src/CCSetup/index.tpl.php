<h2>Install Lumina</h2>
<p>
Welcome to the installation of Lumina.
</p>
<p>
<strong>Note:</strong> Lumina needs atleast PHP version 5.3 to function properly.
</p>

<p>First you have to make the data-directory writable. This is the place where Lumina needs
to be able to write and create files. </p>
<blockquote>
<code>cd lumina; chmod 777 site/data</code>
</blockquote>

<p><strong>Update the page.</strong> If both boxes are green then everything is ok and you're ready for the next step.</p>

<?=CheckWritable($filename= "site/data") ?>
<?=CheckPHPVersion() ?>


<p>Second, Lumina has some modules that need to be initialised. You can do this through a 
controller. Point your browser to the following link.</p>
<?=SetupOK() ?>

