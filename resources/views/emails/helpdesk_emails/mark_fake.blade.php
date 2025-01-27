<!DOCTYPE html>
<html>
<head>
    <title>Helpdesk Report Status Update</title>
</head>
<body>
<p style="text-transform: capitalize">Dear {{ $name }},</p>

<p>We have reviewed your report and determined that it has been classified as a <strong>fake report</strong>. Please see the ticket details below:</p>

<h4>Ticket Details:</h4>
<ul>
    <li><strong>Ticket Number:</strong> <span style="text-transform: uppercase">{{ $case }}</span></li>
    <li><strong>Status:</strong> Fake</li>
</ul>

<p>If you believe this status was applied in error, please contact the IT Helpdesk directly.</p>

<p>Best regards,<br>
    IT Helpdesk Team</p>
</body>
</html>
