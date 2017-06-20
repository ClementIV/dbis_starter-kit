<?
namespace install\models;

use Yii;
use yii\base\Model;
use yii\db\Connection;
use yii\web\ErrorAction;
use yii\base\Exception;

class CreateDatabase extends Model
{
  public $dbserver;
  public $dbname;
  public $user;
  public $password;
  public $prefix;
 public $Overwrite;
  public $conn;
  public function rules()
  {
    return[
        [['dbserver','user','password','Overwrite','dbname','prefix'],'required'],
        'password'=>[['password'],'string','max'=>60],
    ];
  }
  //check userName  and  passwprd
  // @return  true when Connecting success
  //@ return false and Exception when defeat
  public function checkConnect()
  {
    //echo $this->Old;
    try{
      $this->conn=new Connection(['dsn'=>'mysql:host='.$this->dbserver,'username'=>$this->user,'password'=>$this->password,'charset' => 'utf8']);
      $this->conn->open();
      $this->conn->close();
      return ['1'=>true];
    }
    catch (Exception $e)
    {
      return ['1'=>false,'2'=>$e->getName()];
    }
  }
  /*
  * create a new db of overwrite a db
  */
  public function CreateDB()
  {
     $this->conn=new Connection(['dsn'=>'mysql:host='.$this->dbserver,'username'=>$this->user,'password'=>$this->password,'charset' => 'utf8',]);
     $this->conn->open();

     try {
       //overwirte or create a new db
        if($this->Overwrite==1)
        {
            $this->conn->createCommand('DROP DATABASE IF  EXISTS '.$this->dbname.';')->execute();
            $this->conn->createCommand('CREATE DATABASE IF NOT EXISTS '.$this->dbname.' DEFAULT CHARACTER SET "utf8"'.';')->execute();
        }
        else{
          $this->conn->createCommand('CREATE DATABASE IF NOT EXISTS '.$this->dbname.' DEFAULT CHARACTER SET "utf8"'.';')->execute();
      }
    }
      catch(Exception $e)
      {
      //$this->conn->close();
      //  print_r($e);
        return ['1'=>false,'2'=>$e,];
      };
      $this->conn->close();
      return ['1'=>true,];
  }
  //import all  data into database
  //
  public function importData()
  {
    set_time_limit(0);
    $_sql=file_get_contents(dirname(__FILE__).'/../data/install.sql');
    $_array=explode('-- --------------------------------------------------------',$_sql);
    $_array=str_replace('dbis_',$this->prefix,$_array);
    $this->conn=new Connection(['dsn'=>'mysql:host='.$this->dbserver.'; dbname='.$this->dbname,'username'=>$this->user,'password'=>$this->password,'charset' => 'utf8',]);
    $this->conn->open();
    foreach($_array as $_data)  {

      $this->conn->createCommand(''.$_data)->execute();
    }

  //  $this->conn->close();
    return true;
  }
  //change the whole db config
  public function ChangeConfig()
  {
    $filePath=dirname(__FILE__)."./../../common/newDB.php";
    $string='<?
        putenv("DB_DSN = mysql:host='.$this->dbserver.';port=3306;dbname='.$this->dbname.'");
        putenv("DB_USERNAME ='.$this->user.'");
        putenv("DB_PASSWORD = '.$this->password.'");
        putenv("DB_TABLE_PREFIX ='.$this->prefix.'");
    ';
    file_put_contents($filePath,$string);
  }
  public function attributeLabels()
  {
        return [
            //'' => 'Delete Old Datebase!',
              'dbserver'=>'Datebase Server',
              'user'=>'User Name',
              'password'=>'Password',
              'dbname'=>'Database Name',
              'prefix'=>'Table Prefix',
             'Overwrite'=>'Delete The Original Data?'
        ];
  }
}
?>
