<?php

$app->get('/',"AuthController:index")->setName('auth.getSignin');
$app->post('/login',"AuthController:postLogin")->setName('auth.login');
$app->get('/logout',"AuthController:getLogout");

$app->get('/dash', 'HomeController:index')->setName('dash');
$app->get('/dash/tourism-places', 'HomeController:tourismPlaces')->setName('tourism');
$app->get('/dash/travel-partners', 'HomeController:travelPartners')->setName('partners');
$app->get('/dash/festivals', 'HomeController:festivals')->setName('festivals');
$app->get('/dash/hotels', 'HomeController:hotels')->setName('hotels');

$app->get('/dash/tourism-places/add', 'HomeController:getTourism')->setName('home.getTourism');
$app->get('/dash/travel-partners/add', 'HomeController:getPartner')->setName('home.getPartner');
$app->get('/dash/hotels/add', 'HomeController:getHotel')->setName('home.getHotel');
$app->get('/dash/festivals/add', 'HomeController:getFestival')->setName('home.getFestival');


$app->post('/dash/tourism-places/addnew', 'PostController:postTourism')->setName('home.postTourism');
$app->post('/dash/travel-partners/addnew', 'PostController:postPartner')->setName('home.postPartner');
$app->post('/dash/hotels/addnew', 'PostController:postHotel')->setName('home.postHotel');
$app->post('/dash/festivals/addnew', 'PostController:postFestival')->setName('home.postFestival');





// get all data for tourism places
$app->get('/dash/tourism-places/getAll', 'HomeController:getTourismAll');

// get data of tourism places by id
$app->get('/dash/tourism-places/getById/{id}', 'HomeController:getTourismById');

// get all data for travel partners
$app->get('/dash/travel-partners/getAll', 'HomeController:getPartnerAll');

// get data of travel partners by id
$app->get('/dash/travel-partners/getById/{id}', 'HomeController:getPartnerById');

// get all data for Hotels
$app->get('/dash/hotels/getAll', 'HomeController:getHotelAll');

// get data of Hotels by id
$app->get('/dash/hotels/getById/{id}', 'HomeController:getHotelById');

// get all data for festivals
$app->get('/dash/festivals/getAll', 'HomeController:getFestivalAll');

// get data of festivals by id
$app->get('/dash/festivals/getById/{id}', 'HomeController:getFestivalById');

// edit for festival

$app->get('/dash/festivals/edit/{id}', 'PutController:editFestivalById');
// edit for tourism places

$app->get('/dash/tourism-places/edit/{id}', 'PutController:editTourismById');
// edit for festival

$app->get('/dash/travel-partners/edit/{id}', 'PutController:editPartnerById');
// edit for festival

$app->get('/dash/hotels/edit/{id}', 'PutController:editHotelById');

// delete for festival

$app->get('/dash/festivals/delete/{id}', 'PutController:deleteFestivalById');
// delete for tourism

$app->get('/dash/tourism-places/delete/{id}', 'PutController:deleteTourismById');
// delete for partners

$app->get('/dash/travel-partners/delete/{id}', 'PutController:deletePartnerById');
// delete for hotels

$app->get('/dash/hotels/delete/{id}', 'PutController:deleteHotelById');

// update section

// festival starts
$app->post('/dash/festivals/update/', 'PutController:putFestival')->setName('home.putFestival');
// festival ends
// tourism places starts
$app->post('/dash/tourism-places/update/', 'PutController:putTourism')->setName('home.putTourism');
// tourism places ends
// partners starts
$app->post('/dash/travel-partners/update/', 'PutController:putPartner')->setName('home.putPartner');
// partners ends
// hotels starts
$app->post('/dash/hotels/update/', 'PutController:putHotel')->setName('home.putHotel');
// hotels ends
