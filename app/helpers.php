<?php
use App\Models\UserActivity;

function createUserActivity($request, $action, $description, $log_level, $email)
{
    $userActivity = new UserActivity();
    $userActivity->action = $action;
    $userActivity->email = $email ?? auth()->user()->name . '<' . auth()->user()->email . '>';
    $userActivity->description = $description;
    $userActivity->log_level = $log_level;
    $userActivity->ip = $request->ip();
    $userActivity->browser = $request->header('User-Agent');
    $userActivity->save();
}
