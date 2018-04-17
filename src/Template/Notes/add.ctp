<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Note $note
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Notes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Magazines'), ['controller' => 'Magazines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Magazine'), ['controller' => 'Magazines', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notes form large-9 medium-8 columns content">
    <?= $this->Form->create($note) ?>
    <fieldset>
        <legend class="mb-4"><?= __('Agregar nota') ?></legend>

        <label for="date">Fecha de la Nota</label>
        <input name="date" type='text' class='form-control datepicker-here' data-language='en' data-timepicker="false" data-date-format="yyyy-m-d" />

        <?php
            echo $this->Form->control('name',['label'=>'Título de la nota', 'class'=>'form-control']);
            echo $this->Form->control('subtitle',['label'=>'Subtítulo de la nota', 'class'=>'form-control']);
         ?>


         <?php
            //echo $this->Form->control('date', ['empty' => true]);
            echo $this->Form->control('bullets',['label'=>'Puntos a resaltar', 'class'=>'form-control']);
            echo $this->Form->control('content',['label'=>'Contenido', 'class'=>'form-control']);
           // echo $this->Form->control('magazine_id', ['options' => $magazines, 'empty' => true]);
            echo $this->Form->control('img',['type'=>'file', 'label'=>'Anexar Fotografías y/o documentos<br><em class="text-muted text-capitalize">Sólo imágenes menores a 4MB</em>', 'class'=>'form-control-file', 'escape'=>false, 'multiple' => 'true']);
        ?>

    </fieldset>


    <?= $this->Form->button(__('Guardar Nota')) ?>
    <?= $this->Form->end() ?>
</div>

  <script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script>