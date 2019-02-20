<?php
namespace CyberDracula\SwaggerModelAnnotation;
use AnnotatingClass;

use DB;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Model;


class AnnotateCommand extends Command {

    protected $name = 'swagger:annotate-models';

    protected $description = 'swagger annotate models';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        //find all models
        $modelFolder = env('SWAGGER_MODELS_FOLDER','App\Models');//add SWAGGER_MODELS_FOLDER to .env if you whant to have a custom Models
        $path = base_path($modelFolder);
        $fs = new Filesystem;
        $modelsFiles = $fs->allFiles($path);
        foreach ($modelsFiles as $modelFile) {

            $model = $modelFile->getFilename();
            require($modelFile->getPathname());
            foreach (get_declared_classes() as $class) {

                if(strpos($class,$modelFolder) !== false) {
                    $c = new $class;
                    echo $table = $c->getTable();
                    if ($c instanceof Model) {
                        // it is a model
                       // print_r($c);
                    }
                }
            }

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
