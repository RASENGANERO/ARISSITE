<?php
$arUrlRewrite=array (
  3 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/([\\w\\d\\-]+)?(/)?(([\\w\\d\\-]+)(/)?)?#',
    'RULE' => 'REQUEST_OBJECT=$1&METHOD=$4',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  27 => 
  array (
    'CONDITION' => '#^/bitrix/services/yandex.market/trading/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/yandex.market/trading/index.php',
    'SORT' => 100,
  ),
  59 => 
  array (
    'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  61 => 
  array (
    'CONDITION' => '#^/video/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1&videoconf',
    'ID' => 'bitrix:im.router',
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  17 => 
  array (
    'CONDITION' => '#^/personal/history-of-orders/#',
    'RULE' => '',
    'ID' => 'bitrix:sale.personal.order',
    'PATH' => '/personal/history-of-orders/index.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  170 => 
  array (
    'CONDITION' => '#^/contacts/betonnye_zavody/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog.store',
    'PATH' => '/contacts/betonnye_zavody/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  160 => 
  array (
    'CONDITION' => '#^/info/klassy-betona/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/info/klassy-betona/index.php',
    'SORT' => 100,
  ),
  180 => 
  array (
    'CONDITION' => '#^/info/marki-betona/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/info/marki-betona/index.php',
    'SORT' => 100,
  ),
  60 => 
  array (
    'CONDITION' => '#^/online/(/?)([^/]*)#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  168 => 
  array (
    'CONDITION' => '#^/company/licenses/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/licenses/index.php',
    'SORT' => 100,
  ),
  96 => 
  array (
    'CONDITION' => '#^/company/vacancy/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/vacancy/index.php',
    'SORT' => 100,
  ),
  166 => 
  array (
    'CONDITION' => '#^/company/reviews/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/reviews/index.php',
    'SORT' => 100,
  ),
  178 => 
  array (
    'CONDITION' => '#^/company/klienty/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/partners/index.php',
    'SORT' => 100,
  ),
  138 => 
  array (
    'CONDITION' => '#^/company/staff/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/staff/index.php',
    'SORT' => 100,
  ),
  173 => 
  array (
    'CONDITION' => '#^/info/partner/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/info/partner/index.php',
    'SORT' => 100,
  ),
  94 => 
  array (
    'CONDITION' => '#^/company/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/news/index.php',
    'SORT' => 100,
  ),
  146 => 
  array (
    'CONDITION' => '#^/laboratoriya/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/laboratoriya/index.php',
    'SORT' => 100,
  ),
  106 => 
  array (
    'CONDITION' => '#^/company/docs/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/docs/index.php',
    'SORT' => 100,
  ),
  65 => 
  array (
    'CONDITION' => '#^/sharebasket/#',
    'RULE' => '',
    'ID' => 'aspro:basket.share.max',
    'PATH' => '/sharebasket/index.php',
    'SORT' => 100,
  ),
  174 => 
  array (
    'CONDITION' => '#^/primenenie/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/primenenie/index.php',
    'SORT' => 100,
  ),
  64 => 
  array (
    'CONDITION' => '#^/lookbooks/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/lookbooks/index.php',
    'SORT' => 100,
  ),
  16 => 
  array (
    'CONDITION' => '#^/personal/#',
    'RULE' => '',
    'ID' => 'bitrix:sale.personal.section',
    'PATH' => '/personal/index.php',
    'SORT' => 100,
  ),
  179 => 
  array (
    'CONDITION' => '#^/info/faq/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/info/faq/index.php',
    'SORT' => 100,
  ),
  52 => 
  array (
    'CONDITION' => '#^/contacts/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/contacts/',
    'SORT' => 100,
  ),
  184 => 
  array (
    'CONDITION' => '#^/projects/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/projects/index.php',
    'SORT' => 100,
  ),
  189 => 
  array (
    'CONDITION' => '#^/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/catalog/index.php',
    'SORT' => 100,
  ),
  188 => 
  array (
    'CONDITION' => '#^/uslugi/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/uslugi/index.php',
    'SORT' => 100,
  ),
  183 => 
  array (
    'CONDITION' => '#^/price/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/price/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/auth/#',
    'RULE' => '',
    'ID' => 'aspro:auth.max',
    'PATH' => '/auth/index.php',
    'SORT' => 100,
  ),
  103 => 
  array (
    'CONDITION' => '#^/sale/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/sale/index.php',
    'SORT' => 100,
  ),
  144 => 
  array (
    'CONDITION' => '#^/blog/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/blog/index.php',
    'SORT' => 100,
  ),
);
