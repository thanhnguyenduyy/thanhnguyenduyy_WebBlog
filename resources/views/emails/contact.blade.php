<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
</head>

<body style="margin:0; padding:0;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td style="margin:0; padding:0;">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%; background:#ffffff;">
          <tr>
            <td style="padding:40px; background:#6366f1; color:#ffffff;">
              <h2 style="margin:0; font-size:22px; font-family:Arial, sans-serif;">📩 New Contact Message</h2>
            </td>
          </tr>
          <tr>
            <td style="padding:40px; font-family:Arial, sans-serif;">
              <p style="margin:0; font-size:12px; color:#6b7280;">FROM</p>
              <p style="margin:8px 0 24px; font-size:16px; color:#111827;">{{ $senderName }}</p>
              <p style="margin:0; font-size:12px; color:#6b7280;">EMAIL</p>
              <p style="margin:8px 0 24px; font-size:16px;">
                <a href="mailto:{{ $senderEmail }}" style="color:#6366f1; text-decoration:none;">{{ $senderEmail }}</a>
              </p>
              <p style="margin:0; font-size:12px; color:#6b7280;">MESSAGE</p>
              <div style="margin-top:12px; padding:20px; background:#f3f4f6; border-radius:8px; font-size:15px; line-height:1.6;">{{ $senderMessage }}</div>
              <div style="margin-top:30px;">
                <a href="mailto:{{ $senderEmail }}"
                  style="display:inline-block; padding:14px 24px; background:#6366f1; color:#ffffff; text-decoration:none; border-radius:8px; font-size:14px;">
                  Reply to {{ $senderName }}
                </a>
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>