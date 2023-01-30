<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Major $major
 */
?>
<div class="row">
    <div class="column-responsive column-100">
        <div class="majors view content">
            <h3><?=h($major->name)?></h3>
            <table>
                <tr>
                    <th><?=__('Name')?></th>
                    <td><?=h($major->name)?></td>
                </tr>
                <tr>
                    <th><?=__('Id')?></th>
                    <td><?=$this->Number->format($major->id)?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?=__('Related Students')?></h4>
                <?php if (!empty($major->students)): ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?=__('Id')?></th>
                            <th><?=__('Name')?></th>
                            <th><?=__('Major Id')?></th>
                            <th><?=__('Email')?></th>
                            <th><?=__('Phone')?></th>
                            <th class="actions"><?=__('Actions')?></th>
                        </tr>
                        <?php foreach ($major->students as $students): ?>
                        <tr>
                            <td><?=h($students->id)?></td>
                            <td><?=h($students->name)?></td>
                            <td><?=h($students->major_id)?></td>
                            <td><?=h($students->email)?></td>
                            <td><?=h($students->phone)?></td>
                            <td class="actions">
                                <?=$this->Html->link(__('View'), ['controller' => 'Students', 'action' => 'view', $students->id])?>
                                <?=$this->Html->link(__('Edit'), ['controller' => 'Students', 'action' => 'edit', $students->id])?>
                                <?=$this->Form->postLink(__('Delete'), ['controller' => 'Students', 'action' => 'delete', $students->id], ['confirm' => __('Are you sure you want to delete # {0}?', $students->id)])?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </table>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
