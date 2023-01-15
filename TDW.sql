-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 13 jan. 2023 à 18:18
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `elbenna`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `id_ingred` int(11) NOT NULL,
  `id_saison` int(11) NOT NULL,
  PRIMARY KEY (`id_ingred`,`id_saison`),
  KEY `id_saison` (`id_saison`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `appartenir`
--

INSERT INTO `appartenir` (`id_ingred`, `id_saison`) VALUES
(1, 5),
(5, 5),
(6, 3),
(16, 1),
(17, 3),
(18, 1),
(19, 4),
(20, 2);

-- --------------------------------------------------------

--
-- Structure de la table `cadre`
--

DROP TABLE IF EXISTS `cadre`;
CREATE TABLE IF NOT EXISTS `cadre` (
  `id_cadre` int(11) NOT NULL AUTO_INCREMENT,
  `id_categ` int(11) DEFAULT NULL,
  `id_recette` int(11) DEFAULT NULL,
  `id_news` int(11) DEFAULT NULL,
  `titre_cadre` varchar(500) DEFAULT NULL,
  `img_cadre` varchar(200) DEFAULT NULL,
  `video_cadre` varchar(50) DEFAULT NULL,
  `desc_cadre` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id_cadre`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cadre`
--

INSERT INTO `cadre` (`id_cadre`, `id_categ`, `id_recette`, `id_news`, `titre_cadre`, `img_cadre`, `video_cadre`, `desc_cadre`) VALUES
(1, 1, 1, NULL, 'Hrira Oranaise', 'http://drive.google.com/uc?export=view&id=1LWc0kWeirPvdKTDLNf4AoIXCjc0kMYJN', NULL, 'Cette hrira oranaise est la soupe la plus préparée dans la région d’Oran. Elle est lisse, légère, très savoureuse et bien parfumée d’odeurs de carvi et à la coriandre fraîche. Si vous aimez les soupes odorantes et vitaminées, alors restez avec moi car sa préparation est très facile.'),
(2, 1, 2, NULL, 'Bourek', 'http://drive.google.com/uc?export=view&id=1M1tM9P7iKkV8sstT6SBIgTPC2LuPXunJ\n', NULL, 'Le Bourek est la fameuse entrée algérienne qui ne quitte jamais les tables de l\'Iftar en Ramadhan.'),
(3, 1, 3, NULL, 'Bricks', 'http://drive.google.com/uc?export=view&id=1MjV5DqRDMMld9iVDhSUxEAJOslaQsn6L', NULL, 'C\'est une sorte de chausson originaire du Maghreb, préparé à partir d\'une feuille de pâte très fine portant le même nom, à base de farine et de semoule de blé, façonnée généralement en un triangle fourré et frit.'),
(4, 1, 4, NULL, 'Chorba Frik', 'http://drive.google.com/uc?export=view&id=1Eh2HBj4Nk3vOKy5nujl15ualE9A2D64j', NULL, 'La chorba frik, également appelée djari hmar, de son nom original dchicha ou tchicha, est une soupe à base de blé vert concassé et de viande, de la cuisine algérienne. Elle est consommée notamment durant le mois du ramadan.'),
(11, 2, 11, NULL, 'Berkoukes', 'http://drive.google.com/uc?export=view&id=1RyStSTFo8aKI_jwjriy5AmvXCFDGHtW6', NULL, 'C\'est un plat traditionnel du Maghreb, préparé à base de pâtes en forme de gros grains de couscous, de légumes de saison et de viande.'),
(12, 2, 12, 4, 'Chakhchoukha', 'http://drive.google.com/uc?export=view&id=1AVceRHbuH44Ly_1H25uHzkQmwCUjLfnA', NULL, 'La chakhchoukha est un mets de fête se composant de pâte de semoule émiettée, cuite à la poêle, arrosée de sauce tomate rouge à la viande, épicée, de pois chiches et, dans quelques régions, de courgettes, de carottes et de navets, de fèves ou encore de pommes de terre. '),
(13, 2, 13, NULL, 'Couscous', 'http://drive.google.com/uc?export=view&id=1uKZNfc4Ee9itoTnfxzxY873r_T5zj65U', NULL, 'Le couscous est d\'une part une semoule de blé dur préparée à l\'huile d\'olive et d\'autre part, une spécialité culinaire issue de la cuisine berbère, à base de couscous, de légumes, d\'épices, d\'huile d\'olive et de viande ou de poisson.'),
(21, 3, 21, NULL, 'Baklawa', 'http://drive.google.com/uc?export=view&id=11-yIWI3tTffTBfCCPCmmECcA1ueaXd6K', NULL, 'Le baklava, baclava, baclawa ou baklawa pour la variante maghrébine, est un dessert traditionnel commun aux peuples des anciens empires ottoman et perse. On le retrouve dans les Balkans, dans le Caucase, au Maghreb et au Moyen-Orient.'),
(22, 3, 22, NULL, 'Chamia', 'http://drive.google.com/uc?export=view&id=1RNGXC-KnWU0cRXFxtWBFOZIN_10hZIc5', NULL, 'La chamia est une pâtisserie classique de la cuisine algérienne, servie au ramadan et à base de semoule, de sirop et d\'amandes. Appelé aussi kalb el louz, il fait le bonheur des jeûneurs comme de leur entourage. En effet, c\'est une pâtisserie farcie aux amandes et au sirop qui se partage.'),
(23, 3, 23, NULL, 'Cheesecake', 'http://drive.google.com/uc?export=view&id=1tJFEM751tXDi_8rrCNWIeSXQ4kWUFgTp', NULL, 'Le cheesecake, appelé tarte au fromage en Alsace-Moselle, est une spécialité à base de fromage, le plus souvent du fromage frais ou caillé ou fromage blanc. Il est généralement sucré, mais peut être aussi salé.'),
(31, 4, 31, NULL, 'Chocolat Chaud', 'http://drive.google.com/uc?export=view&id=1UGEGw2m_jQj0Fg1WdsS9jsgXHx4eTBjP', NULL, 'Le chocolat chaud est une boisson chaude à base d\'eau ou de lait constituée de chocolat, ou de cacao en poudre, et de sucre. Lorsqu\'il est uniquement à base de lait, il s\'agit de la version chaude du lait au chocolat.'),
(32, 4, 32, NULL, 'Citronnade', 'http://drive.google.com/uc?export=view&id=1YT7HAarQHNv5BaQlsuevvo1GMHikPM05', NULL, 'La citronnade menthe est une boisson fraîche et désaltérante composée d\'eau, citrons jaunes et vert, feuilles de menthe et sirop de canne ou miel. Elle est servie traditionnellement à l\'Afrique du Nord (Maroc, Algérie, Tunisie), au Proche-Orient (Jordanie, Palestine, Liban, Syrie) et en Turquie'),
(33, 4, 33, NULL, 'Iced Coffee', 'http://drive.google.com/uc?export=view&id=1wyC0tL0-SifgBfAOceBb-XtYbmi9Dpey', NULL, 'Le café glacé est une recette répandue de boisson au café d\'origine Algérienne, à base de café froid ou chaud servi glacé, variante des café frappé, affogato, café liégeois, Ice cappuccino, ou thé glacé'),
(5, 1, 5, NULL, 'Maakouda', 'http://drive.google.com/uc?export=view&id=1h5i6SwVV04KhJDO8XUVGtbhTeBwtSRDh', NULL, 'La maaqouda, maqouda ou maakouda est un mets préparé et consommé en Algérie, au Maroc et en Tunisie, essentiellement pendant le mois de ramadan. Il s\'agit d\'une sorte de beignet de pommes de terre qui peut aussi se décliner avec du thon, de la viande hachée ou du fromage. '),
(6, 1, 6, NULL, 'Hmiss', 'http://drive.google.com/uc?export=view&id=1GPCGvmDVFbFH7MHFw0w7A9IRYcWaNWkN', NULL, 'est une salade algérienne à base de poivrons et de tomates grillés, hachés, mélangés et assaisonnés d\'huile d\'olive.'),
(7, 1, 7, NULL, 'Chaussons', 'http://drive.google.com/uc?export=view&id=1Q7Ov3WVMpypV6yFozqh45h4ohvFn2iyB', NULL, 'Le chausson est un mets constitué d\'une pâte (souvent pâte feuilletée) enrobant une garniture de viande, de légumes ou pâtissière.'),
(8, 1, 8, NULL, 'Batbouts', 'http://drive.google.com/uc?export=view&id=1nTFldTIMui_qFG34bZAL5JC_0cu-TyjA', NULL, 'Les batbouts, ce sont des petits pains sans matières grasses cuits à la poêle.\r\nIls sont très faciles à faire et délicieux.\r\nOn en consomme beaucoup pendant la période de Ramadan : en tartines, en accompagnement d’un tajine, farcis…'),
(9, 1, 9, NULL, 'Croquettes de poulet', 'http://drive.google.com/uc?export=view&id=1lvHSk75DyM4gBKpQO7JKQ6p7giOL6Zfk', NULL, 'C\'est une entrée cuisinée composée d\'une pâte de chair et de peau de poulet finement hachées, qui est ensuite roulée dans une pâte à beignets ou une panure avant cuisson.'),
(10, 1, 10, NULL, 'Chermoula', 'http://drive.google.com/uc?export=view&id=1GXdGciSDMxGzX_HUJRRmaE5NIsJMFqYd', NULL, 'Les carottes à la chermoula, salade fraîche et épicées aux saveur d\'Afrique du Nord pour un voyage culinaire végétarien et bien gourmand.\r\nCette salade de carottes à la chermoula est délicieuse en entrée ou en accompagnement d’un poisson ou d’une viande grillé. \r\n'),
(14, 2, 14, NULL, 'Lham Hlou', 'http://drive.google.com/uc?export=view&id=1B7mWQfjIk3DjXd6cY2A_96tCTfxPSAws', NULL, 'Le lham hlou, lham lahlou, ou tadjine lahlou, qui veut dire « viande sucrée » ou « tadjne doux », est un plat sucré originaire d\'Algérie, fait à base de viande et de pruneaux principalement, avec éventuellement des abricots et décoré de raisins secs et d\'amandes dans un sirop de sucre et d\'eau de fleur d\'oranger.'),
(15, 2, 15, NULL, 'M\'hajeb', 'http://drive.google.com/uc?export=view&id=1zvJngPU1sKwgHtcsYu4DCoAjX1I1pNQA', NULL, 'est une recette traditionnelle de la cuisine algérienne, très populaire dans tous les wilaya d\'Algérie, y compris dans celle du sud comme Ouargla et Ghardaia, Tamanrasset. Elle constitue un des mets indispensables proposés dans les fast food algériens.'),
(16, 2, 16, NULL, 'Mthewem', 'http://drive.google.com/uc?export=view&id=1iDz7dhRL2rsM8atQszUFnxpW_RcELvGh', NULL, 'Le mtewem ou tajine mtewem est un plat algérien, et plus précisément algérois, fait à base de boulettes de viande hachée, de morceaux de poulet ou de viande d\'agneau et d\'amandes.'),
(17, 2, 17, NULL, 'Roulé de poulet', 'http://drive.google.com/uc?export=view&id=1eB8Y75eJ1Y1Ln43lFUy5I3nbEnI9tHnK', NULL, 'A base de blancs de poulet ou de dinde, ce roulé est excellent comme plat familial à partager. Vous pouvez le garnir de champignons et mozzarella comme dans la vidéo ci-dessous, ou choisir d’autres ingrédients. Pour les fêtes, un peu de truffe pourrait être parfait, mais imaginez des versions plus exotiques avec du curry, des épices, ou pourquoi pas même des petits cubes d’ananas dans la farce ! '),
(18, 2, 18, NULL, 'Rechta', 'http://drive.google.com/uc?export=view&id=1Rsi8FCvEPcPGi1ZX7YP_th81GNWVQlK7', NULL, 'La rechta est un plat Algérien, typique de l\'est du Maghreb. Elle est en particulier le plat symbolique de la cuisine algéroise.'),
(19, 2, 19, NULL, 'Seffa', 'http://drive.google.com/uc?export=view&id=1FkJoRRV5n05YeOhKnwghdDMJ05QISFbz', NULL, 'La seffa, plat marocain et algérien à base de semoule, est un couscous sucré à la cannelle et aux amandes. Au Maroc, il peut aussi être fait avec du riz ou des vermicelles. Ce plat se mange généralement en fin de repas avant le dessert.'),
(20, 2, 20, NULL, 'Tajine d\'olives', 'http://drive.google.com/uc?export=view&id=1XBfhQ8mrZJtvoRf0rh9ddtNx3JVjpvzh', NULL, 'Le tajine de poulet aux olives est un plat traditionnel d\'Algérie et du Maroc, dans lequel mijotent des morceaux de poulet et des olives dans une sauce assaisonnée aux épices, aux oignons et au citron confit'),
(24, 3, 24, NULL, 'Makrout', 'http://drive.google.com/uc?export=view&id=1nFzOBJ9KgIDDuW7QWwTqaxYOQLEvpqzr', NULL, 'C\'est une pâtisserie maghrébine, à base de semoule de blé et de pâte de dattes, reconnaissable à sa forme en losange. C\'est une pâtisserie très populaire au Maghreb'),
(25, 3, 25, NULL, 'Mhalbi', 'http://drive.google.com/uc?export=view&id=1n_qBxqURVa-GeXlmQJuRKx6sCFw-jWN-', NULL, 'C\'est un flan au lait parfumé à la fleur d\'oranger. Il est généralement servi avec du sirop de sucre et des morceaux de pistaches. Certaines recettes incorporent de l\'eau de rose, de l\'amande amère ou du miel.\r\n\r\nGénéralement associé à la cuisine libanaise, son origine remonterait aux Sassanides. Il se retrouve donc dans de nombreuses cuisines du Moyen-Orient (Turquie par exemple).'),
(26, 3, 26, NULL, 'Zlabia', 'http://drive.google.com/uc?export=view&id=1fbLokzLIlPpyh0-1Gzpp4oHMrkNncAtM', NULL, 'La zlabia, ou zelabia, parfois sous la forme jalebi, est une confiserie de la cuisine orientale traditionnelle. Intermédiaire entre un gâteau et une confiserie, elle est préparée au Maghreb principalement, principalement lors du mois de ramadan.'),
(27, 3, 27, NULL, 'Samsa', 'http://drive.google.com/uc?export=view&id=14Fn1_cQ26f3Q6yK0-gQ1PwptEFQGpZib', NULL, 'La samsa est une pâtisserie de forme triangulaire aux amandes et au miel, préparée surtout pour l\'Aïd el-Fitr. Elle est consommée aussi bien en Algérie qu\'en Tunisie. La ville d\'Alger est connue pour ses pâtisseries, notamment la samsa.'),
(28, 3, 28, NULL, 'San Sebastian', 'http://drive.google.com/uc?export=view&id=1ptk2Ix-cjQNpGaBxriJyaEa2ZeuMBIz8', NULL, 'Une délicieuse recette du fameux cheesecake San Sebastian, une variante du classique américain sans fond tout droit venue du Pays basque.'),
(29, 3, 29, NULL, 'Tiramisu', 'http://drive.google.com/uc?export=view&id=119MzrlnoY-e-Xh7NxQfS7vkULIcNihmd', NULL, 'Dessert à base de lait d’origine italienne mondialement connu, composé de café, mascarpone, sucre, œufs, boudoirs et de marsala, d’amaretto ou de kalhua, mais avec de nombreuses variantes possibles.'),
(30, 3, 30, NULL, 'Verrine', 'http://drive.google.com/uc?export=view&id=1p1IC9MbhhNATRi2yitB6vZ_zH4dvo4W0', NULL, ' Utilisé en pâtisserie, pour la première fois au milieu des années 1990, la verrine s\'est rapidement imposée pour toute une gamme de mets, allant des amuse-gueule aux apéritifs dînatoires, du sucré au salé, des préparations les plus simples aux plus inventives, le tout dans un mélange original de saveurs et de couleurs.'),
(34, 4, 34, NULL, 'Jus d\'orange', 'http://drive.google.com/uc?export=view&id=1HZoQ6iG8xWhMGCe8hQgS7S7Ai-zEozTy', NULL, 'Le jus d\'orange est une boisson préparée à partir d\'oranges pressées.'),
(35, 4, 35, NULL, 'Mocaccino ', 'http://drive.google.com/uc?export=view&id=12WOxb49gZsFOndDArnKn8vaApnBuPyRc', NULL, 'Un caffè moka, également appelé mocaccino, est une boisson chaude à saveur de chocolat qui est une variante d\'un caffè latte, généralement servie dans un verre plutôt que dans une tasse. Les autres orthographes couramment utilisées sont mochaccino et aussi mochachino.'),
(36, 4, 36, NULL, 'Café arabe', 'http://drive.google.com/uc?export=view&id=1BZwFEktygVlYtY1sm7ojsv7ay8mZjarJ', NULL, 'Ça désigne la boisson décoctée aux graines d\'arabica fortement présente dans les arts de la table des cultures du Moyen-Orient et notamment en Arabie.'),
(37, 4, 37, NULL, 'Mojito', 'http://drive.google.com/uc?export=view&id=1evm1Eg8te5PNKxA3FQI4b7q4GLZLPFXp', NULL, 'Cocktail à base d\'eau gazeuse, de citron vert, de sucre et de feuilles de menthe.\r\n'),
(38, 4, 38, NULL, 'Smoothie aux fruits', 'http://drive.google.com/uc?export=view&id=1G3a1ibd8Y6LrxLZtx0uiRw6Zt5m9MuGg', NULL, 'Un smoothie est une recette traditionnelle de boisson crémeuse mixée, de la cuisine des États-Unis, à base de jus de fruits entiers, ou de légumes frais, parfois mélangés à des jus de fruits, produits laitiers, céréales, glace pilée, ou compléments alimentaires'),
(39, 4, 39, NULL, 'Jus de pastèque', 'http://drive.google.com/uc?export=view&id=1YINcIW3I4BI9TMJvVcJST06fzIVhSdN0', NULL, 'Un remède hydratant, diurétique et qui permet de lutter contre la fatigue. A utiliser aussi dans la prévention de crampes musculaires chez le sportif.'),
(40, 4, 40, NULL, 'Jus de fraise', 'http://drive.google.com/uc?export=view&id=1CV5I3ww1HGMQ2Ay4N8hz1YTcqLiH9FCI', NULL, 'Le jus de fraise est une boisson préparée à partir de fraises. Sa couleur et sa saveur le rendent particulièrement bien adapté pour les cocktails; que ce soit sous forme de jus ou de coulis.'),
(41, NULL, NULL, 1, 'Livre de Cyril Lignac', 'http://drive.google.com/uc?export=view&id=18JlNVpe8k0KI-r0vgN6ujZk06h21JCJu', NULL, 'Cyril Lignac cartonne depuis le confinement dans l\'émission «Tous en cuisine» sur M6 et la diffusion a même été prolongée jusqu\'à fin mai pour faire durer le plaisir. Le chef dévoile à l\'avance la liste de ses ingrédients et les téléspectateurs peuvent concocter de bons petits plats et desserts en même temps que lui, c\'est un concept qui plaît ! L\'aventure continuera également en librairie, puisqu\'il sort un livre de cuisine intitulé «Faits maison n°1». Il regroupe des recettes du quotidien et de saison faciles à reproduire chez soi.'),
(42, NULL, NULL, 2, 'Etre chef d\'un soir?', 'http://drive.google.com/uc?export=view&id=1_awY8pzyLIMCr30denW_PsoTp3_eiwHB', NULL, 'Le restaurant de la Samaritaine, situé au cœur de la capitale, propose aux passionnés de gastronomie, amateurs ou experts, de louer sa cuisine professionnelle et ultra-moderne pour un soir, en profitant de l\'aide d\'un commis de cuisine et d\'un plongeur.'),
(43, NULL, NULL, 3, 'Les cours de pâtisserie', 'http://drive.google.com/uc?export=view&id=1qeSytALWJufTW0FfKM3-y53zdwEFHuYn', NULL, 'Les lives du chef Philippe Conticini reviennent en cette rentrée 2022. Rendez-vous chaque mercredi à 12h sur les réseaux sociaux du chef pâtissier pour découvrir de nouveaux secrets gourmands pour préparer des desserts et gâteaux de folie. '),
(44, NULL, NULL, NULL, 'Bourek', 'http://drive.google.com/uc?export=view&id=1M1tM9P7iKkV8sstT6SBIgTPC2LuPXunJ', NULL, 'Le Bourek est la fameuse entrée algérienne qui ne quitte jamais les tables de l\'Iftar en Ramadhan.'),
(45, NULL, NULL, NULL, 'Bourek', 'http://drive.google.com/uc?export=view&id=1M1tM9P7iKkV8sstT6SBIgTPC2LuPXunJ', NULL, 'Le Bourek est la fameuse entrée algérienne qui ne quitte jamais les tables de l\'Iftar en Ramadhan.'),
(46, NULL, NULL, NULL, 'Bourek', 'http://drive.google.com/uc?export=view&id=1M1tM9P7iKkV8sstT6SBIgTPC2LuPXunJ', NULL, 'Le Bourek est la fameuse entrée algérienne qui ne quitte jamais les tables de l\'Iftar en Ramadhan.'),
(47, NULL, NULL, NULL, 'Bourek', 'http://drive.google.com/uc?export=view&id=1M1tM9P7iKkV8sstT6SBIgTPC2LuPXunJ', NULL, 'Le Bourek est la fameuse entrée algérienne qui ne quitte jamais les tables de l\'Iftar en Ramadhan.'),
(48, NULL, NULL, NULL, 'Bourek', 'http://drive.google.com/uc?export=view&id=1M1tM9P7iKkV8sstT6SBIgTPC2LuPXunJ', NULL, 'Le Bourek est la fameuse entrée algérienne qui ne quitte jamais les tables de l\'Iftar en Ramadhan.'),
(52, NULL, NULL, 5, 'Bourek', 'http://drive.google.com/uc?export=view&id=1M1tM9P7iKkV8sstT6SBIgTPC2LuPXunJ', NULL, 'Le Bourek est la fameuse entrée algérienne qui ne quitte jamais les tables de l\'Iftar en Ramadhan.');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categ` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categ` varchar(50) DEFAULT NULL,
  `nb_cadres` int(11) DEFAULT NULL,
  `nb_cadres_vis` int(11) DEFAULT NULL,
  `lien_categ` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_categ`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categ`, `nom_categ`, `nb_cadres`, `nb_cadres_vis`, `lien_categ`) VALUES
(1, 'Entrées', 10, 4, NULL),
(2, 'Plats', 10, 4, NULL),
(3, 'Desserts', 10, 4, NULL),
(4, 'Boissons', 10, 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

DROP TABLE IF EXISTS `concerner`;
CREATE TABLE IF NOT EXISTS `concerner` (
  `id_categ` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL,
  `id_fete` int(11) NOT NULL,
  PRIMARY KEY (`id_categ`,`id_recette`,`id_fete`),
  KEY `id_fete` (`id_fete`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `concerner`
--

INSERT INTO `concerner` (`id_categ`, `id_recette`, `id_fete`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 10, 1),
(2, 11, 8),
(2, 12, 6),
(2, 13, 7),
(2, 17, 1),
(2, 18, 5),
(2, 18, 6),
(2, 19, 1),
(2, 19, 2),
(3, 21, 7),
(3, 24, 7),
(3, 27, 7);

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

DROP TABLE IF EXISTS `etape`;
CREATE TABLE IF NOT EXISTS `etape` (
  `id_etape` int(11) NOT NULL AUTO_INCREMENT,
  `ordre_etape` int(11) DEFAULT NULL,
  `instruction` text,
  `id_categ` int(11) NOT NULL,
  PRIMARY KEY (`id_etape`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`id_etape`, `ordre_etape`, `instruction`, `id_categ`) VALUES
(1, 1, 'Mettre la levure, semoule, farine et eau.', 0),
(2, 2, 'Bien mélanger, couvrir avec un torchon, et laisser reposer', 0),
(3, 3, 'Dans une cocote faire revenir avec l\'huile, la viande et l’oignon', 0),
(4, 4, 'Ajouter le reste des ingrédients et les épices', 0),
(5, 5, 'Couvrir d’eau, fermer la cocote et laisser cuire', 0),
(6, 6, 'Une fois votre soupe cuite, retirez la viande', 0),
(7, 7, 'Mixez le reste à l’aide d’un mixeur plongeant', 0),
(8, 8, 'Prendre votre levain et bien le fouetter pour l’aérer', 0),
(9, 9, 'Ajouter petit à petit le levain à votre soupe tout en mélangeant', 0),
(10, 10, 'Il ne faut pas cesser de remuer car cette étape est très importante.\r\nVous n\'êtes pas obligé de tout mettre, arrêtez dès que votre hrira a la bonne consistance', 0),
(11, 11, 'Avant de servir, vous pouvez ajouter de la coriandre ciselée', 0);

-- --------------------------------------------------------

--
-- Structure de la table `fete`
--

DROP TABLE IF EXISTS `fete`;
CREATE TABLE IF NOT EXISTS `fete` (
  `id_fete` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fete` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_fete`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fete`
--

INSERT INTO `fete` (`id_fete`, `nom_fete`) VALUES
(1, 'Mariage'),
(2, 'Fiançailles'),
(3, 'Anniversaire'),
(4, 'Achoura'),
(5, 'Mouloud'),
(6, 'Yennayer'),
(7, 'Aid'),
(8, 'Circoncision');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id_img` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `lien_img` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_img`, `type`, `lien_img`) VALUES
('', 'logo', 'https://drive.google.com/file/d/1-PfhQwkbMPbHtwQz8s37UL_Jwc1zOMww/view?usp=share_link');

-- --------------------------------------------------------

--
-- Structure de la table `infos_nutritionnelles`
--

DROP TABLE IF EXISTS `infos_nutritionnelles`;
CREATE TABLE IF NOT EXISTS `infos_nutritionnelles` (
  `id_infos` int(11) NOT NULL AUTO_INCREMENT,
  `energie` float(10,0) DEFAULT '0',
  `proteines` decimal(15,2) DEFAULT '0.00',
  `glucides` decimal(15,2) DEFAULT '0.00',
  `lipides` decimal(15,2) DEFAULT '0.00',
  `sodium` decimal(15,2) DEFAULT '0.00',
  `eau` decimal(15,2) DEFAULT '0.00',
  `fibres` decimal(15,2) DEFAULT '0.00',
  `minereaux` decimal(15,2) DEFAULT '0.00',
  `vitamines` decimal(15,2) DEFAULT '0.00',
  PRIMARY KEY (`id_infos`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `infos_nutritionnelles`
--

INSERT INTO `infos_nutritionnelles` (`id_infos`, `energie`, `proteines`, `glucides`, `lipides`, `sodium`, `eau`, `fibres`, `minereaux`, `vitamines`) VALUES
(1, 16, '0.80', '1.72', '0.26', '0.00', '94.50', '1.41', '0.31', '0.97'),
(2, 271, '25.50', '0.00', '18.00', '0.00', '55.80', '0.00', '0.65', '0.05'),
(3, 43, '1.25', '7.37', '0.59', '0.00', '88.70', '1.42', '0.40', '0.24'),
(4, 75, '2.00', '15.80', '0.22', '0.00', '78.90', '2.05', '0.94', '0.05'),
(5, 36, '0.80', '6.60', '0.26', '0.00', '89.40', '2.17', '0.50', '0.22'),
(6, 19, '1.14', '2.34', '0.29', '0.00', '94.10', '1.35', '0.40', '0.20'),
(7, 900, '0.00', '0.00', '100.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(8, 346, '12.40', '13.00', '17.80', '0.00', '8.88', '41.90', '5.07', '1.00'),
(9, 139, '8.86', '21.10', '1.09', '0.00', '63.90', '4.80', '0.09', '0.01'),
(10, 0, '0.00', '0.00', '0.00', '98.00', '0.03', NULL, '1.69', NULL),
(11, NULL, '41.00', '11.00', '6.00', '0.00', NULL, '29.00', NULL, NULL),
(12, 343, '11.70', '69.30', '0.80', '0.00', '13.90', '3.90', '0.39', '0.00'),
(13, 0, '0.00', '0.00', '0.00', '0.00', '100.00', '0.00', '0.00', '0.00'),
(14, 304, '10.90', '44.50', '3.30', '0.00', '10.50', '26.50', '4.00', '0.26'),
(15, NULL, '11.70', '71.40', '1.30', '0.00', NULL, '3.60', NULL, NULL),
(16, 46, '0.96', '8.32', '0.26', '0.00', '87.10', '1.82', '0.00', '0.00'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id_infos` int(11) NOT NULL AUTO_INCREMENT,
  `id_ingred` int(11) NOT NULL,
  `nom_ingred` varchar(50) DEFAULT NULL,
  `healthy` tinyint(4) DEFAULT NULL,
  `img_ingred` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_infos`,`id_ingred`),
  UNIQUE KEY `id_infos` (`id_infos`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id_infos`, `id_ingred`, `nom_ingred`, `healthy`, `img_ingred`) VALUES
(1, 1, 'tomate', 1, 'http://drive.google.com/uc?export=view&id=1ZPyENlf-ivzgsIYtXnGnNRwOFF77obp7'),
(2, 2, 'Viande d\'agneau', 1, NULL),
(3, 3, 'Oignon', 1, NULL),
(4, 4, 'Pomme de terre', 1, NULL),
(5, 5, 'carotte', 1, 'http://drive.google.com/uc?export=view&id=1K3aAYKAjzV2GYM4lmd_28WVXb8R7LCw5'),
(6, 6, 'Courgette', 1, 'http://drive.google.com/uc?export=view&id=1FoZ0wN0gRAWtL-oCs9zBDDJ9cqxAnNfv'),
(7, 7, 'Huile de tournesol', 0, NULL),
(8, 8, 'Coriandre ', 1, NULL),
(9, 9, 'Pois chiche', 1, NULL),
(10, 10, 'Sel', 0, NULL),
(11, 11, 'levure boulangère', 0, NULL),
(12, 12, 'Farine', 0, NULL),
(13, 13, 'Eau', 1, NULL),
(14, 14, 'Poivre noir', 1, NULL),
(15, 15, 'Semoule fine', 0, NULL),
(16, 16, 'Orange', 1, 'http://drive.google.com/uc?export=view&id=1pbM7rK_i9KzDXDznlGf5AfW0xOSSY7Yw'),
(17, 17, 'Pasthèque', 1, 'http://drive.google.com/uc?export=view&id=1t_E4Nlrr8um7rCoLF-24K77EjBYvi7yP'),
(18, 18, 'Citron', 1, 'http://drive.google.com/uc?export=view&id=1DmyHddEdpM-tKQPvi-UZC1U9P3Bb8Gc5'),
(19, 19, 'Fraise', 1, 'http://drive.google.com/uc?export=view&id=1D_U-19FFdqgxV6z4dayZ24vjAj8hf6Pq'),
(20, 20, 'Olives', 1, 'http://drive.google.com/uc?export=view&id=1WsctyAL7qNhBtWKNSvAyFp2Nym4yTRht');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `titre_menu` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `titre_menu`) VALUES
(8, 'Se connecter'),
(1, 'Accueil'),
(2, 'News'),
(3, 'Idées'),
(4, 'Healthy'),
(5, 'Saison'),
(6, 'Fêtes'),
(7, 'Nutrition');

-- --------------------------------------------------------

--
-- Structure de la table `necessiter`
--

DROP TABLE IF EXISTS `necessiter`;
CREATE TABLE IF NOT EXISTS `necessiter` (
  `id_categ` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL,
  `id_ingred` int(11) NOT NULL,
  `quantite` decimal(15,2) DEFAULT NULL,
  `unite_mesure` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_categ`,`id_recette`,`id_ingred`),
  KEY `id_infos` (`id_ingred`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `necessiter`
--

INSERT INTO `necessiter` (`id_categ`, `id_recette`, `id_ingred`, `quantite`, `unite_mesure`) VALUES
(1, 1, 1, '500.00', 'grammes'),
(1, 1, 2, '500.00', 'grammes'),
(1, 1, 3, '2.00', 'pièce'),
(1, 1, 4, '1.00', 'pièce'),
(1, 1, 5, '0.50', 'pièce'),
(1, 1, 6, '0.50', 'pièce'),
(1, 1, 7, '3.00', 'CAS'),
(1, 1, 8, '1.00', 'botte'),
(1, 1, 9, '1.00', 'tasse'),
(1, 1, 10, '2.00', 'CAC'),
(1, 1, 11, '1.00', 'CAC'),
(1, 1, 12, '2.00', 'tasse'),
(1, 1, 13, '1.00', 'litre'),
(1, 1, 14, '1.00', 'CAC'),
(4, 34, 16, NULL, NULL),
(3, 30, 19, NULL, NULL),
(4, 32, 18, NULL, NULL),
(4, 37, 18, NULL, NULL),
(4, 39, 17, NULL, NULL),
(4, 40, 19, NULL, NULL),
(2, 20, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `titre_news` varchar(1000) NOT NULL,
  `desc_news` varchar(1000) NOT NULL,
  `img_news` varchar(1000) NOT NULL,
  `video_news` varchar(50) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id_news`, `titre_news`, `desc_news`, `img_news`, `video_news`) VALUES
(1, 'Recettes végétariennes', '3 façons de cuisiner les légumineuses pour faire le plein de protéines', 'drive.google.com/uc?export=view&id=1zbfrxAuiSrYXceWeNIjX1aqd-Icgnc60', ''),
(2, 'Etre chef d\'un soir ?', 'Le restaurant de la Samaritaine, situé au cœur de la capitale, propose aux passionnés de gastronomie, amateurs ou experts, de louer sa cuisine professionnelle et ultra-moderne pour un soir, en profitant de l\'aide d\'un commis de cuisine et d\'un plongeur.', 'http://drive.google.com/uc?export=view&id=1_awY8pzyLIMCr30denW_PsoTp3_eiwHB', ''),
(3, 'Conticini En Live', 'Cyril Lignac cartonne depuis le confinement dans l\'émission «Tous en cuisine» sur M6 et la diffusion a même été prolongée jusqu\'à fin mai pour faire durer le plaisir. Le chef dévoile à l\'avance la liste de ses ingrédients et les téléspectateurs peuvent concocter de bons petits plats et desserts en même temps que lui, c\'est un concept qui plaît ! L\'aventure continuera également en librairie, puisqu\'il sort un livre de cuisine intitulé «Faits maison n°1». Il regroupe des recettes du quotidien et de saison faciles à reproduire chez soi.', 'http://drive.google.com/uc?export=view&id=18JlNVpe8k0KI-r0vgN6ujZk06h21JCJu', '');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `id_categ` int(11) NOT NULL AUTO_INCREMENT,
  `id_recette` int(11) NOT NULL,
  `nom_recette` varchar(50) DEFAULT NULL,
  `notation` int(5) NOT NULL,
  `tmp_prep` time DEFAULT NULL,
  `tmp_repos` time DEFAULT NULL,
  `tmp_cuisson` time DEFAULT NULL,
  `img_recette` varchar(100) DEFAULT NULL,
  `difficulte` int(11) DEFAULT NULL,
  `nb_calories` int(11) DEFAULT NULL,
  `lien_video` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_categ`,`id_recette`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id_categ`, `id_recette`, `nom_recette`, `notation`, `tmp_prep`, `tmp_repos`, `tmp_cuisson`, `img_recette`, `difficulte`, `nb_calories`, `lien_video`) VALUES
(1, 1, 'Hrira Oranaise', 0, '00:25:00', '00:00:00', '00:40:00', NULL, 6, 110, NULL),
(1, 2, 'Bourek', 4, '00:15:00', '00:00:00', '00:15:00', NULL, NULL, 315, NULL),
(1, 3, 'Bricks', 4, NULL, NULL, NULL, NULL, NULL, 280, NULL),
(1, 4, 'Chorba Frik', 3, '00:45:00', NULL, '00:40:00', NULL, NULL, 63, NULL),
(1, 5, 'Maakouda', 5, NULL, NULL, NULL, NULL, NULL, 107, NULL),
(1, 6, 'Hmiss', 4, NULL, NULL, NULL, NULL, NULL, 88, NULL),
(1, 7, 'Chaussons', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 8, 'Batbouts', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 9, 'Croquettes de poulet', 4, '00:10:00', NULL, '00:15:00', NULL, NULL, NULL, NULL),
(1, 10, 'Carottes chermoula', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 11, 'Bekoukes', 4, NULL, NULL, NULL, NULL, NULL, 83, NULL),
(2, 12, 'Chakhchoukha', 5, '00:40:00', NULL, '02:00:00', NULL, NULL, NULL, NULL),
(2, 13, 'Couscous', 5, NULL, NULL, NULL, NULL, NULL, 169, NULL),
(2, 14, 'Lham Hlou', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 15, 'M\'hajeb', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 16, 'Mthewem', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 17, 'Poulet Roulé', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 18, 'Rechta', 5, NULL, NULL, NULL, NULL, NULL, 140, NULL),
(2, 19, 'Seffa', 5, NULL, NULL, NULL, NULL, NULL, 169, NULL),
(2, 20, 'Tajine d\'olives', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 21, 'Baklawa', 4, '02:30:00', NULL, '01:00:00', NULL, NULL, 461, NULL),
(3, 22, 'Chamia', 4, NULL, NULL, NULL, NULL, NULL, 417, NULL),
(3, 23, 'Cheesecake', 4, NULL, NULL, NULL, NULL, NULL, 350, NULL),
(3, 24, 'Makrout', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 25, 'Mhalbi', 3, '00:10:00', '00:00:00', '00:15:00', NULL, NULL, NULL, NULL),
(3, 26, 'Zlabia', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 27, 'Samsa', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 28, 'San Sebastian Cheesecake', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 29, 'Tiramisu', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 30, 'Verrine', 4, '00:15:00', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 31, 'Chocolat Chaud', 5, '00:05:00', NULL, '00:10:00', NULL, NULL, NULL, NULL),
(4, 32, 'Citronnade à la menthe', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 33, 'Iced Coffee', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 34, 'Jus d\'orange', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 35, 'Mocaccino ', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 36, 'Café arabe', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 37, 'Mojito', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 38, 'Smoothie aux fruits', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 39, 'Jus de pastèque et gingembre', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 40, 'Jus de fraise', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

DROP TABLE IF EXISTS `saison`;
CREATE TABLE IF NOT EXISTS `saison` (
  `id_saison` int(11) NOT NULL AUTO_INCREMENT,
  `nom_saison` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_saison`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `saison`
--

INSERT INTO `saison` (`id_saison`, `nom_saison`) VALUES
(1, 'Hiver'),
(2, 'Automne'),
(3, 'Eté'),
(4, 'Printemps'),
(5, '4 saisons');

-- --------------------------------------------------------

--
-- Structure de la table `style`
--

DROP TABLE IF EXISTS `style`;
CREATE TABLE IF NOT EXISTS `style` (
  `id_style` int(11) NOT NULL AUTO_INCREMENT,
  `font_titre` varchar(50) NOT NULL,
  `font_soustitre` varchar(50) NOT NULL,
  `font_par` varchar(50) NOT NULL,
  `couleur1` varchar(50) NOT NULL,
  PRIMARY KEY (`id_style`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

DROP TABLE IF EXISTS `suivre`;
CREATE TABLE IF NOT EXISTS `suivre` (
  `id_categ` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL,
  `id_etape` int(11) NOT NULL,
  PRIMARY KEY (`id_categ`,`id_recette`,`id_etape`),
  KEY `id_etape` (`id_etape`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `suivre`
--

INSERT INTO `suivre` (`id_categ`, `id_recette`, `id_etape`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 3),
(1, 1, 4),
(1, 1, 5),
(1, 1, 6),
(1, 1, 7),
(1, 1, 8),
(1, 1, 9),
(1, 1, 10),
(1, 1, 11);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `nom_user` varchar(50) NOT NULL,
  `prenom_user` varchar(50) NOT NULL,
  `sexe` enum('homme','femme') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `user_valid` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `username`, `nom_user`, `prenom_user`, `sexe`, `email`, `mdp`, `user_valid`) VALUES
(1, 'meriemafaf', 'Haddou', 'Meriem Afaf', 'femme', 'jm_haddou@esi.dz', '123456789', 1),
(2, '', 'Abdelaziz', 'Ines', 'femme', 'ji_abdelaziz@esi.dz', 'abcdefgh', 1),
(3, '', 'Haddou', 'Manar El Imene', 'femme', 'manarhaddou03@gmail.com', 'manar03', 0),
(4, '', 'Haddou', 'Ahmed Zoheir', 'homme', 'ahmedzoheir7@gmail.com', 'ahmed07', 0),
(5, 'admin', '', '', NULL, NULL, 'admin', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
