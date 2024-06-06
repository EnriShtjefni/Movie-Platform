<?php


use App\Classes\Address;
use App\Classes\Category;
use App\Classes\Company;
use App\Classes\DB;
use App\Classes\Movie;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$db = DB::connect('127.0.0.1', 'movie_platform', 'root', '', 3306);

if ($db) {
    echo "Connected to the database successfully!</br></br>";

//    Movie Operations -------------------
//    $movie = new Movie($db, 'aaa', 'aaa', 2000, 'aaa', 1, [2,3]);
//    $movie->create();
//    echo 'Created Movie ID: ' . $movie->getId() . '</br>';

//    $movie->update(49);
//    echo 'Updated Movie Title: ' . $movie->getTitle() . '</br>';

//    Movie::delete($db, 42);

//    $movieID = Movie::getById($db, 1);
//    echo 'Movie Title: ' . $movieID['title'] . '</br>';

//    $movies = Movie::getAll($db);
//    echo "Movies:</br>";
//    foreach ($movies as $movie) {
//        echo "ID: " . $movie['id'] . ", Title: " . $movie['title'] . "</br>";
//    }

//    $movieCount = Movie::countAll($db);
//    echo "Total Movies: " . $movieCount;

//    $movieSearch = Movie::search($db, 'fire');
//    echo "Filtered Movies:</br>";
//    foreach ($movieSearch as $movie) {
//        echo "ID: " . $movie['id'] . ", Title: " . $movie['title'] . "</br>";
//    }

//    $movieSearchCount = Movie::countSearch($db, 'fire');
//    echo "Total Filtered Movies: " . $movieSearchCount;


//    Category Operations  ----------------------
//    $category = new Category($db, 'Thriller');
//    $category->create();
//    echo 'Created Category ID: ' . $category->getId() . '</br>';

//    $category->update(25);
//    echo 'Updated Category Name: ' . $category->getName() . '</br>';

//    Category::delete($db, 25);

//    $categoryID = Category::getById($db, 1);
//    echo 'Category Name: ' . $categoryID['name'] . '</br>';

//    $categories = Category::getAll($db);
//    echo "Categories:</br>";
//    foreach ($categories as $category) {
//        echo "ID: " . $category['id'] . ", Name: " . $category['name'] . "</br>";
//    }

//    $categoryCount = Category::countAll($db);
//    echo "Total Categories: " . $categoryCount;

//    $categorySearch = Category::search($db, 'Action');
//    echo "Filtered Categories:</br>";
//    foreach ($categorySearch as $category) {
//        echo "ID: " . $category['id'] . ", Name: " . $category['name'] . "</br>";
//    }

//    $categorySearchCount = Category::countSearch($db, 'Action');
//    echo "Total Filtered Categories: " . $categorySearchCount;


//    Company Operations -------------------
//    $company = new Company($db, 'company name', 15);
//    $company->create();
//    echo 'Created Company ID: ' . $company->getId() . '</br>';

//    $company->update(12);
//    echo 'Updated Company Name: ' . $company->getName() . '</br>';

//    Company::delete($db, 12);

//    $companyID = Company::getById($db, 1);
//    echo 'Company Name: ' . $companyID['name'] . '</br>';

//    $companies = Company::getAll($db);
//    echo "Companies:</br>";
//    foreach ($companies as $company) {
//        echo "ID: " . $company['id'] . ", Name: " . $company['name'] . "</br>";
//    }

//    $companyCount = Company::countAll($db);
//    echo "Total Companies: " . $companyCount;

//    $companySearch = Company::search($db, 'Warner');
//    echo "Filtered Companies:</br>";
//    foreach ($companySearch as $company) {
//        echo "ID: " . $company['id'] . ", Name: " . $company['name'] . "</br>";
//    }

//    $companySearchCount = Company::countSearch($db, 'Warner');
//    echo "Total Filtered Companies: " . $companySearchCount;


//    Address Operations ------------------
//    $address = new Address($db, 'address name', 'address city', 'address country', '123456789');
//    $address->create();
//    echo 'Created Address ID: ' . $address->getId() . '</br>';

//    $address->update(14);
//    echo 'Updated Address Name: ' . $address->getName() . '</br>';

//    Address::delete($db, 14);

//    $addressID = Address::getById($db, 1);
//    echo 'Address Name: ' . $addressID['name'] . '</br>';

//    $addresses = Address::getAll($db);
//    echo "Addresses:</br>";
//    foreach ($addresses as $address) {
//        echo "ID: " . $address['id'] . ", Name: " . $address['name'] . "</br>";
//    }

//    $addressCount = Address::countAll($db);
//    echo "Total Addresses: " . $addressCount;

//    $addressSearch = Address::search($db, 'Warner');
//    echo "Filtered Addresses:</br>";
//    foreach ($addressSearch as $address) {
//        echo "ID: " . $address['id'] . ", Name: " . $address['name'] . "</br>";
//    }

//    $addressSearchCount = Address::countSearch($db, 'Warner');
//    echo "Total Filtered Addresses: " . $addressSearchCount;
} else {
    dd("Failed to connect to the database.");
}





//$app = require_once __DIR__.'/../bootstrap/app.php';
//
//$kernel = $app->make(Kernel::class);
//
//$response = $kernel->handle(
//    $request = Request::capture()
//)->send();
//
//$kernel->terminate($request, $response);
