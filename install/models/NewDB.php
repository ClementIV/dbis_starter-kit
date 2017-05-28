<?
namespace install\models;

use Yii;
use yii\base\Model;
class NewDB extends Model
{
  public $deleteOldDatebase;
  public $Overwrite;
  public function rules()
  {
    return [
      [['Overwrite','deleteOldDatebase'],'required'],
    ];
  }
  public function attributeLabels()
  {
        return [
            'deleteOldDatebase' => 'Delete Old Datebase!',
             'Overwrite'=>'Overwrite The Original Data!'
        ];
  }
}
?>
