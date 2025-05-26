<?php
$aws_key = getenv('AWS_ACCESS_KEY_ID') ?: '';
$aws_secret = getenv('AWS_SECRET_ACCESS_KEY') ?: '';
$rds_dbname = getenv('RDS_DB_NAME') ?: '';
$rds_host = getenv('RDS_HOST') ?: '';
$rds_user = getenv('RDS_USERNAME') ?: '';
$rds_pass = getenv('RDS_PASSWORD') ?: '';
$CONFIG = array (
  'htaccess.RewriteBase' => '/',
  'memcache.local' => '\\OC\\Memcache\\APCu',
  'apps_paths' =>
  array (
    0 =>
    array (
      'path' => '/var/www/html/apps',
      'url' => '/apps',
      'writable' => false,
    ),
    1 =>
    array (
      'path' => '/var/www/html/custom_apps',
      'url' => '/custom_apps',
      'writable' => true,
    ),
  ),
  'upgrade.disable-web' => true,
  'instanceid' => 'ocjd64elhhxn',
  'passwordsalt' => 'PvD4j/1CHp+fbBCBlOSbEMAQSnFVNY',
  'secret' => 'McmcKMELb7b3LoAM5Y+PXjEiGGQZmyuu+OvqurfQQYCVhA0q',
  'trusted_domains' =>
  array (
          0 => 'localhost',
          1 => 'test.5585in.click',
          2 => '10.0.0.1',
          3 => '10.0.0.11',
          4 => '10.0.0.21',
          5 => '10.0.0.31',
          6 => '10.0.0.41',
  ), # IP

  'objectstore' => [
    'class' => '\\OC\\Files\\ObjectStore\\S3',
    'arguments' => [
      'bucket' => 'next-test-5585', # S3 Bucket name
      'autocreate' => true,
      'key'    => $aws_key,
      'secret' => $aws_secret,
      'region' => 'ap-northeast-2',
      'use_ssl' => true,
      'use_path_style' => false,
      'hostname' => 's3.ap-northeast-2.amazonaws.com',
      'port' => 443,
      'objectPrefix' => '',
      'uploadACL' => 'private',
    ],
  ],

  'datadirectory' => '/var/www/html/data',
  'dbtype' => 'mysql',
  'version' => '31.0.5.1',
  'overwrite.cli.url' => 'http://test.5585in.click', 
  'dbname' => $rds_dbname,
  'dbhost' => $rds_host, # RDS
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'mysql.utf8mb4' => true,
  'dbuser' => $rds_user, # RDS ID
  'dbpassword' => $rds_pass, # RDS PASSWD
  'installed' => true,
  'overwriteprotocol' => 'http',
  'overwritehost' => 'test.5585in.click',
);
