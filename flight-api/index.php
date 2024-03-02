<?php
require('config/init.php');

use app\models\base\Siswa;
use flight\net\Router;

$app = new \flight\Engine();

$app->group('/siswa', function (Router $router) {
    $router->post('/', function () {
        $data = Siswa::find()
            ->select(['nis', 'nama', "IF(kodejk = '1', 'L', 'P') as jeniskelamin", 'tgllahir', 'alamat', 'nokartu', 'pin', 'foto'])
            ->limit(10)
            ->asArray()
            ->all();

        $newdata = [];

        foreach ($data as $value) {
            $value['detail'] = fullurl() . "/siswa/" . $value['nis'];
            $newdata[] = $value;
        }

        return Flight::json($newdata);
    });

    $router->post('/@nis', function ($nis) {
        $data = Siswa::find()->where(['nis' => $nis])->asArray()->one();
        return Flight::json($data);
    });
});

$app->group('/presensi', function (Router $router) {
    $router->post('/masuk/@nis', function ($nis) {
        return Flight::json();
    });

    $router->post('/pulang/@nis', function ($nis) {
        return Flight::json();
    });

    $router->get('/jadwal/@tanggal', function ($tanggal) {
        return Flight::json();
    });
});

function fullurl()
{
    // Mendapatkan protokol (http atau https)
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    // Mendapatkan host
    $host = $_SERVER['HTTP_HOST'];
    // Mendapatkan path ke direktori PHP saat ini
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    // Menggabungkan semuanya menjadi URL lengkap
    $url = $protocol . '://' . $host . $uri; // . $_SERVER['REQUEST_URI']
    // Mengembalikan URL lengkap
    return $url;
}

Flight::start();
