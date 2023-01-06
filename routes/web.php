<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('getList', [ExampleController::class, 'getList']);
//Route::get('{version}/getList', 'v1\ExampleController@getList');

//方式1：动态处理版本控制
//v1/getList
/*Route::group(['prefix' => '{version}'], function () {
    Route::get('getList', function ($version = null) {
        $class = 'App\Http\Controllers\\' . $version . '\ExampleController';
        if (class_exists($class)) {
            return app()->call([app()->make($class), 'getList']);
        }
        return  abort(404);
    });
});*/

//方式2：动态处理版本控制
$versionMap = ['v1', 'v2'];
$routeMap = [
    ['method' => 'GET', 'uri' => 'getList', 'action' => 'ExampleController@getList']
];
initVersionRoutes($versionMap, $routeMap);
function initVersionRoutes(array $versionMap = [], array $routeMap = [])
{
    foreach ($versionMap as $version) {
        Route::group(['prefix' => $version, 'namespace' => ucfirst($version)], function () use ($routeMap) {
            foreach ($routeMap as $route) {
                switch ($route['method']) {
                    case 'GET':
                        Route::get($route['uri'], $route['action']);
                        break;
                    case 'POST':
                        Route::post($route['uri'], $route['action']);
                        break;
                }
            }
        });
    }
}
/*foreach (['v1', 'v2'] as $version) {
    Route::group(['prefix' => $version, 'namespace' => ucfirst($version)], function () {
        Route::get('getList', 'ExampleController@getList');
    });
}*/

//方式3：动态处理版本控制[推荐]
//更改文件：app/Providers/RouteServiceProvider.php
/*Route::middleware('web')
    ->namespace($this->namespace)
    ->group(base_path('routes/web.php'));
改为
Route::middleware('web')
    ->prefix('{version}/')
    ->namespace($this->versionNamespace())
    ->group(base_path('routes/web.php'));
然后再最后添加一个方法
protected function versionNamespace(): string
{
    return $this->namespace . '\\' . ucfirst(Str::of(\request()->path())->before('/'));
}*/

//v1/example/getList
/*Route::group(['prefix' => 'example/'], function () {
    Route::get('getList', 'ExampleController@getList');
});*/
