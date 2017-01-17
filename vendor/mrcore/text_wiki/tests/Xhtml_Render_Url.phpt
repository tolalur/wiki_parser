--TEST--
Text_Wiki_Xhtml_Render_Url
--FILE--
<?php
require_once 'Text/Wiki/Creole.php';
$w = new Text_Wiki_Creole(array('Url'));
print $w->transform('[[http://www.example.com/page|An example page]]
[[http://www.example.com/page]]
http://www.example.com/page', 'Xhtml');
?>
--EXPECT--
<a href="http://www.example.com/page">An example page</a>
<a href="http://www.example.com/page">http://www.example.com/page</a>
<a href="http://www.example.com/page">http://www.example.com/page</a>
