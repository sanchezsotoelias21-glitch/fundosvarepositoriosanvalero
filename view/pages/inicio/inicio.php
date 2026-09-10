<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Inicio</title>
    <style>
      :root {
        --orange: #f39a00;
        --orange-dark: #df7f00;
        --text: #252525;
        --muted: #666;
        --bg: #ffffff;
      }
      * { box-sizing: border-box; }
      body {
        font-family: Arial, sans-serif;
        background: var(--bg);
        color: var(--text);
        margin: 0;
        padding: 0;
      }
      .container {
        max-width: 1050px;
        margin: 0 auto;
        padding: 55px 35px;
      }
      .welcome {
        position: relative;
        overflow: hidden;
        padding: 45px;
        border: 1px solid #ececec;
        border-radius: 20px;
        background: linear-gradient(135deg, #fff 0%, #fffaf0 100%);
        box-shadow: 0 10px 28px rgba(0,0,0,.07);
      }
      .welcome::after {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        right: -70px;
        top: -70px;
        border-radius: 50%;
        background: rgba(243,154,0,.13);
      }
      h1 {
        position: relative;
        z-index: 1;
        color: var(--orange-dark);
        margin: 0 0 18px;
        font-size: clamp(28px, 5vw, 44px);
        line-height: 1.15;
      }
      p {
        position: relative;
        z-index: 1;
        max-width: 850px;
        line-height: 1.8;
        color: var(--muted);
        margin: 0 0 14px;
        font-size: 16px;
      }
      .accent {
        width: 58px;
        height: 4px;
        border-radius: 4px;
        background: var(--orange);
        margin-bottom: 24px;
      }
      @media (max-width: 600px) {
        .container { padding: 25px 15px; }
        .welcome { padding: 28px 22px; border-radius: 14px; }
        p { font-size: 15px; }
      }
    </style>
  </head>
  <body>
    <div class="container"><section class="welcome">
      <div class="accent"></div>
      <h1>Bienvenidos al Politécnico San Valero</h1>
      <p>Formamos jóvenes con competencias técnicas, valores y una educación integral orientada al futuro.</p>
      <p>Desde esta sección puedes acceder a la información institucional, la oferta formativa, las noticias y las especialidades técnicas del centro.</p>
    </section></div>
  </body>
</html>
