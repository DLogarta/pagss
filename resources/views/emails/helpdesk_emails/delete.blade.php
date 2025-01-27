<!DOCTYPE html>
<html>
<head>
    <title>Helpdesk Report Archived</title>
</head>
<body>
<p style="text-transform: capitalize">Dear {{ $name }},</p>

<p>We would like to inform you that your reported ticket has been <strong>archived</strong>. Please see the ticket details below:</p>

<h4>Ticket Details:</h4>
<ul>
    <li><strong>Ticket Number:</strong> <span style="text-transform: uppercase">{{ $case }}</span></li>
    <li><strong>Reason:</strong> <span style="text-transform: capitalize">{{ $reason }}</span></li>
    <li><strong>Status:</strong> Archived</li>
</ul>

<p>If you believe this was done in error or need further assistance, please contact the IT Helpdesk and provide your ticket number for reference.</p>

<p>Best regards,<br>
    IT Helpdesk Team</p>
</body>
</html>
