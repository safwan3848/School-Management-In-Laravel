<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Spatie\Image\Image;

class EventController extends Controller
{
    // 🔥 Reusable image upload + optimize function
    private function uploadImage($file, $oldImage = null)
    {
        if (!$file) {
            return $oldImage; // no new image uploaded
        }

        // Delete old image if exists
        if ($oldImage && file_exists(public_path("uploads/events/$oldImage"))) {
            unlink(public_path("uploads/events/$oldImage"));
        }

        // New optimized image
        $imageName = time() . '.' . $file->extension();

        Image::load($file->path())
            ->quality(75)
            ->width(1000)
            ->optimize()
            ->save(public_path("uploads/events/" . $imageName));

        return $imageName;
    }

    // 📌 List view
    public function index(Request $request)
    {
        $query = Event::query()->latest();

        // 🔍 Search by title
        if ($request->filled('search')) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }

        // 🔍 Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 📌 Paginate with query strings preserved
        $events = $query->paginate(5)->appends($request->all());

        return view('admin.events.index', compact('events'));
    }


    // 📌 Create page
    public function create()
    {
        return view('admin.events.create');
    }

    // 📌 Store event
    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required',
            'event_datetime' => 'required',
            'description'    => 'required',
            'image'          => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'status'         => 'required|in:0,1',
        ]);

        $imageName = $this->uploadImage($request->image);

        Event::create([
            'title'          => $request->title,
            'event_datetime' => $request->event_datetime,
            'price'          => $request->price ?? 'Free',
            'description'    => $request->description,
            'attendees'      => $request->attendees ?? 0,
            'status'         => $request->status,
            'image'          => $imageName,
        ]);

        return redirect()->route('events.index')->with('success', 'Event Created Successfully');
    }

    // 📌 Edit page
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    // 📌 Update event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title'          => 'required',
            'event_datetime' => 'required',
            'description'    => 'required',
            'image'          => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'status'         => 'required|in:0,1',
        ]);

        $imageName = $this->uploadImage($request->image, $event->image);

        $event->update([
            'title'          => $request->title,
            'event_datetime' => $request->event_datetime,
            'price'          => $request->price ?? 'Free',
            'description'    => $request->description,
            'attendees'      => $request->attendees ?? 0,
            'status'         => $request->status,
            'image'          => $imageName,
        ]);

        return redirect()->route('events.index')->with('success', 'Event Updated Successfully');
    }

    // 📌 Delete event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->image && file_exists(public_path("uploads/events/" . $event->image))) {
            unlink(public_path("uploads/events/" . $event->image));
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event Deleted Successfully');
    }

    // 📌 Event details view
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.show', compact('event'));
    }
}
