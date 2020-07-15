<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller {
    public function submit(ContactRequest $req) {

        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('home')->with('success', 'Сообщение было добавлено');


        // $validation = $req->validate([
        //     'subject' => 'required|min:5|max:50',
        //     'message' => 'required|min:15|max:500'
        // ]);
    }
    public function allData() {

        $contact = new Contact;
        return view('messages', ['data' => $contact->all()]);

        // различные выборки и сортировки
        //return view('messages', ['data' => $contact->orderBy('id', 'asc')->take(2)->skip(1)->get()]);
        // return view('messages', ['data' => $contact->where('subject', '=', 'Hello')->get()]);

        //dd(Contact::all());
        // $contact = new Contact;
        // dd($contact->all());
    }

    public function showOneMessage($id){
        $contact = new Contact;
        return view('one-message', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id){
        $contact = new Contact;
        return view('update-message', ['data' => $contact->find($id)]);
    }

    public function updateMessageSubmit($id, ContactRequest $req) {

        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');
        $contact->save();
        return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обнавлено');
    }

    public function deleteMessage($id){
        $contact = Contact::find($id)->delete();
        return redirect()->route('contact-data')->with('success', 'Сообщение было удалено');
    }
}
