<?php

use App\Entity\Feedback\Feedback;
use BabDev\Breadcrumbs\Contracts\BreadcrumbsGenerator  as Crumbs;
use BabDev\Breadcrumbs\Contracts\BreadcrumbsManager;


/**
 * feedback
 */
Breadcrumbs::register('admin.feedback.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(__('feedback.title'), route('admin.feedback.index'));
});

Breadcrumbs::register('admin.feedback.edit', function (Crumbs $crumbs, Feedback $feedback) {
    $crumbs->parent('admin.feedback.index');
    $crumbs->push(__('admin.actions.edit'), route('admin.feedback.edit', ['id' => $feedback->id]));
});