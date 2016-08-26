<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\models\User;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/**
 * @var View $this
 * @var User $user
 */

$this->title = Yii::t('user', 'Create a user account');
?>

<section class="content-header">
    <h1><?= Html::encode($this->title) ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?= Yii::$app->homeUrl; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= Url::to(['/user/admin/index']); ?>"> Users</a></li>
        <li class="active"><?= Html::encode($this->title); ?></li>
    </ol>
</section>

<section class="content">
    <?= $this->render('@dektrium/user/views/_alert', [
        'module' => Yii::$app->getModule('user'),
    ]) ?>

    <?= $this->render('@dektrium/user/views/admin/_menu') ?>

    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?= Nav::widget([
                        'options' => [
                            'class' => 'nav-pills nav-stacked'
                        ],
                        'items' => [
                            ['label' => Yii::t('user', 'Account details'), 'url' => ['/user/admin/create']],
                            ['label' => Yii::t('user', 'Profile details'), 'options' => [
                                'class' => 'disabled',
                                'onclick' => 'return false;'
                            ]],
                            ['label' => Yii::t('user', 'Information'), 'options' => [
                                'class' => 'disabled',
                                'onclick' => 'return false;'
                            ]],
                        ]
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="alert alert-info">
                        <?= Yii::t('user', 'Credentials will be sent to the user by email') ?>.
                        <?= Yii::t('user', 'A password will be generated automatically if not provided') ?>.
                    </div>
                    <?php $form = ActiveForm::begin([
                        'layout' => 'horizontal',
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => false,
                        'fieldConfig' => [
                            'horizontalCssClasses' => [
                                'wrapper' => 'col-sm-9',
                            ]
                        ],
                    ]); ?>

                    <?= $this->render('_user', ['form' => $form, 'user' => $user]) ?>

                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>