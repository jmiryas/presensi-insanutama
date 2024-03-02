<?php
/* 
 * masih ada bug jika didalam model yang dipanggil didalam model tersebut memanggil class lain yang 
 * class tersebut berada diluar app/models.
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

$basePath = dirname(__DIR__, 2); // jika file init dipindah pastikan basepath-nya disesuaikan juga

// load all vendor
require $basePath . '/vendor/autoload.php';

// load Yii2 bootstrap file
require($basePath . '/vendor/yiisoft/yii2/Yii.php');

// get application instance
$config = [
    'id' => 'flight-app',
    'basePath' => $basePath,
    'components' => [
        'db' => require $basePath . '/app/config/db.php'
    ],
];

new \yii\web\Application($config);

class Autoloader
{
    public static function register()
    {
        global $basePath;
        spl_autoload_register(function ($class) use ($basePath) {

            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class);

            // var_dump(substr($file, 0, 3));
            /* 
             * jika namespace class yang dipanggil memiliki awalan app maka akan dicari dengan metode required, 
             * selain itu abaikan karena kemungkinan class tersebut didapat dari vendor dan jika dari vendor, 
             * class tersebut sudah di required diatas.
             */
            if (substr($file, 0, 3) == 'app') {
                $file = $basePath . DIRECTORY_SEPARATOR . $file . '.php';
                // echo '<br>';
                // var_dump($file);
                // echo '<br>';
                // var_dump(file_exists($file));
                if (file_exists($file)) {
                    require $file;
                    return true;
                }
                return false;
            }
        });
    }
}
Autoloader::register();
