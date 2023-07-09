<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Proinfalca - Tienda online</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }
    </style>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        :root {
            --dark-blue: hsl(233, 26%, 24%);
            --lime-green: hsl(216, 63%, 54%);
            --bright-cyan: hsl(192, 70%, 51%);
            --grayish-blue: hsl(233, 8%, 62%);
            --light-grayish-blue: hsl(220, 16%, 96%);
            --very-light-gray: hsl(0, 0%, 98%);
            --white: hsl(0, 0%, 100%);
        }

        body {
            position: relative;
            overflow-x: hidden;
            padding-top: 80px;
            font-family: "Public Sans", sans-serif;
            font-size: 18px;
            font-weight: 300;
            background-color: var(--dark-blue);
        }

        /*=====================Navbar=======================*/
        .logo {
            width: 150px;
        }

        .navbar {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            height: 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10%;
            z-index: 5;
            background-color: var(--white);
        }

        .navbar-menu {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style-type: none;
            height: 100%;
            margin-left: 35px;
        }

        .navbar-menu li {
            height: 80px;
            margin-right: 35px;
            line-height: 80px;
            border-bottom: 4px solid transparent;
        }

        .navbar-menu li:hover,
        .navbar-menu li.link-active {
            border-image: linear-gradient(to right,
                    var(--lime-green) 0%,
                    var(--bright-cyan) 100%) 1;
        }

        .navbar-menu li a {
            text-decoration: none;
            color: var(--grayish-blue);
        }

        .navbar-menu li a:hover {
            color: var(--dark-blue);
        }

        .navbar-toggle {
            cursor: pointer;
        }

        .navbar-hamburguerIcon {
            display: none;
        }

        .navbar-closeIcon {
            display: none;
        }

        .button-login,
        .button-verproductos {
            padding: 13px 30px;
            font-size: 16px;
            text-decoration: none;
            background-image: linear-gradient(to right,
                    var(--lime-green),
                    var(--bright-cyan));
            border-radius: 100px;
            color: var(--very-light-gray);
            white-space: nowrap;
        }

        .button-login:hover,
        .button-verproductos:hover {
            opacity: 0.8;
        }

        .navbar-menu .button-login {
            display: none;
            margin-top: 30px;
        }

        section {
            min-height: 650px;
            padding: 0 10%;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: var(--dark-blue);
        }

        p {
            color: var(--grayish-blue);
        }

        /*=====================Section-1=======================*/
        .section-1,
        .section-2 {
            background-color: var(--very-light-gray);
        }

        .section-1 {
            min-height: 600px;
            position: relative;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            background: linear-gradient(rgba(5, 7, 12, 0.6), rgba(5, 7, 12, 0.6)), url('https://i.ibb.co/Bnk3Ts9/proinfalca.jpg') no-repeat center fixed;
            background-position: 0% 10%;
            background-size: cover;
        }

        .section-1-container {
            max-width: 540px;
        }

        .section-1 h1 {
            color: #ffffff;
            margin-bottom: 30px;
            font-size: 42px;
            font-weight: 400;
        }

        .section-1 p {
            color: rgb(222, 222, 222);
            margin-bottom: 40px;
        }

        /*=====================Section-2=======================*/
        .section-2 {
            min-height: 550px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-direction: column;
            flex-wrap: wrap;
        }

        .section-2 h2 {
            margin-bottom: 60px;
            font-size: 34px;
            font-weight: 400;
        }

        .section-2-cardContainer {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .card-acercade {
            padding: 10px;
            margin: 10px;
        }

        /*=====================Footer=======================*/
        .footer {
            position: relative;
            width: 100%;
            padding: 50px 10%;
            min-height: 190px;
            display: grid;
            grid-gap: 20px;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, auto);
            grid-template-areas:
                "logo map"
                "footer-social footer-rights";
        }

        .footer .logo {
            grid-area: logo;
        }

        .footer-social {
            grid-area: footer-social;
        }

        .footer-map {
            grid-area: map;
            width: 300px;
            justify-self: end;
        }

        .footer-social ul {
            width: 160px;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            grid-area: footer-social;
        }

        .footer ul li {
            list-style-type: none;
        }

        .footer-social ul li:hover path {
            fill: var(--lime-green);
        }

        .footer .button-login {
            position: absolute;
            right: 0px;
            height: 50px;
            width: 180px;
            grid-area: button-login;
            text-align: center;
            vertical-align: center;
        }

        .footer-rights {
            align-self: end;
            justify-self: end;
            grid-area: footer-rights;
            white-space: nowrap;
            text-align: right;
            vertical-align: bottom;
        }

        .section-2-uptag {
            opacity: 0.6;
        }

        .section-2-uptag img {
            width: 100px;
            position: relative;
            top: 10px;
            left: 10px;
        }

        /*=====================Media queries=======================*/

        /*=====================Mainly queries=======================*/
        @media screen and (max-width: 1266px) {
            .section-1-container {
                width: 100%;
            }

            .section-1 img {
                margin-left: 0px;
            }


        }

        @media screen and (max-width: 1000px) {
            section {
                min-height: 650px;
                padding: 0 6%;
            }



            .section-2 {
                padding-top: 90px;
                align-items: center;
            }

            .section-2-cardContainer {
                justify-content: center;
                flex-wrap: wrap;
            }

            .section-2-cardContainer-card {
                margin: 0 25px 25px 25px;
            }

            .section-2-uptag img {
                display: none;
            }
        }

        /*=====================Queries for the Navbar=======================*/
        @media screen and (max-width: 852px) {
            .navbar .button-login {
                display: none;
            }

        }

        @media screen and (max-width: 676px) {
            .navbar-menu {
                position: absolute;
                top: 400px;
                left: 0;
                right: 0;
                bottom: 0;
                margin: auto;
                height: 280px;
                width: 325px;
                display: none;
                flex-direction: column;
                background-color: var(--white);
                border-radius: 5px;
                box-shadow: 0px 70px 60px 100px rgba(0, 0, 0, 0.1);
            }

            .navbar-toggle .navbar-hamburguerIcon {
                display: block;
            }

            .navbar-menu.active+.navbar-toggle .navbar-hamburguerIcon {
                display: none;
            }

            .navbar-menu.active+.navbar-toggle .navbar-closeIcon {
                display: block;
            }

            .navbar-menu.active {
                display: flex;
            }

            .navbar-menu.active .button-login {
                display: block;
            }

            .navbar-menu li {
                height: 56px;
                margin-right: 0;
            }
        }


        /*=====================Queries for the Section-1=======================*/
        @media screen and (max-width: 840px) {
            .section-1 {
                flex-direction: column-reverse;
            }

            .section-1-container {
                margin-top: 0;
                margin-right: auto;
                margin-left: auto;
                width: 100%;
                max-width: 540px;
                text-align: center;
            }
        }

        @media screen and (max-width: 500px) {
            .section-1 {
                padding-bottom: 50px;
            }
        }

        /*=================== Media queries del footer ================= */
        @media screen and (max-width: 720px) {
            .footer {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(4, auto);
                grid-template-areas:
                    "logo"
                    "footer-social"
                    "map"
                    "footer-rights";
            }

            .footer-map,
            .footer-social,
            .logo,
            .footer-rights {
                justify-self: center;
            }
        }
    </style>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

