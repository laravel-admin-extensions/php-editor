<?php

namespace Encore\PHPEditor;

use Encore\Admin\Form\Field;
use Jxlwqq\CodeMirror\CodeMirror;

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
        CodeMirror::ASSETS_PATH.'lib/codemirror.css',
    ];

    /**
     * {@inheritdoc}
     */
    protected static $js = [
        CodeMirror::ASSETS_PATH.'lib/codemirror.js',
        // x-httpd-php mode
        CodeMirror::ASSETS_PATH.'mode/htmlmixed/htmlmixed.js',
        CodeMirror::ASSETS_PATH.'mode/xml/xml.js',
        CodeMirror::ASSETS_PATH.'mode/javascript/javascript.js',
        CodeMirror::ASSETS_PATH.'mode/css/css.js',
        CodeMirror::ASSETS_PATH.'mode/clike/clike.js',
        CodeMirror::ASSETS_PATH.'mode/php/php.js',
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