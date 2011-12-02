<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!doctype html>
<html>
<head>
<style>
html, body {
	margin: 0;
	font-family: sans-serif;
}
header {
	display: none;
}
form {
	margin: 10px;
	width: 95%;
}
fieldset {
	border: none;
	margin: 0;
	padding: 0;
}
label, input, textarea, select {
	display: block;
	margin: 2px 0;
	width: 100%;
}
.input {
	margin: 10px 0;
}
.submit input {
	display: block;
	padding: 10px 0;
}
.error-message {
	color: red;
}
</style>
</head>
<body>
<?php echo $content_for_layout; ?>
</body>
</html>