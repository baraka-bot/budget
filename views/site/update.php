<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'budget Management System';
?>
<div class="site-index">

<h2>UPDATE THE POST</h2>

    
    <div class="body-content">
     <?php $form=ActiveForm::begin()?> 
        <div class="row">
          <div class="form-group">
            <div class="col-lg-6">
               <?= $form->field($post,'title');?>
            </div>
        </div>
     </div>
     
     <div class="row">
          <div class="form-group">
            <div class="col-lg-6">
               <?= $form->field($post,'description')->textarea(['rows'=>'6']);?>
            </div>
        </div>
     </div>

     <div class="row">
          <div class="form-group">
            <div class="col-lg-6">
               <?php $items=['shinyanga'=>'shinyanga','morogoro'=>'morogoro','arusha'=>'arusha'];?>
               <?= $form->field($post,'category')->dropDownList($items,['prompt'=>'select']);?>
            </div>
        </div>
     </div>

     <div class="row">
          <div class="form-group">
            <div class="col-lg-6">
              <div class="col-lg-3">
               <?= Html::submitButton('Update Post',['class'=>'btn btn-primary']);?>
             </div>
           <div class="col-lg-3">
           <span style="margin-bottom:20px;"><?= Html::a('Go Back',['/site/index'],['class'=>'btn btn-primary'])?></span>
            <!-- <a href=<?php echo yii::$app->homeUrl;?>class="btn btn-primary">Go Back</a> -->
         </div>
        </div>
     </div>

<?php ActiveForm::end()?>
    </div>
</div>
