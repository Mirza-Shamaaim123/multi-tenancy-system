<!-- resources/views/plan_expired.blade.php -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Store Access Blocked — Plan Expired</title>
  <!-- Tailwind CDN (quick demo). In production, build with your assets. -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Small extra styling for a nicer card */
    .glass { background: rgba(255,255,255,0.06); backdrop-filter: blur(6px); }
  </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white flex items-center justify-center">
  <main class="max-w-3xl w-full p-6">
    <div class="glass rounded-2xl p-8 shadow-2xl border border-white/10">
      <div class="flex items-center gap-4">
        <div class="flex-shrink-0">
          <!-- SVG lock icon -->
          <div class="w-20 h-20 rounded-full bg-red-600/20 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 11c.828 0 1.5.672 1.5 1.5S12.828 14 12 14s-1.5-.672-1.5-1.5S11.172 11 12 11zm6 0V9a6 6 0 10-12 0v2" />
              <rect x="4" y="11" width="16" height="9" rx="2" stroke="currentColor" stroke-width="1.6" />
            </svg>
          </div>
        </div>
        <div class="flex-1">
          <h1 class="text-2xl sm:text-3xl font-semibold">Store Access Suspended</h1>
          <p class="mt-2 text-gray-300">Sorry, your <span class="font-medium text-white">{{ $planName ?? 'current plan' }}</span> has expired, and store access has been temporarily disabled.</p>

          <ul class="mt-4 text-sm text-gray-300 space-y-1">
            <li>• Plan expiry date: <span class="font-medium text-white">{{ $expiryDate ?? '—' }}</span></li>
            <li>• The store will remain inaccessible until the plan is renewed.</li>
          </ul>

          <div class="mt-6 flex flex-col sm:flex-row sm:items-center gap-3">
            <a href="{{ route('plan')}}" class="inline-flex items-center justify-center px-5 py-3 rounded-md bg-emerald-500 hover:bg-emerald-600 text-black font-semibold shadow">Renew Plan</a>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 rounded-md border border-white/10 text-white">Contact Support</a>
            <a href="#" class="inline-flex items-center justify-center px-4 py-2 rounded-md text-sm text-gray-300 hover:text-white">Logout</a>
          </div>
        </div>
      </div>

      <hr class="my-6 border-white/10" />

      <section class="text-sm text-gray-400">
        <p>For your convenience, we’ve sent some helpful instructions to your registered email. If you’re facing any issues with payment or renewal, please contact support.</p>

        <p class="mt-3">If you’re an admin and need temporary access, you can run a console command like <code class="bg-white/5 px-2 py-1 rounded">artisan tenant:allow-temp-access {tenant_id} --minutes=60</code> to grant short-term access.</p>
      </section>

      <footer class="mt-6 text-xs text-gray-500">© {{ date('Y') }} {{ config('app.name', 'Your App') }} — For technical support, contact support@yourapp.com</footer>
    </div>

    <!-- Optional inline script for countdown or billing popup -->
    <script>
      // Example: open billing in a new tab when Renew clicked (can be customized)
      document.querySelectorAll('#').forEach(a => {
        a.addEventListener('click', (e) => {
          // default navigation is fine; kept for progressive enhancement
        });
      });
    </script>
  </main>
</body>
</html>
