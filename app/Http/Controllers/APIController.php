<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tab;

class APIController extends Controller
{
    // Insert Tab info when open the new tab
    public function insertTab(Request $request) {
        $data = $request->all();
        Tab::create($data);
        return json_encode("success");
    }

    // Set Close Time when close the tab
    public function closeTab(Request $request) {
        $data = $request->all();
        Tab::where('tabId', $data['tabId'])->delete();
        return json_encode("sccuess");
    }
}
