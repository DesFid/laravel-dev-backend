<?php

namespace App\Http\Controllers\Cecy;

use App\Http\Controllers\Controller;
use App\Models\Cecy\Planification;
use Illuminate\Http\Request;

class PlanificationController extends Controller
{
    public function index(Request $request)
    {
        $planifications = Planification::all();

        return response()->json([
                'data' => [
                    'type' => 'planifications',
                    'attributes' => $planifications
                ]]
            , 200);
    }

    public function filter(Request $request)
    {
        $planifications = Planification::where('name', $request->name)->orderBy('name')->get();
        return response()->json([
            'data' => $planifications,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function courses(Request $request)
    {
        $planifications = Planification::join('courses', 'planifications.course_id', '=', 'courses.id')
            ->where('courses.for_free', $request->for_free)
            ->select('*')
            ->get();
        return response()->json([
            'data' => $planifications,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function getPlanification($id, Request $request) {
        $course = Planification::join('courses', 'planifications.course_id', '=', 'courses.id')
        ->where('planifications.id', $id)
        ->select('*')
        ->first();
        return response()->json([
            'data' => $course,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Planification::create($data);
        return response()->json([
            'data' => [
                'attributes' => $data,
                'type' => 'planifications'
            ]
        ], 201);
    }

    public function update(Request $request, $id, Planification $planifications)
    {
        $data = $request->all();

        $planifications = Planification::where('id', $id)->update($data);
        return response()->json([
            'data' => [
                'type' => 'planifications',
                'attributes' => $data
            ]
        ], 200);
    }

    public function destroy($id)
    {
        $planifications = Planification::destroy($id);
        return response()->json([
            'data' => [
                'attributes' => $id,
                'type' => 'planifications'
            ]
        ], 201);
    }
}
