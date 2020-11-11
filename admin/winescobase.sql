-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 10-11-2020 a las 22:14:49
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `winesco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`) VALUES
(1, 'Tinto'),
(2, 'Blanco'),
(3, 'Rosado'),
(4, 'Espumante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cepa`
--

CREATE TABLE `cepa` (
  `id_cepa` int(11) NOT NULL,
  `cepa` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `cepa`
--

INSERT INTO `cepa` (`id_cepa`, `cepa`) VALUES
(1, 'Malbec'),
(2, 'Rosado'),
(3, 'Sauvignon Blanc'),
(4, 'Torrontes'),
(5, 'Syrah'),
(6, 'Pinot Noir'),
(7, 'Chardonnay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `marca` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `marca`) VALUES
(2, 'Amalaya'),
(4, 'Bodegas Bianchi'),
(5, 'Ernesto Catena'),
(3, 'Luigi Bosca'),
(1, 'Rutini');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `nombre_perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `nombre_perfil`) VALUES
(1, 'Admin'),
(2, 'Vendedor'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_permisos`
--

CREATE TABLE `perfil_permisos` (
  `id_perfil_fk` int(11) NOT NULL,
  `id_permiso_fk` int(11) NOT NULL,
  `perfil_permiso_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil_permisos`
--

INSERT INTO `perfil_permisos` (`id_perfil_fk`, `id_permiso_fk`, `perfil_permiso_pk`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 5),
(1, 4, 6),
(2, 1, 7),
(2, 3, 8),
(2, 4, 9),
(3, 4, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `nombre_permiso` varchar(50) NOT NULL,
  `codigo_permiso` varchar(50) NOT NULL,
  `seccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nombre_permiso`, `codigo_permiso`, `seccion`) VALUES
(1, 'ABM productos', 'ABMPROD', 'Productos'),
(2, 'ABM usuarios', 'ABMUSR', 'Usuarios'),
(3, 'ABM comentarios', 'ABMCOM', 'comentarios'),
(4, 'Crear comentario', 'ADDCOM', 'addcom');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `descripcion` text COLLATE utf8mb4_bin NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `cepa_id` int(11) NOT NULL,
  `marcas_id` int(11) NOT NULL,
  `precio` double NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `destacado` tinyint(1) NOT NULL,
  `raiting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `categoria_id`, `cepa_id`, `marcas_id`, `precio`, `activo`, `destacado`, `raiting`) VALUES
(1, 'Familia Arizu', 'Vino intenso con tonaldades de Roble, vainilla y chocolate. Se carateriza por ser un vino seco pero al mismo tiempo suave. Ademas encontramos sabores a fruta negra', 1, 1, 3, 750, 1, 1, 5),
(2, 'De Corte', 'Vino blanco de corte, con saber citrico muy bien equilibado entre lo dulce y lo acido. Con tonalidades de manzana verde y melocoton. Se recomienda consumir con cerdo o pescado azul.', 2, 4, 2, 590, 1, 1, 3),
(3, 'De Corte', 'Es un vino que disimula su juventud, bien freso fluido y jugoso. Con tonalidades de mora, ciruela y frutos del bosque. Acompana muy bien a las carnes rojas.', 1, 1, 2, 500, 1, 0, 5),
(4, 'De Corte', 'Muy buen blend 2, muy frutal, dulce y fresco. Ideal para e lverano. va increible con pescados y arroz. Aroma a durazno pera y manzana. Sabor suave con final liviano.', 3, 2, 2, 555, 1, 0, 2),
(5, 'Animal', 'A la vista es de color casi nero, con destellos violaceos, muy intenso. En nariz presenta notas de frutas negras y mermelada de ciruela. n boca tiene un ataque inical dulce, delicado y muy agradable. Mucha fruta presnete en boca.', 1, 1, 5, 700, 1, 1, 5),
(6, 'Animal', 'Aromas especiados y frutales, pimienta, canela, regaliz y frutos rojos predominan en sabores. Con cuerpo medio taninos sedosos y muy jugoso. Acompana muy bien a las carnes rojas o cerdo.', 1, 5, 5, 900, 1, 0, 4),
(7, 'Gran Famiglia', 'Rojo vino, propone aroma a frutas rojas y algo ahumado. En boca, acidez justa, algo picante, con buenos taninos y un dejo a madera. De lo mejor en precio/calidad.', 1, 1, 4, 1500, 1, 1, 2),
(8, 'Sauvignon', 'Luigi Bosca Sauvignon Blanc presenta un color amarillo verdoso brillante con reflejos plateados. En nariz desprende muy agradables aromas citricos, a hierbas y ciertas notas minerales muy sutiles. En el paladar se expresa con pungencia, vivacidad, tension y una grata acidez que suma frescura. Es un blanco mas fino que goloso, muy puro, limpio y definido, con largo final y consistencia para maridar con comidas acordes.', 2, 3, 3, 850, 1, 1, 5),
(9, 'Viognier', 'Seductor, con fragancias florales y frutales, destacandose las notas de jazmin y durazno blanco. Fresco, de caracter varietal unico amalga perfectamente con sus notas minerales. Tan intensa en su expresion floral y frutal que su leve paso por roble queda apenas perceptible, logrando asi un equilibrio perfecto.', 2, 4, 4, 490, 1, 1, 4),
(10, 'Trumpeter', 'Rojo violaceo brillante, seduce con sus aromas frutales (ciruela) y especiados (canela, cardamomo, pimienta negra). Posee gran cuerpo y su vivaz estructura acentua los taninos intensos que se vuelven aterciopelados en el retrogusto.', 1, 1, 1, 900, 1, 1, 2),
(11, 'Sauvignon', 'Intenso, en sus fragantes notas citricas (pomelo rosado) y caracteristicas de la variedad (hierbas, pasto recien cortado, mineral), tiene tambien un equilibrado parangon azucar-acidez en el que ademas tiene cabida un dejo a vainilla, recreado por el discreto tiempo de crianza en roble.', 1, 3, 1, 1580, 1, 1, 5),
(12, 'Rose', 'El vino regala amenas notas florales (jazmin), de frutos secos (almendra, nuez), coco y vainilla, en un discreto marco roblizo. El primer sorbo descubre un ataque seco y distinguido. Sorprende en boca por su vivacidad. Pero es despues de varios minutos, cuando aparece la consistencia de este rose singular. Los primeros acentos a frutos rojos (cereza) completan el paladar, seguidos de una elegante acidez fresca y suave con algun vestigio salino.', 3, 2, 1, 680, 1, 1, 3),
(13, 'Cabernet', 'Rojo intenso, con matices azulados. En nariz, se presenta frutado, con notas de ciruela, vainilla y anis; mientras, en boca, se reafirman los acentos aciruelados. Los taninos, muy presentes pero amables, destacan su personalidad.', 1, 1, 1, 890, 1, 1, 4),
(14, 'a Rose is a Rose', 'Luigi Bosca Roses un vino seductor, mico y hechizante, tanto por sus caracterticas aromicas y su sabor como por su mico color salm.Tiene una expresi fresca en nariz y en boca, con notas florales y de frutos rojos, resaltdose la cereza.En el paladar su equilibrada acidez lo hace un vino fil de beber, ligero, de mediana estructura y con un final de boca dulce y refrescante que recuerda a caramelos de cereza y confituras.', 3, 2, 3, 800, 1, 1, 2),
(15, 'Brut Nature', 'Dorado, con reflejos amarillo verdosos. Burbuja pequena, perezosa y muy persistente. Nariz compleja, donde se integran armoniosamente el aroma de pan sin hornear, con frutas (ananas, durazno blanco). En paladar, se perciben notas citricas y tostadas, con un final limpio y fresco.', 1, 6, 1, 1500, 1, 1, 1),
(16, 'Gran Corte', 'Brillante con un profundo y penetrante color rubi. Aromas a frutas rojas y negras con notas florales y especiadas, tipicas de la region y suaves notas a vainilla, provenientes de su paso por barrica. En boca, es concentrado, complejo y elegante, taninos frutados y redondos, un final largo y delicado sotenido por la frescura del corte.', 1, 1, 2, 930, 1, 0, 5),
(17, 'Icono', 'Tinto de color rojo granate con tintes negros profundos. En nariz es amplio, mostrando arandanos, cerezas y notas florales. Su equilibrada acidez lo muestra elegante, armonico y redondo. Su final es muy persistente y complejo dejando una vasta sensacion de frutas maduras, hojas de te y caza ahumada.', 1, 1, 3, 800, 1, 0, 3),
(18, 'Bianchi Varietales Chardonnay', 'Fresco, con leve sensacion de dulzura, con acidez vibrante, ademas podemos descubrir aromas tropicales y citricos, de volumen y estructura media. Ideal para disfrutarlo como aperitivo o como perfecto acompanante de platos.', 2, 7, 4, 960, 1, 1, 4),
(19, 'Tikal Amorio', 'Vista rojo purpura. Aroma cerezas negras, moras, especias y pimienta negra, que se integran con toques de cafe y vainilla, propios del roble.', 1, 1, 5, 600, 1, 1, 2),
(20, 'Alma Negra', 'Color rojo rubi profundo. En nariz, es muy expresivo e intenso. Las frutillas, cerezas y membrillos son los aromas frutales que mas se destacan, fundiendose con notas de vainilla, madera tostada y sutiles notas a especias. Su boca es plena, de taninos muy agradables, y suaves. Tiene un medio de boca consistente, frutal y con algunas notas minerales.', 1, 1, 5, 1230, 1, 0, 1),
(21, 'Finca Los Nobles', 'De color rojo violaceo profundo con reflejos rubi, sus aromas son expresivos e intensos, con notas de frutos rojos y negros, especias dulces, flores y suaves ahumados de la crianza. En boca es franco y voluptuoso, con una frescura vivaz que habla de la aniada, apoyada en su caracter frutal. De paladar amplio y profundo, con taninos finos y un final persistente en el que se puede apreciar su complejidad. Es un tinto de terroir, con sentido de pertenencia y muy representativo de la familia.', 1, 1, 3, 890, 1, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usr_perfil`
--

CREATE TABLE `usr_perfil` (
  `id_usr_fk` int(11) NOT NULL,
  `id_perfil_fk` int(11) NOT NULL,
  `usr_perfil_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usr` int(11) NOT NULL,
  `usr` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `usr_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cepa`
--
ALTER TABLE `cepa`
  ADD PRIMARY KEY (`id_cepa`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `marca` (`marca`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `perfil_permisos`
--
ALTER TABLE `perfil_permisos`
  ADD PRIMARY KEY (`perfil_permiso_pk`),
  ADD KEY `id_perfil_fk` (`id_perfil_fk`),
  ADD KEY `id_permiso_fk` (`id_permiso_fk`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_fk` (`categoria_id`),
  ADD KEY `cepa_fk` (`cepa_id`),
  ADD KEY `marcas_fk` (`marcas_id`);

--
-- Indices de la tabla `usr_perfil`
--
ALTER TABLE `usr_perfil`
  ADD PRIMARY KEY (`usr_perfil_pk`),
  ADD KEY `id_usr_fk` (`id_usr_fk`),
  ADD KEY `id_perfil_fk2` (`id_perfil_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cepa`
--
ALTER TABLE `cepa`
  MODIFY `id_cepa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `perfil_permisos`
--
ALTER TABLE `perfil_permisos`
  MODIFY `perfil_permiso_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usr_perfil`
--
ALTER TABLE `usr_perfil`
  MODIFY `usr_perfil_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `perfil_permisos`
--
ALTER TABLE `perfil_permisos`
  ADD CONSTRAINT `id_perfil_fk` FOREIGN KEY (`id_perfil_fk`) REFERENCES `perfiles` (`id_perfil`),
  ADD CONSTRAINT `id_permiso_fk` FOREIGN KEY (`id_permiso_fk`) REFERENCES `permisos` (`id_permiso`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `categoria_fk` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `cepa_fk` FOREIGN KEY (`cepa_id`) REFERENCES `cepa` (`id_cepa`),
  ADD CONSTRAINT `marcas_fk` FOREIGN KEY (`marcas_id`) REFERENCES `marcas` (`id`);

--
-- Filtros para la tabla `usr_perfil`
--
ALTER TABLE `usr_perfil`
  ADD CONSTRAINT `id_perfil_fk2` FOREIGN KEY (`id_perfil_fk`) REFERENCES `perfiles` (`id_perfil`),
  ADD CONSTRAINT `id_usr_fk` FOREIGN KEY (`id_usr_fk`) REFERENCES `usuarios` (`id_usr`);
