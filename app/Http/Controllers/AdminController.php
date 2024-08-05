<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    public function home()
    {
        return view('admin.dashboard');
    }

    public function addcountry(Request $request)
    {
        return view('admin.country.add_country');
    }
    public function savecountry(Request $request)
    {
        $data = [
            'country_name' => $request->countryName,


        ];

        // Insert the data into the 'master' table
        $savedata = DB::table('country')->insert($data);
        //    return response()->json(['message' => 'Data saved successfully'], 201);
        return redirect()->route('admin.viewcountry');
    }
    public function viewcountry(Request $request)
    {
        $getdata = DB::table('country')->get();
        return view('admin.country.view_country', compact('getdata'));
    }



    public function updatecountry(Request $request){

        $id        = $request->input('hiddenid');
        $data = [
            'country_name' => $request->countryName,


        ];
        $updatedata = DB::table('country')->where('country_id', $id)->update($data); // Fetch the specific state record

        if ($updatedata) {
            $request->session()->flash('alert-success', 'Country successfully saved!');
            return redirect('/admin/country/viewcountry');
        } else {
            $request->session()->flash('alert-error', 'Country could not be saved!');
            return redirect('/admin/country/viewcountry');
        }
    }

     public function deletecountry(Request $request,$id){


        // Delete the record from the 'icons' table
        $delete = DB::table('country')->where('country_id', $id)->delete();

        if ($delete) {
            // Optionally delete the image from storage


                $request->session()->flash('alert-success', 'State successfully saved!');
                return redirect('/admin/country/viewcountry');
            } else {
                $request->session()->flash('alert-error', 'State could not be saved!');
                return redirect('/admin/country/viewcountry');
            }


    }
    public function editcountry(Request $request,$getId){

        $editdata = DB::table('country')->where('country_id', $getId)->first(); // Fetch the specific state record

        if (!$editdata) {
            // Handle the case where the state record is not found
            return redirect()->route('admin.contry.edit_country')->with('error', 'icons not found');
        }

        return view('admin.country.edit_country', compact('editdata'));
    }
    public function addstate(Request $request)
    {
        $getdata = DB::table('country')->get();
        return view('admin.state.add_state', compact('getdata'));
    }

    // public function savestate(Request $request)
    // {
    //     $request->validate([
    //         "stateName" => "required",
    //         "address" => "required",
    //         "country_id" => "required",
    //         "guests" => "required",
    //         "age" => "required",
    //         "image" => "required",

    //     ]);

    //     $imagePath = $request->file('image')->store('images', 'public');
    //     $data = [
    //         'state_name'     => $request->stateName,
    //         'address'  => $request->address,
    //         'country_id'  => $request->country_id,
    //         'guests'    => $request->guests,
    //         'age'    => $request->age,
    //         // 'image'    => $request->image,
    //         'image' => $imagePath,

    //     ];

    //     // Insert the data into the 'master' table
    //     $savedata = DB::table('state')->insert($data);
    //     if ($savedata) {

    // 		$request->session()->flash('alert-success', ' Country Successfully save...!');
    // 		return redirect('/admin/state/viewstate');

    // 	} else {

    // 		$request->session()->flash('alert-error', 'Country Can Not save...!');
    // 		return redirect('/admin/state/viewstate');

    // 	}

    // }
    public function savestate(Request $request)
    {
        // Validate form data including the image
        $request->validate([
            "stateName" => "required",
            "address" => "required",
            "country_id" => "required",
            "guests" => "required",
            "age" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg|max:2048", // Ensure image is of correct type and size
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public'); // Store image and get its path
        }

        // Prepare data for insertion
        $data = [
            'state_name'     => $request->stateName,
            'address'        => $request->address,
            'country_id'     => $request->country_id,
            'guests'         => $request->guests,
            'age'            => $request->age,
            'image'          => $imagePath, // Save the path of the uploaded image
        ];

        // Insert data into the 'state' table
        $savedata = DB::table('state')->insert($data);

        if ($savedata) {
            $request->session()->flash('alert-success', 'State successfully saved!');
            return redirect('/admin/state/viewstate');
        } else {
            $request->session()->flash('alert-error', 'State could not be saved!');
            return redirect('/admin/state/viewstate');
        }
    }

    public function viewstate()
    {
        $getdata = DB::table('state')->get();
        return view('admin.state.view_state', compact('getdata'));
    }

    public function editstate(Request $request, $getId)
    {
        $getdata = DB::table('country')->get(); // Fetch all countries
        $editdata = DB::table('state')->where('state_id', $getId)->first(); // Fetch the specific state record

        if (!$editdata) {
            // Handle the case where the state record is not found
            return redirect()->route('admin.states')->with('error', 'State not found');
        }

        return view('admin.state.edit_state', compact('editdata', 'getdata'));
    }
    public function updatestate(Request $request)
    {
        $request->validate([
            "stateName" => "required",
            "address" => "required",
            "country_id" => "required",
            "guests" => "required",
            "age" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg|max:2048",

        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public'); // Store image and get its path
        }
        $id        = $request->input('hiddenid');
        // Prepare the data to insert into the database
        $data = [
            'state_name'     => $request->stateName,
            'address'  => $request->address,
            'country_id'  => $request->country_id,
            'guests'    => $request->guests,
            'age'    => $request->age,

            // 'image'    => $request->image,
            'image' => $imagePath, // Save the image path
        ];


        $updateData = DB::table('state')->where('state_id', $id)->update($data);

        if ($updateData) {

            $request->session()->flash('alert-success', ' Country Successfully update...!');
            return redirect('/admin/state/viewstate');
        } else {

            $request->session()->flash('alert-error', 'Country Can Not update...!');
            return redirect('/admin/state/viewstate');
        }
    }
    public function addicons(Request $request)
    {
        return view('admin.IconsCategory.add_icons');
    }
    public function saveicons(Request $request)
    {
        // Validate the form data including the image
        $request->validate([
            "iconsName" => "required|string|max:255",
            "image" => "required|image|mimes:jpeg,png,jpg|max:2048", // Ensure the image is of correct type and size
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('icons', 'public'); // Store image and get its path
        }

        // Prepare data for insertion
        $data = [
            'iconse_name' => $request->iconsName,
            'image' => $imagePath, // Save the path of the uploaded image
        ];

        // Insert data into the 'icons' table
        $savedata = DB::table('icons')->insert($data);

        if ($savedata) {
            $request->session()->flash('alert-success', 'Icon successfully saved!');
            return redirect('/admin/icons/viewicons');
        } else {
            $request->session()->flash('alert-error', 'Icon could not be saved!');
            return redirect('/admin/icons/viewicons');
        }
    }

    public function viewicons()
    {
        $getdata = DB::table('icons')->get();
        return view('admin.IconsCategory.view_icons', compact('getdata'));
    }


        public function editicons($getId)
    {
        // Fetch the specific icon record by ID
        $editdata = DB::table('icons')->where('icons_id', $getId)->first();

        if (!$editdata) {
            // Redirect with an error message if the record is not found
            return redirect()->route('admin.IconsCategory.viewicons')->with('alert-error', 'Icon not found');
        }

        return view('admin.IconsCategory.edit_icons', compact('editdata'));
    }

    // public function updateicons(Request $request)
    // {
    //     // Validate form data
    //     $request->validate([
    //         "iconsName" => "required|string|max:255",
    //         "image" => "nullable|image|mimes:jpeg,png,jpg|max:2048", // Image validation is optional
    //     ]);

    //     // Retrieve the current image path
    //     $id = $request->input('hiddenid');
    //     $currentData = DB::table('icons')->where('icons_id', $id)->first();
    //     $currentImagePath = $currentData->image;

    //     // Handle image upload
    //     $imagePath = $currentImagePath; // Default to current image path
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imagePath = $image->store('icons', 'public'); // Store image and get its path

    //         // Optionally delete the old image if a new one is uploaded
    //         if ($currentImagePath) {
    //             Storage::disk('public')->delete($currentImagePath);
    //         }
    //     }

    //     // Prepare data for update
    //     $data = [
    //         'iconse_name' => $request->iconsName,
    //         'image' => $imagePath, // Save the path of the uploaded image or keep the old one
    //     ];

    //     // Update the record in the 'icons' table
    //     $updateData = DB::table('icons')->where('icons_id', $id)->update($data);

    //     if ($updateData) {
    //         $request->session()->flash('alert-success', 'Icon successfully updated!');
    //         return redirect('/admin/icons/viewicons');
    //     } else {
    //         $request->session()->flash('alert-error', 'Icon could not be updated!');
    //         return redirect('/admin/icons/viewicons');
    //     }
    // }
    public function updateicons(Request $request)
    {
        // Validate form data
        $request->validate([
            "iconsName" => "required|string|max:255",
            "image" => "nullable|image|mimes:jpeg,png,jpg|max:2048", // Image validation is optional
        ]);

        // Retrieve the current image path
        $id = $request->input('hiddenid');
        $currentData = DB::table('icons')->where('icons_id', $id)->first();
        $currentImagePath = $currentData->image;

        // Handle image upload
        $imagePath = $currentImagePath; // Default to current image path
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('icons', 'public'); // Store image and get its path

            // Optionally delete the old image if a new one is uploaded
            if ($currentImagePath && $currentImagePath !== $imagePath) {
                Storage::disk('public')->delete($currentImagePath);
            }
        }

        // Prepare data for update
        $data = [
            'iconse_name' => $request->iconsName,
            'image' => $imagePath, // Save the path of the uploaded image or keep the old one
        ];

        // Update the record in the 'icons' table
        $updateData = DB::table('icons')->where('icons_id', $id)->update($data);

        if ($updateData) {
            $request->session()->flash('alert-success', 'Icon successfully updated!');
            return redirect('/admin/icons/viewicons');
        } else {
            $request->session()->flash('alert-error', 'Icon could not be updated!');
            return redirect('/admin/icons/viewicons');
        }
    }


public function deleteicons($id)
{
    // Retrieve the current image path
    $currentData = DB::table('icons')->where('icons_id', $id)->first();
    $currentImagePath = $currentData->image;

    // Delete the record from the 'icons' table
    $delete = DB::table('icons')->where('icons_id', $id)->delete();

    if ($delete) {
        // Optionally delete the image from storage
        if ($currentImagePath) {
            Storage::disk('public')->delete($currentImagePath);
        }

        return redirect('/admin/icons/viewicons')->with('alert-success', 'Icon successfully deleted!');
    } else {
        return redirect('/admin/icons/viewicons')->with('alert-error', 'Icon could not be deleted!');
    }
}

  public function hostedstate(){
    $getdata = DB::table('state')->get();
    return view('admin.hosted.add_hosted',compact('getdata'));
  }

  public function savehosted(Request $request){


      // Validate the form data including the image
    //   $request->validate([
    //     "iconsName" => "required|string|max:255",
    //     "image" => "required|image|mimes:jpeg,png,jpg|max:2048", // Ensure the image is of correct type and size
    // ]);

    // Handle image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('hosted', 'public'); // Store image and get its path
    }

    // Prepare data for insertion
    $data = [
        'name' => $request->Name,
        'state_id' => $request->state_id,
        'hosted_by' => $request->hostedBy,
        'guest_price' => $request->guestPrice,
        'image' => $imagePath, // Save the path of the uploaded image
    ];

    // Insert data into the 'icons' table
    $savedata = DB::table('hosted')->insert($data);

    if ($savedata) {
        $request->session()->flash('alert-success', 'Icon successfully saved!');
        return redirect('/admin/hosted/viewhosted');
    } else {
        $request->session()->flash('alert-error', 'Icon could not be saved!');
        return redirect('/admin/hosted/viewhosted');
    }
}

public function viewhosted(Request $request)
{
    $getdata = DB::table('hosted')->get();
    // This will dump the content of $getdata
    return view('admin.hosted.view_hosted', compact('getdata'));
}
public function addnextpageshow(Request $request) {
    $getdata = DB::table('state')->get();
    return view('admin.iconsclickimageshow.Add_image',compact('getdata'));
}

public function savenextpageshow(Request $request){



  // Handle image upload
  $imagePath = null;
  if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imagePath = $image->store('Iconsbutton', 'public'); // Store image and get its path
  }

  // Prepare data for insertion
  $data = [

      'state_id' => $request->state_id,
      'Kilometer' => $request->Kilometer,
      'date' => $request->date,
      'price' => $request->price,
      'image' => $imagePath, // Save the path of the uploaded image
  ];

  // Insert data into the 'icons' table
  $savedata = DB::table('buttonclickicons')->insert($data);

  if ($savedata) {
      $request->session()->flash('alert-success', 'Icon successfully saved!');
      return redirect('/admin/IconsButtonClick/viewnextpageshow');
  } else {
      $request->session()->flash('alert-error', 'Icon could not be saved!');
      return redirect('/admin/IconsButtonClick/viewnextpageshow');
  }
}


