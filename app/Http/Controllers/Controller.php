<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\ActionLog;
use Illuminate\Support\Arr;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function addToLog($article_id, $user, $action = '', $comment = '')
    {
        $log = new ActionLog([
            'article_id' => $article_id,
            'user_id' => $user,
            'action' => $action,
            'comment' => $comment,
        ]);
        $log->save();
    }

    public function formatRequest($in)
    {
        return urldecode(http_build_query(Arr::except($in, ['_method', '_token', 'submit', 'text']), 'num_', '; '));
    }
}
