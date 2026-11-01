<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Http\Requests\StoreEnquiryRequest;
use App\Mail\NewEnquiryNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function services()
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $faqs = Faq::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('pages.services', compact('services', 'faqs'));
    }

    public function gallery()
    {
        $projects = Project::active()
            ->orderBy('is_featured', 'desc')
            ->orderBy('sort_order')
            ->get();

        return view('pages.gallery', compact('projects'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function storeEnquiry(StoreEnquiryRequest $request)
    {
        // Check honeypot field - if filled, it's spam
        if ($request->filled('website')) {
            return response()->json([
                'success' => false,
                'message' => 'Your enquiry could not be processed. Please try again.',
            ], 422);
        }

        // Create enquiry
        $enquiry = Enquiry::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'town' => $request->town,
            'bathroom_type' => $request->bathroom_type,
            'best_time_to_call' => $request->best_time_to_call ?? 'Any time',
            'message' => $request->message,
            'status' => 'new',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Send email notification
        try {
            $siteSettings = SiteSetting::current();
            $recipientEmail = $siteSettings->email ?? config('mail.from.address');
            Mail::to($recipientEmail)->send(new NewEnquiryNotification($enquiry));
        } catch (\Exception $e) {
            // Log error but don't fail the submission
            \Log::error('Failed to send enquiry email: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your enquiry! Robert will be in touch soon.',
        ]);
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }
}