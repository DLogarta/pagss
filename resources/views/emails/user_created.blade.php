<p>Hello <span style="text-transform: capitalize">{{ $user->name }}</span>,</p>
<p>Your account has been created successfully.</p>
<p>Your login details are as follows:</p>
<p>Email: {{ $user->email }}</p>
<p>Password: {{ $password }}</p>
<p>Please use this password to log in and update your password.</p>
<p>
    <a href="https://anemone-capital-man.ngrok-free.app/login" target="_blank">
        Click here to log in.
    </a>
</p>
