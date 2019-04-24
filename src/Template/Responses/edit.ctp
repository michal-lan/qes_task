<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Response $response
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $response->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $response->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Responses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="responses form large-9 medium-8 columns content">
    <?= $this->Form->create($response) ?>
    <fieldset>
        <legend><?= __('Edit Response') ?></legend>
        <?php
            echo $this->Form->control('status');
            echo $this->Form->control('message');
            echo $this->Form->control('x1');
            echo $this->Form->control('x2');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
