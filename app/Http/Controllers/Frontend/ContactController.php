<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactUs;
use App\Services\ContactService;

use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // protected $contactServices;
    // public function __construct(ContactService $contactService)
    // {
    //    return $this->contactServices = $contactService;
    // }
        /**
     * contact
     *
     * @return void
     */
    public function index()
    {
        return view('frontend.contact');
    }

        /**
     * contact
     *
     * @return void
     */
    public function store(ContactRequest $request)
    {
        $messages = $request->validated();
        dd($messages);
        // $this->contactServices->createMessage($messages);
        // $messageBody = $message['']
        Mail::to('example@mailtrap.io')->send(new ContactUs($messages));

        return redirect()->route('contact-us')->with(
            'message', 'Thank for Contacting us We will surely get back to you shortly Kindly we will reply through email provided in your contact form, Thanks'
        );
    }

}
