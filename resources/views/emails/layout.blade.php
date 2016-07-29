<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="{{ Lang::getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <title>@yield('title')</title>

    <style type="text/css">
        @media screen and (max-width: 599px) {
            .force-row, .container {
                width: 100%;
                max-width: 100%
            }
        }

        @media screen and (max-width: 400px) {
            .container-padding {
                padding-left: 12px;
                padding-right: 12px
            }
        }</style>
</head>

<body style="-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%; margin:0; padding:0" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<!-- 100% background wrapper (grey background) -->
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0" style="border-spacing:0; mso-table-lspace:0; mso-table-rspace:0">
    <tr>
        <td align="center" valign="top" bgcolor="#F0F0F0" style="border-collapse:collapse; background-color:#F0F0F0">

            <br>

            <!-- 600px container (white background) -->
            <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" style="border-spacing:0; mso-table-lspace:0; mso-table-rspace:0; max-width:600px; width:600px">
                <tr>
                    <td class="container-padding header" align="left" style="border-collapse:collapse; color:#666666; font-family:Helvetica, Arial, sans-serif; font-size:24px; font-weight:bold; padding-bottom:12px; padding-left:24px; padding-right:24px">
                        {{ trans('info.client.name') }}
                    </td>
                </tr>
                <tr>
                    <td class="container-padding content" align="left" style="border-collapse:collapse; background-color:#fff; padding-bottom:12px; padding-left:24px; padding-right:24px; padding-top:12px" bgcolor="#ffffff">
                        <br>

                        <div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#333333">@yield('title')</div>
                        <br>

                        <div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333">
                            @yield('content')
                            <br><br>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td class="container-padding footer-text" align="left" style="border-collapse:collapse; color:#aaa; font-family:Helvetica, Arial, sans-serif; font-size:12px; line-height:16px; padding-left:24px; padding-right:24px">
                        <br><br>
                        © {{ date('Y') }} {{ trans('info.admin.client.full_name') }}
                        <br><br>

                        <strong>{{ trans('info.admin.client.full_name') }}</strong><br>
                        <address class="ios-footer">
                            {!! trans('info.admin.client.address') !!}<br>
                        </address>
                        <a href="http://{{ trans('info.admin.client.url') }}" style="color:#aaaaaa">{{ trans('info.admin.client.url') }}</a><br>

                        <br><br>
                    </td>
                </tr>
            </table>
            <!--/600px container -->


        </td>
    </tr>
</table>
<!--/100% background wrapper-->

</body>
</html>
