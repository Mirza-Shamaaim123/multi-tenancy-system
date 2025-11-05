<!DOCTYPE html>
<html>
<head>
    <title>Plan Purchased</title>
</head>
<body>
    <h2>Hi {{ $checkout->name }},</h2>
    <p>Thank you for purchasing the <strong>{{ $checkout->plan_name }}</strong> ({{ $checkout->plan_type }}) plan.</p>
    <p>Amount Paid: ${{ number_format($checkout->amount, 2) }}</p>
    <p>Status: {{ ucfirst($checkout->status) }}</p>
    <br>
    <p>Your domain: {{ $checkout->domain }}</p>
    <br>
    <p>Regards,<br>{{ config('app.name') }}</p>
</body>
</html>
