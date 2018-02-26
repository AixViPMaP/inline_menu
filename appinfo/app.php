<?php
/**
 * @author Lukas Koschmieder <lukas.koschmieder@rwth-aachen.de>
 * @author Alper Topaloglu <alper.topaloglu@rwth-aachen.de>
 * @copyright Copyright (c) 2017-18 RWTH Aachen University
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 */

$stylesheetLink = \OC::$server->getURLGenerator()->linkToRoute(
	'inline_menu.App.stylesheet',
	[
		'v' => \OC::$server->getConfig()->getAppValue('theming', 'cachebuster', '0'),
	]
);

\OCP\Util::addHeader(
	'link',
	[
		'rel' => 'stylesheet',
		'href' => $stylesheetLink,
	]
);
