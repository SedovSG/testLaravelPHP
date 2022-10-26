<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Exceptions\ErrorException;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $user = User::all();
        } catch (\Exception $e) {
            throw new ErrorException($e->getMessage());
        }

        $dataResponse = [
            'code' => Response::HTTP_OK,
            'message' => 'OK',
            'data' => $user,
        ];

        return response()->json($dataResponse, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request)
    {
        $request->validated();

        try {
            $user = User::create($request->all());
        } catch (\Exception $e) {
            throw new ErrorException($e->getMessage());
        }

        $dataResponse = [
            'code' => Response::HTTP_OK,
            'message' => 'OK',
            'data' => $user,
        ];

        return response()->json($dataResponse, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        try {
            $user = User::find($id);
            $countBooks = $user->books->count();
            $user->setAttribute('count', $countBooks);
        } catch (\Exception $e) {
            throw new ErrorException($e->getMessage());
        }

        $dataResponse = [
            'code' => Response::HTTP_OK,
            'message' => 'OK',
            'data' => $user,
        ];

        return response()->json($dataResponse, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserRequest $request, int $id)
    {
        $request->validated();

        try {
            $user = User::find($id)->update($request->all());
        } catch (\Exception $e) {
            throw new ErrorException($e->getMessage());
        }

        $dataResponse = [
            'code' => Response::HTTP_OK,
            'message' => 'OK',
            'data' => $user,
        ];

        return response()->json($dataResponse, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $result = User::find($id)->delete();
        } catch (\Exception $e) {
            throw new ErrorException($e->getMessage());
        }

        $dataResponse = [
            'code' => Response::HTTP_OK,
            'message' => 'OK',
            'data' => $result,
        ];

        return response()->json($dataResponse, Response::HTTP_OK);
    }

    /**
     * Выводит книги по идентификатору автора.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function books(int $id)
    {
        try {
            $books = User::find($id)->books()->get();
        } catch (\Exception $e) {
            throw new ErrorException($e->getMessage());
        }

        $dataResponse = [
            'code' => Response::HTTP_OK,
            'message' => 'OK',
            'data' => $books,
        ];

        return response()->json($dataResponse, Response::HTTP_OK);
    }
}
