<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContactUsRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    /**
     * show all messages
     * @param Contact $contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAll(Contact $contact)
    {
        return view('admin.messages', ['messages' => $contact->all()]);
    }

    /**
     * store message from contact us form
     * @param ContactUsRequest $request
     * @param ContactService $contactService
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function storeContact(ContactUsRequest $request, ContactService $contactService)
    {
        if ($contactService->storeContact($request)) {
            return back()->with('success', 'Ваше сообщение отправленно');
        } else {
            return back()->with('danger', 'Сообщение не было отправленно');
        }
    }

    public function deleteMessage($id, Contact $contact)
    {
        $contact = $contact->findOrFail($id);
        if ($contact->delete()) {
            return back()->with('success', 'Cообщение было удаленно');
        } else {
            return back()->with('danger', 'Сообщение не было удаленно');
        }
    }
}
