<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutLevel1;
use App\Models\Contact;
use App\Models\CoreVision;
use App\Models\Fleet;
use App\Models\Future;
use App\Models\Gallery;
use App\Models\News;
use App\Models\ServiceLevel1;
use App\Models\Slider;
use App\Models\Stastic;
use App\Models\VisionLevel1;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    public function index(){
       $sliders =Cache::remember('sliders', 60, function () {
        return Slider::select('title', 'description', 'image')->get();
    });
    $abouts = About::with('aboutlevel1')->get();
    $news = News::with('newsimage')->get();

    $statistics =Cache::remember('stastics', 60, function () {
        return Stastic::select('title', 'description')->get();
    });
     $corevisions =Cache::remember('corevisions', 60, function () {
        return CoreVision::select('title', 'description')->get();
    });
    // galleries
 $galleries =Cache::remember('galleries', 60, function () {
        return Gallery::select('title', 'image')->get();
    });
    $visionlevel = VisionLevel1::where('title', 'OurStrategicGoals')
    ->with('visionimage', 'visionlevel2')
    ->get();
$visions = VisionLevel1::select('id', 'title')->get();
$servicelevel1=ServiceLevel1::with('servicelevel2')->get();
$contacts=Contact::with('email','phone','address')->get();

    // dd($visionlevel);
    return view('welcome', compact('visions','sliders','abouts','statistics','visionlevel','galleries','news','corevisions','servicelevel1','contacts'));
}
public function showaboutlevel1($id){
$contacts=Contact::with('email','phone','address')->get();

    $aboutlevel1=AboutLevel1::where('id',$id)->with('aboutlevel2','aboutheaderimage','about')->get();
$servicelevel1=ServiceLevel1::with('servicelevel2')->get();
$visions = VisionLevel1::select('id', 'title')->get();

    $abouts = About::with('aboutlevel1')->get();
 $galleries =Cache::remember('galleries', 60, function () {
        return Gallery::select('title', 'image')->get();
    });
    // dd($aboutlevel1);
    return view('website.aboutlevel1',compact('contacts','aboutlevel1','abouts','galleries','servicelevel1','visions'));
}
public function showservicelevel1($id){
   $servicelevel1=ServiceLevel1::where('id',$id)->with('servicelevel2','serviceimage','serviceheader')->get();
    $abouts = About::with('aboutlevel1')->get();
 $galleries =Cache::remember('galleries', 60, function () {
        return Gallery::select('title', 'image')->get();
    });
$visions = VisionLevel1::select('id', 'title')->get();

    // dd($aboutlevel1);
    $contacts=Contact::with('email','phone','address')->get();

    return view('website.servicelvel1',compact('contacts','servicelevel1','abouts','galleries','visions'));
}
public function showvision($id){
   $visionlevel1=VisionLevel1::where('id',$id)->with('visionlevel2','visionimage','visionheader')->get();

   $abouts = About::with('aboutlevel1')->get();
 $galleries =Cache::remember('galleries', 60, function () {
        return Gallery::select('title', 'image')->get();
    });
$visions = VisionLevel1::select('id', 'title')->get();
    $servicelevel1=ServiceLevel1::with('servicelevel2')->get();
    $contacts=Contact::with('email','phone','address')->get();

    return view('website.allvision',compact('contacts','visionlevel1','visions','servicelevel1','abouts','galleries'));
}
public function showfuture(){
   $servicelevel1=ServiceLevel1::with('service','servicelevel2','serviceimage')->get();
    $abouts = About::with('aboutlevel1')->get();
 $galleries =Cache::remember('galleries', 60, function () {
        return Gallery::select('title', 'image')->get();
    });
    $futures = Future::with('futerlevel1','futureimage')->get();
$visions = VisionLevel1::select('id', 'title')->get();

    $contacts=Contact::with('email','phone','address')->get();

    // dd($aboutlevel1);
    return view('website.Future',compact('contacts','visions','servicelevel1','abouts','galleries','futures'));
}
public function showcontact(){
   $servicelevel1=ServiceLevel1::with('servicelevel2','serviceimage')->get();
    $abouts = About::with('aboutlevel1')->get();
 $galleries =Cache::remember('galleries', 60, function () {
        return Gallery::select('title', 'image')->get();
    });
    $futures = Future::with('futerlevel1','futureimage')->get();
        $contacts = Contact::with('address', 'email', 'phone')->get();
        // dd($contacts);
        // Fetch all contacts
$visions = VisionLevel1::select('id', 'title')->get();
    return view('website.Contat-us',compact('visions','servicelevel1','abouts','galleries','futures','contacts'));
}
public function showcareer(){
   $servicelevel1=ServiceLevel1::with('servicelevel2','serviceimage')->get();
    $abouts = About::with('aboutlevel1')->get();
 $galleries =Cache::remember('galleries', 60, function () {
        return Gallery::select('title', 'image')->get();
    });
    $futures = Future::with('futerlevel1','futureimage')->get();
        $contacts = Contact::with('address', 'email', 'phone')->get();
        // dd($contacts);
        // Fetch all contacts
$visions = VisionLevel1::select('id', 'title')->get();
    return view('website.career',compact('visions','servicelevel1','abouts','galleries','futures','contacts'));
}
public function showfleet(){
   $servicelevel1=ServiceLevel1::with('servicelevel2','serviceimage')->get();
    $abouts = About::with('aboutlevel1')->get();
 $galleries =Cache::remember('galleries', 60, function () {
        return Gallery::select('title', 'image')->get();
    });
    $fleets = Fleet::with('fletlevel')->get();
// dd($fleets);
    $contacts=Contact::with('email','phone','address')->get();
$visions = VisionLevel1::select('id', 'title')->get();

// dd($aboutlevel1);
    return view('website.Fleet',compact('visions','contacts','servicelevel1','abouts','galleries','fleets'));
}
public function showgallery(){
   $servicelevel1=ServiceLevel1::with('servicelevel2','serviceimage')->get();
    $abouts = About::with('aboutlevel1')->get();
 $galleries =Cache::remember('galleries', 60, function () {
        return Gallery::select('title', 'image')->get();
    });
    $fleets = Fleet::with('fletlevel')->get();
// dd($fleets);
$visions = VisionLevel1::select('id', 'title')->get();
    $contacts=Contact::with('email','phone','address')->get();

// dd($aboutlevel1);
    return view('website.gallery',compact('contacts','servicelevel1','visions','abouts','galleries','fleets'));
}
public function shownews()
{
 $servicelevel1=ServiceLevel1::with('servicelevel2','serviceimage')->get();
    $abouts = About::with('aboutlevel1')->get();
 $galleries =Cache::remember('galleries', 60, function () {
        return Gallery::select('title', 'image')->get();
    });
    $fleets = Fleet::with('fletlevel')->get();
// dd($fleets);
$visions = VisionLevel1::select('id', 'title')->get();
$news=News::with('newsimage')->get();
// dd($aboutlevel1);
    $contacts=Contact::with('email','phone','address')->get();

return view('website.News',compact('contacts','servicelevel1','visions','abouts','galleries','fleets','news'));
}
public function showNewsdetalis($eventId){
     // Fetch event details from the database using $eventId
 $servicelevel1=ServiceLevel1::with('servicelevel2','serviceimage')->get();

     $abouts = About::with('aboutlevel1')->get();
 $galleries =Cache::remember('galleries', 60, function () {
        return Gallery::select('title', 'image')->get();
    });
    $fleets = Fleet::with('fletlevel')->get();
// dd($fleets);
    $contacts=Contact::with('email','phone','address')->get();

$visions = VisionLevel1::select('id', 'title')->get();
$news = News::with('newsimage')->orderByDesc('date')->get();
$newsspecific = News::with('newsimage')->find($eventId);

     return view('website/news-detalis',compact('contacts','servicelevel1','visions','abouts','galleries','fleets','news','newsspecific'));
}
public function showcorevalue(){
    $corevisions=CoreVision::with('versionlevel1')->get();
$servicelevel1=ServiceLevel1::with('servicelevel2','serviceimage')->get();
    $abouts = About::with('aboutlevel1')->get();
 $galleries =Cache::remember('galleries', 60, function () {
        return Gallery::select('title', 'image')->get();
    });
    $fleets = Fleet::with('fletlevel')->get();
// dd($fleets);
$visions = VisionLevel1::select('id', 'title')->get();
    $contacts=Contact::with('email','phone','address')->get();

// dd($aboutlevel1);
    return view('website.Core-values',compact('contacts','servicelevel1','visions','abouts','galleries','fleets','corevisions'));}
}
