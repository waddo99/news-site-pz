<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    const PAGESIZE = 50;

    public function index(Request $request)
    {
        if(\Auth::user()->role->first()->role === 'admin') {
            $search = $request->get('search');
            $logs = $this->getLogData($search);

            return view('log.index')
                ->with(compact('logs'))
                ->with('search', $search)
                ->with('searchRoute', 'log.search');
        }

        return redirect()->route('home')->with('warning', 'Permission denied');
    }

    /**
     * @param $search
     * @param null $limitObjectList
     * @return mixed
     */
    public function getLogData($search, $limitObjectList = null)
    {
        if ($search) {
            $logRows = ActionLog::whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
                ->orWhere('created_at', 'like', '%' . $search . '%')
                ->orWhere('article_id', 'like', '%' . $search . '%')
                ->orWhere('action', 'like', '%' . $search . '%')
                ->orWhere('comment', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->paginate(self::PAGESIZE);
        } else {
            $logRows = ActionLog::with('user')->orderBy('id', 'desc')->paginate(self::PAGESIZE);

        }

        return $logRows;
    }
}
