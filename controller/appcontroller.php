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

namespace OCA\Inline_menu\Controller;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataDownloadResponse;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IRequest;

class AppController extends \OCP\AppFramework\Controller {

	public function __construct($appName, IRequest $request, ITimeFactory $timeFactory) {
		parent::__construct($appName, $request);
		$this->timeFactory = $timeFactory;
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * @return DataDownloadResponse
	 */
	public function stylesheet() {
		$params = [];
		$template = new TemplateResponse('inline_menu', 'inline_menu', $params, 'blank');
		$response = new DataDownloadResponse($template->render(), 'style', 'text/css');
		$response->addHeader('Expires', date(\DateTime::RFC2822, $this->timeFactory->getTime()));
		$response->addHeader('Pragma', 'cache');
		$response->cacheFor(3600);
		return $response;
	}

}
