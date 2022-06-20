<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aimeos\Shop\Facades\Shop;
use App\Models\Contact;
use Mail;

class ContactController extends Controller {

      public function index() {

        foreach( app( 'config' )->get( 'shop.page.contact' ) as $name )
    		{
    			$params['aiheader'][$name] = Shop::get( $name )->header();
    			$params['aibody'][$name] = Shop::get( $name )->body();
    		}

    		return Response::view( Shop::template( 'page.contact' ), $params )
    			->header( 'Cache-Control', 'private, max-age=10' );
     }

      public function save(Request $request) {

        $request->validate([

            'firstname' => 'required',

            'lastname' => 'required',

            'email' => 'required|email',

            'subject' => 'required',

            'message' => 'required',

        ]);

        $contact = new Contact;

        $input = $request->all();

         Contact::create($input);

          //  Send mail to admin

         \Mail::send(Shop::template( 'page.contactMail' ), array(

             'firstname' => $input['firstname'],

             'lastname' => $input['lastname'],

             'email' => $input['email'],

             'subject' => $input['subject'],

             'messages' => $input['message'],

         ), function($message) use ($request){

             $message->from($request->email);

             $message->to('boukli_devel@yahoo.com', 'Admin')->subject($request->get('subject'));

         });

        $contact->save();

        return back()->with('success', 'Thank you for contact us!');

    }
}
