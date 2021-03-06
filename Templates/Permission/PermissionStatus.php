<?php
/**
 * Orange Management
 *
 * PHP Version 8.0
 *
 * @package   Modules\Workflow\Templates\Permission
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

namespace Modules\Workflow\Templates\Permission;

use phpOMS\Stdlib\Base\Enum;

/**
 * Task status enum.
 *
 * @package Modules\Workflow\Templates\Permission
 * @license OMS License 1.0
 * @link    https://orange-management.org
 * @since   1.0.0
 */
abstract class PermissionStatus extends Enum
{
    public const PENDING = 1;

    public const APPROVED = 2;

    public const DISMISSED = 3;
}
