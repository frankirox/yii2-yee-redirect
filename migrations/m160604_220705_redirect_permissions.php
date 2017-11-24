<?php

use yeesoft\db\PermissionsMigration;

class m160604_220705_redirect_permissions extends PermissionsMigration
{

    public function safeUp()
    {
        $this->addPermissionsGroup('redirect-management', 'Redirect Management');

        $this->addModel('redirect', 'Redirect', yeesoft\redirect\models\Redirect::class);

        parent::safeUp();
    }

    public function safeDown()
    {
        parent::safeDown();
        $this->deletePermissionsGroup('redirect-management');
    }

    public function getPermissions()
    {
        return [
            'redirect-management' => [
                'view-redirects' => [
                    'title' => 'View Pages',
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'redirect/default', 'action' => 'index'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'redirect/default', 'action' => 'view'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'redirect/default', 'action' => 'grid-sort'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'redirect/default', 'action' => 'grid-page-size'],
                    ],
                ],
                'update-redirects' => [
                    'title' => 'Update Redirects',
                    'child' => ['view-redirects'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'redirect/default', 'action' => 'update'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'redirect/default', 'action' => 'bulk-activate'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'redirect/default', 'action' => 'bulk-deactivate'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'redirect/default', 'action' => 'toggle-attribute'],
                    ],
                ],
                'create-redirects' => [
                    'title' => 'Create Redirects',
                    'child' => ['view-redirects'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'redirect/default', 'action' => 'create'],
                    ],
                ],
                'delete-redirects' => [
                    'title' => 'Delete Redirects',
                    'child' => ['view-redirects'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'redirect/default', 'action' => 'delete'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'redirect/default', 'action' => 'bulk-delete'],
                    ],
                ],
            ],
        ];
    }

}