public function viewnextpageshow(Request $request)
{
    $getdata = DB::table('buttonclickicons')->get();
    // This will dump the content of $getdata
    return view('admin.iconsclickimageshow.view_image', compact('getdata'));
}
public function editnextpageshow($getId) {
    // Retrieve the specific record from the 'buttonclickicons' table
    $editdata = DB::table('buttonclickicons')->where('Ibtn_id', $getId)->first();

    // Retrieve all states from the 'states' table
    $getdata = DB::table('state')->get(); // Assuming 'states' table has 'state_id' and 'state_name'

    // Check if record exists
    if (!$editdata) {
        return redirect()->back()->with('error', 'Record not found');
    }

    // Pass the data to the view
    return view('admin.iconsclickimageshow.edit_image', compact('editdata', 'getdata'));
}

public function updatenextpageshow(Request $request) {
    // Retrieve the existing record to get the current image path
    $existingRecord = DB::table('buttonclickicons')->where('Ibtn_id', $request->input('hiddenid'))->first();

    // Handle image upload
    $imagePath = $existingRecord->image; // Default to existing image path
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('Iconsbutton', 'public'); // Store image and get its path
    }

    // Prepare data for update
    $data = [
        'state_id' => $request->state_id,
        'Kilometer' => $request->Kilometer,
        'date' => $request->date,
        'price' => $request->price,
        'image' => $imagePath, // Save the path of the uploaded image or existing image
    ];

    // Update the record in the 'buttonclickicons' table
    $updateData = DB::table('buttonclickicons')->where('Ibtn_id', $request->input('hiddenid'))->update($data);

    // Check if the update was successful
    if ($updateData) {
        $request->session()->flash('alert-success', 'Icon successfully updated!');
        return redirect('/admin/IconsButtonClick/viewnextpageshow');
    } else {
        $request->session()->flash('alert-error', 'Icon could not be updated!');
        return redirect('/admin/IconsButtonClick/viewnextpageshow');
    }
}

