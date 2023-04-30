<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class PostController extends Controller
{
    public function create(Request $request)
    {
        try {
            $request->validate([
                'author_id'   => 'required',
                'title'       => 'required',
                'description' => 'required'
            ]);
            $form   = new Post();
            $result = $request->all();
            $saved  = $form->fill($result)->save();
            if ($saved) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Post Created Successfully.',
                ]);
            } else {
                return response()->json([
                    'status' => 301,
                    'message' => 'Something is wrong.',
                ]);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Errors in post creating.',
            ]);
        }
    }

    public function postByUser(Request $request)
    {
        try {
            if (!$request->author_id) {
                return response()->json([
                    'status' => 422,
                    'message' => 'Author id is required',
                ]);
            }
            //N + 1 Query Problem
            $posts = Post::get();
            $data  = [];
            foreach ($posts as $post) {
                $data[] = [
                    "author"      => $post->user->name,
                    "title"       => $post->title,
                    "description" => $post->description
                ];
            }
            //Eager Loading
            $eager = Post::with('user')->get();

            if ($data) {
                return response()->json([
                    'query'    => $data,
                    'eager'   => $eager,
                    'status'  => true,
                    'message' => 'Post lists by user (N + 1 Query)'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something is wrong.',
            ]);
        }
    }
}
