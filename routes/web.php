<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Else_;

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

// Route::get('/', function () {
//     global $users;
//     return $users;
// });
// Route::get('/user', function () {
//     global $users;
//     $names = [];

//     foreach ($users as $user) {
//         $names[] = $user['name'];
//     }

//     return 'The users are: ' . implode(', ', $names);
// });

// Route::get('/api/user', function () {
//     global $users;
//     return $users;
// });

// Route::get('/api/user/{userIndex}', function ($userIndex) {
//     global $users;
//     if (isset($users[$userIndex])) {
//         return 'The user with index ' . $userIndex . ' is: ' . $users[$userIndex]['name'];
//     }
//     else{
//         return 'The user with index ' . $userIndex . ' is not found';
//     }
// });

// Route::get('/api/user/{userName}', function ($userName) {
//     global $users;
//     foreach ($users as $user) {
//         if ($user['name'] === $userName) {
//             return 'The user ' . $userName . ' is found';
//         }
//     }
//     return 'The user ' . $userName . ' can not find';
// })->where('userName', '[a-z]+');

Route::prefix('api')->group(function () {

    Route::get('/user', function () {
        global $users;
        return $users;
    });

    Route::get('/user/{userIndex}', function ($userIndex) {
        global $users;
        if (isset($users[$userIndex])) {
            return 'The user with index ' . $userIndex . ' is: ' . $users[$userIndex]['name'];
        } else {
            return 'Yo can not get a user like this!';
        }
    })->where('userIndex', '[0-9]+');

    Route::get('/user/{userIndex}/post/{postIndex}', function ($userIndex, $postIndex) {
        global $users;
        if (isset($users[$userIndex])) {
            $user = $users[$userIndex];
            if (isset($user['posts'][$postIndex])) {
                return $user['posts'][$postIndex];
            } else {
                return 'Cannot find the post with id ' . $postIndex . ' for user ' . $userIndex;
            }
        } else {
            return 'You can not get a user like this!';
        }
    })->where(['userIndex' => '[0-9]+', 'postIndex' => '[0-9]+']);
});
