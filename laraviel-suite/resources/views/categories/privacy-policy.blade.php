@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('custom-css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid privacy-policy">
    <div class="body privacy-body1">
        <div class="row text-center">
            
            <div class="col-12 logo-modal">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>
            <div class="col-12">
                <p class="pri-header">Privacy and Policies</p>
            </div>
            <div class="col-12">
                <p class="mb-2">Laraveil suites is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you make a reservation with us or visit our website. Please read this policy carefully. If you do not agree with the terms of this policy, please do not use our services.</p>
            </div>
            <hr>
            <div class="col-12">
                <p class="pri-header">Information We Collect</p>
            </div>
            <div class="col-12 text-start collect">
                <ol class="list-unstyled">
                    <li><strong>1. Personal Information:</strong> This includes your name, email address, phone number, mailing address, and payment information.</li>
                    <li><strong>2. Reservation Information:</strong> Details about your stay, such as check-in and check-out dates, room preferences, and special requests.</li>
                    <li><strong>3. Usage Data:</strong> Information about how you use our website, including your IP address, browser type, and pages visited.</li>
                    <li><strong>4. Cookies and Tracking Technologies:</strong> We use cookies to enhance your experience on our website. You can control cookie preferences through your browser settings.</li>
                </ol>
                <hr>
                <div class="col-12 text-center">
                    <p class="pri-header">We may share your information with:</p>
                </div>
                <div class="col-12 text-start collect">
                    <ol class="list-unstyled">
                        <li><strong>Service Providers</strong>: Third-party vendors who assist us in operating our business.</li>
                        <li><strong>Legal Authorities</strong>: If required by law or in response to valid requests by public authorities.</li>
                        <li><strong>Business Transfers</strong>: In connection with any merger, sale of company assets, or acquisition of all or a portion of our business.</li>
                    </ol>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="pri-header">Your Rights</p>
                    </div>
                    <div class="col-12 rights">
                        <ul>
                            <li>The right to access and receive a copy of your personal information.</li>
                            <li>The right to request corrections to your personal information.</li>
                            <li>The right to request the deletion of your personal information.</li>
                            <li>The right to object to or restrict the processing of your personal information.</li>
                        </ul>
                        <p>To exercise these rights, please contact us using the information provided below.</p>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-12">
                        <p class="pri-header">Changes to This Privacy Policy</p>
                        <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the effective date. We encourage you to review this Privacy Policy periodically for any updates.</p>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <p class="pri-header">Contact Us</p>
                    <p>If you have any questions or concerns about this Privacy Policy or our practices, please contact us at:</p>
                    <div class="container">
                        <p>Laraveil Suites <br>
                            Fort Bonifacio, Taguig <br>
                            laraveilsuites@gmail.com <br>
                            +63 98521364752</p> 
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection 