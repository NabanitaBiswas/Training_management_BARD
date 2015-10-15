<?php
namespace App\Http\Controllers;

use App\Http\Requests\ContactMeRequest;
use Illuminate\Support\Facades\Mail;
use App\Contact;

class ContactController extends Controller
{
  /**
   * Show the form
   *
   * @return View
   */
  public function showForm()
  {
    return view('contact.contact');
  }

  public function store(ContactMeRequest $request){
    $contacts = new Contact([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'phone' => $request->get('phone'),
        'message' => $request->get('message'),

      ]);
    $contacts->save();
    return 'hello';

  }

  
    
}