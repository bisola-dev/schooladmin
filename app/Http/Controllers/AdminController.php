<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Protection;


use App\Imports\payyyImport;
use App\Imports\StudentsImport;


use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;

use App\Models\Admin;
use App\Models\classrm;
use App\Models\tezz;
use App\Models\ova;
use App\Models\student;
use App\Models\payyy;
use App\Models\seszion;
use App\Models\paymenttype;
use App\Models\subby;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use League\Csv\Writer;

class AdminController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
{
    // Validate the request
    $request->validate([
        'adminmail' => 'required|email',
        'password' => 'required',
    ]);

    // Extract input values
    $adminmail = $request->input('adminmail');
    $password = $request->input('password');

    // Custom hashing logic
    $hi = 'kokoro2' . $adminmail;
    $hemal = md5($hi);

    $dopwd = 'kokoro' . $password;
    $hpwd = md5($dopwd);

    //dd($hemal .' '.$hpwd);

    // Check credentials
    $admin = Admin::where('hemal', $hemal)
                   ->where('hpazz', $hpwd)
                   ->first();
                
    if ($admin) {

     
        // Authentication passed
        Auth::guard('admin')->login($admin);

        // Store additional session data
        Session::put('id', $admin->id);
        Session::put('admail', $admin->admail);
        Session::put('fulln', $admin->fulln);
        Session::put('schname', $admin->schname);
        Session::put('role', $admin->role);

        
        // Redirect to a common dashboard or home page
        return redirect()->route('admin.dashboardsuper')->with('success', 'You have successfully logged in');
    } else {
        // Handle failed authentication
        return back()->withErrors(['Invalid credentials']);
    }
}

public function storeuser(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'fulln' => 'required|string|max:255|unique:admin',
        'admail' => 'required|email|max:255|unique:admin',
        'rolez' => 'required|integer|in:1,2,3',
    ]);

      $hpazz='7b15ac9642f049be2123a8958ced34e5';

    $adminmail2 = $request->input('admail');
    $password2 = $request->input('password');
     // Custom hashing logic
     $hi = 'kokoro2' . $adminmail2;
     $hemal = md5($hi);

   
                 
    // Create a new user
    $user = new Admin();
    $user->fulln= $validatedData['fulln'];
    $user->admail =  $adminmail2 ;
    $user->hemal =   $hemal;
    $user->hpazz=  $hpazz; 
    $user->role = $validatedData['rolez'];
    $user->save();
    $admins = Admin::all();
    // Redirect with success message
    return redirect()->route('admin.createadmin')
                     ->with('success', 'admin created successfully!');
}


public function Dashboardsuperadmin()
{
    // Retrieve the currently authenticated admin
    $admin = Auth::guard('admin')->user();

    if ($admin) {
        // Check if 'passupdat' is 0 (meaning password update is required)
        if ($admin->passupdat == 0) {
            // Redirect to password update page
            return redirect()->route('admin.passreset')->with('success', 'You have successfully signed in. Please update your password!');
        } else {
            // Return to the admin dashboard
            return view('Admin.dashboardsuper');
        }
    } else {
        // Handle the case where the admin is not authenticated
        return redirect()->route('admin.login')->with('error', 'Please log in to access the dashboard.');
    }
}



public function Dashboardapp()
{
    return view('Admin.dashboardapp');
}


public function createadmin()
{
   
    $admins = Admin::all(); // or use paginate() if you have many records

    return view('admin.createadmin', compact('admins'));
}




