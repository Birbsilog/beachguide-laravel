

// namespace App\Http\Controllers;

// use App\Models\Beach;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;





// class BeachOwnerController extends Controller
// {
    
   
//     public function create()
//     {
//         return view('owner.beaches.create');
//     }
//     public function index()
//     {
  
//     $beaches = Beach::where('owner_id', Auth::id())->get()->map(function ($beach) {
//     $beach->image_url = $beach->image 
//         ? asset('storage/' . $beach->image)
//         : asset('images/default.jpg');
//     return $beach;
//     });

//     return view('owner.beaches.index', compact('beaches'));


//     }

    
// public function store(Request $request)
// {
//     $validated = $request->validate([
//         'name' => 'required|string|max:255',
//         'description' => 'nullable|string',
//         'latitude' => 'nullable|numeric',
//         'longitude' => 'nullable|numeric',
//         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         'amenities.*.description' => 'nullable|string',
//         'amenities.*.images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//     ]);


//     $beach = new Beach();
//     $beach->name = $request->name;
//     $beach->description = $request->description;
//     $beach->latitude = $request->latitude;
//     $beach->longitude = $request->longitude;
//     $beach->owner_id = Auth::id();

//     if ($request->hasFile('image')) {
//         $beach->image = $request->file('image')->store('beaches', 'public');
//     }

//     $beach->save();

//     if ($request->has('amenities')) {
//         foreach ($request->amenities as $amenityData) {
//             $images = [];

//             if (isset($amenityData['images'])) {
//                 foreach ($amenityData['images'] as $file) {
//                     $images[] = $file->store('amenities', 'public'); 
//                 }
//             }

//             $beach->amenities()->create([
//                 'description' => $amenityData['description'] ?? null,
//                 'images' => json_encode($images), 
//             ]);
//         }
//     }

//     return redirect()
//         ->route('beaches.index')
//         ->with('success', 'Beach and amenities created successfully.');
// }


//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'name'        => 'required|string|max:255',
//             'location'    => 'required|string|max:255',
//             'description' => 'nullable|string',
//             'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         ]);

//         $beach = Beach::findOrFail($id);
//         $beach->name = $request->name;
//         $beach->location = $request->location;
//         $beach->description = $request->description;

       
//         if ($request->hasFile('image')) {
//             $imagePath = $request->file('image')->store('beaches', 'public');
//             $beach->image = $imagePath;
//         }

//         $beach->save();

//         return redirect()->route('beach-owners.index')
//                          ->with('success', 'Beach updated successfully!');
//     }
// }
