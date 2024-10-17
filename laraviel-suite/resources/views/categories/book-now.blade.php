@extends('layouts.app')

@section('title', 'Laraveil Suite')  <!-- Optional: Set the title of the page -->
@section('custom-css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
<div class="container pt-5 mt-5">
        <!-- Progress Bar -->
        <div class="progress-bar-container">
            <!-- Step 1 -->
            <div class="progress-step active">
                <div class="step-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="step-label">Reservation</div>
            </div>

            <!-- Step 2 -->
            <div class="progress-step">
                <div class="step-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="step-label">Details</div>
            </div>

            <!-- Step 3 -->
            <div class="progress-step">
                <div class="step-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="step-label">Confirmation</div>
            </div>
        </div>

        <!-- Content for the current step -->
        <div class="content">
            <h3 id="step-title">Step 1: Make a Reservation</h3>
            <p id="step-description">This is where the reservation form will go.</p>
        </div>

        <!-- Button to simulate progress -->
        <button id="nextStepBtn" class="btn btn-primary">Next Step</button>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const steps = document.querySelectorAll('.progress-step');
        const stepTitle = document.getElementById('step-title');
        const stepDescription = document.getElementById('step-description');
        const nextStepBtn = document.getElementById('nextStepBtn');
        let currentStep = 1;

        // Function to update progress bar and step content
        function updateProgress(step) {
            steps.forEach((element, index) => {
                if (index < step) {
                    element.classList.add('active');
                } else {
                    element.classList.remove('active');
                }
            });

            // Update content based on step
            switch (step) {
                case 1:
                    stepTitle.textContent = 'Step 1: Make a Reservation';
                    stepDescription.textContent = 'This is where the reservation form will go.';
                    nextStepBtn.textContent = 'Next Step';
                    break;
                case 2:
                    stepTitle.textContent = 'Step 2: Enter Your Details';
                    stepDescription.textContent = 'This is where the details form will go.';
                    nextStepBtn.textContent = 'Next Step';
                    break;
                case 3:
                    stepTitle.textContent = 'Step 3: Confirmation';
                    stepDescription.textContent = 'Confirm your reservation here.';
                    nextStepBtn.textContent = 'Finish';
                    break;
                default:
                    break;
            }
        }

        // Event listener for the next button
        nextStepBtn.addEventListener('click', function () {
            if (currentStep < steps.length) {
                currentStep++;
                updateProgress(currentStep);
            }
        });

        // Initialize the first step
        updateProgress(currentStep);
    </script>
</body>
@section('content')

@endsection