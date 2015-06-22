<?php namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Response;
use Validator;
use Input;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected $dirname = "/uploads";

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//		$this->middleware('auth');
        $this->dirname = public_path() . $this->dirname;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }

    public function uploadImage()
    {

        $destinationPath = 'images/';

        $newImageName='MyImage.jpg';

        Input::file('file')->move($destinationPath,$newImageName);

        //Rename and move the file to the destination folder



        return json_encode(array('code' => '111'));

        if($bla->move(public_path().'/uploads','bla.jpg')) {
            return    Response::json(array('code' => '111'));
        }
        return Response::json(array('code' => '000'));



        // Directory where uploaded images are saved
        $dirname = public_path('uploads');
        // If uploading file
        if ($_FILES) {
            print_r($_FILES);
            move_uploaded_file($_FILES["file"]["tmp_name"], $dirname . "/" . $_FILES["file"]["name"]);
        } // If retrieving an image
//        else if (isset($_GET['image'])) {
//            $file = $dirname . "/" . $_GET['image'];
//
//            // Specify as jpeg
//            header('Content-type: image/jpeg');
//
//            // Resize image for mobile
//            list($width, $height) = getimagesize($file);
//            $newWidth = 120.0;
//            $size = $newWidth / $width;
//            $newHeight = $height * $size;
//            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
//            $image = imagecreatefromjpeg($file);
//            imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
//            imagejpeg($resizedImage, null, 80);
//        } // If displaying images
        else {
            $baseURI = "http://" . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
            $images = scandir($dirname);
            $ignore = Array(".", "..");
            if ($images) {
                foreach ($images as $curimg) {
                    if (!in_array($curimg, $ignore)) {
                        echo "Image: " . $curimg . "<br>";
                        echo "<img src='" . $baseURI . "?image=" . $curimg . "&rnd=" . uniqid() . "'><br>";
                    }
                }
            } else {
                echo "No images on server";
            }
        }

    }

    /**
     * Save image to database
     *
     */
    public function saveImage(Request $request){
        if ($this->getUserStatus() != 1) {
            return json_encode(['result' => -1, 'message' => 'Please login first!']);
        }
        $user = \Auth::user();
        $record = new Record();
        $record->user_id = $user->id;
        $record->record_type = $request->get('record_type');
        $record->image = $request->get('image');
        $record->remote_ip = $request->ip();

        try {
            if ($record->save()) {
                return json_encode(['result' => 1, 'message' => 'You have successfully create a new record.']);
            }
            return json_encode(['result' => 0, 'message' => 'Can not save record!']);
        } catch (\Exception $ex) {
            return json_encode(['result' => 0, 'message' => $ex->getMessage()]);
        }
    }
}
