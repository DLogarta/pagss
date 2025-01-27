<!DOCTYPE html>
<html>
<head>
    <title>Helpdesk Report Response</title>
</head>
<body>
<p style="text-transform: capitalize">Dear {{ $name }},</p>

<p>Thank you for reaching out to the IT Helpdesk. We have reviewed your report and taken action. Please find the updated details of your ticket below:</p>

<h4>Updated Details:</h4>
<ul>
    <li><strong>Ticket Number:</strong> <span style="text-transform: uppercase">{{ $case }}</span></li>
    <li><strong>Assigned To:</strong> <span style="text-transform: capitalize">{{ $assigned_to }}</span></li>
    <li><strong>Status:</strong> Ongoing</li>
</ul>

<p>Our team is currently working on resolving your concern.</p>

<p>Best regards,<br>
    IT Helpdesk Team</p>
</body>
</html>
