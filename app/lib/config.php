<?

/*******************************************************************************
* Filename : config.php
* Description : configuration
*******************************************************************************/

## DEBUG ##
$app['debug'] = 0;

## MAGIC QUOTES ON/OFF ##
$app['magic_quote'] = 1;

## SEMESTER ##
$app['semester']['1']="Gasal";
$app['semester']['2']="Genap";
$app['semester']['3']="Pendek";

## BANK ##
$app['bank']['009']="BNI 46";
$app['bank']['002']="BRI";
$app['bank']['200']="BTN";
$app['bank']['008']="MANDIRI";

## STATUS ACTIVE ##
$app['active']['0']="Tidak aktif";
$app['active']['1']="Aktif";

## STATUS PEMBAYARAN ##
$app['status_pembayaran']['0']="Belum bayar";
$app['status_pembayaran']['1']="Lunas";

## PASSWORD EXPIRE (DAY) ##
$app['password_expired'] = 14;

## LANGUAGE ##
//$app[language]['ina'] = "Indonesia";
$app['language']['eng'] = "English";

## ERROR MESSAGE SIAKAD ##
$app['err']['01']="Silahkan anda melakukan pembayaran terlebih dahulu melalui Bank mitra yang ditunjuk oleh UM secara online!";
$app['err']['02']="Anda belum melakukan registrasi semester kemarin. Silahkan anda melakukan registrasi manual di bagian Registrasi dan Statistik UM di Gedung A3 Lantai 1!";
$app['err']['03']="Anda telah mengambil cuti kuliah di semester kemarin. Silahkan anda melakukan registrasi manual di bagian Registrasi dan Statistik UM di Gedung A3 Lantai 1!";
$app['err']['04']="Status anda semester kemarin tidak jelas (tidak registrasi dan tidak mengambil cuti kuliah). Silahkan anda melakukan registrasi manual di bagian Registrasi dan Statistik UM di Gedung A3 Lantai 1!";
$app['err']['05']="Status registrasi anda belum masuk ke sistem. Silahkan anda melakukan registrasi manual di bagian Registrasi dan Statistik UM di Gedung A3 Lantai 1!";

## PAGING ##
$app['paging']['default'] = 10;
$app['paging']['max'] = 25;
$app['paging']['min'] = 5;
$app['paging']['option'] = array(5, 10, 25, 50, 60, 70, 80, 90, 100, 150, 200, 250, 300, 350, 400, 450, 500);


## SIZE IMAGE ##
$app['thumbnail']['width'] = 125;
$app['thumbnail']['height'] = 102;
$app['thumbnail']['size'] = 120;
$app['picture']['width'] = 300;
$app['picture']['height'] = 300;
$app['picture']['size'] = 500;
## SIZE PERSONAL PICTURE ##
#$app[personal_picture]['width'] = 149;
$app['personal_picture']['width'] = 150;
$app['personal_picture']['height'] = 200;
$app['personal_picture']['size'] = 300;

## SIZE FILE ##
$app['max_contract_file'] = 5;
$app['max_contract_size'] = 1024;
$app['file']['size'] = 2000;
$app['file_download']['size'] = 8192;


$app['month_ind']['1']="Januari";
$app['month_ind']['2']="Pebruari";
$app['month_ind']['3']="Maret";
$app['month_ind']['4']="April";
$app['month_ind']['5']="Mei";
$app['month_ind']['6']="Juni";
$app['month_ind']['7']="Juli";
$app['month_ind']['8']="Agustus";
$app['month_ind']['9']="September";
$app['month_ind']['10']="Oktober";
$app['month_ind']['11']="November";
$app['month_ind']['12']="Desember";

## MONTH INA ##
$app['month_ina']['Jan']="01";
$app['month_ina']['Feb']="02";
$app['month_ina']['Mar']="03";
$app['month_ina']['Apr']="04";
$app['month_ina']['Mei']="05";
$app['month_ina']['Jun']="06";
$app['month_ina']['Jul']="07";
$app['month_ina']['Agt']="08";
$app['month_ina']['Sep']="09";
$app['month_ina']['Okt']="10";
$app['month_ina']['Nov']="11";
$app['month_ina']['Des']="12";

## MONTH ENG ##
$app['month_eng']['Jan']="01";
$app['month_eng']['Feb']="02";
$app['month_eng']['Mar']="03";
$app['month_eng']['Apr']="04";
$app['month_eng']['May']="05";
$app['month_eng']['Jun']="06";
$app['month_eng']['Jul']="07";
$app['month_eng']['Aug']="08";
$app['month_eng']['Sep']="09";
$app['month_eng']['Oct']="10";
$app['month_eng']['Nov']="11";
$app['month_eng']['Dec']="12";

