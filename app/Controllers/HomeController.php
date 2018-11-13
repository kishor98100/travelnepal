<?php

namespace App\Controllers;

use App\Models\FestiveModel;
use App\Models\HotelModel;
use App\Models\PartnerModel;
use App\Models\TourismModel;

class HomeController extends Controller
{

 public function index($request, $response)
 {
  if (isset($_SESSION['user'])) {
   return $this->view->render($response, 'home.twig', [
    'title' => 'Travel Nepal | Home',
    'tr'    => $this->container->db::table('tourismplaces')->where('deleted_at', '')->count(),
    'fr'    => $this->container->db::table('festivals')->where('deleted_at', '')->count(),
    'hr'    => $this->container->db::table('hotels')->where('deleted_at', '')->count(),
    'pr'    => $this->container->db::table('partners')->where('deleted_at', '')->count(),
   ]);

  }
  return $response->withRedirect($this->router->pathFor('auth.getSignin'));

 }

 public function tourismPlaces($request, $response)
 {
  if (isset($_SESSION['user'])) {
   return $this->view->render($response, 'tourism.twig', [
    'title'  => 'Travel Nepal | Tourism Places',
    'places' => TourismModel::get(),

   ]);
  }
  return $response->withRedirect($this->router->pathFor('auth.getSignin'));

 }
 public function travelPartners($request, $response)
 {
  if (isset($_SESSION['user'])) {
   return $this->view->render($response, 'travelpartners.twig', [
    'title'    => 'Travel Nepal | Partners',
    'partners' => PartnerModel::get(),
   ]);
  }
  return $response->withRedirect($this->router->pathFor('auth.getSignin'));

 }
 public function festivals($request, $response)
 {
  if (isset($_SESSION['user'])) {
   return $this->view->render($response, 'festival.twig', [
    'title'     => 'Travel Nepal | Festival',
    'festivals' => FestiveModel::get(),
   ]);
  }
  return $response->withRedirect($this->router->pathFor('auth.getSignin'));

 }
 public function hotels($request, $response)
 {
  if (isset($_SESSION['user'])) {
   return $this->view->render($response, 'hotel.twig', [
    'title'  => 'Travel Nepal | Hotel',
    'hotels' => HotelModel::get(),
   ]);
  }
  return $response->withRedirect($this->router->pathFor('auth.getSignin'));

 }

 public function getTourism($request, $response)
 {
  return $this->view->render($response, 'addTourism.twig', [
   'title' => 'Travel Nepal | Tourism Places | addnew',
  ]);

 }
 public function getPartner($request, $response)
 {
  return $this->view->render($response, 'addPartner.twig', [
   'title' => 'Travel Nepal | TravelPartner | addnew',
  ]);

 }
 public function getFestival($request, $response)
 {
  return $this->view->render($response, 'addFestival.twig', [
   'title' => 'Travel Nepal | Festivals | addnew',
  ]);

 }
 public function getHotel($request, $response)
 {
  return $this->view->render($response, 'addHotel.twig', [
   'title' => 'Travel Nepal | Hotel | addnew',
  ]);

 }

 public function getTourismAll($request, $response)
 {

  $tourismData = TourismModel::get();

  $response->write(json_encode($tourismData));
 }

 public function getPartnerAll($request, $response)
 {

  $partnerData = PartnerModel::get();

  $response->write(json_encode($partnerData));
 }

 public function getHotelAll($request, $response)
 {

  $hotelData = HotelModel::get();

  $response->write(json_encode($hotelData));
 }
 public function getFestivalAll($request, $response)
 {

  $festivalData = FestiveModel::get();

  $response->write(json_encode($festivalData));
 }

 public function getTourismById($request, $response)
 {

  $id = $request->getAttribute('id');

  $tourismById = TourismModel::find($id);

  $response->write(json_encode($tourismById));

 }

 public function getPartnerById($request, $response)
 {

  $id = $request->getAttribute('id');

  $partnerById = PartnerModel::find($id);

  $response->write(json_encode($partnerById));

 }

 public function getHotelById($request, $response)
 {

  $id = $request->getAttribute('id');

  $hotelById = HotelModel::find($id);

  $response->write(json_encode($hotelById));

 }

 public function getFestivalById($request, $response)
 {

  $id = $request->getAttribute('id');

  $festivalById = FestiveModel::find($id);

  $response->write(json_encode($festivalById));

 }

}
