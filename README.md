# Грузовозофф - Система бронирования грузоперевозок

## Описание проекта
Система "Грузовозофф" предназначена для управления бронированием грузоперевозок. Проект включает в себя:
- Регистрацию и авторизацию пользователей
- Создание заявок на перевозку грузов
- Просмотр своих заявок
- Административную панель для управления всеми заявками

## Технологии
- PHP
- MySQL
- HTML/CSS

## Установка и настройка
1. Скопируйте файлы проекта на ваш веб-сервер
2. Создайте базу данных `gruz` и импортируйте следующую структуру:

```sql
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `login` (`login`)
);

CREATE TABLE `bron` (
  `id_bron` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `vez` int(11) NOT NULL,
  `gabariti` int(11) NOT NULL,
  `address_ot` varchar(255) NOT NULL,
  `address_dost` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bron`),
  FOREIGN KEY (`id_user`) REFERENCES `user`(`id_user`)
);

## Контакты
Автор: Гриднева Карина Константиновна
Email: gridnevakk05@mail.com
