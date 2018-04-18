prueba
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Magazine $magazine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Magazines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Notes'), ['controller' => 'Notes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Note'), ['controller' => 'Notes', 'action' => 'add']) ?></li>
    </ul>
</nav>

<div class="notes index large-9 medium-8 columns content">
    <h3><?= __('Notas disponibles') ?></h3>

<div class="table-responsive custom">
    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name',['label'=>'Titulo de la Nota']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('date',['label'=>'Publicada']) ?></th>
                <!--
                <th scope="col"><?= $this->Paginator->sort('bullets') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>

                -->
                <th scope="col"><?= $this->Paginator->sort('magazine_id',['label'=>'Revista']) ?></th>
                <th scope="col" class="actions"><?= __('Acción') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notes as $note): ?>
            <tr>
                <td><?= $this->Number->format($note->id) ?></td>
                <td><?=  $this->Html->link($note->name, ['action' => 'view', $note->id]) ?></td>
                <td><?= h($note->date) ?></td>
                <!--
                <td><?= h($note->bullets) ?></td>
                <td><?= h($note->created) ?></td>
                <td><?= h($note->modified) ?></td>

                -->
                <td><?= $note->has('magazine') ? $this->Html->link($note->magazine->id, ['controller' => 'Magazines', 'action' => 'view', $note->magazine->id]) : '' ?></td>
                <td class="actions">
                    <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $note->id]) ?> -->
                    <?= $this->Html->link('<i class="fa fa-pencil mr-2"></i>', ['action' => 'edit', $note->id], ['escape' => false,
                        'title' => 'Editar']) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash fa-lg"></i> ', ['action' => 'delete', $note->id], ['escape' => false,
                        'title' => 'Eliminar', 'confirm' => __('Are you sure you want to delete # {0}?', $note->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
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


<div class="magazines form large-9 medium-8 columns content">
    <?= $this->Form->create($magazine) ?>
    <fieldset>
        <legend class="mb-4"><?= __('Crear revista') ?></legend>
        <?php
            //debug($lastmag->toarray());
            if(is_null($lastmag->numero)){ $mag = 1; } else { $mag =  $lastmag->numero + 1 ; }
            echo $this->Form->control('numero',['disabled'=>'true', 'value'=> $mag ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
