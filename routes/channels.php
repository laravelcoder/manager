<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
