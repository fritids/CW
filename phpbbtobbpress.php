<?php
set_time_limit(0);
/****************************************************************************************
DEVELOPED BY: Bruno Torres <http://brunotorres.net/>
PLEASE, ONLY USE THIS SCRIPT IN A FRESH BBPRESS
INSTALLATION.
OTHERWISE YOU _WILL LOSE ALL.OUR BBPRESS DATA_
I STRONGLY ENCORAGE YOU TO BACKUP YOUR DATA
BEFORE USING THIS SCRIPT.
USE IT AT YOUR OWN RISK.
I GIVE YOU NO WARRANTIES.
PLEASE, DONT SUE ME!
******************************************************************************************
This program is free software;
you can redistribute it and/or modify it under the terms of the
GNU General Public License as published by the Free Software Foundation;
either version 2 of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY;
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License
at http://www.gnu.org/copyleft/gpl.html for more details.
******************************************************************************************/

//The database connection and table prefix for
//your old phpBB forum
$phpbb_db['host'] = 'localhost';
$phpbb_db['username'] = 'root';
$phpbb_db['password'] = '';
$phpbb_db['database'] = 'phpbb';
$phpbb_db['tableprefix'] = 'phpbb_';

//The database connection and table prefix for
//your brand new bbPress forum
$bbpress_db['host'] = 'localhost';
$bbpress_db['username'] = 'root';
$bbpress_db['password'] = '';
$bbpress_db['database'] = 'bbpress';
$bbpress_db['tableprefix'] = 'bb_';

$save_to_file = TRUE; //Change to FALSE if you don't want the SQL queries to be written to a file
$filename = '/my_writable_directory/phpbb_imported.sql'; //Ensure the file is writable by PHP

$do_import = FALSE; //Change to TRUE if you want the script itself to import the data. If you keep it FALSE, you will need to use the generated SQL file to do the import.


//You don't need to edit the rest of this file

$phpbb_tables['forums'] = $phpbb_db['tableprefix'] . 'forums';
$phpbb_tables['users'] = $phpbb_db['tableprefix'] . 'users';
$phpbb_tables['topics'] = $phpbb_db['tableprefix'] . 'topics';
$phpbb_tables['posts'] = $phpbb_db['tableprefix'] . 'posts';
$phpbb_tables['posts_text'] = $phpbb_db['tableprefix'] . 'posts_text';

$bbpress_tables['forums'] = $bbpress_db['tableprefix'] . 'forums';
$bbpress_tables['users'] = $bbpress_db['tableprefix'] . 'users';
$bbpress_tables['usermeta'] = $bbpress_db['tableprefix'] . 'usermeta';
$bbpress_tables['topics'] = $bbpress_db['tableprefix'] . 'topics';
$bbpress_tables['posts'] = $bbpress_db['tableprefix'] . 'posts';

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Import phpBB to bbPress</title>
<style>
  body{ font:normal 1em verdana, arial, "bitstream vera sans", helvetica, sans-serif; }
</style>
<div id="content">
<?php

//Connecting to the old forum database
@mysql_connect($phpbb_db['host'], $phpbb_db['username'], $phpbb_db['password']) or die("Oops! I can't connect to your phpBB database.<br>\nTake a look at what MySQL told me and try to solve it yourself:<br>\n<pre>" . mysql_error() . "</pre><br>\nSorry, but I can't do better...");

echo "Connected to phpBB database host.<br>\n"; flush();

@mysql_select_db($phpbb_db['database']) or die("Well, I can connect to the host, but cannot select the phpBB database you told me to. Have fun trying to figure out what happened:<br>\n<pre>" . mysql_error() . "</pre>");

echo "Selected phpBB database.<br><br>\n"; flush();

//First, let's import the forums data

$export_sql = "SELECT forum_id, forum_name, forum_desc, forum_order, forum_topics, forum_posts FROM " . $phpbb_tables['forums'];
$export_result = mysql_query($export_sql) or die("It seems like I can't retrieve the data from the phpBB forums table. The query used was:<br>\n<pre>" . $export_sql . "</pre><br>\n and the server threw the following error:<br>\n<pre>" . mysql_error() . "</pre>");

$import_sql = "#Exporting Forums data: \n";
while($export_row = mysql_fetch_object($export_result)){
  $import_sql .= "INSERT INTO " . $bbpress_tables['forums'] . " (forum_id, forum_name, forum_desc, forum_order, topics, posts) VALUES (" . $export_row->forum_id . ", '" . addslashes($export_row->forum_name) . "', '" . addslashes($export_row->forum_desc) . "', " . $export_row->forum_order . ", " . $export_row->forum_topics . ", " . $export_row->forum_posts . ");\n";
}

echo "Forums exported - OK.<br>\n"; flush();

//Now, to the users

$export_sql = "SELECT user_id, username, user_password, user_email, user_website, user_regdate FROM " . $phpbb_tables['users'];
$export_result = mysql_query($export_sql) or die("It seems like I can't retrieve the data from the phpBB users table. The query used was:<br>\n<pre>" . $export_sql . "</pre><br>\n and the server threw the following error:<br>\n<pre>" . mysql_error() . "</pre>");

