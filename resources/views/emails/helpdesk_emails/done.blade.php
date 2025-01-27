<!DOCTYPE html>
<html>
<head>
    <title>Helpdesk Report Resolved</title>
</head>
<body>
<p style="text-transform: capitalize">Dear {{ $name }},</p>

<p>We are pleased to inform you that your reported issue has been successfully <strong>resolved</strong>. Please see the details of your ticket below:</p>

<h4>Ticket Details:</h4>
<ul>
    <li><strong>Ticket Number:</strong> <span style="text-transform: uppercase">{{ $case }}</span></li>
    <li><strong>Status:</strong> Resolved</li>
</ul>

<p>If you encounter any further issues or have additional concerns, feel free to create a new ticket.</p>

<p>Thank you for your patience and cooperation.</p>

<p>Best regards,<br>
    IT Helpdesk Team</p>
</body>
</html>