</head>

<body>
    <header>
        <nav class="navbar">
            <img src="https://i.ibb.co/3h5Qrbj/logoproinfalca.png" alt="proinfalca" class="logo" />
            <ul class="navbar-menu">
                <li><a href="{{url('/')}}">Inicio</a></li>
                <li><a href="{{url('/acercade')}}">Acerca de</a></li>
                <li><a href="{{url('/contacto')}}">Contacto</a></li>
                @auth
                <a href="{{ url('/dashboard') }}" class="button-login">Ingresar</a>
                @else
                <a href="{{ route('login') }}" class="button-login">Ingresar</a>
                @endauth
            </ul>
            <div class="navbar-toggle">
                <svg alt="hamburguer icon" class="navbar-hamburguerIcon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <style>
                        svg {
                            fill: #cdd1d7
                        }
                    </style>
                    <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                </svg>
                <svg alt="close icon" class="navbar-closeIcon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <style>
                        svg {
                            fill: #cdd1d7
                        }
                    </style>
                    <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </div>
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}" class="button-login">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="button-login">Iniciar sesión</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="button-login">Registrarse</a>
            @endif
            @endauth
            @endif
        </nav>
    </header>

    <main>
        <section class="section-1">
            <div class="section-1-container">
                <h1>Proinfalca - Historia</h1>
                <p>PROINFALCA, fue creada el 27 de enero de 2009 por el señor Pedro Trasmonte, con la finalidad de ofrecer
                    repuestos de distinto tipo para particular e industrial, especializándose en el apartado de correas. El gerente nos
                    comenta que, en ese entonces, la mayoría del mercado de repuestos para esta zona se basaba en catálogos, y eran muy
                    específicos el tipo de correa que ofrecían, para determinados automóviles, y de ciertos años. En vista de la necesidad
                    de un negocio especializado en correas de distinto tipo, tamaño, y función, surge PROINFALCA, para dar al pueblo
                    falconiano repuestos de calidad especializándose en correas.</p>
            </div>
        </section>

        <section class="section-2">
            <h2>¿Quienes somos?</h2>
            <div class="section-2-cardContainer">
                <div class="card-acercade">
                    <h3 class="card-acercade-title">Misión</h3>
                    <p class="card-acercade-text">
                        “ Ofrecer el mejor servicio, para mantener y consolidar el liderazgo en ventas de productos industriales, logrando
                        satisfacer las necesidades de nuestros clientes con una amplia gama de productos de excelente calidad y un personal
                        profesional a su servicio ”
                    </p>
                </div>
                <div class="card-acercade">
                    <h3 class="card-acercade-title">Visión</h3>
                    <p class="card-acercade-text">
                        “ Ser una organización reconocida nacional e internacionalmente en liderazgo de ventas de productos industriales de muy
                        buena calidad, que satisfagan las necesidades del cliente, respetando las normas ambientales y exigencias
                        gubernamentales para poder edificar una mejor calidad de vida, para todos los miembros de nuestra empresa. ”
                    </p>
                </div>
                <div class="card-acercade">
                    <h3 class="card-acercade-title">Política de Calidad</h3>
                    <p class="card-acercade-text">
                        “ Ofrecer el mejor servicio en ventas de productos industriales, para satisfacer las necesidades de nuestros clientes con
                        una amplia gama de productos de calidad y un personal comprometido en el cumplimiento del SGC para el mejoramiento
                        continuo ”
                    </p>
                </div>
            </div>
            <p class="section-2-uptag">Este sistema fue diseñado por un equipo de la UPFTAG <img src="https://i.ibb.co/L6BZd5V/logo-upftag.png" alt="UPFTAG"></p>
        </section>
    </main>

    <footer class="footer">
        <img src="https://i.ibb.co/3h5Qrbj/logoproinfalca.png" alt="proinfalca" class="logo" />
        <div class="footer-social">

            <a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a>
            <ul>
                <li>
                    <a href="#" aria-label="facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" aria-hidden="true">
                            <path fill="#FFF" d="M18.896 0H1.104C.494 0 0 .494 0 1.104v17.793C0 19.506.494 20 1.104 20h9.58v-7.745H8.076V9.237h2.606V7.01c0-2.583 1.578-3.99 3.883-3.99 1.104 0 2.052.082 2.329.119v2.7h-1.598c-1.254 0-1.496.597-1.496 1.47v1.928h2.989l-.39 3.018h-2.6V20h5.098c.608 0 1.102-.494 1.102-1.104V1.104C20 .494 19.506 0 18.896 0z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" aria-label="youtube">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" aria-hidden="true">
                            <path fill="#FFF" d="M10.333 0c-5.522 0-10 4.478-10 10 0 5.523 4.478 10 10 10 5.523 0 10-4.477 10-10 0-5.522-4.477-10-10-10zm3.701 14.077c-1.752.12-5.653.12-7.402 0C4.735 13.947 4.514 13.018 4.5 10c.014-3.024.237-3.947 2.132-4.077 1.749-.12 5.651-.12 7.402 0 1.898.13 2.118 1.059 2.133 4.077-.015 3.024-.238 3.947-2.133 4.077zM8.667 8.048l4.097 1.949-4.097 1.955V8.048z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" target="_blank" aria-label="twitter" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="18">
                            <path fill="#FFF" d="M20.667 2.797a8.192 8.192 0 01-2.357.646 4.11 4.11 0 001.804-2.27 8.22 8.22 0 01-2.606.996A4.096 4.096 0 0014.513.873c-2.649 0-4.595 2.472-3.997 5.038a11.648 11.648 0 01-8.457-4.287 4.109 4.109 0 001.27 5.478A4.086 4.086 0 011.47 6.59c-.045 1.901 1.317 3.68 3.29 4.075a4.113 4.113 0 01-1.853.07 4.106 4.106 0 003.834 2.85 8.25 8.25 0 01-6.075 1.7 11.616 11.616 0 006.29 1.843c7.618 0 11.922-6.434 11.662-12.205a8.354 8.354 0 002.048-2.124z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" aria-label="pinterest">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" aria-hidden="true">
                            <path fill="#FFF" d="M10 0C4.478 0 0 4.477 0 10c0 4.237 2.636 7.855 6.356 9.312-.088-.791-.167-2.005.035-2.868.182-.78 1.172-4.97 1.172-4.97s-.299-.6-.299-1.486c0-1.39.806-2.428 1.81-2.428.852 0 1.264.64 1.264 1.408 0 .858-.545 2.14-.828 3.33-.236.995.5 1.807 1.48 1.807 1.778 0 3.144-1.874 3.144-4.58 0-2.393-1.72-4.068-4.177-4.068-2.845 0-4.515 2.135-4.515 4.34 0 .859.331 1.781.745 2.281a.3.3 0 01.069.288l-.278 1.133c-.044.183-.145.223-.335.134-1.249-.581-2.03-2.407-2.03-3.874 0-3.154 2.292-6.052 6.608-6.052 3.469 0 6.165 2.473 6.165 5.776 0 3.447-2.173 6.22-5.19 6.22-1.013 0-1.965-.525-2.291-1.148l-.623 2.378c-.226.869-.835 1.958-1.244 2.621.937.29 1.931.446 2.962.446 5.522 0 10-4.477 10-10S15.522 0 10 0z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" aria-label="instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" aria-hidden="true">
                            <path fill="#FFF" d="M10.333 1.802c2.67 0 2.987.01 4.042.059 2.71.123 3.976 1.409 4.1 4.099.048 1.054.057 1.37.057 4.04 0 2.672-.01 2.988-.058 4.042-.124 2.687-1.386 3.975-4.099 4.099-1.055.048-1.37.058-4.042.058-2.67 0-2.986-.01-4.04-.058-2.717-.124-3.976-1.416-4.1-4.1-.048-1.054-.058-1.37-.058-4.041 0-2.67.01-2.986.058-4.04.124-2.69 1.387-3.977 4.1-4.1 1.054-.048 1.37-.058 4.04-.058zm0-1.802C7.618 0 7.278.012 6.211.06 2.579.227.56 2.242.394 5.877.345 6.944.334 7.284.334 10s.011 3.057.06 4.123c.166 3.632 2.181 5.65 5.816 5.817 1.068.048 1.408.06 4.123.06 2.716 0 3.057-.012 4.124-.06 3.628-.167 5.651-2.182 5.816-5.817.049-1.066.06-1.407.06-4.123s-.011-3.056-.06-4.122C20.11 2.249 18.093.228 14.458.06 13.39.01 13.049 0 10.333 0zm0 4.865a5.135 5.135 0 100 10.27 5.135 5.135 0 000-10.27zm0 8.468a3.333 3.333 0 110-6.666 3.333 3.333 0 010 6.666zm5.339-9.87a1.2 1.2 0 10-.001 2.4 1.2 1.2 0 000-2.4z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <img class="footer-map" src="https://i.ibb.co/TmH21T5/ubicacion-proinfalca.png" alt="Mapa">
        <p class="footer-rights">© Proinfalca </p>
    </footer>
    <script>
        const navbarToggle = document.querySelector(".navbar-toggle");
        const navbarMenu = document.querySelector(".navbar-menu");

        navbarToggle.addEventListener('click', () => {
            navbarMenu.classList.toggle('active');
        });
    </script>
</body>

</html>
