<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Feature;
use App\FeatureCategory;
use App\RoleAccess;
use App\User;
use App\Role;
use App\Setting;
use Auth;
use App\MDiscussion;

class GlobalComposer
{
    public function compose(View $view)
    {
      // get features data from user role
      if (Auth::check()) {

        $features = RoleAccess::where('role_id', '=', Auth::user()->role_id)
                      ->join('features', 'features.id', 'role_accesses.feature_id')
                      ->join('feature_masters', 'feature_masters.id', 'features.feature_master_id')
                      ->join('feature_categories', 'feature_categories.id', 'feature_masters.feature_category_id')
                      ->where('general', '=', '0')
                      ->where('features.aktive', '=', '1')
                      ->where('feature_categories.aktive', 1)
                      ->where('feature_masters.aktive', 1)
                      ->where('in_menu', '=', '1')
                      ->select('feature_categories.*','features.*', 'feature_categories.id as feature_category_id', 'feature_masters.slug', 'feature_masters.feature_master_name')
                      ->get();

        $globalRole = Role::where('id', Auth::user()->role_id)
                -> select('role_name')
                -> first();

        $globalSetting = Setting::all();

        $featureCategory = FeatureCategory::orderBy('id', 'ASC')->get();

        // Notifikasi untuk disksui admin
        $notif = null;
        if (Auth::user()->role_id == 1) {
            $notif = MDiscussion::select('name', 'm_discussions.created_at', 'profile_id')
                -> join('users', 'users.id', 'm_discussions.profile_id')
                -> where('is_admin', null)
                -> where('m_discussions.readed', 0)
                -> latest()
                -> get();
        }

        if (Auth::user()->role_id == 3) {
            $notif = MDiscussion::select('name', 'm_discussions.created_at', 'profile_id')
                -> join('users', 'users.id', 'm_discussions.profile_id')
                -> where('is_user', null)
                -> where('m_discussions.readed', 0)
                -> where('profile_id', Auth::user()->id)
                -> latest()
                -> get();
        }

        $view->with('globalFeatures', $features)->with('globalFeatureCategories', $featureCategory)->with('globalRole', $globalRole->role_name)
            ->with('globalSettings', $globalSetting)
            ->with('notif', $notif);
      }

    }
}