$import_sql .= "#Exporting Users data: \n";
while($export_row = mysql_fetch_object($export_result)){
  $user_id = $export_row->user_id;
  //User ID = -1 seem to cause such a confusion. So we'll change it to a very big number
  if ($user_id == -1) $user_id = 999999998;
  $regdate = date("Y-m-d H:i:s", $export_row->user_regdate);
  $import_sql .= "INSERT INTO " . $bbpress_tables['users'] . " (ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_status, display_name) VALUES (" . $user_id . ", '" . $export_row->username . "', '" . $export_row->user_password . "', '', '" . $export_row->user_email . "', '" . $export_row->user_website . "', '$regdate', 0, '" . $export_row->username . "');\n";
}

echo "Users exported - OK.<br>\n"; flush();

//Users meta data
//Obs: All users imported will be flagged as "members"
//You can change this later from bbPress Admin Panel
//using your already registered admin user

$export_sql = "SELECT user_id, user_from, user_occ, user_interests FROM " . $phpbb_tables['users'];
$export_result = mysql_query($export_sql) or die("It seems like I can't retrieve the meta data from the phpBB users table. The query used was:<br>\n<pre>" . $export_sql . "</pre><br>\n and the server threw the following error:<br>\n<pre>" . mysql_error() . "</pre>");

$import_sql .= "#Exporting Users meta data: \n";
while($export_row = mysql_fetch_object($export_result)){
  $user_id = $export_row->user_id;
  //User ID = -1 seem to cause such a confusion. So we'll change it to a very big number
  if ($user_id == -1) $user_id = 999999998;
  //capabilities
  $import_sql .= "INSERT INTO " . $bbpress_tables['usermeta'] . "(user_id, meta_key, meta_value) VALUES (" . $user_id . ", 'bb_capabilities', 'a:1:{s:6:\"member\";b:1;}');\n";
  //From
  $import_sql .= "INSERT INTO " . $bbpress_tables['usermeta'] . "(user_id, meta_key, meta_value) VALUES (" . $user_id . ", 'from', '" . addslashes($export_row->user_from) . "');\n";
  //Occupation
  $import_sql .= "INSERT INTO " . $bbpress_tables['usermeta'] . "(user_id, meta_key, meta_value) VALUES (" . $user_id . ", 'occ', '" . addslashes($export_row->user_occ) . "');\n";
  //Interests
  $import_sql .= "INSERT INTO " . $bbpress_tables['usermeta'] . "(user_id, meta_key, meta_value) VALUES (" . $user_id . ", 'interest', '" . addslashes($export_row->user_interests) . "');\n";
}

echo "Users meta data exported - OK.<br>\n"; flush();

//Importing topics

$export_sql = "SELECT * FROM " . $phpbb_tables['topics'];
$export_result = mysql_query($export_sql) or die("It seems like I can't retrieve the data from the phpBB topics table. The query used was:<br>\n<pre>" . $export_sql . "</pre><br>\n and the server threw the following error:<br>\n<pre>" . mysql_error() . "</pre>");

$import_sql .= "#Exporting Topics: \n";
while($export_row = mysql_fetch_object($export_result)){
  $topic_poster_name = phpbb_username($export_row->topic_poster);
  $topic_last_poster = phpbb_post_user($export_row->topic_last_post_id);
  $topic_last_poster_name = phpbb_username($topic_last_poster);
  $topic_start_time = date("Y-m-d H:i:s", phpbb_post_time($export_row->topic_first_post_id));
  $topic_time = date("Y-m-d H:i:s", $export_row->topic_time);
  $import_sql .= "INSERT INTO " . $bbpress_tables['topics'] . " (topic_id, topic_title, topic_poster, topic_poster_name, topic_last_poster, topic_last_poster_name, topic_start_time, topic_time, forum_id, topic_status, topic_resolved, topic_open, topic_last_post_id, topic_sticky, topic_posts, tag_count) VALUES (
  " . $export_row->topic_id . ",
  '" . addslashes($export_row->topic_title) . "',
  " . $export_row->topic_poster . ",
  '" . $topic_poster_name . "',
  " . $topic_last_poster . ",
  '" . $topic_last_poster_name . "',
  '" . $topic_start_time . "',
  '" . $topic_time . "',
  " . $export_row->forum_id . ",
  0,
  'no',
  1,
  " . $export_row->topic_last_post_id . ",
  0,
  " . ($export_row->topic_replies + 1) . ", 0);\n";
}

echo "Topics exported - OK.<br>\n"; flush();

//Importing posts

