CREATE TABLE IF NOT EXISTS `palindromo` (
  `id_palindromo` int(11) NOT NULL AUTO_INCREMENT,
  `valor_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `valor_salida` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_palindromo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `ordenarray` (
  `id_ordenarray` int(11) NOT NULL AUTO_INCREMENT,
  `valor_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `valor_salida` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_ordenarray`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;