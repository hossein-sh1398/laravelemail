<?php

use Illuminate\Support\Facades\Route;
use Vandaw\Cart\CartFacade;
use Illuminate\Notifications\Messages\MailMessage;
use App\Exceptions\MyException;


Route::get('products', 'ProductController@list');

Route::post('cart/add/{product}', 'CartController@addToCart')->name('cart.add');


Route::get('cart', 'CartController@cart')->name('cart');

Route::patch('cart/quantity/change', 'CartController@changeQuantity')->name('cart.change.quantity');

Route::get('cart/item/{id}/delete', 'CartController@deleteItemCart')->name('cart.item.delete');

Route::post('cart/payment', 'PaymentController@payment')->name('cart.payment');
Route::post('payment/callback', 'PaymentController@callback')->name('payment.callback');














Route::get('down/{file}', function($file){
	return \Storage::download('files/1.jpg');
});
// Route::get('upload_file', 'UploadController@form')->name('upload.form');
// Route::post('upload_file', 'UploadController@upload');


// Route::get('/', 'IndexController@index');

Route::get('localization', 'LocalizationController@index');

Route::get('collection', 'CollectionController@coll');

Route::get( 'user/make/{name}', 'UserController@make' );


Route::get( 'download/link/{path}', function( $path ) {

	return \URL::temporarySignedRoute( 
		'download', 
		now()->addseconds( 20 ), 
		[ 'path' => 'files/'. $path ] 
	);

} );


Route::get( 'download', function () {

	return \Storage::download( request('path') );

} )->name( 'download' )->middleware('signed');

Route::get('/a', function () {
    session(['name' => 'hossein']);
    return session('name');
});

Route::get('/b', function () {
    dd(session('name'));

    // session(['team' => ['esteghlal' => [1,2], 'perspolis']]);
    // session()->push('team', 'barselona');
    // session()->push('team.esteghlal', 3);
});

Route::get('/c', function () {
    dd(session('name'));

    // session(['team' => ['esteghlal' => [1,2], 'perspolis']]);
    // session()->push('team', 'barselona');
    // session()->push('team.esteghlal', 3);
});



 Route::get( '/', function(Illuminate\Http\Request $req) {

// 	$hasLikes = [];

// 	$articles = App\Models\Article::with( 'likes' )
// 					->get();

// 	// if ( auth()->check() ) {
// 	// 	foreach ( $articles as $article ) {
// 	// 		if ( auth()->user()->liked( $article ) ) {
// 	// 			$hasLikes[] = true;
// 	// 		} else {
// 	// 			$hasLikes[] = false;
// 	// 		} 
// 	// 	}
// 	// }
// 	return view( 'editor', [ 'articles' => $articles, 'hasLikes' => $hasLikes ] );
 } );

Route::post('like/{likeable_id}', 'LikeController@like')->name('like');

Route::get('articles/create', 'ArticleController@create');
Route::post('articles', 'ArticleController@store');
Route::get('articles/{article}', 'ArticleController@show');


Route::get('send', 'NotificationController@email');
Route::get('getMessageNotification', 'NotificationController@getMessageNotification');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get( 'cache', 'CacheController@cache' );

Route::get('model', 'ModelController@model');

// Route::get('comment', 'CommentController@index');
// Route::get('comment/{comment}', 'CommentController@verify')->name('comment.verify');
// Route::delete('comment/{comment}', 'CommentController@destroy')->name('comment.destroy');
// Route::post('comment', 'CommentController@store')->name('comment.store');
// Route::post('comment/ajax', 'CommentController@ajax');
//https://sepahboursese.etadbir.com/login.html
//https://www.youtube.com/watch?v=8BNldJV0Gqw
Route::get('query-builder', 'QueryBuilderController@builder');

Route::get('campaign-stage', 'CampaignStageController@index');

Route::get('video/{video}', 'VideoController@show');

Route::get('report', 'ReportController@report');



Route::get('vote', 'VoteController@form');
Route::post('vote', 'VoteController@vote');

Route::get('campaign/list', 'CampaignController@search');

Route::get('realation_sheep', 'UserController@real');

 