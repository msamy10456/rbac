<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralSettingRequest;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;

class GeneralSettingController extends Controller
{
    public function edit()
    {
        $general = GeneralSetting::first();
        return view('pages.general-setting.edit', compact('general'));
    }
    public function update(GeneralSettingRequest $request)
    {

        try {
            $g = GeneralSetting::first();
            if ($g) {
                $g->update([
                    'title' => $request->title,
                    'address' => $request->address,
                    'phone' => $request->phone,
                ]);
                if ($request->image) {
                    $g->addMedia($request->image)->toMediaCollection('logo');
                }
            } else {
                $g = GeneralSetting::create([
                    'title' => $request->title,
                    'address' => $request->address,
                    'phone' => $request->phone,
                ]);
                if ($request->image) {
                    $g->addMedia($request->image)->toMediaCollection('logo');
                }
            }

            return  successResponseMessage(message: 'تم التعديل بنجاح');
        } catch (\Throwable $e) {
            return  errorResponseMessage($e->getMessage());
        }
    }



}
