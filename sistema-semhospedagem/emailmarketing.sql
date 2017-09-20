-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 01/09/2011 às 23h52min
-- Versão do Servidor: 5.1.52
-- Versão do PHP: 5.2.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT ;
SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS;
SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION ;
SET NAMES utf8;



DROP TABLE IF EXISTS `email_addons`;
CREATE TABLE IF NOT EXISTS `email_addons` (
  `addon_id` varchar(200) NOT NULL,
  `installed` int(11) DEFAULT '0',
  `configured` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  `addon_version` varchar(10) DEFAULT '0',
  `settings` text,
  PRIMARY KEY (`addon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_addons`
--

INSERT INTO `email_addons` (`addon_id`, `installed`, `configured`, `enabled`, `addon_version`, `settings`) VALUES
('checkpermissions', 1, 1, 1, '1.0', 'a:0:{}'),
('dbcheck', 1, 1, 1, '1.0', 'a:0:{}'),
('dynamiccontenttags', 1, 1, 1, '1.0', 'a:0:{}'),
('emaileventlog', 1, 1, 1, '1.0', 'a:0:{}'),
('splittest', 1, 1, 1, '1.0', 'a:0:{}'),
('surveys', 1, 1, 1, '1.0', 'a:0:{}'),
('systemlog', 1, 1, 0, '1.0', 'a:1:{s:7:"logsize";i:1000;}'),
('updatecheck', 1, 1, 1, '1.0', 'a:0:{}');

--
-- Estrutura da tabela `email_autoresponders`
--

DROP TABLE IF EXISTS `email_autoresponders`;
CREATE TABLE IF NOT EXISTS `email_autoresponders` (
  `autoresponderid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `format` char(1) DEFAULT NULL,
  `textbody` longtext,
  `htmlbody` longtext,
  `createdate` int(11) DEFAULT '0',
  `active` int(11) DEFAULT '0',
  `pause` int(11) DEFAULT '0',
  `hoursaftersubscription` int(11) DEFAULT '0',
  `ownerid` int(11) NOT NULL DEFAULT '0',
  `searchcriteria` mediumtext,
  `listid` int(11) DEFAULT '0',
  `tracklinks` char(1) DEFAULT '1',
  `trackopens` char(1) DEFAULT '1',
  `multipart` char(1) DEFAULT '1',
  `queueid` int(11) DEFAULT '0',
  `sendfromname` varchar(255) DEFAULT NULL,
  `sendfromemail` varchar(255) DEFAULT NULL,
  `replytoemail` varchar(255) DEFAULT NULL,
  `bounceemail` varchar(255) DEFAULT NULL,
  `charset` varchar(255) DEFAULT NULL,
  `embedimages` char(1) DEFAULT '0',
  `to_firstname` int(11) DEFAULT '0',
  `to_lastname` int(11) DEFAULT '0',
  `autorespondersize` int(11) DEFAULT '0',
  PRIMARY KEY (`autoresponderid`),
  KEY `email_autoresponders_owner_idx` (`ownerid`),
  KEY `email_autoresponders_list_idx` (`listid`),
  KEY `email_autoresponders_queue_idx` (`queueid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `email_autoresponders`

--
-- Estrutura da tabela `email_banned_emails`
--

DROP TABLE IF EXISTS `email_banned_emails`;
CREATE TABLE IF NOT EXISTS `email_banned_emails` (
  `banid` int(11) NOT NULL AUTO_INCREMENT,
  `emailaddress` varchar(255) DEFAULT NULL,
  `list` varchar(10) DEFAULT NULL,
  `bandate` int(11) DEFAULT NULL,
  PRIMARY KEY (`banid`),
  UNIQUE KEY `email_banned_emails_list_email_idx` (`list`,`emailaddress`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `email_banned_emails`
--

INSERT INTO `email_banned_emails` (`banid`, `emailaddress`, `list`, `bandate`) VALUES
(1, 'support@smartyplus.com', 'g', 1312850146),
(2, 'smartyplus.com', 'g', 1312850146),
(3, 'adsense-support-noreply@google.com', 'g', 1312850325);

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_config_settings`
--

DROP TABLE IF EXISTS `email_config_settings`;
CREATE TABLE IF NOT EXISTS `email_config_settings` (
  `area` varchar(255) DEFAULT NULL,
  `areavalue` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_config_settings`
--

INSERT INTO `email_config_settings` (`area`, `areavalue`) VALUES
('SMTP_SERVER', ''),
('SMTP_USERNAME', ''),
('SMTP_PASSWORD', ''),
('SMTP_PORT', ''),
('BOUNCE_ADDRESS', 'bounce@sistemacomprascoletivas.com.br'),
('BOUNCE_SERVER', 'mail.sistemacomprascoletivas.com.br'),
('BOUNCE_USERNAME', 'bounce@sistemacomprascoletivas.com.br'),
('BOUNCE_PASSWORD', 'vipcom123'),
('BOUNCE_IMAP', '0'),
('BOUNCE_EXTRASETTINGS', ''),
('BOUNCE_AGREEDELETE', '1'),
('BOUNCE_AGREEDELETEALL', '0'),
('HTMLFOOTER', ''),
('TEXTFOOTER', ''),
('FORCE_UNSUBLINK', '1'),
('MAXHOURLYRATE', '100'),
('MAXOVERSIZE', ''),
('CRON_ENABLED', '1'),
('DEFAULTCHARSET', 'UTF-8'),
('EMAIL_ADDRESS', 'trocaremail@sistemacomprascoletivas.com.br'),
('IPTRACKING', '1'),
('USEMULTIPLEUNSUBSCRIBE', '0'),
('CONTACTCANMODIFYEMAIL', '0'),
('MAX_IMAGEWIDTH', '700'),
('MAX_IMAGEHEIGHT', '400'),
('ALLOW_EMBEDIMAGES', '1'),
('DEFAULT_EMBEDIMAGES', '0'),
('ALLOW_ATTACHMENTS', '0'),
('ATTACHMENT_SIZE', '2048'),
('CRON_SEND', '30'),
('CRON_AUTORESPONDER', '1440'),
('CRON_BOUNCE', '1440'),
('CRON_TRIGGEREMAILS_S', '0'),
('CRON_TRIGGEREMAILS_P', '1440'),
('CRON_MAINTENANCE', '0'),
('EMAILSIZE_WARNING', '500'),
('EMAILSIZE_MAXIMUM', '2048'),
('SYSTEM_MESSAGE', ''),
('SYSTEM_DATABASE_VERSION', '5.1.52'),
('SEND_TEST_MODE', '0'),
('RESEND_MAXIMUM', '1'),
('SHOW_SMTPCOM_OPTION', '0'),
('SECURITY_WRONG_LOGIN_WAIT', '0'),
('SECURITY_WRONG_LOGIN_THRESHOLD_COUNT', '0'),
('SECURITY_WRONG_LOGIN_THRESHOLD_DURATION', '60'),
('SECURITY_BAN_DURATION', '60'),
('CREDIT_INCLUDE_AUTORESPONDERS', '1'),
('CREDIT_INCLUDE_TRIGGERS', '1'),
('CREDIT_WARNINGS', '1'),
('DEFAULT_EMAILSIZE', '0');

--
-- Estrutura da tabela `email_customfields`
--

DROP TABLE IF EXISTS `email_customfields`;
CREATE TABLE IF NOT EXISTS `email_customfields` (
  `fieldid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `fieldtype` varchar(100) DEFAULT NULL,
  `defaultvalue` varchar(255) DEFAULT NULL,
  `required` char(1) DEFAULT '0',
  `fieldsettings` mediumtext,
  `createdate` int(11) DEFAULT '0',
  `ownerid` int(11) DEFAULT '0',
  `isglobal` char(1) DEFAULT '0',
  PRIMARY KEY (`fieldid`),
  KEY `email_customfields_owner_idx` (`ownerid`),
  KEY `email_customfield_id_name` (`fieldid`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `email_customfields`
--

INSERT INTO `email_customfields` (`fieldid`, `name`, `fieldtype`, `defaultvalue`, `required`, `fieldsettings`, `createdate`, `ownerid`, `isglobal`) VALUES
(1, 'Title', 'dropdown', '', '0', 'a:2:{s:3:"Key";a:5:{i:0;s:2:"Ms";i:1;s:3:"Mrs";i:2;s:2:"Mr";i:3;s:2:"Dr";i:4;s:4:"Prof";}s:5:"Value";a:5:{i:0;s:2:"Ms";i:1;s:3:"Mrs";i:2;s:2:"Mr";i:3;s:2:"Dr";i:4;s:4:"Prof";}}', 1301375502, 1, '1'),
(2, 'First Name', 'text', '', '0', 'a:3:{s:11:"FieldLength";s:2:"50";s:9:"MinLength";s:1:"0";s:9:"MaxLength";s:1:"0";}', 1301375502, 1, '1'),
(3, 'Last Name', 'text', '', '0', 'a:3:{s:11:"FieldLength";s:2:"50";s:9:"MinLength";s:1:"0";s:9:"MaxLength";s:1:"0";}', 1301375502, 1, '1'),
(4, 'Phone', 'text', '', '0', 'a:3:{s:11:"FieldLength";s:2:"50";s:9:"MinLength";s:1:"0";s:9:"MaxLength";s:1:"0";}', 1301375502, 1, '1'),
(5, 'Mobile', 'text', '', '0', 'a:3:{s:11:"FieldLength";s:2:"50";s:9:"MinLength";s:1:"0";s:9:"MaxLength";s:1:"0";}', 1301375502, 1, '1'),
(6, 'Fax', 'text', '', '0', 'a:3:{s:11:"FieldLength";s:2:"50";s:9:"MinLength";s:1:"0";s:9:"MaxLength";s:1:"0";}', 1301375502, 1, '1'),
(7, 'Birth Date', 'date', '', '0', 'a:1:{s:3:"Key";a:5:{i:0;s:3:"day";i:1;s:5:"month";i:2;s:4:"year";i:3;i:1911;i:4;s:4:"2011";}}', 1301375502, 1, '1'),
(8, 'City', 'text', '', '0', 'a:3:{s:11:"FieldLength";s:2:"50";s:9:"MinLength";s:1:"0";s:9:"MaxLength";s:1:"0";}', 1301375502, 1, '1'),
(9, 'State', 'text', '', '0', 'a:3:{s:11:"FieldLength";s:2:"50";s:9:"MinLength";s:1:"0";s:9:"MaxLength";s:1:"0";}', 1301375502, 1, '1'),
(10, 'Postal/Zip Code', 'text', '', '0', 'a:3:{s:11:"FieldLength";s:2:"50";s:9:"MinLength";s:1:"0";s:9:"MaxLength";s:1:"0";}', 1301375502, 1, '1'),
(11, 'Country', 'dropdown', '', '0', 'a:2:{s:3:"Key";a:225:{i:0;s:3:"AFG";i:1;s:3:"ALB";i:2;s:3:"DZA";i:3;s:3:"ASM";i:4;s:3:"AND";i:5;s:3:"AGO";i:6;s:3:"AIA";i:7;s:3:"ATG";i:8;s:3:"ARG";i:9;s:3:"ARM";i:10;s:3:"ABW";i:11;s:3:"AUS";i:12;s:3:"AUT";i:13;s:3:"AZE";i:14;s:3:"BHS";i:15;s:3:"BHR";i:16;s:3:"BGD";i:17;s:3:"BRB";i:18;s:3:"BLR";i:19;s:3:"BEL";i:20;s:3:"BLZ";i:21;s:3:"BEN";i:22;s:3:"BMU";i:23;s:3:"BTN";i:24;s:3:"BOL";i:25;s:3:"BIH";i:26;s:3:"BWA";i:27;s:3:"NUL";i:28;s:3:"BRA";i:29;s:3:"BRN";i:30;s:3:"BGR";i:31;s:3:"BFA";i:32;s:3:"BDI";i:33;s:3:"KHM";i:34;s:3:"CMR";i:35;s:3:"CAN";i:36;s:3:"CPV";i:37;s:3:"CYM";i:38;s:3:"CAF";i:39;s:3:"TCD";i:40;s:3:"CHL";i:41;s:3:"CHN";i:42;s:3:"COL";i:43;s:3:"COM";i:44;s:3:"COG";i:45;s:3:"COD";i:46;s:3:"COK";i:47;s:3:"CRI";i:48;s:3:"HRV";i:49;s:3:"CUB";i:50;s:3:"CYP";i:51;s:3:"CZE";i:52;s:3:"DNK";i:53;s:3:"DJI";i:54;s:3:"DMA";i:55;s:3:"DOM";i:56;s:3:"ECU";i:57;s:3:"EGY";i:58;s:3:"SLV";i:59;s:3:"GNQ";i:60;s:3:"ERI";i:61;s:3:"EST";i:62;s:3:"ETH";i:63;s:3:"FLK";i:64;s:3:"FRO";i:65;s:3:"FJI";i:66;s:3:"FIN";i:67;s:3:"FRA";i:68;s:3:"GUF";i:69;s:3:"PYF";i:70;s:3:"GAB";i:71;s:3:"GMB";i:72;s:3:"GEO";i:73;s:3:"DEU";i:74;s:3:"GHA";i:75;s:3:"GIB";i:76;s:3:"GRC";i:77;s:3:"GRL";i:78;s:3:"GRD";i:79;s:3:"GLP";i:80;s:3:"GUM";i:81;s:3:"GTM";i:82;s:3:"GIN";i:83;s:3:"GNB";i:84;s:3:"GUY";i:85;s:3:"HTI";i:86;s:3:"VAT";i:87;s:3:"HND";i:88;s:3:"HKG";i:89;s:3:"HUN";i:90;s:3:"ISL";i:91;s:3:"IND";i:92;s:3:"IDN";i:93;s:3:"IRN";i:94;s:3:"IRQ";i:95;s:3:"IRL";i:96;s:3:"ISR";i:97;s:3:"ITA";i:98;s:3:"JAM";i:99;s:3:"JPN";i:100;s:3:"JOR";i:101;s:3:"KAZ";i:102;s:3:"KEN";i:103;s:3:"KIR";i:104;s:3:"KOR";i:105;s:3:"KWT";i:106;s:3:"KGZ";i:107;s:3:"LVA";i:108;s:3:"LBN";i:109;s:3:"LSO";i:110;s:3:"LBR";i:111;s:3:"LBY";i:112;s:3:"LIE";i:113;s:3:"LTU";i:114;s:3:"LUX";i:115;s:3:"MAC";i:116;s:3:"MKD";i:117;s:3:"MDG";i:118;s:3:"MWI";i:119;s:3:"MYS";i:120;s:3:"MDV";i:121;s:3:"MLI";i:122;s:3:"MLT";i:123;s:3:"MHL";i:124;s:3:"MTQ";i:125;s:3:"MRT";i:126;s:3:"MUS";i:127;s:3:"MEX";i:128;s:3:"FSM";i:129;s:3:"MDA";i:130;s:3:"MCO";i:131;s:3:"MNG";i:132;s:3:"MSR";i:133;s:3:"MAR";i:134;s:3:"MOZ";i:135;s:3:"MMR";i:136;s:3:"NAM";i:137;s:3:"NRU";i:138;s:3:"NPL";i:139;s:3:"NLD";i:140;s:3:"ANT";i:141;s:3:"NCL";i:142;s:3:"NZL";i:143;s:3:"NIC";i:144;s:3:"NER";i:145;s:3:"NGA";i:146;s:3:"NIU";i:147;s:3:"NFK";i:148;s:3:"MNP";i:149;s:3:"NOR";i:150;s:3:"OMN";i:151;s:3:"PAK";i:152;s:3:"PLW";i:153;s:3:"PAN";i:154;s:3:"PNG";i:155;s:3:"PRY";i:156;s:3:"PER";i:157;s:3:"PHL";i:158;s:3:"PCN";i:159;s:3:"POL";i:160;s:3:"PRT";i:161;s:3:"PRI";i:162;s:3:"QAT";i:163;s:3:"REU";i:164;s:3:"ROM";i:165;s:3:"RUS";i:166;s:3:"RWA";i:167;s:3:"SHN";i:168;s:3:"KNA";i:169;s:3:"LCA";i:170;s:3:"SPM";i:171;s:3:"VCT";i:172;s:3:"WSM";i:173;s:3:"SMR";i:174;s:3:"STP";i:175;s:3:"SAU";i:176;s:3:"SEN";i:177;s:3:"SRB";i:178;s:3:"SYC";i:179;s:3:"SLE";i:180;s:3:"SGP";i:181;s:3:"SVK";i:182;s:3:"SVN";i:183;s:3:"SLB";i:184;s:3:"SOM";i:185;s:3:"ZAF";i:186;s:3:"ESP";i:187;s:3:"LKA";i:188;s:3:"SDN";i:189;s:3:"SUR";i:190;s:3:"SJM";i:191;s:3:"SWZ";i:192;s:3:"SWE";i:193;s:3:"CHE";i:194;s:3:"SYR";i:195;s:3:"TWN";i:196;s:3:"TJK";i:197;s:3:"TZA";i:198;s:3:"THA";i:199;s:3:"TGO";i:200;s:3:"TKL";i:201;s:3:"TON";i:202;s:3:"TTO";i:203;s:3:"TUN";i:204;s:3:"TUR";i:205;s:3:"TKM";i:206;s:3:"TCA";i:207;s:3:"TUV";i:208;s:3:"UGA";i:209;s:3:"UKR";i:210;s:3:"ARE";i:211;s:3:"GBR";i:212;s:3:"USA";i:213;s:3:"URY";i:214;s:3:"UZB";i:215;s:3:"VUT";i:216;s:3:"VEN";i:217;s:3:"VNM";i:218;s:3:"VGB";i:219;s:3:"VIR";i:220;s:3:"WLF";i:221;s:3:"ESH";i:222;s:3:"YEM";i:223;s:3:"ZMB";i:224;s:3:"ZWE";}s:5:"Value";a:225:{i:0;s:11:"Afghanistan";i:1;s:7:"Albania";i:2;s:7:"Algeria";i:3;s:14:"American Samoa";i:4;s:7:"Andorra";i:5;s:6:"Angola";i:6;s:8:"Anguilla";i:7;s:19:"Antigua and Barbuda";i:8;s:9:"Argentina";i:9;s:7:"Armenia";i:10;s:5:"Aruba";i:11;s:9:"Australia";i:12;s:7:"Austria";i:13;s:10:"Azerbaijan";i:14;s:7:"Bahamas";i:15;s:7:"Bahrain";i:16;s:10:"Bangladesh";i:17;s:8:"Barbados";i:18;s:7:"Belarus";i:19;s:7:"Belgium";i:20;s:6:"Belize";i:21;s:5:"Benin";i:22;s:7:"Bermuda";i:23;s:6:"Bhutan";i:24;s:7:"Bolivia";i:25;s:22:"Bosnia and Herzegovina";i:26;s:8:"Botswana";i:27;s:11:"Timor-Leste";i:28;s:6:"Brazil";i:29;s:17:"Brunei Darussalam";i:30;s:8:"Bulgaria";i:31;s:12:"Burkina Faso";i:32;s:7:"Burundi";i:33;s:8:"Cambodia";i:34;s:8:"Cameroon";i:35;s:6:"Canada";i:36;s:10:"Cape Verde";i:37;s:14:"Cayman Islands";i:38;s:24:"Central African Republic";i:39;s:4:"Chad";i:40;s:5:"Chile";i:41;s:5:"China";i:42;s:8:"Colombia";i:43;s:7:"Comoros";i:44;s:5:"Congo";i:45;s:37:"Congo, the Democratic Republic of the";i:46;s:12:"Cook Islands";i:47;s:10:"Costa Rica";i:48;s:7:"Croatia";i:49;s:4:"Cuba";i:50;s:6:"Cyprus";i:51;s:14:"Czech Republic";i:52;s:7:"Denmark";i:53;s:8:"Djibouti";i:54;s:8:"Dominica";i:55;s:18:"Dominican Republic";i:56;s:7:"Ecuador";i:57;s:5:"Egypt";i:58;s:11:"El Salvador";i:59;s:17:"Equatorial Guinea";i:60;s:7:"Eritrea";i:61;s:7:"Estonia";i:62;s:8:"Ethiopia";i:63;s:27:"Falkland Islands (Malvinas)";i:64;s:13:"Faroe Islands";i:65;s:4:"Fiji";i:66;s:7:"Finland";i:67;s:6:"France";i:68;s:13:"French Guiana";i:69;s:16:"French Polynesia";i:70;s:5:"Gabon";i:71;s:6:"Gambia";i:72;s:7:"Georgia";i:73;s:7:"Germany";i:74;s:5:"Ghana";i:75;s:9:"Gibraltar";i:76;s:6:"Greece";i:77;s:9:"Greenland";i:78;s:7:"Grenada";i:79;s:10:"Guadeloupe";i:80;s:4:"Guam";i:81;s:9:"Guatemala";i:82;s:6:"Guinea";i:83;s:13:"Guinea-Bissau";i:84;s:6:"Guyana";i:85;s:5:"Haiti";i:86;s:29:"Holy See (Vatican City State)";i:87;s:8:"Honduras";i:88;s:9:"Hong Kong";i:89;s:7:"Hungary";i:90;s:7:"Iceland";i:91;s:5:"India";i:92;s:9:"Indonesia";i:93;s:25:"Iran, Islamic Republic of";i:94;s:4:"Iraq";i:95;s:7:"Ireland";i:96;s:6:"Israel";i:97;s:5:"Italy";i:98;s:7:"Jamaica";i:99;s:5:"Japan";i:100;s:6:"Jordan";i:101;s:10:"Kazakhstan";i:102;s:5:"Kenya";i:103;s:8:"Kiribati";i:104;s:18:"Korea, Republic of";i:105;s:6:"Kuwait";i:106;s:10:"Kyrgyzstan";i:107;s:6:"Latvia";i:108;s:7:"Lebanon";i:109;s:7:"Lesotho";i:110;s:7:"Liberia";i:111;s:22:"Libyan Arab Jamahiriya";i:112;s:13:"Liechtenstein";i:113;s:9:"Lithuania";i:114;s:10:"Luxembourg";i:115;s:5:"Macao";i:116;s:42:"Macedonia, the Former Yugoslav Republic of";i:117;s:10:"Madagascar";i:118;s:6:"Malawi";i:119;s:8:"Malaysia";i:120;s:8:"Maldives";i:121;s:4:"Mali";i:122;s:5:"Malta";i:123;s:16:"Marshall Islands";i:124;s:10:"Martinique";i:125;s:10:"Mauritania";i:126;s:9:"Mauritius";i:127;s:6:"Mexico";i:128;s:31:"Micronesia, Federated States of";i:129;s:20:"Moldova, Republic of";i:130;s:6:"Monaco";i:131;s:8:"Mongolia";i:132;s:10:"Montserrat";i:133;s:7:"Morocco";i:134;s:10:"Mozambique";i:135;s:7:"Myanmar";i:136;s:7:"Namibia";i:137;s:5:"Nauru";i:138;s:5:"Nepal";i:139;s:11:"Netherlands";i:140;s:20:"Netherlands Antilles";i:141;s:13:"New Caledonia";i:142;s:11:"New Zealand";i:143;s:9:"Nicaragua";i:144;s:5:"Niger";i:145;s:7:"Nigeria";i:146;s:4:"Niue";i:147;s:14:"Norfolk Island";i:148;s:24:"Northern Mariana Islands";i:149;s:6:"Norway";i:150;s:4:"Oman";i:151;s:8:"Pakistan";i:152;s:5:"Palau";i:153;s:6:"Panama";i:154;s:16:"Papua New Guinea";i:155;s:8:"Paraguay";i:156;s:4:"Peru";i:157;s:11:"Philippines";i:158;s:8:"Pitcairn";i:159;s:6:"Poland";i:160;s:8:"Portugal";i:161;s:11:"Puerto Rico";i:162;s:5:"Qatar";i:163;s:7:"Reunion";i:164;s:7:"Romania";i:165;s:18:"Russian Federation";i:166;s:6:"Rwanda";i:167;s:12:"Saint Helena";i:168;s:21:"Saint Kitts and Nevis";i:169;s:11:"Saint Lucia";i:170;s:25:"Saint Pierre and Miquelon";i:171;s:32:"Saint Vincent and the Grenadines";i:172;s:5:"Samoa";i:173;s:10:"San Marino";i:174;s:21:"Sao Tome and Principe";i:175;s:12:"Saudi Arabia";i:176;s:7:"Senegal";i:177;s:6:"Serbia";i:178;s:10:"Seychelles";i:179;s:12:"Sierra Leone";i:180;s:9:"Singapore";i:181;s:8:"Slovakia";i:182;s:8:"Slovenia";i:183;s:15:"Solomon Islands";i:184;s:7:"Somalia";i:185;s:12:"South Africa";i:186;s:5:"Spain";i:187;s:9:"Sri Lanka";i:188;s:5:"Sudan";i:189;s:8:"Suriname";i:190;s:22:"Svalbard and Jan Mayen";i:191;s:9:"Swaziland";i:192;s:6:"Sweden";i:193;s:11:"Switzerland";i:194;s:20:"Syrian Arab Republic";i:195;s:25:"Taiwan, Province of China";i:196;s:10:"Tajikistan";i:197;s:28:"Tanzania, United Republic of";i:198;s:8:"Thailand";i:199;s:4:"Togo";i:200;s:7:"Tokelau";i:201;s:5:"Tonga";i:202;s:19:"Trinidad and Tobago";i:203;s:7:"Tunisia";i:204;s:6:"Turkey";i:205;s:12:"Turkmenistan";i:206;s:24:"Turks and Caicos Islands";i:207;s:6:"Tuvalu";i:208;s:6:"Uganda";i:209;s:7:"Ukraine";i:210;s:20:"United Arab Emirates";i:211;s:14:"United Kingdom";i:212;s:13:"United States";i:213;s:7:"Uruguay";i:214;s:10:"Uzbekistan";i:215;s:7:"Vanuatu";i:216;s:9:"Venezuela";i:217;s:8:"Viet Nam";i:218;s:23:"Virgin Islands, British";i:219;s:20:"Virgin Islands, U.s.";i:220;s:17:"Wallis and Futuna";i:221;s:14:"Western Sahara";i:222;s:5:"Yemen";i:223;s:6:"Zambia";i:224;s:8:"Zimbabwe";}}', 1301375502, 1, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_customfield_lists`
--

DROP TABLE IF EXISTS `email_customfield_lists`;
CREATE TABLE IF NOT EXISTS `email_customfield_lists` (
  `cflid` int(11) NOT NULL AUTO_INCREMENT,
  `fieldid` int(11) NOT NULL DEFAULT '0',
  `listid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cflid`),
  UNIQUE KEY `email_customfield_lists_field_list_idx` (`fieldid`,`listid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

--
-- Extraindo dados da tabela `email_customfield_lists`
--

INSERT INTO `email_customfield_lists` (`cflid`, `fieldid`, `listid`) VALUES
(97, 1, 2),
(108, 1, 4),
(68, 1, 5),
(88, 1, 6),
(91, 2, 2),
(102, 2, 4),
(62, 2, 5),
(82, 2, 6),
(92, 3, 2),
(103, 3, 4),
(63, 3, 5),
(83, 3, 6),
(94, 4, 2),
(105, 4, 4),
(65, 4, 5),
(85, 4, 6),
(93, 5, 2),
(104, 5, 4),
(64, 5, 5),
(84, 5, 6),
(101, 6, 4),
(61, 6, 5),
(81, 6, 6),
(89, 7, 2),
(98, 7, 4),
(58, 7, 5),
(78, 7, 6),
(90, 8, 2),
(99, 8, 4),
(59, 8, 5),
(79, 8, 6),
(96, 9, 2),
(107, 9, 4),
(67, 9, 5),
(87, 9, 6),
(95, 10, 2),
(106, 10, 4),
(66, 10, 5),
(86, 10, 6),
(100, 11, 4),
(60, 11, 5),
(80, 11, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_dynamic_content_block`
--

DROP TABLE IF EXISTS `email_dynamic_content_block`;
CREATE TABLE IF NOT EXISTS `email_dynamic_content_block` (
  `blockid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tagid` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `rules` longtext NOT NULL,
  `activated` char(1) DEFAULT NULL,
  `sortorder` int(4) unsigned NOT NULL,
  PRIMARY KEY (`blockid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Estrutura da tabela `email_dynamic_content_tags`
--

DROP TABLE IF EXISTS `email_dynamic_content_tags`;
CREATE TABLE IF NOT EXISTS `email_dynamic_content_tags` (
  `tagid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `createdate` int(11) unsigned NOT NULL,
  `ownerid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`tagid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_folders`
--

DROP TABLE IF EXISTS `email_folders`;
CREATE TABLE IF NOT EXISTS `email_folders` (
  `folderid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  `createdate` int(11) DEFAULT '0',
  `ownerid` int(11) DEFAULT NULL,
  PRIMARY KEY (`folderid`),
  UNIQUE KEY `email_folders_name_type_ownerid_idx` (`name`,`type`,`ownerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Estrutura da tabela `email_folder_item`
--

DROP TABLE IF EXISTS `email_folder_item`;
CREATE TABLE IF NOT EXISTS `email_folder_item` (
  `folderid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  PRIMARY KEY (`folderid`,`itemid`),
  UNIQUE KEY `email_folder_item_folderid_itemid_idx` (`folderid`,`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_folder_user`
--

DROP TABLE IF EXISTS `email_folder_user`;
CREATE TABLE IF NOT EXISTS `email_folder_user` (
  `folderid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `expanded` char(1) NOT NULL DEFAULT '1',
  `ordering` int(11) DEFAULT NULL,
  PRIMARY KEY (`folderid`,`userid`),
  KEY `email_folder_user_userid_folderid_idx` (`userid`,`folderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_forms`
--

DROP TABLE IF EXISTS `email_forms`;
CREATE TABLE IF NOT EXISTS `email_forms` (
  `formid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `design` varchar(255) DEFAULT NULL,
  `formhtml` longtext,
  `chooseformat` varchar(2) DEFAULT NULL,
  `changeformat` varchar(1) DEFAULT '0',
  `sendthanks` varchar(1) DEFAULT '0',
  `requireconfirm` varchar(1) DEFAULT '0',
  `ownerid` int(11) DEFAULT '0',
  `formtype` char(1) DEFAULT NULL,
  `createdate` int(11) DEFAULT '0',
  `contactform` varchar(1) DEFAULT '0',
  `usecaptcha` varchar(1) DEFAULT '0',
  PRIMARY KEY (`formid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_form_customfields`
--

DROP TABLE IF EXISTS `email_form_customfields`;
CREATE TABLE IF NOT EXISTS `email_form_customfields` (
  `formid` int(11) DEFAULT '0',
  `fieldid` varchar(10) DEFAULT '0',
  `fieldorder` int(11) DEFAULT '0',
  UNIQUE KEY `email_form_customfields_formid_listid_idx` (`formid`,`fieldid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_form_lists`
--

DROP TABLE IF EXISTS `email_form_lists`;
CREATE TABLE IF NOT EXISTS `email_form_lists` (
  `formid` int(11) DEFAULT '0',
  `listid` int(11) DEFAULT '0',
  UNIQUE KEY `email_form_lists_formid_listid_idx` (`formid`,`listid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_form_pages`
--

DROP TABLE IF EXISTS `email_form_pages`;
CREATE TABLE IF NOT EXISTS `email_form_pages` (
  `pageid` int(11) NOT NULL AUTO_INCREMENT,
  `formid` int(11) DEFAULT '0',
  `pagetype` varchar(100) DEFAULT NULL,
  `html` longtext,
  `url` varchar(255) DEFAULT NULL,
  `sendfromname` varchar(255) DEFAULT NULL,
  `sendfromemail` varchar(255) DEFAULT NULL,
  `replytoemail` varchar(255) DEFAULT NULL,
  `bounceemail` varchar(255) DEFAULT NULL,
  `emailsubject` varchar(255) DEFAULT NULL,
  `emailhtml` longtext,
  `emailtext` longtext,
  PRIMARY KEY (`pageid`),
  KEY `email_form_pages_formid_idx` (`formid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_jobs`
--

DROP TABLE IF EXISTS `email_jobs`;
CREATE TABLE IF NOT EXISTS `email_jobs` (
  `jobid` int(11) NOT NULL AUTO_INCREMENT,
  `jobtype` varchar(255) DEFAULT NULL,
  `jobstatus` char(1) DEFAULT NULL,
  `jobtime` int(11) DEFAULT '0',
  `jobdetails` text,
  `fkid` int(11) DEFAULT '0',
  `lastupdatetime` int(11) DEFAULT '0',
  `fktype` varchar(255) DEFAULT NULL,
  `queueid` int(11) DEFAULT '0',
  `ownerid` int(11) DEFAULT '0',
  `approved` int(11) DEFAULT '0',
  `authorisedtosend` int(11) DEFAULT '0',
  `resendcount` int(11) DEFAULT '0',
  PRIMARY KEY (`jobid`),
  KEY `email_jobs_fkid_idx` (`fkid`),
  KEY `email_jobs_jobtime_idx` (`jobtime`),
  KEY `email_jobs_queue_idx` (`queueid`),
  KEY `email_jobs_owner_idx` (`ownerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Extraindo dados da tabela `email_jobs`
--
 
-- --------------------------------------------------------

--
-- Estrutura da tabela `email_jobs_lists`
--

DROP TABLE IF EXISTS `email_jobs_lists`;
CREATE TABLE IF NOT EXISTS `email_jobs_lists` (
  `jobid` int(11) DEFAULT '0',
  `listid` int(11) DEFAULT '0',
  UNIQUE KEY `email_jobs_lists_jobid_listid_idx` (`jobid`,`listid`),
  KEY `email_jobs_lists_listid_idx` (`listid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_jobs_lists`
--

INSERT INTO `email_jobs_lists` (`jobid`, `listid`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(7, 2),
(11, 2),
(11, 4),
(11, 5),
(11, 6),
(14, 2),
(14, 4),
(14, 5),
(15, 2),
(15, 4),
(15, 5),
(18, 2),
(18, 4),
(19, 2),
(19, 4),
(20, 2),
(20, 4),
(21, 2),
(21, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_links`
--

DROP TABLE IF EXISTS `email_links`;
CREATE TABLE IF NOT EXISTS `email_links` (
  `linkid` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`linkid`),
  KEY `email_links_url_idx` (`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `email_links`
--

 

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_lists`
--

DROP TABLE IF EXISTS `email_lists`;
CREATE TABLE IF NOT EXISTS `email_lists` (
  `listid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `ownername` varchar(255) DEFAULT NULL,
  `owneremail` varchar(100) DEFAULT NULL,
  `bounceemail` varchar(100) DEFAULT NULL,
  `replytoemail` varchar(100) DEFAULT NULL,
  `bounceserver` varchar(100) DEFAULT NULL,
  `bounceusername` varchar(100) DEFAULT NULL,
  `bouncepassword` varchar(100) DEFAULT NULL,
  `extramailsettings` varchar(100) DEFAULT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `companyaddress` varchar(255) DEFAULT NULL,
  `companyphone` varchar(20) DEFAULT NULL,
  `format` char(1) DEFAULT NULL,
  `notifyowner` char(1) DEFAULT '0',
  `imapaccount` char(1) DEFAULT '0',
  `createdate` int(11) DEFAULT '0',
  `subscribecount` int(11) DEFAULT '0',
  `unsubscribecount` int(11) DEFAULT '0',
  `bouncecount` int(11) DEFAULT '0',
  `processbounce` char(1) DEFAULT '0',
  `agreedelete` char(1) DEFAULT '0',
  `agreedeleteall` char(1) DEFAULT '0',
  `visiblefields` text NOT NULL,
  `ownerid` int(11) DEFAULT '0',
  PRIMARY KEY (`listid`),
  KEY `email_lists_owner_idx` (`ownerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `email_lists`
--

INSERT INTO `email_lists` (`listid`, `name`, `ownername`, `owneremail`, `bounceemail`, `replytoemail`, `bounceserver`, `bounceusername`, `bouncepassword`, `extramailsettings`, `companyname`, `companyaddress`, `companyphone`, `format`, `notifyowner`, `imapaccount`, `createdate`, `subscribecount`, `unsubscribecount`, `bouncecount`, `processbounce`, `agreedelete`, `agreedeleteall`, `visiblefields`, `ownerid`) VALUES
(2, 'Lista de contatos do site de compra coletiva - Não Apagar', 'trocaremail@sistemacomprascoletivas.com.br', 'trocaremail@sistemacomprascoletivas.com.br', 'bounce@sistemacomprascoletivas.com.br', 'trocaremail@sistemacomprascoletivas.com.br', 'bounce@sistemacomprascoletivas.com.br', 'bounce@sistemacomprascoletivas.com.br', 'vipcom123', '', 'Compras Coletivas', '', '', 'b', '1', '0', 1301892999, -253, 2, 58, '1', '1', '0', 'emailaddress,subscribedate,format,status', 3);
-- --------------------------------------------------------

--
-- Estrutura da tabela `email_list_subscribers`
--

DROP TABLE IF EXISTS `email_list_subscribers`;
CREATE TABLE IF NOT EXISTS `email_list_subscribers` (
  `subscriberid` int(11) NOT NULL AUTO_INCREMENT,
  `listid` int(11) NOT NULL DEFAULT '0',
  `emailaddress` varchar(200) DEFAULT NULL,
  `domainname` varchar(100) DEFAULT NULL,
  `format` char(1) DEFAULT NULL,
  `confirmed` char(1) DEFAULT '0',
  `confirmcode` varchar(32) DEFAULT NULL,
  `requestdate` int(11) DEFAULT '0',
  `requestip` varchar(20) DEFAULT NULL,
  `confirmdate` int(11) DEFAULT '0',
  `confirmip` varchar(20) DEFAULT NULL,
  `subscribedate` int(11) DEFAULT '0',
  `bounced` int(11) DEFAULT '0',
  `unsubscribed` int(11) DEFAULT '0',
  `unsubscribeconfirmed` char(1) DEFAULT '0',
  `formid` int(11) DEFAULT '0',
  PRIMARY KEY (`subscriberid`),
  UNIQUE KEY `email_subscribers_email_list_idx` (`emailaddress`,`listid`),
  KEY `email_list_subscribers_sub_list_idx` (`subscriberid`,`listid`),
  KEY `email_subscribe_date_idx` (`subscribedate`),
  KEY `email_list_subscribers_listid_idx` (`listid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4776 ;

--
-- Extraindo dados da tabela `email_list_subscribers`
--
 

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_list_subscribers_unsubscribe`
--

DROP TABLE IF EXISTS `email_list_subscribers_unsubscribe`;
CREATE TABLE IF NOT EXISTS `email_list_subscribers_unsubscribe` (
  `subscriberid` int(11) NOT NULL DEFAULT '0',
  `unsubscribetime` int(11) NOT NULL DEFAULT '0',
  `unsubscribeip` varchar(20) DEFAULT NULL,
  `unsubscriberequesttime` int(11) DEFAULT '0',
  `unsubscriberequestip` varchar(20) DEFAULT NULL,
  `listid` int(11) NOT NULL DEFAULT '0',
  `statid` int(11) DEFAULT '0',
  `unsubscribearea` varchar(20) DEFAULT NULL,
  KEY `email_list_unsubscribe_sub_list_idx` (`subscriberid`,`listid`),
  KEY `email_list_subscribers_unsubscribe_statid_idx` (`statid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_list_subscribers_unsubscribe`
--

 

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_list_subscriber_bounces`
--

DROP TABLE IF EXISTS `email_list_subscriber_bounces`;
CREATE TABLE IF NOT EXISTS `email_list_subscriber_bounces` (
  `bounceid` int(11) NOT NULL AUTO_INCREMENT,
  `subscriberid` int(11) DEFAULT '0',
  `statid` int(11) DEFAULT '0',
  `listid` int(11) DEFAULT '0',
  `bouncetime` int(11) DEFAULT '0',
  `bouncetype` varchar(255) DEFAULT NULL,
  `bouncerule` varchar(255) DEFAULT NULL,
  `bouncemessage` longtext,
  PRIMARY KEY (`bounceid`),
  KEY `email_list_subscriber_bounces_statid_idx` (`statid`),
  KEY `email_list_subscriber_bounces_listid_idx` (`listid`),
  KEY `email_list_subscriber_bounces_subscriberid_idx` (`subscriberid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=493 ;

--
-- Extraindo dados da tabela `email_list_subscriber_bounces`
--
 

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_list_subscriber_events`
--

DROP TABLE IF EXISTS `email_list_subscriber_events`;
CREATE TABLE IF NOT EXISTS `email_list_subscriber_events` (
  `eventid` int(11) NOT NULL AUTO_INCREMENT,
  `subscriberid` int(11) NOT NULL,
  `listid` int(11) NOT NULL,
  `eventtype` text NOT NULL,
  `eventsubject` text NOT NULL,
  `eventdate` int(11) NOT NULL,
  `lastupdate` int(11) NOT NULL,
  `eventownerid` int(11) NOT NULL,
  `eventnotes` text NOT NULL,
  PRIMARY KEY (`eventid`),
  KEY `email_list_subscriber_events_subscriberid_idx` (`subscriberid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `email_list_subscriber_events`
--

INSERT INTO `email_list_subscriber_events` (`eventid`, `subscriberid`, `listid`, `eventtype`, `eventsubject`, `eventdate`, `lastupdate`, `eventownerid`, `eventnotes`) VALUES
(25, 16, 2, 'Sent an Email Campaign', 'Sent the Email Campaign "teste555"', 1301893713, 1301893713, 3, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_list_tags`
--

DROP TABLE IF EXISTS `email_list_tags`;
CREATE TABLE IF NOT EXISTS `email_list_tags` (
  `tagid` int(11) unsigned NOT NULL,
  `listid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`tagid`,`listid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_login_attempt`
--

DROP TABLE IF EXISTS `email_login_attempt`;
CREATE TABLE IF NOT EXISTS `email_login_attempt` (
  `timestamp` int(11) NOT NULL,
  `ipaddress` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_login_banned_ip`
--

DROP TABLE IF EXISTS `email_login_banned_ip`;
CREATE TABLE IF NOT EXISTS `email_login_banned_ip` (
  `ipaddress` varchar(15) NOT NULL,
  `bantime` int(11) NOT NULL,
  PRIMARY KEY (`ipaddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_log_system_administrator`
--

DROP TABLE IF EXISTS `email_log_system_administrator`;
CREATE TABLE IF NOT EXISTS `email_log_system_administrator` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `loguserid` int(11) NOT NULL,
  `logip` varchar(30) NOT NULL DEFAULT '',
  `logdate` int(11) NOT NULL DEFAULT '0',
  `logtodo` varchar(100) NOT NULL DEFAULT '',
  `logdata` text NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_log_system_system`
--

DROP TABLE IF EXISTS `email_log_system_system`;
CREATE TABLE IF NOT EXISTS `email_log_system_system` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `logtype` varchar(20) DEFAULT NULL,
  `logmodule` varchar(100) NOT NULL DEFAULT '',
  `logseverity` char(1) NOT NULL DEFAULT '4',
  `logsummary` varchar(250) NOT NULL,
  `logmsg` text NOT NULL,
  `logdate` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=313261 ;

 

DROP TABLE IF EXISTS `email_modules`;
CREATE TABLE IF NOT EXISTS `email_modules` (
  `modulename` varchar(50) NOT NULL,
  `moduleversion` int(11) DEFAULT '0',
  PRIMARY KEY (`modulename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_modules`
--

INSERT INTO `email_modules` (`modulename`, `moduleversion`) VALUES
('Tracker', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_module_tracker`
--

DROP TABLE IF EXISTS `email_module_tracker`;
CREATE TABLE IF NOT EXISTS `email_module_tracker` (
  `statid` int(11) NOT NULL,
  `stattype` varchar(50) NOT NULL,
  `trackername` varchar(50) NOT NULL,
  `newsletterid` int(11) DEFAULT NULL,
  `datastring` text,
  PRIMARY KEY (`statid`,`stattype`,`trackername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_module_tracker`
--

INSERT INTO `email_module_tracker` (`statid`, `stattype`, `trackername`, `newsletterid`, `datastring`) VALUES
(6, 'newsletter', 'Google', 2, 'a:2:{s:12:"CampaignName";s:5:"teste";s:10:"SourceName";s:12:"MeuMarketing";}'),
(11, 'newsletter', 'Google', 5, 'a:2:{s:12:"CampaignName";s:7:"julho42";s:10:"SourceName";s:12:"Finaldejulho";}'),
(12, 'newsletter', 'Google', 6, 'a:2:{s:12:"CampaignName";s:7:"Agosto1";s:10:"SourceName";s:12:"MeuMarketing";}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_newsletters`
--

DROP TABLE IF EXISTS `email_newsletters`;
CREATE TABLE IF NOT EXISTS `email_newsletters` (
  `newsletterid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `format` char(1) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `textbody` longtext,
  `htmlbody` longtext,
  `createdate` int(11) DEFAULT '0',
  `active` int(11) DEFAULT '0',
  `archive` int(11) DEFAULT '0',
  `ownerid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`newsletterid`),
  KEY `email_newsletters_owner_idx` (`ownerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `email_newsletters`
--

 
-- --------------------------------------------------------

--
-- Estrutura da tabela `email_queues`
--

DROP TABLE IF EXISTS `email_queues`;
CREATE TABLE IF NOT EXISTS `email_queues` (
  `queueid` int(11) DEFAULT '0',
  `queuetype` varchar(255) DEFAULT NULL,
  `ownerid` int(11) NOT NULL DEFAULT '0',
  `recipient` int(11) DEFAULT '0',
  `processed` char(1) DEFAULT '0',
  `sent` char(1) DEFAULT '0',
  `processtime` datetime DEFAULT NULL,
  KEY `email_queues_id_type_recip_idx` (`queueid`,`queuetype`,`recipient`),
  KEY `email_queues_id_type_processed_idx` (`queueid`,`queuetype`,`processed`),
  KEY `email_queuetype_recipient_idx` (`queuetype`,`recipient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 

DROP TABLE IF EXISTS `email_queues_sequence`;
CREATE TABLE IF NOT EXISTS `email_queues_sequence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `email_queues_sequence`
--

INSERT INTO `email_queues_sequence` (`id`) VALUES
(19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_queues_unsent`
--

DROP TABLE IF EXISTS `email_queues_unsent`;
CREATE TABLE IF NOT EXISTS `email_queues_unsent` (
  `recipient` int(11) DEFAULT '0',
  `queueid` int(11) DEFAULT '0',
  `reasoncode` int(11) DEFAULT '0',
  `reason` text,
  KEY `email_queues_unsent_queueid_idx` (`queueid`),
  KEY `email_queues_unsent_recipient_idx` (`recipient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_segments`
--

DROP TABLE IF EXISTS `email_segments`;
CREATE TABLE IF NOT EXISTS `email_segments` (
  `segmentid` int(11) NOT NULL AUTO_INCREMENT,
  `segmentname` varchar(255) NOT NULL,
  `createdate` int(11) DEFAULT '0',
  `ownerid` int(11) NOT NULL,
  `searchinfo` text NOT NULL,
  PRIMARY KEY (`segmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_settings`
--

DROP TABLE IF EXISTS `email_settings`;
CREATE TABLE IF NOT EXISTS `email_settings` (
  `cronok` char(1) DEFAULT '0',
  `cronrun1` int(11) DEFAULT '0',
  `cronrun2` int(11) DEFAULT '0',
  `database_version` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_settings`
--

INSERT INTO `email_settings` (`cronok`, `cronrun1`, `cronrun2`, `database_version`) VALUES
('1', 1314770462, 1314856863, 20090916);

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_settings_credit_warnings`
--

DROP TABLE IF EXISTS `email_settings_credit_warnings`;
CREATE TABLE IF NOT EXISTS `email_settings_credit_warnings` (
  `creditwarningid` int(11) NOT NULL AUTO_INCREMENT,
  `enabled` char(1) NOT NULL DEFAULT '0',
  `creditlevel` int(11) NOT NULL DEFAULT '0',
  `aspercentage` char(1) NOT NULL DEFAULT '1',
  `emailsubject` varchar(255) NOT NULL,
  `emailcontents` mediumtext NOT NULL,
  PRIMARY KEY (`creditwarningid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_settings_cron_schedule`
--

DROP TABLE IF EXISTS `email_settings_cron_schedule`;
CREATE TABLE IF NOT EXISTS `email_settings_cron_schedule` (
  `jobtype` varchar(20) DEFAULT NULL,
  `lastrun` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_settings_cron_schedule`
--

INSERT INTO `email_settings_cron_schedule` (`jobtype`, `lastrun`) VALUES
('autoresponder', 1314846063),
('bounce', 1314846064),
('send', 1314846063),
('triggeremails_s', 0),
('triggeremails_p', 0),
('maintenance', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_splittests`
--

DROP TABLE IF EXISTS `email_splittests`;
CREATE TABLE IF NOT EXISTS `email_splittests` (
  `splitid` int(11) NOT NULL AUTO_INCREMENT,
  `splitname` varchar(200) DEFAULT NULL,
  `splittype` varchar(100) DEFAULT NULL,
  `splitdetails` text,
  `createdate` int(11) DEFAULT '0',
  `userid` int(11) DEFAULT '0',
  `jobid` int(11) DEFAULT '0',
  `jobstatus` char(1) DEFAULT NULL,
  `lastsent` int(11) DEFAULT '0',
  PRIMARY KEY (`splitid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_splittest_campaigns`
--

DROP TABLE IF EXISTS `email_splittest_campaigns`;
CREATE TABLE IF NOT EXISTS `email_splittest_campaigns` (
  `splitid` int(11) DEFAULT '0',
  `campaignid` int(11) DEFAULT '0',
  UNIQUE KEY `email_split_campaigns_split_campaign` (`splitid`,`campaignid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_splittest_statistics`
--

DROP TABLE IF EXISTS `email_splittest_statistics`;
CREATE TABLE IF NOT EXISTS `email_splittest_statistics` (
  `split_statid` int(11) NOT NULL AUTO_INCREMENT,
  `splitid` int(11) NOT NULL DEFAULT '0',
  `jobid` int(11) NOT NULL DEFAULT '0',
  `starttime` int(11) NOT NULL DEFAULT '0',
  `finishtime` int(11) NOT NULL DEFAULT '0',
  `hiddenby` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`split_statid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_splittest_statistics_newsletters`
--

DROP TABLE IF EXISTS `email_splittest_statistics_newsletters`;
CREATE TABLE IF NOT EXISTS `email_splittest_statistics_newsletters` (
  `split_statid` int(11) NOT NULL DEFAULT '0',
  `newsletter_statid` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `email_split_stats_newsletters_split_news` (`split_statid`,`newsletter_statid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_stats_autoresponders`
--

DROP TABLE IF EXISTS `email_stats_autoresponders`;
CREATE TABLE IF NOT EXISTS `email_stats_autoresponders` (
  `statid` int(11) NOT NULL DEFAULT '0',
  `htmlrecipients` int(11) DEFAULT '0',
  `textrecipients` int(11) DEFAULT '0',
  `multipartrecipients` int(11) DEFAULT '0',
  `bouncecount_soft` int(11) DEFAULT '0',
  `bouncecount_hard` int(11) DEFAULT '0',
  `bouncecount_unknown` int(11) DEFAULT '0',
  `unsubscribecount` int(11) DEFAULT '0',
  `autoresponderid` int(11) DEFAULT '0',
  `linkclicks` int(11) DEFAULT '0',
  `emailopens` int(11) DEFAULT '0',
  `emailforwards` int(11) DEFAULT '0',
  `emailopens_unique` int(11) DEFAULT '0',
  `htmlopens` int(11) DEFAULT '0',
  `htmlopens_unique` int(11) DEFAULT '0',
  `textopens` int(11) DEFAULT '0',
  `textopens_unique` int(11) DEFAULT '0',
  `hiddenby` int(11) DEFAULT '0',
  PRIMARY KEY (`statid`),
  KEY `email_stats_autoresponders_statid_idx` (`statid`),
  KEY `email_stats_autoresponders_autoresponderid_idx` (`autoresponderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_stats_autoresponders`
--

INSERT INTO `email_stats_autoresponders` (`statid`, `htmlrecipients`, `textrecipients`, `multipartrecipients`, `bouncecount_soft`, `bouncecount_hard`, `bouncecount_unknown`, `unsubscribecount`, `autoresponderid`, `linkclicks`, `emailopens`, `emailforwards`, `emailopens_unique`, `htmlopens`, `htmlopens_unique`, `textopens`, `textopens_unique`, `hiddenby`) VALUES
(15, 0, 0, 2, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_stats_autoresponders_recipients`
--

DROP TABLE IF EXISTS `email_stats_autoresponders_recipients`;
CREATE TABLE IF NOT EXISTS `email_stats_autoresponders_recipients` (
  `statid` int(11) DEFAULT '0',
  `autoresponderid` int(11) DEFAULT '0',
  `send_status` char(1) DEFAULT NULL,
  `recipient` int(11) DEFAULT '0',
  `reason` varchar(20) DEFAULT NULL,
  `sendtime` int(11) DEFAULT NULL,
  KEY `email_stats_autoresponders_recipients_stat_auto_recip` (`statid`,`autoresponderid`,`recipient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_stats_autoresponders_recipients`
--

INSERT INTO `email_stats_autoresponders_recipients` (`statid`, `autoresponderid`, `send_status`, `recipient`, `reason`, `sendtime`) VALUES
(15, 1, '1', 4536, '', 1313128862),
(15, 1, '1', 4537, '', 1313128871);

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_stats_emailforwards`
--

DROP TABLE IF EXISTS `email_stats_emailforwards`;
CREATE TABLE IF NOT EXISTS `email_stats_emailforwards` (
  `forwardid` int(11) NOT NULL AUTO_INCREMENT,
  `forwardtime` int(11) DEFAULT '0',
  `forwardip` varchar(20) DEFAULT NULL,
  `subscriberid` int(11) DEFAULT NULL,
  `statid` int(11) DEFAULT '0',
  `subscribed` int(11) DEFAULT '0',
  `listid` int(11) DEFAULT NULL,
  `emailaddress` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`forwardid`),
  KEY `email_stats_emailforwards_subscriberid_idx` (`subscriberid`),
  KEY `email_stats_emailforwards_statid_idx` (`statid`),
  KEY `email_stats_emailforwards_listid_idx` (`listid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_stats_emailopens`
--

DROP TABLE IF EXISTS `email_stats_emailopens`;
CREATE TABLE IF NOT EXISTS `email_stats_emailopens` (
  `openid` int(11) NOT NULL AUTO_INCREMENT,
  `subscriberid` int(11) DEFAULT '0',
  `statid` int(11) DEFAULT '0',
  `opentime` int(11) DEFAULT '0',
  `openip` varchar(20) DEFAULT NULL,
  `fromlink` char(1) DEFAULT '0',
  `opentype` char(1) DEFAULT 'u',
  PRIMARY KEY (`openid`),
  KEY `email_stats_emailopens_subscriberid_idx` (`subscriberid`),
  KEY `email_stats_emailopens_statid_idx` (`statid`),
  KEY `email_open_statid_subscriberid` (`subscriberid`,`statid`),
  KEY `email_stats_emailopens_statid_opentime_idx` (`statid`,`opentime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1293 ;

--
-- Extraindo dados da tabela `email_stats_emailopens`
--
 

DROP TABLE IF EXISTS `email_stats_linkclicks`;
CREATE TABLE IF NOT EXISTS `email_stats_linkclicks` (
  `clickid` int(11) NOT NULL AUTO_INCREMENT,
  `clicktime` int(11) DEFAULT '0',
  `clickip` varchar(20) DEFAULT NULL,
  `subscriberid` int(11) DEFAULT '0',
  `statid` int(11) DEFAULT '0',
  `linkid` int(11) DEFAULT '0',
  PRIMARY KEY (`clickid`),
  KEY `email_stats_linkclicks_subscriberid_idx` (`subscriberid`),
  KEY `email_stats_linkclicks_statid_idx` (`statid`),
  KEY `email_stats_linkclicks_linkid_idx` (`linkid`),
  KEY `email_stats_linkclicks_subscriberid` (`subscriberid`),
  KEY `email_stats_linkclicks_statid_clicktime_idx` (`statid`,`clicktime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=224 ;

--
-- Extraindo dados da tabela `email_stats_linkclicks`
--
 

DROP TABLE IF EXISTS `email_stats_links`;
CREATE TABLE IF NOT EXISTS `email_stats_links` (
  `statid` int(11) DEFAULT '0',
  `linkid` int(11) DEFAULT '0',
  KEY `email_stats_links_statid_idx` (`statid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_stats_links`
--
 

DROP TABLE IF EXISTS `email_stats_newsletters`;
CREATE TABLE IF NOT EXISTS `email_stats_newsletters` (
  `statid` int(11) NOT NULL DEFAULT '0',
  `queueid` int(11) DEFAULT '0',
  `jobid` int(11) DEFAULT '0',
  `starttime` int(11) DEFAULT '0',
  `finishtime` int(11) DEFAULT '0',
  `htmlrecipients` int(11) DEFAULT '0',
  `textrecipients` int(11) DEFAULT '0',
  `multipartrecipients` int(11) DEFAULT '0',
  `trackopens` char(1) DEFAULT '0',
  `tracklinks` char(1) DEFAULT '0',
  `bouncecount_soft` int(11) DEFAULT '0',
  `bouncecount_hard` int(11) DEFAULT '0',
  `bouncecount_unknown` int(11) DEFAULT '0',
  `unsubscribecount` int(11) DEFAULT '0',
  `newsletterid` int(11) DEFAULT '0',
  `sendfromname` varchar(200) DEFAULT NULL,
  `sendfromemail` varchar(200) DEFAULT NULL,
  `bounceemail` varchar(200) DEFAULT NULL,
  `replytoemail` varchar(200) DEFAULT NULL,
  `charset` varchar(200) DEFAULT NULL,
  `sendinformation` mediumtext,
  `sendsize` int(11) DEFAULT '0',
  `sentby` int(11) DEFAULT '0',
  `notifyowner` char(1) DEFAULT '0',
  `linkclicks` int(11) DEFAULT '0',
  `emailopens` int(11) DEFAULT '0',
  `emailforwards` int(11) DEFAULT '0',
  `emailopens_unique` int(11) DEFAULT '0',
  `htmlopens` int(11) DEFAULT '0',
  `htmlopens_unique` int(11) DEFAULT '0',
  `textopens` int(11) DEFAULT '0',
  `textopens_unique` int(11) DEFAULT '0',
  `hiddenby` int(11) DEFAULT '0',
  `sendtestmode` int(11) DEFAULT '0',
  `sendtype` varchar(100) DEFAULT 'newsletter',
  PRIMARY KEY (`statid`),
  KEY `email_stats_newsletters_queue_idx` (`queueid`),
  KEY `email_stats_newsletters_sentby_idx` (`sentby`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_stats_newsletters`
-- 

DROP TABLE IF EXISTS `email_stats_newsletter_lists`;
CREATE TABLE IF NOT EXISTS `email_stats_newsletter_lists` (
  `statid` int(11) DEFAULT NULL,
  `listid` int(11) DEFAULT '0',
  UNIQUE KEY `email_stats_newsletter_lists_list_stat_idx` (`listid`,`statid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_stats_newsletter_lists`
--
 

DROP TABLE IF EXISTS `email_stats_sequence`;
CREATE TABLE IF NOT EXISTS `email_stats_sequence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `email_stats_sequence`
--

INSERT INTO `email_stats_sequence` (`id`) VALUES
(16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_stats_users`
--

DROP TABLE IF EXISTS `email_stats_users`;
CREATE TABLE IF NOT EXISTS `email_stats_users` (
  `userid` int(11) DEFAULT '0',
  `statid` int(11) DEFAULT '0',
  `jobid` int(11) DEFAULT '0',
  `queuesize` int(11) DEFAULT '0',
  `queuetime` int(11) DEFAULT '0',
  KEY `email_stats_users_all_idx` (`userid`,`queuetime`,`queuesize`),
  KEY `email_stats_users_statid_idx` (`statid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_subscribers_data`
--

DROP TABLE IF EXISTS `email_subscribers_data`;
CREATE TABLE IF NOT EXISTS `email_subscribers_data` (
  `subscriberid` int(11) NOT NULL DEFAULT '0',
  `fieldid` int(11) NOT NULL DEFAULT '0',
  `data` text,
  UNIQUE KEY `email_subscribers_data_subscriber_field_idx` (`subscriberid`,`fieldid`),
  KEY `email_subscribers_data_data_idx` (`data`(255)),
  KEY `email_subscriber_data_field_subscriber_idx` (`fieldid`,`subscriberid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_subscribers_data`
--
 

DROP TABLE IF EXISTS `email_surveys`;
CREATE TABLE IF NOT EXISTS `email_surveys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT '0',
  `name` tinytext,
  `description` text,
  `created` int(11) NOT NULL,
  `updated` int(11) DEFAULT NULL,
  `surveys_header` enum('headertext','headerlogo') NOT NULL DEFAULT 'headertext',
  `surveys_header_text` varchar(255) NOT NULL,
  `surveys_header_logo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_feedback` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `after_submit` enum('show_message','show_uri') NOT NULL DEFAULT 'show_message',
  `show_message` text NOT NULL,
  `show_uri` text NOT NULL,
  `error_message` text NOT NULL,
  `submit_button_text` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_surveys_fields`
--

DROP TABLE IF EXISTS `email_surveys_fields`;
CREATE TABLE IF NOT EXISTS `email_surveys_fields` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `surveys_widget_id` int(11) unsigned NOT NULL DEFAULT '0',
  `value` text,
  `is_selected` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_other` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `other_label_text` tinytext NOT NULL,
  `display_order` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `surveys_widget_id` (`surveys_widget_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_surveys_response`
--

DROP TABLE IF EXISTS `email_surveys_response`;
CREATE TABLE IF NOT EXISTS `email_surveys_response` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `surveys_id` int(11) unsigned NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `surveys_id` (`surveys_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_surveys_response_value`
--

DROP TABLE IF EXISTS `email_surveys_response_value`;
CREATE TABLE IF NOT EXISTS `email_surveys_response_value` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `surveys_response_id` int(11) unsigned NOT NULL DEFAULT '0',
  `surveys_widgets_id` int(11) unsigned NOT NULL DEFAULT '0',
  `value` text,
  `is_othervalue` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `file_value` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surveys_response_id` (`surveys_response_id`),
  KEY `surveys_widgets_id` (`surveys_widgets_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_surveys_widgets`
--

DROP TABLE IF EXISTS `email_surveys_widgets`;
CREATE TABLE IF NOT EXISTS `email_surveys_widgets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `surveys_id` int(11) unsigned NOT NULL DEFAULT '0',
  `name` tinytext,
  `description` text,
  `type` varchar(255) NOT NULL,
  `is_required` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_random` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_visible` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowed_file_types` text,
  `display_order` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `surveys_id` (`surveys_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE IF NOT EXISTS `email_templates` (
  `templateid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `format` char(1) DEFAULT NULL,
  `textbody` longtext,
  `htmlbody` longtext,
  `createdate` int(11) DEFAULT '0',
  `active` int(11) DEFAULT '0',
  `isglobal` int(11) DEFAULT '0',
  `ownerid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`templateid`),
  KEY `email_templates_owner_idx` (`ownerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_triggeremails`
--

DROP TABLE IF EXISTS `email_triggeremails`;
CREATE TABLE IF NOT EXISTS `email_triggeremails` (
  `triggeremailsid` int(11) NOT NULL AUTO_INCREMENT,
  `active` char(1) NOT NULL DEFAULT '0',
  `createdate` int(11) NOT NULL,
  `ownerid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `triggertype` char(1) NOT NULL,
  `triggerhours` int(11) DEFAULT '0',
  `triggerinterval` int(11) DEFAULT '0',
  `queueid` int(11) NOT NULL,
  `statid` int(11) NOT NULL,
  PRIMARY KEY (`triggeremailsid`),
  UNIQUE KEY `queueid` (`queueid`),
  UNIQUE KEY `statid` (`statid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_triggeremails_actions`
--

DROP TABLE IF EXISTS `email_triggeremails_actions`;
CREATE TABLE IF NOT EXISTS `email_triggeremails_actions` (
  `triggeremailsactionid` int(11) NOT NULL AUTO_INCREMENT,
  `triggeremailsid` int(11) NOT NULL,
  `action` varchar(25) NOT NULL,
  PRIMARY KEY (`triggeremailsactionid`),
  UNIQUE KEY `triggeremailsid` (`triggeremailsid`,`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_triggeremails_actions_data`
--

DROP TABLE IF EXISTS `email_triggeremails_actions_data`;
CREATE TABLE IF NOT EXISTS `email_triggeremails_actions_data` (
  `triggeremailsactionid` int(11) NOT NULL,
  `datakey` varchar(25) NOT NULL,
  `datavaluestring` varchar(255) DEFAULT NULL,
  `datavalueinteger` int(11) DEFAULT NULL,
  `triggeremailsid` int(11) NOT NULL,
  KEY `email_triggeremails_actions_data_datavaluestring_idx` (`triggeremailsactionid`,`datakey`,`datavaluestring`),
  KEY `email_triggeremails_actions_data_datavalueinteger_idx` (`triggeremailsactionid`,`datakey`,`datavalueinteger`),
  KEY `email_triggeremails_actions_data_triggeremailsid_idx` (`triggeremailsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_triggeremails_data`
--

DROP TABLE IF EXISTS `email_triggeremails_data`;
CREATE TABLE IF NOT EXISTS `email_triggeremails_data` (
  `triggeremailsid` int(11) NOT NULL,
  `datakey` varchar(25) NOT NULL,
  `datavaluestring` varchar(255) DEFAULT NULL,
  `datavalueinteger` int(11) DEFAULT NULL,
  KEY `email_triggeremails_data_datavaluestring_idx` (`triggeremailsid`,`datakey`,`datavaluestring`),
  KEY `email_triggeremails_data_datavalueinteger_idx` (`triggeremailsid`,`datakey`,`datavalueinteger`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_triggeremails_log`
--

DROP TABLE IF EXISTS `email_triggeremails_log`;
CREATE TABLE IF NOT EXISTS `email_triggeremails_log` (
  `triggeremailsid` int(11) NOT NULL,
  `subscriberid` int(11) NOT NULL,
  `action` varchar(25) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  KEY `email_triggeremails_log_idx` (`triggeremailsid`,`subscriberid`,`action`,`timestamp`,`note`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_triggeremails_log_summary`
--

DROP TABLE IF EXISTS `email_triggeremails_log_summary`;
CREATE TABLE IF NOT EXISTS `email_triggeremails_log_summary` (
  `triggeremailsid` int(11) NOT NULL,
  `subscriberid` int(11) NOT NULL,
  `actionedoncount` int(11) DEFAULT '0',
  `lastactiontimestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`triggeremailsid`,`subscriberid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_usergroups`
--

DROP TABLE IF EXISTS `email_usergroups`;
CREATE TABLE IF NOT EXISTS `email_usergroups` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(255) NOT NULL,
  `createdate` int(11) NOT NULL,
  `limit_list` int(11) DEFAULT '0',
  `limit_hourlyemailsrate` int(11) DEFAULT '0',
  `limit_emailspermonth` int(11) DEFAULT '0',
  `limit_totalemailslimit` int(11) DEFAULT NULL,
  `forcedoubleoptin` char(1) DEFAULT '0',
  `forcespamcheck` char(1) DEFAULT '0',
  `systemadmin` char(1) DEFAULT '0',
  `listadmin` char(1) DEFAULT '0',
  `segmentadmin` char(1) DEFAULT '0',
  `templateadmin` char(1) DEFAULT '0',
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `email_usergroups`
--

INSERT INTO `email_usergroups` (`groupid`, `groupname`, `createdate`, `limit_list`, `limit_hourlyemailsrate`, `limit_emailspermonth`, `limit_totalemailslimit`, `forcedoubleoptin`, `forcespamcheck`, `systemadmin`, `listadmin`, `segmentadmin`, `templateadmin`) VALUES
(1, 'System Admin', 1301364702, 0, 0, 0, NULL, '0', '0', '1', '0', '0', '0'),
(2, 'Clientes', 1314726533, 0, 100, 144000, 0, '0', '0', '0', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_usergroups_access`
--

DROP TABLE IF EXISTS `email_usergroups_access`;
CREATE TABLE IF NOT EXISTS `email_usergroups_access` (
  `groupid` int(11) NOT NULL,
  `resourcetype` varchar(100) NOT NULL,
  `resourceid` int(11) NOT NULL,
  KEY `groupid` (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_usergroups_permissions`
--

DROP TABLE IF EXISTS `email_usergroups_permissions`;
CREATE TABLE IF NOT EXISTS `email_usergroups_permissions` (
  `groupid` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `subarea` varchar(255) DEFAULT NULL,
  KEY `groupid` (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_usergroups_permissions`
--

INSERT INTO `email_usergroups_permissions` (`groupid`, `area`, `subarea`) VALUES
(2, 'autoresponders', 'create'),
(2, 'autoresponders', 'edit'),
(2, 'autoresponders', 'delete'),
(2, 'autoresponders', 'approve'),
(2, 'newsletters', 'create'),
(2, 'newsletters', 'edit'),
(2, 'newsletters', 'delete'),
(2, 'newsletters', 'approve'),
(2, 'newsletters', 'send'),
(2, 'templates', 'create'),
(2, 'templates', 'edit'),
(2, 'templates', 'delete'),
(2, 'templates', 'approve'),
(2, 'templates', 'global'),
(2, 'templates', 'builtin'),
(2, 'subscribers', 'manage'),
(2, 'subscribers', 'add'),
(2, 'subscribers', 'edit'),
(2, 'subscribers', 'delete'),
(2, 'subscribers', 'import'),
(2, 'subscribers', 'export'),
(2, 'subscribers', 'banned'),
(2, 'subscribers', 'eventsave'),
(2, 'lists', 'create'),
(2, 'lists', 'edit'),
(2, 'lists', 'delete'),
(2, 'lists', 'bounce'),
(2, 'lists', 'bouncesettings'),
(2, 'statistics', 'newsletter'),
(2, 'statistics', 'user'),
(2, 'statistics', 'autoresponder'),
(2, 'statistics', 'list'),
(2, 'statistics', 'triggeremails');

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_users`
--

DROP TABLE IF EXISTS `email_users`;
CREATE TABLE IF NOT EXISTS `email_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) NOT NULL,
  `trialuser` char(1) DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `unique_token` varchar(128) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `admintype` char(1) DEFAULT NULL,
  `listadmintype` char(1) DEFAULT NULL,
  `templateadmintype` char(1) DEFAULT NULL,
  `segmentadmintype` char(1) DEFAULT NULL,
  `status` char(1) DEFAULT '0',
  `fullname` varchar(255) DEFAULT NULL,
  `emailaddress` varchar(100) DEFAULT NULL,
  `settings` text,
  `editownsettings` char(1) DEFAULT '0',
  `usertimezone` varchar(10) DEFAULT NULL,
  `textfooter` text,
  `htmlfooter` text,
  `infotips` char(1) DEFAULT '1',
  `smtpserver` varchar(255) DEFAULT NULL,
  `smtpusername` varchar(255) DEFAULT NULL,
  `smtppassword` varchar(255) DEFAULT NULL,
  `smtpport` int(11) DEFAULT '0',
  `createdate` int(11) DEFAULT '0',
  `lastloggedin` int(11) DEFAULT '0',
  `forgotpasscode` char(32) DEFAULT '',
  `usewysiwyg` char(1) DEFAULT '1',
  `enableactivitylog` char(1) DEFAULT '0',
  `xmlapi` char(1) DEFAULT '0',
  `xmltoken` char(40) DEFAULT NULL,
  `gettingstarted` int(11) NOT NULL DEFAULT '0',
  `googlecalendarusername` varchar(255) DEFAULT NULL,
  `googlecalendarpassword` varchar(255) DEFAULT NULL,
  `user_language` varchar(25) NOT NULL DEFAULT 'default',
  `eventactivitytype` longtext,
  `credit_warning_time` int(11) DEFAULT NULL,
  `credit_warning_percentage` int(11) DEFAULT NULL,
  `credit_warning_fixed` int(11) DEFAULT NULL,
  `adminnotify_email` varchar(100) DEFAULT NULL,
  `adminnotify_send_flag` char(1) DEFAULT '0',
  `adminnotify_send_threshold` int(11) DEFAULT NULL,
  `adminnotify_send_emailtext` text,
  `adminnotify_import_flag` char(1) DEFAULT '0',
  `adminnotify_import_threshold` int(11) DEFAULT NULL,
  `adminnotify_import_emailtext` text,
  PRIMARY KEY (`userid`),
  KEY `groupid` (`groupid`),
  KEY `email_users_logincheck_idx` (`username`,`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `email_users`
--

INSERT INTO `email_users` (`userid`, `groupid`, `trialuser`, `username`, `unique_token`, `password`, `admintype`, `listadmintype`, `templateadmintype`, `segmentadmintype`, `status`, `fullname`, `emailaddress`, `settings`, `editownsettings`, `usertimezone`, `textfooter`, `htmlfooter`, `infotips`, `smtpserver`, `smtpusername`, `smtppassword`, `smtpport`, `createdate`, `lastloggedin`, `forgotpasscode`, `usewysiwyg`, `enableactivitylog`, `xmlapi`, `xmltoken`, `gettingstarted`, `googlecalendarusername`, `googlecalendarpassword`, `user_language`, `eventactivitytype`, `credit_warning_time`, `credit_warning_percentage`, `credit_warning_fixed`, `adminnotify_email`, `adminnotify_send_flag`, `adminnotify_send_threshold`, `adminnotify_send_emailtext`, `adminnotify_import_flag`, `adminnotify_import_threshold`, `adminnotify_import_emailtext`) VALUES
(8, 1, '0', 'master', '58aa04842a8d1417d7272b93d06280f8bb073f1f33732f2c9c367c4e2bbd74f8f858b6e9cf489828ff4d8bb756960ab35baace1f', '20f1a1dfd78903c335b557f6772b2d1b', '', '', '', '', '1', 'Vipcom Master', 'atendimento@tkstore.com.br', 'a:2:{s:10:"LoginCheck";s:14:"14e6043cb129f0";s:15:"DisplaySettings";a:1:{s:12:"NumberToShow";a:1:{s:11:"subscribers";i:100;}}}', '1', 'GMT-3:00', ' ', '', '0', '', '', '', 25, 1301887842, 1314949659, '', '1', '1', '0', '', 0, '', '', 'default', 'a:3:{i:0;s:10:"Phone Call";i:1;s:7:"Meeting";i:2;s:5:"Email";}', NULL, NULL, NULL, 'atendimento@sistemacomprascoletivas.com.br', '1', 1, '***Este ', '0', 1000, '***Este '),
(20, 2, '0', 'vipcom', '58aa04842a8d1417d7272b93d06280f8bb073f1f33732f2c9c367c4e2bbd74f8f858b6e9cf489828ff4d8bb756960ab35baace1f', 'f25aeba80e6dd6d304c0c7b88e613bfc', '', '', '', '', '1', 'Usuários Vipcom', 'atendimento@tkstore.com.br', 'a:2:{s:10:"LoginCheck";s:14:"14e6040914fbbf";s:15:"DisplaySettings";a:1:{s:12:"NumberToShow";a:1:{s:11:"subscribers";i:100;}}}', '1', 'GMT-3:00', ' ', '', '1', '', '', '', 25, 1301887842, 1314948833, '', '1', '1', '0', '', 0, '', '', 'default', 'a:3:{i:0;s:10:"Phone Call";i:1;s:7:"Meeting";i:2;s:5:"Email";}', NULL, NULL, NULL, 'atendimento@sistemacomprascoletivas.com.br', '0', 1, '***Este é um e-mail automatico, por favor não responda***\r\n\r\n%%user_fullname%% Enviou uma campanha de e-mail entitulada como "%%campaign_title%%" com assunto "%%campaign_subject%%" para %%number_of_contacts%% contatos.\r\n\r\nPara deixar de receber estas mensagens, efetue login no seu sistema de e-mail e edite o usuário %%user_fullname%% e vá até a aba "Notificações do Administrador".', '0', 1000, '***Este é um e-mail automático, por favor não responda.***\r\n\r\n%%user_fullname%% importou %%number_of_contacts%% contatos em sua lista de contatos nomeada por "%%list_name%%".\r\n\r\nPara deixar de receber estas mensagens, efetue login no seu sistema de e-mail e edite o usuário %%user_fullname%% e vá até a aba "Notificações do Administrador".');

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_user_activitylog`
--

DROP TABLE IF EXISTS `email_user_activitylog`;
CREATE TABLE IF NOT EXISTS `email_user_activitylog` (
  `lastviewid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `viewed` int(11) NOT NULL,
  PRIMARY KEY (`lastviewid`),
  KEY `email_user_activitylog_userid_viewed_idx` (`userid`,`viewed`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=219 ;

--
-- Extraindo dados da tabela `email_user_activitylog`
--
 

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_user_credit`
--

DROP TABLE IF EXISTS `email_user_credit`;
CREATE TABLE IF NOT EXISTS `email_user_credit` (
  `usercreditid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `transactiontype` varchar(25) NOT NULL,
  `transactiontime` int(10) unsigned NOT NULL,
  `credit` bigint(20) NOT NULL,
  `jobid` int(11) DEFAULT NULL,
  `statid` int(11) DEFAULT NULL,
  `expiry` int(11) DEFAULT NULL,
  PRIMARY KEY (`usercreditid`),
  KEY `email_user_credit_transactiontype_idx` (`transactiontype`),
  KEY `email_user_credit_userid_transactiontype_idx` (`userid`,`transactiontype`),
  KEY `email_user_credit_transactiontime_idx` (`transactiontime`),
  KEY `email_user_credit_userid_transactiontime_idx` (`userid`,`transactiontime`),
  KEY `email_user_credit_transactiontype_transactiontime_idx` (`transactiontype`,`transactiontime`),
  KEY `email_user_credit_userid_transactiontype_transactiontime_idx` (`userid`,`transactiontype`,`transactiontime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_user_credit_summary`
--

DROP TABLE IF EXISTS `email_user_credit_summary`;
CREATE TABLE IF NOT EXISTS `email_user_credit_summary` (
  `usagesummaryid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `startperiod` int(11) NOT NULL,
  `credit_used` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usagesummaryid`),
  UNIQUE KEY `userid` (`userid`,`startperiod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_user_stats_emailsperhour`
--

DROP TABLE IF EXISTS `email_user_stats_emailsperhour`;
CREATE TABLE IF NOT EXISTS `email_user_stats_emailsperhour` (
  `summaryid` int(11) NOT NULL AUTO_INCREMENT,
  `statid` int(11) DEFAULT '0',
  `sendtime` int(11) DEFAULT '0',
  `emailssent` int(11) DEFAULT '0',
  `userid` int(11) DEFAULT '0',
  PRIMARY KEY (`summaryid`),
  KEY `email_user_stats_emailsperhour_statid_idx` (`statid`),
  KEY `email_user_stats_emailsperhour_userid_idx` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Extraindo dados da tabela `email_user_stats_emailsperhour`
--
 

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_whitelabel_settings`
--

DROP TABLE IF EXISTS `email_whitelabel_settings`;
CREATE TABLE IF NOT EXISTS `email_whitelabel_settings` (
  `name` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email_whitelabel_settings`
--

INSERT INTO `email_whitelabel_settings` (`name`, `value`) VALUES
('APPLICATION_FAVICON', 'images/favicon.ico'),
('APPLICATION_LOGO_IMAGE', 'temp/applicationlogo.png'),
('LNG_ApplicationTitle', 'Email Marketing '),
('LNG_Copyright', ''),
('LNG_Default_Global_HTML_Footer', ''),
('LNG_Default_Global_Text_Footer', ' '),
('LNG_FreeTrial_Expiry_Login', 'Sua versao trial expirou. Contate o administrador'),
('SHOW_INTRO_VIDEO', '1'),
('SHOW_SMTP_COM_OPTION', '1');


SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


DELETE FROM `email_usergroups` where `groupid` = 2 ;

INSERT INTO `email_usergroups` (`groupid`, `groupname`, `createdate`, `limit_list`, `limit_hourlyemailsrate`, `limit_emailspermonth`, `limit_totalemailslimit`, `forcedoubleoptin`, `forcespamcheck`, `systemadmin`, `listadmin`, `segmentadmin`, `templateadmin`) VALUES
(2, 'Clientes', 1314726533, 0, 100, 144000, 0, '0', '0', '0', '1', '1', '1');

DELETE FROM `email_users`;


INSERT INTO `email_users` (`userid`, `groupid`, `trialuser`, `username`, `unique_token`, `password`, `admintype`, `listadmintype`, `templateadmintype`, `segmentadmintype`, `status`, `fullname`, `emailaddress`, `settings`, `editownsettings`, `usertimezone`, `textfooter`, `htmlfooter`, `infotips`, `smtpserver`, `smtpusername`, `smtppassword`, `smtpport`, `createdate`, `lastloggedin`, `forgotpasscode`, `usewysiwyg`, `enableactivitylog`, `xmlapi`, `xmltoken`, `gettingstarted`, `googlecalendarusername`, `googlecalendarpassword`, `user_language`, `eventactivitytype`, `credit_warning_time`, `credit_warning_percentage`, `credit_warning_fixed`, `adminnotify_email`, `adminnotify_send_flag`, `adminnotify_send_threshold`, `adminnotify_send_emailtext`, `adminnotify_import_flag`, `adminnotify_import_threshold`, `adminnotify_import_emailtext`) VALUES
(8, 1, '0', 'master', '58aa04842a8d1417d7272b93d06280f8bb073f1f33732f2c9c367c4e2bbd74f8f858b6e9cf489828ff4d8bb756960ab35baace1f', '20f1a1dfd78903c335b557f6772b2d1b', '', '', '', '', '1', 'Vipcom Master', 'atendimento@tkstore.com.br', 'a:2:{s:10:"LoginCheck";s:14:"14e6043cb129f0";s:15:"DisplaySettings";a:1:{s:12:"NumberToShow";a:1:{s:11:"subscribers";i:100;}}}', '1', 'GMT-3:00', ' ', '', '0', '', '', '', 25, 1301887842, 1314949659, '', '1', '1', '0', '', 0, '', '', 'default', 'a:3:{i:0;s:10:"Phone Call";i:1;s:7:"Meeting";i:2;s:5:"Email";}', NULL, NULL, NULL, 'atendimento@sistemacomprascoletivas.com.br', '1', 1, '***Este ', '0', 1000, '***Este '),
(20, 2, '0', 'vipcom', '58aa04842a8d1417d7272b93d06280f8bb073f1f33732f2c9c367c4e2bbd74f8f858b6e9cf489828ff4d8bb756960ab35baace1f', 'f25aeba80e6dd6d304c0c7b88e613bfc', '', '', '', '', '1', 'Usuários Vipcom', 'atendimento@tkstore.com.br', 'a:2:{s:10:"LoginCheck";s:14:"14e6040914fbbf";s:15:"DisplaySettings";a:1:{s:12:"NumberToShow";a:1:{s:11:"subscribers";i:100;}}}', '1', 'GMT-3:00', ' ', '', '1', '', '', '', 25, 1301887842, 1314948833, '', '1', '1', '0', '', 0, '', '', 'default', 'a:3:{i:0;s:10:"Phone Call";i:1;s:7:"Meeting";i:2;s:5:"Email";}', NULL, NULL, NULL, 'atendimento@sistemacomprascoletivas.com.br', '0', 1, '***Este é um e-mail automatico, por favor não responda***\r\n\r\n%%user_fullname%% Enviou uma campanha de e-mail entitulada como "%%campaign_title%%" com assunto "%%campaign_subject%%" para %%number_of_contacts%% contatos.\r\n\r\nPara deixar de receber estas mensagens, efetue login no seu sistema de e-mail e edite o usuário %%user_fullname%% e vá até a aba "Notificações do Administrador".', '0', 1000, '***Este é um e-mail automático, por favor não responda.***\r\n\r\n%%user_fullname%% importou %%number_of_contacts%% contatos em sua lista de contatos nomeada por "%%list_name%%".\r\n\r\nPara deixar de receber estas mensagens, efetue login no seu sistema de e-mail e edite o usuário %%user_fullname%% e vá até a aba "Notificações do Administrador".');


DELETE FROM `email_usergroups_permissions`;

INSERT INTO `email_usergroups_permissions` (`groupid`, `area`, `subarea`) VALUES
(2, 'autoresponders', 'create'),
(2, 'autoresponders', 'edit'),
(2, 'autoresponders', 'delete'),
(2, 'autoresponders', 'approve'),
(2, 'newsletters', 'create'),
(2, 'newsletters', 'edit'),
(2, 'newsletters', 'delete'),
(2, 'newsletters', 'approve'),
(2, 'newsletters', 'send'),
(2, 'templates', 'create'),
(2, 'templates', 'edit'),
(2, 'templates', 'delete'),
(2, 'templates', 'approve'),
(2, 'templates', 'global'),
(2, 'templates', 'builtin'),
(2, 'subscribers', 'manage'),
(2, 'subscribers', 'add'),
(2, 'subscribers', 'edit'),
(2, 'subscribers', 'delete'),
(2, 'subscribers', 'import'),
(2, 'subscribers', 'export'),
(2, 'subscribers', 'banned'),
(2, 'subscribers', 'eventsave'),
(2, 'lists', 'create'),
(2, 'lists', 'edit'),
(2, 'lists', 'delete'),
(2, 'lists', 'bounce'),
(2, 'lists', 'bouncesettings'),
(2, 'statistics', 'newsletter'),
(2, 'statistics', 'user'),
(2, 'statistics', 'autoresponder'),
(2, 'statistics', 'list'),
(2, 'statistics', 'triggeremails');


UPDATE `email_config_settings` SET  `areavalue` = '100' WHERE `area` = 'MAXHOURLYRATE' ;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `email_triggeremails_actions`
--
ALTER TABLE `email_triggeremails_actions`
  ADD CONSTRAINT `email_triggeremails_actions_ibfk_1` FOREIGN KEY (`triggeremailsid`) REFERENCES `email_triggeremails` (`triggeremailsid`) ON DELETE CASCADE;

--
-- Restrições para a tabela `email_triggeremails_actions_data`
--
ALTER TABLE `email_triggeremails_actions_data`
  ADD CONSTRAINT `email_triggeremails_actions_data_ibfk_1` FOREIGN KEY (`triggeremailsactionid`) REFERENCES `email_triggeremails_actions` (`triggeremailsactionid`) ON DELETE CASCADE,
  ADD CONSTRAINT `email_triggeremails_actions_data_ibfk_2` FOREIGN KEY (`triggeremailsid`) REFERENCES `email_triggeremails` (`triggeremailsid`) ON DELETE CASCADE;

--
-- Restrições para a tabela `email_triggeremails_data`
--
ALTER TABLE `email_triggeremails_data`
  ADD CONSTRAINT `email_triggeremails_data_ibfk_1` FOREIGN KEY (`triggeremailsid`) REFERENCES `email_triggeremails` (`triggeremailsid`) ON DELETE CASCADE;

--
-- Restrições para a tabela `email_triggeremails_log`
--
ALTER TABLE `email_triggeremails_log`
  ADD CONSTRAINT `email_triggeremails_log_ibfk_1` FOREIGN KEY (`triggeremailsid`) REFERENCES `email_triggeremails` (`triggeremailsid`) ON DELETE CASCADE;

--
-- Restrições para a tabela `email_triggeremails_log_summary`
--
ALTER TABLE `email_triggeremails_log_summary`
  ADD CONSTRAINT `email_triggeremails_log_summary_ibfk_1` FOREIGN KEY (`triggeremailsid`) REFERENCES `email_triggeremails` (`triggeremailsid`) ON DELETE CASCADE;

--
-- Restrições para a tabela `email_usergroups_access`
--
ALTER TABLE `email_usergroups_access`
  ADD CONSTRAINT `email_usergroups_access_ibfk_1` FOREIGN KEY (`groupid`) REFERENCES `email_usergroups` (`groupid`);

--
-- Restrições para a tabela `email_usergroups_permissions`
--
ALTER TABLE `email_usergroups_permissions`
  ADD CONSTRAINT `email_usergroups_permissions_ibfk_1` FOREIGN KEY (`groupid`) REFERENCES `email_usergroups` (`groupid`) ON DELETE CASCADE;

--
-- Restrições para a tabela `email_users`
--
ALTER TABLE `email_users`
  ADD CONSTRAINT `email_users_ibfk_1` FOREIGN KEY (`groupid`) REFERENCES `email_usergroups` (`groupid`);

--
-- Restrições para a tabela `email_user_activitylog`
--
ALTER TABLE `email_user_activitylog`
  ADD CONSTRAINT `email_user_activitylog_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `email_users` (`userid`) ON DELETE CASCADE;

--
-- Restrições para a tabela `email_user_credit`
--
ALTER TABLE `email_user_credit`
  ADD CONSTRAINT `email_user_credit_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `email_users` (`userid`) ON DELETE CASCADE;

--
-- Restrições para a tabela `email_user_credit_summary`
--
ALTER TABLE `email_user_credit_summary`
  ADD CONSTRAINT `email_user_credit_summary_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `email_users` (`userid`) ON DELETE CASCADE;
SET FOREIGN_KEY_CHECKS=1;

 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT ;
 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS ;
 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION ;
