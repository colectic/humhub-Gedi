<?php

use yii\helpers\Html;

echo Html::a(Yii::t('SpaceModule.widgets_views_inviteButton', 'Invite'), $space->createUrl('/space/membership/invite'), array('class' => 'btn btn-primary', 'data-target' => '#globalModal'));
