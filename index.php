<?php

    //test php
    echo '<h1>APP</h1>';
    echo '<h2>Mysql test</h2>';

    //test database create
    /*
    CREATE DATABASE mytestdb;
    USE mytestdb;
    CREATE TABLE user (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(20),
        surname VARCHAR(20),
        created DATE);
    INSERT INTO user (name,surname,created) VALUES ('Gustavo','De Souza','2017-03-26');
    */
    $mysqli = new mysqli('mariadb','root','admin','mytestdb');

    if ($mysqli->connect_errno) {
        echo 'Connection Failed';
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
        exit;
    }

    $sql = "SELECT id, name, surname FROM user";
    if (!$result = $mysqli->query($sql)) {
        echo 'Query Failed';
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }

    if ($result->num_rows === 0) {
        echo 'No record found';
        exit;
    }

    echo '<ul>';
    while ($user = $result->fetch_assoc()) {
        echo '<li>';
        echo $user['name'] . ' ' . $user['surname'] . ' ' . $user['created'];
        echo '</li>';
    }
    echo '</ul>';

    echo '<h2>PHP Info</h2>';
    phpinfo(); exit;



?>
