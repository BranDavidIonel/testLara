<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
class ArticleNotificationController extends Controller
{
    public function show($id){
        $notifications=Article::find($id)->unreadNotifications;
        $notifications=tap(Article::find($id)->unreadNotifications)->markAsRead();;
        /*
        foreach($notifications as $notifactions){
            $notification->markAsRead();
        }
        */
        //al notifications mark as read 
        //$notifications->markAsRead();
        return view('notification.show',[
            'notifications'=>$notifications
        ]);
    }
}
