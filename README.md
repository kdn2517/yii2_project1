-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 21 2018 г., 12:27
-- Версия сервера: 5.7.21-0ubuntu0.16.04.1
-- Версия PHP: 7.1.15-1+ubuntu16.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2basic`
--
CREATE DATABASE IF NOT EXISTS `yii2basic` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `yii2basic`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Prescott', 'Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris'),
(2, 'Ethan', 'Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede'),
(3, 'Keane', 'a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc'),
(4, 'Austin', 'eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales'),
(5, 'Benjamin', 'et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam'),
(6, 'Бытовая техника', '');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `id_products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `image`, `id_products`) VALUES
(7, '0005aaeee2030765.jpg', 2),
(16, '0005aaf8c0b58299.jpg', 1),
(17, '0005aaf97aa97e2e.jpg', 2),
(18, '0005aaf97ad9fdca.jpg', 2),
(19, '0005aaf97b74d3f5.jpg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `id_products`, `amount`, `user`) VALUES
(1, 93, 4, 2),
(2, 93, 4, 2),
(3, 93, 4, 2),
(4, 101, 14, 2),
(5, 22, 4, 2),
(6, 54, 3, 2),
(7, 93, 4, 2),
(8, 101, 14, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `number` tinyint(10) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '999',
  `image` varchar(100) DEFAULT NULL,
  `category` varchar(50) NOT NULL DEFAULT '1',
  `galery` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `number`, `price`, `image`, `category`, `galery`) VALUES
(1, 'Ultrices A Auctor Limited', 'Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet.', 12, 65119, '5aaee8d210f7e.jpg', '9', NULL),
(2, 'Arcu LLP', 'a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt', 86, 17813, '5aa29d6245737.jpg', '8', NULL),
(3, 'Mus Ltd', 'Nunc quis arcu vel quam dignissim pharetra. Nam', 97, 82120, '5aa29d5183a3a.jpg', '21', NULL),
(4, 'Enim Nunc Ut Inc.', 'Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit.', 55, 96761, '5aa3baf40870b.jpg', '1', NULL),
(5, 'Quis Incorporated', 'interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu,', 62, 42907, '5aa3bb01c2098.jpg', '25', NULL),
(6, 'Ac Inc.', 'at, iaculis quis, pede. Praesent eu dui. Cum sociis', 72, 72060, '5aa3bb0fef200.jpg', '5', NULL),
(7, 'Lobortis LLC', 'Cum sociis natoque penatibus et magnis dis', 25, 55220, '5aa3bb242e720.jpg', '15', NULL),
(8, 'Amet Metus Consulting', 'Praesent luctus. Curabitur egestas nunc', 81, 49015, '5aa3bb5311be5.jpg', '18', NULL),
(9, 'Lorem Corp.', 'nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere', 39, 10583, '5aa3bb60d1874.jpg', '25', NULL),
(10, 'Lobortis Inc.', 'nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt,', 100, 84879, '5aa3bb6ee51b6.jpg', '16', NULL),
(11, 'Vitae Sodales At PC', 'Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus', 26, 18427, '5aa3bb7ca3931.jpg', '9', NULL),
(12, 'Sed Et Libero LLP', 'dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh', 11, 14423, '5aa3bb8b0cca6.jpg', '8', NULL),
(13, 'Quis Associates', 'pede. Nunc sed orci lobortis', 46, 14012, '5aa3bb992d518.jpg', '2', NULL),
(14, 'Mattis Ornare Lectus Foundation', 'non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis', 68, 54523, '5aa3bbd0084f5.jpg', '8', NULL),
(15, 'Nibh Vulputate Inc.', 'iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero.', 6, 84771, '5aa3bbde46cc2.jpg', '12', NULL),
(16, 'Fringilla LLP', 'ultricies ornare, elit elit fermentum risus,', 73, 76492, '5aa3bbec8ac93.jpg', '19', NULL),
(17, 'Sed Corp.', 'eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit,', 93, 70929, '5aa3bbfcc95de.jpg', '21', NULL),
(18, 'Proin Corporation', 'rutrum non, hendrerit id, ante. Nunc mauris sapien,', 17, 89040, '5aa3bc0b27833.jpg', '24', NULL),
(19, 'Et Corporation', 'nascetur ridiculus mus. Aenean eget magna. Suspendisse', 6, 51649, '5aa3bc1981c87.jpg', '25', NULL),
(20, 'Non Massa Limited', 'convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper', 43, 88726, '5aa3bc2976222.jpg', '10', NULL),
(21, 'Hendrerit Corporation', 'commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac,', 23, 98249, '5aa3bc89c80c7.jpg', '14', NULL),
(22, 'Augue Id Ltd', 'Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget', 13, 29502, '5aa3bc9c0a494.jpg', '13', NULL),
(23, 'Pharetra Company', 'et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod', 85, 45089, '5aa3bca83963a.jpg', '22', NULL),
(24, 'Hendrerit PC', 'sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt', 37, 29448, '5aa3bcb4aa539.jpg', '19', NULL),
(25, 'Commodo Ipsum Consulting', 'Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur', 67, 88795, '5aa3bcc00b841.jpg', '24', NULL),
(26, 'Montes Nascetur Ridiculus Institute', 'convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam,', 19, 87534, '5aa3bccbac135.jpg', '19', NULL),
(27, 'Nibh Phasellus Nulla Inc.', 'libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et', 23, 11018, '5aa3bcd6302e4.jpg', '25', NULL),
(28, 'Est Mollis Non LLC', 'mattis. Integer eu lacus. Quisque imperdiet, erat', 6, 41783, '5aa3bce1edee9.jpg', '24', NULL),
(29, 'Rhoncus Consulting', 'ante dictum mi, ac mattis velit justo nec ante. Maecenas', 30, 68442, '5aa3bcf002c9a.jpg', '23', NULL),
(30, 'Curabitur Egestas Nunc Ltd', 'nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget', 56, 13716, '5aa3bcfde80b9.jpg', '8', NULL),
(31, 'Nunc PC', 'eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu', 72, 33398, '5aa3bd0ab1957.jpg', '5', NULL),
(32, 'Id Industries', 'Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur', 11, 81437, '5aa3bd192aff7.jpg', '6', NULL),
(33, 'Etiam Vestibulum Massa Foundation', 'In ornare sagittis felis. Donec', 34, 71405, '5aa3bd39b3e76.jpg', '9', NULL),
(34, 'Faucibus Corp.', 'ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo', 32, 15233, '5aa3bd4c1a8d2.jpg', '5', NULL),
(35, 'Donec Limited', 'viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula.', 85, 16916, '5aa3bd66205b3.jpg', '9', NULL),
(36, 'Velit Sed Foundation', 'enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam', 10, 48041, '5aa3bd79af518.jpg', '2', NULL),
(37, 'Eget Consulting', 'eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur', 68, 90303, '5aa3bd8f5136f.jpg', '14', NULL),
(38, 'Id Risus Quis Consulting', 'urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus', 69, 91563, '5aa3bdab949d4.jpg', '8', NULL),
(39, 'Parturient Incorporated', 'Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at', 66, 20404, '5aa3bdbac798d.jpg', '18', NULL),
(40, 'Etiam Gravida Consulting', 'Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit', 84, 49396, '5aa3bdce4727c.jpg', '14', NULL),
(41, 'Dis Parturient Montes Company', 'sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus', 85, 95486, '5aa3c3783ee7b.jpg', '10', NULL),
(42, 'Accumsan Laoreet Foundation', 'rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus', 94, 16570, '5aa3c388cb7b0.jpg', '10', NULL),
(43, 'Mauris PC', 'Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod', 53, 72436, '5aa3c39697855.jpg', '7', NULL),
(44, 'Nec Mauris Blandit Corp.', 'Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat', 49, 361, '5aa3c3a2af378.jpg', '9', NULL),
(45, 'Non Associates', 'sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at', 20, 84997, '5aa3c3b168f8a.jpg', '25', NULL),
(46, 'Ante Consulting', 'massa lobortis ultrices. Vivamus rhoncus.', 45, 49676, '5aa3c3c6426e6.jpg', '4', NULL),
(47, 'Pellentesque Habitant Company', 'iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc', 41, 28359, '5aa3c3d3cc2e8.jpg', '21', NULL),
(48, 'Fermentum Metus Aenean Ltd', 'mi enim, condimentum eget, volutpat ornare, facilisis eget,', 25, 56789, '5aa3c3e0b86ec.jpg', '13', NULL),
(49, 'Ac Consulting', 'mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non,', 24, 29382, '5aa3c3ec347d5.jpg', '3', NULL),
(50, 'Est PC', 'primis in faucibus orci luctus et ultrices', 96, 71554, '5aa3c3faa656a.jpg', '12', NULL),
(51, 'Luctus Et Ultrices Incorporated', 'neque non quam. Pellentesque habitant', 58, 74173, '5aa3c40bad18f.jpg', '3', NULL),
(52, 'Litora Torquent Per Corporation', 'Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa', 85, 38589, '5aa3c42ac8c3d.jpg', '23', NULL),
(53, 'Euismod Corp.', 'vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod', 87, 51235, '5aa3c439804fa.jpg', '14', NULL),
(54, 'Diam Industries', 'in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare.', 5, 84067, '5aa3c44810c19.jpg', '13', NULL),
(55, 'Sociis Natoque Inc.', 'cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla', 77, 90629, '5aa3c45493bc7.jpg', '16', NULL),
(56, 'Risus Foundation', 'dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra,', 21, 89893, '5aa3c4cee7dcc.jpg', '12', NULL),
(57, 'Sed Dui Consulting', 'lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a', 17, 64205, '5aa3c46fcbbed.jpg', '20', NULL),
(58, 'Eu Odio Phasellus Corp.', 'nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu.', 26, 87012, '5aa3c47ea83e0.jpg', '19', NULL),
(59, 'Enim Nunc Associates', 'Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit.', 4, 18123, '5aa3c48bd8485.jpg', '19', NULL),
(60, 'Euismod Urna Corporation', 'Nullam vitae diam. Proin dolor.', 81, 48096, '5aa3c49e87b36.jpg', '15', NULL),
(61, 'Duis Incorporated', 'ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla', 28, 12864, '5aa3c54c769cf.jpg', '8', NULL),
(62, 'Suspendisse Corporation', 'augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris', 13, 57966, '5aa3c55b8aafa.jpg', '13', NULL),
(63, 'Dolor Associates', 'Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit', 3, 93507, '5aa3c569832f2.jpg', '8', NULL),
(64, 'Metus Aenean Sed LLP', 'id ante dictum cursus. Nunc mauris elit, dictum eu,', 6, 66299, '5aa3c581228ce.jpg', '2', NULL),
(65, 'Nullam Scelerisque LLC', 'eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in', 88, 47680, '5aa3c58f7082b.jpg', '9', NULL),
(66, 'A Institute', 'congue. In scelerisque scelerisque dui.', 22, 8520, '5aa3c59ca9e78.jpg', '23', NULL),
(67, 'Vestibulum Ante Ipsum Associates', 'non lorem vitae odio sagittis semper. Nam tempor', 79, 5264, '5aa3c5eee9ec4.jpg', '18', NULL),
(68, 'Maecenas Malesuada Inc.', 'arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada', 71, 56063, '5aa3c6007af8c.jpg', '2', NULL),
(69, 'Faucibus Id LLC', 'Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit', 93, 8999, '5aa3c617f3583.jpg', '11', NULL),
(70, 'Lorem Fringilla Ornare Incorporated', 'Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut', 27, 60240, '5aa3c62570cbd.jpg', '18', NULL),
(71, 'Maecenas Libero LLC', 'cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui', 23, 98285, '5aa3c632e79e4.jpg', '19', NULL),
(72, 'Leo Vivamus Nibh Foundation', 'ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in,', 43, 33862, '5aa3c641dc18c.jpg', '2', NULL),
(73, 'Molestie Sed Id Industries', 'montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum', 88, 16992, '5aa3c64f9c068.jpg', '21', NULL),
(74, 'Cursus Incorporated', 'egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla', 92, 4315, '5aa3c65caa3ed.jpg', '3', NULL),
(75, 'Sed Sapien Nunc Ltd', 'Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris', 20, 87354, '5aa3c668ee63b.jpg', '3', NULL),
(76, 'Nunc Quis Arcu Ltd', 'tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat', 53, 49897, '5aa3c675605a5.jpg', '15', NULL),
(77, 'Ultrices Mauris Consulting', 'arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit,', 28, 74943, '5aa3c6830f983.jpg', '10', NULL),
(78, 'Vitae Corporation', 'Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor', 49, 64485, '5aa3c6b62d134.jpg', '2', NULL),
(79, 'Natoque Penatibus Associates', 'Quisque purus sapien, gravida non, sollicitudin a, malesuada id,', 88, 26138, '5aa3c6c923d01.jpg', '11', NULL),
(80, 'Nec Tempus Institute', 'mauris blandit mattis. Cras eget nisi dictum augue', 32, 93442, '5aa3c6d7653ab.jpg', '17', NULL),
(81, 'Lacinia Mattis Integer LLP', 'ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis', 26, 79088, '5aa3c73509346.jpg', '15', NULL),
(82, 'Congue Elit PC', 'Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis', 98, 26269, '5aa3c744d5573.jpg', '18', NULL),
(83, 'Cras Lorem Lorem Institute', 'placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent', 16, 41067, '5aa3c75957329.jpg', '8', NULL),
(84, 'Nullam Vitae Diam LLP', 'et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat', 16, 52680, '5aa3c767350b1.jpg', '24', NULL),
(85, 'Sed Associates', 'ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet', 64, 47798, '5aa3c773df1f3.jpg', '10', NULL),
(86, 'Sem Ut Institute', 'dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer', 28, 82676, '5aa3c78176678.jpg', '13', NULL),
(87, 'Tincidunt Tempus Ltd', 'Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum.', 17, 61588, '5aa3c78c8757b.jpg', '3', NULL),
(88, 'Faucibus Morbi LLP', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique', 11, 13297, '5aa3c79c540fb.jpg', '9', NULL),
(89, 'Penatibus Associates', 'lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra.', 28, 41977, '5aa3c7a7e2d9c.jpg', '23', NULL),
(90, 'Velit Quisque LLP', 'Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor', 8, 51805, '5aa3c7b50dc29.jpg', '21', NULL),
(91, 'Ut Incorporated', 'nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum,', 74, 32411, '5aa3c7c473230.jpg', '12', NULL),
(92, 'Eget Associates', 'auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum', 39, 6277, '5aa3c7d07d8c0.jpg', '25', NULL),
(93, 'Elit Sed Corporation', 'ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet', 61, 41893, '5aa3c7f7bb1fc.jpg', '13', NULL),
(94, 'Nec Enim PC', 'lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id,', 24, 99225, '5aa3c81581c45.jpg', '11', NULL),
(95, 'Aenean Euismod Inc.', 'dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu', 47, 97001, '5aa3c823a2e72.jpg', '14', NULL),
(96, 'Morbi Consulting', 'eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem', 94, 29724, '5aa3c82f710fe.jpg', '14', NULL),
(97, 'Libero Nec LLP', 'elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla', 17, 32803, '5aa3c8424e280.jpg', '8', NULL),
(98, 'Nunc Risus Varius Inc.', 'Sed molestie. Sed id risus quis diam', 60, 31643, '5aa3c8640076f.jpg', '5', NULL),
(99, 'Pede Institute', 'parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed', 69, 25376, '5aa3c8755c752.jpg', '8', NULL),
(100, 'Imperdiet Ornare Limited', 'eu erat semper rutrum. Fusce', 93, 22684, '5aa3c8857c2fe.jpg', '22', NULL),
(101, 'Чайник', 'Это чайник', 11, 2000, '5aa7b7ba862f9.jpeg', '26', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `subCategory`
--

CREATE TABLE `subCategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `description` text COLLATE utf8_german2_ci,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Дамп данных таблицы `subCategory`
--

INSERT INTO `subCategory` (`id`, `name`, `description`, `category`) VALUES
(1, 'George', 'pede nec ante blandit viverra. Donec', 2),
(2, 'Velez', 'quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis,', 1),
(3, 'Cunningham', 'pede. Cum sociis natoque penatibus et magnis dis parturient', 1),
(4, 'Colon', 'tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing.', 4),
(5, 'Sanford', 'egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras', 2),
(6, 'Flowers', 'Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus,', 5),
(7, 'Rose', 'Aliquam adipiscing lobortis risus. In mi pede, nonummy', 1),
(8, 'Buckley', 'nec orci. Donec nibh. Quisque nonummy ipsum non', 3),
(9, 'Flynn', 'ut odio vel est tempor bibendum. Donec felis', 2),
(10, 'Sargent', 'nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id', 3),
(11, 'Slater', 'vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam', 1),
(12, 'Le', 'nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem', 3),
(13, 'Mason', 'elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend,', 4),
(14, 'Hawkins', 'vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce aliquet magna a neque.', 1),
(15, 'Yang', 'sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate', 3),
(16, 'Dixon', 'non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt', 3),
(17, 'Miranda', 'penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit.', 5),
(18, 'Jefferson', 'Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu.', 1),
(19, 'Ray', 'eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem', 4),
(20, 'Thompson', 'tristique pharetra. Quisque ac libero nec', 1),
(21, 'Kirkland', 'nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce', 2),
(22, 'Mckenzie', 'Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor', 1),
(23, 'Maldonado', 'amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes,', 5),
(24, 'Ayers', 'libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend,', 1),
(25, 'Osborne', 'Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque', 2),
(26, 'Чайники', '', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` tinyint(10) NOT NULL,
  `username` varchar(33) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(2, 'ad', '', '$2y$13$jhvmDSXeJESsk8iUnl4F0eKrgxb/.sVAqfrmOIVKKB169B2mhH4vW', 0),
(3, 'login', 'email', '$2y$13$tks0RhqlWF4k6TiBDZbhoeP3rPgGEzTEY6LXtyeRFmfYeJ/91SWhW', 0),
(4, 'login1', 'email@mail.ru', '$2y$13$3KNta75v4FqQSuUhZ6evM.Imt8zBd8DgwSRsRcYKTV7NgmA/Z1nXi', 0),
(5, 'add', 'add@mail.com', '$2y$13$fizuvy0Ep/FnJpblCqcOmecAny0sv3w4/1t3joQVM7L1NANX.9.Na', 1),
(6, 'all', 'all@mail.com', '$2y$13$Fn8/kPSb9JT7YHrsA36E3eTi6BGe5VA7hQ3QkmRJbTKX1V67Gztr6', 0),
(7, 'qwer', 'qwer@mail.com', '$2y$13$UIZBQWYGdLRPrfYEpdIk8OwZDfHKjnfN0/iN3jbfkLjZri4uuicCi', 0),
(8, 'qwer1', 'qwer1@mail.com', '$2y$13$97zaqVkrt0Zppcrnu.N/BOLlep8l/ubHqnSMGXk/c5odomupO5Kb6', 0),
(9, 'qwer11', 'qwer11@mail.com', '$2y$13$15qsBq5xSVpU.8AAuUxiYuIo4bscXAEtI7oYnFk15ld/viLvFgbGS', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Индексы таблицы `subCategory`
--
ALTER TABLE `subCategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT для таблицы `subCategory`
--
ALTER TABLE `subCategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
