<?php

use Illuminate\Support\Facades\Route;

Route::get('/elenco', function () {

    $post1 = new stdClass();
    $post1->userId = 1;
    $post1->id = 1;
    $post1->title = 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit';
    $post1->body = 'quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto';

    $post2 = new stdClass();
    $post2->userId = 2;
    $post2->id = 2;
    $post2->title = 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit';
    $post2->body = 'quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto';

    $post3 = new stdClass();
    $post3->userId = 3;
    $post3->id = 3;
    $post3->title = 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit';
    $post3->body = 'quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto';

    $posts = [$post1, $post2, $post3];

    return view('elenco-attivita', ['posts' => [$post1, $post2, $post3]]);
})->whereAlpha(['title', 'body'])
    ->whereNumber(['userId', 'id']);

Route::get('/creazione', function () {
    return view('creazione-attivita');
});

Route::get('/modifica', function () {
    return view('modifica-attivita');
});

Route::get('/singola', function () {

    $post1 = new stdClass();
    $post1->userId = 1;
    $post1->id = 1;
    $post1->title = 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit';
    $post1->body = 'quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto';

    return view('singola-attivita', ['posts' => $post1]);
});