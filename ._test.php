<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Web\HttpClient;

		$getter = new HttpClient();
		$getter->setStreamTimeout(25);
		$getter->setRedirect(true);

		if ($result = $getter->get("http://beton-gost.ru/uslugi/raschet_obyema_betona/")) {
			$headers = $getter->getHeaders()->toArray();
		}
		
		var_dump($result, $headers);


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");