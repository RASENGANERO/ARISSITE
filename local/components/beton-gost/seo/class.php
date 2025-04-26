<?php
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Loader;

class Seo extends CBitrixComponent
{
    protected $noindexParams = [
        //'oid'
    ];

    protected $noindexPages = [
        'beton-gost.ru' => [
            '/include/licenses_detail.php',
            '/help/warranty/',
            '/help/delivery/',
            '/help/payment/',
         ]
    ];

    protected $setCanonicalPages = [
         /*'beton-gost.ru' => [
            '/',
            '/catalog/nerudnye_materialy/galka/morskaya/morskaya_galka_belaya/',
            '/catalog/beton/granitnyy/beton_granit_m200_b15/',
            '/catalog/tsementnye_smesi/kladochnaya_smes/kladochnaya_smes_kladochnyy_rastvor_m150/',
            '/catalog/nerudnye_materialy/pesok/mytyy/pesok_mytyy_karernyy_1_5_2/',
            '/catalog/asfalt/asfaltovaya_kroshka/',
            '/catalog/beton/toshchiy_beton/toshchiy_beton_m200_b15_f100_zh4_w4/',
            '/catalog/beton/fibrobeton/fibrobeton_m400_b30_f300_w12_graviy/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_granitnyy/shcheben_granitnyy_5_20/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_graviynyy/shcheben_graviynyy_40_70/',
            '/catalog/tsementnye_smesi/cps/tsementno_peschanaya_smes_m200_b15/',
            '/catalog/beton/keramzitobeton/keramzitobeton_m300_b22_5_f150_w6_d2000/',
            '/catalog/beton/fibrobeton/fibrobeton_m550_b40_f300_w14_granit/',
            '/catalog/nerudnye_materialy/galka/morskaya/morskaya_galka_chernaya/',
            '/catalog/nerudnye_materialy/pesok/karernyy/pesok_karernyy_2_2_5/',
            '/catalog/asfalt/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_vtorichnyy/vtorichnyy_shcheben_20_40/',
            '/catalog/nerudnye_materialy/graviy/graviy_40_70/',
            '/catalog/tsementnye_smesi/kladochnaya_smes/kladochnaya_smes_kladochnyy_rastvor_m50/',
            '/catalog/beton/granitnyy/beton_granit_m600_b45/',
            '/catalog/beton/dlya-plity/',
            '/catalog/beton/gidrobeton/gidrotekhnicheskiy_beton_m400_b30_p3_w12_f300/',
            '/catalog/arenda/betononasosy/statsionarnyy_rastvoronasos_schwing/',
            '/catalog/beton/dlya-styazhki-pola/',
            '/catalog/beton/granitnyy/beton_granit_m450_b35/',
            '/catalog/nerudnye_materialy/pesok/seyanyy/pesok_seyanyy_rechnoy_1_1_5/',
            '/catalog/beton/fibrobeton/fibrobeton_m250_b20_f150_w6_graviy/',
            '/catalog/nerudnye_materialy/pesok/mytyy/pesok_mytyy_karernyy_2_5_3_5/',
            '/catalog/asfalt/goryachij/',
            '/catalog/beton/granitnyy/beton_granit_m400_b30/',
            '/catalog/nerudnye_materialy/pesok/mytyy/pesok_mytyy_karernyy_2_2_5/',
            '/catalog/nerudnye_materialy/pesok/',
            '/catalog/tsementnye_smesi/kladochnaya_smes/kladochnaya_smes_kladochnyy_rastvor_m250/',
            '/catalog/nerudnye_materialy/pesok/seyanyy/pesok_seyanyy_karernyy_2_5_3_5/',
            '/catalog/nerudnye_materialy/keramzit/keramzit_10_20/',
            '/catalog/asfalt/goryachij/shchebenochno_mastichnaya_asfaltobetonnaya_smes_shchma_20_na_bnd/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_izvestnyakovyy/shcheben_izvestnyakovyy_40_70/',
            '/catalog/nerudnye_materialy/pesok/mytyy/pesok_mytyy_rechnoy_2_2_5/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_vtorichnyy/betonnyy_shcheben_40_70/',
            '/price/',
            '/catalog/nerudnye_materialy/peschanaya_smes/',
            '/catalog/nerudnye_materialy/galka/rechnaya/rechnaya_galka_seraya/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_granitnyy/shcheben_granitnyy_120_150/',
            '/catalog/nerudnye_materialy/pesok/seyanyy/pesok_seyanyy_karernyy_2_2_5/',
            '/catalog/nerudnye_materialy/grunt/torf_verkhovoy/',
            '/catalog/arenda/betononasosy/',
            '/contacts/',
            '/catalog/nerudnye_materialy/keramzit/keramzit_0_5/',
            '/catalog/tsementnye_smesi/cps/tsementno_peschanaya_smes_tsps_m300_b22_5/',
            '/catalog/beton/polistirolbeton/polistirolbeton_m75_b5_f150_w6_d600/',
            '/catalog/tsementnye_smesi/kladochnaya_smes/kladochnaya_smes_kladochnyy_rastvor_m200/',
            '/catalog/nerudnye_materialy/grunt/pochvogrunt_ekonom/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_granitnyy/shcheben_granitnyy_2_5/',
            '/catalog/beton/granitnyy/beton_granit_m500_b40/',
            '/catalog/nerudnye_materialy/pesok/karernyy/pesok_karernyy_0_5_1/',
            '/catalog/beton/granitnyy/beton_granit_m300_b22_5/',
            '/catalog/nerudnye_materialy/galka/rechnaya/rechnaya_galka_chernaya/',
            '/catalog/beton/polistirolbeton/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_graviynyy/shcheben_graviynyy_5_20/',
            '/catalog/nerudnye_materialy/pesok/mytyy/pesok_mytyy_rechnoy_2_5_3_5/',
            '/catalog/arenda/betononasosy/betononasos_lineynyy/',
            '/catalog/nerudnye_materialy/keramzit/keramzit_20_40/',
            '/catalog/beton/fibrobeton/fibrobeton_m150_b12_5_f100_w4_graviy/',
            '/catalog/nerudnye_materialy/grunt/torf_nizinnyy/',
            '/catalog/nerudnye_materialy/pesok/seyanyy/pesok_seyanyy_karernyy_0_5_1/',
            '/catalog/arenda/betononasosy/betononasos_abn_42m/',
            '/catalog/tsementnye_rastvory/tsementno_peschanyy_rastvor/',
            '/catalog/beton/granitnyy/beton_granit_m350_b25/',
            '/catalog/tsementnye_rastvory/peskobeton/peskobeton_m300_b22_5/',
            '/catalog/beton/fibrobeton/fibrobeton_m100_b7_5_f100_w4_graviy/',
            '/catalog/arenda/betononasosy/betononasos_abn_32m/',
            '/catalog/beton/graviynyy/beton_m250_b20/',
            '/catalog/asfalt/goryachij/litoy_asfalt/',
            '/catalog/nerudnye_materialy/grunt/peskogrunt/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_granitnyy/shcheben_granitnyy_5_10/',
            '/catalog/beton/fibrobeton/fibrobeton_m350_b25_f200_w8_graviy/',
            '/catalog/nerudnye_materialy/pesok/karernyy/pesok_karernyy_1_5_2/',
            '/catalog/beton/keramzitobeton/keramzitobeton_m50_v3_5_f100_w4_d800/',
            '/catalog/beton/dlya-fundamenta/',
            '/catalog/tsementnye_rastvory/peskobeton/',
            '/catalog/beton/keramzitobeton/keramzitobeton_m200_b15_f150_w4_d1600/',
            '/catalog/beton/graviynyy/',
            '/catalog/beton/fibrobeton/fibrobeton_m300_b22_5_f200_w6_graviy/',
            '/catalog/beton/toshchiy_beton/',
            '/catalog/nerudnye_materialy/galka/rechnaya/rechnaya_galka_belaya/',
            '/catalog/tsementnye_smesi/cps/tsementno_peschanaya_smes_tsps_m400_b30/',
            '/catalog/arenda/betononasosy/betononasos_abn_28m/',
            '/catalog/nerudnye_materialy/pesok/rechnoy/pesok_rechnoy_1_5_2/',
            '/catalog/beton/graviynyy/beton_m100_b7_5/',
            '/catalog/beton/graviynyy/beton_m200_b15/',
            '/catalog/beton/mostovoy_beton/mostovoy_beton_m350_b25_f2_300_w8/',
            '/catalog/nerudnye_materialy/pesok/karernyy/pesok_karernyy_2_5_3_5/',
            '/catalog/nerudnye_materialy/pesok/rechnoy/pesok_rechnoy_2_5_3_5/',
            '/catalog/tsementnye_rastvory/peskobeton/peskobeton_m150_b12_5/',
            '/catalog/beton/keramzitobeton/',
            '/catalog/nerudnye_materialy/pesok/mytyy/pesok_mytyy_rechnoy_1_5_2/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_granitnyy/shcheben_granitnyy_70_120/',
            '/catalog/arenda/betononasosy/betononasos_abn_20m/',
            '/catalog/tsementnye_smesi/kladochnaya_smes/kladochnaya_smes_kladochnyy_rastvor_m300/',
            '/catalog/nerudnye_materialy/keramzit/keramzit_5_10/',
            '/catalog/beton/gidrobeton/gidrotekhnicheskiy_beton_m450_b35_p3_w12_f300/',
            '/catalog/asfalt/goryachij/shchebenochno_mastichnaya_asfaltobetonnaya_smes_shchma_15_na_bnd/',
            '/catalog/beton/toshchiy_beton/toshchiy_beton_m150_b12_5_f100_zh4_w4/',
            '/catalog/nerudnye_materialy/pesok/mytyy/pesok_mytyy_karernyy_0_5_1/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_granitnyy/shcheben_granitnyy_10_20/',
            '/dostavka/',
            '/catalog/beton/gidrobeton/gidrotekhnicheskiy_beton_m300_b22_5_p3_w8_f200/',
            '/catalog/beton/toshchiy_beton/toshchiy_beton_m100_b7_5_f50_zh3_w2/',
            '/catalog/nerudnye_materialy/pesok/seyanyy/pesok_seyanyy_rechnoy_2_5_3_5/',
            '/catalog/nerudnye_materialy/pesok/mytyy/pesok_mytyy_karernyy_1_1_5/',
            '/catalog/nerudnye_materialy/peschanaya_smes/peschano_graviynaya_smes_gost_23735_2014/',
            '/catalog/arenda/betononasosy/betononasos_abn_52m/',
            '/catalog/beton/granitnyy/beton_granit_m800_b60/',
            '/catalog/nerudnye_materialy/graviy/graviy_20_40/',
            '/catalog/tsementnye_rastvory/tsementno_peschanyy_rastvor/rastvor_tsementnyy_stroitelnyy_m150_b12_5/',
            '/catalog/nerudnye_materialy/galka/morskaya/morskaya_galka_tsvetnaya/',
            '/catalog/nerudnye_materialy/graviy/graviy_5_10/',
            '/catalog/beton/keramzitobeton/keramzitobeton_m250_b20_f150_w4_d1800/',
            '/catalog/arenda/betononasosy/betononasos_dlya_keramzitobetona_rotornyy/',
            '/catalog/beton/keramzitobeton/keramzitobeton_m150_b12_5_f100_w4_d1400/',
            '/catalog/beton/polistirolbeton/polistirolbeton_m50_b3_5_f150_w6_d400/',
            '/price/beton/',
            '/catalog/tsementnye_smesi/kladochnaya_smes/kladochnaya_smes_kladochnyy_rastvor_m100/',
            '/catalog/arenda/betononasosy/betononasos_abn_15m/',
            '/catalog/nerudnye_materialy/pesok/seyanyy/pesok_seyanyy_karernyy_1_1_5/',
            '/catalog/asfalt/goryachij/shchebenochno_mastichnaya_asfaltobetonnaya_smes_shchma_15_na_pbv/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_vtorichnyy/betonnyy_shcheben_5_20/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_vtorichnyy/betonnyy_shcheben_20_40/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_vtorichnyy/otsev_betonnyy/',
            '/catalog/nerudnye_materialy/peschanaya_smes/shchebenochno_peschanaya_smes_shchps_s5/',
            '/catalog/beton/mostovoy_beton/mostovoy_beton_m450_b35_f2_300_w12/',
            '/catalog/nerudnye_materialy/galka/',
            '/catalog/nerudnye_materialy/keramzit/',
            '/catalog/beton/graviynyy/beton_m400_b30/',
            '/catalog/beton/mostovoy_beton/mostovoy_beton_m400_b30_f2_300_w10/',
            '/catalog/tsementnye_rastvory/peskobeton/peskobeton_m100_b7_5/',
            '/catalog/beton/graviynyy/beton_m300_b22_5/',
            '/catalog/beton/mostovoy_beton/mostovoy_beton_m600_b45_f2_300_w14/',
            '/catalog/nerudnye_materialy/pesok/mytyy/pesok_mytyy_rechnoy_0_5_1/',
            '/catalog/nerudnye_materialy/graviy/graviy_5_20/',
            '/catalog/nerudnye_materialy/peschanaya_smes/shchebenochno_peschanaya_smes_shchps_s6/',
            '/catalog/beton/mostovoy_beton/mostovoy_beton_m550_b40_f2_300_w14/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_izvestnyakovyy/shcheben_izvestnyakovyy_20_40/',
            '/catalog/tsementnye_smesi/cps/',
            '/catalog/nerudnye_materialy/pesok/rechnoy/pesok_rechnoy_2_2_5/',
            '/catalog/nerudnye_materialy/pesok/seyanyy/pesok_seyanyy_rechnoy_1_5_2/',
            '/catalog/nerudnye_materialy/pesok/rechnoy/pesok_rechnoy_0_5_1/',
            '/catalog/beton/gidrobeton/gidrotekhnicheskiy_beton_m350_b25_p3_w10_f200/',
            '/catalog/tsementnye_smesi/',
            '/catalog/beton/graviynyy/beton_m150_b12_5/',
            '/catalog/nerudnye_materialy/galka/rechnaya/rechnaya_galka_tsvetnaya/',
            '/catalog/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_granitnyy/shcheben_granitnyy_40_70/',
            '/catalog/tsementnye_smesi/cps/tsementno_peschanaya_smes_m150_b12_5/',
            '/catalog/nerudnye_materialy/graviy/graviy_10_20/',
            '/catalog/tsementnye_rastvory/tsementno_peschanyy_rastvor/rastvor_tsementnyy_stroitelnyy_m250_b20/',
            '/catalog/arenda/betononasosy/betonomeshalka_s_nasosom_pumi/',
            '/catalog/nerudnye_materialy/grunt/pochvogrunt_premium/',
            '/catalog/beton/toshchiy_beton/toshchiy_beton_m300_b22_5_f150_zh4_w6/',
            '/catalog/arenda/betononasosy/pnevmonagnetatel/',
            '/catalog/nerudnye_materialy/peschanaya_smes/shchebenochno_peschanaya_smes_shchps_s3/',
            '/catalog/tsementnye_smesi/kladochnaya_smes/',
            '/catalog/tsementnye_rastvory/peskobeton/peskobeton_m250_b20/',
            '/catalog/tsementnye_rastvory/tsementno_peschanyy_rastvor/rastvor_tsementnyy_stroitelnyy_m300_b22_5/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_granitnyy/shcheben_granitnyy_20_40/',
            '/catalog/nerudnye_materialy/',
            '/catalog/nerudnye_materialy/shcheben/',
            '/catalog/nerudnye_materialy/graviy/',
            '/catalog/beton/gidrobeton/gidrotekhnicheskiy_beton_m250_b20_p3_w8_f200/',
            '/catalog/beton/granitnyy/beton_granit_m550_b40/',
            '/catalog/beton/keramzitobeton/keramzitobeton_m100_b7_5_f100_w4_d1200/',
            '/catalog/beton/graviynyy/beton_m350_b25/',
            '/catalog/tsementnye_smesi/cps/tsementno_peschanaya_smes_m100_b7_5/',
            '/catalog/nerudnye_materialy/grunt/pochvogrunt_universalnyy/',
            '/catalog/arenda/betononasosy/statsionarnyy_rastvoronasos_putzmeister/',
            '/catalog/asfalt/goryachij/shchebenochno_mastichnaya_asfaltobetonnaya_smes_shchma_20_na_pbv/',
            '/catalog/nerudnye_materialy/pesok/seyanyy/pesok_seyanyy_karernyy_1_5_2/',
            '/catalog/beton/fibrobeton/fibrobeton_m450_b35_f300_w12_granit/',
            '/catalog/beton/fibrobeton/fibrobeton_m600_b45_f300_w14_granit/',
            '/catalog/beton/dlya-zabora/',
            '/catalog/beton/fibrobeton/fibrobeton_m200_b15_f150_w4_graviy/',
            '/catalog/nerudnye_materialy/peschanaya_smes/shchebenochno_peschanaya_smes_shchps_s4/',
            '/catalog/tsementnye_rastvory/peskobeton/peskobeton_m200_b15/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_granitnyy/otsev_granitnyy_0_5/',
            '/catalog/nerudnye_materialy/pesok/seyanyy/pesok_seyanyy_rechnoy_0_5_1/',
            '/catalog/nerudnye_materialy/pesok/rechnoy/pesok_rechnoy_1_1_5/',
            '/catalog/arenda/',
            '/catalog/arenda/betononasosy/betononasos_abn_36m/',
            '/catalog/tsementnye_rastvory/tsementno_peschanyy_rastvor/rastvor_tsementnyy_stroitelnyy_m100_b7_5/',
            '/catalog/beton/gidrobeton/',
            '/catalog/beton/granitnyy/beton_granit_m1000_b80/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_vtorichnyy/vtorichnyy_shcheben_40_70/',
            '/catalog/tsementnye_rastvory/',
            '/catalog/nerudnye_materialy/pesok/mytyy/pesok_mytyy_rechnoy_1_1_5/',
            '/catalog/beton/granitnyy/',
            '/price/pesok/',
            '/catalog/tsementnye_smesi/kladochnaya_smes/kladochnaya_smes_kladochnyy_rastvor_m75/',
            '/catalog/beton/granitnyy/beton_granit_m700_b50/',
            '/catalog/arenda/betononasosy/betononasos_abn_24m/',
            '/catalog/beton/',
            '/catalog/beton/granitnyy/beton_granit_m250_b20/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_vtorichnyy/vtorichnyy_shcheben_5_20/',
            '/catalog/nerudnye_materialy/galka/morskaya/morskaya_galka_seraya/',
            '/catalog/nerudnye_materialy/grunt/chernozem/',
            '/catalog/nerudnye_materialy/pesok/dlya-pesochnicy/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_graviynyy/shcheben_graviynyy_20_40/',
            '/catalog/beton/toshchiy_beton/toshchiy_beton_m250_b20_f150_zh4_w6/',
            '/catalog/nerudnye_materialy/grunt/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_izvestnyakovyy/shcheben_izvestnyakovyy_5_20/',
            '/catalog/tsementnye_rastvory/tsementno_peschanyy_rastvor/rastvor_tsementnyy_stroitelnyy_m200_b15/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_granitnyy/shcheben_granitnyy_3_10/',
            '/catalog/nerudnye_materialy/pesok/seyanyy/pesok_seyanyy_rechnoy_2_2_5/',
            '/catalog/nerudnye_materialy/pesok/karernyy/pesok_karernyy_1_1_5/',
            '/catalog/nerudnye_materialy/peschanaya_smes/obogashchennaya_peschano_graviynaya_smes_opgs_gost_23735_2014/',
            '/catalog/beton/fibrobeton/',
            '/catalog/tsementnye_rastvory/tsementno_peschanyy_rastvor/tsementnoe_molochko/',
            '/catalog/nerudnye_materialy/grunt/peregnoy/',
            '/catalog/beton/mostovoy_beton/',
            '/catalog/arenda/betononasosy/betononasos_abn_62m/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_vtorichnyy/betonnyj/',
            '/catalog/nerudnye_materialy/galka/krupnaya/',
            '/catalog/nerudnye_materialy/galka/seraya/',
            '/catalog/nerudnye_materialy/galka/cvetnaya/',
            '/catalog/nerudnye_materialy/galka/landshaftnaya/',
            '/catalog/nerudnye_materialy/galka/belaya/',
            '/catalog/nerudnye_materialy/galka/dlya-dorozhek/',
            '/catalog/nerudnye_materialy/galka/melkaya/',
            '/catalog/nerudnye_materialy/galka/dekorativnaya/',
            '/catalog/nerudnye_materialy/galka/chernaya/',
            '/catalog/nerudnye_materialy/keramzit/dlya-pola/',
            '/catalog/nerudnye_materialy/keramzit/keramzitovyj-gravij/',
            '/catalog/nerudnye_materialy/keramzit/keramzitovyj-pesok/',
            '/dostavka/shcherbinka/',
            '/dostavka/nahabino/',
            '/dostavka/zhukovskij/',
            '/dostavka/volokolamsk/',
            '/dostavka/lobnya/',
            '/dostavka/reutov/',
            '/dostavka/vysokovsk/',
            '/catalog/nerudnye_materialy/galka/morskaya/',
            '/dostavka/pushkino/',
            '/dostavka/orekhovo-zuevo/',
            '/dostavka/ehlektrostal/',
            '/dostavka/chernogolovka/',
            '/dostavka/dubna/',
            '/dostavka/vidnoe/',
            '/dostavka/krasnoarmejsk/',
            '/dostavka/hotkovo/',
            '/dostavka/dmitrov/',
            '/dostavka/dedovsk/',
            '/dostavka/kubinka/',
            '/dostavka/lytkarino/',
            '/dostavka/himki/',
            '/dostavka/ivanteevka/',
            '/dostavka/vereya/',
            '/dostavka/dzerzhinskij/',
            '/dostavka/ruza/',
            '/dostavka/klin/',
            '/dostavka/mytishchi/',
            '/dostavka/zheleznodorozhnyj/',
            '/dostavka/klimovsk/',
            '/dostavka/mozhajsk/',
            '/catalog/nerudnye_materialy/galka/rechnaya/',
            '/dostavka/aprelevka/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_graviynyy/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_granitnyy/',
            '/catalog/nerudnye_materialy/pesok/rechnoy/',
            '/catalog/nerudnye_materialy/pesok/seyanyy/',
            '/catalog/nerudnye_materialy/pesok/mytyy/',
            '/catalog/nerudnye_materialy/pesok/dlya-shvov/',
            '/catalog/nerudnye_materialy/pesok/dorozhnyj/',
            '/catalog/nerudnye_materialy/pesok/srednij/',
            '/catalog/nerudnye_materialy/pesok/dlya-betona/',
            '/catalog/nerudnye_materialy/pesok/karernyy/',
            '/catalog/nerudnye_materialy/pesok/dlya-fundamenta/',
            '/catalog/nerudnye_materialy/pesok/melkij/',
            '/catalog/nerudnye_materialy/pesok/krupnyj/',
            '/catalog/asfalt/asfaltovaya_kroshka/tonna/',
            '/catalog/asfalt/asfaltovaya_kroshka/drobilka/',
            '/catalog/asfalt/asfaltovaya_kroshka/freza/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_izvestnyakovyy/',
            '/catalog/nerudnye_materialy/shcheben/20-40/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_vtorichnyy/',
            '/catalog/asfalt/krupnozernistyj/',
            '/catalog/asfalt/peschanyj/',
            '/catalog/asfalt/b/',
            '/catalog/asfalt/d/',
            '/catalog/asfalt/v/',
            '/catalog/asfalt/shchma/',
            '/catalog/asfalt/g/',
            '/catalog/asfalt/poristyj/',
            '/catalog/asfalt/a/',
            '/catalog/asfalt/melkozernistyj/',
            '/catalog/beton/suhoj/',
            '/catalog/beton/dlya-otmostki/',
            '/catalog/beton/teplyj/',
            '/catalog/beton/himicheskij/',
            '/catalog/beton/morozostojkij/',
            '/catalog/beton/remontnyj/',
            '/catalog/beton/rastvor/',
            '/catalog/beton/iznosostojkij/',
            '/catalog/beton/tovarnyj/',
            '/catalog/beton/dorozhnyj/',
            '/catalog/beton/legkij/',
            '/catalog/beton/monolitnyj/',
            '/catalog/beton/vodonepronicaemyj/',
            '/catalog/beton/dlya-lestnicy/',
            '/catalog/beton/tyazhyolyj/',
            '/catalog/beton/zhidkij/',
            '/catalog/nerudnye_materialy/pesok/suhoj/',
            '/catalog/nerudnye_materialy/pesok/dlya-trotuarnoj-plitki/',
            '/catalog/nerudnye_materialy/pesok/2-3/',
            '/catalog/nerudnye_materialy/pesok/dlya-styazhki/',
            '/catalog/nerudnye_materialy/pesok/2-2-5/',
            '/catalog/nerudnye_materialy/pesok/prirodnyj/',
            '/catalog/nerudnye_materialy/pesok/2-5-3-5/',
            '/catalog/nerudnye_materialy/pesok/1-5-2-5/',
            '/catalog/nerudnye_materialy/peschanaya_smes/shchps/',
            '/catalog/arenda/betononasosy/statsionarnyy/',
            '/catalog/arenda/betononasosy/rastvoronasosy/',
            '/catalog/arenda/betononasosy/mini/',
            '/catalog/nerudnye_materialy/shcheben/dekorativnyj/',
            '/catalog/nerudnye_materialy/shcheben/dlya-drenazha/',
            '/catalog/nerudnye_materialy/sypuchie_materialy/',
            '/catalog/nerudnye_materialy/shcheben/40-70/',
            '/catalog/nerudnye_materialy/shcheben/5-10/',
            '/catalog/nerudnye_materialy/shcheben/dlya-dorozhek/',
            '/catalog/nerudnye_materialy/shcheben/dlya-dorogi/',
            '/catalog/nerudnye_materialy/shcheben/dlya-fundamenta/',
            '/catalog/nerudnye_materialy/shcheben/dlya-betona/',
            '/catalog/nerudnye_materialy/shcheben/5-20/',
            '/catalog/nerudnye_materialy/grunt/torf/',
            '/catalog/nerudnye_materialy/grunt/pochvogrunt/',
            '/catalog/nerudnye_materialy/grunt/universalnyj/',
            '/catalog/nerudnye_materialy/grunt/dlya-rassady/',
            '/catalog/nerudnye_materialy/shcheben/shcheben_vtorichnyy/boj_betona/',
        ]*/
    ];

