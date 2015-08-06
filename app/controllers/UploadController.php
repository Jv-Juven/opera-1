<?php

use Qiniu\Auth;

class UploadController extends \BaseController {

	public function getUpToken()
	{
		$accessKey = 'ftC668Tvh8pxsfr5IEFLguzH4Huh1hRJDwDrswhu';
		$secretKey = 's6qCdCReUHy-uYjo0d_jc_ZoQjUEHw2cwu55VwXg';
		$auth = new Auth($accessKey, $secretKey);

		$bucket = 'opera';
		$upToken = $auth->uploadToken($bucket);

		return Response::json(array("uptoken" => $upToken));
	}
}






