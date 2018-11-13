<?php

namespace App\Controllers;

use App\Models\FestiveModel;
use App\Models\HotelModel;
use App\Models\PartnerModel;
use App\Models\TourismModel;
use Respect\Validation\Validator as v;

class PutController extends Controller
{

//  edit sections
 // festival starts

 public function editFestivalById($request, $response)
 {
  $id   = $request->getAttribute('id');
  $data = FestiveModel::find($id);
  return $this->view->render($response, 'festivedit.twig', [
   'title'    => 'Travel Nepal | Feestival | Edit',
   'festival' => $data,
  ]);
 }
// festival ends
 // tourism starts

 public function editTourismById($request, $response)
 {
  $id   = $request->getAttribute('id');
  $data = TourismModel::find($id);
  return $this->view->render($response, 'tourismedit.twig', [
   'title'   => 'Travel Nepal | Tourism | Edit',
   'tourism' => $data,
  ]);
 }
// tourism ends
 // partner starts

 public function editPartnerById($request, $response)
 {
  $id   = $request->getAttribute('id');
  $data = PartnerModel::find($id);
  return $this->view->render($response, 'partneredit.twig', [
   'title'   => 'Travel Nepal | Partner | Edit',
   'partner' => $data,
  ]);
 }
// partner ends

// hotel starts

 public function editHotelById($request, $response)
 {
  $id   = $request->getAttribute('id');
  $data = HotelModel::find($id);
  return $this->view->render($response, 'hoteledit.twig', [
   'title' => 'Travel Nepal | Hotel | Edit',
   'hotel' => $data,
  ]);
 }
// hotel ends

//  delete sections
 // festival starts

 public function deleteFestivalById($request, $response)
 {
  $id  = $request->getAttribute('id');
  $fes = FestiveModel::find($id);
  $fes->delete();
  $this->flash->addMessage('success', 'Festival Deleted Successfully');
  return $response->withRedirect($this->router->pathFor('festivals'));

 }
// festival ends
 // tourismplaces starts

 public function deleteTourismById($request, $response)
 {
  $id  = $request->getAttribute('id');
  $fes = TourismModel::find($id);
  $fes->delete();
  $this->flash->addMessage('success', 'Tourism Deleted Successfully');

  return $response->withRedirect($this->router->pathFor('tourism'));

 }
// tourism places ends
 // partner starts

 public function deletePartnerById($request, $response)
 {
  $id  = $request->getAttribute('id');
  $fes = PartnerModel::find($id);
  $fes->delete();
  $this->flash->addMessage('success', 'Partner Deleted Successfully');

  return $response->withRedirect($this->router->pathFor('partners'));

 }
// partner ends
 // hotel starts

 public function deleteHotelById($request, $response)
 {
  $id  = $request->getAttribute('id');
  $fes = HotelModel::find($id);
  $fes->delete();
  $this->flash->addMessage('success', 'Hotel Deleted Successfully');
  return $response->withRedirect($this->router->pathFor('hotels'));

 }
// hotel ends

// update sections

// festival starts

 public function putFestival($request, $response)
 {

  $id = $request->getparam('id');

  $uploadedFile = $request->getUploadedFiles()['image1'];
  $directory    = 'C:/xampp/htdocs/travelapi/public/uploads/';
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
  $festiveUpdate = FestiveModel::find($id);

  $festiveUpdate->nameoffestival = $request->getParam('nameoffestival');
  $festiveUpdate->date           = $request->getParam('date');
  $festiveUpdate->image1         = $filename;
  $festiveUpdate->image2         = $filename1;
  $festiveUpdate->description    = $request->getParam('description');
  $festiveUpdate->details        = $request->getParam('details');

  $festiveUpdate->save();
$this->flash->addMessage('success', 'Festival Updated Successfully');

  return $response->withRedirect($this->router->pathFor('festivals'));

 }

// festival ends

// Tourism Palces starts

 public function putTourism($request, $response)
 {

  $id = $request->getparam('id');

  $uploadedFile = $request->getUploadedFiles()['image1'];
  $directory    = 'C:/xampp/htdocs/travelapi/public/uploads/';
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
  $tourismUpdate = TourismModel::find($id);

  $tourismUpdate->nameofplace     = $request->getParam('nameofplace');
  $tourismUpdate->locationofplace = $request->getParam('locationofplace');
  $tourismUpdate->district        = $request->getParam('district');
  $tourismUpdate->intrestingthing = $request->getParam('intrestingthing');
  $tourismUpdate->image1          = $filename;
  $tourismUpdate->image2          = $filename1;
  $tourismUpdate->description     = $request->getParam('description');
  $tourismUpdate->details         = $request->getParam('details');

  $tourismUpdate->save();
$this->flash->addMessage('success', 'Tourism Updated Successfully');

  return $response->withRedirect($this->router->pathFor('tourism'));

 }

// tourism places ends

// partner starts

 public function putPartner($request, $response)
 {

  $id = $request->getparam('id');

  $uploadedFile = $request->getUploadedFiles()['image1'];
  $directory    = 'C:/xampp/htdocs/travelapi/public/uploads/';
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
  $partnerUpdate = PartnerModel::find($id);

  $partnerUpdate->nameofcompany = $request->getParam('nameofcompany');
  $partnerUpdate->address       = $request->getParam('address');
  $partnerUpdate->district      = $request->getParam('district');
  $partnerUpdate->contact       = $request->getParam('contact');
  $partnerUpdate->phoneno       = $request->getParam('phoneno');
  $partnerUpdate->description   = $request->getParam('description');
  $partnerUpdate->image1        = $filename;
  $partnerUpdate->image2        = $filename1;
  $partnerUpdate->services      = $request->getParam('services');
  $partnerUpdate->details       = $request->getParam('details');

  $partnerUpdate->save();
$this->flash->addMessage('success', 'Partner Updated Successfully');

  return $response->withRedirect($this->router->pathFor('partners'));

 }

// partner ends

// // hotel starts

 public function putHotel($request, $response)
 {

  $id = $request->getparam('id');

  $uploadedFile = $request->getUploadedFiles()['image1'];
  $directory    = 'C:/xampp/htdocs/travelapi/public/uploads/';
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
  $hotelUpdate = HotelModel::find($id);

  $hotelUpdate->nameofhotel = $request->getParam('nameofhotel');
  $hotelUpdate->address     = $request->getParam('address');
  $hotelUpdate->district    = $request->getParam('district');
  $hotelUpdate->contact     = $request->getParam('contact');
  $hotelUpdate->image1      = $filename;
  $hotelUpdate->image2      = $filename1;
  $hotelUpdate->services    = $request->getParam('services');
  $hotelUpdate->details     = $request->getParam('details');

  $hotelUpdate->save();
$this->flash->addMessage('success', 'Hotel Updated Successfully');

  return $response->withRedirect($this->router->pathFor('hotels'));

 }

// hotel ends




}