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

/**
 * Description of HSLColor.class.php
 *
 * HSL notation looks like this, giving the Hue, Saturation and Lightness values in that order:
 * Red: 0° 100% 50%
 * Pale pink: 0° 100% 90% (#FFCCCC)
 * Cyan: 180° 100% 50%
 *
 * @author    Peter Hilbring <kontakt@hilbring-online.de>
 * @package   HSLColor
 * @copyright Copyright (c) 2011 Peter Hilbring (http://www.hilbring.de)
 * @license   http://www.apache.org/licenses/LICENSE-2.0     Apache License, Version 2.0
 * @since     06.09.2011 19:52:40
 */
class HSLColor
{
	/**
	 * The Hue is the color's position on the color wheel, expressed in degrees from 0° to 359°,
	 * representing the 360° of the wheel; 0° being red, 180° being red's opposite color cyan, and so on.
	 *
	 * @var float
	 * @access private
	 */
	private $_hue = 0.0;

	/**
	 * Saturation is the intensity of the color, how dull or bright it is. The lower the saturation,
	 * the duller (greyer) the color looks. This is expressed as a percentage, 100% being full
	 * saturation, the brightest, and 0% being no saturation, grey.
	 *
	 * @var float
	 * @access private
	 */
	private $_saturation = 0.0;

	/**
	 * Lightness is how light the color is. Slightly different to saturation. The more white in the
	 * color the higher its Lightness value, the more black, the lower its Lightness. So 100%
	 * Lightness turns the color white, 0% Lightness turns the color black, and the "pure" color
	 * would be 50% Lightness.
	 *
	 * @var float
	 * @access private
	 */
	private $_lightness = 1.0;