public function updateuser(Request $request, $id)
    {
        $request->validate([
            'fulln' => 'required|string|max:255',
            'admail' => 'required|email',
            'hpazz' => 'nullable|string|min:8',
            'rolez' => 'required|integer'
        ]);


    $adminmail2 = $request->input('admail');
    $password2 = $request->input('password');

        $hi = 'kokoro2' . $adminmail2;
        $hemal = md5($hi);
    
        $dopwd = 'kokoro' . $password2;
        $hpwd = md5($dopwd);
      

        $admin = admin::findOrFail($id);
        $admin->fulln = $request->input('fulln');
        $admin->admail = $request->input('admail');
        $admin->hemal = $hemal;
        $admin->hpazz = $hpwd;
        $admin->role = $request->input('rolez');
        $admin->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    // Delete the user
    public function deleteuser($id)
    {
        $admin = admin::findOrFail($id);
        $admin->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }




public function hedad2()
{
    return view('Admin.hedad2');
}



public function siderd2(){

    return view('admin.siderd2');
}




public function passreset()
{
    return view('Admin.passreset');
}

public function createclass(){
    $classrm = classrm::orderBy('classname', 'asc')->paginate(3);
    return view('admin.createclass', compact('classrm'));
   }

public function createclassprocess(Request $request){
    $request->validate([ 
        'classname'=>'required|unique:classrm,classname',
        'admail'=>'required',
        ]); 

$admail=$request->input('admail');       
$mewa='created by'.$admail;

 if($admail){

    $data = $request->input(); 
    $classrm=new classrm();
    $classrm->classname=$data['classname'];
    $classrm->admail=$mewa;
    $classrm->save();
  return back ()->withsuccess('class details successfully created.');
}    
  else{
    return back ()->witherrors('class not successfully created');
   
   }   
    } 

 
    public function createclassedit(Request $request, $id)
        {   $classrm = classrm::find($request->get('id'));   

            if ($id!="") {
              
            $classrm->classname=$request->get('classname');
            $classrm->save(); 
        return back()->withsuccess('classname successfully changed.');
        }
        else{
    
        return back()->witherrors('please try again , no update.');
        }
        }                                                                                                                                                                                                                                                                

        
 public function deleteclass(Request $request, $id)
 {
    $classrm = classrm::find($request->get('id'));   

    if ($id!="") {
     $classrm->delete();

 return back()->withsuccess('class deleted successfully');     
 }
else{
return back()->witherrors('class not deleted successfully');

}

}




public function createsubject(){
    // Paginate the results, showing 10 subjects per page
    $subby = subby::orderBy('subjectname', 'asc')->paginate(10);
    return view('admin.createsubject', compact('subby'));
   }
 

   public function createsubjectprocess(Request $request) {
    // Validate the request
    $request->validate([
        'subjectname' => 'required|unique:subby,subjectname',
        'admail' => 'required',
    ]);

    $admail = $request->input('admail');
    $mewa = 'created by ' . $admail;

    // Get the validated data
    $data = $request->only(['subjectname']);

    try {
        // Create a new subject
        $subby = new subby();
        $subby->subjectname = $data['subjectname'];
        $subby->save();

        // Return with a success message
        return redirect()->back()->with('success', 'Subject details successfully created.');
    } catch (\Exception $e) {
        // Handle any errors and return with an error message
        return redirect()->back()->with('error', 'Failed to create subject. Please try again.');
    }
}

 
    public function createsubjectedit(Request $request, $id)
        {   $subby = subby::find($request->get('id'));   
            if ($id!="") {
              
            $subby->subjectname=$request->get('subjectname');
            $subby->save(); 
        return back()->withsuccess('subject successfully changed.');
        }
        else{
    
        return back()->witherrors('please try again , no update.');
        }
        }                                                                                                                                                                                                                                                                

        
 public function deletesubject(Request $request, $id)
 {
    $subby =subby::find($request->get('id'));   

    if ($id!="") {
     $subby->delete();

 return back()->withsuccess('subject deleted successfully');     
 }
else{
return back()->witherrors('subject not deleted successfully');

}

}

public function createseszion() {
    // Retrieve paginated sessions
    $seszion = seszion::orderBy('sessname', 'asc')->paginate(3);

    // Transform each item in the paginated collection to include restored slashes
    $seszion->getCollection()->transform(function($session) {
        $session->restoredSessname = $this->restoreSlashes($session->sessname);
        return $session;
    });

    // Pass the modified paginated collection to the view
    return view('admin.createseszion', ['seszion' => $seszion]);
}

private function restoreSlashes($cleanedSessname) {
    // If the name already contains a slash, assume it's correctly formatted
    if (strpos($cleanedSessname, '/') !== false) {
        return $cleanedSessname; // No changes needed
    }
    
    // If no slash present, format as YYYY/YYYY
    if (strlen($cleanedSessname) >= 8) {
        return substr($cleanedSessname, 0, 4) . '/' . substr($cleanedSessname, 4);
    }

    // Handle cases where the length is less than expected
    return $cleanedSessname; // Return as-is if it doesn’t meet the expected format
}


   public function createseszionprocess(Request $request) {
    $request->validate([ 
        'sessname' => 'required|unique:seszion,sessname',
    ]); 

    $data = $request->only(['sessname']);

    $cleanedSessname = str_replace('/', '', $data['sessname']);

    // Debugging: Log the cleaned session name
    \Log::info('Cleaned Session Name: ' . $cleanedSessname);

    try { 
     $seszion = new seszion();
     $seszion->sessname = $cleanedSessname;
      $seszion->save();

        return back()->with('success', 'Session successfully created.');

    } catch (\Exception $e) {
        // Handle any errors and return with an error message
        return back()->witherrors('Failed to create session. Please  check if the session hasnt been created, then try again.');
       
    }
}
 
 
 
public function createseszionedit(Request $request, $id)
{
    $seszion = seszion::find($id);

    if ($seszion) {
        $data = $request->only(['sessname']);
        $cleanedSessname = str_replace('/', '', $data['sessname']);

        $seszion->sessname = $cleanedSessname;
        $seszion->save();
        return back()->with('success', 'Session successfully changed.');
    } else {

        return back()->with('error', 'Failed to update session. Please try again.');
    }
}
                                                                                                                                                                                                                                          

        
 public function deleteseszion(Request $request, $id)
 {
    $seszion = seszion::find($request->get('id'));   

    if ($seszion) {
     $seszion->delete();

 return back()->withsuccess('session  deleted successfully');     
 }
else{
return back()->witherrors('session  not deleted successfully');

}

}



public function addstudentpageedit(Request $request ){ 
    $request->validate([
        'id'=>'required',  
        'upid3'=>'required',  
        'sessid'=>'required',  
       
  ]); 
  
    $id=$request->input('id');
    $classid=$request->input('upid3');
    $sessid=$request->input('sessid');
 
 
    $students = student::find($request->get('id'));   
    if ( $students) {
      
    $students->sname=$request->get('sname3');
    $students->onames=$request->input('onames3');
    $students->dob=$request->input('dob3');
    $students->sessid=$request->get('sessid');
    $students->addy=$request->get('addy3');
    $students->parentname=$request->input('parentname3');
    $students->parentno=$request->input('parentno3');
    $students->parentemail=$request->input('parentemail3');



    $students->save(); 

    return back()->withsuccess('student details successfully updated.');
}                   
else {
    return back()->witherrors('please try again , error inserting record.'); }    

    }



    public function uploadlogostud(Request $request)
    {    $request->validate([
        'upid'=>'required',   
        'upid3'=>'required',   
        'updd' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'  
       
    ]); 
    
    
    $id=$request->input('upid');
    $classid=$request->input('upid3');
    $file=$request->file('updd');

    $filename=$file->hashName();

    $file->move(public_path('storage/studimg'), $filename);
    $student = student::find($id);

    if ($student) { 
        $student->studimg = $filename;
        $student->save();

    return back()->withsuccess('student picture successfully uploaded.');
    }                   
    else {
    return back()->witherrors('please try again .'); } 
    
      
    }
    
    
    
    


public function deleteaddstudent(Request $request, $id)
{   $students=student::find($id);
    if ($students) {
    $students->delete();
return back()->withsuccess('student details successfully deleted.');
}                   
else {
return back()->witherrors('please try again , error deleting record.'); } 

  
}

public function adminreset(Request $request, $id)
{
    $admin = admin::findOrFail($id); 


    $ju='7b15ac9642f049be2123a8958ced34e5';

    // Reset the password to the default value
    $admin->hpazz =$ju;
    $admin->save();

    return redirect()->back()->with('success', 'Password has been reset to the default value password@.');
}



public function passresetprocess(Request $request)
{ // Validate the request
    $request->validate([ 
   'old_password'=>'required|min:8',
   'new_password'=>'required|min:8|confirmed'
   
   ]); 
   $oldPassword=$request->input('old_password');
   $newpassword=$request->input('new_password');
  

   $dopwd='kokoro'.$newpassword;
   $hpazz=md5($dopwd);

    // Check if the new password matches the forbidden password
    $forbiddenPassword ='7b15ac9642f049be2123a8958ced34e5';
    if ($hpazz === $forbiddenPassword) {
        return back()->withErrors(['new_password' => 'This password is not allowed. Please choose a different password.']);
    }

   $admin = Admin::find(session('id'));
   if ($admin) {
    // Custom hashing for old password
    $oldPasswordHash = md5('kokoro' . $oldPassword);

    // Check if the old password matches the hashed password in the database
    if ($oldPasswordHash === $admin->hpazz) {

        // Update the password and 'passupdat' flag
        $admin->hpazz = $hpazz;
        $admin->passupdat = 1;
        $admin->save();

        return redirect()->route('admin.dashboardsuper')->with('success', 'Password successfully updated!');
    } else {
        // Handle incorrect old password
        return back()->withErrors(['old_password' => 'Current password is incorrect']);
    }
} else {
    // Handle case where admin is not found
    return back()->withErrors(['old_password' => 'Admin record not found']);
}
}
   
  
public function createsch() {
    // Check if an admin record with 'ket' = 1 exists
    $adminExists = Admin::where('ket', 1)->exists(); 
    if ($adminExists) {
        // Flash an error message to the session
        return redirect()->route('admin.createschview')->with('error', 'You have already filled in the school details! Proceed to edit if you desire to.');
    } else {
        // Flash a success message to the session
        return redirect()->route('admin.createsch')->with('success', 'Please create your school details!');
    }
}



public function createschview()
{
    $id = session('id');
    $Admin = Admin::where('id', $id)->get();
    return view('Admin.createschview',compact('Admin'));
}


  
public function createschprocess(Request $request){
     // Validate the request
     $request->validate([ 
    'fulln'=>'required',
    'schname'=>'required',
    'admail' => 'required|unique:admin,admail',
    'addy'=>'required',
    'fon'=>'required|min:11|max:14',
    
    ]); 
    $admail=$request->input('admail');
    $hi='kokoro2'.$admail;
    $hemal=md5($hi);


    $dopwd='kokoro'.'12345678';
    $hpazz=md5($dopwd);
 

    $admin = Admin::where('admail',$admail)
    ->get();

    $res = json_decode($admin,true);
    print_r($res);  

 if(sizeof($res)==0){
    $data = $request->input(); 
    $Admin= new admin();
    $Admin->fulln=$data['fulln'];
    $Admin->schname=$data['schname'];
    $Admin->admail=$data['admail'];
    $Admin->fon=$data['fon'];  
    $Admin->addy=$data['addy']; 
    $Admin->hpazz=$hpazz;  
    $Admin->hemal=$hemal;  
    $Admin->save();
 
return redirect()->route('admin.createschview')->withsuccess('school details successfully created.');
}

else{
 return redirect()->route('admin.createsch')->witherrors('school not successfully created');

}   

}





public function editschool(Request $request, $id)
{
    // Retrieve the admin record by the provided $id
    $Admin = Admin::find($id);

    // Check if the admin record exists
    if ($Admin) {
        // Process other request inputs
        $adminmail = $request->input('adminmail');
        $hi = 'kokoro2' . $adminmail;
        $hemal = md5($hi);

        // Update the admin details
        $Admin->schname = $request->input('schoolname');
        $Admin->addy = $request->input('address');
        $Admin->fulln = $request->input('fullname');
        $Admin->fon = $request->input('phone');
        $Admin->admail = $request->input('adminmail'); 
        $Admin->hemal = $hemal;
        $Admin->save(); // Use save() to update the record

        return back()->with('success', 'Details successfully updated.');
    } else {
        return back()->with('error', 'Please try again, no update.');
    }
}



public function uploadlogosch(Request $request, $id)
{
    // Find the Admin model instance by its ID
    $Admin = Admin::find($id);

    if ($request->hasFile('logo')) {
        // Get the uploaded file
        $file = $request->file('logo');

        // Generate a unique filename with current timestamp
        $filename = date('YmdHi') . '_' . $file->getClientOriginalName();

        // Move the file to the storage path
        $file->storeAs('public/Admin', $filename);

        // Save the filename or path to the database
        $Admin->logo = $filename;
        $Admin->save(); // Use save() instead of update() for individual model updates

        // Redirect with success message
        return redirect()->route('admin.createschview')->with('success', 'Logo successfully updated.');
    } else {
        // Redirect with error message if no file was uploaded
        return redirect()->route('admin.createschview')->with('error', 'Logo not successfully updated');
    }
}



public function viewclass(Request $request){
    $classrm = classrm::orderBy('classname', 'asc')->get();
    $classId = $request->input('classid');
    $seszion= seszion::all();
    $students = $classId ? student::where('classid', $classId)->get() : collect();
    return view('admin.viewclass', compact('classrm', 'students','seszion'));
   }


   public function viewstudents(Request $request) {
    $classId = $request->input('classid');
    $sessid = $request->input('sessid');
    
    // Fetch the class room details
    $classrm = classrm::where('id', $classId)->first();

    // Debugging
    \Log::info('Class ID: ' . $classId);
    \Log::info('Session ID: ' . $sessid);

    // Validate inputs
    if (!$classId || !$sessid) {
        return back()->with('error', 'Please select all the parameters to view. Class and Session are required.');
    }

    // Fetch students based on classId and sessid
    $students = Student::where('classid', $classId)
        ->where('sessid', $sessid) // Assuming students have a sessid attribute
        ->with('seszion')
        ->get();

    if ($students->isEmpty()) {
        return back()->with('error', 'No students available for the selected class and session.');
    }

    // Fetch all sessions for lookup
    $seszion = seszion::all()->keyBy('id'); // Key by ID for easy lookup

    // Map session names
    $sessionNames = $seszion->map(function($sess) {
        return $this->restoreSlashes($sess->sessname);
    })->toArray(); // Convert to array

    $currentSessionName = $sessid && isset($seszion[$sessid])
        ? $this->restoreSlashes($seszion[$sessid]->sessname)
        : 'Not Available';

    // Process session names for students
    $students->each(function($student) {
        if ($student->seszion) {
            $student->seszion->sessname = $this->restoreSlashes($student->seszion->sessname);
        }
    });

    // Return the view with required data
    return view('admin.viewselclasspage', compact('students', 'classrm', 'seszion', 'sessid', 'currentSessionName', 'sessionNames'));
}


   
  public function addstudentnew(Request $request)
{
    // Validate the incoming request data
    $request->validate([

        'sessid' => 'required|exists:seszion,id',
        'temid' => 'required|integer|in:1,2,3',
        'classid' => 'required|exists:classrm,id',
        'sname' => 'required|string|max:255',
        'onames' => 'nullable|string|max:255',
        'addy' => 'required|string|max:255',
        'dob' => 'required|date',
        'pno' => 'required|string|max:255',
        'pname' => 'required|string|max:255',
        'pemal' => 'nullable|string|max:255',
        'ppass' => 'nullable|string|max:255',
    ]);

    try {
        // Create a new student record
        $student = new student();
        $student->sessid = $request->input('sessid');
        $student->termid = $request->input('temid');
        $student->classid = $request->input('classid');
        $student->sname = $request->input('sname');
        $student->onames = $request->input('onames');
        $student->addy = $request->input('addy');
        $student->dob = $request->input('dob');
        $student->parentno = $request->input('pno');
        $student->parentname = $request->input('pname');
        $student->parentemail = $request->input('pemal');
        $student->ppass = $request->input('ppass'); // This will be null if not provided

        $student->save(); // Save the record to the database

        return redirect()->back()->with('success', 'Student added successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error inserting record. Please try again.');
    }
}


public function import(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'file' => 'required|mimes:xlsx',
            'classid' => 'required|exists:classrm,id',
            'sessid' => 'required|exists:seszion,id',
            'temid' => 'required|integer|in:1,2,3',
        ]);

        $file = $request->file('file');
        $classid = $request->input('classid');
        $sessid = $request->input('sessid');
        $temid = $request->input('temid');

        $spreadsheet = IOFactory::load($file->getPathname());
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        // Extract headers
        $headers = array_shift($rows);

        // Process each row
        foreach ($rows as $row) {
            $data = array_combine($headers, $row);

            // Validate row data
            $validator = Validator::make($data, [
                'sname' => 'required|string',
                'onames' => 'required|string',
                'addy' => 'required|string',
                'dob(yyyy-mm-dd)' => 'required|date_format:Y-m-d',
                'parentname' => 'required|string',
                'parentno' => 'required|string',
                'parentemail' => 'required|email',
            ]);

            if ($validator->fails()) {
                // Handle validation errors
                return back()->withErrors($validator)->withInput();
            }

            // Insert data into database
            Student::create([
                'sname' => $data['sname'],
                'onames' => $data['onames'],
                'addy' => $data['addy'],
                'dob' => $data['dob(yyyy-mm-dd)'],
                'parentname' => $data['parentname'],
                'parentno' => $data['parentno'],
                'parentemail' => $data['parentemail'],
                'classid' => $classid,
                'sessid' => $sessid,
                'termid' => $temid,
            ]);
        }

        return back()->with('success', 'File imported successfully');
    }


