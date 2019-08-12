<?php

use yii\db\Migration;
use common\components\helper\HelperLib;

/**
 * Class m190811_182545_new_table_country
 */
class m190811_182545_new_table_country extends Migration
{
 
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $db = Yii::$app->getDb();
        $dbName = HelperLib::getDsnAttribute('dbname', $db->dsn);
        
        
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('country', [
            'country_code'  => 'varchar(5) PRIMARY KEY',
            'cd_pais'       => 'int(3) unsigned zerofill',
            'name'          => 'varchar(255) not null',
            'slug'          => 'varchar(255)',
            'verified'      => 'enum("yes", "no") not null default "yes"',
            'created_at'    => 'datetime',
            'updated_at'    => 'datetime',
            'product_count' => 'mediumint(5) default 0',
            'product_active_count' => 'mediumint(5) default 0',
        ], $tableOptions);
        $this->createIndex('idx-country-cd_pais', 'country', 'cd_pais', true);
        
        $this->execute("INSERT INTO ".$dbName.".country VALUES ('AD',020,'Andorra','andorra','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AE',784,'Emiratos �rabes Unidos','emiratos arabes unidos','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AF',004,'Afganist�n','afganistan','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AG',028,'Antigua y Barbuda','antigua y barbuda','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AI',660,'Anguilla','anguilla','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AL',008,'Albania','albania','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AM',051,'Armenia','armenia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AN',530,'Antillas Holandesas','antillas holandesas','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AO',024,'Angola','angola','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AQ',010,'Ant�rtida','antartida','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AR',032,'Argentina','argentina','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AS',016,'Samoa Americana','samoa americana','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AT',040,'Austria','austria','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AU',036,'Australia','australia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AW',533,'Aruba','aruba','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AX',248,'Islas Gland','islas gland','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('AZ',031,'Azerbaiy�n','azerbaiyan','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BA',070,'Bosnia y Herzegovina','bosnia y herzegovina','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BB',052,'Barbados','barbados','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BD',050,'Bangladesh','bangladesh','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BE',056,'B�lgica','belgica','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BF',854,'Burkina Faso','burkina faso','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BG',100,'Bulgaria','bulgaria','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BH',048,'Bahr�in','bahrein','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BI',108,'Burundi','burundi','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BJ',204,'Benin','benin','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BM',060,'Bermudas','bermudas','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BN',096,'Brun�i','brunei','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BO',068,'Bolivia','bolivia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BR',076,'Brasil','brasil','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BS',044,'Bahamas','bahamas','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BT',064,'Bhut�n','bhutan','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BV',074,'Isla Bouvet','isla bouvet','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BW',072,'Botsuana','botsuana','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BY',112,'Bielorrusia','bielorrusia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('BZ',084,'Belice','belice','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CA',124,'Canad�','canada','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CC',166,'Islas Cocos','islas cocos','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CD',180,'Rep�blica Democr�tica del Congo','republica democratica del congo','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CF',140,'Rep�blica Centroafricana','republica centroafricana','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CG',178,'Congo','congo','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CH',756,'Suiza','suiza','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CI',384,'Costa de Marfil','costa de marfil','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CK',184,'Islas Cook','islas cook','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CL',152,'Chile','chile','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CM',120,'Camer�n','camerun','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CN',156,'China','china','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CO',170,'Colombia','colombia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CR',188,'Costa Rica','costa rica','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CU',192,'Cuba','cuba','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CV',132,'Cabo Verde','cabo verde','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CX',162,'Isla de Navidad','isla de navidad','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CY',196,'Chipre','chipre','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('CZ',203,'Rep�blica Checa','republica checa','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('DE',276,'Alemania','alemania','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('DJ',262,'Yibuti','yibuti','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('DK',208,'Dinamarca','dinamarca','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('DM',212,'Dominica','dominica','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('DO',214,'Rep�blica Dominicana','republica dominicana','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('DZ',012,'Argelia','argelia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('EC',218,'Ecuador','ecuador','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('EE',233,'Estonia','estonia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('EG',818,'Egipto','egipto','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('EH',732,'Sahara Occidental','sahara occidental','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('ER',232,'Eritrea','eritrea','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('ES',724,'Espa�a','espana','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('ET',231,'Etiop�a','etiopia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('FI',246,'Finlandia','finlandia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('FJ',242,'Fiyi','fiyi','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('FK',238,'Islas Malvinas','islas malvinas','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('FM',583,'Micronesia','micronesia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('FO',234,'Islas Feroe','islas feroe','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('FR',250,'Francia','francia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GA',266,'Gab�n','gabon','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GB',826,'Reino Unido','reino unido','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GD',308,'Granada','granada','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GE',268,'Georgia','georgia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GF',254,'Guayana Francesa','guayana francesa','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GH',288,'Ghana','ghana','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GI',292,'Gibraltar','gibraltar','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GL',304,'Groenlandia','groenlandia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GM',270,'Gambia','gambia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GN',324,'Guinea','guinea','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GP',312,'Guadalupe','guadalupe','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GQ',226,'Guinea Ecuatorial','guinea ecuatorial','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GR',300,'Grecia','grecia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GS',239,'Islas Georgias del Sur y Sandwich del Sur','islas georgias del sur y sandwich del sur','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GT',320,'Guatemala','guatemala','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GU',316,'Guam','guam','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GW',624,'Guinea-Bissau','guinea-bissau','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('GY',328,'Guyana','guyana','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('HK',344,'Hong Kong','hong kong','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('HM',334,'Islas Heard y McDonald','islas heard y mcdonald','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('HN',340,'Honduras','honduras','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('HR',191,'Croacia','croacia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('HT',332,'Hait�','haiti','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('HU',348,'Hungr�a','hungria','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('ID',360,'Indonesia','indonesia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('IE',372,'Irlanda','irlanda','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('IL',376,'Israel','israel','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('IN',356,'India','india','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('IO',086,'Territorio Brit�nico del Oc�ano �ndico','territorio britanico del oceano indico','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('IQ',368,'Iraq','iraq','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('IR',364,'Ir�n','iran','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('IS',352,'Islandia','islandia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('IT',380,'Italia','italia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('JM',388,'Jamaica','jamaica','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('JO',400,'Jordania','jordania','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('JP',392,'Jap�n','japon','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('KE',404,'Kenia','kenia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('KG',417,'Kirguist�n','kirguistan','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('KH',116,'Camboya','camboya','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('KI',296,'Kiribati','kiribati','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('KM',174,'Comoras','comoras','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('KN',659,'San Crist�bal y Nevis','san cristobal y nevis','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('KP',408,'Corea del Norte','corea del norte','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('KR',410,'Corea del Sur','corea del sur','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('KW',414,'Kuwait','kuwait','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('KY',136,'Islas Caim�n','islas caiman','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('KZ',398,'Kazajst�n','kazajstan','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('LA',418,'Laos','laos','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('LB',422,'L�bano','libano','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('LC',662,'Santa Luc�a','santa lucia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('LI',438,'Liechtenstein','liechtenstein','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('LK',144,'Sri Lanka','sri lanka','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('LR',430,'Liberia','liberia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('LS',426,'Lesotho','lesotho','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('LT',440,'Lituania','lituania','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('LU',442,'Luxemburgo','luxemburgo','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('LV',428,'Letonia','letonia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('LY',434,'Libia','libia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MA',504,'Marruecos','marruecos','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MC',492,'M�naco','monaco','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MD',498,'Moldavia','moldavia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('ME',499,'Montenegro','montenegro','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MG',450,'Madagascar','madagascar','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MH',584,'Islas Marshall','islas marshall','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MK',807,'ARY Macedonia','ary macedonia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('ML',466,'Mal�','mali','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MM',104,'Myanmar','myanmar','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MN',496,'Mongolia','mongolia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MO',446,'Macao','macao','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MP',580,'Islas Marianas del Norte','islas marianas del norte','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MQ',474,'Martinica','martinica','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MR',478,'Mauritania','mauritania','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MS',500,'Montserrat','montserrat','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MT',470,'Malta','malta','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MU',480,'Mauricio','mauricio','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MV',462,'Maldivas','maldivas','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MW',454,'Malawi','malawi','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MX',484,'M�xico','mexico','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MY',458,'Malasia','malasia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('MZ',508,'Mozambique','mozambique','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('NA',516,'Namibia','namibia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('NC',540,'Nueva Caledonia','nueva caledonia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('NE',562,'N�ger','niger','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('NF',574,'Isla Norfolk','isla norfolk','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('NG',566,'Nigeria','nigeria','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('NI',558,'Nicaragua','nicaragua','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('NL',528,'Pa�ses Bajos','paises bajos','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('NO',578,'Noruega','noruega','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('NP',524,'Nepal','nepal','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('NR',520,'Nauru','nauru','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('NU',570,'Niue','niue','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('NZ',554,'Nueva Zelanda','nueva zelanda','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('OM',512,'Om�n','oman','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PA',591,'Panam�','panama','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PE',604,'Per�','peru','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PF',258,'Polinesia Francesa','polinesia francesa','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PG',598,'Pap�a Nueva Guinea','papua nueva guinea','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PH',608,'Filipinas','filipinas','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PK',586,'Pakist�n','pakistan','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PL',616,'Polonia','polonia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PM',666,'San Pedro y Miquel�n','san pedro y miquelon','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PN',612,'Islas Pitcairn','islas pitcairn','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PR',630,'Puerto Rico','puerto rico','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PS',275,'Palestina','palestina','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PT',620,'Portugal','portugal','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PW',585,'Palau','palau','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('PY',600,'Paraguay','paraguay','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('QA',634,'Qatar','qatar','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('RE',638,'Reuni�n','reunion','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('RO',642,'Rumania','rumania','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('RS',688,'Serbia','serbia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('RU',643,'Rusia','rusia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('RW',646,'Ruanda','ruanda','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SA',682,'Arabia Saud�','arabia saudi','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SB',090,'Islas Salom�n','islas salomon','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SC',690,'Seychelles','seychelles','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SD',729,'Sud�n','sudan','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SE',752,'Suecia','suecia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SG',702,'Singapur','singapur','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SH',654,'Santa Helena','santa helena','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SI',705,'Eslovenia','eslovenia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SJ',744,'Svalbard y Jan Mayen','svalbard y jan mayen','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SK',703,'Eslovaquia','eslovaquia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SL',694,'Sierra Leona','sierra leona','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SM',674,'San Marino','san marino','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SN',686,'Senegal','senegal','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SO',706,'Somalia','somalia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SR',740,'Surinam','surinam','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('ST',678,'Santo Tom� y Pr�ncipe','santo tome y principe','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SV',222,'El Salvador','el salvador','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SY',760,'Siria','siria','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('SZ',748,'Suazilandia','suazilandia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TC',796,'Islas Turcas y Caicos','islas turcas y caicos','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TD',148,'Chad','chad','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TF',260,'Territorios Australes Franceses','territorios australes franceses','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TG',768,'Togo','togo','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TH',764,'Tailandia','tailandia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TJ',762,'Tayikist�n','tayikistan','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TK',772,'Tokelau','tokelau','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TL',626,'Timor Oriental','timor oriental','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TM',795,'Turkmenist�n','turkmenistan','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TN',788,'T�nez','tunez','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TO',776,'Tonga','tonga','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TR',792,'Turqu�a','turquia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TT',780,'Trinidad y Tobago','trinidad y tobago','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TV',798,'Tuvalu','tuvalu','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TW',158,'Taiw�n','taiwan','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('TZ',834,'Tanzania','tanzania','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('UA',804,'Ucrania','ucrania','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('UG',800,'Uganda','uganda','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('UM',581,'Islas ultramarinas de Estados Unidos','islas ultramarinas de estados unidos','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('US',840,'Estados Unidos','estados unidos','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('UY',858,'Uruguay','uruguay','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('UZ',860,'Uzbekist�n','uzbekistan','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('VA',336,'Ciudad del Vaticano','ciudad del vaticano','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('VC',670,'San Vicente y las Granadinas','san vicente y las granadinas','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('VE',862,'Venezuela','venezuela','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('VG',092,'Islas V�rgenes Brit�nicas','islas virgenes britanicas','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('VI',850,'Islas V�rgenes de los Estados Unidos','islas virgenes de los estados unidos','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('VN',704,'Vietnam','vietnam','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('VU',548,'Vanuatu','vanuatu','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('WF',876,'Wallis y Futuna','wallis y futuna','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('WS',882,'Samoa','samoa','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('YE',887,'Yemen','yemen','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('YT',175,'Mayotte','mayotte','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('ZA',710,'Sud�frica','sudafrica','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('ZM',894,'Zambia','zambia','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0),('ZW',716,'Zimbabue','zimbabue','yes','2017-03-03 12:05:20','2017-03-03 12:05:20',0,0);");
    }
    
    
    /**
     * @inheritdoc
     */
    public function down()
    {
        
        $this->dropTable('country');
    }
    
}