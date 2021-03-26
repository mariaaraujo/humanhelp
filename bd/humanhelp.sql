-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 26-Nov-2019 às 10:54
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `humanhelp`
--
CREATE DATABASE IF NOT EXISTS `humanhelp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `humanhelp`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contato_instituicao`
--

CREATE TABLE IF NOT EXISTS `tb_contato_instituicao` (
  `cd_contato_instituicao` int(11) NOT NULL,
  `cd_telefone` varchar(20) DEFAULT NULL,
  `nm_facebook` varchar(100) DEFAULT NULL,
  `cd_instituicao` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_contato_instituicao`),
  KEY `pk_contato_instituicao_instituicao` (`cd_instituicao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_contato_instituicao`
--

INSERT INTO `tb_contato_instituicao` (`cd_contato_instituicao`, `cd_telefone`, `nm_facebook`, `cd_instituicao`) VALUES
(1, '(13) 3877-7737', 'https://www.facebook.com/ONGVivaBichoSantos/', 1),
(2, '(13) 3203-5075', 'https://pt-br.facebook.com/animaisdacodevida/', 2),
(3, '(13) 3561-1962', 'https://www.facebook.com/ecomov/', 3),
(4, '(13) 3463-7519', '', 4),
(5, '(13) 3467-8990', '', 5),
(6, '(13) 3561-7896', NULL, 6),
(7, '(13) 3463-5658', '', 7),
(8, '(11) 2946-9157', NULL, 8),
(9, '(64) 3444-1360', 'https://pt-br.facebook.com/pages/Santa-Casa-de-Miseric%C3%B3rdia-de-Buriti-Alegre/394875680550278', 9),
(10, '(13) 3495-4913', 'https://pt-br.facebook.com/ONGDCM', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

CREATE TABLE IF NOT EXISTS `tb_endereco` (
  `cd_endereco` int(11) NOT NULL,
  `cd_cep` char(9) DEFAULT NULL,
  `nm_logradouro` varchar(100) DEFAULT NULL,
  `cd_numero` varchar(5) DEFAULT NULL,
  `nm_complemento` varchar(15) DEFAULT NULL,
  `nm_bairro` varchar(60) DEFAULT NULL,
  `nm_cidade` varchar(60) DEFAULT NULL,
  `nm_estado` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`cd_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_endereco`
--

INSERT INTO `tb_endereco` (`cd_endereco`, `cd_cep`, `nm_logradouro`, `cd_numero`, `nm_complemento`, `nm_bairro`, `nm_cidade`, `nm_estado`) VALUES
(1, '11370-001', 'Avenida Antônio Emmerick', '651', 'ap 06', 'Jardim Guassu', 'São Vicente', 'SP'),
(2, '11340-220', 'Rua Professora Eulina Trindade', '176', NULL, 'Esplanada dos Barreiros', 'São Vicente', 'São Paulo'),
(3, '11360-380', 'Rua Érico Veríssimo', '533', NULL, 'Jockey Club', 'São Vicente', 'São Paulo'),
(4, '11340-340', 'Rua Jardel França', '670', NULL, 'Náutica III', 'São Vicente', 'São Paulo'),
(5, '11320-150', 'Rua Coronel Pinto Novaes', '64', 'ap 222', 'Itararé', 'São Vicente', 'SP'),
(6, '11310-928', 'Rua João Ramalho', '950', NULL, 'Centro', 'São Vicente', 'SP'),
(7, '11330-430', 'Rua Vinte e Cinco', '517', NULL, 'Parque Bitaru', 'São Vicente', 'SP'),
(8, '11030-400', 'Avenida Almirante Saldanha da Gama', '369', NULL, 'Ponta da Praia', 'Santos', 'SP'),
(9, '11013-924', 'Praça Antônio Telles', '157', NULL, 'Centro', 'Santos', 'SP'),
(11, '11015-021', 'Rua Silva Jardim', '333', '', 'Vila Mathias', 'Santos', 'SP'),
(12, '13076-000', 'Avenida Francisco Manoel', '0', NULL, 'Jabaquara', 'Santos', 'SP'),
(13, '11380-140', 'Rua Costa Rego', '119', '', 'Vila São Jorge', 'São Vicente', 'SP'),
(15, '11370-001', 'Avenida Antônio Emmerick', '651', 'ap 10', 'Jardim Guassu', 'São Vicente', 'SP'),
(17, '11320-929', 'Rua Presidente Franklin Delano Roosevelt 27', '2', '', 'Itararé', 'São Vicente', 'SP'),
(19, '11065-320', 'Rua Coronel Cândido Gomes', '128', '', 'José Menino', 'Santos', 'SP'),
(20, '11087-430', 'Rua Antônio Godoy Moreira', '20', '', 'Castelo', 'Santos', 'SP'),
(21, '11310-020', 'Praça Coronel José Lopes', '387', '', 'Centro', 'São Vicente', 'SP'),
(22, '11320-260', 'Rua José Adorno', '735', 'ap 47', 'Itararé', 'São Vicente', 'SP'),
(23, '11310-250', 'Praça João Pessoa', '57', '', 'Centro', 'São Vicente', 'SP'),
(24, '11710-000', 'Rua Sérgio dos Reis Morais', '193', NULL, 'Cidade da Criança', 'Santos', 'SP'),
(25, '11340-000', 'Rua Frei Gaspar', '5', '', 'Parque São Vicente', 'São Vicente', 'SP'),
(26, '11045-904', 'Rua Oswaldo Cruz', '197', '', 'Boqueirão', 'Santos', 'SP'),
(27, '02179-000', 'Avenida Serafim Gonçalves Pereira', '71', NULL, 'Parque Novo Mundo', 'São Paulo', 'SP'),
(28, '75660-000', 'Rua Goiás', '717', NULL, 'Centro', 'Buriti Alegre', 'GO'),
(29, '11025-202', 'Rua Alexandre Martins', '80', '', 'Aparecida', 'Santos', 'SP'),
(30, '11015-021', 'Rua Silva Jardim', '333', '', 'Vila Mathias', 'Santos', 'SP'),
(31, '11704-800', 'Rua Primeiro de Janeiro', '954', '', '', 'Praia Grande', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_instituicao`
--

CREATE TABLE IF NOT EXISTS `tb_instituicao` (
  `cd_instituicao` int(11) NOT NULL,
  `nm_instituicao` varchar(70) DEFAULT NULL,
  `cd_cnpj` char(24) DEFAULT NULL,
  `dt_criacao` date DEFAULT NULL,
  `ds_instituicao` varchar(500) DEFAULT NULL,
  `im_instituicao` blob,
  `nm_email` varchar(60) DEFAULT NULL,
  `nm_senha` varchar(20) DEFAULT NULL,
  `ds_arrecadacao` varchar(100) DEFAULT NULL,
  `cd_endereco` int(11) DEFAULT NULL,
  `cd_tipo_instituicao` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_instituicao`),
  KEY `fk_instituicao_endereco` (`cd_endereco`),
  KEY `fk_instituicao_tipo_instituicao` (`cd_tipo_instituicao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_instituicao`
--

INSERT INTO `tb_instituicao` (`cd_instituicao`, `nm_instituicao`, `cd_cnpj`, `dt_criacao`, `ds_instituicao`, `im_instituicao`, `nm_email`, `nm_senha`, `ds_arrecadacao`, `cd_endereco`, `cd_tipo_instituicao`) VALUES
(1, 'ONG Viva Bicho Santos', '04.024.684/0001-12', '2000-01-01', 'A ONG percorre a cidade de Santos oferecendo atendimento a pets de moradores de rua, oferecendo castração para bichinhos e, em alguns casos, os colocam para adoção. Além disso, são divulgadas feiras de adoção e outros eventos.', NULL, 'contato@ongvivabicho.com.br', 'vivabicho', 'Ração', 11, 8),
(2, 'Codevida', '66.090.309/0001-28', '2012-02-10', 'Por ano, a Codevida realiza cerca de 5 mil castrações e quase 10 mil atendimentos clínicos. Para isso, além do Centro de Adoção Animal, no Jabaquara, a Coordenadoria conta com um Castramóvel, veículo especialmente adaptado como um centro cirúrgico, capaz de realizar de 20 a 40 castrações por dia. A Codevida é uma das únicas entidades públicas do País onde seus animais já são doados castrados, microchipados, vermifugados, medicados contra pulgas e carrapatos e com vacinas importadas.', NULL, 'codevida@gmail.com', 'codevida', '', 12, 8),
(3, 'Amigos da praia', '27.174.063/0001-10', '2017-01-12', 'Transmitir os valores da relação entre o indivíduo e seu ambiente, sua interação, responsabilidade e lazer didático e educativo. Aproximar as pessoas, empresas, escolas, poder público pela promoção em defesa do meio ambiente e educação ambiental estimulando voluntariado como ferramenta de produção e realização dos nossos projetos.', NULL, 'ecomov@gmail.com', 'ecomov', '', 13, 4),
(4, 'Animais Felizes', '15.646.105/6543-16', '2009-03-24', 'ONG que ajuda animais de rua', NULL, 'animaisfelizes@hotmail.com', 'animais1234', 'Ração', 19, 1),
(5, 'Mundo Feliz', '25.929.821/0001-38', '2004-05-24', 'ONG que realiza atividades voltadas ao meio ambiente.', NULL, 'ong@gmail.com', 'ong123', '', 21, 4),
(6, 'Family Friendly', '92.688.556/0001-30', '2003-07-19', 'Trabalhamos com o intuito de promover o bem-estar à famílias em situação precária ou de rua', NULL, 'familyff@gmail.com', 'fffamily461', 'Leite, brinquedos e roupas infantis', 24, 1),
(7, 'Vida por Vidas', '10.954.148/0001-19', '2005-07-08', 'A partir de uma iniciativa voluntária promovida pelos Jovens Adventistas, em 2005, nasceu o Projeto com a proposta de contribuir com os hemocentros através do incentivo à doação de sangue durante o período da Páscoa.', NULL, 'vidaporvidas@gmail.com', 'vidaporvidas123', '', 25, 1),
(8, 'Núcleo Nacional de Assistência Integral', '52.910.630/0001-68', '2002-08-24', 'Promove a restauração da saúde integral de crianças e adolescentes vítimas de violência doméstica e abuso sexual e de suas famílias, para que os mesmos possam viver harmonicamente em seus lares de origem. Para isso, oferece atendimento multiprofissional: educacional, pastoral, psicológico e social, com base no Estatuto da Criança e do Adolescente (ECA).', NULL, 'larnefesh@larnefesh.org.br', 'nucleolarnefesh32', 'Alimentos perecíveis e não-perecíveis, produtos de higiene e material de limpeza.', 27, 4),
(9, 'Santa Casa de Misericórdia de Buriti Alegre', '23.483.730/0001-83', '1920-04-05', 'Sem dúvida nenhuma a Santa Casa hoje está em um patamar muito elevado, fruto do trabalho de muitas pessoas que se dedicam a este hospital. Nossa principal conquista foi à transformação da Santa Casa, tudo isso graças ao reconhecimento de todo trabalho realizado aqui', NULL, 'santacasaba@hotmail.com', 'santacasa82379', 'Roupas', 28, 3),
(10, 'ONG Defesa e Cidadania da Mulher', '84.353.990/0001-34', '2005-05-25', 'Somos uma organização não governamental, sem fins lucrativos para Assistência Social  fundada em 25/05/2005 e nomeada Utilidade Pública. Visto que, na época, não existia lei concreta para defender à mulher (a Lei Maria da Penha ainda não estava em vigor), a entidade promoveu nos três primeiros anos palestras para mães, orientadores e adolescentes, em todas as Escolas Municipais da cidade de Praia Grande.', NULL, 'ongdcm@hotmail.com', 'mulheresjuntas32', '', 31, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_instituicao`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_instituicao` (
  `cd_tipo_instituicao` int(11) NOT NULL,
  `nm_tipo_instituicao` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`cd_tipo_instituicao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_tipo_instituicao`
--

INSERT INTO `tb_tipo_instituicao` (`cd_tipo_instituicao`, `nm_tipo_instituicao`) VALUES
(1, 'Assistência social'),
(2, 'Cultura'),
(3, 'Saúde'),
(4, 'Meio ambiente'),
(5, 'Desenvolvimento e defesa de direitos'),
(6, 'Habitação'),
(7, 'Educação e pesquisa'),
(8, 'Animais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_trabalho`
--

CREATE TABLE IF NOT EXISTS `tb_trabalho` (
  `cd_trabalho` int(11) NOT NULL,
  `dt_trabalho` date DEFAULT NULL,
  `hr_inicio` time DEFAULT NULL,
  `hr_fim` time DEFAULT NULL,
  `ds_trabalho` varchar(150) DEFAULT NULL,
  `ds_vaga` varchar(200) DEFAULT NULL,
  `qt_vaga` int(11) DEFAULT NULL,
  `cd_instituicao` int(11) DEFAULT NULL,
  `cd_endereco` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_trabalho`),
  KEY `fk_trabalho_instituicao` (`cd_instituicao`),
  KEY `fk_trabalho_endereco` (`cd_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_trabalho`
--

INSERT INTO `tb_trabalho` (`cd_trabalho`, `dt_trabalho`, `hr_inicio`, `hr_fim`, `ds_trabalho`, `ds_vaga`, `qt_vaga`, `cd_instituicao`, `cd_endereco`) VALUES
(1, '2019-10-22', '12:00:00', '14:00:00', 'Limpeza de praia realizada na Praia do Gonzaguinha', 'Recolher resíduos encontrados na orla.', 2, 3, 13),
(2, '2019-11-11', '14:00:00', '17:00:00', 'Arrecadação de ração', 'Voluntários irão arrecadar ração nas ruas para doar à animais', 2, 1, 11),
(3, '2019-10-23', '12:00:00', '14:00:00', 'Arrecadação de ração', 'Voluntários irão arrecadar ração nas ruas para doar à animai', 2, 4, 19),
(4, '2019-10-31', '14:00:00', '16:00:00', 'Limpeza de praia', 'Limpeza de praia que será realizada na Praia do Gonzaguinha', 1, 5, 23),
(5, '2019-05-14', '12:00:00', '16:00:00', 'Arrecadação de leite para crianças desabrigadas', 'Voluntários terão que realizar a arrecadação de leite para posterior distribuição', 3, 5, 24),
(6, '2020-04-12', '09:00:00', '12:00:00', 'Arrecadação de brinquedos', 'No dia de nossa ação anual de páscoa para doação de sangue, iremos arrecadar brinquedos para posterior doação à crianças internadas.', 5, 7, 26),
(7, '2019-08-24', '12:00:00', '16:00:00', 'Entregar comida para mendigos', 'Voluntários irão cozinhar e entregar comida para moradores de rua.', 3, 5, 21),
(8, '2019-11-10', '13:30:00', '17:30:00', 'Arrecadação de produtos de higiene pessoal', 'Os voluntários vão arrecadar objetos como pasta de dentes, sabonete, escova de dentes, shampoo, condicionador, entre outros.', 10, 6, 24),
(9, '2019-07-08', '09:00:00', '13:00:00', 'Passeio com cachorros de abrigos de animais', 'Os voluntários vão ter a oportunidade de passear e brincar com cachorros que aguardam adoção em abrigos', 5, 4, 19),
(10, '2019-11-20', '11:00:00', '20:00:00', 'Arrecadação de roupas', 'Doação de roupas que serão destinadas para famílias carentes', 4, 9, 28),
(11, '2019-09-19', '14:00:00', '18:30:00', 'Dia de brincadeiras com crianças carentes', 'Os voluntários terão que organizar brincadeiras e atividades educativas para crianças carentes', 7, 8, 27),
(12, '2019-11-23', '15:30:00', '17:00:00', 'Arrecadação de brinquedos, roupas e sapatos para crianças e adolescentes de família carente', 'Recolher roupas, brinquedos e sapatos que serão entregues para crianças e adolescentes carentes', 2, 8, 27),
(13, '2019-12-10', '10:00:00', '12:00:00', 'Entrega de sacolas plásticas', 'Entregaremos sacolas plásticas aos moradores da cidade de Santos.', 8, 5, 29),
(14, '2019-12-12', '08:00:00', '12:00:00', 'ONG Viva Bicho Santos', 'Os voluntários vão ter a oportunidade de passear e brincar com cachorros que aguardam adoção em nossa ONG', 10, 1, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_vaga`
--

CREATE TABLE IF NOT EXISTS `tb_vaga` (
  `cd_vaga` int(11) NOT NULL,
  `cd_trabalho` int(11) DEFAULT NULL,
  `cd_voluntario` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_vaga`),
  KEY `fk_vaga_trabalho` (`cd_trabalho`),
  KEY `fk_vaga_voluntario` (`cd_voluntario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_vaga`
--

INSERT INTO `tb_vaga` (`cd_vaga`, `cd_trabalho`, `cd_voluntario`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 8, 10),
(4, 7, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_voluntario`
--

CREATE TABLE IF NOT EXISTS `tb_voluntario` (
  `cd_voluntario` int(11) NOT NULL,
  `nm_voluntario` varchar(70) DEFAULT NULL,
  `cd_cpf` char(11) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `im_voluntario` blob,
  `nm_email` varchar(60) DEFAULT NULL,
  `nm_senha` varchar(20) DEFAULT NULL,
  `cd_endereco` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_voluntario`),
  KEY `fk_voluntario_endereco` (`cd_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_voluntario`
--

INSERT INTO `tb_voluntario` (`cd_voluntario`, `nm_voluntario`, `cd_cpf`, `dt_nascimento`, `im_voluntario`, `nm_email`, `nm_senha`, `cd_endereco`) VALUES
(1, 'Maria Fernanda Ribeiro de Araujo', '51900532883', '2001-10-22', NULL, 'maria@gmail.com', 'maria', 1),
(2, 'Rafael de Sousa Santos', '50393064829', '2001-05-29', NULL, 'rafael.santos966@etec.sp.gov.br', 'rafael', 2),
(3, 'Mikael Marques dos Santos', '47747208871', '1998-07-14', NULL, 'mikael.marques2010@hotmail.com', 'mikael', 3),
(4, 'Yasmin Gomes dos Santos', '51050066820', '2001-12-05', NULL, 'yasmin.santos112@etec.sp.gov.br', 'yasmin', 4),
(5, 'Bárbara de Oliveira Martins', '45992389881', '2002-07-08', NULL, 'barbara.martins29@etec.sp.gov.br', 'barbara', 5),
(6, 'Caio Hugo Sales', '73225455830', '1975-05-11', NULL, 'caiohugo@gmail.com', 'caio123', 6),
(7, 'Jorge Enrico Mendes', '96486098880', '1950-05-04', NULL, 'jorgeenricomendes@gmail.com', 'jorginho123', 7),
(8, 'Leonardo Severino Julio Farias', '29479733803', '2000-07-20', NULL, 'leonardoseverino@gmail.com', 'leosk8', 8),
(9, 'Emilly Malu Gonçalves', '70685525872', '2001-08-19', NULL, 'emillyzinhask8@gmail.com', 'lindinhafight62', 9),
(10, 'Rakael Marques de Sousa', '08272234807', '2001-08-17', NULL, 'voluntario@gmail.com', 'voluntario', 22);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_contato_instituicao`
--
ALTER TABLE `tb_contato_instituicao`
  ADD CONSTRAINT `pk_contato_instituicao_instituicao` FOREIGN KEY (`cd_instituicao`) REFERENCES `tb_instituicao` (`cd_instituicao`);

--
-- Limitadores para a tabela `tb_instituicao`
--
ALTER TABLE `tb_instituicao`
  ADD CONSTRAINT `fk_instituicao_endereco` FOREIGN KEY (`cd_endereco`) REFERENCES `tb_endereco` (`cd_endereco`),
  ADD CONSTRAINT `fk_instituicao_tipo_instituicao` FOREIGN KEY (`cd_tipo_instituicao`) REFERENCES `tb_tipo_instituicao` (`cd_tipo_instituicao`);

--
-- Limitadores para a tabela `tb_trabalho`
--
ALTER TABLE `tb_trabalho`
  ADD CONSTRAINT `fk_trabalho_endereco` FOREIGN KEY (`cd_endereco`) REFERENCES `tb_endereco` (`cd_endereco`),
  ADD CONSTRAINT `fk_trabalho_instituicao` FOREIGN KEY (`cd_instituicao`) REFERENCES `tb_instituicao` (`cd_instituicao`);

--
-- Limitadores para a tabela `tb_vaga`
--
ALTER TABLE `tb_vaga`
  ADD CONSTRAINT `fk_vaga_trabalho` FOREIGN KEY (`cd_trabalho`) REFERENCES `tb_trabalho` (`cd_trabalho`),
  ADD CONSTRAINT `fk_vaga_voluntario` FOREIGN KEY (`cd_voluntario`) REFERENCES `tb_voluntario` (`cd_voluntario`);

--
-- Limitadores para a tabela `tb_voluntario`
--
ALTER TABLE `tb_voluntario`
  ADD CONSTRAINT `fk_voluntario_endereco` FOREIGN KEY (`cd_endereco`) REFERENCES `tb_endereco` (`cd_endereco`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