public function importpaye(Request $request)
{
    $request->validate([
        'classid' => 'required|exists:classrm,id',
        'payid' => 'required|exists:paymenttype,id',
        'temid' => 'required|integer|in:1,2,3',
        'sessid' => 'required|exists:seszion,id',
        'file' => 'required|mimes:csv,txt|max:2048',
     
    ]);

    $classid = $request->input('classid');
    $payid = $request->input('payid');
    $temid = $request->input('temid');
    $sessid = $request->input('sessid');


    try {
        // Check if the file is valid
        if (!$request->file('file')->isValid()) {
            \Log::error('Invalid file uploaded.');
            return redirect()->back()->with('error', 'Invalid file uploaded. Please try again.');
        }

        // Read CSV file and remove BOM
        $csvData = file_get_contents($request->file('file'));
        $csvData = preg_replace('/^\xEF\xBB\xBF/', '', $csvData); // Remove BOM
        
        \Log::info('CSV Data: ' . $csvData);

        // Convert CSV data to array
        $rows = array_map('str_getcsv', explode("\n", $csvData));
        $header = array_shift($rows);

        // Log the header to ensure it's correct
        \Log::info('CSV Header: ' . json_encode($header));

        foreach ($rows as $row) {
            // Skip empty rows
            if (empty(array_filter($row))) continue;

            // Combine header with row data
            $row = array_combine($header, $row);

            \Log::info('Importing row: ' . json_encode($row));

            // Prepare data for insertion
            $data = [
                'fullname' => $row['fullname'] ?? null,
                'payid' => $payid,
                'amt' => $row['amt'] ?? null,
                'sess' => $sessid,
                'term' => $temid ,
                'classid' => $classid
            ];

            // Insert new student record
          payyy::create($data);
        }

        return redirect()->back()->with('success', 'Payment imported successfully!');
    } catch (\Exception $e) {
        \Log::error('Error importing student record:', ['exception' => $e]);
        return redirect()->back()->with('error', 'Error importing payment record. Please try again.');
    }
}


public function payment()
{
    $classrm = classrm::orderBy('classname', 'asc')->get();
    $students = student::all();
    $payyy = payyy::all();
    $paymenttype = paymenttype::all();
    $seszion = seszion::all();

    // Transform each session in the collection
    $seszion->transform(function($session) {
        $session->restoredSessname = $this->restoreSlashes($session->sessname);
        return $session;
    });

    return view('admin.payment', [
        'classrm' => $classrm,
        'students' => $students,
        'payyy' => $payyy,
        'paymenttype' => $paymenttype,
        'seszion' => $seszion
    ]);
}



public function viewpay(Request $request)
{
    $classId = $request->input('classid');
    $payid = $request->input('payid');
    $termid = $request->input('termid');
    $sessid = $request->input('sessid');

    if (!$classId || !$payid || !$termid || !$sessid) {
        return back()->with('error', 'Please select all the parameters to view. Class, Payment, and Term are required.');
    }

    $students = student::where('classid', $classId)->get();
    $classrm = classrm::where('id', $classId)->first();


    $payyy = payyy::with(['student', 'paymenttype', 'seszion'])
    ->where('classid', $classId)
    ->where('payid', $payid)
    ->where('termid', $termid)
    ->where('sessid', $sessid)
    ->get();


    if ($payyy->isEmpty()) {
        return back()->with('error', 'No payments found for the selected criteria.');
    }

    $termNames = [
        1 => 'First Term',
        2 => 'Second Term',
        3 => 'Third Term'
    ];

    $termName = $termNames[$termid] ?? 'Not Available';

    $paymenttype = paymenttype::find($payid);
    $paymentTypeName = $paymenttype ? $paymenttype->paymenttype : 'Not Available';

    // Retrieve all sessions and transform them
    
    $seszions = seszion::all();
    //dd($seszions);
    $sessionNames = $seszions->map(function($sess) {
        return $this->restoreSlashes($sess->sessname);
    });

    // Find the current session name
    $currentSession = $seszions->find($sessid);
    $currentSessionName = $currentSession ? $this->restoreSlashes($currentSession->sessname) : 'Not Available';

    // Transform session names for each payyy entry
    $payyy->transform(function($payment) {
        if ($payment->seszion) {
            $originalSessname = $payment->seszion->sessname;
            $payment->seszion->sessname = $this->restoreSlashes($originalSessname);
        }
        return $payment;
    });

    if ($students->isEmpty() && $payyy->isEmpty() && !$classrm) {
        return back()->with('error', 'No data available for the selected class and payment type.');
    }

    return view('admin.viewselpaypage', [
        'students' => $students,
        'payyy' => $payyy,
        'classrm' => $classrm,
        'termName' => $termName,
        'paymenttype' => $paymentTypeName,
        'sessionNames' => $sessionNames,
        'seszions' => $seszions ,
        'currentSessionName' => $currentSessionName, // Pass the current session name
        'sessid' => $sessid, // Pass the selected session ID
        'termid' => $termid,
    ]);
}


public function addstudentpay(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'classid' => 'required|exists:classrm,id',
        'payid' => 'required|exists:paymenttype,id',
        'studid' => 'required|integer',
        'amt' => 'required|string|max:255',
        'sessid' => 'required|exists:seszion,id',
        'termidw' => 'required|integer|in:1,2,3'  // Ensure termidw matches the form name
    ]);

    $amount = $request->input('amt');

    // Clean the amount value by removing commas
    $cleanedAmount = str_replace(',', '', $amount);

    try {
        // Create a new payment record
        $payyy = new payyy();
        $payyy->classid = $request->input('classid');
        $payyy->studid = $request->input('studid');  // Fixed input field name
        $payyy->payid = $request->input('payid');
        $payyy->amt = $cleanedAmount;
        $payyy->sessid = $request->input('sessid');
        $payyy->termid = $request->input('termidw');  // Fixed typo

        $payyy->save(); // Save the record to the database

        return redirect()->back()->with('success', 'Payment added successfully!');
    } catch (\Exception $e) {
        // Log the error message for debugging
        \Log::error('Error inserting payment record:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Error inserting record. Please try again.');
    }
}


public function createpayment(){
    $paymenttype = paymenttype::orderBy('paymenttype', 'asc')->paginate(5);
    return view('admin.createpayment', compact('paymenttype'));
   }

