<?php

namespace yeesoft\redirect\controllers;

use yeesoft\controllers\CrudController;

/**
 * Controller implements the CRUD actions for Redirect model.
 */
class DefaultController extends CrudController
{
    public $modelClass = 'yeesoft\redirect\models\Redirect';
    public $modelSearchClass = 'yeesoft\redirect\models\RedirectSearch';

    protected function getRedirectPage($action, $model = null)
    {
        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }
}