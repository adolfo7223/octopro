const API_KEY = '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';

// SendinBlue API endpoint for sending transactional emails
const API_ENDPOINT = 'https://api.sendinblue.com/v3/smtp/email';

// Define your email data
const emailData = {
    sender: { name: 'Sample', email: 'sample@mailinator.com' },
    to: [{ email: 'adolfojohnkenneth@mailinator.com' }],
    subject: 'Rating',
    htmlContent: 'Hello',
    textContent: 'Hello',
};

// Create a new XMLHttpRequest
const xhr = new XMLHttpRequest();

// Configure the request
xhr.open('POST', API_ENDPOINT, true);
xhr.setRequestHeader('Content-Type', 'application/json');
xhr.setRequestHeader('api-key', API_KEY);

// Handle the response
xhr.onload = function() {
    if (xhr.status >= 200 && xhr.status < 300) {
        console.log('Email sent successfully:', xhr.responseText);

        alert('Email sent successfully');
        
    } else {
        console.error('Error sending email:', xhr.status, xhr.statusText);
    }
};

// Handle network errors
xhr.onerror = function() {
    console.error('Network error occurred');
};

// Send the request with the email data
xhr.send(JSON.stringify(emailData));