<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('chat.{tutor_id}.{student_id}', function ($tutor_id, $student_id) {
    return true;
}, ['guards' => ['student' , 'tutor']]);
