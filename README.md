This is the readme file.
========================

Lumina is a PHP-based MVC-inspired CMF created by Jonathan Arévalo at Blekinge Institute of Technology.

How to Install
==============

Step 1:
-------
First download/clone the Lumina repository from Github to your server:
`git clone git://github.com/hubbajonte/Lumina.git`

Step 2:
-------
Point your browser to the setup page.
[http://your.url/Lumina/setup]
Follow the instructions from there.

How to Customize
================
Lumina can be customized to fit your personal style.
You can:

* Change the logo (this will also be your favicon).
* Change the title(Lumina).
* Change the footer.
* Change the colors of the theme.
* Create, edit and delete content.
* Edit the navigation bar.

Change the logo
===============
There is two main ways to change the logo of this site.
The first one is preferred.

First way:
----------
* Navigate to `/site/themes/mythemes` in your Lumina directory.
There you will find a file called `logo_80x80.png`.
This is the file that you want to change.

To change the logo, simply:
* Create a new PNG file that is 80x80 pixels.
* Rename it to `logo_80x80` (.png is the file extension and is there by default when you create a PNG file).
* Overwrite the file in the `mythemes` directory with your new file.
* Done. Refresh the page.

Second way:
-----------
* Navigate to `/site/themes/mythemes` in your Lumina directory.
This is the folder there you will place your new logo.

* Create your new logo with your preferred filetype (jpg, png etc).
* Put it in the `mythemes` directory.
* Navigate back to the root of Lumina. Navigate to `/site`
* Open the config.php file.
* Scroll down to the bottom of the file. 
* The parts that you want to change are named `favicon` and `logo`.
* Simply replace the name of the files with your new one.
* Save the file.
* Done. Refresh the page.

Change the title/header
=======================
* Navigate to `/site` in your Lumina directory.
* Open the config.php file.
* Scroll down to the bottom of the file.
* The part that you want to change is named `header`.
* Edit the part that says `<h3>Lumina</h3>`
* The `<h3></h3>` is HTML for headings. Change this to your preferred heading size if you're familiar with HTML. Otherwise, just change the part that says `Lumina`.
* Save the file.
* Done. Refresh the page.


Change the footer
=================
* Navigate to `/site` in your Lumina directory.
* Open the config.php file.
* Scroll down to the bottom of the file.
* The part that you want to change is named `footer`.
* Edit the part that says `Lumina &copy; by Jonathan Arevalo @ Blekinge Institute of Technology` to your whatever you want.
* Save.
* Done. Refresh the page.


Change the colors of the theme
==============================
This part reguires that you have some knowledge of the style sheet language __CSS__.
If you don't have knowledge I will try to guide the best I can.

* Navigate to `/site/themes/mytheme` in your Lumina directory.
* Open the `style.css` file.

Here you will find more information in the comments on how to customize your theme.

* Save the file when you're done.
* Refresh the page.


Edit the navigation bar
=======================
To edit the navigation bar (the bar below the logo and title) there is a few things you need to think about.
The menus are hardcoded in the config.php file and comes with some defaults.

You also need to know the logic behind the configurations that handles the menus.
I will explain this for you below.

* Navigate to `/site` in your Lumina directory.
* Open the config.php file.
* Scroll down to the part that says `$lu->config['menus']`, almost at the bottom of the file.
* Look at `'my-navbar' => array`. This is where you will edit your menu.
* You will want to add a new row at the end of the `'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),`.
  Right after the `),` at the end of the line. 
* Add the new page like this `'example1' => array('label' => 'example2', 'url' => 'page/view/2'),`.

* `'example1'` This is a placeholder for the system.
* `'example2'` This is what will be shown as a link.
* `'page/view/2'` This is the actual link to the page (that you created).

To find out what link your page has, simply browse your way to it and look at what the address bar says.

* Save.
* Done. Refresh the page.

How to create Content
=====================
To create content you need to be logged in as a user/admin.

* Login.
* Click on the __Content__ link on the navigation bar.
* In `Actions`, click on the `Create new content` link.

Create a page:
--------------
1. Write the title of the page in __Title__.
2. In __Key__ write your key. This is not yet implemented though. You can write your title here to with small letters.
3. In __Content__ write the content of the page.
4. In __Type__ write __Page__ as this will allow you to create the content as a page.
5. In __Filter__ write the filter method that you want to use on this page. 

The currently available filters are:

* Plain - written as `plain` in filter.
* HTMLPurify - written as `htmlpurify` in filter.
* bbcode - written as `bbcode` in filter.
* SmartyPantsTypographer - written as `smartypants` in filter.
* MakeClickable - written as `make_clickable` in filter.
* Markdown - written as `markdown` in filter.

If you're not familiar with these filters, simply write `plain` and you will be alright.

  6\. Press on create.

  7\. Done.

Create a post:
--------------
Repeat steps 1-3 from the page creation part.

  4\. In __Type__ write __Post__ as this will allow you to create the content as a post.

Repeat steps 5-7 from the page creation part.