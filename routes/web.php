<?php

use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\Users\User\DashboardController;
use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


require_once __DIR__ . '/admin/auth_routes.php';


Route::get('/', function(Request $request){
    return view('import');
});

Route::post('import', [\App\Http\Controllers\CustomerController::class, 'import'])->name('import');





Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => '/dashboard/url/'], function(){
    Route::get('/', [ShortUrlController::class, 'index'])->name('short_url.index');
    Route::post('/create', [ShortUrlController::class, 'generateUrl'])->name('short_url.create');
    Route::delete('/delete/{shortUrl}', [ShortUrlController::class, 'destroy'])->name('short_url.create');
});






Auth::routes();

Route::get('/{key}', function(Request $request){

//    dd(ShortUrl::where('key', '=', $request->key)->count());


    $found = ShortUrl::where('key', '=', $request->key);
    $short_url = null;
    if($found->count()) {
        $short_url = $found->first()->url;
    }

    return redirect($short_url);
})->middleware('throttle:max_three');




// 404 for undefined routes
//Route::any('/{page?}',function(){
//    return View::make('pages.error.404');
//})->where('page','.*');
