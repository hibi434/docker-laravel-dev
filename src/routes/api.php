<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/todos", [ApiController::class, "getApi"])->name("getApi");
Route::post("/todos",[ApiController::class,"postApi"])->name("postApi");
Route::put("/todos/{id}",[ApiController::class,"putApi"])->name("putApi");
Route::delete("todos/{id}",[ApiController::class,"deleteApi"])->name("deleteApi");
Route::put("todos/{id}/complete",[ApiController::class,"completeApi"])->name("completeApi");
Route::put("todos/{id}/uncomplete",[ApiController::class,"uncompleteApi"])->name("uncompleteApi");