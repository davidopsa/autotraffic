CREATE DATABASE `autotraffic`;
USE `autotraffic`;

CREATE TABLE `tasks` (
  `id` int(10) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tasks` (`id`, `title`, `description`, `completed`, `created_at`, `updated_at`) VALUES
(1, 'Meeting Editado', 'En esta reunion se realizarán los respectivos assessment\'s editado', 1, '2024-12-26', '2024-12-29'),
(2, 'Entrevista 2.2', '2 Se realizará la entreviste competente a los candidatos 2', 1, '2024-12-27', '2024-12-29'),
(5, 'Test', 'test', 0, '2024-12-27', NULL),
(6, 'Test2 ', '2do Test desde interfaz', 0, '2024-12-27', NULL),
(7, 'sdfsdfsd', 'sdfsdfsdfsdfsdf', 0, '2024-12-27', NULL),
(8, 'Test 5', 'sdfhbs,dmfbksdjbfksjd', 0, '2024-12-27', NULL),
(9, 'Meeetingosdjglsjdh', 'skjdflsdhflksfkljsldknf sldk fhlskh', 0, '2024-12-27', NULL),
(11, 'Cena de Fin de Año', 'Esta cena se realizará el sábado 28 de Diciembre de 2024', 1, '2024-12-27', '2024-12-27');

ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tasks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