public function deletnextpageshow(Request $request,$id){


    // Delete the record from the 'icons' table
    $delete = DB::table('buttonclickicons')->where('Ibtn_id', $id)->delete();

    if ($delete) {
        // Optionally delete the image from storage


            $request->session()->flash('alert-success', 'State successfully saved!');
            return redirect('/admin/IconsButtonClick/viewnextpageshow');
        } else {
            $request->session()->flash('alert-error', 'State could not be saved!');
            return redirect('/admin/IconsButtonClick/viewnextpageshow');
        }


}
public function addimageclicknextpage() {

    return view('admin.imageclicknextpage.add_imageclick_nextpage');
}
public function saveimageclicknextpage(Request $request){

    $request->validate([
        "Name" => "required",
        "image1" => "required|image|mimes:jpeg,png,jpg|max:2048",
        "image2" => "required|image|mimes:jpeg,png,jpg|max:2048",
        "image3" => "required|image|mimes:jpeg,png,jpg|max:2048",
        "image4" => "required|image|mimes:jpeg,png,jpg|max:2048",
        "image5" => "required|image|mimes:jpeg,png,jpg|max:2048",
        "addreshome" => "required",
        "facility" => "required",
        "Hosted" => "required",
        "description" => "required",
    ]);
    $imagePaths = null;
    if ($request->hasFile('image1')) {
        $image = $request->file('image1');
        $imagePaths = $image->store('image1', 'public'); // Store image and get its path
    }
    $imagePathes = null;
    if ($request->hasFile('image2')) {
        $image = $request->file('image2');
        $imagePathes = $image->store('image2', 'public'); // Store image and get its path
    }
    $imagePathss = null;
    if ($request->hasFile('image3')) {
        $image = $request->file('image3');
        $imagePathss = $image->store('image3', 'public'); // Store image and get its path
    }
    $imagePathsss = null;
    if ($request->hasFile('image4')) {
        $image = $request->file('image4');
        $imagePathsss = $image->store('image4', 'public'); // Store image and get its path
    }
    $imagePathess = null;
    if ($request->hasFile('image5')) {
        $image = $request->file('image5');
        $imagePathess = $image->store('image5', 'public'); // Store image and get its path
    }

    // Prepare data for insertion
    $data = [
        'Name'                   => $request->Name,
        'image1'                 => $imagePaths,
        'image2'                 => $imagePathes,
        'image3'                 => $imagePathss,
        'image4'                 => $imagePathsss,
        'image5'                 => $imagePathess,
        'address_home'           => $request->addreshome,
        'facility_available'     => $request->facility,
        'hosted_by'              => $request->Hosted,
        'discreaption'           => $request->description,// Save the path of the uploaded image
    ];

    // Insert data into the 'state' table
    $savedata = DB::table('property')->insert($data);

    if ($savedata) {
        $request->session()->flash('alert-success', 'Address successfully saved!');
        return redirect('/admin/IconsButtonClick/viewimageclicknextpage');
    } else {
        $request->session()->flash('alert-error', 'Address could not be saved!');
        return redirect('/admin/IconsButtonClick/viewimageclicknextpage');
    }

}
public function viewimageclicknextpage(){
   // This will dump the content of $getdata

   return view('admin.imageclicknextpage.view_imageclick_nextpage');

}
public function getviewimageclicknextpage(Request $request){

    if ($request->ajax()) {
        $getdata = DB::table('property')->get();

       return response()->json(['data' => $getdata]);
   }

}
public function editimageclicknextpage(Request $request,$getId){
    $id = base64_decode($getId);

    $editdata = DB::table('property')->where('pro_id', $id)->first();

    // Retrieve all states from the 'states' table

    // Check if record exists
    if (!$editdata) {
        return redirect()->back()->with('error', 'Record not found');
    }

    // Pass the data to the view
    return view('admin.imageclicknextpage.edit_imageclick_nextpage', compact('editdata'));

}
// public function updateimageclicknextpage(Request $request){

