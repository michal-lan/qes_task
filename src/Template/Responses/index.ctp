<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Response[]|\Cake\Collection\CollectionInterface $responses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Response'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="responses index large-9 medium-8 columns content">
    <h3><?= __('Responses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                <th scope="col"><?= $this->Paginator->sort('x1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('x2') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($responses as $response): ?>
            <tr>
                <td><?= $this->Number->format($response->id) ?></td>
                <td><?= $this->Number->format($response->status) ?></td>
                <td><?= h($response->message) ?></td>
                <td><?= $this->Number->format($response->x1) ?></td>
                <td><?= $this->Number->format($response->x2) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $response->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $response->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $response->id], ['confirm' => __('Are you sure you want to delete # {0}?', $response->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
