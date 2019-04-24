<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Request'), ['action' => 'edit', $request->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Request'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requests view large-9 medium-8 columns content">
    <h3><?= h($request->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Token') ?></th>
            <td><?= h($request->token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($request->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('A') ?></th>
            <td><?= $this->Number->format($request->a) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('B') ?></th>
            <td><?= $this->Number->format($request->b) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('C') ?></th>
            <td><?= $this->Number->format($request->c) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Queries') ?></th>
            <td><?= $this->Number->format($request->queries) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Response Id') ?></th>
            <td><?= $this->Number->format($request->response_id) ?></td>
        </tr>
    </table>
</div>
