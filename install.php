<?php
include "db_connection.php";

$connect = mysqli_connect($servername, $username, $password);
if(!$connect)
{
    die('Could not connect: ' . mysqli_error($connect));
}
echo 'Connected successfully';
$sql = 'CREATE Database CatBD';
$retern_value = mysqli_prepare($connect, $sql);
mysqli_stmt_execute($retern_value);
mysqli_stmt_close($retern_value);
if(!$retern_value)
{
    die('Could not create database: ' . mysqli_error($connect));
}
echo "Database CatBD created\n";

$sql = 'CREATE TABLE `category` (
        `id` INT AUTO_INCREMENT NOT NULL,
        `name` varchar(100) NOT NULL,
        `product` varchar(100) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
mysqli_select_db($connect, 'CatBD');
$return_value = mysqli_query($connect, $sql);
if (! $return_value ) {
    die('Could not create table: ' . mysqli_error($connect));
}
$sql= "INSERT INTO `category` (`id`, `name`, `product`) VALUES
        (1, 'WHITE CAT', 'id=1&id=2&id=3'),
        (2, 'BLACK CAT', 'id=4&id=5&id=6'),
        (3, 'RED CAT', 'id=7&id=8&id=9'),
        (4, 'MIX CAT', 'id=1&id=2&id=3&id=4&id=5&id=6&id=7&id=8&id=9')";
mysqli_select_db($connect, 'CatBD');
$return_value2 = mysqli_query($connect, $sql);
if (! $return_value2 ) {
    die('Could not create table: ' . mysqli_error($connect));
}


$sql = 'CREATE TABLE `basket` (
             `id` INT AUTO_INCREMENT NOT NULL,
             `email` varchar(100) NOT NULL,
             `content` varchar(1000) NOT NULL,
             `total` varchar(100) NOT NULL,
             PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
mysqli_select_db($connect, 'CatBD');
$return_value = mysqli_query($connect, $sql);
if (! $return_value ) {
    die('Could not create table: ' . mysqli_error($connect));
}

$sql =	'CREATE TABLE `users` (
        `id` INT AUTO_INCREMENT NOT NULL,
        `name` varchar(255) NOT NULL,
        `lastname` varchar(255) NOT NULL,
        `email` varchar(100) NOT NULL UNIQUE KEY,
        `password` varchar(255) NOT NULL,
        `admin` int(2) NOT NULL DEFAULT "0",
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
mysqli_select_db($connect, 'CatBD');
$return_value2 = mysqli_query($connect, $sql);
if (! $return_value2 ) {
    die('Could not create table: ' . mysqli_error($connect));
}
$sql = "INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `admin`) VALUES
(20, 'admin', 'admin', 'admin@ya.ru', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1),
(21, 'test', 'test', 'test@ya.ru', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 0),
(22, 'test1', 'test1', 'test1@ya.ru', 'b16ed7d24b3ecbd4164dcdad374e08c0ab7518aa07f9d3683f34c2b3c67a15830268cb4a56c1ff6f54c8e54a795f5b87c08668b51f82d0093f7baee7d2981181', 0),
(23, 'test2', 'test2', 'test2@ya.ru', '6d201beeefb589b08ef0672dac82353d0cbd9ad99e1642c83a1601f3d647bcca003257b5e8f31bdc1d73fbec84fb085c79d6e2677b7ff927e823a54e789140d9', 0),
(24, 'test3', 'test3', 'test3@ya.ru', 'cb872de2b8d2509c54344435ce9cb43b4faa27f97d486ff4de35af03e4919fb4ec53267caf8def06ef177d69fe0abab3c12fbdc2f267d895fd07c36a62bff4bf', 0)";

mysqli_select_db($connect, 'CatBD');
$return_value2 = mysqli_query($connect, $sql);
if (! $return_value2 ) {
    die('Could not create table: ' . mysqli_error($connect));
}

$sql = 'CREATE TABLE `product` (
        `id` INT AUTO_INCREMENT NOT NULL,
        `category` varchar(100) NOT NULL,
        `title` varchar(255) NOT NULL,
        `description` varchar(255) NOT NULL,
        `price` varchar(9) NOT NULL,
        `sale` int(9) NOT NULL,
        `image` varchar(500) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
mysqli_select_db($connect, 'CatBD');
$retern_value = mysqli_query($connect, $sql);
if (! $retern_value ) {
    die('Could not create table: ' . mysqli_error($connect));
}

$sql = 	"INSERT INTO `product` (`id`, `category`, `title`, `description`, `price`, `sale`, `image`) VALUES
(1, 'WHITE CAT', 'White cat 1', 'Cute', '100', 3, 'https://i.pinimg.com/236x/ac/da/7f/acda7f76810f1a21d48ae853b22ef7bd.jpg'),
(2, 'WHITE CAT', 'White cat 2', 'Amazing', '200', 5, 'https://i.pinimg.com/236x/a8/e7/72/a8e77213be17d520e11666fa8a83dff8.jpg'),
(3, 'WHITE CAT', 'White cat 3', 'Evil', '300', 10, 'https://i.pinimg.com/236x/88/9f/ab/889fabdcc4307607fcb36f262e669f95.jpg'),
(4, 'BLACK CAT', 'Black cat 1', 'Cute', '150', 12, 'https://i.pinimg.com/236x/1f/e8/a0/1fe8a0c030774f1677aa9c3f211e5d03.jpg'),
(5, 'BLACK CAT', 'Black cat 2', 'Amazing', '250', 20, 'https://i.pinimg.com/236x/a9/8e/7c/a98e7c967c2b95961bf2831ecc8ed1ed.jpg'),
(6, 'BLACK CAT', 'Black cat 3', 'Evil', '350', 5, 'https://i.pinimg.com/236x/59/c4/26/59c4267de4e2073b16f8bc8aa55fb9ce.jpg'),
(7, 'RED CAT', 'Red cat 1', 'Cute', '400', 10, 'https://i.pinimg.com/236x/a4/45/de/a445de7244a5a77361af5a08c5f9cdca.jpg'),
(8, 'RED CAT', 'Red cat 1', 'Amazing', '450', 20, 'https://i.pinimg.com/236x/36/e2/c7/36e2c7d6fb4ae9cdfa1ecf9b01773157.jpg'),
(9, 'RED CAT', 'Red cat 1', 'Evil', '500', 30, 'https://i.pinimg.com/236x/31/2a/6d/312a6d3e4b8d45ad34be8c5ad0f10d48--cheshire-cat-red-cat.jpg'),
(10, 'MIX CAT', 'White cat 1', 'Cute', '100', 3, 'https://i.pinimg.com/236x/ac/da/7f/acda7f76810f1a21d48ae853b22ef7bd.jpg'),
(11, 'MIX CAT', 'Mix cat 1', 'Cute', '100', 3, 'https://i.pinimg.com/236x/35/8a/78/358a78c517d2cbb344b644e990953322--cat-traps-outdoor-cats.jpg'),
(12, 'MIX CAT', 'Mix cat 2', 'Amazing', '450', 20, 'https://i.pinimg.com/236x/aa/7b/e2/aa7be2f505fc66f4ad9d2ee00ad54bad--cat-shirts-cat-lovers.jpg')";

mysqli_select_db($connect, 'CatBD');
$return_value2 = mysqli_query($connect, $sql);

mysqli_close($connect);

header('Location: index.php');
?>
?>