//     $existingRecord = DB::table('pastexperieance')->where('pro_id', $request->input('hiddenid'))->first();

//     // Check if record exists
//     if (!$existingRecord) {
//         $request->session()->flash('alert-error', 'Record not found!');
//         return redirect('/admin/IconsButtonClick/viewimageclicknextpage');
//     }

//     $request->validate([
//         "Name" => "required",
//         "image1" => "required|image|mimes:jpeg,png,jpg|max:2048",
//         "image2" => "required|image|mimes:jpeg,png,jpg|max:2048",
//         "image3" => "required|image|mimes:jpeg,png,jpg|max:2048",
//         "image4" => "required|image|mimes:jpeg,png,jpg|max:2048",
//         "image5" => "required|image|mimes:jpeg,png,jpg|max:2048",
//         "addreshome" => "required",
//         "facility" => "required",
//         "Hosted" => "required",
//         "description" => "required",
//     ]);
//     $imagePaths = null;
//     if ($request->hasFile('image1')) {
//         $image = $request->file('image1');
//         $imagePaths = $image->store('image1', 'public'); // Store image and get its path
//     }
//     $imagePathes = null;
//     if ($request->hasFile('image2')) {
//         $image = $request->file('image2');
//         $imagePathes = $image->store('image2', 'public'); // Store image and get its path
//     }
//     $imagePathss = null;
//     if ($request->hasFile('image3')) {
//         $image = $request->file('image3');
//         $imagePathss = $image->store('image3', 'public'); // Store image and get its path
//     }
//     $imagePathsss = null;
//     if ($request->hasFile('image4')) {
//         $image = $request->file('image4');
//         $imagePathsss = $image->store('image4', 'public'); // Store image and get its path
//     }
//     $imagePathess = null;
//     if ($request->hasFile('image5')) {
//         $image = $request->file('image5');
//         $imagePathess = $image->store('image5', 'public'); // Store image and get its path
//     }

