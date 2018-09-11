<?php

namespace Encore\PHPEditor;

use Encore\Admin\Form\Field;

class Editor extends Field
{
    /**
     * {@inheritdoc}
     */
    protected $view = 'laravel-admin-code-mirror::editor';

    /**
     * {@inheritdoc}
     */
    protected static $css = [
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/lib/codemirror.css',
    ];

    /**
     * {@inheritdoc}
     */
    protected static $js = [
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/lib/codemirror.js',
        // x-httpd-php mode
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/htmlmixed/htmlmixed.js',
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/xml/xml.js',
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/javascript/javascript.js',
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/css/css.js',
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/clike/clike.js',
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/php/php.js',
    ];

    /**
     * Set editor height.
     *
     * @param int $height
     * @return $this
     */
    public function height($height = 10)
    {
        return $this->addVariables(compact('height'));
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        $options = array_merge(
            [
                'mode' => 'application/x-httpd-php',
                'lineNumbers' => true,
                'matchBrackets' => true,
                'indentUnit' => 4,
                'indentWithTabs' => true,
            ],
            PHPEditor::config('config', [])
        );

        $options = json_encode($options);

        $this->script = <<<EOT
CodeMirror.fromTextArea(document.getElementById("{$this->id}"), $options);
EOT;

        return parent::render();
    }
}