<?php
namespace install\models;

use Yii;
use yii\base\Model;
define('ROOT_PATH',dirname(__FILE__).'/../');
class CheckEnv extends Model
{

  //public function __construct(){}
    public function checkPHP()
  {
    if(version_compare('5.4',PHP_VERSION,'>'))
    {
      return false;
    }
    else
    {
      return true;
    }
  }

  //check the MySQL version
  /*public function checkMySQL()
  {
    if(){}
  }
  public MysqlVersion()
  {
    return mysql_get_server_info();
  }*/
  public function  getOS()
  {
    return  PHP_OS;
  }
  public function getFreeSpace()
  {
    return floor(disk_free_space(ROOT_PATH)/(1024*1024)).'M';
  }
}
?>
