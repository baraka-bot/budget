<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'budget Management System';
?>
<div class="site-index">

<h2>VIEW THE POST</h2>

    
    <div class="body-content">
    <ul class="list-group">
                
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $post->title;?>
                </li>
                
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $post->description;?> 
                </li>
                
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $post->category;?>
                </li>
   </ul>
   <div class="row"><span style="margin-bottom:20px;"><?= Html::a('Go Back',['/site/index'],['class'=>'btn btn-primary'])?></span></div>
    </div>
 </div>
