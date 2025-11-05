<h2>Hi {{ $checkout->name }},</h2>
<p>Your {{ $checkout->plan_name }} plan will expire in 3 days.</p>
<p>Please renew now to avoid any interruption in your service.</p>
<a href="{{ url('/plans/renew') }}" style="background:#4f46e5;color:#fff;padding:10px 20px;border-radius:6px;text-decoration:none;">Renew Now</a>
<p>Thank you for staying with us 💙</p>

