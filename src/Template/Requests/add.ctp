<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>

<div class="requests form large-12 columns content">
    <?= $this->Form->create($request, [ 'novalidate' => true, 'id' => 'qesolver_form' ]); ?>
    <?php
        echo $this->Form->control('a', ['label' => false, 'placeholder' => 'a']) . 'x<sup>2</sup> + ';
        echo $this->Form->control('b', ['label' => false, 'placeholder' => 'b']) . 'x + ';
        echo $this->Form->control('c', ['label' => false, 'placeholder' => 'c']);
		echo $this->Form->hidden('token', ['value' => sha1("a"."b"."c") ]);
    ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'qesolver_form_submit']) ?>
    <?= $this->Form->end() ?>

	<fieldset style="margin-top: 100px;">
		<legend>Result</legend>
		<textarea id="result" rows="5"></textarea>
	</fieldset>
</div>
