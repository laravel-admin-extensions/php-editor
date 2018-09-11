<?php

namespace Encore\PHPEditor;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Illuminate\Support\ServiceProvider;

class PHPEditorServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(PHPEditor $extension)
    {
        if (! PHPEditor::boot()) {
            return ;
        }

        Admin::booting(function () {
            Form::extend('php', Editor::class);
        });
    }
}