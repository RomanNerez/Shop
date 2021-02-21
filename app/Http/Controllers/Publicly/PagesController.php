<?php
namespace App\Http\Controllers\Publicly;

use App\Http\Controllers\Controller;
use App\Repositories\Publicly\HeaderRepository;
use App\Repositories\Publicly\PagesRepository;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    protected $pagesRepo;
    protected $headerRepo;

    public function __construct(HeaderRepository $headerRepo, PagesRepository $pagesRepo)
    {
        $this->headerRepo = $headerRepo;
        $this->pagesRepo = $pagesRepo;
    }

    public function home(Request $request)
    {
        $response = [
            'header'    => $this->headerRepo->data($request),
            'data'      => $this->pagesRepo->data('home'),
            'component' => 'home'
        ];

        return view('public.pages.home', compact('response'));
    }

    public function services(Request $request)
    {
        $response = [
            'header'    => $this->headerRepo->data($request),
            'data'      => $this->pagesRepo->data('services'),
            'component' => 'services'
        ];

        return view('public.pages.services.index', compact('response'));
    }

    public function serviceVinyls(Request $request)
    {
        $response = [
            'header'    => $this->headerRepo->data($request),
            'data'      => $this->pagesRepo->data('vinyls'),
            'component' => 'service-vinyls'
        ];

        return view('public.pages.services.vinyls', compact('response'));
    }

    public function serviceStanding(Request $request)
    {
        $response = [
            'header'    => $this->headerRepo->data($request),
            'data'      => $this->pagesRepo->data('standing'),
            'component' => 'service-standing'
        ];

        return view('public.pages.services.standing', compact('response'));
    }

    public function delivery(Request $request)
    {
        $response = [
            'header'    => $this->headerRepo->data($request),
            'data'      => $this->pagesRepo->data('delivery'),
            'component' => 'delivery'
        ];

        return view('public.pages.delivery', compact('response'));
    }

    public function contacts(Request $request)
    {
        $response = [
            'header'    => $this->headerRepo->data($request),
            'data'      => $this->pagesRepo->data('contacts'),
            'component' => 'contacts'
        ];

        return view('public.pages.contacts', compact('response'));
    }

    public function calculator(Request $request)
    {
        $response = [
            'header'    => $this->headerRepo->data($request),
            'data'      => $this->pagesRepo->data('calculator'),
            'component' => 'calculator'
        ];

        return view('public.pages.calculator', compact('response'));
    }

    public function units(Request $request)
    {
        $response = [
            'header'    => $this->headerRepo->data($request),
            'data'      => $this->pagesRepo->data('units'),
            'component' => 'units'
        ];

        return view('public.pages.units', compact('response'));
    }

    public function returns(Request $request)
    {
        $response = [
            'header'    => $this->headerRepo->data($request),
            'data'      => $this->pagesRepo->data('returns'),
            'component' => 'returns'
        ];

        return view('public.pages.returns', compact('response'));
    }

    public function certificates(Request $request)
    {
        $response = [
            'header'    => $this->headerRepo->data($request),
            'data'      => $this->pagesRepo->data('certificates'),
            'component' => 'certificates'
        ];

        return view('public.pages.certificates', compact('response'));
    }

    public function partnership(Request $request)
    {
        $response = [
            'header'    => $this->headerRepo->data($request),
            'data'      => $this->pagesRepo->data('partnership'),
            'component' => 'partnership'
        ];

        return view('public.pages.partnership', compact('response'));
    }

    public function privacyPolicy(Request $request)
    {
        $response = [
            'header'    => $this->headerRepo->data($request),
            'data'      => $this->pagesRepo->data('policy'),
            'component' => 'policy'
        ];

        return view('public.pages.typical-page', compact('response'));
    }

    public function measuring(Request $request)
    {
        $response = [
            'header'    => $this->headerRepo->data($request),
            'data'      => $this->pagesRepo->data('measuring'),
            'component' => 'policy'
        ];

        return view('public.pages.measuring', compact('response'));
    }
}

