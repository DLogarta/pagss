<!DOCTYPE html>
<html>
<head>
    <title>Helpdesk Report Status Reverted</title>
</head>
<body>
<p style="text-transform: capitalize">Dear {{ $name }},</p>

<p>Your ticket status has been reverted to <strong>Pending</strong> for further review. Please see the ticket details below:</p>

<h4>Ticket Details:</h4>
<ul>
    <li><strong>Ticket Number:</strong> <span style="text-transform: uppercase">{{ $case }}</span></li>
    <li><strong>Status:</strong> Pending</li>
</ul>

<p>If you have any additional information to provide, please contact the IT Helpdesk and provide your ticket number for reference.</p>

<p>We will address your concern as soon as possible.</p>

<p>Best regards,<br>
    IT Helpdesk Team</p>
</body>
</html>