    protected function isPaginationPage()
    {
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                if (strpos($key, 'PAGEN_') !== false) {
                    return true;
                }
            }
        }

        return false;
    }

    protected function setCanonical()
    {
        global $APPLICATION;
        global $arRegion;
        $curDir = $APPLICATION->GetCurDir();
        $baseDomain = "beton-gost.ru";

        if (!$APPLICATION->GetPageProperty("SET_CANONICAL")) {
            if (!empty($arRegion['PROPERTY_MAIN_DOMAIN_VALUE'])) {
                $domain = "https://" . $arRegion['PROPERTY_MAIN_DOMAIN_VALUE'];
                if (
                    array_key_exists($arRegion['PROPERTY_MAIN_DOMAIN_VALUE'], $this->setCanonicalPages) && 
                    in_array($curDir, $this->setCanonicalPages[$arRegion['PROPERTY_MAIN_DOMAIN_VALUE']]) &&
                    !$this->isPaginationPage()
                ) {
                   $APPLICATION->AddHeadString("<link rel='canonical' href='".$domain.$curDir."' />");
                } else {
                    if ($arRegion['PROPERTY_MAIN_DOMAIN_VALUE'] != $baseDomain && $curDir != '/include/' && !$this->isPaginationPage()) {
                      $APPLICATION->AddHeadString("<link rel='canonical' href='".$domain.$curDir."' />");
                    }
                }
            }
        }

    }

    protected function setNoindex()
    {
        global $APPLICATION;
        global $arRegion;
        $curDir = $APPLICATION->GetCurDir();

        $isPresent = false;

        foreach ($_GET as $key => $value) {
           if (in_array($key, $this->noindexParams)) {
                $isPresent = true;
                break;
           }
        }


        /*if (
            !$isPresent && 
            preg_match('#/filter/#siu', $_SERVER['SCRIPT_URL']) &&
            strpos($_SERVER['SCRIPT_URL'], 'frost-is') === false &&
            strpos($_SERVER['SCRIPT_URL'], 'classes-is') === false &&
            strpos($_SERVER['SCRIPT_URL'], 'fluidity-is') === false &&
            strpos($_SERVER['SCRIPT_URL'], 'water_resistant-is') === false &&
            strpos($_SERVER['SCRIPT_URL'], 'fibra-is') === false
        ) {
           $isPresent = true;
        }*/

        $isSetNoindex = $APPLICATION->GetPageProperty("SET_NOINDEX");

        if (!empty($arRegion['PROPERTY_MAIN_DOMAIN_VALUE']) && array_key_exists($arRegion['PROPERTY_MAIN_DOMAIN_VALUE'], $this->noindexPages)) {
            if (in_array($curDir, $this->noindexPages[$arRegion['PROPERTY_MAIN_DOMAIN_VALUE']])) {
                $isSetNoindex = true;
            }
        }
        
        if ($isPresent || $isSetNoindex) {
            $APPLICATION->SetPageProperty("robots", "noindex, nofollow");
        }
    }

    public function generationForCatalogFilter() 
    {
        global $APPLICATION;
        $sectionId = $APPLICATION->GetPageProperty('sectionId');
        $uf_arresult = CIBlockSection::GetList(["SORT"=>"ASC"], ["IBLOCK_ID" => 26, 'ACTIVE' => 'Y', "ID" => $sectionId, 'UF_SHOW_FILTER_RELINK' => true], false, []);
        
        if ($uf_arresult->GetNext() && $APPLICATION->GetPageProperty('is_catalog_section') && strpos($_SERVER['SCRIPT_URL'], '/filter/') !== false) {
            //if (!empty($_COOKIE['dev'])) {
                $url = rtrim($_SERVER['SCRIPT_URL'], '/apply');
                $urlSegments = explode('/filter', $url);
                $urlSegments = explode('/', trim($urlSegments[1], '/'));
                $segment = array_shift($urlSegments);
                if (!empty($segment) && strpos($segment, '-is-')) {
                    $filterName = null;
                    $settings = [
                        'fibra' => [
                            'type' => 'highloadblock',
                            'id'   => 5,
                        ],
                        'classes' => [
                            'type' => 'infoblock',
                            'id'   => 33,
                        ],
                        'frost' => [
                            'type' => 'list',
                            'id'   => 26,
                            'code' => 'FROST',
                        ],
                        'fluidity' => [
                            'type' => 'list',
                            'id'   => 26,
                            'code' => 'FLUIDITY',
                        ],
                        'water_resistant' => [
                            'type' => 'list',
                            'id'   => 26,
                            'code' => 'WATER_RESISTANT',
                        ],
                    ];
                    $segment = explode('-is-', $segment);

                    if (array_key_exists($segment[0], $settings)) {
                        if ($settings[$segment[0]]['type'] === 'highloadblock') {
                            if (CModule::IncludeModule('highloadblock')) {
                                $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById($settings[$segment[0]]['id'])->fetch();
                                $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
                                $strEntityDataClass = $obEntity->getDataClass();
                                $resData = $strEntityDataClass::getList(array(
                                    'select' => array('ID', 'UF_NAME'),
                                    'filter' => array('UF_XML_ID' => $segment[1]),
                                    'order'  => array('ID' => 'ASC'),
                                    'limit'  => 1,
                                ));
                                if ($arItem = $resData->Fetch()) {
                                    $filterName = $arItem['UF_NAME'];
                                }
                            }
                        } elseif ($settings[$segment[0]]['type'] === 'infoblock') {
                            $arSelect = ["ID", "IBLOCK_ID", "NAME"];
                            $arFilter = ["IBLOCK_ID" => $settings[$segment[0]]['id'], "CODE" => $segment[1]];
                            $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
                            if ($ob = $res->GetNextElement()){ 
                                $arFields = $ob->GetFields();
                                $filterName = $arFields['NAME']; 
                            }
                        } elseif ($settings[$segment[0]]['type'] === 'list') {
                            $property_enums = CIBlockPropertyEnum::GetList(
                                ["DEF" => "DESC", "SORT" => "ASC"], 
                                ["IBLOCK_ID" => $settings[$segment[0]]['id'], "CODE" => $settings[$segment[0]]['code'], "XML_ID" => $segment[1]]
                            );
                            if ($enum_fields = $property_enums->GetNext()) {
                                $filterName = $enum_fields["VALUE"];
                            }
                        }
                    }

                    if (!empty($filterName)) {
                        $h1 = $APPLICATION->GetTitle() . ' ' . $filterName;
                        $APPLICATION->SetTitle($h1);
                        $APPLICATION->SetPageProperty('title', "{$h1} - купить с доставкой по #REGION_NAME_DECLINE_TP#, цена за м3");
                        $APPLICATION->SetPageProperty('description', "#ZAVOD_NAME# производит и продает по низкой цене {$h1} с доставкой по #REGION_NAME_DECLINE_TP# и #SELECT_8#. Оформить заявку ☎ #TEL_PHONE#");
                    }
                }
            //}
        }
    }
    
    public function executeComponent()
    {
        $this->setNoindex();
        $this->setCanonical();
        $this->generationForCatalogFilter();
    }
}