$app['kode_hari'] = array('1','2','3','4','5','6','7','|');
$app['nama_hari']['1'] = 'Senin';
$app['nama_hari']['2'] = 'Selasa';
$app['nama_hari']['3'] = 'Rabu';
$app['nama_hari']['4'] = 'Kamis';
$app['nama_hari']['5'] = 'Jumat';
$app['nama_hari']['6'] = 'Sabtu';
$app['nama_hari']['7'] = 'Minggu';
//$app[nama_hari][8] = ', ';

## STATUS FOR BROWSER ##
$app['browser']['0']="MSIE";
$app['browser']['1']="Lynx";
$app['browser']['2']="Opera";
$app['browser']['3']="Konqueror";
$app['browser']['4']="Netscape";
$app['browser']['5']="Bot";
$app['browser']['6']="Other";

##JAM IND ##
$app['jam']['1'] = '01';
$app['jam']['2'] = '02';
$app['jam']['3'] = '03';
$app['jam']['4'] = '04';
$app['jam']['5'] = '05';
$app['jam']['6'] = '06';
$app['jam']['7'] = '07';
$app['jam']['8'] = '08';
$app['jam']['9'] = '09';
$app['jam']['10'] = '10';
$app['jam']['11'] = '11';
$app['jam']['12'] = '12';
$app['jam']['13'] = '13';
$app['jam']['14'] = '14';
$app['jam']['15'] = '15';
$app['jam']['16'] = '16';
$app['jam']['17'] = '17';
$app['jam']['18'] = '18';
$app['jam']['19'] = '19';
$app['jam']['20'] = '20';
$app['jam']['21'] = '21';
$app['jam']['22'] = '22';
$app['jam']['23'] = '23';
$app['jam']['24'] = '24';

## STATUS FOR OS ##
$app['os']['0']="Windows";
$app['os']['1']="Linux";
$app['os']['2']="Mac";
$app['os']['3']="FreeBSD";
$app['os']['4']="SunOS";
$app['os']['5']="IRIX";
$app['os']['6']="BeOS";
$app['os']['7']="OS2";
$app['os']['8']="AIX";
$app['os']['9']="Other";

$app['week_ina']['0']="Minggu";
$app['week_ina']['1']="Senin";
$app['week_ina']['2']="Selasa";
$app['week_ina']['3']="Rabu";
$app['week_ina']['4']="Kamis";
$app['week_ina']['5']="Jumat";
$app['week_ina']['6']="Sabtu";

$app['color']['Black']="#000000";
$app['color']['Red']="red";
$app['color']['Green']="green";
$app['color']['Blue']="blue";
$app['color']['Yellow']="yellow";
$app['color']['Gold']="#C9AD3A";
$app['color']['Grey']="#999999";
$app['color']['Brown']="#C0A78A";
$app['color']['Rosy Brown']="#AE6E74";
$app['color']['Orange']="#DA7E1B";
$app['color']['Lime']="#FDC52A";
$app['color']['0']="#F37A4A";
$app['color']['1']="#F6CBB9";
$app['color']['2']="#999999";
$app['color']['3']="#889DF5";
$app['color']['4']="#F3EFF7";

## COUNTRY ## 
$app['country']['AF']="Afghanistan";
$app['country']['AL']="Albania";
$app['country']['DZ']="Algeria";
$app['country']['AS']="American Samoa";

$app['country']['AD']="Andorra";
$app['country']['AO']="Angola";
$app['country']['AI']="Anguilla";
$app['country']['AQ']="Antarctica";
$app['country']['AG']="Antigua And Barbuda";
$app['country']['AR']="Argentina";

$app['country']['AM']="Armenia";
$app['country']['AW']="Aruba";
$app['country']['AU']="Australia";
$app['country']['AT']="Austria";
$app['country']['AZ']="Azerbaijan";
$app['country']['BS']="Bahamas";

$app['country']['BH']="Bahrain";
$app['country']['BD']="Bangladesh";
$app['country']['BB']="Barbados";
$app['country']['BY']="Belarus";
$app['country']['BE']="Belgium";
$app['country']['BZ']="Belize";

$app['country']['BJ']="Benin";
$app['country']['BM']="Bermuda";
$app['country']['BT']="Bhutan";
$app['country']['BO']="Bolivia";
$app['country']['BA']="Bosnia And Herzegowina";
$app['country']['BW']="Botswana";

$app['country']['BV']="Bouvet Island";
$app['country']['BR']="Brazil";
$app['country']['IO']="British Indian Ocean Territory";
$app['country']['BN']="Brunei Darussalam";
$app['country']['BG']="Bulgaria";
$app['country']['BF']="Burkina Faso";

