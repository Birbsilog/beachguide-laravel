<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Beach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /* =========================
     *  LIST CONTACTS
     * ========================= */
public function index(Beach $beach)
{
    $contacts = $beach->contacts()->latest()->get();

    return view('owner.contacts.index', compact('contacts', 'beach'));
}

public function create(Beach $beach)
{
    return view('owner.contacts.create', compact('beach'));
}



public function store(Request $request, Beach $beach)
{
    $validated = $request->validate([
        'type'  => 'required|string|max:50',
        'value' => 'required|string|max:255',
    ]);

    $beach->contacts()->create([
        'type'     => $validated['type'],
        'value'    => $validated['value'],
        'owner_id' => auth()->id(),
    ]);

    return redirect()
        ->route('owner.beaches.contacts.index', $beach)
        ->with('success', 'Contact added successfully!');
}






    /* =========================
     *  SHOW EDIT FORM
     * ========================= */
    public function edit(Contact $contact)
    {
        $this->authorizeOwner($contact);

        return view('owner.contacts.edit', compact('contact'));
    }

    /* =========================
     *  UPDATE CONTACT
     * ========================= */
    public function update(Request $request, Contact $contact)
    {
        $this->authorizeOwner($contact);

        $validated = $request->validate([
            'type'  => 'required|string|max:50',
            'value' => 'required|string|max:255',
        ]);

        $contact->update($validated);

        return redirect()
            ->route('owner.contacts.index')
            ->with('success', 'Contact updated successfully!');
    }

    /* =========================
     *  DELETE CONTACT
     * ========================= */
    public function destroy(Contact $contact)
    {
        $this->authorizeOwner($contact);

        $contact->delete();

        return redirect()
            ->route('owner.contacts.index')
            ->with('success', 'Contact deleted successfully!');
    }

    /* =========================
     *  OWNER AUTHORIZATION
     * ========================= */
    private function authorizeOwner(Contact $contact)
    {
        abort_if($contact->owner_id !== Auth::id(), 403);
    }
}
