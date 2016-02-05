<?php
$space = $this->context->contentContainer;
?>
<div class="container space-layout-container">
    <div class="row">
        <div class="col-md-12">
            <?php echo humhub\modules\space\widgets\Header::widget(['space' => $space]); ?>
        </div>
    </div>
    <div class="row">
    	<!-- ---------------------------------------
		---- TEBPATCH (DEL) @fcasanellas 27/01/2016
        ---- #SPC001 Amagar informació no necessària
        ---- OLDCODE -------------------------------
        <div class="col-md-2 layout-nav-container">
            <?php //echo \humhub\modules\space\widgets\Menu::widget(['space' => $space]); ?>
            <?php //echo \humhub\modules\space\widgets\AdminMenu::widget(['space' => $space]); ?>
            <br/>
        </div>

        <?php //if (isset($this->context->hideSidebar) && $this->context->hideSidebar) : ?>
            <div class="col-md-10 layout-content-container">
                <?php //echo $content; ?>
            </div>
        <?php //else: ?>
            <div class="col-md-7 layout-content-container">
                <?php //echo $content; ?>
            </div>
            <div class="col-md-3 layout-sidebar-container">
                <?php
                //echo \humhub\modules\space\widgets\Sidebar::widget(['space' => $space, 'widgets' => [
                //        [\humhub\modules\activity\widgets\Stream::className(), ['streamAction' => '/space/space/stream', 'contentContainer' => $space], ['sortOrder' => 10]],
                //        [\humhub\modules\space\widgets\Members::className(), ['space' => $space], ['sortOrder' => 20]]
                //]]);
                ?>
            </div>
        <?php //endif; ?>
        ---- NEWCODE --------------------------- -->
        <?php if (isset($this->context->hideSidebar) && $this->context->hideSidebar) : ?>
            <div class="col-md-10 layout-content-container">
                <?php echo $content; ?>
            </div>
            <div class="col-md-2 layout-nav-container">
            <?php echo \humhub\modules\space\widgets\Menu::widget(['space' => $space]); ?>
            <?php echo \humhub\modules\space\widgets\AdminMenu::widget(['space' => $space]); ?>
            <br/>
        </div>
        <?php else: ?>
            <div class="col-md-9 layout-content-container">
                <?php echo $content; ?>
            </div>
            <div class="col-md-3 layout-sidebar-container">
            	<?php echo \humhub\modules\space\widgets\AdminMenu::widget(['space' => $space]); ?>
                <?php
                echo \humhub\modules\space\widgets\Sidebar::widget(['space' => $space, 'widgets' => [
                        [\humhub\modules\activity\widgets\Stream::className(), ['streamAction' => '/space/space/stream', 'contentContainer' => $space], ['sortOrder' => 10]],
                        [\humhub\modules\space\widgets\Members::className(), ['space' => $space], ['sortOrder' => 20]]
                ]]);
                ?>
            	<?php echo \humhub\modules\space\widgets\Menu::widget(['space' => $space]); ?>
            </div>
        <?php endif; ?>
        <!-- END TEBPATCH ---------------------- -->
    </div>
</div>
