<?
//Замените названия module.name1, module.name2, module.name3 и так далее на модули которые хотите скрыть от серверов битрикса
$arModules = array(
'aspro.max',
'ithive.amchartscomponent',
'intervolga.tips',
'ammina.backup',
'skyweb24.bidding',
'goodde.yandexturboapi',
'eshopapp',
'ldap',
'sotbit.seometa'
);

foreach($arModules as $val){
    if(isset($arClientModules[$val])) unset($arClientModules[$val]);
}
?>