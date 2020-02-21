<?php
namespace app\models;

use yii\db\ActiveRecord;

class budget extends ActiveRecord{
    private $title;
    private $description;
    private $category;
  
    public function rules(){
        return[
            [['title','description','category'],'required']
            
        ];
    }
}
?>