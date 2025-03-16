<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRM - Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            background-color: #F7F7F7;
            padding: 2rem;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .auth-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 20px;
        }
        .auth-button {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            background-color: #1b1b18;
            color: white;
            text-decoration: none;
            border-radius: 0.375rem;
            border: 1px solid #19140035;
            transition: all 0.3s ease;
        }
        .auth-button:hover {
            background-color: #F53003;
            border-color: #F53003;
        }
        .crm-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="main-container">
  
    

        <!-- Login Form Card -->
        <div class="card">
          
 
<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="247pt" height="190pt" viewBox="0 0 1472.000000 832.000000"
 preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,832.000000) scale(0.100000,-0.100000)"
fill="#4B5563" stroke="none">
<path d="M7262 5950 c-155 -92 -221 -127 -392 -209 -403 -193 -680 -530 -761
-924 -24 -118 -28 -328 -9 -452 25 -166 100 -351 203 -505 71 -105 242 -273
356 -349 52 -34 176 -103 275 -151 100 -49 244 -125 321 -169 136 -78 168 -91
179 -72 4 5 97 60 209 122 351 195 1088 609 1183 665 l91 54 7 234 c4 129 4
399 0 600 l-7 364 -271 155 c-540 307 -1172 671 -1206 693 -19 13 -37 24 -40
23 -3 0 -65 -36 -138 -79z m308 -137 c152 -87 409 -233 452 -257 l38 -21 1
-330 c1 -181 4 -340 7 -353 5 -15 35 -38 93 -70 48 -26 215 -119 373 -206
l286 -160 0 -184 c0 -171 -1 -184 -17 -178 -10 4 -74 40 -143 80 -69 41 -231
134 -360 208 -268 153 -628 359 -743 426 -43 24 -85 51 -93 59 -12 12 -14 95
-14 534 0 286 3 518 8 516 4 -2 54 -31 112 -64z m-225 -375 c3 -18 4 -429 3
-913 l-3 -880 -45 3 c-55 4 -198 51 -282 93 -244 123 -433 343 -498 582 -78
284 -20 563 164 793 136 169 336 295 541 339 100 22 113 20 120 -17z m1133
-143 c169 -97 315 -182 325 -189 16 -12 17 -36 15 -295 l-3 -282 -50 26 c-27
15 -90 51 -140 79 -49 29 -128 75 -175 101 -47 26 -131 75 -188 108 l-102 59
0 284 c1 156 3 284 6 284 3 0 143 -79 312 -175z m-718 -756 l300 -171 0 -388
0 -388 -47 -30 c-63 -39 -523 -299 -545 -307 -17 -7 -18 32 -18 724 0 402 2
731 5 731 3 0 140 -77 305 -171z m660 -379 c129 -73 254 -143 278 -157 23 -13
42 -28 42 -32 0 -5 -33 -26 -72 -46 -40 -21 -167 -92 -281 -157 -115 -65 -213
-118 -218 -118 -10 0 -12 633 -2 644 3 3 9 4 12 2 3 -2 112 -63 241 -136z"/>
<path d="M4604 5615 c-461 -83 -813 -441 -885 -898 -17 -110 -7 -319 22 -427
92 -356 355 -635 712 -755 257 -86 589 -69 840 44 132 59 304 191 391 300 26
32 26 34 10 53 -10 10 -34 28 -53 40 -20 12 -85 58 -145 101 l-109 79 -39 -46
c-45 -52 -137 -121 -216 -160 -133 -67 -343 -87 -491 -46 -329 91 -546 393
-516 716 44 467 563 750 1000 545 84 -40 191 -115 225 -158 l20 -26 37 27
c115 80 287 213 291 224 11 34 -216 216 -356 286 -78 39 -215 83 -317 100
-108 19 -320 20 -421 1z"/>
<path d="M9208 5592 c-17 -3 -18 -55 -18 -916 0 -502 3 -968 7 -1034 l6 -122
547 0 c592 0 651 4 779 54 91 36 143 69 215 137 125 117 178 236 179 409 2
200 -69 345 -220 446 -32 21 -62 41 -66 45 -5 4 8 28 28 54 80 105 115 208
115 335 0 239 -131 429 -366 529 -128 55 -183 59 -709 64 -264 2 -488 2 -497
-1z m993 -409 c71 -23 133 -83 149 -143 21 -79 -5 -185 -57 -232 -52 -47 -83
-52 -385 -56 l-288 -4 0 226 0 226 264 0 c222 0 272 -3 317 -17z m149 -829
c101 -47 150 -116 150 -214 0 -94 -55 -177 -145 -217 -36 -16 -78 -18 -387
-21 l-347 -3 -3 230 c-2 127 -1 236 1 242 2 7 112 9 345 7 321 -3 344 -4 386
-24z"/>
<path d="M6510 2620 l0 -260 195 0 195 0 0 50 0 50 -139 0 -139 0 -7 210 -7
210 -49 0 -49 0 0 -260z"/>
<path d="M7087 2873 c-4 -3 -7 -23 -7 -44 0 -43 12 -49 108 -49 l62 0 0 -118
c0 -66 3 -160 6 -210 l7 -92 48 0 49 0 0 210 0 209 88 3 87 3 3 48 3 47 -224
0 c-123 0 -227 -3 -230 -7z"/>
<path d="M7795 2868 c-3 -7 -4 -124 -3 -258 l3 -245 145 1 c130 0 150 3 193
24 99 47 140 112 140 225 1 113 -43 183 -147 237 -35 19 -62 23 -183 26 -115
3 -144 2 -148 -10z m302 -114 c15 -11 39 -41 52 -67 30 -61 23 -122 -20 -172
-36 -40 -80 -55 -166 -55 l-63 0 0 161 0 161 84 -3 c66 -3 91 -9 113 -25z"/>
<path d="M3790 2775 l0 -35 1175 0 1175 0 0 35 0 35 -1175 0 -1175 0 0 -35z"/>
<path d="M8614 2796 c-3 -8 -4 -23 -2 -33 3 -17 53 -18 1151 -21 l1148 -2 -3
32 -3 33 -1143 3 c-989 2 -1143 0 -1148 -12z"/>
</g>
</svg>

            @if (Route::has('login'))
                <nav class="auth-buttons">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-dark auth-button" style="background-color: #1b1b18 !important; border-color: #19140035 !important;">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-dark auth-button" style="background-color: #1b1b18 !important; border-color: #19140035 !important;">
                            Log in
                        </a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-dark auth-button" style="background-color: #1b1b18 !important; border-color: #19140035 !important;">
                            Register
                        </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
