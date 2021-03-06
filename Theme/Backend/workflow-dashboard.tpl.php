<?php
/**
 * Orange Management
 *
 * PHP Version 8.0
 *
 * @package   Modules\Workflow
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

use Modules\Workflow\Models\WorkflowStatus;

/**
 * @var \phpOMS\Views\View $this
 */
$workflows = [];

echo $this->getData('nav')->render(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="portlet">
            <div class="portlet-head"><?= $this->getHtml('Workflow'); ?><i class="fa fa-download floatRight download btn"></i></div>
            <table class="default">
                <thead>
                <td><?= $this->getHtml('Status'); ?>
                <td><?= $this->getHtml('Next'); ?>
                <td class="full"><?= $this->getHtml('Title'); ?>
                <td><?= $this->getHtml('Creator'); ?>
                <td><?= $this->getHtml('Created'); ?>
                <tfoot>
                <tbody>
                <?php $c = 0;
                foreach ($workflows as $key => $workflow) : ++$c;

                $url   = \phpOMS\Uri\UriFactory::build('{/prefix}task/single?{?}&id=' . $workflow->getId());
                $color = 'darkred';

                if ($workflow->getStatus() === WorkflowStatus::DONE) { $color          = 'green'; }
                elseif ($workflow->getStatus() === WorkflowStatus::OPEN) { $color      = 'darkblue'; }
                elseif ($workflow->getStatus() === WorkflowStatus::WORKING) { $color   = 'purple'; }
                elseif ($workflow->getStatus() === WorkflowStatus::CANCELED) { $color  = 'red'; }
                elseif ($workflow->getStatus() === WorkflowStatus::SUSPENDED) { $color = 'yellow'; } ?>
                <tr>
                    <td data-label="<?= $this->getHtml('Status'); ?>"><a href="<?= $url; ?>"><span class="tag <?= $this->printHtml($color); ?>"><?= $this->getHtml('S' . $workflow->getStatus()); ?></span></a>
                    <td data-label="<?= $this->getHtml('Next'); ?>"><a href="<?= $url; ?>"><?= $this->printHtml($workflow->getDue()->format('Y-m-d H:i')); ?></a>
                    <td data-label="<?= $this->getHtml('Title'); ?>"><a href="<?= $url; ?>"><?= $this->printHtml($workflow->getTitle()); ?></a>
                    <td data-label="<?= $this->getHtml('Creator'); ?>"><a href="<?= $url; ?>"><?= $this->printHtml($workflow->createdBy->getId()); ?></a>
                    <td data-label="<?= $this->getHtml('Created'); ?>"><a href="<?= $url; ?>"><?= $this->printHtml($workflow->createdAt->format('Y-m-d H:i')); ?></a>
                        <?php endforeach; if ($c == 0) : ?>
                <tr><td colspan="6" class="empty"><?= $this->getHtml('Empty', '0', '0'); ?>
                        <?php endif; ?>
            </table>
        </div>
    </div>
</div>