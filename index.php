<?php
// index.php
// Description: Creating my own MVC
// Author: Jonathan Arevalo
//

//
// PHASE: BOOTSTRAP
// 

define('LUMINA_INSTALL_PATH', dirname(__FILE__));
define('LUMINA_SITE_PATH', LUMINA_INSTALL_PATH . '/site');

require(LUMINA_INSTALL_PATH.'/src/bootstrap.php');

$lu = CLumina::Instance();


//
// PHASE: FRONTCONTROLLER ROUTE
// 

$lu->FrontControllerRoute();


//
// PHASE: THEME ENGINE RENDER
//

$lu->ThemeEngineRender();

// Visual content, only for debug

/*
echo "<h1>I'm LUMINA - index.php</h1>";
echo "<p>You are most welcome!</p>";
echo "<p>REQUEST_URI - " . htmlentities($_SERVER['REQUEST_URI']) . "</p>";
echo "<p>SCRIPT_NAME - " . htmlentities($_SERVER['SCRIPT_NAME']) . "</p>";
*/