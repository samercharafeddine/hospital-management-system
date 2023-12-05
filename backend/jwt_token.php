<?php
   function Sign($payload, $key)
  {
    $header = ['alg' => 'HS256', 'type' => 'JWT'];
    $header_encoded = base64_encode(json_encode($header));
    $payload_encoded = base64_encode(json_encode($payload));
    $signature = hash_hmac('SHA256', $header_encoded . $payload_encoded, $key);
    $signature_encoded = base64_encode($signature);
    return $header_encoded . '.' . $payload_encoded . '.' . $signature_encoded;
  }
  function Verify($token, $key)
    {
      $token_parts = explode('.', $token);
      $payload = json_decode(base64_decode($token_parts[1]), true);
      $header = json_decode(base64_decode($token_parts[0]), true);
      $signature = base64_decode($token_parts[2]);
      $newSignature = hash_hmac('SHA256', $token_parts[0] . $token_parts[1], $key);
      $encodedSignature = base64_encode($newSignature);
      if ($token_parts[2] == $encodedSignature) {
        return $payload;
      }
      return false;
    }