	/**
	 * Array with color data.
	 *
	 * @var array
	 * @access private
	 */
	private static $_colorData = array(
		'aliceblue'            => array(
									  'hex' => '#F0F8FF',
									  'rgb' => array( 'r' => 240, 'g' => 248, 'b' => 255, ),
									  'hsl' => array( 'h' => 208.000, 's' => 1.000, 'l' => 0.971, ),
									  'hsv' => array( 'h' => 208.000, 's' => 0.059, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.059, 'm' => 0.027, 'y' => 0.000, ),
									  'cmyk' => array( 'c' => 0.059, 'm' => 0.027, 'y' => 0.000, 'k' => 0.000, ),
								  ),
		'antiquewhite'         => array(
									  'hex' => '#FAEBD7',
									  'rgb' => array( 'r' => 250, 'g' => 235, 'b' => 215, ),
									  'hsl' => array( 'h' => 34.286, 's' => 0.778, 'l' => 0.912, ),
									  'hsv' => array( 'h' => 34.286, 's' => 0.140, 'v' => 0.980, ),
									  'cmy' => array( 'c' => 0.020, 'm' => 0.078, 'y' => 0.157, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.060, 'y' => 0.140, 'k' => 0.020, ),
								  ),
		'aqua'                 => array(
									  'hex' => '#00FFFF',
									  'rgb' => array( 'r' => 0, 'g' => 255, 'b' => 255, ),
									  'hsl' => array( 'h' => 180.000, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 180.000, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 0.000, 'y' => 0.000, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.000, ),
								  ),
		'aquamarine'           => array(
									  'hex' => '#7FFFD4',
									  'rgb' => array( 'r' => 127, 'g' => 255, 'b' => 212, ),
									  'hsl' => array( 'h' => 159.844, 's' => 1.000, 'l' => 0.749, ),
									  'hsv' => array( 'h' => 159.844, 's' => 0.502, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.502, 'm' => 0.000, 'y' => 0.169, ),
									  'cmyk' => array( 'c' => 0.502, 'm' => 0.000, 'y' => 0.169, 'k' => 0.000, ),
								  ),
		'azure'                => array(
									  'hex' => '#F0FFFF',
									  'rgb' => array( 'r' => 240, 'g' => 255, 'b' => 255, ),
									  'hsl' => array( 'h' => 180.000, 's' => 1.000, 'l' => 0.971, ),
									  'hsv' => array( 'h' => 180.000, 's' => 0.059, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.059, 'm' => 0.000, 'y' => 0.000, ),
									  'cmyk' => array( 'c' => 0.059, 'm' => 0.000, 'y' => 0.000, 'k' => 0.000, ),
								  ),
		'beige'                => array(
									  'hex' => '#F5F5DC',
									  'rgb' => array( 'r' => 245, 'g' => 245, 'b' => 220, ),
									  'hsl' => array( 'h' => 60.000, 's' => 0.556, 'l' => 0.912, ),
									  'hsv' => array( 'h' => 60.000, 's' => 0.102, 'v' => 0.961, ),
									  'cmy' => array( 'c' => 0.039, 'm' => 0.039, 'y' => 0.137, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.102, 'k' => 0.039, ),
								  ),
		'bisque'               => array(
									  'hex' => '#FFE4C4',
									  'rgb' => array( 'r' => 255, 'g' => 228, 'b' => 196, ),
									  'hsl' => array( 'h' => 32.542, 's' => 1.000, 'l' => 0.884, ),
									  'hsv' => array( 'h' => 32.542, 's' => 0.231, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.106, 'y' => 0.231, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.106, 'y' => 0.231, 'k' => 0.000, ),
								  ),
		'black'                => array(
									  'hex' => '#000000',
									  'rgb' => array( 'r' => 0, 'g' => 0, 'b' => 0, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.000, 'l' => 0.000, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.000, 'v' => 0.000, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 1.000, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, 'k' => 1.000, ),
								  ),
		'blanchedalmond'       => array(
									  'hex' => '#FFEBCD',
									  'rgb' => array( 'r' => 255, 'g' => 235, 'b' => 205, ),
									  'hsl' => array( 'h' => 36.000, 's' => 1.000, 'l' => 0.902, ),
									  'hsv' => array( 'h' => 36.000, 's' => 0.196, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.078, 'y' => 0.196, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.078, 'y' => 0.196, 'k' => 0.000, ),
								  ),
		'blue'                 => array(
									  'hex' => '#0000FF',
									  'rgb' => array( 'r' => 0, 'g' => 0, 'b' => 255, ),
									  'hsl' => array( 'h' => 240.000, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 240.000, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 1.000, 'y' => 0.000, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 1.000, 'y' => 0.000, 'k' => 0.000, ),
								  ),
		'blueviolet'           => array(
									  'hex' => '#8A2BE2',
									  'rgb' => array( 'r' => 138, 'g' => 43, 'b' => 226, ),
									  'hsl' => array( 'h' => 271.148, 's' => 0.759, 'l' => 0.527, ),
									  'hsv' => array( 'h' => 271.148, 's' => 0.810, 'v' => 0.886, ),
									  'cmy' => array( 'c' => 0.459, 'm' => 0.831, 'y' => 0.114, ),
									  'cmyk' => array( 'c' => 0.389, 'm' => 0.810, 'y' => 0.000, 'k' => 0.114, ),
								  ),
		'brown'                => array(
									  'hex' => '#A52A2A',
									  'rgb' => array( 'r' => 165, 'g' => 42, 'b' => 42, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.594, 'l' => 0.406, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.745, 'v' => 0.647, ),
									  'cmy' => array( 'c' => 0.353, 'm' => 0.835, 'y' => 0.835, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.745, 'y' => 0.745, 'k' => 0.353, ),
								  ),
		'burlywood'            => array(
									  'hex' => '#DEB887',
									  'rgb' => array( 'r' => 222, 'g' => 184, 'b' => 135, ),
									  'hsl' => array( 'h' => 33.793, 's' => 0.569, 'l' => 0.700, ),
									  'hsv' => array( 'h' => 33.793, 's' => 0.392, 'v' => 0.871, ),
									  'cmy' => array( 'c' => 0.129, 'm' => 0.278, 'y' => 0.471, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.171, 'y' => 0.392, 'k' => 0.129, ),
								  ),
		'cadetblue'            => array(
									  'hex' => '#5F9EA0',
									  'rgb' => array( 'r' => 95, 'g' => 158, 'b' => 160, ),
									  'hsl' => array( 'h' => 181.846, 's' => 0.255, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 181.846, 's' => 0.406, 'v' => 0.627, ),
									  'cmy' => array( 'c' => 0.627, 'm' => 0.380, 'y' => 0.373, ),
									  'cmyk' => array( 'c' => 0.406, 'm' => 0.013, 'y' => 0.000, 'k' => 0.373, ),
								  ),
		'chartreuse'           => array(
									  'hex' => '#7FFF00',
									  'rgb' => array( 'r' => 127, 'g' => 255, 'b' => 0, ),
									  'hsl' => array( 'h' => 90.118, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 90.118, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.502, 'm' => 0.000, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 0.502, 'm' => 0.000, 'y' => 1.000, 'k' => 0.000, ),
								  ),
		'chocolate'            => array(
									  'hex' => '#D2691E',
									  'rgb' => array( 'r' => 210, 'g' => 105, 'b' => 30, ),
									  'hsl' => array( 'h' => 25.000, 's' => 0.750, 'l' => 0.471, ),
									  'hsv' => array( 'h' => 25.000, 's' => 0.857, 'v' => 0.824, ),
									  'cmy' => array( 'c' => 0.176, 'm' => 0.588, 'y' => 0.882, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.500, 'y' => 0.857, 'k' => 0.176, ),
								  ),
		'coral'                => array(
									  'hex' => '#FF7F50',
									  'rgb' => array( 'r' => 255, 'g' => 127, 'b' => 80, ),
									  'hsl' => array( 'h' => 16.114, 's' => 1.000, 'l' => 0.657, ),
									  'hsv' => array( 'h' => 16.114, 's' => 0.686, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.502, 'y' => 0.686, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.502, 'y' => 0.686, 'k' => 0.000, ),
								  ),
		'cornflowerblue'       => array(
									  'hex' => '#6495ED',
									  'rgb' => array( 'r' => 100, 'g' => 149, 'b' => 237, ),
									  'hsl' => array( 'h' => 218.540, 's' => 0.792, 'l' => 0.661, ),
									  'hsv' => array( 'h' => 218.540, 's' => 0.578, 'v' => 0.929, ),
									  'cmy' => array( 'c' => 0.608, 'm' => 0.416, 'y' => 0.071, ),
									  'cmyk' => array( 'c' => 0.578, 'm' => 0.371, 'y' => 0.000, 'k' => 0.071, ),
								  ),
		'cornsilk'             => array(
									  'hex' => '#FFF8DC',
									  'rgb' => array( 'r' => 255, 'g' => 248, 'b' => 220, ),
									  'hsl' => array( 'h' => 48.000, 's' => 1.000, 'l' => 0.931, ),
									  'hsv' => array( 'h' => 48.000, 's' => 0.137, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.027, 'y' => 0.137, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.027, 'y' => 0.137, 'k' => 0.000, ),
								  ),
		'crimson'              => array(
									  'hex' => '#DC143C',
									  'rgb' => array( 'r' => 220, 'g' => 20, 'b' => 60, ),
									  'hsl' => array( 'h' => 348.000, 's' => 0.833, 'l' => 0.471, ),
									  'hsv' => array( 'h' => 348.000, 's' => 0.909, 'v' => 0.863, ),
									  'cmy' => array( 'c' => 0.137, 'm' => 0.922, 'y' => 0.765, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.909, 'y' => 0.727, 'k' => 0.137, ),
								  ),
		'cyan'                 => array(
									  'hex' => '#00FFFF',
									  'rgb' => array( 'r' => 0, 'g' => 255, 'b' => 255, ),
									  'hsl' => array( 'h' => 180.000, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 180.000, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 0.000, 'y' => 0.000, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.000, ),
								  ),
		'darkblue'             => array(
									  'hex' => '#00008B',
									  'rgb' => array( 'r' => 0, 'g' => 0, 'b' => 139, ),
									  'hsl' => array( 'h' => 240.000, 's' => 1.000, 'l' => 0.273, ),
									  'hsv' => array( 'h' => 240.000, 's' => 1.000, 'v' => 0.545, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 1.000, 'y' => 0.455, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 1.000, 'y' => 0.000, 'k' => 0.455, ),
								  ),
		'darkcyan'             => array(
									  'hex' => '#008B8B',
									  'rgb' => array( 'r' => 0, 'g' => 139, 'b' => 139, ),
									  'hsl' => array( 'h' => 180.000, 's' => 1.000, 'l' => 0.273, ),
									  'hsv' => array( 'h' => 180.000, 's' => 1.000, 'v' => 0.545, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 0.455, 'y' => 0.455, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.455, ),
								  ),
		'darkgoldenrod'        => array(
									  'hex' => '#B8860B',
									  'rgb' => array( 'r' => 184, 'g' => 134, 'b' => 11, ),
									  'hsl' => array( 'h' => 42.659, 's' => 0.887, 'l' => 0.382, ),
									  'hsv' => array( 'h' => 42.659, 's' => 0.940, 'v' => 0.722, ),
									  'cmy' => array( 'c' => 0.278, 'm' => 0.475, 'y' => 0.957, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.272, 'y' => 0.940, 'k' => 0.278, ),
								  ),
		'darkgray'             => array(
									  'hex' => '#A9A9A9',
									  'rgb' => array( 'r' => 169, 'g' => 169, 'b' => 169, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.000, 'l' => 0.663, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.000, 'v' => 0.663, ),
									  'cmy' => array( 'c' => 0.337, 'm' => 0.337, 'y' => 0.337, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.337, ),
								  ),
		'darkgreen'            => array(
									  'hex' => '#006400',
									  'rgb' => array( 'r' => 0, 'g' => 100, 'b' => 0, ),
									  'hsl' => array( 'h' => 120.000, 's' => 1.000, 'l' => 0.196, ),
									  'hsv' => array( 'h' => 120.000, 's' => 1.000, 'v' => 0.392, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 0.608, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 0.000, 'y' => 1.000, 'k' => 0.608, ),
								  ),
		'darkgrey'             => array(
									  'hex' => '#A9A9A9',
									  'rgb' => array( 'r' => 169, 'g' => 169, 'b' => 169, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.000, 'l' => 0.663, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.000, 'v' => 0.663, ),
									  'cmy' => array( 'c' => 0.337, 'm' => 0.337, 'y' => 0.337, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.337, ),
								  ),
		'darkkhaki'            => array(
									  'hex' => '#BDB76B',
									  'rgb' => array( 'r' => 189, 'g' => 183, 'b' => 107, ),
									  'hsl' => array( 'h' => 55.610, 's' => 0.383, 'l' => 0.580, ),
									  'hsv' => array( 'h' => 55.610, 's' => 0.434, 'v' => 0.741, ),
									  'cmy' => array( 'c' => 0.259, 'm' => 0.282, 'y' => 0.580, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.032, 'y' => 0.434, 'k' => 0.259, ),
								  ),
		'darkmagenta'          => array(
									  'hex' => '#8B008B',
									  'rgb' => array( 'r' => 139, 'g' => 0, 'b' => 139, ),
									  'hsl' => array( 'h' => 300.000, 's' => 1.000, 'l' => 0.273, ),
									  'hsv' => array( 'h' => 300.000, 's' => 1.000, 'v' => 0.545, ),
									  'cmy' => array( 'c' => 0.455, 'm' => 1.000, 'y' => 0.455, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 1.000, 'y' => 0.000, 'k' => 0.455, ),
								  ),
		'darkolivegreen'       => array(
									  'hex' => '#556B2F',
									  'rgb' => array( 'r' => 85, 'g' => 107, 'b' => 47, ),
									  'hsl' => array( 'h' => 82.000, 's' => 0.390, 'l' => 0.302, ),
									  'hsv' => array( 'h' => 82.000, 's' => 0.561, 'v' => 0.420, ),
									  'cmy' => array( 'c' => 0.667, 'm' => 0.580, 'y' => 0.816, ),
									  'cmyk' => array( 'c' => 0.206, 'm' => 0.000, 'y' => 0.561, 'k' => 0.580, ),
								  ),
		'darkorange'           => array(
									  'hex' => '#FF8C00',
									  'rgb' => array( 'r' => 255, 'g' => 140, 'b' => 0, ),
									  'hsl' => array( 'h' => 32.941, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 32.941, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.451, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.451, 'y' => 1.000, 'k' => 0.000, ),
								  ),
		'darkorchid'           => array(
									  'hex' => '#9932CC',
									  'rgb' => array( 'r' => 153, 'g' => 50, 'b' => 204, ),
									  'hsl' => array( 'h' => 280.130, 's' => 0.606, 'l' => 0.498, ),
									  'hsv' => array( 'h' => 280.130, 's' => 0.755, 'v' => 0.800, ),
									  'cmy' => array( 'c' => 0.400, 'm' => 0.804, 'y' => 0.200, ),
									  'cmyk' => array( 'c' => 0.250, 'm' => 0.755, 'y' => 0.000, 'k' => 0.200, ),
								  ),
		'darkred'              => array(
									  'hex' => '#8B0000',
									  'rgb' => array( 'r' => 139, 'g' => 0, 'b' => 0, ),
									  'hsl' => array( 'h' => 0.000, 's' => 1.000, 'l' => 0.273, ),
									  'hsv' => array( 'h' => 0.000, 's' => 1.000, 'v' => 0.545, ),
									  'cmy' => array( 'c' => 0.455, 'm' => 1.000, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 1.000, 'y' => 1.000, 'k' => 0.455, ),
								  ),
		'darksalmon'           => array(
									  'hex' => '#E9967A',
									  'rgb' => array( 'r' => 233, 'g' => 150, 'b' => 122, ),
									  'hsl' => array( 'h' => 15.135, 's' => 0.716, 'l' => 0.696, ),
									  'hsv' => array( 'h' => 15.135, 's' => 0.476, 'v' => 0.914, ),
									  'cmy' => array( 'c' => 0.086, 'm' => 0.412, 'y' => 0.522, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.356, 'y' => 0.476, 'k' => 0.086, ),
								  ),
		'darkseagreen'         => array(
									  'hex' => '#8FBC8F',
									  'rgb' => array( 'r' => 143, 'g' => 188, 'b' => 143, ),
									  'hsl' => array( 'h' => 120.000, 's' => 0.251, 'l' => 0.649, ),
									  'hsv' => array( 'h' => 120.000, 's' => 0.239, 'v' => 0.737, ),
									  'cmy' => array( 'c' => 0.439, 'm' => 0.263, 'y' => 0.439, ),
									  'cmyk' => array( 'c' => 0.239, 'm' => 0.000, 'y' => 0.239, 'k' => 0.263, ),
								  ),
		'darkslateblue'        => array(
									  'hex' => '#483D8B',
									  'rgb' => array( 'r' => 72, 'g' => 61, 'b' => 139, ),
									  'hsl' => array( 'h' => 248.462, 's' => 0.390, 'l' => 0.392, ),
									  'hsv' => array( 'h' => 248.462, 's' => 0.561, 'v' => 0.545, ),
									  'cmy' => array( 'c' => 0.718, 'm' => 0.761, 'y' => 0.455, ),
									  'cmyk' => array( 'c' => 0.482, 'm' => 0.561, 'y' => 0.000, 'k' => 0.455, ),
								  ),
		'darkslategray'        => array(
									  'hex' => '#2F4F4F',
									  'rgb' => array( 'r' => 47, 'g' => 79, 'b' => 79, ),
									  'hsl' => array( 'h' => 180.000, 's' => 0.254, 'l' => 0.247, ),
									  'hsv' => array( 'h' => 180.000, 's' => 0.405, 'v' => 0.310, ),
									  'cmy' => array( 'c' => 0.816, 'm' => 0.690, 'y' => 0.690, ),
									  'cmyk' => array( 'c' => 0.405, 'm' => 0.000, 'y' => 0.000, 'k' => 0.690, ),
								  ),
		'darkslategrey'        => array(
									  'hex' => '#2F4F4F',
									  'rgb' => array( 'r' => 47, 'g' => 79, 'b' => 79, ),
									  'hsl' => array( 'h' => 180.000, 's' => 0.254, 'l' => 0.247, ),
									  'hsv' => array( 'h' => 180.000, 's' => 0.405, 'v' => 0.310, ),
									  'cmy' => array( 'c' => 0.816, 'm' => 0.690, 'y' => 0.690, ),
									  'cmyk' => array( 'c' => 0.405, 'm' => 0.000, 'y' => 0.000, 'k' => 0.690, ),
								  ),
		'darkturquoise'        => array(
									  'hex' => '#00CED1',
									  'rgb' => array( 'r' => 0, 'g' => 206, 'b' => 209, ),
									  'hsl' => array( 'h' => 180.861, 's' => 1.000, 'l' => 0.410, ),
									  'hsv' => array( 'h' => 180.861, 's' => 1.000, 'v' => 0.820, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 0.192, 'y' => 0.180, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 0.014, 'y' => 0.000, 'k' => 0.180, ),
								  ),
		'darkviolet'           => array(
									  'hex' => '#9400D3',
									  'rgb' => array( 'r' => 148, 'g' => 0, 'b' => 211, ),
									  'hsl' => array( 'h' => 282.085, 's' => 1.000, 'l' => 0.414, ),
									  'hsv' => array( 'h' => 282.085, 's' => 1.000, 'v' => 0.827, ),
									  'cmy' => array( 'c' => 0.420, 'm' => 1.000, 'y' => 0.173, ),
									  'cmyk' => array( 'c' => 0.299, 'm' => 1.000, 'y' => 0.000, 'k' => 0.173, ),
								  ),
		'deeppink'             => array(
									  'hex' => '#FF1493',
									  'rgb' => array( 'r' => 255, 'g' => 20, 'b' => 147, ),
									  'hsl' => array( 'h' => 327.574, 's' => 1.000, 'l' => 0.539, ),
									  'hsv' => array( 'h' => 327.574, 's' => 0.922, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.922, 'y' => 0.424, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.922, 'y' => 0.424, 'k' => 0.000, ),
								  ),
		'deepskyblue'          => array(
									  'hex' => '#00BFFF',
									  'rgb' => array( 'r' => 0, 'g' => 191, 'b' => 255, ),
									  'hsl' => array( 'h' => 195.059, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 195.059, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 0.251, 'y' => 0.000, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 0.251, 'y' => 0.000, 'k' => 0.000, ),
								  ),
		'dimgray'              => array(
									  'hex' => '#696969',
									  'rgb' => array( 'r' => 105, 'g' => 105, 'b' => 105, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.000, 'l' => 0.412, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.000, 'v' => 0.412, ),
									  'cmy' => array( 'c' => 0.588, 'm' => 0.588, 'y' => 0.588, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.588, ),
								  ),
		'dimgrey'              => array(
									  'hex' => '#696969',
									  'rgb' => array( 'r' => 105, 'g' => 105, 'b' => 105, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.000, 'l' => 0.412, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.000, 'v' => 0.412, ),
									  'cmy' => array( 'c' => 0.588, 'm' => 0.588, 'y' => 0.588, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.588, ),
								  ),
		'dodgerblue'           => array(
									  'hex' => '#1E90FF',
									  'rgb' => array( 'r' => 30, 'g' => 144, 'b' => 255, ),
									  'hsl' => array( 'h' => 209.600, 's' => 1.000, 'l' => 0.559, ),
									  'hsv' => array( 'h' => 209.600, 's' => 0.882, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.882, 'm' => 0.435, 'y' => 0.000, ),
									  'cmyk' => array( 'c' => 0.882, 'm' => 0.435, 'y' => 0.000, 'k' => 0.000, ),
								  ),
		'firebrick'            => array(
									  'hex' => '#B22222',
									  'rgb' => array( 'r' => 178, 'g' => 34, 'b' => 34, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.679, 'l' => 0.416, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.809, 'v' => 0.698, ),
									  'cmy' => array( 'c' => 0.302, 'm' => 0.867, 'y' => 0.867, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.809, 'y' => 0.809, 'k' => 0.302, ),
								  ),
		'floralwhite'          => array(
									  'hex' => '#FFFAF0',
									  'rgb' => array( 'r' => 255, 'g' => 250, 'b' => 240, ),
									  'hsl' => array( 'h' => 40.000, 's' => 1.000, 'l' => 0.971, ),
									  'hsv' => array( 'h' => 40.000, 's' => 0.059, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.020, 'y' => 0.059, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.020, 'y' => 0.059, 'k' => 0.000, ),
								  ),
		'forestgreen'          => array(
									  'hex' => '#228B22',
									  'rgb' => array( 'r' => 34, 'g' => 139, 'b' => 34, ),
									  'hsl' => array( 'h' => 120.000, 's' => 0.607, 'l' => 0.339, ),
									  'hsv' => array( 'h' => 120.000, 's' => 0.755, 'v' => 0.545, ),
									  'cmy' => array( 'c' => 0.867, 'm' => 0.455, 'y' => 0.867, ),
									  'cmyk' => array( 'c' => 0.755, 'm' => 0.000, 'y' => 0.755, 'k' => 0.455, ),
								  ),
		'fuchsia'              => array(
									  'hex' => '#FF00FF',
									  'rgb' => array( 'r' => 255, 'g' => 0, 'b' => 255, ),
									  'hsl' => array( 'h' => 300.000, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 300.000, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 1.000, 'y' => 0.000, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 1.000, 'y' => 0.000, 'k' => 0.000, ),
								  ),
		'gainsboro'            => array(
									  'hex' => '#DCDCDC',
									  'rgb' => array( 'r' => 220, 'g' => 220, 'b' => 220, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.000, 'l' => 0.863, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.000, 'v' => 0.863, ),
									  'cmy' => array( 'c' => 0.137, 'm' => 0.137, 'y' => 0.137, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.137, ),
								  ),
		'ghostwhite'           => array(
									  'hex' => '#F8F8FF',
									  'rgb' => array( 'r' => 248, 'g' => 248, 'b' => 255, ),
									  'hsl' => array( 'h' => 240.000, 's' => 1.000, 'l' => 0.986, ),
									  'hsv' => array( 'h' => 240.000, 's' => 0.027, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.027, 'm' => 0.027, 'y' => 0.000, ),
									  'cmyk' => array( 'c' => 0.027, 'm' => 0.027, 'y' => 0.000, 'k' => 0.000, ),
								  ),
		'gold'                 => array(
									  'hex' => '#FFD700',
									  'rgb' => array( 'r' => 255, 'g' => 215, 'b' => 0, ),
									  'hsl' => array( 'h' => 50.588, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 50.588, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.157, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.157, 'y' => 1.000, 'k' => 0.000, ),
								  ),
		'goldenrod'            => array(
									  'hex' => '#DAA520',
									  'rgb' => array( 'r' => 218, 'g' => 165, 'b' => 32, ),
									  'hsl' => array( 'h' => 42.903, 's' => 0.744, 'l' => 0.490, ),
									  'hsv' => array( 'h' => 42.903, 's' => 0.853, 'v' => 0.855, ),
									  'cmy' => array( 'c' => 0.145, 'm' => 0.353, 'y' => 0.875, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.243, 'y' => 0.853, 'k' => 0.145, ),
								  ),
		'gray'                 => array(
									  'hex' => '#808080',
									  'rgb' => array( 'r' => 128, 'g' => 128, 'b' => 128, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.000, 'l' => 0.502, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.000, 'v' => 0.502, ),
									  'cmy' => array( 'c' => 0.498, 'm' => 0.498, 'y' => 0.498, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.498, ),
								  ),
		'green'                => array(
									  'hex' => '#008000',
									  'rgb' => array( 'r' => 0, 'g' => 128, 'b' => 0, ),
									  'hsl' => array( 'h' => 120.000, 's' => 1.000, 'l' => 0.251, ),
									  'hsv' => array( 'h' => 120.000, 's' => 1.000, 'v' => 0.502, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 0.498, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 0.000, 'y' => 1.000, 'k' => 0.498, ),
								  ),
		'greenyellow'          => array(
									  'hex' => '#ADFF2F',
									  'rgb' => array( 'r' => 173, 'g' => 255, 'b' => 47, ),
									  'hsl' => array( 'h' => 83.654, 's' => 1.000, 'l' => 0.592, ),
									  'hsv' => array( 'h' => 83.654, 's' => 0.816, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.322, 'm' => 0.000, 'y' => 0.816, ),
									  'cmyk' => array( 'c' => 0.322, 'm' => 0.000, 'y' => 0.816, 'k' => 0.000, ),
								  ),
		'grey'                 => array(
									  'hex' => '#808080',
									  'rgb' => array( 'r' => 128, 'g' => 128, 'b' => 128, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.000, 'l' => 0.502, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.000, 'v' => 0.502, ),
									  'cmy' => array( 'c' => 0.498, 'm' => 0.498, 'y' => 0.498, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.498, ),
								  ),
		'honeydew'             => array(
									  'hex' => '#F0FFF0',
									  'rgb' => array( 'r' => 240, 'g' => 255, 'b' => 240, ),
									  'hsl' => array( 'h' => 120.000, 's' => 1.000, 'l' => 0.971, ),
									  'hsv' => array( 'h' => 120.000, 's' => 0.059, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.059, 'm' => 0.000, 'y' => 0.059, ),
									  'cmyk' => array( 'c' => 0.059, 'm' => 0.000, 'y' => 0.059, 'k' => 0.000, ),
								  ),
		'hotpink'              => array(
									  'hex' => '#FF69B4',
									  'rgb' => array( 'r' => 255, 'g' => 105, 'b' => 180, ),
									  'hsl' => array( 'h' => 330.000, 's' => 1.000, 'l' => 0.706, ),
									  'hsv' => array( 'h' => 330.000, 's' => 0.588, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.588, 'y' => 0.294, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.588, 'y' => 0.294, 'k' => 0.000, ),
								  ),
		'indianred'            => array(
									  'hex' => '#CD5C5C',
									  'rgb' => array( 'r' => 205, 'g' => 92, 'b' => 92, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.531, 'l' => 0.582, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.551, 'v' => 0.804, ),
									  'cmy' => array( 'c' => 0.196, 'm' => 0.639, 'y' => 0.639, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.551, 'y' => 0.551, 'k' => 0.196, ),
								  ),
		'indigo'               => array(
									  'hex' => '#4B0082',
									  'rgb' => array( 'r' => 75, 'g' => 0, 'b' => 130, ),
									  'hsl' => array( 'h' => 274.615, 's' => 1.000, 'l' => 0.255, ),
									  'hsv' => array( 'h' => 274.615, 's' => 1.000, 'v' => 0.510, ),
									  'cmy' => array( 'c' => 0.706, 'm' => 1.000, 'y' => 0.490, ),
									  'cmyk' => array( 'c' => 0.423, 'm' => 1.000, 'y' => 0.000, 'k' => 0.490, ),
								  ),
		'ivory'                => array(
									  'hex' => '#FFFFF0',
									  'rgb' => array( 'r' => 255, 'g' => 255, 'b' => 240, ),
									  'hsl' => array( 'h' => 60.000, 's' => 1.000, 'l' => 0.971, ),
									  'hsv' => array( 'h' => 60.000, 's' => 0.059, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.059, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.059, 'k' => 0.000, ),
								  ),
		'khaki'                => array(
									  'hex' => '#F0E68C',
									  'rgb' => array( 'r' => 240, 'g' => 230, 'b' => 140, ),
									  'hsl' => array( 'h' => 54.000, 's' => 0.769, 'l' => 0.745, ),
									  'hsv' => array( 'h' => 54.000, 's' => 0.417, 'v' => 0.941, ),
									  'cmy' => array( 'c' => 0.059, 'm' => 0.098, 'y' => 0.451, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.042, 'y' => 0.417, 'k' => 0.059, ),
								  ),
		'lavender'             => array(
									  'hex' => '#E6E6FA',
									  'rgb' => array( 'r' => 230, 'g' => 230, 'b' => 250, ),
									  'hsl' => array( 'h' => 240.000, 's' => 0.667, 'l' => 0.941, ),
									  'hsv' => array( 'h' => 240.000, 's' => 0.080, 'v' => 0.980, ),
									  'cmy' => array( 'c' => 0.098, 'm' => 0.098, 'y' => 0.020, ),
									  'cmyk' => array( 'c' => 0.080, 'm' => 0.080, 'y' => 0.000, 'k' => 0.020, ),
								  ),
		'lavenderblush'        => array(
									  'hex' => '#FFF0F5',
									  'rgb' => array( 'r' => 255, 'g' => 240, 'b' => 245, ),
									  'hsl' => array( 'h' => 340.000, 's' => 1.000, 'l' => 0.971, ),
									  'hsv' => array( 'h' => 340.000, 's' => 0.059, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.059, 'y' => 0.039, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.059, 'y' => 0.039, 'k' => 0.000, ),
								  ),
		'lawngreen'            => array(
									  'hex' => '#7CFC00',
									  'rgb' => array( 'r' => 124, 'g' => 252, 'b' => 0, ),
									  'hsl' => array( 'h' => 90.476, 's' => 1.000, 'l' => 0.494, ),
									  'hsv' => array( 'h' => 90.476, 's' => 1.000, 'v' => 0.988, ),
									  'cmy' => array( 'c' => 0.514, 'm' => 0.012, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 0.508, 'm' => 0.000, 'y' => 1.000, 'k' => 0.012, ),
								  ),
		'lemonchiffon'         => array(
									  'hex' => '#FFFACD',
									  'rgb' => array( 'r' => 255, 'g' => 250, 'b' => 205, ),
									  'hsl' => array( 'h' => 54.000, 's' => 1.000, 'l' => 0.902, ),
									  'hsv' => array( 'h' => 54.000, 's' => 0.196, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.020, 'y' => 0.196, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.020, 'y' => 0.196, 'k' => 0.000, ),
								  ),
		'lightblue'            => array(
									  'hex' => '#ADD8E6',
									  'rgb' => array( 'r' => 173, 'g' => 216, 'b' => 230, ),
									  'hsl' => array( 'h' => 194.737, 's' => 0.533, 'l' => 0.790, ),
									  'hsv' => array( 'h' => 194.737, 's' => 0.248, 'v' => 0.902, ),
									  'cmy' => array( 'c' => 0.322, 'm' => 0.153, 'y' => 0.098, ),
									  'cmyk' => array( 'c' => 0.248, 'm' => 0.061, 'y' => 0.000, 'k' => 0.098, ),
								  ),
		'lightcoral'           => array(
									  'hex' => '#F08080',
									  'rgb' => array( 'r' => 240, 'g' => 128, 'b' => 128, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.789, 'l' => 0.722, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.467, 'v' => 0.941, ),
									  'cmy' => array( 'c' => 0.059, 'm' => 0.498, 'y' => 0.498, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.467, 'y' => 0.467, 'k' => 0.059, ),
								  ),
		'lightcyan'            => array(
									  'hex' => '#E0FFFF',
									  'rgb' => array( 'r' => 224, 'g' => 255, 'b' => 255, ),
									  'hsl' => array( 'h' => 180.000, 's' => 1.000, 'l' => 0.939, ),
									  'hsv' => array( 'h' => 180.000, 's' => 0.122, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.122, 'm' => 0.000, 'y' => 0.000, ),
									  'cmyk' => array( 'c' => 0.122, 'm' => 0.000, 'y' => 0.000, 'k' => 0.000, ),
								  ),
		'lightgoldenrodyellow' => array(
									  'hex' => '#FAFAD2',
									  'rgb' => array( 'r' => 250, 'g' => 250, 'b' => 210, ),
									  'hsl' => array( 'h' => 60.000, 's' => 0.800, 'l' => 0.902, ),
									  'hsv' => array( 'h' => 60.000, 's' => 0.160, 'v' => 0.980, ),
									  'cmy' => array( 'c' => 0.020, 'm' => 0.020, 'y' => 0.176, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.160, 'k' => 0.020, ),
								  ),
		'lightgray'            => array(
									  'hex' => '#D3D3D3',
									  'rgb' => array( 'r' => 211, 'g' => 211, 'b' => 211, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.000, 'l' => 0.827, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.000, 'v' => 0.827, ),
									  'cmy' => array( 'c' => 0.173, 'm' => 0.173, 'y' => 0.173, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.173, ),
								  ),
		'lightgreen'           => array(
									  'hex' => '#90EE90',
									  'rgb' => array( 'r' => 144, 'g' => 238, 'b' => 144, ),
									  'hsl' => array( 'h' => 120.000, 's' => 0.734, 'l' => 0.749, ),
									  'hsv' => array( 'h' => 120.000, 's' => 0.395, 'v' => 0.933, ),
									  'cmy' => array( 'c' => 0.435, 'm' => 0.067, 'y' => 0.435, ),
									  'cmyk' => array( 'c' => 0.395, 'm' => 0.000, 'y' => 0.395, 'k' => 0.067, ),
								  ),
		'lightgrey'            => array(
									  'hex' => '#D3D3D3',
									  'rgb' => array( 'r' => 211, 'g' => 211, 'b' => 211, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.000, 'l' => 0.827, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.000, 'v' => 0.827, ),
									  'cmy' => array( 'c' => 0.173, 'm' => 0.173, 'y' => 0.173, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.173, ),
								  ),
		'lightpink'            => array(
									  'hex' => '#FFB6C1',
									  'rgb' => array( 'r' => 255, 'g' => 182, 'b' => 193, ),
									  'hsl' => array( 'h' => 350.959, 's' => 1.000, 'l' => 0.857, ),
									  'hsv' => array( 'h' => 350.959, 's' => 0.286, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.286, 'y' => 0.243, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.286, 'y' => 0.243, 'k' => 0.000, ),
								  ),
		'lightsalmon'          => array(
									  'hex' => '#FFA07A',
									  'rgb' => array( 'r' => 255, 'g' => 160, 'b' => 122, ),
									  'hsl' => array( 'h' => 17.143, 's' => 1.000, 'l' => 0.739, ),
									  'hsv' => array( 'h' => 17.143, 's' => 0.522, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.373, 'y' => 0.522, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.373, 'y' => 0.522, 'k' => 0.000, ),
								  ),
		'lightseagreen'        => array(
									  'hex' => '#20B2AA',
									  'rgb' => array( 'r' => 32, 'g' => 178, 'b' => 170, ),
									  'hsl' => array( 'h' => 176.712, 's' => 0.695, 'l' => 0.412, ),
									  'hsv' => array( 'h' => 176.712, 's' => 0.820, 'v' => 0.698, ),
									  'cmy' => array( 'c' => 0.875, 'm' => 0.302, 'y' => 0.333, ),
									  'cmyk' => array( 'c' => 0.820, 'm' => 0.000, 'y' => 0.045, 'k' => 0.302, ),
								  ),
		'lightskyblue'         => array(
									  'hex' => '#87CEFA',
									  'rgb' => array( 'r' => 135, 'g' => 206, 'b' => 250, ),
									  'hsl' => array( 'h' => 202.957, 's' => 0.920, 'l' => 0.755, ),
									  'hsv' => array( 'h' => 202.957, 's' => 0.460, 'v' => 0.980, ),
									  'cmy' => array( 'c' => 0.471, 'm' => 0.192, 'y' => 0.020, ),
									  'cmyk' => array( 'c' => 0.460, 'm' => 0.176, 'y' => 0.000, 'k' => 0.020, ),
								  ),
		'lightslategray'       => array(
									  'hex' => '#778899',
									  'rgb' => array( 'r' => 119, 'g' => 136, 'b' => 153, ),
									  'hsl' => array( 'h' => 210.000, 's' => 0.143, 'l' => 0.533, ),
									  'hsv' => array( 'h' => 210.000, 's' => 0.222, 'v' => 0.600, ),
									  'cmy' => array( 'c' => 0.533, 'm' => 0.467, 'y' => 0.400, ),
									  'cmyk' => array( 'c' => 0.222, 'm' => 0.111, 'y' => 0.000, 'k' => 0.400, ),
								  ),
		'lightslategrey'       => array(
									  'hex' => '#778899',
									  'rgb' => array( 'r' => 119, 'g' => 136, 'b' => 153, ),
									  'hsl' => array( 'h' => 210.000, 's' => 0.143, 'l' => 0.533, ),
									  'hsv' => array( 'h' => 210.000, 's' => 0.222, 'v' => 0.600, ),
									  'cmy' => array( 'c' => 0.533, 'm' => 0.467, 'y' => 0.400, ),
									  'cmyk' => array( 'c' => 0.222, 'm' => 0.111, 'y' => 0.000, 'k' => 0.400, ),
								  ),
		'lightsteelblue'       => array(
									  'hex' => '#B0C4DE',
									  'rgb' => array( 'r' => 176, 'g' => 196, 'b' => 222, ),
									  'hsl' => array( 'h' => 213.913, 's' => 0.411, 'l' => 0.780, ),
									  'hsv' => array( 'h' => 213.913, 's' => 0.207, 'v' => 0.871, ),
									  'cmy' => array( 'c' => 0.310, 'm' => 0.231, 'y' => 0.129, ),
									  'cmyk' => array( 'c' => 0.207, 'm' => 0.117, 'y' => 0.000, 'k' => 0.129, ),
								  ),
		'lightyellow'          => array(
									  'hex' => '#FFFFE0',
									  'rgb' => array( 'r' => 255, 'g' => 255, 'b' => 224, ),
									  'hsl' => array( 'h' => 60.000, 's' => 1.000, 'l' => 0.939, ),
									  'hsv' => array( 'h' => 60.000, 's' => 0.122, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.122, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.122, 'k' => 0.000, ),
								  ),
		'lime'                 => array(
									  'hex' => '#00FF00',
									  'rgb' => array( 'r' => 0, 'g' => 255, 'b' => 0, ),
									  'hsl' => array( 'h' => 120.000, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 120.000, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 0.000, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 0.000, 'y' => 1.000, 'k' => 0.000, ),
								  ),
		'limegreen'            => array(
									  'hex' => '#32CD32',
									  'rgb' => array( 'r' => 50, 'g' => 205, 'b' => 50, ),
									  'hsl' => array( 'h' => 120.000, 's' => 0.608, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 120.000, 's' => 0.756, 'v' => 0.804, ),
									  'cmy' => array( 'c' => 0.804, 'm' => 0.196, 'y' => 0.804, ),
									  'cmyk' => array( 'c' => 0.756, 'm' => 0.000, 'y' => 0.756, 'k' => 0.196, ),
								  ),
		'linen'                => array(
									  'hex' => '#FAF0E6',
									  'rgb' => array( 'r' => 250, 'g' => 240, 'b' => 230, ),
									  'hsl' => array( 'h' => 30.000, 's' => 0.667, 'l' => 0.941, ),
									  'hsv' => array( 'h' => 30.000, 's' => 0.080, 'v' => 0.980, ),
									  'cmy' => array( 'c' => 0.020, 'm' => 0.059, 'y' => 0.098, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.040, 'y' => 0.080, 'k' => 0.020, ),
								  ),
		'magenta'              => array(
									  'hex' => '#FF00FF',
									  'rgb' => array( 'r' => 255, 'g' => 0, 'b' => 255, ),
									  'hsl' => array( 'h' => 300.000, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 300.000, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 1.000, 'y' => 0.000, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 1.000, 'y' => 0.000, 'k' => 0.000, ),
								  ),
		'maroon'               => array(
									  'hex' => '#800000',
									  'rgb' => array( 'r' => 128, 'g' => 0, 'b' => 0, ),
									  'hsl' => array( 'h' => 0.000, 's' => 1.000, 'l' => 0.251, ),
									  'hsv' => array( 'h' => 0.000, 's' => 1.000, 'v' => 0.502, ),
									  'cmy' => array( 'c' => 0.498, 'm' => 1.000, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 1.000, 'y' => 1.000, 'k' => 0.498, ),
								  ),
		'mediumaquamarine'     => array(
									  'hex' => '#66CDAA',
									  'rgb' => array( 'r' => 102, 'g' => 205, 'b' => 170, ),
									  'hsl' => array( 'h' => 159.612, 's' => 0.507, 'l' => 0.602, ),
									  'hsv' => array( 'h' => 159.612, 's' => 0.502, 'v' => 0.804, ),
									  'cmy' => array( 'c' => 0.600, 'm' => 0.196, 'y' => 0.333, ),
									  'cmyk' => array( 'c' => 0.502, 'm' => 0.000, 'y' => 0.171, 'k' => 0.196, ),
								  ),
		'mediumblue'           => array(
									  'hex' => '#0000CD',
									  'rgb' => array( 'r' => 0, 'g' => 0, 'b' => 205, ),
									  'hsl' => array( 'h' => 240.000, 's' => 1.000, 'l' => 0.402, ),
									  'hsv' => array( 'h' => 240.000, 's' => 1.000, 'v' => 0.804, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 1.000, 'y' => 0.196, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 1.000, 'y' => 0.000, 'k' => 0.196, ),
								  ),
		'mediumorchid'         => array(
									  'hex' => '#BA55D3',
									  'rgb' => array( 'r' => 186, 'g' => 85, 'b' => 211, ),
									  'hsl' => array( 'h' => 288.095, 's' => 0.589, 'l' => 0.580, ),
									  'hsv' => array( 'h' => 288.095, 's' => 0.597, 'v' => 0.827, ),
									  'cmy' => array( 'c' => 0.271, 'm' => 0.667, 'y' => 0.173, ),
									  'cmyk' => array( 'c' => 0.118, 'm' => 0.597, 'y' => 0.000, 'k' => 0.173, ),
								  ),
		'mediumpurple'         => array(
									  'hex' => '#9370DB',
									  'rgb' => array( 'r' => 147, 'g' => 112, 'b' => 219, ),
									  'hsl' => array( 'h' => 259.626, 's' => 0.598, 'l' => 0.649, ),
									  'hsv' => array( 'h' => 259.626, 's' => 0.489, 'v' => 0.859, ),
									  'cmy' => array( 'c' => 0.424, 'm' => 0.561, 'y' => 0.141, ),
									  'cmyk' => array( 'c' => 0.329, 'm' => 0.489, 'y' => 0.000, 'k' => 0.141, ),
								  ),
		'mediumseagreen'       => array(
									  'hex' => '#3CB371',
									  'rgb' => array( 'r' => 60, 'g' => 179, 'b' => 113, ),
									  'hsl' => array( 'h' => 146.723, 's' => 0.498, 'l' => 0.469, ),
									  'hsv' => array( 'h' => 146.723, 's' => 0.665, 'v' => 0.702, ),
									  'cmy' => array( 'c' => 0.765, 'm' => 0.298, 'y' => 0.557, ),
									  'cmyk' => array( 'c' => 0.665, 'm' => 0.000, 'y' => 0.369, 'k' => 0.298, ),
								  ),
		'mediumslateblue'      => array(
									  'hex' => '#7B68EE',
									  'rgb' => array( 'r' => 123, 'g' => 104, 'b' => 238, ),
									  'hsl' => array( 'h' => 248.507, 's' => 0.798, 'l' => 0.671, ),
									  'hsv' => array( 'h' => 248.507, 's' => 0.563, 'v' => 0.933, ),
									  'cmy' => array( 'c' => 0.518, 'm' => 0.592, 'y' => 0.067, ),
									  'cmyk' => array( 'c' => 0.483, 'm' => 0.563, 'y' => 0.000, 'k' => 0.067, ),
								  ),
		'mediumspringgreen'    => array(
									  'hex' => '#00FA9A',
									  'rgb' => array( 'r' => 0, 'g' => 250, 'b' => 154, ),
									  'hsl' => array( 'h' => 156.960, 's' => 1.000, 'l' => 0.490, ),
									  'hsv' => array( 'h' => 156.960, 's' => 1.000, 'v' => 0.980, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 0.020, 'y' => 0.396, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 0.000, 'y' => 0.384, 'k' => 0.020, ),
								  ),
		'mediumturquoise'      => array(
									  'hex' => '#48D1CC',
									  'rgb' => array( 'r' => 72, 'g' => 209, 'b' => 204, ),
									  'hsl' => array( 'h' => 177.810, 's' => 0.598, 'l' => 0.551, ),
									  'hsv' => array( 'h' => 177.810, 's' => 0.656, 'v' => 0.820, ),
									  'cmy' => array( 'c' => 0.718, 'm' => 0.180, 'y' => 0.200, ),
									  'cmyk' => array( 'c' => 0.656, 'm' => 0.000, 'y' => 0.024, 'k' => 0.180, ),
								  ),
		'mediumvioletred'      => array(
									  'hex' => '#C71585',
									  'rgb' => array( 'r' => 199, 'g' => 21, 'b' => 133, ),
									  'hsl' => array( 'h' => 322.247, 's' => 0.809, 'l' => 0.431, ),
									  'hsv' => array( 'h' => 322.247, 's' => 0.894, 'v' => 0.780, ),
									  'cmy' => array( 'c' => 0.220, 'm' => 0.918, 'y' => 0.478, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.894, 'y' => 0.332, 'k' => 0.220, ),
								  ),
		'midnightblue'         => array(
									  'hex' => '#191970',
									  'rgb' => array( 'r' => 25, 'g' => 25, 'b' => 112, ),
									  'hsl' => array( 'h' => 240.000, 's' => 0.635, 'l' => 0.269, ),
									  'hsv' => array( 'h' => 240.000, 's' => 0.777, 'v' => 0.439, ),
									  'cmy' => array( 'c' => 0.902, 'm' => 0.902, 'y' => 0.561, ),
									  'cmyk' => array( 'c' => 0.777, 'm' => 0.777, 'y' => 0.000, 'k' => 0.561, ),
								  ),
		'mintcream'            => array(
									  'hex' => '#F5FFFA',
									  'rgb' => array( 'r' => 245, 'g' => 255, 'b' => 250, ),
									  'hsl' => array( 'h' => 150.000, 's' => 1.000, 'l' => 0.980, ),
									  'hsv' => array( 'h' => 150.000, 's' => 0.039, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.039, 'm' => 0.000, 'y' => 0.020, ),
									  'cmyk' => array( 'c' => 0.039, 'm' => 0.000, 'y' => 0.020, 'k' => 0.000, ),
								  ),
		'mistyrose'            => array(
									  'hex' => '#FFE4E1',
									  'rgb' => array( 'r' => 255, 'g' => 228, 'b' => 225, ),
									  'hsl' => array( 'h' => 6.000, 's' => 1.000, 'l' => 0.941, ),
									  'hsv' => array( 'h' => 6.000, 's' => 0.118, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.106, 'y' => 0.118, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.106, 'y' => 0.118, 'k' => 0.000, ),
								  ),
		'moccasin'             => array(
									  'hex' => '#FFE4B5',
									  'rgb' => array( 'r' => 255, 'g' => 228, 'b' => 181, ),
									  'hsl' => array( 'h' => 38.108, 's' => 1.000, 'l' => 0.855, ),
									  'hsv' => array( 'h' => 38.108, 's' => 0.290, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.106, 'y' => 0.290, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.106, 'y' => 0.290, 'k' => 0.000, ),
								  ),
		'navajowhite'          => array(
									  'hex' => '#FFDEAD',
									  'rgb' => array( 'r' => 255, 'g' => 222, 'b' => 173, ),
									  'hsl' => array( 'h' => 35.854, 's' => 1.000, 'l' => 0.839, ),
									  'hsv' => array( 'h' => 35.854, 's' => 0.322, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.129, 'y' => 0.322, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.129, 'y' => 0.322, 'k' => 0.000, ),
								  ),
		'navy'                 => array(
									  'hex' => '#000080',
									  'rgb' => array( 'r' => 0, 'g' => 0, 'b' => 128, ),
									  'hsl' => array( 'h' => 240.000, 's' => 1.000, 'l' => 0.251, ),
									  'hsv' => array( 'h' => 240.000, 's' => 1.000, 'v' => 0.502, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 1.000, 'y' => 0.498, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 1.000, 'y' => 0.000, 'k' => 0.498, ),
								  ),
		'oldlace'              => array(
									  'hex' => '#FDF5E6',
									  'rgb' => array( 'r' => 253, 'g' => 245, 'b' => 230, ),
									  'hsl' => array( 'h' => 39.130, 's' => 0.852, 'l' => 0.947, ),
									  'hsv' => array( 'h' => 39.130, 's' => 0.091, 'v' => 0.992, ),
									  'cmy' => array( 'c' => 0.008, 'm' => 0.039, 'y' => 0.098, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.032, 'y' => 0.091, 'k' => 0.008, ),
								  ),
		'olive'                => array(
									  'hex' => '#808000',
									  'rgb' => array( 'r' => 128, 'g' => 128, 'b' => 0, ),
									  'hsl' => array( 'h' => 60.000, 's' => 1.000, 'l' => 0.251, ),
									  'hsv' => array( 'h' => 60.000, 's' => 1.000, 'v' => 0.502, ),
									  'cmy' => array( 'c' => 0.498, 'm' => 0.498, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 1.000, 'k' => 0.498, ),
								  ),
		'olivedrab'            => array(
									  'hex' => '#6B8E23',
									  'rgb' => array( 'r' => 107, 'g' => 142, 'b' => 35, ),
									  'hsl' => array( 'h' => 79.626, 's' => 0.605, 'l' => 0.347, ),
									  'hsv' => array( 'h' => 79.626, 's' => 0.754, 'v' => 0.557, ),
									  'cmy' => array( 'c' => 0.580, 'm' => 0.443, 'y' => 0.863, ),
									  'cmyk' => array( 'c' => 0.246, 'm' => 0.000, 'y' => 0.754, 'k' => 0.443, ),
								  ),
		'orange'               => array(
									  'hex' => '#FFA500',
									  'rgb' => array( 'r' => 255, 'g' => 165, 'b' => 0, ),
									  'hsl' => array( 'h' => 38.824, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 38.824, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.353, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.353, 'y' => 1.000, 'k' => 0.000, ),
								  ),
		'orangered'            => array(
									  'hex' => '#FF4500',
									  'rgb' => array( 'r' => 255, 'g' => 69, 'b' => 0, ),
									  'hsl' => array( 'h' => 16.235, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 16.235, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.729, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.729, 'y' => 1.000, 'k' => 0.000, ),
								  ),
		'orchid'               => array(
									  'hex' => '#DA70D6',
									  'rgb' => array( 'r' => 218, 'g' => 112, 'b' => 214, ),
									  'hsl' => array( 'h' => 302.264, 's' => 0.589, 'l' => 0.647, ),
									  'hsv' => array( 'h' => 302.264, 's' => 0.486, 'v' => 0.855, ),
									  'cmy' => array( 'c' => 0.145, 'm' => 0.561, 'y' => 0.161, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.486, 'y' => 0.018, 'k' => 0.145, ),
								  ),
		'palegoldenrod'        => array(
									  'hex' => '#EEE8AA',
									  'rgb' => array( 'r' => 238, 'g' => 232, 'b' => 170, ),
									  'hsl' => array( 'h' => 54.706, 's' => 0.667, 'l' => 0.800, ),
									  'hsv' => array( 'h' => 54.706, 's' => 0.286, 'v' => 0.933, ),
									  'cmy' => array( 'c' => 0.067, 'm' => 0.090, 'y' => 0.333, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.025, 'y' => 0.286, 'k' => 0.067, ),
								  ),
		'palegreen'            => array(
									  'hex' => '#98FB98',
									  'rgb' => array( 'r' => 152, 'g' => 251, 'b' => 152, ),
									  'hsl' => array( 'h' => 120.000, 's' => 0.925, 'l' => 0.790, ),
									  'hsv' => array( 'h' => 120.000, 's' => 0.394, 'v' => 0.984, ),
									  'cmy' => array( 'c' => 0.404, 'm' => 0.016, 'y' => 0.404, ),
									  'cmyk' => array( 'c' => 0.394, 'm' => 0.000, 'y' => 0.394, 'k' => 0.016, ),
								  ),
		'paleturquoise'        => array(
									  'hex' => '#AFEEEE',
									  'rgb' => array( 'r' => 175, 'g' => 238, 'b' => 238, ),
									  'hsl' => array( 'h' => 180.000, 's' => 0.649, 'l' => 0.810, ),
									  'hsv' => array( 'h' => 180.000, 's' => 0.265, 'v' => 0.933, ),
									  'cmy' => array( 'c' => 0.314, 'm' => 0.067, 'y' => 0.067, ),
									  'cmyk' => array( 'c' => 0.265, 'm' => 0.000, 'y' => 0.000, 'k' => 0.067, ),
								  ),
		'palevioletred'        => array(
									  'hex' => '#DB7093',
									  'rgb' => array( 'r' => 219, 'g' => 112, 'b' => 147, ),
									  'hsl' => array( 'h' => 340.374, 's' => 0.598, 'l' => 0.649, ),
									  'hsv' => array( 'h' => 340.374, 's' => 0.489, 'v' => 0.859, ),
									  'cmy' => array( 'c' => 0.141, 'm' => 0.561, 'y' => 0.424, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.489, 'y' => 0.329, 'k' => 0.141, ),
								  ),
		'papayawhip'           => array(
									  'hex' => '#FFEFD5',
									  'rgb' => array( 'r' => 255, 'g' => 239, 'b' => 213, ),
									  'hsl' => array( 'h' => 37.143, 's' => 1.000, 'l' => 0.918, ),
									  'hsv' => array( 'h' => 37.143, 's' => 0.165, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.063, 'y' => 0.165, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.063, 'y' => 0.165, 'k' => 0.000, ),
								  ),
		'peachpuff'            => array(
									  'hex' => '#FFDAB9',
									  'rgb' => array( 'r' => 255, 'g' => 218, 'b' => 185, ),
									  'hsl' => array( 'h' => 28.286, 's' => 1.000, 'l' => 0.863, ),
									  'hsv' => array( 'h' => 28.286, 's' => 0.275, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.145, 'y' => 0.275, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.145, 'y' => 0.275, 'k' => 0.000, ),
								  ),
		'peru'                 => array(
									  'hex' => '#CD853F',
									  'rgb' => array( 'r' => 205, 'g' => 133, 'b' => 63, ),
									  'hsl' => array( 'h' => 29.577, 's' => 0.587, 'l' => 0.525, ),
									  'hsv' => array( 'h' => 29.577, 's' => 0.693, 'v' => 0.804, ),
									  'cmy' => array( 'c' => 0.196, 'm' => 0.478, 'y' => 0.753, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.351, 'y' => 0.693, 'k' => 0.196, ),
								  ),
		'pink'                 => array(
									  'hex' => '#FFC0CB',
									  'rgb' => array( 'r' => 255, 'g' => 192, 'b' => 203, ),
									  'hsl' => array( 'h' => 349.524, 's' => 1.000, 'l' => 0.876, ),
									  'hsv' => array( 'h' => 349.524, 's' => 0.247, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.247, 'y' => 0.204, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.247, 'y' => 0.204, 'k' => 0.000, ),
								  ),
		'plum'                 => array(
									  'hex' => '#DDA0DD',
									  'rgb' => array( 'r' => 221, 'g' => 160, 'b' => 221, ),
									  'hsl' => array( 'h' => 300.000, 's' => 0.473, 'l' => 0.747, ),
									  'hsv' => array( 'h' => 300.000, 's' => 0.276, 'v' => 0.867, ),
									  'cmy' => array( 'c' => 0.133, 'm' => 0.373, 'y' => 0.133, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.276, 'y' => 0.000, 'k' => 0.133, ),
								  ),
		'powderblue'           => array(
									  'hex' => '#B0E0E6',
									  'rgb' => array( 'r' => 176, 'g' => 224, 'b' => 230, ),
									  'hsl' => array( 'h' => 186.667, 's' => 0.519, 'l' => 0.796, ),
									  'hsv' => array( 'h' => 186.667, 's' => 0.235, 'v' => 0.902, ),
									  'cmy' => array( 'c' => 0.310, 'm' => 0.122, 'y' => 0.098, ),
									  'cmyk' => array( 'c' => 0.235, 'm' => 0.026, 'y' => 0.000, 'k' => 0.098, ),
								  ),
		'purple'               => array(
									  'hex' => '#800080',
									  'rgb' => array( 'r' => 128, 'g' => 0, 'b' => 128, ),
									  'hsl' => array( 'h' => 300.000, 's' => 1.000, 'l' => 0.251, ),
									  'hsv' => array( 'h' => 300.000, 's' => 1.000, 'v' => 0.502, ),
									  'cmy' => array( 'c' => 0.498, 'm' => 1.000, 'y' => 0.498, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 1.000, 'y' => 0.000, 'k' => 0.498, ),
								  ),
		'red'                  => array(
									  'hex' => '#FF0000',
									  'rgb' => array( 'r' => 255, 'g' => 0, 'b' => 0, ),
									  'hsl' => array( 'h' => 0.000, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 0.000, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 1.000, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 1.000, 'y' => 1.000, 'k' => 0.000, ),
								  ),
		'rosybrown'            => array(
									  'hex' => '#BC8F8F',
									  'rgb' => array( 'r' => 188, 'g' => 143, 'b' => 143, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.251, 'l' => 0.649, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.239, 'v' => 0.737, ),
									  'cmy' => array( 'c' => 0.263, 'm' => 0.439, 'y' => 0.439, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.239, 'y' => 0.239, 'k' => 0.263, ),
								  ),
		'royalblue'            => array(
									  'hex' => '#4169E1',
									  'rgb' => array( 'r' => 65, 'g' => 105, 'b' => 225, ),
									  'hsl' => array( 'h' => 225.000, 's' => 0.727, 'l' => 0.569, ),
									  'hsv' => array( 'h' => 225.000, 's' => 0.711, 'v' => 0.882, ),
									  'cmy' => array( 'c' => 0.745, 'm' => 0.588, 'y' => 0.118, ),
									  'cmyk' => array( 'c' => 0.711, 'm' => 0.533, 'y' => 0.000, 'k' => 0.118, ),
								  ),
		'saddlebrown'          => array(
									  'hex' => '#8B4513',
									  'rgb' => array( 'r' => 139, 'g' => 69, 'b' => 19, ),
									  'hsl' => array( 'h' => 25.000, 's' => 0.759, 'l' => 0.310, ),
									  'hsv' => array( 'h' => 25.000, 's' => 0.863, 'v' => 0.545, ),
									  'cmy' => array( 'c' => 0.455, 'm' => 0.729, 'y' => 0.925, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.504, 'y' => 0.863, 'k' => 0.455, ),
								  ),
		'salmon'               => array(
									  'hex' => '#FA8072',
									  'rgb' => array( 'r' => 250, 'g' => 128, 'b' => 114, ),
									  'hsl' => array( 'h' => 6.176, 's' => 0.932, 'l' => 0.714, ),
									  'hsv' => array( 'h' => 6.176, 's' => 0.544, 'v' => 0.980, ),
									  'cmy' => array( 'c' => 0.020, 'm' => 0.498, 'y' => 0.553, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.488, 'y' => 0.544, 'k' => 0.020, ),
								  ),
		'sandybrown'           => array(
									  'hex' => '#F4A460',
									  'rgb' => array( 'r' => 244, 'g' => 164, 'b' => 96, ),
									  'hsl' => array( 'h' => 27.568, 's' => 0.871, 'l' => 0.667, ),
									  'hsv' => array( 'h' => 27.568, 's' => 0.607, 'v' => 0.957, ),
									  'cmy' => array( 'c' => 0.043, 'm' => 0.357, 'y' => 0.624, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.328, 'y' => 0.607, 'k' => 0.043, ),
								  ),
		'seagreen'             => array(
									  'hex' => '#2E8B57',
									  'rgb' => array( 'r' => 46, 'g' => 139, 'b' => 87, ),
									  'hsl' => array( 'h' => 146.452, 's' => 0.503, 'l' => 0.363, ),
									  'hsv' => array( 'h' => 146.452, 's' => 0.669, 'v' => 0.545, ),
									  'cmy' => array( 'c' => 0.820, 'm' => 0.455, 'y' => 0.659, ),
									  'cmyk' => array( 'c' => 0.669, 'm' => 0.000, 'y' => 0.374, 'k' => 0.455, ),
								  ),
		'seashell'             => array(
									  'hex' => '#FFF5EE',
									  'rgb' => array( 'r' => 255, 'g' => 245, 'b' => 238, ),
									  'hsl' => array( 'h' => 24.706, 's' => 1.000, 'l' => 0.967, ),
									  'hsv' => array( 'h' => 24.706, 's' => 0.067, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.039, 'y' => 0.067, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.039, 'y' => 0.067, 'k' => 0.000, ),
								  ),
		'sienna'               => array(
									  'hex' => '#A0522D',
									  'rgb' => array( 'r' => 160, 'g' => 82, 'b' => 45, ),
									  'hsl' => array( 'h' => 19.304, 's' => 0.561, 'l' => 0.402, ),
									  'hsv' => array( 'h' => 19.304, 's' => 0.719, 'v' => 0.627, ),
									  'cmy' => array( 'c' => 0.373, 'm' => 0.678, 'y' => 0.824, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.488, 'y' => 0.719, 'k' => 0.373, ),
								  ),
		'silver'               => array(
									  'hex' => '#C0C0C0',
									  'rgb' => array( 'r' => 192, 'g' => 192, 'b' => 192, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.000, 'l' => 0.753, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.000, 'v' => 0.753, ),
									  'cmy' => array( 'c' => 0.247, 'm' => 0.247, 'y' => 0.247, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.247, ),
								  ),
		'skyblue'              => array(
									  'hex' => '#87CEEB',
									  'rgb' => array( 'r' => 135, 'g' => 206, 'b' => 235, ),
									  'hsl' => array( 'h' => 197.400, 's' => 0.714, 'l' => 0.725, ),
									  'hsv' => array( 'h' => 197.400, 's' => 0.426, 'v' => 0.922, ),
									  'cmy' => array( 'c' => 0.471, 'm' => 0.192, 'y' => 0.078, ),
									  'cmyk' => array( 'c' => 0.426, 'm' => 0.123, 'y' => 0.000, 'k' => 0.078, ),
								  ),
		'slateblue'            => array(
									  'hex' => '#6A5ACD',
									  'rgb' => array( 'r' => 106, 'g' => 90, 'b' => 205, ),
									  'hsl' => array( 'h' => 248.348, 's' => 0.535, 'l' => 0.578, ),
									  'hsv' => array( 'h' => 248.348, 's' => 0.561, 'v' => 0.804, ),
									  'cmy' => array( 'c' => 0.584, 'm' => 0.647, 'y' => 0.196, ),
									  'cmyk' => array( 'c' => 0.483, 'm' => 0.561, 'y' => 0.000, 'k' => 0.196, ),
								  ),
		'slategray'            => array(
									  'hex' => '#708090',
									  'rgb' => array( 'r' => 112, 'g' => 128, 'b' => 144, ),
									  'hsl' => array( 'h' => 210.000, 's' => 0.126, 'l' => 0.502, ),
									  'hsv' => array( 'h' => 210.000, 's' => 0.222, 'v' => 0.565, ),
									  'cmy' => array( 'c' => 0.561, 'm' => 0.498, 'y' => 0.435, ),
									  'cmyk' => array( 'c' => 0.222, 'm' => 0.111, 'y' => 0.000, 'k' => 0.435, ),
								  ),
		'slategrey'            => array(
									  'hex' => '#708090',
									  'rgb' => array( 'r' => 112, 'g' => 128, 'b' => 144, ),
									  'hsl' => array( 'h' => 210.000, 's' => 0.126, 'l' => 0.502, ),
									  'hsv' => array( 'h' => 210.000, 's' => 0.222, 'v' => 0.565, ),
									  'cmy' => array( 'c' => 0.561, 'm' => 0.498, 'y' => 0.435, ),
									  'cmyk' => array( 'c' => 0.222, 'm' => 0.111, 'y' => 0.000, 'k' => 0.435, ),
								  ),
		'snow'                 => array(
									  'hex' => '#FFFAFA',
									  'rgb' => array( 'r' => 255, 'g' => 250, 'b' => 250, ),
									  'hsl' => array( 'h' => 0.000, 's' => 1.000, 'l' => 0.990, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.020, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.020, 'y' => 0.020, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.020, 'y' => 0.020, 'k' => 0.000, ),
								  ),
		'springgreen'          => array(
									  'hex' => '#00FF7F',
									  'rgb' => array( 'r' => 0, 'g' => 255, 'b' => 127, ),
									  'hsl' => array( 'h' => 149.882, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 149.882, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 0.000, 'y' => 0.502, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 0.000, 'y' => 0.502, 'k' => 0.000, ),
								  ),
		'steelblue'            => array(
									  'hex' => '#4682B4',
									  'rgb' => array( 'r' => 70, 'g' => 130, 'b' => 180, ),
									  'hsl' => array( 'h' => 207.273, 's' => 0.440, 'l' => 0.490, ),
									  'hsv' => array( 'h' => 207.273, 's' => 0.611, 'v' => 0.706, ),
									  'cmy' => array( 'c' => 0.725, 'm' => 0.490, 'y' => 0.294, ),
									  'cmyk' => array( 'c' => 0.611, 'm' => 0.278, 'y' => 0.000, 'k' => 0.294, ),
								  ),
		'tan'                  => array(
									  'hex' => '#D2B48C',
									  'rgb' => array( 'r' => 210, 'g' => 180, 'b' => 140, ),
									  'hsl' => array( 'h' => 34.286, 's' => 0.438, 'l' => 0.686, ),
									  'hsv' => array( 'h' => 34.286, 's' => 0.333, 'v' => 0.824, ),
									  'cmy' => array( 'c' => 0.176, 'm' => 0.294, 'y' => 0.451, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.143, 'y' => 0.333, 'k' => 0.176, ),
								  ),
		'teal'                 => array(
									  'hex' => '#008080',
									  'rgb' => array( 'r' => 0, 'g' => 128, 'b' => 128, ),
									  'hsl' => array( 'h' => 180.000, 's' => 1.000, 'l' => 0.251, ),
									  'hsv' => array( 'h' => 180.000, 's' => 1.000, 'v' => 0.502, ),
									  'cmy' => array( 'c' => 1.000, 'm' => 0.498, 'y' => 0.498, ),
									  'cmyk' => array( 'c' => 1.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.498, ),
								  ),
		'thistle'              => array(
									  'hex' => '#D8BFD8',
									  'rgb' => array( 'r' => 216, 'g' => 191, 'b' => 216, ),
									  'hsl' => array( 'h' => 300.000, 's' => 0.243, 'l' => 0.798, ),
									  'hsv' => array( 'h' => 300.000, 's' => 0.116, 'v' => 0.847, ),
									  'cmy' => array( 'c' => 0.153, 'm' => 0.251, 'y' => 0.153, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.116, 'y' => 0.000, 'k' => 0.153, ),
								  ),
		'tomato'               => array(
									  'hex' => '#FF6347',
									  'rgb' => array( 'r' => 255, 'g' => 99, 'b' => 71, ),
									  'hsl' => array( 'h' => 9.130, 's' => 1.000, 'l' => 0.639, ),
									  'hsv' => array( 'h' => 9.130, 's' => 0.722, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.612, 'y' => 0.722, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.612, 'y' => 0.722, 'k' => 0.000, ),
								  ),
		'turquoise'            => array(
									  'hex' => '#40E0D0',
									  'rgb' => array( 'r' => 64, 'g' => 224, 'b' => 208, ),
									  'hsl' => array( 'h' => 174.000, 's' => 0.721, 'l' => 0.565, ),
									  'hsv' => array( 'h' => 174.000, 's' => 0.714, 'v' => 0.878, ),
									  'cmy' => array( 'c' => 0.749, 'm' => 0.122, 'y' => 0.184, ),
									  'cmyk' => array( 'c' => 0.714, 'm' => 0.000, 'y' => 0.071, 'k' => 0.122, ),
								  ),
		'violet'               => array(
									  'hex' => '#EE82EE',
									  'rgb' => array( 'r' => 238, 'g' => 130, 'b' => 238, ),
									  'hsl' => array( 'h' => 300.000, 's' => 0.761, 'l' => 0.722, ),
									  'hsv' => array( 'h' => 300.000, 's' => 0.454, 'v' => 0.933, ),
									  'cmy' => array( 'c' => 0.067, 'm' => 0.490, 'y' => 0.067, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.454, 'y' => 0.000, 'k' => 0.067, ),
								  ),
		'wheat'                => array(
									  'hex' => '#F5DEB3',
									  'rgb' => array( 'r' => 245, 'g' => 222, 'b' => 179, ),
									  'hsl' => array( 'h' => 39.091, 's' => 0.767, 'l' => 0.831, ),
									  'hsv' => array( 'h' => 39.091, 's' => 0.269, 'v' => 0.961, ),
									  'cmy' => array( 'c' => 0.039, 'm' => 0.129, 'y' => 0.298, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.094, 'y' => 0.269, 'k' => 0.039, ),
								  ),
		'white'                => array(
									  'hex' => '#FFFFFF',
									  'rgb' => array( 'r' => 255, 'g' => 255, 'b' => 255, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.000, 'l' => 1.000, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.000, ),
								  ),
		'whitesmoke'           => array(
									  'hex' => '#F5F5F5',
									  'rgb' => array( 'r' => 245, 'g' => 245, 'b' => 245, ),
									  'hsl' => array( 'h' => 0.000, 's' => 0.000, 'l' => 0.961, ),
									  'hsv' => array( 'h' => 0.000, 's' => 0.000, 'v' => 0.961, ),
									  'cmy' => array( 'c' => 0.039, 'm' => 0.039, 'y' => 0.039, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 0.000, 'k' => 0.039, ),
								  ),
		'yellow'               => array(
									  'hex' => '#FFFF00',
									  'rgb' => array( 'r' => 255, 'g' => 255, 'b' => 0, ),
									  'hsl' => array( 'h' => 60.000, 's' => 1.000, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 60.000, 's' => 1.000, 'v' => 1.000, ),
									  'cmy' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 1.000, ),
									  'cmyk' => array( 'c' => 0.000, 'm' => 0.000, 'y' => 1.000, 'k' => 0.000, ),
								  ),
		'yellowgreen'          => array(
									  'hex' => '#9ACD32',
									  'rgb' => array( 'r' => 154, 'g' => 205, 'b' => 50, ),
									  'hsl' => array( 'h' => 79.742, 's' => 0.608, 'l' => 0.500, ),
									  'hsv' => array( 'h' => 79.742, 's' => 0.756, 'v' => 0.804, ),
									  'cmy' => array( 'c' => 0.396, 'm' => 0.196, 'y' => 0.804, ),
									  'cmyk' => array( 'c' => 0.249, 'm' => 0.000, 'y' => 0.756, 'k' => 0.196, ),
								  ),
	);

	/**
	 * Constructor - initializes the color to 0° 0% 100% (#FFFFFF, white)
	 *
	 * @access public
	 * @param float $hue Default 0.0
	 * @param float $saturation 0.0
	 * @param float $lightness 1.0
	 * @return void
	 */
	public function __construct(  $hue = 0.0, $saturation = 0.0, $lightness = 1.0 )
	{
		$this->setHSL( $hue, $saturation, $lightness );
	}

	/**
	 * sets the current color
	 *
	 * Sets the HSL values, overwriting whatever was there previously.
	 *
	 * @access public
	 * @param float $hue The hue must be between 0 and 360
	 * @param float $saturation The saturation must be between 0 and 1
	 * @param float $lightness the lightness must be between 0 and 1
	 * @return void
	 */
	public function setHSL( $hue, $saturation, $lightness )
	{
		while ( $hue >= 360.0 ) {
			$hue -= 360.0;
		}
		while ( $hue < 0.0 ) {
			$hue += 360.0;
		}
		$saturation = $saturation > 1.0 ? 1.0 : $saturation < 0.0 ? 0.0 : $saturation;
		$lightness = $lightness > 1.0 ? 1.0 : $lightness < 0.0 ? 0.0 : $lightness;

		$this->_hue = $hue;
		$this->_saturation = $saturation;
		$this->_lightness = $lightness;
	}

	/**
	 * sets the current color
	 *
	 * The RGB is immediately converted in HSL and stored
	 *
	 * @access public
	 * @param integer $red The red color must between 0 and 255
	 * @param integer $green The green color must between 0 and 255
	 * @param integer $blue The blue color must between 0 and 255
	 * @return void
	 */
	public function setRGB( $red, $green, $blue )
	{
		$red = $red > 255 ? 255 : $red < 0 ? 0 : $red;
		$green = $green > 255 ? 255 : $green < 0 ? 0 : $green;
		$blue = $blue > 255 ? 255 : $blue < 0 ? 0 : $blue;

		$hsl = self::convertRGBToHSL( $red, $green, $blue );

		$this->setHSL( $hsl['h'], $hsl['s'], $hsl['l'] );
	}

	/**
	 * sets the current color
	 *
	 * Sets the HSL values, overwriting whatever was there previously. The string is in HTML/CSS hex-format.
	 *
	 * @access public
	 * @param string color in RGB string format (i.e. FFFFFF) or HTML color name
	 * @return void
	 */
	public function setRGBString( $html_string )
	{
		$RegExpHex = '/^([a-fA-F0-9]{3}|[a-fA-F0-9]{6})$/';
		$html_string = ltrim( $html_string, '#' );

		if ( preg_match( $RegExpHex, $html_string ) ) {
			$rgb = $this->splitRGBString( $html_string );
		} else if ( array_key_exists( strtolower( $html_string ), self::$_colorData ) ) {
			$html_string = ltrim( self::$_colorData[strtolower( $html_string )]['hex'], '#' );
			$rgb = $this->splitRGBString( $html_string );
		} else {
			$rgb = array( 'r' => 255, 'g' => 255, 'b' => 255);
		}

		$this->setRGB( $rgb['r'], $rgb['g'], $rgb['b'] );
	}

	/**
	 * sets the current color
	 *
	 * The CMY is immediately converted in HSL and stored
	 *
	 * @access public
	 * @param float $cyan The cyan color must between 0.0 and 1.0
	 * @param float $magenta The magenta color must between 0.0 and 1.0
	 * @param float $yellow The yellow color must between 0.0 and 1.0
	 * @return void
	 */
	public function setCMY( $cyan, $magenta, $yellow )
	{
		$cyan = $cyan < 0.0 ? 0.0 : $cyan > 1.0 ? 1.0 : $cyan;
		$magenta = $magenta < 0.0 ? 0.0 : $magenta > 1.0 ? 1.0 : $magenta;
		$yellow = $yellow < 0.0 ? 0.0 : $yellow > 1.0 ? 1.0 : $yellow;

		$hsl = self::convertRGBToHSL(
			( 1.0 - $cyan ) * 255,
			( 1.0 - $magenta ) * 255,
			( 1.0 - $yellow ) * 255
		);

		$this->setHSL( $hsl['h'], $hsl['s'], $hsl['l'] );
	}

	/**
	 * sets the current color
	 *
	 * The CMYK is immediately converted in HSL and stored
	 *
	 * @access public
	 * @param float $cyan The cyan color must between 0.0 and 1.0
	 * @param float $magenta The magenta color must between 0.0 and 1.0
	 * @param float $yellow The yellow color must between 0.0 and 1.0
	 * @param float $key The key color must between 0.0 and 1.0
	 * @return void
	 */
	public function setCMYK( $cyan, $magenta, $yellow, $key )
	{
		$cyan = $cyan < 0.0 ? 0.0 : $cyan > 1.0 ? 1.0 : $cyan;
		$magenta = $magenta < 0.0 ? 0.0 : $magenta > 1.0 ? 1.0 : $magenta;
		$yellow = $yellow < 0.0 ? 0.0 : $yellow > 1.0 ? 1.0 : $yellow;
		$key = $key < 0.0 ? 0.0 : $key > 1.0 ? 1.0 : $key;

		$c = ( $cyan * ( 1.0 - $key ) + $key );
		$m = ( $magenta * ( 1.0 - $key ) + $key );
		$y = ( $yellow * ( 1.0 - $key ) + $key );

		$this->setCMY( $c, $m, $y );
	}

	/**
	 * sets the current color
	 *
	 * The HSV is immediately converted in HSL and stored
	 *
	 * @access public
	 * @param float $hue The hue must be between 0 and 360
	 * @param float $saturation The saturation must be between 0 and 1
	 * @param float $value the value must be between 0 and 1
	 * @return void
	 */
	public function setHSV( $hue, $saturation, $value )
	{
		while ( $hue >= 360.0 ) {
			$hue -= 360.0;
		}
		while ( $hue < 0.0 ) {
			$hue += 360.0;
		}
		$saturation = $saturation > 1.0 ? 1.0 : $saturation < 0.0 ? 0.0 : $saturation;
		$value = $value > 1.0 ? 1.0 : $value < 0.0 ? 0.0 : $value;

		$var_lightness = ( 2.0 - $saturation ) * $value;
		$var_saturation = $saturation * $value;
		if ( $var_lightness <= 1.0 ) {
			$var_saturation /= $var_lightness;
		} else {
			$var_saturation /= ( 2.0 - $var_lightness );
		}
		$var_lightness /= 2.0;

		$this->_hue = $hue;
		$this->_saturation = $var_saturation;
		$this->_lightness = $var_lightness;
	}

	/**
	 * Returns an array containing the hue, saturation and lightness
	 *
	 * @access public
	 * @return array using template array( 'h' => ?, 's' => ?, 'l' => ? );
	 */
	public function getHSL()
	{
		return array(
			'h' => (float) $this->_hue,
			's' => (float) $this->_saturation,
			'l' => (float) $this->_lightness,
		);
	}

	/**
	 * Returns RGB array of the current color
	 *
	 * @access public
	 * @return array using template array( 'r' => ?, 'g' => ?, 'b' => ? );
	 */
	public function getRGB()
	{
		return self::convertHSLToRGB( $this->_hue, $this->_saturation, $this->_lightness );
	}

	/**
	 * Returns HTML color string in hex-format
	 *
	 * @access public
	 * @return string HTML color in the format #xxxxxx
	 */
	public function getRGBString()
	{
		return self::convertHSLToRGBString( $this->_hue, $this->_saturation, $this->_lightness );
	}

	/**
	 * Returns CMY array of the current color
	 *
	 * @access public
	 * @return array using template array( 'c' => ?, 'm' => ?, 'y' => ? );
	 */
	public function getCMY()
	{
		$rgb = self::convertHSLToRGB( $this->_hue, $this->_saturation, $this->_lightness );

		return array(
			'c' => (float) 1.0 - ( $rgb['r'] / 255.0 ),
			'm' => (float) 1.0 - ( $rgb['g'] / 255.0 ),
			'y' => (float) 1.0 - ( $rgb['b'] / 255.0 ),
		);
	}

	/**
	 * Returns CMYK array of the current color
	 *
	 * @access public
	 * @return array using template array( 'c' => ?, 'm' => ?, 'y' => ?, 'k' => ? );
	 */
	public function getCMYK()
	{
		$var_K = 1.0;
		$cmy = $this->getCMY();

		if ( $cmy['c'] < $var_K ) {
			$var_K = $cmy['c'];
		}
		if ( $cmy['m'] < $var_K ) {
			$var_K = $cmy['m'];
		}
		if ( $cmy['y'] < $var_K ) {
			$var_K = $cmy['y'];
		}
		if ( $var_K == 1.0 ) { //Black
			$c = 0.0;
			$m = 0.0;
			$y = 0.0;
		} else {
			$c = ( $cmy['c'] - $var_K ) / ( 1.0 - $var_K );
			$m = ( $cmy['m'] - $var_K ) / ( 1.0 - $var_K );
			$y = ( $cmy['y'] - $var_K ) / ( 1.0 - $var_K );
		}
		$k = $var_K;

		return array(
			'c' => (float) $c,
			'm' => (float) $m,
			'y' => (float) $y,
			'k' => (float) $k,
		);
	}

	/**
	 * Returns HSV array of the current color
	 *
	 * @access public
	 * @return array using template array( 'h' => ?, 's' => ?, 'v' => ? );
	 */
	public function getHSV()
	{
		$S = $this->_saturation;
		$L = $this->_lightness;

		$L *= 2.0;
		if ( $L <= 1.0 ) {
			$S *= $L;
		} else {
			$S *= ( 2.0 - $L );
		}

		return array(
			'h' => (float) $this->_hue,
			's' => (float) ( $L + $S ) != 0.0 ? ( 2.0 * $S ) / ( $L + $S ) : ( 2.0 * $S ),
			'v' => (float) ( $L + $S ) / 2.0,
		);
	}

	/**
	 * Alters the hue of the current color
	 *
	 * @access public
	 * @param float $degrees is the amount of change from the current hue
	 * @return void
	 */
	public function changeHue( $degrees )
	{
		$this->_hue += $degrees;

		while ( $this->_hue >= 360.0 ) {
			$this->_hue -= 360.0;
		}
		while ( $this->_hue < 0.0 ) {
			$this->_hue += 360.0;
		}
	}

	/**
	 * Alters the saturation of the current color
	 *
	 * The value passed in should be greater than -1 and less than 1. If by changing the saturation the value
	 * becomes greater than 1 or less than 0,  the saturation will be limited to the range of 0.0 to 1.0
	 *
	 * @access public
	 * @param float $amount is the total amount of saturation to be added to the current color, between -1 and 1
	 * @return void
	 */
	public function changeSaturation( $amount )
	{

		$this->_saturation += $amount;
		$this->_saturation = $this->_saturation > 1.0 ? 1.0 : $this->_saturation < 0.0 ? 0.0 : $this->_saturation;
	}

	/**
	 * Alters the lightness of the current color
	 *
	 * The value passed in should be greater than -1 and less than 1. If by changing the lightness the value
	 * becomes greater than 1 or less than 0,  the lightness will be limited to the range of 0.0 to 1.0
	 *
	 * @access public
	 * @param float $amount is the total amount of lightness to be added to the current color, between -1 and 1
	 * @return void
	 */
	public function changeLightness( $amount )
	{

		$this->_lightness += $amount;
		$this->_lightness = $this->_lightness > 1.0 ? 1.0 : $this->_lightness < 0.0 ? 0.0 : $this->_lightness;
	}

	/**
	 * Triadic  H° +/- 120°
	 * This is the typical configuration of three colors that are equally spaced from each other on the color wheel.
	 *
	 * @access public
	 * @return array Array with 2 HSLColor objects
	 */
	public function getTriadic()
	{
		$rightTriadic = new HSLColor( $this->_hue + 120.0, $this->_saturation, $this->_lightness );
		$leftTriadic = new HSLColor( $this->_hue - 120.0, $this->_saturation, $this->_lightness );
		return array(
			'right' => $rightTriadic,
			'left'  => $leftTriadic,
		);
	}

	/**
	 * Split complements H° +/- 150°
	 * This color scheme combines the two colors on either side of a color’s complement.
	 *
	 * @access public
	 * @return array Array with 2 HSLColor objects
	 */
	public function getSplitComplements()
	{
		$rightSplitComplement = new HSLColor( $this->_hue + 150.0, $this->_saturation, $this->_lightness );
		$leftSplitComplement = new HSLColor( $this->_hue - 150.0, $this->_saturation, $this->_lightness );
		return array(
			'right' => $rightSplitComplement,
			'left'  => $leftSplitComplement,
		);
	}

	/**
	 * Analogous H° +/- 30°
	 * Uses the colors of the same color temperature near each other on the wheel.
	 *
	 * @access public
	 * @return array Array with 2 HSLColor objects
	 */
	public function getAnalogous()
	{
		$rightAnalogous = new HSLColor( $this->_hue + 30.0, $this->_saturation, $this->_lightness );
		$leftAnalogous = new HSLColor( $this->_hue - 30.0, $this->_saturation, $this->_lightness );
		return array(
			'right' => $rightAnalogous,
			'left'  => $leftAnalogous,
		);
	}

	/**
	 * Complement H° + 180°
	 * This is the color opposite on the color wheel.
	 *
	 * @access public
	 * @return HSLColor HSLColor object
	 */
	public function getComplement()
	{
		$complement = new HSLColor( $this->_hue + 180.0, $this->_saturation, $this->_lightness );
		return $complement;
	}

	/**
	 * Converts RGB value to HSL value
	 *
	 * Function adapted from 'Computer Graphics: Principles and Practice',
	 * by Foley, van Dam, Feiner and Hughes.  Chapter 13; Achromatic and
	 * Colored Light.
	 * (siehe http://www.php.de/php-tipps-2005-2/32895-farbnuancen-aus-farbton-berechnen.html)
	 *
	 * @access public
	 * @param integer $red The red color must between 0 and 255
	 * @param integer $green The green color must between 0 and 255
	 * @param integer $blue The blue color must between 0 and 255
	 * @return array Array using template array( 'h' => ?, 's' => ?, 'l' => ? );
	 */
	public static function convertRGBToHSL( $red, $green, $blue )
	{
		$var_R = ( $red / 255 );                  // RGB from 0 to 255
		$var_G = ( $green / 255 );
		$var_B = ( $blue / 255 );

		$var_Min = min( $var_R, $var_G, $var_B ); // Min. value of RGB
		$var_Max = max( $var_R, $var_G, $var_B ); // Max. value of RGB
		$del_Max = $var_Max - $var_Min;           // Delta RGB value

		$L = ( $var_Max + $var_Min ) / 2;

		if ( $del_Max == 0 ) {                    // This is a gray, no chroma...
			$H = 0;                               // HSL results from 0 to 1
			$S = 0;
		} else {                                  // Chromatic data...
			if ( $L < 0.5 ) {
				$S = $del_Max / ( $var_Max + $var_Min );
			} else {
				$S = $del_Max / ( 2 - $var_Max - $var_Min );
			}

			$del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
			$del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
			$del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;

			if ( $var_R == $var_Max ) {
				$H = $del_B - $del_G;
			} else if ( $var_G == $var_Max ) {
				$H = ( 1 / 3 ) + $del_R - $del_B;
			} else if ( $var_B == $var_Max ) {
				$H = ( 2 / 3 ) + $del_G - $del_R;
			}

			if ( $H < 0 ) {
				$H += 1;
			}
			if ( $H > 1 ) {
				$H -= 1;
			}
		}

		return array(
			'h' => (float) $H * 360,
			's' => (float) $S,
			'l' => (float) $L,
		);
	}

	/**
	 * Converts HSL value to RGB value
	 *
	 * Function adapted from 'Computer Graphics: Principles and Practice',
	 * by Foley, van Dam, Feiner and Hughes.  Chapter 13; Achromatic and
	 * Colored Light.
	 * (siehe http://www.php.de/php-tipps-2005-2/32895-farbnuancen-aus-farbton-berechnen.html)
	 *
	 * @access public
	 * @param float $hue The hue must between 0 and 360
	 * @param float $saturation The saturation must between 0.0 and 1.0
	 * @param float $lightness The lightness must between 0.0 and 1.0
	 * @return array Array using template array( 'r' => ?, 'g' => ?, 'b' => ? );
	 */
	public static function convertHSLToRGB( $hue, $saturation, $lightness )
	{
		$hue = $hue / 360.0;

		if ( $saturation == 0.0 ) {
			$R = $lightness * 255;
			$G = $lightness * 255;
			$B = $lightness * 255;
		} else {
			if ( $lightness < 0.5 ) {
				$var_2 = $lightness * ( 1 + $saturation );
			} else {
				$var_2 = ( $lightness + $saturation ) - ( $saturation * $lightness );
			}

			$var_1 = 2 * $lightness - $var_2;

			$R = 255 * self::Hue_2_RGB( $var_1, $var_2, $hue + ( 1 / 3 ) );
			$G = 255 * self::Hue_2_RGB( $var_1, $var_2, $hue );
			$B = 255 * self::Hue_2_RGB( $var_1, $var_2, $hue - ( 1 / 3 ) );
		}

		$R = $R < 0.0 ? 0 : $R > 255.0 ? 255 : $R;
		$G = $G < 0.0 ? 0 : $G > 255.0 ? 255 : $G;
		$B = $B < 0.0 ? 0 : $B > 255.0 ? 255 : $B;

		return array(
			'r' => (int) round( $R ),
			'g' => (int) round( $G ),
			'b' => (int) round( $B ),
		);
	}

	/**
	 * Converts HSL value to HTML color string
	 *
	 * @access public
	 * @param float $hue The hue must between 0 and 360
	 * @param float $saturation The saturation must between 0.0 and 1.0
	 * @param float $lightness The lightness must between 0.0 and 1.0
	 * @return string HTML color in the format #xxxxxx
	 */
	public static function convertHSLToRGBString( $hue, $saturation, $lightness )
	{
		$rgb = self::convertHSLToRGB( $hue, $saturation, $lightness );
		return sprintf( '#%02X%02X%02X', $rgb['r'], $rgb['g'], $rgb['b'] );
	}

	/**
	 * Helperfunction for convertHSLToRGB()
	 *
	 * @access private
	 * @param float $v1
	 * @param float $v2
	 * @param float $vH
	 * @return float
	 */
	private static function Hue_2_RGB( $v1, $v2, $vH )
	{
		if ( $vH < 0.0 ) {
			$vH += 1;
		}
		if ( $vH > 1.0 ) {
			$vH -= 1;
		}
		if ( ( 6 * $vH ) < 1.0 ) {
			return( $v1 + ( $v2 - $v1 ) * 6 * $vH );
		}
		if ( ( 2 * $vH ) < 1.0 ) {
			return( $v2 );
		}
		if ( ( 3 * $vH ) < 2 ) {
			return( $v1 + ( $v2 - $v1 ) * ( ( 2 / 3 ) - $vH ) * 6 );
		}
		return( $v1 );
	}

	/**
	 * Helperfunction for setRGBString()
	 *
	 * @access private
	 * @param string color in RGB string format (i.e. FFFFFF)
	 * @return array using template array( 'r' => ?, 'g' => ?, 'b' => ? );
	 */
	private function splitRGBString( $html_string )
	{
		$length  = mb_strlen( $html_string );

		if ( $length == 3 ) {
			$r = mb_substr( $html_string, 0, 1 );
			$g = mb_substr( $html_string, 1, 1 );
			$b = mb_substr( $html_string, 2, 1 );

			$r = hexdec( $r . $r );
			$g = hexdec( $g . $g );
			$b = hexdec( $b . $b );
		} else {
			$r = mb_substr( $html_string, 0, 2 );
			$g = mb_substr( $html_string, 2, 2 );
			$b = mb_substr( $html_string, 4, 2 );

			$r = hexdec( $r );
			$g = hexdec( $g );
			$b = hexdec( $b );
		}

		return array(
			'r' => (int) $r,
			'g' => (int) $g,
			'b' => (int) $b,
		);
	}
}