$export_sql = "SELECT " . $phpbb_tables['posts'] . ".post_id AS post_id,
              " . $phpbb_tables['posts'] . ".forum_id AS forum_id,
              " . $phpbb_tables['posts'] . ".topic_id AS topic_id,
              " . $phpbb_tables['posts'] . ".poster_id AS poster_id,
              " . $phpbb_tables['posts'] . ".post_time AS post_time,
              " . $phpbb_tables['posts'] . ".poster_ip AS poster_ip,
              " . $phpbb_tables['posts_text'] . ".post_text AS post_text
              FROM " . $phpbb_tables['posts'] . ", " . $phpbb_tables['posts_text'] . 
              " WHERE " . $phpbb_tables['posts'] . ".post_id=" . $phpbb_tables['posts_text'] . ".post_id";
$export_result = mysql_query($export_sql) or die("It seems like I can't retrieve the data from the phpBB posts and posts_text table. The query used was:<br>\n<pre>" . $export_sql . "</pre><br>\n and the server threw the following error:<br>\n<pre>" . mysql_error() . "</pre>");

$import_sql .= "#Exporting Posts: \n";
while($export_row = mysql_fetch_object($export_result)){
  $post_time = date("Y-m-d H:i:s", $export_row->post_time);
  $import_sql .= "INSERT INTO " . $bbpress_tables['posts'] . " (post_id, forum_id, topic_id, poster_id, post_text, post_time, poster_ip, post_status, post_position) VALUES (
  " . $export_row->post_id . ",
  " . $export_row->forum_id . ",
  " . $export_row->topic_id . ",
  " . $export_row->poster_id . ",
  '" . addslashes($export_row->post_text) . "',
  '" . $post_time . "',
  '" . $export_row->poster_ip . "',
  0,
  1
  );\n";
}

echo "Posts exported - OK.<br><br>\n"; flush();

$sql_file = $_SERVER['DOCUMENT_ROOT'].$filename;

if ($save_to_file){
  if (file_put_contents($sql_file, utf8_encode($import_sql))){
    echo "The SQL queries were successfully written to the file: ".$sql_file."<br><br>\n"; flush();
  } else {
    echo "There was an error and the file could not be written. Please, check writing permissions."; flush();
  }
}

if ($do_import){
    @mysql_connect($bbpress_db['host'], $bbpress_db['username'], $bbpress_db['password']) or die("Oops! I can't connect to your bbpress database.<br>\nTake a look at what MySQL told me and try to solve it yourself:<br>\n<pre>" . mysql_error() . "</pre><br>\nSorry, but I can't do better...");

    @mysql_select_db($bbpress_db['database']) or die("Well, I can connect to the host, but cannot select the bbPress database you told me to. Have fun trying to figure out what happened:<br>\n<pre>" . mysql_error() . "</pre>");

  //Let's clean up the trash.
  //Your admin user will be given the biggest possible ID (I tried the biggest BIGINT but it didn't work inside bbPress)
  //If you have more than 999999999 users on your forum, you may have problems... ;-)
  @mysql_query ("UPDATE " . $bbpress_tables['users'] . " SET ID=999999999 WHERE ID=1");
  @mysql_query ("UPDATE " . $bbpress_tables['usermeta'] . " SET user_id=999999999 WHERE user_id=1");
  @mysql_query("TRUNCATE TABLE " . $bbpress_tables['forums']);
  @mysql_query("TRUNCATE TABLE " . $bbpress_tables['topics']);
  @mysql_query("TRUNCATE TABLE " . $bbpress_tables['posts']);

  //Now we'll break our SQL in an array of single INSERT instructions and will
  //apply them one by one.
  $import_sql = utf8_encode($import_sql);
  $import_sql_array = explode(";\n", $import_sql);

  echo "Starting the import...<br>\n"; flush();
  $ok = 0;
  $error = 0;
  foreach ($import_sql_array as $s){
    if (!@mysql_query($s)){
      echo "There was an error trying to execute the query:<br>\n<pre>$s</pre><br>\nMySQL threw the following error:<br>\n<pre>" . mysql_error() . "</pre>\n"; flush();
      $error++;
    } else {
      $ok++;
    }
  }
  echo "Import has finished.<br>\nStatistics:<br>\n$ok successful, $error errors"; flush();
}


function phpbb_username($id){
  global $phpbb_tables;
  $sql = "SELECT username FROM " . $phpbb_tables['users'] . " WHERE user_id=$id";
  $result = mysql_query($sql);
  if ($row = mysql_fetch_object($result)){
    return $row->username;
  } else {
    return false;
  }
}

function phpbb_post_user($post_id){
  global $phpbb_tables;
  $sql = "SELECT poster_id FROM " . $phpbb_tables['posts'] . " WHERE post_id=$post_id";
  $result = mysql_query($sql);
  if ($row = mysql_fetch_object($result)){
    return $row->poster_id;
  } else {
    return false;
  }
}

function phpbb_post_time($post_id){
  global $phpbb_tables;
  $sql = "SELECT post_time FROM " . $phpbb_tables['posts'] . " WHERE post_id=$post_id";
  $result = mysql_query($sql);
  if ($row = mysql_fetch_object($result)){
    return $row->post_time;
  } else {
    return false;
  }
}

?>
</div>