$app['country']['BI']="Burundi";
$app['country']['KH']="Cambodia";
$app['country']['CM']="Cameroon";
$app['country']['CA']="Canada";
$app['country']['CV']="Cape Verde";
$app['country']['KY']="Cayman Islands";

$app['country']['CF']="Central African Republic";
$app['country']['TD']="Chad";
$app['country']['CL']="Chile";
$app['country']['CN']="China";
$app['country']['CX']="Christmas Island";
$app['country']['CC']="Cocos (Keeling) Islands";

$app['country']['CO']="Colombia";
$app['country']['KM']="Comoros";
$app['country']['CD']="Congo, Democratic Republic Of";
$app['country']['CG']="Congo, People's Republic Of";
$app['country']['CK']="Cook Islands";
$app['country']['CR']="Costa Rica";

$app['country']['CI']="Cote D'Ivoire";
$app['country']['HR']="Croatia";
$app['country']['CU']="Cuba";
$app['country']['CY']="Cyprus";
$app['country']['CZ']="Czech Republic";
$app['country']['DK']="Denmark";

$app['country']['DJ']="Djibouti";
$app['country']['DM']="Dominica";
$app['country']['DO']="Dominican Republic";
$app['country']['TL']="East Timor";
$app['country']['EC']="Ecuador";
$app['country']['EG']="Egypt";

$app['country']['SV']="El Salvador";
$app['country']['GQ']="Equatorial Guinea";
$app['country']['ER']="Eritrea";
$app['country']['EE']="Estonia";
$app['country']['ET']="Ethiopia";
$app['country']['FK']="Falkland Islands (Malvinas)";

$app['country']['FO']="Faroe Islands";
$app['country']['FJ']="Fiji";
$app['country']['FI']="Finland";
$app['country']['FR']="France";
$app['country']['FX']="France, Metropolitan";
$app['country']['GF']="French Guiana";

$app['country']['PF']="French Polynesia";
$app['country']['TF']="French Southern Territories";
$app['country']['GA']="Gabon";
$app['country']['GM']="Gambia";
$app['country']['GE']="Georgia";
$app['country']['DE']="Germany";

$app['country']['GH']="Ghana";
$app['country']['GI']="Gibraltar";
$app['country']['GR']="Greece";
$app['country']['GL']="Greenland";
$app['country']['GD']="Grenada";
$app['country']['GP']="Guadeloupe";

$app['country']['GU']="Guam";
$app['country']['GT']="Guatemala";
$app['country']['GN']="Guinea";
$app['country']['GW']="Guinea-Bissau";
$app['country']['GY']="Guyana";
$app['country']['HT']="Haiti";

$app['country']['HM']="Heard And Mc Donald Islands";
$app['country']['HN']="Honduras";
$app['country']['HK']="Hong Kong";
$app['country']['HU']="Hungary";
$app['country']['IS']="Iceland";
$app['country']['IN']="India";

$app['country']['ID']="Indonesia";
$app['country']['IR']="Iran";
$app['country']['IQ']="Iraq";
$app['country']['IE']="Ireland";
$app['country']['IL']="Israel";
$app['country']['IT']="Italy";

$app['country']['JM']="Jamaica";
$app['country']['JP']="Japan";
$app['country']['JO']="Jordan";
$app['country']['KZ']="Kazakhstan";
$app['country']['KE']="Kenya";
$app['country']['KI']="Kiribati";

$app['country']['KP']="Korea, North";
$app['country']['KR']="Korea, South";
$app['country']['KW']="Kuwait";
$app['country']['KG']="Kyrgyzstan";
$app['country']['LA']="Laos";
$app['country']['LV']="Latvia";

$app['country']['LB']="Lebanon";
$app['country']['LS']="Lesotho";
$app['country']['LR']="Liberia";
$app['country']['LY']="Libyan Arab Jamahiriya";
$app['country']['LI']="Liechtenstein";
$app['country']['LT']="Lithuania";

$app['country']['LU']="Luxembourg";
$app['country']['MO']="Macau";
$app['country']['MK']="Macedonia";
$app['country']['MG']="Madagascar";
$app['country']['MW']="Malawi";
$app['country']['MY']="Malaysia";

$app['country']['MV']="Maldives";
$app['country']['ML']="Mali";
$app['country']['MT']="Malta";
$app['country']['MH']="Marshall Islands";
$app['country']['MQ']="Martinique";
$app['country']['MR']="Mauritania";

$app['country']['MU']="Mauritius";
$app['country']['YT']="Mayotte Islands";
$app['country']['MX']="Mexico";
$app['country']['FM']="Micronesia";
$app['country']['MD']="Moldova";
$app['country']['MC']="Monaco";

