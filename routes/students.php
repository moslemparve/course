<?php 
$array = [ 'Sabiha Batool'  =>	'03422839956',
'Shahida batool'  =>	'03497144712',
'Rizwana batool'  =>	'03408812967',
'Masuma zehra' =>	'03555378395',
'Rahila Eraj'  =>	'03488163536',
'Zahida batool'  =>	'03555282834',
'Nadia batool' =>	'03498147108',
'Nadiabatool'  =>	'03498147108',
'Safura Batool'  =>	'03555778373',
'Muhammad kazim' =>	'03554390772',
'Samina yousuf'  =>	'03555031182',
'Kaneez zehra'  =>	'03555930582',
'Sabiha Habib'  =>	'03495586952',
'qaiser hassan' =>	'03555454375',
'Inayat Hussain' =>	'03438802229',
'Syeda Sawera'  =>	'03419656979',
'Syed Muhammad Jawad'  =>	'03462795899',
'Musharaf Ali' =>	'03554347938',
'Muhammad javid' =>	'03488005157',
'Saliha Altaf'  =>	'03475890804',
'Asiya batool'  =>	'03554706178',
'Sania samreen' =>	'03555191482',
'Urooj  Fatima' =>	'03463883803',
'Masooma batool'  =>	'03499191828',
'Taskeen zehra'  =>	'03469532248',
'Kanwal fatima' =>	'03554128270',
'Madiha batool' =>	'03431184069' ];
foreach ($array as $key => $value) {
    $array[$key] = '+92' . substr($value, 1);
}
print(json_encode($array));