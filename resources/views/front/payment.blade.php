<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

<button id="payBtn">Pay ₹500</button>

<script>
document.getElementById("payBtn").onclick = async function () {

    // 1. Create order
    const res = await fetch('/create-order', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
        // body: JSON.stringify({})
    });
    
    console.log(res);
    
    const order = await res.json();

    // 2. Open Razorpay
    const options = {
        key: "{{ config('services.razorpay.key') }}",
        amount: order.amount,
        currency: "INR",
        // name: "Nikhil Store",
        // description: "Test Payment",
        order_id: order.id,

        handler: async function (response) {

            // 3. Verify payment
            const verify = await fetch('/verify-payment', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify(response)
            });

            const result = await verify.json();

            if (result.success) {
                alert("Payment Verified ✅");
            } else {
                alert("Payment Failed ❌");
            }
        }
    };

    const rzp = new Razorpay(options);
    rzp.open();
};
</script>

</body>
</html>