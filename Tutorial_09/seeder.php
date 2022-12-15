<?php
include("lib/seeder/autoload.php");
include("include/header.php");

$faker = Faker\Factory::create();
for ($i = 0; $i < 60; $i++) {
    $title = $faker->name();
    $content = $faker->paragraph();
    $publish =  $faker->numberBetween(0, 1);
    $createDate = $faker->dateTimeThisYear($max = "now", 'UTC')->format('Y-m-d H:i:s');
    $sql = "insert into posts(title,content,is_published,created_datetime) values('" . $title . "','" . $content . "','" . $publish . "','" . $createDate . "')";
    $connection->exec($sql);
}
?>
