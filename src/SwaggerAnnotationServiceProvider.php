<?php
namespace CyberDracula\SwaggerModelAnnotation;

use Illuminate\Support\ServiceProvider;
use Log;

class SwaggerAnnotationServiceProvider extends ServiceProvider {
    protected $commands = [
        'CyberDracula\SwaggerModelAnnotation\AnnotateCommand'
    ];

    public function register() {
        $this->commands($this->commands);
    }
}