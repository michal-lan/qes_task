<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Response $response
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Response'), ['action' => 'edit', $response->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Response'), ['action' => 'delete', $response->id], ['confirm' => __('Are you sure you want to delete # {0}?', $response->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Responses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Response'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="responses view large-9 medium-8 columns content">
    <h3><?= h($response->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= h($response->message) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($response->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($response->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('X1') ?></th>
            <td><?= $this->Number->format($response->x1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('X2') ?></th>
            <td><?= $this->Number->format($response->x2) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Requests') ?></h4>
        <?php if (!empty($response->requests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Token') ?></th>
                <th scope="col"><?= __('A') ?></th>
                <th scope="col"><?= __('B') ?></th>
                <th scope="col"><?= __('C') ?></th>
                <th scope="col"><?= __('Queries') ?></th>
                <th scope="col"><?= __('Response Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($response->requests as $requests): ?>
            <tr>
                <td><?= h($requests->id) ?></td>
                <td><?= h($requests->token) ?></td>
                <td><?= h($requests->a) ?></td>
                <td><?= h($requests->b) ?></td>
                <td><?= h($requests->c) ?></td>
                <td><?= h($requests->queries) ?></td>
                <td><?= h($requests->response_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Requests', 'action' => 'view', $requests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Requests', 'action' => 'edit', $requests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requests', 'action' => 'delete', $requests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
