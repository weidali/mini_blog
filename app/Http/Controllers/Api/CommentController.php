<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Jobs\ProcessCommentJob;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @param CommentRequest $request
     * @return JsonResponse
     */
    public function store(CommentRequest $request): JsonResponse
    {
        ProcessCommentJob::dispatch($request->subject, $request->body, $request->article_id);

        return response()->json([
            'status' => 'Success',
            'message' => 'Ваше сообщение успешно отправлено',
        ], 200);
    }
}
