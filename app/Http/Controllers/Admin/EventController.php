<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'event_datetime' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'status' => 'required|in:0,1'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/events'), $imageName);
        }

        Event::create([
            'title' => $request->title,
            'event_datetime' => $request->event_datetime,
            'price' => $request->price ?? 'Free',
            'description' => $request->description,
            'attendees' => $request->attendees ?? 0,
            'status' => $request->status ?? 1,
            'image' => $imageName
        ]);

        return redirect()->route('events.index')->with('success', 'Event Created Successfully');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'event_datetime' => 'required',
            'description' => 'required',
        ]);

        $imageName = $event->image;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/events'), $imageName);
        }

        $event->update([
            'title' => $request->title,
            'event_datetime' => $request->event_datetime,
            'price' => $request->price ?? 'Free',
            'description' => $request->description,
            'attendees' => $request->attendees ?? 0,
            'status' => $request->status ?? 1,
            'image' => $imageName
        ]);

        return redirect()->route('events.index')->with('success', 'Event Updated Successfully');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->image && file_exists(public_path('uploads/events/' . $event->image))) {
            unlink(public_path('uploads/events/' . $event->image));
        }

        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event Deleted Successfully');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.show', compact('event'));
    }
}
