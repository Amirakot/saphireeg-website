<?php

namespace App\Http\Controllers;

use App\Models\Address; // Corrected namespace
use App\Models\Contact;
use App\Models\Email;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('address', 'email', 'phone')->get(); // Fetch all contacts
        return view('dash.contact.index', compact('contacts')); // Fix view path
    }

    public function create()
    {
        return view('dash.contact.add'); // Fix view path
    }

    public function store(Request $request)
    {
        $contact = Contact::create([
            'user_id' => Auth::id(),
        ]);

        foreach ($request->input('phone_numbers') as $phone_number) {
            if (!empty($phone_number)) {
                $phone = new Phone;
                $phone->phone = $phone_number;
                $phone->contact_id = $contact->id;
                $phone->save();
            }
        }

        foreach ($request->input('address') as $address) {
    // dd($address);
            if (!empty($address)) {
                $adr = new Address; // Corrected model name
                $adr->address = $address; // Corrected attribute name
                $adr->contact_id = $contact->id;
                $adr->save();
            }
        }

        foreach ($request->input('email') as $email) {
            if (!empty($email)) {
                $emailModel = new Email; // Changed variable name to avoid conflict
                $emailModel->email = $email; // Corrected attribute name
                $emailModel->contact_id = $contact->id;
                $emailModel->save();
            }
        }

        return redirect()->route('contact.index')->with('success', 'Your form has been submitted.');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('dash.contact.edit', compact('contact')); // Fix view path
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->phone()->delete();
        if ($request->has('phone_numbers')) {
            foreach ($request->phone_numbers as $phone_number) {
                if (!empty($phone_number)) {
                    $phone = new Phone();
                    $phone->phone = $phone_number;
                    $phone->contact_id = $contact->id;
                    $phone->save();
                }
            }
        }

        $contact->address()->delete(); // Delete existing addresses
        foreach ($request->input('address') as $address) {
            if (!empty($address)) {
                $adr = new Address;
                $adr->address = $address;
                $adr->contact_id = $contact->id;
                $adr->save();
            }
        }

        $contact->email()->delete(); // Delete existing emails
        if ($request->has('email')) {
            foreach ($request->email as $email) {
                if (!empty($email)) {
                    $emailModel = new Email;
                    $emailModel->email = $email;
                    $emailModel->contact_id = $contact->id;
                    $emailModel->save();
                }
            }
        }

        return redirect()->route('contact.index')->with([
            'message' => 'Contact updated successfully',
            'alert-type' => 'success'
        ]);
    }
}
