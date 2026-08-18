<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject ?? 'WHENKAYA' }}</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f4f5;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f5;padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:570px;background-color:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="background-color:#18181b;padding:24px 32px;text-align:center;">
                            <span style="color:#ffffff;font-size:22px;font-weight:700;letter-spacing:1px;">WHENKAYA</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;color:#27272a;">
                            <h1 style="margin:0 0 16px;font-size:20px;font-weight:600;color:#18181b;">{{ $heading ?? 'Verification Required' }}</h1>
                            <p style="margin:0 0 24px;font-size:15px;line-height:1.6;color:#52525b;">{{ $intro }}</p>

                            <div style="text-align:center;margin:0 0 24px;">
                                <div style="display:inline-block;background-color:#f4f4f5;border:1px solid #e4e4e7;border-radius:8px;padding:16px 32px;font-size:28px;font-weight:700;letter-spacing:8px;color:#18181b;">{{ $code }}</div>
                            </div>

                            <p style="margin:0 0 8px;font-size:14px;line-height:1.6;color:#52525b;">Enter this code in the app to continue.</p>
                            <p style="margin:0;font-size:13px;color:#a1a1aa;">This code will expire in 10 minutes.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:24px 32px;background-color:#fafafa;text-align:center;border-top:1px solid #e4e4e7;">
                            <p style="margin:0;font-size:12px;color:#a1a1aa;">&copy; 2026 WHENKAYA. All rights reserved. &bull; whenkaya2026@gmail.com</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>