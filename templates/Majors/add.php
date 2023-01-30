<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Major $major
 */
?>
<div class="row">
    <div class="column-responsive column-100">
        <div class="majors form content">
            <?=$this->Form->create($major)?>
            <fieldset>
                <legend><?=__('Add Major')?></legend>
                <?php
echo $this->Form->control('name');
?>
            </fieldset>
            <?=$this->Form->button(__('Submit'))?>
            <?=$this->Form->end()?>
        </div>
    </div>
</div>
