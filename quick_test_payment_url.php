<?php
// quick_test_payment_url.php
// Test the actual content of the payment page

$sessionToken = "78b3d235b1c03834761b49d0e4ca86fc16d80cdb602f8b87c92864d55a0b2580";
$paymentUrl = "https://pay.easebuzz.in/payment/page/" . $sessionToken;

echo "<h1>🔍 Testing Payment URL Content</h1>";
echo "<p><strong>URL:</strong> $paymentUrl</p>";

// Get the actual page content
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $paymentUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
curl_setopt($ch, CURLOPT_TIMEOUT, 15);

$content = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$finalUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);

echo "<h2>📊 Results:</h2>";
echo "<p><strong>HTTP Code:</strong> $httpCode</p>";
echo "<p><strong>Final URL:</strong> $finalUrl</p>";
echo "<p><strong>Content Length:</strong> " . strlen($content) . " characters</p>";

// Extract page title
$pageTitle = 'No title found';
if (preg_match('/<title[^>]*>(.*?)<\/title>/i', $content, $matches)) {
    $pageTitle = trim($matches[1]);
}
echo "<p><strong>Page Title:</strong> $pageTitle</p>";

// Check for error indicators
$errorKeywords = ['404', 'not found', 'error', 'expired', 'invalid', 'page not found', 'something went wrong'];
$foundErrors = [];

foreach ($errorKeywords as $keyword) {
    if (stripos($content, $keyword) !== false) {
        $foundErrors[] = $keyword;
    }
}

if (!empty($foundErrors)) {
    echo "<div style='background: #f8d7da; padding: 10px; border-radius: 5px; margin: 10px 0;'>";
    echo "<h3 style='color: #721c24;'>❌ Error Keywords Found:</h3>";
    echo "<ul>";
    foreach ($foundErrors as $error) {
        echo "<li style='color: #721c24;'>$error</li>";
    }
    echo "</ul>";
    echo "</div>";
} else {
    echo "<div style='background: #d4edda; padding: 10px; border-radius: 5px; margin: 10px 0;'>";
    echo "<h3 style='color: #155724;'>✅ No Error Keywords Found</h3>";
    echo "</div>";
}

// Check for payment page indicators
$paymentKeywords = ['pay with easebuzz', 'payment', 'amount', 'card number', 'checkout', 'pay now'];
$foundPaymentIndicators = [];

foreach ($paymentKeywords as $keyword) {
    if (stripos($content, $keyword) !== false) {
        $foundPaymentIndicators[] = $keyword;
    }
}

if (!empty($foundPaymentIndicators)) {
    echo "<div style='background: #d4edda; padding: 10px; border-radius: 5px; margin: 10px 0;'>";
    echo "<h3 style='color: #155724;'>✅ Payment Indicators Found:</h3>";
    echo "<ul>";
    foreach ($foundPaymentIndicators as $indicator) {
        echo "<li style='color: #155724;'>$indicator</li>";
    }
    echo "</ul>";
    echo "</div>";
} else {
    echo "<div style='background: #fff3cd; padding: 10px; border-radius: 5px; margin: 10px 0;'>";
    echo "<h3 style='color: #856404;'>⚠️ No Payment Indicators Found</h3>";
    echo "</div>";
}

// Show first 1000 characters of content
echo "<h3>📄 Page Content Preview:</h3>";
echo "<div style='background: #f8f9fa; padding: 10px; border-radius: 5px; font-family: monospace; white-space: pre-wrap; max-height: 300px; overflow-y: auto;'>";
echo htmlspecialchars(substr($content, 0, 1000));
if (strlen($content) > 1000) {
    echo "\n\n... (content truncated)";
}
echo "</div>";

// Test the URL by opening it
echo "<h3>🔗 Test Links:</h3>";
echo "<p><a href='$paymentUrl' target='_blank' style='background: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;'>Open Payment URL in New Tab</a></p>";
?>