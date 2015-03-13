<?php
/**
 *  Copyright 2011 Peter Hilbring <kontakt@hilbring-online.de>
 *
 *  Licensed under the Apache License, Version 2.0 (the "License"); you may
 *  not use this file except in compliance with the License. You may obtain
 *  a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 *  WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 *  License for the specific language governing permissions and limitations
 *  under the License.
 *
 * @author    Peter Hilbring <kontakt@hilbring-online.de>
 * @package   HSLColor
 * @copyright Copyright (c) 2011 Peter Hilbring (http://www.hilbring.de)
 * @license   http://www.apache.org/licenses/LICENSE-2.0     Apache License, Version 2.0
 */
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>HSLColor-Class Demo</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css" media="screen">
		div.row {
			clear: both;
		}
		div.hue {
			clear: both;
			height: 15px;
			line-height: 16px;
			font-size: 12px;
			text-align: center;
			border-bottom: 1px black solid;
			padding-left: 16px;
		}
		div.lightness {
			float: left;
			width: 15px;
			height: 16px;
			font-size: 7px;
			line-height: 16px;
			text-align: right;
			border-right: 1px black solid;
		}
		div.saturation {
			float: left;
			width: 15px;
			height: 16px;
			font-size: 7px;
			line-height: 16px;
			text-align: center;
			border-left: 1px black solid;
			overflow: hidden;
		}
		div.colorfield {
			float: left;
			width: 16px;
			height: 16px;
		}
		div.colorbox {
			float: left;
			margin: 5px;
			border: 1px black solid;
		}
		div.infotext {
			clear: both;
			height: 15px;
			line-height: 16px;
			font-size: 12px;
			margin-left: 5px;
		}
	</style>
</head>
<body>

<?php

require_once dirname(__FILE__) . '/../HSLColor.class.php';

$deltaH = 360.0 / ( 6 * 6 );

$color = new HSLColor();

$h = 0.0;
for ( $y = 0; $y < 6; $y++ ) {
	echo "<div class='row'>\n";
	for ( $x = 0; $x < 6; $x ++ ) {
		printf( "\t<div class='colorbox'> <!-- Hue: %5.2F° -->\n", $h );
		printf( "\t\t<div class='hue'>%5.2F°</div>\n", $h );
		for ( $l = 1.0; $l >= 0.0; $l -= 0.125 ) {
			printf( "\t\t<div class='row'> <!-- Lightness: %5.2F%% -->\n", $l * 100 );
			printf( "\t\t\t<div class='lightness'>%5.1F</div>\n", $l * 100 );
			for ( $s = 0.0; $s <= 1.0; $s += 0.125 ) {
				printf( "\t\t\t<div class='colorfield' style='background: %s;'></div> <!-- H: %5.2F° S: %5.2F%% L: %5.2F%% -->\n", 
					$color->convertHSLToRGBString( $h, $s, $l ),  $h, $s * 100, $l * 100 );
			}
			echo "\t\t</div>\n";
		}
		echo "\t\t<div class='row'>\n";
		echo "\t\t\t<div class='colorfield'></div>\n";
		for ( $s = 0.0; $s <= 1.0; $s += 0.125 ) {
			printf( "\t\t\t<div class='saturation'>%5.1F</div>\n", $s * 100 );
		}
		echo "\t\t</div>\n";
		echo "\t</div>\n";
		$h += $deltaH;
	}
	echo "</div>\n";
}

?>

	<div class="infotext"> X-Axis: Saturation[%], Y-Axis: Lightning[%]</div>
</body>
</html>