//     // Prepare data for insertion
//     $data = [
//         'Name'                   => $request->Name,
//         'image1'                 => $imagePaths,
//         'image2'                 => $imagePathes,
//         'image3'                 => $imagePathss,
//         'image4'                 => $imagePathsss,
//         'image5'                 => $imagePathess,
//         'address_home'           => $request->addreshome,
//         'facility_available'     => $request->facility,
//         'hosted_by'              => $request->Hosted,
//         'discreaption'           => $request->description,// Save the path of the uploaded image
//     ];

//     // Insert data into the 'state' table
//     // Update the record in the 'pastexperieance' table
//     $updateData = DB::table('property')->where('pro_id', $request->input('hiddenid'))->update($data);

//     // Check if the update was successful
//     if ($updateData) {
//         $request->session()->flash('alert-success', 'Experience successfully updated!');
//         return redirect('/admin/IconsButtonClick/viewimageclicknextpage');
//     } else {
//         $request->session()->flash('alert-error', 'Experience could not be updated!');
//         return redirect('/admin/IconsButtonClick/viewimageclicknextpage');
//     }
// }
public function updateimageclicknextpage(Request $request)
{
    // Validate the input data
    $request->validate([
        "Name" => "required",
        "image1" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        "image2" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        "image3" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        "image4" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        "image5" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        "addreshome" => "required",
        "facility" => "required",
        "Hosted" => "required",
        "description" => "required",
    ]);

    // Check if record exists
    $existingRecord = DB::table('property')->where('pro_id', $request->input('hiddenid'))->first();
    if (!$existingRecord) {
        $request->session()->flash('alert-error', 'Record not found!');
        return redirect('/admin/IconsButtonClick/viewimageclicknextpage');
    }

    // Handle file uploads
    $data = [
        'Name' => $request->input('Name'),
        'address_home' => $request->input('addreshome'),
        'facility_available' => $request->input('facility'),
        'hosted_by' => $request->input('Hosted'),
        'discreaption' => $request->input('description'),
    ];

    foreach (['image1', 'image2', 'image3', 'image4', 'image5'] as $imageField) {
        if ($request->hasFile($imageField)) {
            $image = $request->file($imageField);
            $data[$imageField] = $image->store($imageField, 'public'); // Store image and get its path
        } else {
            // If no file is provided, keep the existing value
            $data[$imageField] = $existingRecord->$imageField;
        }
    }

    // Update the record in the 'property' table
    $updateData = DB::table('property')->where('pro_id', $request->input('hiddenid'))->update($data);

    // Check if the update was successful
    if ($updateData) {
        $request->session()->flash('alert-success', 'Experience successfully updated!');
        return redirect('/admin/IconsButtonClick/viewimageclicknextpage');
    } else {
        $request->session()->flash('alert-error', 'Experience could not be updated!');
        return redirect('/admin/IconsButtonClick/viewimageclicknextpage');
    }
}
public function deletimageclicknextpage(Request $request, $id)
{
    // Decode the Base64-encoded ID
    $decodedId = base64_decode($id);

    // Perform the deletion
    $deleted = DB::table('property')->where('pro_id', $decodedId)->delete();

    // Return JSON response
    if ($deleted) {
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false], 500);
    }
}


