<?php

namespace app\widgets;

use yii\base\Widget;

class Htmla extends Widget
{
    public $url;
    public $options = [];
    public $htmlclass = 'yii\helpers\Html';

    public function init()
    {
        parent::init();
        ob_start();
    }

    public function run()
    {
        $content = ob_get_clean();
        $buttonContent = $this->htmlclass::a($content, $this->url, array_merge(['class' => 'btn btn-success-old'], $this->options));
        return $buttonContent;
    }

    public static function begin($config = [])
    {
        $className = isset($config['class']) ? $config['class'] : static::className();
        unset($config['class']);
        ob_start();
        return parent::begin($config);
    }

    public static function end()
    {
        return parent::end();
    }
}


// <?php Htmla::begin([
//     'url' => ['presensi-siswa-data/masuk'],
//     'htmlclass' => 'app\modules\UserManagement\components\GhostHtml',
//     'options' => ['style' => "width: calc(130px);"]
// ]); 
?>
// <div class="d-flex flex-column justify-content-center">
    // <img src="img/card-tap-in.png" style="width: calc(130px - (1.75rem));">
    // <i class="dropdown-divider"></i>
    // <span>Presensi Masuk</span>
    // </div>
// <?php //Htmla::end(); 
    ?>

// <?php// Htmla::begin([
//     'url' => ['presensi-siswa-data/pulang'],
//     'htmlclass' => 'app\modules\UserManagement\components\GhostHtml',
//     'options' => ['style' => "width: calc(130px);"]
// ]); ?>
// <div class="d-flex flex-column justify-content-center">
    // <img src="img/card-tap-out.png" style="width: calc(130px - (1.75rem));">
    // <i class="dropdown-divider"></i>
    // <span>Presensi Pulang</span>
    // </div>
// <?php // Htmla::end(); 
    ?>