public function createpaymentprocess(Request $request){
    $request->validate([ 
        'paymenttype'=>'required|unique:paymenttype,paymenttype',
        ]); 


        $data = $request->only(['paymenttype']);
     try {
            // Create a new subject
            $paymenttype = new paymenttype();
            $paymenttype->paymenttype = $data['paymenttype'];
            $paymenttype->save();

  return back ()->withsuccess('paymenttype was successfully created.');
  } catch (\Exception $e) {
    return back ()->witherrors('paymenttype not successfully created');
   
   }   
    } 

 
    public function createpaymentedit(Request $request, $id)
        {   $paymenttype= paymenttype::find($id);   

            if ($paymenttype) {
              
            $paymenttype->paymenttype=$request->get('paymenttype');
            $paymenttype->save(); 
        return back()->withsuccess('paymenttype successfully changed.');
        }
        else{
    
        return back()->witherrors('please try again , no update.');
        }
        }                                                                                                                                                                                                                                                                

        
 public function deletepayment(Request $request, $id)
 {
    $paymenttype= paymenttype::find($id);   

    if ($paymenttype) {
        $paymenttype->delete();

 return back()->withsuccess('paymenttype deleted successfully');     
 }
else{
return back()->witherrors('paymenttype not deleted successfully');

}

}


 public function updatepay(Request $request,)
    {
        $request->validate([
            'id' => 'required|exists:payyy,id',
            'amount' => 'required|string|max:255',
            'sessid' => 'required|int',
           'termid' => 'required|integer|in:1,2,3'
       
        ]);

        $amount = $request->input('amount');
        $cleanedAmount = str_replace(',', '', $amount);

        // Find the record by its ID
        $payment = payyy::find($request->input('id'));

        if (!$payment) {
            return back()->with('error', 'Record not found.');
        }

        // Update the record
        $payment->amt =  $cleanedAmount;
        $payment->sessid = $request->input('sessid');
        $payment->termid = $request->input('termid');
 

        // Save the changes
        $payment->save();

        // Redirect with a success message
        return redirect()->route('admin.payment')->with('success', 'Record updated successfully');     
     
    }
    
    // Handle logout requests
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }


    public function deleteupdatepay(Request $request, $id)
    {  
        $payyy = payyy::find($id);   
    
        if ($payyy) {
            $payyy->delete();
            return redirect()->route('admin.payment')->with('success', 'Payment deleted successfully');     
        } else {
            return redirect()->route('admin.payment')->with('error', 'Payment not found');
        }
    }
    


public function uploadtest()
{
    $classrm = classrm::orderBy('classname', 'asc')->get();
    $students = student::all();
    $subby= subby::all();
    $tezz= tezz::all();
    $seszion = seszion::all();

    // Transform each session in the collection
    $seszion->transform(function($session) {
        $session->restoredSessname = $this->restoreSlashes($session->sessname);
        return $session;
    });

    return view('admin.uploadtest', [
        'classrm' => $classrm,
        'students' => $students,
        'subby' => $subby,
        'tezz' => $tezz,
        'seszion' => $seszion
    ]);
}

public function importtest(Request $request)
{
    // Validate the incoming request to ensure a file is provided
    $request->validate([
        'file' => 'required|file|mimes:xlsx',
    ]);

    $file = $request->file('file');

    // Load the Excel file
    try {
        $spreadsheet = IOFactory::load($file->getRealPath());
        $worksheet = $spreadsheet->getActiveSheet();
    } catch (\Exception $e) {
        Log::error('Failed to load the Excel file: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to load the Excel file. Please check the file format and try again.');
    }

    $rowNumber = 2;
    $errors = [];
    $importedRecords = 0;

    $subjectName = null;

    while ($worksheet->getCell('A' . $rowNumber)->getValue() !== null) {
        $id = $worksheet->getCell('A' . $rowNumber)->getValue();
        $sname = $worksheet->getCell('B' . $rowNumber)->getValue();
        $onames = $worksheet->getCell('C' . $rowNumber)->getValue();
        $subid = $worksheet->getCell('D' . $rowNumber)->getValue();
        $termid = $worksheet->getCell('E' . $rowNumber)->getValue();
        $sessid = $worksheet->getCell('F' . $rowNumber)->getValue();
        $classid = $worksheet->getCell('G' . $rowNumber)->getValue();
        $testscore = $worksheet->getCell('H' . $rowNumber)->getValue();

        // Fetch subject name from subid
        if ($subid && !$subjectName) {
            $subject = Subby::find($subid);
            $subjectName = $subject ? $subject->subjectname : 'Unknown Subject';
        }

        // Validate termid, sessid, and classid
        $validator = Validator::make([
            'termid' => $termid,
            'sessid' => $sessid,
            'classid' => $classid,
        ], [
            'termid' => 'required|integer|in:1,2,3',
            'sessid' => 'required|integer|exists:seszion,id',
            'classid' => 'required|integer|exists:classrm,id',
        ]);

        if ($validator->fails()) {
            $errors[] = "Row $rowNumber: Validation failed for termid, sessid, or classid.";
            $rowNumber++;
            continue;
        }

        // Ensure subid exists in the 'subby' table
        if (!Subby::find($subid)) {
            $errors[] = "Row $rowNumber: The subid $subid does not exist.";
            $rowNumber++;
            continue;
        }

        // Find the corresponding record in the 'tezz' table
        $tezzRecord = Tezz::where('studid', $id)
                          ->where('subid', $subid)
                          ->where('termid', $termid)
                          ->where('sessid', $sessid)
                          ->where('classid', $classid)
                          ->first();

        if ($tezzRecord) {
            // Update the existing record
            $tezzRecord->testscore = $testscore;
            $tezzRecord->save();
        } else {
            // Create a new record if it doesn't exist
            try {
                Tezz::create([
                    'studid' => $id,
                    'subid' => $subid,
                    'termid' => $termid,
                    'sessid' => $sessid,
                    'classid' => $classid,
                    'testscore' => $testscore,
                ]);
                $importedRecords++;
            } catch (\Exception $e) {
                $errors[] = "Row $rowNumber: Failed to create record for student ID $id. Error: " . $e->getMessage();
            }
        }

        $rowNumber++;
    }

    if (count($errors) > 0) {
        Log::error('Errors encountered during import: ' . implode(', ', $errors));
        return redirect()->back()->with('error', 'Some records could not be processed. Please check the error log for details.');
    }

    // Prepare a detailed success message
    $successMessage = $importedRecords > 0
        ? "$importedRecords test scores were successfully imported for the subject: $subjectName."
        : "test scores were previously imported,However changes where specified has been made.";

    return redirect()->back()->with('success', $successMessage);
}

public function addtestscore(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'classid' => 'required|exists:classrm,id',
        'subid' => 'required|exists:subby,id',
        'termid' => 'required|integer|in:1,2,3',
        'sessid' => 'required|exists:seszion,id',
        'testscore' => 'required|integer',
        'studid' => 'required|integer',
    ]);

    // Get request input values
    $classid = $request->input('classid');
    $subid = $request->input('subid');
    $termid = $request->input('termid');
    $sessid = $request->input('sessid');
    $testscore = $request->input('testscore');
    $studid = $request->input('studid');

    // Fetch subject name from subid
    $subject = Subby::find($subid);
    $subjectName = $subject ? $subject->subjectname : 'Unknown Subject';

    try {
        // Check if the record already exists
        $existingRecord = Tezz::where('studid', $studid)
            ->where('subid', $subid)
            ->where('termid', $termid)
            ->where('sessid', $sessid)
            ->where('classid', $classid)
            ->first();

        if ($existingRecord) {
            // If a record exists, do not add and return an error message
            return redirect()->back()->with('error', 'Record already exists for this student and subject.');
        } else {
            // Create a new record if it doesn't exist
            Tezz::create([
                'classid' => $classid,
                'subid' => $subid,
                'termid' => $termid,
                'sessid' => $sessid,
                'studid' => $studid,
                'testscore' => $testscore,
            ]);

            // Return success response with subject name
            return redirect()->back()->with('success', "Score added successfully for the subject: {$subjectName}!");
        }
        
    } catch (\Exception $e) {
        // Log the error and return an error response
        Log::error('Failed to add test score: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to add the test score. Please try again.');
    }
}

     
     