public function addPastexperiences(){
    $getdata = DB::table('state')->get();
    return view('admin.PastExperiences.add_pastexperience',compact('getdata'));
}

public function savePastexperiences(Request $request){

  // Handle image upload
  $imagePath = null;
  if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imagePath = $image->store('pastExp', 'public'); // Store image and get its path
  }

  // Prepare data for insertion
  $data = [

      'Name' => $request->name,
      'Hosted_by' => $request->hostedBy,
      'Sold_out_Name' => $request->soldName,
      'image' => $imagePath, // Save the path of the uploaded image
  ];

  // Insert data into the 'icons' table
  $savedata = DB::table('pastexperieance')->insert($data);

  if ($savedata) {
      $request->session()->flash('alert-success', 'Icon successfully saved!');
      return redirect('/admin/Pastexperiences/viewPastexperiences');
  } else {
      $request->session()->flash('alert-error', 'Icon could not be saved!');
      return redirect('/admin/Pastexperiences/viewPastexperiences');
  }
}
public function viewPastexperiences(){

    $getdata = DB::table('pastexperieance')->get();
    // This will dump the content of $getdata
    return view('admin.PastExperiences.view_pastexperieance', compact('getdata'));

}
public function editPastexperiences($getId) {
    // Retrieve the specific record from the 'buttonclickicons' table
    $editdata = DB::table('pastexperieance')->where('past_id', $getId)->first();

    // Retrieve all states from the 'states' table

    // Check if record exists
    if (!$editdata) {
        return redirect()->back()->with('error', 'Record not found');
    }

    // Pass the data to the view
    return view('admin.PastExperiences.edit_pastexperience', compact('editdata'));
}
public function updatePastexperiences(Request $request) {
    // Retrieve the existing record to get the current image path
    $existingRecord = DB::table('pastexperieance')->where('past_id', $request->input('hiddenid'))->first();

    // Check if record exists
    if (!$existingRecord) {
        $request->session()->flash('alert-error', 'Record not found!');
        return redirect('/admin/Pastexperiences/viewPastexperiences');
    }

    // Handle image upload
    $imagePath = $existingRecord->image; // Default to existing image path
    if ($request->hasFile('image')) {
        // Validate the image (optional, but recommended)
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust validation rules as needed
        ]);

        // Store the new image and update the path
        $image = $request->file('image');
        $imagePath = $image->store('pastExp', 'public'); // Store image and get its path
    }

    // Prepare data for update
    $data = [
        'Name' => $request->input('name'),
        'Hosted_by' => $request->input('hostedBy'),
        'Sold_out_Name' => $request->input('soldName'),
        'image' => $imagePath, // Save the path of the uploaded image or existing image
    ];

    // Update the record in the 'pastexperieance' table
    $updateData = DB::table('pastexperieance')->where('past_id', $request->input('hiddenid'))->update($data);

    // Check if the update was successful
    if ($updateData) {
        $request->session()->flash('alert-success', 'Experience successfully updated!');
        return redirect('/admin/Pastexperiences/viewPastexperiences');
    } else {
        $request->session()->flash('alert-error', 'Experience could not be updated!');
        return redirect('/admin/Pastexperiences/viewPastexperiences');
    }
}

 public function deletPastexperiences(Request $request,$id){


    // Delete the record from the 'icons' table
    $delete = DB::table('pastexperieance')->where('past_id', $id)->delete();

    if ($delete) {
        // Optionally delete the image from storage


            $request->session()->flash('alert-success', 'Delete successfully saved!');
            return redirect('/admin/Pastexperiences/viewPastexperiences');
        } else {
            $request->session()->flash('alert-error', 'Delete could not be saved!');
            return redirect('/admin/Pastexperiences/viewPastexperiences');
        }


}




}