$app['country']['MN']="Mongolia";
$app['country']['MS']="Montserrat";
$app['country']['MA']="Morocco";
$app['country']['MZ']="Mozambique";
$app['country']['MM']="Myanmar";
$app['country']['NA']="Namibia";

$app['country']['NR']="Nauru";
$app['country']['NP']="Nepal";
$app['country']['NL']="Netherlands";
$app['country']['AN']="Netherlands Antilles";
$app['country']['NC']="New Caledonia";
$app['country']['NZ']="New Zealand";

$app['country']['NI']="Nicaragua";
$app['country']['NE']="Niger";
$app['country']['NG']="Nigeria";
$app['country']['NU']="Niue";
$app['country']['NF']="Norfolk Island";
$app['country']['MP']="Northern Mariana Islands";

$app['country']['NO']="Norway";
$app['country']['OM']="Oman";
$app['country']['PK']="Pakistan";
$app['country']['PW']="Palau";
$app['country']['PS']="Palestinine";
$app['country']['PA']="Panama";

$app['country']['PG']="Papua New Guinea";
$app['country']['PY']="Paraguay";
$app['country']['PE']="Peru";
$app['country']['PH']="Philippines";
$app['country']['PN']="Pitcairn";
$app['country']['PL']="Poland";

$app['country']['PT']="Portugal";
$app['country']['PR']="Puerto Rico";
$app['country']['QA']="Qatar";
$app['country']['RE']="Reunion";
$app['country']['RO']="Romania";
$app['country']['RU']="Russian Federation";

$app['country']['RW']="Rwanda";
$app['country']['KN']="Saint Kitts And Nevis";
$app['country']['LC']="Saint Lucia";
$app['country']['VC']="Saint Vincent And The Grenadines";
$app['country']['WS']="Samoa";
$app['country']['SM']="San Marino";

$app['country']['ST']="Sao Tome And Principe";
$app['country']['SA']="Saudi Arabia";
$app['country']['SN']="Senegal";
$app['country']['SC']="Seychelles";
$app['country']['SL']="Sierra Leone";
$app['country']['SG']="Singapore";

$app['country']['SK']="Slovakia (Slovak Republic)";
$app['country']['SI']="Slovenia";
$app['country']['SB']="Solomon Islands";
$app['country']['SO']="Somalia";
$app['country']['ZA']="South Africa";
$app['country']['GS']="South Georgia And The South Sandwich Islands";

$app['country']['ES']="Spain";
$app['country']['LK']="Sri Lanka";
$app['country']['SH']="St. Helena";
$app['country']['PM']="St. Pierre And Miquelon";
$app['country']['SD']="Sudan";
$app['country']['SR']="Suriname";

$app['country']['SJ']="Svalbard And Jan Mayen Islands";
$app['country']['SZ']="Swaziland";
$app['country']['SE']="Sweden";
$app['country']['CH']="Switzerland";
$app['country']['SY']="Syrian Arab Republic";
$app['country']['TW']="Taiwan";

$app['country']['TJ']="Tajikistan";
$app['country']['TZ']="Tanzania, United Republic Of";
$app['country']['TH']="Thailand";
$app['country']['TG']="Togo";
$app['country']['TK']="Tokelau";
$app['country']['TO']="Tonga";

$app['country']['TT']="Trinidad And Tobago";
$app['country']['TN']="Tunisia";
$app['country']['TR']="Turkey";
$app['country']['TM']="Turkmenistan";
$app['country']['TC']="Turks And Caicos Islands";
$app['country']['TV']="Tuvalu";

$app['country']['UG']="Uganda";
$app['country']['UA']="Ukraine";
$app['country']['AE']="United Arab Emirates";
$app['country']['GB']="United Kingdom";
$app['country']['US']="United States";
$app['country']['UM']="United States Minor Outlying Islands";

$app['country']['UY']="Uruguay";
$app['country']['UZ']="Uzbekistan";
$app['country']['VU']="Vanuatu";
$app['country']['VA']="Vatican City State (Holy See)";
$app['country']['VE']="Venezuela";
$app['country']['VN']="Vietnam";

$app['country']['VG']="Virgin Islands (British)";
$app['country']['VI']="Virgin Islands (U.S.)";
$app['country']['WF']="Wallis And Futuna Islands";
$app['country']['EH']="Western Sahara";
$app['country']['YE']="Yemen";
$app['country']['YU']="Yugoslavia";

$app['country']['ZM']="Zambia";
$app['country']['ZW']="Zimbabwe";
$app['country']['other']="Other";

?>