public function viewtest(Request $request)
{
    $classId = $request->input('classid');
    $subid = $request->input('subid');
    $termid = $request->input('termid');
    $sessid = $request->input('sessid');



    if (!$classId || !$subid || !$termid || !$sessid) {
        return back()->with('error', 'Please select all the parameters to view. Class, Payment, and Term are required.');
    }

    $students = student::where('classid', $classId)->get();
    $classrm = classrm::where('id', $classId)->first();



    $tezz = tezz::with(['subby', 'seszion'])
                  ->where('classid', $classId)
                  ->where('subid', $subid)
                  ->where('termid', $termid)
                  ->where('sessid', $sessid)
                  ->get();

 
                 // dd($tezz);
    if ($tezz->isEmpty()) {
        return back()->with('error', 'No score found for the selected criteria.');
    }

    $termNames = [
        1 => 'First Term',
        2 => 'Second Term',
        3 => 'Third Term'
    ];

    $termName = $termNames[$termid] ?? 'Not Available';

    $subby = subby::find($subid);
    $subbyTypeName = $subby ? $subby->subjectname : 'Not Available';

    // Retrieve all sessions and transform them
    
    $seszions = seszion::all();
    //dd($seszions);
    $sessionNames = $seszions->map(function($sess) {
        return $this->restoreSlashes($sess->sessname);
    });

    // Find the current session name
    $currentSession = $seszions->find($sessid);
    $currentSessionName = $currentSession ? $this->restoreSlashes($currentSession->sessname) : 'Not Available';

    // Transform session names for each payyy entry
    $tezz->transform(function($payment) {
        if ($payment->seszion) {
            $originalSessname = $payment->seszion->sessname;
            $payment->seszion->sessname = $this->restoreSlashes($originalSessname);
        }
        return $payment;
    });

    if ($students->isEmpty() && $tezz->isEmpty() && !$classrm) {
        return back()->with('error', 'No data available for the selected class and payment type.');
    }

    return view('admin.viewseltest', [
        'students' => $students,
        'tezz' => $tezz,
        'classrm' => $classrm,
        'termName' => $termName,
        'subby' => $subbyTypeName,
        'sessionNames' => $sessionNames,
        'seszions' => $seszions ,
        'currentSessionName' => $currentSessionName, // Pass the current session name
        'sessid' => $sessid,
        'termid'=>$termid
    ]);
}
public function updatetestscore(Request $request,)
    {
        $request->validate([
            'id'=>'required', 
            'sessid' => 'required|exists:seszion,id',
            'termid' => 'required|integer|in:1,2,3',
            'testscore' => 'required|integer'
       
         
        ]);

        
        // Find the record by its ID
        $tezz = tezz::find($request->input('id'));
      
        if (!$tezz) {
            return back()->with('error', 'Record not found.');
        }

        // Update the record
        $tezz->testscore = $request->input('testscore');
        $tezz->termid = $request->input('termid');
        $tezz->sessid = $request->input('sessid');

        // Save the changes
        $tezz->save();

        // Redirect with a success message
        return back()->with('success', 'Record updated successfully.');
    }

    public function deletetest(Request $request, $id)
    {  
        $tezz = tezz::find($id);   

        if ($tezz) {
            $tezz->delete();
            return back()->withsuccess('test record deleted successfully');
            //return redirect()->route('admin.uploadtest')->with('success', 'test record deleted successfully');     
        } else {return back()->witherror('test record not found.');
            //return redirect()->route('admin.uploadtest')->with('error', 'test record not found');
        }
    }



    public function getstudentsii(Request $request)
{
    $classId = $request->input('classid');
    $sessId = $request->input('sessid');
    $termId = $request->input('termid');

    $query = student::query();

    if ($classId) {
        $query->where('classid', $classId);
    }

    if ($sessId && $termId) {
        $query->whereHas('payyy', function ($q) use ($sessId, $termId) {
            $q->where('sessid', $sessId)->where('termid', $termId);
        });
    }

    // Fetch students with the necessary fields
    $students = $query->get(['id', 'sname', 'onames']); // Fetch only necessary fields

    // Optionally format the full name in the result
    $students = $students->map(function ($student) {
        $student->fullName = $student->sname . ' ' . $student->onames;
        return $student;
    });

    return response()->json($students);
}
 
public function getstudents(Request $request)
{
    $classId = $request->input('classid');
    $sessId = $request->input('sessid');
    $termId = $request->input('termid');

    // Log the parameters to ensure they are received correctly
    Log::info('Class ID:', ['classId' => $classId]);
    Log::info('Session ID:', ['sessId' => $sessId]);
    Log::info('Term ID:', ['termId' => $termId]);

    // Query to get entries from the student table based on selected criteria
    $students = student::query()
        ->when($classId, function ($query, $classId) {
            return $query->where('classid', $classId);
        })
        ->when($sessId, function ($query, $sessId) {
            return $query->where('sessid', $sessId);
        })
        ->when($termId, function ($query, $termId) {
            return $query->where('termid', $termId);
        })
        ->get();

    // Generate HTML options
    $options = '<option value="">Select Student</option>';
    foreach ($students as $student) {
        $fullName = $student->sname . ' ' . $student->onames;
        $options .= '<option value="' . $student->id . '">' . htmlspecialchars($fullName) . '</option>';
    }

    return response($options);
}




public function generateCsv(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'classid' => 'required|exists:classrm,id',
        'subid' => 'required|exists:subby,id',
        'temid' => 'required|integer|in:1,2,3',
        'sessid' => 'required|exists:seszion,id',
    ]);

    $classid = $request->input('classid');
    $subid = $request->input('subid');
    $termid = $request->input('temid');
    $sessid = $request->input('sessid');

    // Retrieve students based on the criteria with additional checks
    $students = Tezz::where([
        'classid' => $classid,
        'subid' => $subid,
        'termid' => $termid,
        'sessid' => $sessid,
    ])
    ->whereNotNull('testscore')  // Ensure testscore is not null
    ->whereNull('examscore')  
    ->whereNull('toal')     // Ensure examscore is null
    ->get(['id', 'fullname']);

    // Check if there are records with testscore but no examscore and toal
    if ($students->isEmpty()) {
        // Check if all students have both testscore and toal populated (i.e., no records for further update)
        $allUpdated = Tezz::where([
            'classid' => $classid,
            'subid' => $subid,
            'termid' => $termid,
            'sessid' => $sessid,
        ])
        ->whereNotNull('testscore')
        ->whereNotNull('toal')
        ->exists();

        if ($allUpdated) {
            return redirect()->back()->with('success', 'All records for the selected parameters have already been updated. You can proceed to edit where necessary.');
        } else {
            return redirect()->back()->with('error', 'No student data exists for the selected parameters.');
        }
    }

    // Fetch the subject name for the filename
    $subject = subby::find($subid);
    $subjectName = $subject ? $subject->subjectname : 'UnknownSubject';

    // Create a custom filename
    $csvFileName = "{$subjectName}_examscore.csv";

    // Log the query result
    Log::info('Filtered Student List Retrieved:', $students->toArray());

    // Create and return the CSV response
    $response = new StreamedResponse(function () use ($students) {
        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['Please do not edit the ID and Full Name columns. Only fill in the Exams Score column.']);
        fputcsv($handle, ['id', 'fullname', 'examscore']); // Add CSV header

        foreach ($students as $student) {
            fputcsv($handle, [$student->id, $student->fullname]);
        }

        fclose($handle);
    });

    $response->headers->set('Content-Type', 'text/csv');
    $response->headers->set('Content-Disposition', 'attachment; filename="'.$csvFileName.'"');

    return $response;
}



public function importpay(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:xlsx,xls'
    ]);

    try {
        // Import the file
        Excel::import(new payyyImport, $request->file('file'));

        return redirect()->back()->with('success', 'Payment imported successfully.');
    } catch (\Exception $e) {
        // Log the exception
        Log::error('Import failed: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to import payment. Please check your file.');
    }
}

public function generatepayexcel(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'classid' => 'required|exists:classrm,id',
        'payid' => 'required|exists:paymenttype,id',
        'termid' => 'required|integer|in:1,2,3',
        'sessid' => 'required|exists:seszion,id',
    ]);

    $classid = $request->input('classid');
    $payid = $request->input('payid');
    $termid = $request->input('termid');  // Corrected variable name
    $sessid = $request->input('sessid');

    // Retrieve students based on the criteria
    $students = student::where([
        'classid' => $classid,
        'sessid' => $sessid,
        'termid' => $termid,
    ])
    ->get(['id', 'sname', 'onames']);   // Fetch the required columns

    // Check if students are found
    if ($students->isEmpty()) {
        return redirect()->back()->with('error', 'No student data exists for the selected parameters.');
        // Return a response indicating no data is available
       //return response()->json([
          //  'message' => 'The selected class is yet to be populated with students. No download is available.'
        //], 404);
    }

    // Fetch the payment type for the filename
    $paymenttype = paymenttype::find($payid);
    $paymentName = $paymenttype ? $paymenttype->paymenttype : 'UnknownPayment';

    $classrm = classrm::find($classid);
    $classrmName = $classrm ? $classrm->classname : 'UnknownClass';

    // Create a custom filename
    $excelFileName = "{$paymentName}_{$classrmName}.xlsx";

    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Add headers
    $headers = ['id', 'sname', 'onames', 'classid', 'payid', 'termid', 'sessid', 'amt'];
    $sheet->fromArray($headers, NULL, 'A1');

$sheet->getColumnDimension('A')->setWidth(10);
$sheet->getColumnDimension('B')->setWidth(20);
$sheet->getColumnDimension('C')->setWidth(20);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(15);
$sheet->getColumnDimension('H')->setWidth(15);


    // Add student data
    $rowNumber = 2;
    foreach ($students as $student) {
        $sheet->setCellValue('A' . $rowNumber, $student->id);
        $sheet->setCellValue('B' . $rowNumber, $student->sname);
        $sheet->setCellValue('C' . $rowNumber, $student->onames);
        $sheet->setCellValue('D' . $rowNumber, $classid);  // Static values for the columns
        $sheet->setCellValue('E' . $rowNumber, $payid);    // Static values for the columns
        $sheet->setCellValue('F' . $rowNumber, $termid);    // Static values for the columns
        $sheet->setCellValue('G' . $rowNumber, $sessid);   // Static values for the columns
        $sheet->setCellValue('H' . $rowNumber, '');        // 'amt' column to be filled by user
        $rowNumber++;
    }

    // Protect the sheet
    $sheet->getProtection()->setSheet(true);
    $sheet->getProtection()->setSort(true);
    $sheet->getProtection()->setFormatCells(true);

    // Unprotect specific column for editing ('amt')
    $highestRow = $sheet->getHighestRow();  // Find the last row of data
    for ($row = 2; $row <= $highestRow; $row++) {
        $sheet->getCell('H' . $row)->getStyle()->getProtection()->setLocked(Protection::PROTECTION_UNPROTECTED);
    }

    // Save Excel file to a stream
    $writer = new Xlsx($spreadsheet);
    $response = new StreamedResponse(function() use ($writer) {
        $writer->save('php://output');
    });

    $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $response->headers->set('Content-Disposition', 'attachment; filename="'.$excelFileName.'"');

    return $response;
}




