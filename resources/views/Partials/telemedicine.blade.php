@extends('patient-sidebar')

@section('content')

<div class="chat-container">
    <div class="chat-header">
        <h2>Chat with your doctor</h2>
        <button class="telemedicine-btn">Start telemedicine</button>
    </div>

    <div class="chat-message">

        <div class="message patient-message">
            <p>Hello, Dr. Smith!, I have a question about my recent lab results.</p>
            <span class="timestamp">10:00am</span>
        </div>

        <div class="message doctor-message">
            <p>Hello, Dr. John!, please go ahead and share your question.</p>
            <span class="timestamp">10:00am</span>
        </div>

        <div class="message patient-message">
            <p>Hello, Dr. Smith!, I have a question about my recent lab results.</p>
            <span class="timestamp">10:00am</span>
        </div>

        <div class="message doctor-message">
            <p>Hello, Dr. John!, please go ahead and share your question.</p>
            <span class="timestamp">10:00am</span>
        </div>
    </div>

    <div class="chat-input">
        <input type="text" id="chat-input" placeholder="Type your message..." required>
        <button class="send"><img src="{{ asset('img/send.svg') }}" alt=""></button>
    </div>
</div>

@endsection