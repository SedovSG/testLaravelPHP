<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Exceptions\ErrorException;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $books = Book::all();
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
     * @param  BookRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BookRequest $request)
    {
        $request->validated();

        try {
            $result = Book::create($request->all());
        } catch (\Exception $e) {
            throw new ErrorException($e->getMessage());
        }

        $dataResponse = [
            'code' => Response::HTTP_OK,
            'message' => 'OK',
            'data' => $result,
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
            $book = Book::find($id);
        } catch (\Exception $e) {
            throw new ErrorException($e->getMessage());
        }

        $dataResponse = [
            'code' => Response::HTTP_OK,
            'message' => 'OK',
            'data' => $book,
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
     * @param  BookRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BookRequest $request, int $id)
    {
        $request->validated();

        try {
            $book = Book::find($id)->update($request->all());
        } catch (\Exception $e) {
            throw new ErrorException($e->getMessage());
        }

        $dataResponse = [
            'code' => Response::HTTP_OK,
            'message' => 'OK',
            'data' => $book,
        ];

        return response()->json($dataResponse, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $result = Book::find($id)->delete();
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
}
