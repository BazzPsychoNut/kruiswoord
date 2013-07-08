<?php
/**
 * script to import puzzelwoorden.txt to mysql table
 */
$config = require '../config/config.php';

$db = new mysqli($config['db_server'], $config['db_username'], $config['db_password'], $config['db_database']);

// create table
$sql = "create table if not exists `words_nl` (
          `word` varchar(100) character set utf8 not null,
          `length` tinyint(4) not null,
          primary key (`word`),
          key `length` (`length`)
        ) engine=innodb default charset=utf8;";
$db->query($sql);

// empty table
$db->query("truncate table words_nl");

// MysqlAdmin's import works excellent. My own import script couldn't get the special characters right. 
// Just put max execution time on unlimited