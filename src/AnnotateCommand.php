<?php

namespace CyberDracula\ModelAnnotation;
use AnnotatingClass;

use DB;
use Illuminate\Console\Command;


class AnnotateCommand extends Command {
    protected $name = 'swagger:annotate-models';

    protected $description = 'swagger annotate models';

    public function __construct() {
        parent::__construct();
    }

    public function fire() {
        //find all models
        $path = app_path(env('SWAGGER_MODELS_FOLDER','Models')); //add SWAGGER_MODELS_FOLDER to .env if you whant to have a custom Models folder
        $modelsFiles = File::allFiles($path);
        print_r($modelsFiles);
        foreach ($modelsFiles as $modelFile) {
            print_r();
        }

        //old
        /*
        * foreach (DB::select('SHOW TABLES') as $table) {
        *   foreach (get_object_vars($table) as $table_name) {
        *       Annotation::annotateTable(app(), $table_name);
        *   }
        *}
        */
    }

    protected function getArguments() {
        return [];
    }

    protected function getOptions() {
        return [];
    }
}