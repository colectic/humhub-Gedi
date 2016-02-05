<?php

use yii\helpers\Url;
?>

<div class="container">

    <div class="row">
        <div class="col-md-2">
            <!-- show directory menu widget -->
            <div class="panel panel-default">
                <div
                    class="panel-heading"><?php echo Yii::t('DirectoryModule.views_directory_layout', '<strong>Directory</strong> menu'); ?></div>

                <div class="list-group">
                    <?php
                    /*********************************************
                     * TEBPATCH (DEL) @fcasanellas 27/01/2016
                     * #DIR001 Amagar informació no necessària
                     * OLDCODE ***********************************
                    if (humhub\modules\user\models\Group::find()->count() > 1) : ?>
                        <a href="<?php echo Url::to(['/directory/directory/groups']); ?>"
                           class="list-group-item <?php
                           if ($this->context->action->id == "groups") {
                               echo "active";
                           }
                           ?>">
                            <div>
                                <div class="edit_group"><?php echo Yii::t('DirectoryModule.views_directory_layout', 'Groups'); ?></div>
                            </div>
                        </a>
                    <?php endif; 
                    *********************************************
                    * END TEBPATCH *****************************/ ?>

                    <a href="<?php echo Url::to(['/directory/directory/members']); ?>"
                       class="list-group-item <?php
                       if ($this->context->action->id == "members") {
                           echo "active";
                       }
                       ?>">
                        <div>
                            <div class="user_details"><?php echo Yii::t('DirectoryModule.views_directory_layout', 'Members'); ?></div>
                        </div>
                    </a>

                    <a href="<?php echo Url::to(['/directory/directory/spaces']); ?>"
                       class="list-group-item <?php
                       if ($this->context->action->id == "spaces") {
                           echo "active";
                       }
                       ?>">
                        <div>
                            <div class="workspaces"><?php echo Yii::t('DirectoryModule.views_directory_layout', 'Spaces'); ?></div>
                        </div>
                    </a>

					<!-- ---------------------------------------
					---- TEBPATCH (DEL) @fcasanellas 27/01/2016
                    ---- #DIR001 Amagar informació no necessària
                    ---- OLDCODE -------------------------------
                    <a href="<?php echo Url::to(['/directory/directory/user-posts']); ?>"
                       class="list-group-item <?php
                       if ($this->context->action->id == "user-posts") {
                           echo "active";
                       }
                       ?>">
                        <div>
                            <div
                                class="stream"><?php echo Yii::t('DirectoryModule.views_directory_layout', 'User profile posts'); ?></div>
                        </div>
                    </a>
                    ---- END TEBPATCH ---------------------- -->
                </div>
            </div>
        </div>
        <!-- ---------------------------------------
		---- TEBPATCH (DEL) @fcasanellas 27/01/2016
        ---- #DIR001 Amagar informació no necessària
        ---- OLDCODE -------------------------------
        <div class="col-md-7">
            <?php //echo $content; ?>
        </div>
        <div class="col-md-3">
            <?php //echo \humhub\modules\directory\widgets\Sidebar::widget(); ?>
        </div>
        ---- NEWCODE --------------------------- -->
        <div class="col-md-10">
            <?php echo $content; ?>
        </div>
        <!-- END TEBPATCH ---------------------- -->
    </div>

</div>