public function generatetestexcel(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'classid' => 'required|exists:classrm,id',
        'subid' => 'required|exists:subby,id',
        'temid' => 'required|integer|in:1,2,3',
        'sessid' => 'required|exists:seszion,id',
    ]);

    $classid = $request->input('classid');
    $subid = $request->input('subid');
    $termid = $request->input('temid');
    $sessid = $request->input('sessid');

    // Check if there are any records for the given criteria
    $hasRecords = Student::where([
        'classid' => $classid,
        'termid' => $termid,
        'sessid' => $sessid,
    ])
    ->whereNotNull('sname')
    ->whereNotNull('onames')
    ->exists();

    if (!$hasRecords) {
        return redirect()->back()->with('error', 'No records found for the given criteria.');
    }

    // Fetch the subject name and class name for the filename
    $subject = Subby::find($subid);
    $subjectName = $subject ? $subject->subjectname : 'UnknownSubject';

    $class = Classrm::find($classid);
    $className = $class ? $class->classname : 'UnknownClass';

    // Create a descriptive filename
    $filename = "{$subjectName}_Class{$className}_TestScore.xlsx";

    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Add headers
    $headers = ['id', 'sname', 'onames', 'subid', 'termid', 'sessid', 'classid', 'testscore'];
    $sheet->fromArray($headers, NULL, 'A1');

    // Adjust column widths for better readability
    $sheet->getColumnDimension('A')->setWidth(10);
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(20);
    $sheet->getColumnDimension('D')->setWidth(15);
    $sheet->getColumnDimension('E')->setWidth(15);
    $sheet->getColumnDimension('F')->setWidth(15);
    $sheet->getColumnDimension('G')->setWidth(15);
    $sheet->getColumnDimension('H')->setWidth(15);

    // Add student data
    $students = Student::where([
        'classid' => $classid,
        'termid' => $termid,
        'sessid' => $sessid,
    ])
    ->get(['id', 'sname', 'onames']);

    $rowNumber = 2;
    foreach ($students as $student) {
        $sheet->setCellValue('A' . $rowNumber, $student->id);
        $sheet->setCellValue('B' . $rowNumber, $student->sname);
        $sheet->setCellValue('C' . $rowNumber, $student->onames);
        $sheet->setCellValue('D' . $rowNumber, $subid); // Add subid value
        $sheet->setCellValue('E' . $rowNumber, $termid); // Add termid value
        $sheet->setCellValue('F' . $rowNumber, $sessid); // Add sessid value
        $sheet->setCellValue('G' . $rowNumber, $classid); // Add classid value
        $sheet->setCellValue('H' . $rowNumber, ''); // Leave testscore empty for user input
        $rowNumber++;
    }

    // Protect the sheet
    $sheet->getProtection()->setSheet(true);
    $sheet->getProtection()->setSort(true);
    $sheet->getProtection()->setFormatCells(true);

    // Lock columns A to G and unlock column H for editing
    $highestRow = $sheet->getHighestRow();
    foreach (range('A', 'G') as $column) {
        for ($row = 1; $row <= $highestRow; $row++) {
            $cell = $sheet->getCell("{$column}{$row}");
            $cell->getStyle()->getProtection()->setLocked(Protection::PROTECTION_PROTECTED);
        }
    }
    
    // Unlock the 'testscore' column (H)
    for ($row = 1; $row <= $highestRow; $row++) {
        $cell = $sheet->getCell('H' . $row);
        $cell->getStyle()->getProtection()->setLocked(Protection::PROTECTION_UNPROTECTED);
    }

    // Save Excel file to a stream
    $writer = new Xlsx($spreadsheet);
    $response = new StreamedResponse(function() use ($writer) {
        $writer->save('php://output');
    });

    $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $response->headers->set('Content-Disposition', 'attachment; filename="'.$filename.'"');

    return $response;
}

