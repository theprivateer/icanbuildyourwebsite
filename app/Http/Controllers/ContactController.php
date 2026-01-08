<?php

namespace App\Http\Controllers;

use App\Notifications\NewSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $fields = $request->only([
            'name', 'company', 'email', 'what', 'budget', 'description', 'more',
        ]);

        Notification::route('mail', config('mail.to_email'))
            ->notify(new NewSubmission($fields));

        if  ($request->ajax()) {
            return response('true');
        }

        return back();
    }
}
