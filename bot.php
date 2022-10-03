$url = 'https://api.telegram.org/bot5649710415:AAGD420aitHY3fHmXAFjRbvtb7k8qDA2-18/sendMessage';

$ch = curl_init($url);
# Setup request to send json via POST.
$payload = json_encode([
'chat_id' => '-865272459',
'text' => 'Teste PHP ' . date('D M j G:i:s T Y'),
'disable_notification' => true,
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
# Return response instead of printing.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
echo "
<pre>$result</pre>";