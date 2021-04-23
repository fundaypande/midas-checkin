<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class History extends Model
{

    protected $guarded = [];


    public static function MRegister($featureId, $actionId, $description = NULL, $oldData = NULL)
    {
        Self::create([
            'user_id'       => $actionId,
            'old_user_name' => $actionId,
            'feature_id'    => $featureId,
            'action_id'     => $actionId,
            'action'        => 'store',
            'description'   => $description,
            'old_data'      => $oldData,
        ]);
    }


    public static function MStore($featureId, $actionId, $description = NULL, $oldData = NULL)
    {
        $userId = Auth::user()->id;
        $userName = Auth::user()->name;

        Self::create([
            'user_id'       => $userId,
            'old_user_name' => $userName,
            'feature_id'    => $featureId,
            'action_id'     => $actionId,
            'action'        => 'store',
            'description'   => $description,
            'old_data'      => $oldData,
        ]);
    }

    public static function EJStore($featureId, $name, $description = NULL, $oldData = NULL)
    {
        Self::create([
            'user_id'       => 1,
            'old_user_name' => $name,
            'feature_id'    => $featureId,
            'action_id'     => null,
            'action'        => 'store',
            'description'   => $description,
            'old_data'      => $oldData,
        ]);
    }

    public static function MUpdate($featureId, $actionId, $description = NULL, $oldData = NULL)
    {
        $userId = Auth::user()->id;
        $userName = Auth::user()->name;

        Self::create([
            'user_id'       => $userId,
            'old_user_name' => $userName,
            'feature_id'    => $featureId,
            'action_id'     => $actionId,
            'action'        => 'update',
            'description'   => $description,
            'old_data'      => $oldData,
        ]);
    }

    public static function MDelete($featureId, $actionId, $tableName, $description = NULL, $oldData = NULL)
    {
        $userId = Auth::user()->id;
        $userName = Auth::user()->name;

        Self::create([
            'user_id'       => $userId,
            'old_user_name' => $userName,
            'feature_id'    => $featureId,
            'action_id'     => $actionId,
            'action'        => 'delete',
            'description'   => $description,
            'old_data'      => $oldData,
            'table_name'    => $tableName
        ]);
    }

    public static function MRestore($featureId, $actionId, $description = NULL, $oldData = NULL)
    {
        $userId = Auth::user()->id;
        $userName = Auth::user()->name;

        Self::create([
            'user_id'       => $userId,
            'old_user_name' => $userName,
            'feature_id'    => $featureId,
            'action_id'     => $actionId,
            'action'        => 'restore',
            'description'   => $description,
            'old_data'      => $oldData,
        ]);
    }


    public static function DoRestore($id)
    {
        // 10 adalah ID Feature
        if (!User::Role(10)) return redirect()->back()->with('alert-danger', 'You cannot access history management page');

        $history = Self::findOrFail($id);

        $data = DB::table($history->table_name)
                ->where('id', $history->action_id)
                ->update([
                    'deleted_at' => null
                ]);

        $date = date('m/d/Y h:i:s a', time());

        $history->update([
            'description'   => $history->description . ' - Restored By '. Auth::user()->name. ' at ' . $date,
            'restored'      => 1,
        ]);

        Self::MRestore($history->feature_id, $history->action_id, 'Restore Data On Feature '. $history->feature_id);


    }
}
