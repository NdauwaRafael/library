<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<div style="background: #D9E9E7;
                    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                    padding: 40px 20px">
    <div class="email-body" style="
                    background-clip: content-box;
                    background-color: #fff;
                    max-width: 590px;
                    margin: auto;
                    ">
        <div style="width:100%;
                     margin-top:0;
                     background: #2d3846;
                     padding:  10px 0;" >
            <div style="display: block;
                                text-align: center">
                {{--<img class="e-logo" style="--}}
{{--                    width: 30%;max-width:150px;height:auto;" src="">--}}
            </div>

        </div>
        <div class="email-description" style="padding: 50px 40px;
                                                    line-height: 1.5em;
                                                    font-weight: 300;
                                                    margin:auto;
                                                    color: #565656;
                                                    font-family: 'Open Sans', HelveticaNeue-Light, Helvetica, arial, sans-serif !important;
                                                    font-size: 16px;
                                                    font-weight: 300 !important;
                                                    color: #54585A;
                                                    line-height: 23px;">
            @yield('content')
        </div>
        <hr>
        <div style="padding: 10px;
                    line-height: 1.5em;
                    font-weight: 300;
                    font-size: 12px;
                    color: #565656;
                    text-align: center">
            <p style="text-align: center; margin: 0px; font-family: Helvetica, arial, sans-serif !important; font-size: 12px; color: #959697; letter-spacing: 0px;">Modern Library INC, The Lb Plaza, Moi Avenue, Nyahururu. 3rd Floor</p>
            <p style="text-align: center; margin: 0px; font-family: Helvetica, arial, sans-serif !important; font-size: 12px; color: #959697; letter-spacing: 0px;"> The Lib Plaza, Nakuru</p>
            <p style="text-align: center; margin: 0px; font-family: Helvetica, arial, sans-serif !important; font-size: 12px; color: #959697; letter-spacing: 0px;">Nairobi, KE P.O. Box 899899 - 00200 Kenya</p>

        </div>
    </div>
    <div class="email-footer" style="
                                        color: #000000;">
        @include('emails.layout.email_footer')
    </div>
</div>

</body>
</html>