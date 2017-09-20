ALTER TABLE  `user` ADD  `cnpj` VARCHAR( 20 ) NULL AFTER  `id` ,
ADD  `tipoanunciante` VARCHAR( 20 ) NULL AFTER  `cnpj` ,
ADD  `nascimento` VARCHAR( 20 ) NULL AFTER  `tipoanunciante` ,
ADD  `sexo` VARCHAR( 20 ) NULL AFTER  `nascimento` ,
ADD  `telefonefixo` VARCHAR( 50 ) NULL AFTER  `sexo` ,
ADD  `site` VARCHAR( 200 ) NULL AFTER  `telefonefixo` ,
ADD  `pessoaresponsavel` VARCHAR( 200 ) NULL AFTER  `site`,
ADD  `nextel` VARCHAR( 50 ) NULL,
ADD  `celular` VARCHAR( 50 ) NULL,
ADD  `ddd2` VARCHAR( 50 ) NULL,

ALTER TABLE  `user` CHANGE  `city_id`  `city_id` INT( 10 ) UNSIGNED NULL DEFAULT  '0',
ALTER TABLE  `team` ADD  `ehdestaquebusca` CHAR( 1 ) NULL;

ALTER TABLE  `team` ADD  `renavam` VARCHAR( 50 ) NULL ,
ADD  `placa` VARCHAR( 50 ) NULL;

ALTER TABLE  `team` ADD  `gal_image4` VARCHAR( 250 ) NULL ,
ADD  `gal_image5` VARCHAR( 250 ) NULL ,
ADD  `gal_image6` VARCHAR( 250 ) NULL ,
ADD  `gal_image9` VARCHAR( 250 ) NULL ,
ADD  `gal_image10` VARCHAR( 250 ) NULL;
 
ALTER TABLE  `team` ADD  `video1` VARCHAR( 255 ) NULL ,
ADD  `video2` VARCHAR( 255 ) NULL;

ALTER TABLE  `team` ADD  `promooutros` TEXT NULL ,
ADD  `vea_promocoes` TEXT NULL;

ALTER TABLE  `team` ADD  `precorevendas` DOUBLE( 10, 2 ) NULL ,
ADD  `temprecoespecial` DOUBLE( 10, 2 ) NULL;


CREATE TABLE  `classic-car-enterprise-premium`.`faq` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`pergunta` VARCHAR( 250 ) NULL ,
`resposta` TEXT NULL  
) ENGINE = INNODB;

ALTER TABLE  `faq` ADD  `ordem` INT NULL;

ALTER TABLE  `feedback` ADD  `assunto` VARCHAR( 200 ) NULL ,
ADD  `telefonecontato` VARCHAR( 100 ) NULL ,
ADD  `cpfncpj` VARCHAR( 100 ) NULL; 

ALTER TABLE  `planos_publicacao` ADD  `qtdvideos` INT( 11 ) NULL ,
ADD  `qtdfotos` INT( 11 ) NULL ,
ADD  `saibaacessos` CHAR( 1 ) NULL ,
ADD  `recebapropostas` CHAR( 1 ) NULL;

ALTER TABLE  `planos_publicacao` ADD  `destaquebusca` CHAR( 1 ) NULL;

CREATE TABLE `planos_upgrade` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`nome` VARCHAR( 255 ) NULL ,
`descricao` TEXT NULL ,
`preco` DOUBLE( 14, 2 ) NULL ,
`status` INT( 1 ) NULL
) ENGINE = INNODB;



INSERT INTO `planos_upgrade` (`id`, `nome`, `descricao`, `preco`, `status`) VALUES
(1, 'VITRINE DA PÁGINA', 'Anuncie na vitrine da página inicial. Os anúncios são mostrados de forma aleatória entre os anunciantes, por apenas:', 40.00, 1),
(2, 'QUERO DESTAQUE', 'Destaque seu anúncio no resultado da busca, por apenas:', 20.00, 1),
(3, 'INSERIR VIDEO', 'Insira um vídeo no seu anúncio, por apenas:', 10.00, NULL);

CREATE TABLE   `planos_upgrade_partner_plano` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`idupgrade` INT( 11 ) NULL ,
`idpartnerplanos` INT( 11 ) NULL ,
`usou` CHAR( 1 ) NULL
) ENGINE = INNODB;