public function generateexamexcel(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'classid' => 'required|exists:classrm,id',
        'subid' => 'required|exists:subby,id',
        'temid' => 'required|integer|in:1,2,3',
        'sessid' => 'required|exists:seszion,id',
    ]);

    $classid = $request->input('classid');
    $subid = $request->input('subid');
    $termid = $request->input('temid');
    $sessid = $request->input('sessid');

    // Fetch the subject name for the filename
    $subject = Subby::find($subid);
    $subjectName = $subject ? $subject->subjectname : 'UnknownSubject';

    $class = Classrm::find($classid);
    $className = $class ? $class->classname : 'UnknownClass';

    // Create a descriptive filename
    $filename = "{$subjectName}_Class{$className}_examscore.xlsx";

    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Add headers
    $headers = ['id', 'sname', 'onames', 'subid', 'termid', 'sessid', 'classid', 'testscore', 'examscore'];
    $sheet->fromArray($headers, NULL, 'A1');

    // Adjust column widths for better readability
    $sheet->getColumnDimension('A')->setWidth(10);
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(20);
    $sheet->getColumnDimension('D')->setWidth(15);
    $sheet->getColumnDimension('E')->setWidth(15);
    $sheet->getColumnDimension('F')->setWidth(15);
    $sheet->getColumnDimension('G')->setWidth(15);
    $sheet->getColumnDimension('H')->setWidth(15);
    $sheet->getColumnDimension('I')->setWidth(15);

    // Fetch students with existing test scores in the 'Tezz' table
    $students = Student::whereIn('id', function($query) use ($classid, $termid, $sessid, $subid) {
        $query->select('studid')
              ->from('tezz')
              ->where('classid', $classid)
              ->where('termid', $termid)
              ->where('sessid', $sessid)
              ->where('subid', $subid)
              ->whereNotNull('testscore');
    })
    ->where([
        'classid' => $classid,
        'termid' => $termid,
        'sessid' => $sessid,
    ])
    ->whereNotNull('sname')
    ->whereNotNull('onames')
    ->get(['id', 'sname', 'onames']);

    if ($students->isEmpty()) {
        return redirect()->back()->with('error', 'No students with test scores found for the given criteria.');
    }

    // Add student data to the sheet
    $rowNumber = 2;
    foreach ($students as $student) {
        // Fetch the testscore for this student
        $testscore = Tezz::where([
            'classid' => $classid,
            'termid' => $termid,
            'sessid' => $sessid,
            'subid' => $subid,
            'studid' => $student->id
        ])->value('testscore') ?? 'N/A'; // Default to 'N/A' if no testscore found

        $sheet->setCellValue('A' . $rowNumber, $student->id);
        $sheet->setCellValue('B' . $rowNumber, $student->sname);
        $sheet->setCellValue('C' . $rowNumber, $student->onames);
        $sheet->setCellValue('D' . $rowNumber, $subid); // Add subid value
        $sheet->setCellValue('E' . $rowNumber, $termid); // Add termid value
        $sheet->setCellValue('F' . $rowNumber, $sessid); // Add sessid value
        $sheet->setCellValue('G' . $rowNumber, $classid); // Add classid value
        $sheet->setCellValue('H' . $rowNumber, $testscore); // Add testscore value
        $sheet->setCellValue('I' . $rowNumber, ''); // Leave examscore empty for user input
        $rowNumber++;
    }

    // Protect the sheet
    $sheet->getProtection()->setSheet(true);
    $sheet->getProtection()->setSort(true);
    $sheet->getProtection()->setFormatCells(true);

    // Lock columns A to H and unlock column I for editing
    $highestRow = $sheet->getHighestRow();
    foreach (range('A', 'H') as $column) {
        for ($row = 1; $row <= $highestRow; $row++) {
            $cell = $sheet->getCell("{$column}{$row}");
            $cell->getStyle()->getProtection()->setLocked(Protection::PROTECTION_PROTECTED);
        }
    }
    
    // Unlock the 'examscore' column (I)
    for ($row = 1; $row <= $highestRow; $row++) {
        $cell = $sheet->getCell('I' . $row);
        $cell->getStyle()->getProtection()->setLocked(Protection::PROTECTION_UNPROTECTED);
    }

    // Save Excel file to a stream
    $writer = new Xlsx($spreadsheet);
    $response = new StreamedResponse(function() use ($writer) {
        $writer->save('php://output');
    });

    $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $response->headers->set('Content-Disposition', 'attachment; filename="'.$filename.'"');

    return $response;
}





    public function uploadexam()
    {
        $classrm = classrm::orderBy('classname', 'asc')->get();
        $students = student::all();
        $subby= subby::all();
        $tezz=tezz::all();
        $seszion = seszion::all();
    
        // Transform each session in the collection
        $seszion->transform(function($session) {
            $session->restoredSessname = $this->restoreSlashes($session->sessname);
            return $session;
        });
    
        return view('admin.uploadexam', [
            'classrm' => $classrm,
            'students' => $students,
              'subby'=>  $subby,
               'tezz' => $tezz,
              'seszion' => $seszion
        ]);
    }



    
    public function importexam(Request $request)
{
    // Validate the incoming request to ensure a file is provided
    $request->validate([
        'file' => 'required|file|mimes:xlsx',
    ]);

    $file = $request->file('file');

    // Load the Excel file
    try {
        $spreadsheet = IOFactory::load($file->getRealPath());
        $worksheet = $spreadsheet->getActiveSheet();
    } catch (\Exception $e) {
        Log::error('Failed to load the Excel file: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to load the Excel file. Please check the file format and try again.');
    }

    $rowNumber = 2; // Start at row 2 assuming row 1 is headers
    $errors = [];
    $importedRecords = 0;
    $updatedRecords = 0;
    $subjectName = null;

    while ($worksheet->getCell('A' . $rowNumber)->getValue() !== null) {
        $id = $worksheet->getCell('A' . $rowNumber)->getValue();
        $sname = $worksheet->getCell('B' . $rowNumber)->getValue();
        $onames = $worksheet->getCell('C' . $rowNumber)->getValue();
        $subid = $worksheet->getCell('D' . $rowNumber)->getValue();
        $termid = $worksheet->getCell('E' . $rowNumber)->getValue();
        $sessid = $worksheet->getCell('F' . $rowNumber)->getValue();
        $classid = $worksheet->getCell('G' . $rowNumber)->getValue();
        $testscore = $worksheet->getCell('H' . $rowNumber)->getValue();
        $examscore = $worksheet->getCell('I' . $rowNumber)->getValue();

        // Log cell values for debugging
        Log::info("Row $rowNumber: ID = $id, Subject ID = $subid, Term ID = $termid, Session ID = $sessid, Class ID = $classid, Test Score = $testscore, Exam Score = $examscore");

        // Fetch subject name from subid
        if ($subid && !$subjectName) {
            $subject = Subby::find($subid);
            $subjectName = $subject ? $subject->subjectname : 'Unknown Subject';
        }

        // Validate termid, sessid, and classid
        $validator = Validator::make([
            'termid' => $termid,
            'sessid' => $sessid,
            'classid' => $classid,
        ], [
            'termid' => 'required|integer|in:1,2,3',
            'sessid' => 'required|integer|exists:seszion,id',
            'classid' => 'required|integer|exists:classrm,id',
        ]);

        if ($validator->fails()) {
            $errors[] = "Row $rowNumber: Validation failed for termid, sessid, or classid.";
            Log::error("Row $rowNumber: Validation failed - " . $validator->errors()->first());
            $rowNumber++;
            continue;
        }

        // Ensure subid exists in the 'subby' table
        if (!Subby::find($subid)) {
            $errors[] = "Row $rowNumber: The subid $subid does not exist.";
            $rowNumber++;
            continue;
        }

        // Set totalScore only if examscore is present
        $totalScore = !empty($examscore) ? ($testscore + $examscore) : null;

        // Find the corresponding record in the 'tezz' table
        $tezzRecord = Tezz::where('studid', $id)
                          ->where('subid', $subid)
                          ->where('termid', $termid)
                          ->where('sessid', $sessid)
                          ->where('classid', $classid)
                          ->first();

        if ($tezzRecord) {
            // Update the existing record
            $tezzRecord->testscore = $testscore;
            $tezzRecord->examscore = $examscore;
            $tezzRecord->toal = $totalScore;
            $tezzRecord->save();
            $updatedRecords++;
            Log::info("Row $rowNumber: Updated existing record for student ID $id.");
        } else {
            // Create a new record if it doesn't exist
            try {
                Tezz::create([
                    'studid' => $id,
                    'subid' => $subid,
                    'termid' => $termid,
                    'sessid' => $sessid,
                    'classid' => $classid,
                    'testscore' => $testscore,
                    'examscore' => $examscore,
                    'toal' => $totalScore,
                ]);
                $importedRecords++;
                Log::info("Row $rowNumber: Created new record for student ID $id.");
            } catch (\Exception $e) {
                $errors[] = "Row $rowNumber: Failed to create record for student ID $id. Error: " . $e->getMessage();
                Log::error("Row $rowNumber: Error creating record for student ID $id: " . $e->getMessage());
            }
        }

        $rowNumber++;
    }

    if (count($errors) > 0) {
        Log::error('Errors encountered during import: ' . implode(', ', $errors));
        return redirect()->back()->with('error', 'Some records could not be processed. Please check the error log for details.');
    }

    // Prepare a single success message
    $successMessage = $importedRecords > 0 || $updatedRecords > 0
        ? "test scores were successfully imported and updated where specified for the subject: $subjectName."
        : "No records were processed.";

    Log::info('Success Message: ' . $successMessage);

    return redirect()->back()->with('success', $successMessage);
}

    
     public function addexamscore(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'classid' => 'required|exists:classrm,id',
        'subid' => 'required|exists:subby,id',
        'temid' => 'required|integer|in:1,2,3',
        'sessid' => 'required|exists:seszion,id',
        'examscore' => 'required|integer',
        'studid' => 'required|integer',
    ]);

    $subid = $request->input('subid');
    $studid = $request->input('studid');
    $classid = $request->input('classid');
    $termid = $request->input('temid');
    $sessid = $request->input('sessid');
    $examscore = $request->input('examscore');

    try {
        // Retrieve the existing record based on provided data
        $record = tezz::where([
            'classid' => $classid,
            'subid' => $subid,
            'termid' => $termid,
            'sessid' => $sessid,
            'studid' => $studid
        ])->first();

        // Check if the record exists
        if (!$record) {
            return redirect()->back()->with('error', 'Record not found for the student.');
        }

        // Fetch existing testscore and total from the record
        $testscore = $record->testscore;
        $toal = $record->toal;

        // Check if testscore and toal are already filled for this subid
        if (!empty($testscore) && !empty($toal) && $subid == $record->subid) {
            return redirect()->back()->with('error', 'This student score has been calculated before.');
        }

        // Calculate total score
        $total = ($testscore ?? 0) + $examscore;

        // Update the record with new data
        $record->examscore = $examscore;
        $record->toal = $total;

        $record->save(); // Save the updated record to the database

        return redirect()->back()->with('success', 'Exam Score updated successfully!');
    }catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating Exam  Score. Please try again.');
    }
}

    
    public function viewexam(Request $request)
    {
        $classId = $request->input('classid');
        $subid = $request->input('subid');
        $termid = $request->input('termid');
        $sessid = $request->input('sessid');
    
        if (!$classId || !$subid || !$termid || !$sessid) {
            return back()->with('error', 'Please select all the parameters to view. Class, Payment, and Term are required.');
        }
    
        $students = student::where('classid', $classId)->get();
        $classrm = classrm::where('id', $classId)->first();
        
    
        $tezz = tezz::with(['subby', 'seszion'])
                      ->where('classid', $classId)
                      ->where('subid', $subid)
                      ->where('termid', $termid)
                      ->where('sessid', $sessid)
                      ->get();
    
        if ( $tezz ->isEmpty()) {
            return back()->with('error', 'No score found for the selected criteria.');
        }
    
        $termNames = [
            1 => 'First Term',
            2 => 'Second Term',
            3 => 'Third Term'
        ];
    
        $termName = $termNames[$termid] ?? 'Not Available';
    
        $subby = subby::find($subid);
        $subbyTypeName = $subby ? $subby->subjectname : 'Not Available';
    
        // Retrieve all sessions and transform them
        
        $seszions = seszion::all();
        //dd($seszions);
        $sessionNames = $seszions->map(function($sess) {
            return $this->restoreSlashes($sess->sessname);
        });
    
        // Find the current session name
        $currentSession = $seszions->find($sessid);
        $currentSessionName = $currentSession ? $this->restoreSlashes($currentSession->sessname) : 'Not Available';
    
        // Transform session names for each payyy entry
        $tezz->transform(function($payment) {
            if ($payment->seszion) {
                $originalSessname = $payment->seszion->sessname;
                $payment->seszion->sessname = $this->restoreSlashes($originalSessname);
            }
            return $payment;
        });
    
        if ($students->isEmpty() && $tezz->isEmpty() && !$classrm) {
            return back()->with('error', 'No data available for the selected class and payment type.');
        }
    
        return view('admin.viewselexam', [
            'students' => $students,
            'tezz' => $tezz,
            'classrm' => $classrm,
            'termName' => $termName,
            'subby' => $subbyTypeName,
            'sessionNames' => $sessionNames,
            'seszions' => $seszions ,
            'currentSessionName' => $currentSessionName, // Pass the current session name
            'sessid' => $sessid,
            'termid'=>$termid
        ]);
    }
    public function updateexamscore(Request $request,)
        {
            $request->validate([
                'id'=>'required', 
                'sessid' => 'required|exists:seszion,id',
                'termid' => 'required|integer|in:1,2,3',
                'testscore' => 'required|integer',
                'examscore' => 'required|integer',
        
           
             
            ]);
    
            
            // Find the record by its ID
            $tezz = tezz::find($request->input('id'));
          
            if (!$tezz) {
                return response()->json(['error' => 'Record not found.'], 404);
                //return back()->with('error', 'Record not found.');
            }
    
            // Update the record

            $tezz->testscore = $request->input('testscore');
            $tezz->examscore = $request->input('examscore');
            $tezz->termid = $request->input('termid');
            $tezz->sessid = $request->input('sessid');


           // Calculate the total
          $tezz->toal = $tezz->testscore + $tezz->examscore;
    
            // Save the changes
            $tezz->save();
    
            // Redirect with a success message
            //return response()->json(['success' => 'Record updated successfully.']);
            return back()->with('success', 'Record updated successfully.');
        }
    
        public function deleteexam(Request $request, $id)
        {  
            $tezz = tezz::find($id);   
        
            if ($tezz) {
                $tezz->delete();
                return back()->with('success', 'Exam record deleted successfully.');
               // return redirect()->route('admin.uploadexam')->with('success', 'Exam record deleted successfully');     
            } else {
                return back()->with('error', 'Exam record not found.');
               // return redirect()->route('admin.uploadexam')->with('error', 'Exam record not found');
            }
        }




    public function selectresults()
    {
        $classrm = classrm::orderBy('classname', 'asc')->get();
        $students = student::all();
        $subby= subby::all();
        $tezz=tezz::all();
        $seszion = seszion::all();
    
        // Transform each session in the collection
        $seszion->transform(function($session) {
            $session->restoredSessname = $this->restoreSlashes($session->sessname);
            return $session;
        });
    
        return view('admin.selectresults', [
            'classrm' => $classrm,
            'students' => $students,
              'subby'=>  $subby,
               'tezz' => $tezz,
              'seszion' => $seszion
        ]);
    }
    public function viewselresult(Request $request)
    {
        $classId = $request->input('classid');
        $termid = $request->input('termid');
        $sessid = $request->input('sessid');
        $studid = $request->input('studid'); // Assuming this is the student ID
    
        if (!$classId || !$termid || !$sessid || !$studid) {
            return back()->with('error', 'Please select all the parameters to view. Class, Term, Session, and Student are required.');
        }
    
        // Retrieve student based on studid
        $student = student::where('id', $studid)->first();
    
        if (!$student) {
            return back()->with('error', 'No student found with the provided ID.');
        }
    
        // Fetch tezz data for the student
        $tezzRecords = tezz::where('studid', $studid)
            ->where('classid', $classId)
            ->where('termid', $termid)
            ->where('sessid', $sessid)
            ->get();
    
        // Retrieve all subjects
        $subjects = subby::all();
    
        // Retrieve class room name
        $classrm = classrm::find($classId);
        $classrmName = $classrm ? $classrm->classname : 'Not Available';
    
        // Retrieve term name
        $termNames = [
            1 => 'First Term',
            2 => 'Second Term',
            3 => 'Third Term'
        ];
        $termName = $termNames[$termid] ?? 'Not Available';
    
        // Retrieve current session name
        $currentSession = seszion::find($sessid);
        $currentSessionName = $currentSession ? $this->restoreSlashes($currentSession->sessname) : 'Not Available';
    
        // Fetch the overall score from the `ova` table
        $ova = ova::where('classid', $classId)
            ->where('termid', $termid)
            ->where('sessid', $sessid)
            ->first();
    
        $overallScore = $ova ? $ova->scori : 0;
    
        // Prepare an associative array to map tezz records to subjects
        $tezzMap = $tezzRecords->keyBy('subid');
    
        // Function to calculate grade based on score
        function calculateGrade($score)
        {
            if ($score >= 90) return 'A+';
            if ($score >= 80) return 'A';
            if ($score >= 70) return 'B+';
            if ($score >= 60) return 'B';
            if ($score >= 50) return 'C+';
            if ($score >= 40) return 'C';
            if ($score >= 30) return 'D';
            return 'F';
        }
    
        // Initialize variables for percentage calculation
        $totalScoreObtained = 0;
    
        // Calculate grades for each subject and the total score obtained
        $subjectGrades = [];
        foreach ($subjects as $subject) {
            $subjectTezz = $tezzMap->get($subject->id);
    
            if ($subjectTezz) {
                // Use total score if available, otherwise use examscore if available,
                // otherwise use testscore if both total and examscore are NULL
                $score = $subjectTezz->toal ??  $subjectTezz->testscore ?? 0;
            } else {
                $score = 0;
            }
    
            $grade = $score > 0 ? calculateGrade($score) : 'N/A';
    
            if ($score > 0) {
                $totalScoreObtained += $score;
            }
    
            $subjectGrades[$subject->id] = [
                'name' => $subject->subjectname,
                'score' => $score,
                'grade' => $grade
            ];
        }
    
        // Calculate percentage
        $percentage = $overallScore > 0 ? ($totalScoreObtained / $overallScore) * 100 : 0;
    
        // Calculate overall grade based on percentage
        function calculateOverallGrade($percentage)
        {
            if ($percentage >= 90) return 'A+';
            if ($percentage >= 80) return 'A';
            if ($percentage >= 70) return 'B+';
            if ($percentage >= 60) return 'B';
            if ($percentage >= 50) return 'C+';
            if ($percentage >= 40) return 'C';
            if ($percentage >= 30) return 'D';
            return 'F';
        }
    
        $overallGrade = calculateOverallGrade($percentage);
    
        // Define comment based on overall grade
        $comment = '';
        switch ($overallGrade) {
            case 'A+':
            case 'A':
                $comment = 'Excellent performance! Keep up the great work.';
                break;
            case 'B+':
            case 'B':
                $comment = 'Good job! You have performed well but there is room for improvement.';
                break;
            case 'C+':
            case 'C':
                $comment = 'Satisfactory performance. Try to work harder to improve your grades.';
                break;
            case 'D':
                $comment = 'Needs improvement. Consider seeking additional help and focusing more on your studies.';
                break;
            case 'F':
                $comment = 'Unsatisfactory performance. Please review your study habits and seek assistance.';
                break;
            default:
                $comment = 'No comment available.';
                break;
        }
    
        return view('admin.viewselresult', [
            'student' => $student,
            'classrmName' => $classrmName,
            'subjects' => $subjectGrades,
            'percentage' => number_format($percentage, 2),
            'studentName' => $student->sname . ' ' . $student->onames,
            'sessid' => $sessid,
            'termid' => $termid,
            'termName' => $termName,
            'currentSessionName' => $currentSessionName,
            'overallGrade' => $overallGrade,
            'comment' => $comment // Pass the comment to the view
        ]);
    }
    


