<!DOCTYPE html>
<html>
<head>
    <title>Helpdesk Report Confirmation</title>
</head>
<body>
<p style="text-transform: capitalize">Dear {{ $name }},</p>

<p>Thank you for reaching out to the IT Helpdesk. We have successfully received your report with the following details:</p>

<h4>Submitted Details:</h4>
<ul>
    <li><strong>Name:</strong> <span style="text-transform: capitalize">{{ $name }}</span></li>
    <li><strong>Employee ID:</strong> <span style="text-transform: uppercase">{{ $employee_id }}</span></li>
    <li><strong>Email Address:</strong> {{ $email }}</li>
    <li><strong>Phone Number:</strong> {{ $phone }}</li>
    <li><strong>Report Subject:</strong> <span style="text-transform: capitalize">{{ $topic }}</span></li>
    <li><strong>Priority Level:</strong> <span style="text-transform: capitalize">{{ $priority_level }}</span></li>
</ul>

<p><strong>Description:</strong><br>
    {{ $description }}
</p>

<p>Our team will review your report and address your concern as soon as possible.</p>

<p>If you need to provide additional details or updates to your report, please reply to this email and include your Ticket Number: <strong><span style="text-transform: uppercase">{{ $case }}</span></strong> in the subject line for reference.</p>

<p>We appreciate your patience and understanding.</p>

<p>Best regards,<br>
    IT Helpdesk Team</p>
</body>
</html>
