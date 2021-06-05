<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    const PAGESIZE = 50;

    public function index(Request $request)
    {
        $search = $request->get('search');
        $logs = $this->getLogData($search);

        return view('log.index')
            ->with(compact('logs'))
            ->with('search', $search)
            ->with('searchRoute', 'log.search');
    }

    /**
     * @param $search
     * @param null $limitObjectList
     * @return mixed
     */
    public function getLogData($search, $limitObjectList = null)
    {
        if ($search) {
            if(is_null($limitObjectList)) {
                $logRows = ActionLog::whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhere('created_at', 'like', '%' . $search . '%')
                    ->orWhere('object_id', 'like', '%' . $search . '%')
                    ->orWhere('object_class', 'like', '%' . $search . '%')
                    ->orWhere('action', 'like', '%' . $search . '%')
                    ->orWhere('comment', 'like', '%' . $search . '%')
                    ->orderBy('id', 'desc')
                    ->paginate(self::PAGESIZE);
            } else {
                $logRows = ActionLog::whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                    ->whereIn('object_class', $limitObjectList)
                    ->orWhere('created_at', 'like', '%' . $search . '%')
                    ->orWhere('object_id', 'like', '%' . $search . '%')
                    ->orWhere('action', 'like', '%' . $search . '%')
                    ->orWhere('comment', 'like', '%' . $search . '%')
                    ->orderBy('id', 'desc')
                    ->paginate(self::PAGESIZE);
            }
        } else {
            if(is_null($limitObjectList)) {
                $logRows = ActionLog::with('user')->orderBy('id', 'desc')->paginate(self::PAGESIZE);
            } else {
                $logRows = ActionLog::with('user')->whereIn('object_type', $limitObjectList)->orderBy('id', 'desc')->paginate(self::PAGESIZE);
            }
        }

        return $logRows;
    }
}
