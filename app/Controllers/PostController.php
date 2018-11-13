<?php
namespace App\Controllers;

use App\Models\FestiveModel;
use App\Models\HotelModel;
use App\Models\PartnerModel;
use App\Models\TourismModel;
use Respect\Validation\Validator as v;

class PostController extends
Controller
{
 public function postTourism($request, $response)
 {
  $validation = $this->validator->validate($request, [
   'nameofplace'     => v::notEmpty()->alpha(),
   'locationofplace' => v::notEmpty(),
   'district'        => v::notEmpty(),
   'intrestingthing' => v::notEmpty(),
   'description'     => v::notEmpty(),
   'details'         => v::notEmpty(),

  ]);

  if ($validation->failed()) {
   return $response->withRedirect($this->router->pathFor('home.getTourism'));

  } else {

   $uploadedFile = $request->getUploadedFiles()['image1'];
   $directory    = 'C:/xampp/htdocs/travelapi/public/uploads/';
   if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
    $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    $basename  = bin2hex(random_bytes(8));
    $filename  = sprintf('%s.%0.8s', $basename, $extension);

    $uploadedFile->moveTo($directory . $filename);
   } else {
    return $response->withRedirect($this->router->pathFor('home.getTourism'));

   }

   $uploadedFile1 = $request->getUploadedFiles()['image2'];

   if ($uploadedFile1->getError() === UPLOAD_ERR_OK) {
    $extension = pathinfo($uploadedFile1->getClientFilename(), PATHINFO_EXTENSION);
    $basename  = bin2hex(random_bytes(8));
    $filename1 = sprintf('%s.%0.8s', $basename, $extension);

    $uploadedFile1->moveTo($directory . $filename1);

   } else {
    return $response->withRedirect($this->router->pathFor('home.getTourism'));

   }

   $tourism = TourismModel::create([

    'nameofplace'     => $request->getParam('nameofplace'),
    'locationofplace' => $request->getParam('locationofplace'),
    'district'        => $request->getParam('district'),
    'intrestingthing' => $request->getParam('intrestingthing'),
    'image1'          => $filename,
    'image2'          => $filename1,
    'description'     => $request->getParam('description'),
    'details'         => $request->getParam('details'),

   ]);
   $this->flash->addMessage('success', 'Places Added Successfully');
   return $response->withRedirect($this->router->pathFor('tourism'));

  }
 }

 //partners
 public function postPartner($request, $response)
 {
  $validation = $this->validator->validate($request, [
   'nameofcompany' => v::notEmpty()->alpha(),
   'address'       => v::notEmpty(),
   'district'      => v::notEmpty(),
   'contact'       => v::notEmpty()->numeric(),
   'phoneno'       => v::notEmpty()->numeric(),
   'description'   => v::notEmpty(),
   'details'       => v::notEmpty(),
   'services'      => v::notEmpty(),

  ]);

  if ($validation->failed()) {
   return $response->withRedirect($this->router->pathFor('home.getPartner'));

  } else {

   $uploadedFile = $request->getUploadedFiles()['image1'];
   $directory    = 'C:/xampp/htdocs/travelapi/public/uploads/';
   if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
    $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    $basename  = bin2hex(random_bytes(8));
    $filename  = sprintf('%s.%0.8s', $basename, $extension);

    $uploadedFile->moveTo($directory . $filename);

   } else {
    return $response->withRedirect($this->router->pathFor('home.getPartner'));

   }

   $uploadedFile1 = $request->getUploadedFiles()['image2'];

   if ($uploadedFile1->getError() === UPLOAD_ERR_OK) {
    $extension = pathinfo($uploadedFile1->getClientFilename(), PATHINFO_EXTENSION);
    $basename  = bin2hex(random_bytes(8));
    $filename1 = sprintf('%s.%0.8s', $basename, $extension);

    $uploadedFile1->moveTo($directory . $filename1);

   } else {
    return $response->withRedirect($this->router->pathFor('home.getPartner'));

   }

   $partner = PartnerModel::create([

    'nameofcompany' => $request->getParam('nameofcompany'),
    'address'       => $request->getParam('address'),
    'district'      => $request->getParam('district'),
    'contact'       => $request->getParam('contact'),
    'phoneno'       => $request->getParam('phoneno'),
    'description'   => $request->getParam('description'),
    'image1'        => $filename,
    'image2'        => $filename1,
    'details'       => $request->getParam('details'),
    'services'      => $request->getParam('services'),
   ]);
   $this->flash->addMessage('success', 'Travel Partner Added Successfully');

   return $response->withRedirect($this->router->pathFor('partners'));

  }
 }

 //festivals
 public function postFestival($request, $response)
 {

  $validation = $this->validator->validate($request, [
   'nameoffestival' => v::notEmpty()->alpha(),
   'date'           => v::notEmpty(),
   'description'    => v::notEmpty(),
   'details'        => v::notEmpty(),

  ]);

  if ($validation->failed()) {
   return $response->withRedirect($this->router->pathFor('home.getFestival'));

  } else {

   $uploadedFile = $request->getUploadedFiles()['image1'];
   $directory    = 'C:/xampp/htdocs/travelapi/public/uploads/';
   if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
    $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    $basename  = bin2hex(random_bytes(8));
    $filename  = sprintf('%s.%0.8s', $basename, $extension);

    $uploadedFile->moveTo($directory . $filename);

   } else {
    return $response->withRedirect($this->router->pathFor('home.getFestival'));
   }

   $uploadedFile1 = $request->getUploadedFiles()['image2'];

   if ($uploadedFile1->getError() === UPLOAD_ERR_OK) {
    $extension = pathinfo($uploadedFile1->getClientFilename(), PATHINFO_EXTENSION);
    $basename  = bin2hex(random_bytes(8));
    $filename1 = sprintf('%s.%0.8s', $basename, $extension);

    $uploadedFile1->moveTo($directory . $filename1);

   } else {
    return $response->withRedirect($this->router->pathFor('home.getFestival'));

   }

   $festival = FestiveModel::create([

    'nameoffestival' => $request->getParam('nameoffestival'),
    'date'           => $request->getParam('date'),
    'image1'         => $filename,
    'image2'         => $filename1,
    'description'    => $request->getParam('description'),
    'details'        => $request->getParam('details'),

   ]);
   $this->flash->addMessage('success', 'Festival  Added Successfully');

   return $response->withRedirect($this->router->pathFor('festivals'));
  }
 }

 //hotels
 public function postHotel($request, $response)
 {

  $validation = $this->validator->validate($request, [
   'nameofhotel' => v::notEmpty()->alpha(),
   'address'     => v::notEmpty(),
   'district'    => v::notEmpty(),
   'contact'     => v::notEmpty(),
   'services'    => v::notEmpty(),
   'details'     => v::notEmpty(),
  ]);

  if ($validation->failed()) {

   return $response->withRedirect($this->router->pathFor('home.getHotel'));

  } else {
   $directory = 'C:/xampp/htdocs/travelapi/public/uploads/';

   $uploadedFile = $request->getUploadedFiles()['image1'];

   if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
    $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    $basename  = bin2hex(random_bytes(8));
    $filename  = sprintf('%s.%0.8s', $basename, $extension);
    $uploadedFile->moveTo($directory . $filename);
   }

   $uploadedFile1 = $request->getUploadedFiles()['image2'];

   if ($uploadedFile1->getError() === UPLOAD_ERR_OK) {
    $extension = pathinfo($uploadedFile1->getClientFilename(), PATHINFO_EXTENSION);
    $basename  = bin2hex(random_bytes(8));
    $filename1 = sprintf('%s.%0.8s', $basename, $extension);

    $uploadedFile1->moveTo($directory . $filename1);

   }

   $hotel = HotelModel::create([

    'nameofhotel' => $request->getParam('nameofhotel'),
    'address'     => $request->getParam('address'),
    'district'    => $request->getParam('district'),
    'contact'     => $request->getParam('contact'),
    'image1'      => $filename,
    'image2'      => $filename1,
    'services'    => $request->getParam('services'),
    'details'     => $request->getParam('details'),

   ]);
   $this->flash->addMessage('success', 'Hotel Added Successfully');

   return $response->withRedirect($this->router->pathFor('hotels'));
  }
 }

}
