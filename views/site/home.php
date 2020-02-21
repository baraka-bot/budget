<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'budget Management System';
?>
<div class="site-index">
<?php if(yii::$app->session->hasFlash('message')):?>
  <div class="alert alert-dismissible alert-success">  
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo yii::$app->session->getFlash('message');?>
</div>

<?php endif;?>
    <div class="jumbotron">
        <h2>BUDGET MANAGEMENT SYSTEM</h2>
      </div>

<div class="row">   
<span style="margin-bottom:20px;"><?= Html::a('Create',['/site/create'],['class'=>'btn btn-primary'])?></span>
</div> 

<div class="body-content">

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">DESCRIPTION</th>
      <th scope="col">CATEGORY</th>
      <th scope="col">TITLE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  <?php if(count($budget)> 0): ?>
  <?php foreach($budget as $post):?>
  
    <tr class="table-active">
      
      <th scope="row"><?php echo $post->id;?></th>
      <td><?php echo $post->description;?></td>
      <td><?php echo $post->category;?></td>
      <td><?php echo $post->title;?></td>
      </th>
      
      <td> 
      <span><?= Html::a('View',['view','id'=>$post->id],['class'=>'label label-primary']) ?></span>
      <span><?= Html::a('Delete',['delete','id'=>$post->id],['class'=>'label label-success']) ?></span>
      <span><?= Html::a('Update',['update','id'=>$post->id],['class'=>'label label-danger']) ?></span>
      </td>
    </tr>
  <?php endforeach;?>
  <?php else: ?>
<tr>
<td>No table data Found</td>
</tr>
<?php  endif;?>
  </tbody>
</table> 

    </div>

    <div class="body-content">

        <div class="row">
        
        </div>

    </div>
</div>
