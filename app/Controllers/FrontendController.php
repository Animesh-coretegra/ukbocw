<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CausesModel;
use App\Models\EventsModel;
use App\Models\GeneralModel;
use App\Models\MenuMappingModel;
use App\Models\MenuModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class FrontendController extends BaseController
{
    private $menuModel;
    private $roleModel;
    private $event;
    private $generalModel;
    private $causesModel;
    private $session;

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->generalModel = new GeneralModel();
        $this->causesModel = new CausesModel();
        $this->event = new EventsModel();
        $this->session = session();
    }
    public function index()
    {
        $this->session->set('pageTitle', 'Home');
        $data['causeData'] = $this->generalModel->fetch_data('causes', array('status' => '1', 'is_urgent' => '1'), null, array('id' => 'DESC'), array('3'));
        $data['latestData'] = $this->generalModel->fetch_data('causes', array('status' => '1', 'is_latest' => '1'), null, array('id' => 'DESC'), array('4'));
        $data['upcomingEvent'] = $this->generalModel->fetch_data('events', array('status' => '1', 'is_upcoming' => '1'), null, array('id' => 'DESC'), array('6'));
        $data['sliderData'] = $this->generalModel->fetch_single_data('slider', array('status' => '1'));
        return view('index', $data);
    }
    public function about()
    {
        $this->session->set('pageTitle', 'About-us');
        return view('about');
    }
    public function team()
    {
        $this->session->set('pageTitle', 'Team');
        return view('team');
    }
    public function blog()
    {
        $this->session->set('pageTitle', 'Blog');
        return view('blog');
    }
    public function contact()
    {
        $this->session->set('pageTitle', 'Contact-us');
        return view('contact');
    }
    public function donate()
    {
        $this->session->set('pageTitle', 'Donation');
        $data = array(
            'causeData' => $this->causesModel->where('status', '1')->paginate(),
            'pager' => $this->causesModel->pager
        );
        return view('donote', $data);
    }
    public function event()
    {
        $this->session->set('pageTitle', 'Event');
        $data = array(
            'causeData' => $this->event->where('status', '1')->paginate(),
            'pager' => $this->event->pager
        );
        return view('event', $data);
    }
    public function causeDetails($id)
    {
        $donationId = urldecode(base64_decode($id));
        $this->session->set('pageTitle', 'Donation Details');
        $causeDetails = $this->causesModel->getCause(array('cause_id' => $donationId));
        $causeDetails['cause_thumbnail_images'] = explode(';', $causeDetails['cause_thumbnail_image']);

        return view('donation_details', compact('causeDetails'));
    }
    public function eventDetails($id)
    {
        $donationId = urldecode(base64_decode($id));
        $this->session->set('pageTitle', 'Event Details');
        $eventDetails = $this->generalModel->fetch_single_data('events', array('event_id' => $donationId));
        $upcoming = $this->generalModel->fetch_data('events', array('is_upcoming' => '1'), null, array('id' => 'DESC'), array('5'));
        return view('event_detail', compact('eventDetails', 'upcoming'));
    }
}
