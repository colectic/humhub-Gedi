<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo Yii::t('AdminModule.views_group_index', '<strong>Manage</strong> groups'); ?></div>
    <div class="panel-body">

        <p>
            <?php echo Yii::t('AdminModule.views_groups_index', 'You can split users into different groups (for teams, departments etc.) and define standard spaces and admins for them.'); ?>
        </p>

        <?php echo Html::a(Yii::t('AdminModule.views_groups_index', "Create new group"), Url::toRoute('edit'), array('class' => 'btn btn-primary')); ?>
        <br>


        <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'name',
                'description',
                [
                    'header' => 'Actions',
                    'class' => 'yii\grid\ActionColumn',
                    'options' => ['width' => '80px'],
                    'buttons' => [
                        'view' => function() {
                            return;
                        },
                        'delete' => function() {
                            return;
                        },
                        'update' => function($url, $model) {
                            return Html::a('<i class="fa fa-pencil"></i>', Url::toRoute(['edit', 'id' => $model->id]), ['class' => 'btn btn-primary btn-xs tt']);
                        },
                            ],
                        ],
                    ],
                ]);
                ?>           
    </div>
</div>
