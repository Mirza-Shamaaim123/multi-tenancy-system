<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-2xl rounded-2xl p-10 text-center max-w-md w-full">
        <!-- Success Icon -->
        <div class="flex justify-center mb-6">
            <div class="bg-green-100 rounded-full p-4">
                <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2l4-4m5 2a9 9 0 11-18 0a9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <!-- Heading -->
        <h1 class="text-3xl font-bold text-gray-800 mb-3">Payment Successful!</h1>

        <!-- Message -->
        <p class="text-gray-600 mb-6">
            Thank you for your purchase. Your payment has been processed successfully.  
            A confirmation email has been sent to your registered email address.
        </p>

        <!-- Buttons -->
        <div class="flex flex-col gap-3">
            <a href="/" 
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition">
                Go to Homepage
            </a>
            <a href="/dashboard"
               class="border border-gray-300 hover:bg-gray-100 text-gray-700 font-semibold py-2 rounded-lg transition">
                View Dashboard
            </a>
        </div>
    </div>

</body>
</html>
