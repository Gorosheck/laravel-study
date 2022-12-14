<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Mail\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function store(CreateContactRequest $request)
    {
        $mail = new NewContact(
            $request->get('name'),
            $request->get('email'),
            $request->get('tel'),
        );

        Mail::to('info@dev.com')->send($mail);

        session()->flash('success', trans('messages.report.success'));

        return redirect()
            ->back();
    }
}