public function createoverall()
{
    $classrm = classrm::orderBy('classname', 'asc')->get();
    $seszion = seszion::all();

    // Transform each session in the collection
    $seszion->transform(function($session) {
        $session->restoredSessname = $this->restoreSlashes($session->sessname);
        return $session;
    });

    $sessionsMap = $seszion->pluck('restoredSessname', 'id');

    // Fetch 'ova' with related models
    $ova = ova::with(['classrm', 'seszion'])->get();

    return view('admin.createoverall', [
        'classrm' => $classrm,
        'seszion' => $seszion,
        'ova' => $ova,
        'sessionsMap' => $sessionsMap,
    ]);
}


public function storeoverallscore(Request $request)
{
       // Validate the incoming request data
       $request->validate([
        'classid' => 'required|exists:classrm,id',
        'termid' => 'required|integer|in:1,2,3',
        'sessid' => 'required|exists:seszion,id',
        'scori' => 'required|integer'
       
    ]);

 

    try {
        // Create a new student record
        $ova= new ova();
        $ova->classid = $request->input('classid');
        $ova->termid = $request->input('termid');
        $ova->sessid = $request->input('sessid');
        $ova->scori = $request->input('scori');
     
     
     
        $ova->save(); // Save the record to the database

        return redirect()->back()->with('success', 'Overall Score added successfully!');
    } catch (\Exception $e) {
        \Log::error('Error importing score record:', ['exception' => $e]);
        return redirect()->back()->with('error', 'Error inserting Overall Score. Please try again.');
    }
}



public function viewscorebyclass(Request $request) {
    $classId = $request->input('classid');
    $classrm = classrm::where('id', $classId)->first();
    $classes = classrm::all(); // Get all classes for the dropdown
    $sessions = seszion::all(); // Get all sessions for the dropdown
    $ova = $classId ? ova::where('classid', $classId)->get() : collect();

    if ($ova->isEmpty()) {
        return back()->with('error', 'No Overall class set available for the selected class.');
    }

    return view('admin.viewselscorepage', compact('ova', 'classrm', 'classes', 'sessions'));
}



public function editoverallscore(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'id' => 'required|integer|exists:ova,id',
        'classid' => 'required|integer|exists:classrm,id',
        'sessid' => 'required|integer|exists:seszion,id',
        'termid' => 'required|integer|in:1,2,3',
        'scori' => 'required|numeric',
    ]);

    // Find the record by ID
    $ova = Ova::find($validatedData['id']);
    
    if (!$ova) {
        return redirect()->route('admin.viewscorebyclass', ['classid' => $validatedData['classid']])
                         ->with('error', 'Record not found.');    
    }

    // Update the record
    $ova->classid = $validatedData['classid'];
    $ova->sessid = $validatedData['sessid'];
    $ova->termid = $validatedData['termid'];
    $ova->scori = $validatedData['scori'];
    $ova->save();

    // Redirect back to the score view page with a success message
    return redirect()->route('admin.viewscorebyclass', ['classid' => $validatedData['classid']])
                     ->with('success', 'Overall score updated successfully!');
}

public function deleteoverallscore($id)
{
    $ova = Ova::find($id);
    if (!$ova) {
        return redirect()->route('admin.viewselscorepage') // Redirect to a specific route
                        ->with('error', 'Record not found.');
    }
    $ova->delete();
    return redirect()->route('admin.viewselscorepage') // Redirect to a specific route
                     ->with('success', 'Overall score deleted successfully!');
}

    // Show the admin dashboard
    public function index()
    {
        return view('Admin.dashboard'); // Ensure you have this view file
    }
}
