<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yeesoft\redirect;

use Yii;
use yii\base\Action;
use yeesoft\redirect\models\Redirect;

/**
 * RedirectAction redirects users using link settings.
 *
 * To use RedirectAction, you need to declare an action of RedirectAction
 * type in the `actions()` method of your `SiteController`
 * class (or whatever controller you prefer), like the following:
 *
 * ```php
 * public function actions()
 * {
 *     return [
 *         'redirect' => ['class' => 'yeesoft\redirect\RedirectAction'],
 *     ];
 * }
 * ```
 * 
 * After that you need to add rules:
 * 
 * ```php
 * 'rules' => [
 *     '<action:(redirect)>/<slug:[\w \-]+>' => 'site/redirect',
 * ]
 * ```
 */
class RedirectAction extends Action
{

    /**
     * Default redirect status code.
     * 
     * @var integer 
     */
    public $defaultStatusCode = 302;

    /**
     * Runs the action
     *
     * @return string result content
     */
    public function run($slug)
    {
        if ($redirect = Redirect::findOne(['slug' => $slug])) {
            $statusCode = (empty($redirect->status_code)) ? $this->defaultStatusCode : $redirect->status_code;
            return Yii::$app->getResponse()->redirect($redirect->url, $statusCode);
        } else {
            throw new \yii\web\NotFoundHttpException('Page not found.');
        }
    }

}
