<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class NotificationController extends Controller
{
    public function index(Request $request)
    {
        // $keyword = $request->get('search');
        // if (!empty($keyword)) {
        //     $notifications = DB::table('notifications')
        //         ->join('users', 'users.id', '=', 'notifications.data->admin_id')
        //         ->select('users.image', 'users.id as u_id', 'notifications.*')
        //         ->orWhere('data->admin_email', 'like', "%$keyword%")
        //         ->paginate();
        // } else {
        //     $notifications = DB::table('notifications')
        //     ->select('*')->paginate();
        // }

        $notifications = auth()->user()->notifications;
        return view('pages.admin-panel.notification_profile.notification', [
            'notifications' => $notifications
        ]);
    }

    //mark each notification as read
    public static function read_notification($id)
    {
        $userUnreadNotification = auth()->user()
            ->unreadNotifications
            ->where('id', $id)
            ->first();

        if ($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
        }
        return redirect()->back()->with('message', 'Notifications has marked as read.');
    }

    //mark all notifications as read
    public function read_all_notification()
    {
        $admin = User::find(auth()->user()->id);
        $admin->unreadNotifications->markAsRead();
        return redirect()->back()->with('message', 'All notifications have marked as read.');
    }

    //delete each notification from database function
    public function destroy(Request $request)
    {
        $id = $request->input('notification_id');
        auth()->user()->notifications->where('id', $id)->each->delete();
        return redirect()->route('notifications.index')->with('message', 'Notification has deleted successfully');
    }

    //delete all notification from database function
    public function delete_all_notification()
    {
        $admin = User::find(auth()->user()->id);
        foreach ($admin->readNotifications as $notification) {
            $notification->delete();
        }
        if ($admin->unreadNotifications->count() > 0) {
            return redirect()->back()->with('error_message', 'There are notifications not marked as read to delete.');
        }
        return redirect()->route('notifications.index')->with('message', 'All notifications have deleted successfully');
    }

    // public static function mark_as_read()
    // {
    //     // $admins = User::find(auth()->user()->id);
    //     // $admins->unreadNotifications->markAsRead();


    //     // $category = Category::find($id);
    //     // // $admin = User::find(auth()->user()->id);
    //     // $notification_id = DB::table('notifications')->where('data->id', $category)->pluck('id');
    //     // $notification_id = DB::table('notifications')->where('id', $id)->get();

    //     // $notification->markAsRead();

    //     // $admin = User::find(auth()->user()->id);
    //     // $notification_id = DB::table('notifications')->where('data->admin_id', $admin)->pluck('id'); //get notification id
    //     // DB::table('notifications')->where('id', $notification_id)->update(['read_at'=>now()]);

    //     // $notification = DatabaseNotification::find($request->notification_id);
    //     // $notification->update(['read_at' => now()]);
    //     // $notification->save();



    //     // dd($notification_id);

    //     // $notification_id = DB::table('notifications')->find( $request->id );

    //     // auth()->user()->unreadNotifications
    //     //     ->where('id', $notification_id)
    //     //     ->update(['read_at'=>now()]);

    //     return redirect()->back();
    // }
}
